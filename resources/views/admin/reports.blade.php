@extends('admin')

@section('adminContent')
    <div class="admin-content-wrapper">
        <h1>Report <button onclick="exportTo('xls');">Export Report</button></h1>
        @if($data)
            <div class="table-wrapper">
                <table class="export-table">
                    <thead>
                        <tr>
                            <th>Product type</th>
                            <th>Product value</th>
                            <th>Creation date</th>
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


<script>
    function exportTo(type) {
        $('.export-table').tableExport({
            filename:'report_%DD%-%MM%-%YY%',
            format: type,
        });
    }
</script>