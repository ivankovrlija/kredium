<?php

namespace App\Http\Controllers;

use App\Models\CashLoanProduct;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class CashLoanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'client_id' => 'required',
            'user_id' => 'required'
        ]);

        $client = Client::find($request->input('client_id'));

        if(!$client) {
            return back()->withErrors();
        }

        $user = User::find($request->input('user_id'));

        if(!$user) {
            return back()->withErrors();
        }

        if(CashLoanProduct::updateOrCreate(
            ['client_id' => $request->input('client_id'), 'user_id' => $request->input('user_id')],
            ['client_id' => $request->input('client_id'), 'user_id' => $request->input('user_id'), 'loan_amount' => $request->input('loan_amount')]
        )){
            return redirect('/clients');
        }else{
            return back()->withErrors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashLoanProduct  $cashLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CashLoanProduct $cashLoanProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashLoanProduct  $cashLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CashLoanProduct $cashLoanProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashLoanProduct  $cashLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashLoanProduct $cashLoanProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashLoanProduct  $cashLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashLoanProduct $cashLoanProduct)
    {
        //
    }
}
