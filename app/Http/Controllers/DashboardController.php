<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Auth::user()->companies;
        return view('dashboard.home', ['companies' => $companies]);
    }
}
