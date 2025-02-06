<?php

namespace App\Http\Controllers\Api;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'direktur') {
                return response()->json(['error' => 'Unauthorized access'], 403);
            }
            return $next($request);
        })->only(['store']);
    }

    public function index()
    {
        $companies = Company::all();
        $dataCount = $companies->count();

        return response()->json([
            'status' => 'success',
            'message' => $dataCount > 0 ? 'Data retrieved successfully.' : 'No data available.',
            'data_count' => $dataCount,
            'data' => $companies,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $company = Company::create($request->all());

        return response()->json([
            'message' => 'Company created successfully!',
            'employee' => $company
        ], 201);
    }
}
