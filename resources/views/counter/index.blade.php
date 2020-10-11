@extends('layouts.app')

@section('headTitle', 'Counter')
@section('style')
<link href="{!! asset('css/dataTables.bootstrap4.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Counter</h1>

            <a href="counter/create">CREATE</a>
            <table id="counterTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>InCounter Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($counterData as $data)
                    <tr>
                    <td>{{ $data->counter_name }}</td>
                    <td>{{ $data->description }}</td>
                    <td><a href="counter/{{ $data->counter_id }}/edit">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div> 
    </div> 
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/dataTables.bootstrap4.min.js') !!}"></script>

<script>
    
    $(document).ready(function() {
        $('#counterTable').DataTable();
    } );

</script>
@endsection
