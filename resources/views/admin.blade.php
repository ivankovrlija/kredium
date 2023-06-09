@extends('layout')

@section('content')
    <div class="admin-wrapper">
        @include('sidebar')
        @yield('adminContent')
        <div class="logout-wrapper">
            <form action="/logout" method="POST">
                @csrf
                <input type="submit" class="logout-button" value="Logout">
            </form>
        </div>
    </div>
@stop