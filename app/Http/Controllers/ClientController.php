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
        $client['cash_loans'] = $client->cashLoanProducts()->first();

        // add home loan data to client object
        $client['home_loans'] = $client->homeLoanProducts()->first();
        
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
