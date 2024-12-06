<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employees;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index');
    }

    public function data(Request $request)
    {
        // if ($request->ajax()) {
            $employees = Employees::all();
            $formattedEmployees = $employees->map(function ($employee) {
                // dd($employee);
                return [
                    'id' => $employee->id,
                    'first_nm' => $employee->first_nm,
                    'last_nm' => $employee->last_nm,
                    'company' => $employee->company->name,
                    'email' => $employee->email,
                    'phone' => $employee->phone
                ];
            });
            // dd($formattedEmployees);
            return DataTables::of($formattedEmployees)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group">
                            <a href="' . url('employees', $row['id']) .'/edit' . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            <button type="button" class="btn_delete_modal_href btn btn-xs btn-danger" data-url_modal="' . url('employees', $row['id']) . '"><i class="fa fa-trash"></i></button>
                        </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companies'] = Company::all();
        return view('employees.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        Employees::create($request->all());

        if ($request->action == "Simpan & Buat Lagi") {
            return redirect()->route('employees.create')->with('success', 'Data Berhasil Disimpan');
        }else{
            return redirect()->route('employees.index')->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['companies'] = Company::all();
        $data['employee'] = Employees::find($id);
        return view('employees.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        $employees = Employees::find($id);
        $employees->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('error', 'Data Berhasil Dihapus');
    }
}
