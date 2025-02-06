<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct()
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role !== 'direktur') {
            return redirect()->route('company.index')->with('error', 'Unauthorized access');
        }
        return $next($request);
    })->only(['create', 'edit', 'destroy']);
}

    public function index()
    {
        return view('company.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $companies = Company::all();
            return DataTables::of($companies)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    if (auth()->user()->role === 'direktur') {
                        $actionBtn = '
                            <div class="btn-group">
                                <a href="' . url('company', $row->id) .'/edit' . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                <button type="button" class="btn_delete_modal_href btn btn-xs btn-danger" data-url_modal="' . url('company', $row->id) . '"><i class="fa fa-trash"></i></button>
                            </div>
                        ';
                    } else {
                        $actionBtn = '
                        ';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.form');
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
            'name' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
        ]);

        Company::create($request->all());

        if($request->action == 'Simpan & Buat Lagi'){
            return redirect()->route('company.create')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('company.index')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['company'] = Company::find($id);
        return view('company.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $company = Company::find($id);
        $company->update($request->all());

        return redirect()->route('company.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('company.index')->with('error', 'Data berhasil dihapus');
    }
}
