@extends('admin')

@section('adminContent')
    <div class="admin-content-wrapper">
        @include('helpers.back')
        <h1>Edit Client</h1>
        <div class="admin-form-wrapper">
            @if(count($errors) > 0)
                <ul class="admin-form-error-wrapper">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <h2>Client Info</h2>
            <form action="/clients/{{$client->id}}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <p><input placeholder="First Name" type="text" name="first_name" value="{{$client->first_name}}"></p>
                <p><input placeholder="Last Name" type="text" name="last_name" value="{{$client->last_name}}"></p>
                <p><input placeholder="Email" type="text" name="email" value="{{$client->email}}"></p>
                <p><input placeholder="Phone" type="text" name="phone" value="{{$client->phone}}"></p>
                <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
            </form>
            <h2>Cash Loan</h2>
            @if($client->cash_loans === null || (auth()->user()->id === $client->cash_loans->user_id && $client->cash_loans != null))
                <form action="/cash-loan" method="POST">
                    @csrf
                    <p><input type="hidden" name="client_id" value="{{$client->id}}"></p>
                    <p><input type="hidden" name="user_id" value="{{ auth()->user()->id }}"></p>
                    @if($client->cash_loans != null)
                    @if(auth()->user()->id === $client->cash_loans->user_id)
                        <p><input placeholder="Loan Amount" type="text" name="loan_amount" value="{{$client->cash_loans->loan_amount}}"></p>
                    @else
                        <p><input placeholder="Loan Amount" type="text" name="loan_amount"></p>
                    @endif

                    @else
                        <p><input placeholder="Loan Amount" type="text" name="loan_amount"></p>
                    @endif
                    <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
                </form>
            @else

            @if(auth()->user()->id != $client->cash_loans->user_id)
                <p>Loan amount: {{ $client->cash_loans->loan_amount }}</p>
            @endif
            

            @endif
            <h2>Home Loan</h2>
            @if($client->home_loans === null || (auth()->user()->id === $client->home_loans->user_id && $client->home_loans != null))
                <form action="/home-loan" method="POST">
                    @csrf
                    <p><input type="hidden" name="client_id" value="{{$client->id}}"></p>
                    <p><input type="hidden" name="user_id" value="{{ auth()->user()->id }}"></p>
                    @if($client->home_loans != null)
                    @if(auth()->user()->id === $client->home_loans->user_id)
                        <p><input placeholder="Property Value" type="text" name="property_value" value="{{$client->home_loans->property_value}}"></p>
                        <p><input placeholder="Down Payment Amount" type="text" name="down_payment_amount" value="{{$client->home_loans->down_payment_amount}}"></p>
                    @else
                        <p><input placeholder="Property Value" type="text" name="property_value"></p>
                        <p><input placeholder="Down Payment Amount" type="text" name="down_payment_amount"></p>
                    @endif
                    
                    @else
                        <p><input placeholder="Property Value" type="text" name="property_value"></p>
                        <p><input placeholder="Down Payment Amount" type="text" name="down_payment_amount"></p>
                    @endif
                    <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
                </form>
            @else

            @if(auth()->user()->id != $client->home_loans->user_id)
                <p>Property value: {{ $client->home_loans->property_value }}</p>
                <p>Down payment amount: {{ $client->home_loans->down_payment_amount }}</p>
            @endif
            
            @endif
        </div>
    </div>
@stop