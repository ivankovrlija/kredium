@extends('admin')

@section('adminContent')
    <div class="admin-content-wrapper">
        <h1>Clients <a href="clients/create">Create Client</a></h1>
        @if(count($clients) > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Cash Loan</td>
                        <td>Home Loan</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}.</td>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->cash_loan }}</td>
                                <td>{{ $client->home_loan }}</td>
                                <td><a href="/clients/{{$client->id}}"><img src="/assets/edit.png" alt="edit Icon" class="edit-logo"></a></td>
                                <td>
                                    <form action="/clients/{{$client->id}}" method="POST">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <input type="image" src="/assets/delete.png"></input>
                                    </form>
                                    <a href=""></a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        
        @else
            <p>Currently there is no clients to show.</p>
        @endif
    </div>
@stop