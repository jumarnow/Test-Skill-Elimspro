<?php

namespace App\Http\Controllers\Api;

use App\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    public function index() {
        $employees = Employees::with('company')->get();
        $dataCount = $employees->count();

        return response()->json([
            'status' => 'success',
            'message' => $dataCount > 0 ? 'Data retrieved successfully.' : 'No data available.',
            'data_count' => $dataCount,
            'data' => $employees,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        $employees = Employees::create($request->all());

        return response()->json([
            'message' => 'Emlpoyee created successfully!',
            'employee' => $employees
        ], 201);
    }
}
