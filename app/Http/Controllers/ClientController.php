<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        foreach($clients as $client){
            $client['cash_loan'] = 'no';
            $client['home_loan'] = 'no';

            if($client->cashLoanProducts()->get()->count() > 0 && $client->cashLoanProducts()->first()->loan_amount != null){
                $client['cash_loan'] = 'yes';
            }

            if($client->homeLoanProducts()->get()->count() > 0 && ($client->homeLoanProducts()->first()->property_value != null || $client->homeLoanProducts()->first()->down_payment_amount != null)){
                $client['home_loan'] = 'yes';
            }
        }

        return view('admin.clients')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-clients');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required_if:phone,==,null',
            'phone' => 'required_if:email,==,null',
        ]);

        if ( Client::create($request->all()) ) {
            return redirect('/clients');
        } else {
            return back()->withErrors();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $client = Client::find($client->id);

        // add cash loan data to client object
        $cashLoans = $client->cashLoanProducts()->first();
        $client['cash_loans'] = $cashLoans;
        
        // add home loan data to client object
        $homeLoans = $client->homeLoanProducts()->first();
        $client['home_loans'] = $homeLoans;
        
        return view('admin.edit-clients')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required_if:phone,==,null',
            'phone' => 'required_if:email,==,null',
        ]);

        $client = Client::find($client->id);         

        if ( $client->update($request->all()) ) {
            return redirect('/clients');
        } else {
            return back()->withErrors();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client = Client::find($client->id);

        if(!$client) {
            return back()->withErrors('No client found');
        }

        $client->delete();

        return redirect('/clients');
    }
}
