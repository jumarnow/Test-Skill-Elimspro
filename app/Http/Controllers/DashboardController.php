<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employees;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['jumlahCompany'] = Company::count();
        $data['jumlahEmployees'] = Employees::count();
        return view('dashboard', $data);
    }
}
