@extends('layouts.app')

@section('headTitle', 'ROD')
@section('style')
<link href="{!! asset('css/dataTables.bootstrap4.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')






<div class="container">
    <h1>ROD</h1>

    <a href="rod/create">CREATE</a>

    <table id="rajrod" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Investor Id</th>
                <th>Participant Code</th>
                <th>Branch Code</th>
                <th>Participant Name</th>
                <th>CDS</th>
                <th>Investor Name</th>
                <th>Investor Id</th>
                <th>Participant Code</th>
                <th>Branch Code</th>
                <th>Participant Name</th>
                {{-- <th>CDS</th>
                <th>Investor Name</th>
                <th>Investor Id</th>
                <th>Participant Code</th>
                <th>Branch Code</th>
                <th>Participant Name</th>
                <th>CDS</th>
                <th>Investor Name</th>
                <th>Investor Id</th>
                <th>Participant Code</th>
                <th>Branch Code</th>
                <th>Participant Name</th>
                <th>CDS</th>
                <th>Investor Name</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($rodData as $emp)
            <tr>
            <td>{{ $emp->investor_id }}</td>
            <td>{{ $emp->participant_code }}</td>
            <td>{{ $emp->participant_branch_code }}</td>
            <td>{{ $emp->participant_name }}</td>
            <td>{{ $emp->cds_account_number }}</td>
            <td>{{ $emp->investor_name }}</td>
            <td>{{ $emp->investor_id }}</td>
            <td>{{ $emp->participant_code }}</td>
            <td>{{ $emp->participant_branch_code }}</td>
            <td>{{ $emp->participant_name }}</td>
            {{-- <td>{{ $emp->cds_account_number }}</td>
            <td>{{ $emp->investor_name }}</td>
            <td>{{ $emp->investor_id }}</td>
            <td>{{ $emp->participant_code }}</td>
            <td>{{ $emp->participant_branch_code }}</td>
            <td>{{ $emp->participant_name }}</td>
            <td>{{ $emp->cds_account_number }}</td>
            <td>{{ $emp->investor_name }}</td>
            <td>{{ $emp->investor_id }}</td>
            <td>{{ $emp->participant_code }}</td>
            <td>{{ $emp->participant_branch_code }}</td>
            <td>{{ $emp->participant_name }}</td>
            <td>{{ $emp->cds_account_number }}</td>
            <td>{{ $emp->investor_name }}</td> --}}
            </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <th>Investor Id</th>
                <th>Participant Code</th>
                <th>Branch Code</th>
                <th>Participant Name</th>
                <th>CDS</th>
                <th>Investor Name</th>
            </tr>
        </tfoot> --}}
    </table>
</div>

    @endsection
@section('script')
{{-- <script type="text/javascript" src="{!! asset('js/jquery-3.5.1.min.js') !!}"></script> --}}
<script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/dataTables.bootstrap4.min.js') !!}"></script>

<script>
    
    $(document).ready(function() {
        $('#rajrod').DataTable();
    } );

</script>
@endsection
