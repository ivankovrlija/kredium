@extends('admin')

@section('adminContent')
    <div class="admin-content-wrapper">
        @include('helpers.back')
        <h1>Add Client</h1>
        <div class="admin-form-wrapper">
            @if(count($errors) > 0)
                <ul class="admin-form-error-wrapper">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="/clients" method="POST">
                @csrf
                <p><input placeholder="First Name" type="text" name="first_name"></p>
                <p><input placeholder="Last Name" type="text" name="last_name"></p>
                <p><input placeholder="Email" type="text" name="email"></p>
                <p><input placeholder="Phone" type="text" name="phone"></p>
                <p class="admin-form-submit-wrapper"><input type="submit" value="Add"></p>
            </form>
        </div>
    </div>
@stop