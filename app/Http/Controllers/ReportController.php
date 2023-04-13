<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateReport()
    {
        $user = Auth::user();

        $cash_loans = $user->cashLoanProducts()->get();
        $home_loans = $user->homeLoanProducts()->get();
        
        $data = $cash_loans->concat($home_loans)->sortByDesc('created_at');

        return view('admin.reports')->with('data', $data);
    }
}
