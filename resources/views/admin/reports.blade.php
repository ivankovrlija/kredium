@extends('admin')

@section('adminContent')
    <div class="admin-content-wrapper">
        <h1>Report <a href="clients/create">Export Report</a></h1>
        @if($data)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                        <td>Product type</td>
                        <td>Product value</td>
                        <td>Creation date</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                            <tr>
                                @if(isset($value->loan_amount))
                                    <td>Cash</td>
                                    <td>{{ $value->loan_amount }}</td>
                                @else
                                    <td>Home</td>
                                    <td>{{ $value->property_value }} / {{ $value->down_payment_amount }}</td>
                                @endif

                                <td>{{ $value->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        @else
            <p>Currently there is no data to show.</p>
        @endif
    </div>
@stop