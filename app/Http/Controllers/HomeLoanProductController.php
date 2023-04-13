<?php

namespace App\Http\Controllers;

use App\Models\HomeLoanProduct;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class HomeLoanProductController extends Controller
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

        if(HomeLoanProduct::updateOrCreate(
            ['client_id' => $request->input('client_id'), 'user_id' => $request->input('user_id')],
            ['client_id' => $request->input('client_id'), 'user_id' => $request->input('user_id'), 'property_value' => $request->input('property_value'), 'down_payment_amount' => $request->input('down_payment_amount')]
        )){
            return redirect('/clients');
        }else{
            return back()->withErrors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeLoanProduct  $homeLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function show(HomeLoanProduct $homeLoanProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeLoanProduct  $homeLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeLoanProduct $homeLoanProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeLoanProduct  $homeLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeLoanProduct $homeLoanProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeLoanProduct  $homeLoanProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeLoanProduct $homeLoanProduct)
    {
        //
    }
}
