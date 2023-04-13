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
            <form action="/cash-loan" method="POST">
                @csrf
                <p><input type="hidden" name="client_id" value="{{$client->id}}"></p>
                <p><input type="hidden" name="user_id" value="{{ auth()->user()->id }}"></p>
                <p><input placeholder="Loan Amount" type="text" name="loan_amount" value="{{$client->loan_amount}}"></p>
                <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
            </form>
            <h2>Home Loan</h2>
            <form action="/home-loan" method="POST">
                @csrf
                <p><input type="hidden" name="client_id" value="{{$client->id}}"></p>
                <p><input type="hidden" name="user_id" value="{{ auth()->user()->id }}"></p>
                <p><input placeholder="Property Value" type="text" name="property_value" value="{{$client->property_value}}"></p>
                <p><input placeholder="Down Payment Amount" type="text" name="down_payment_amount" value="{{$client->down_payment_amount}}"></p>
                <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
            </form>
        </div>
    </div>
@stop