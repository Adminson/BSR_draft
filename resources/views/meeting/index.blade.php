@extends('layouts.app')

@section('headTitle', 'Meeting')
@section('style')
<link href="{!! asset('css/dataTables.bootstrap4.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Meeting</h1>

            <a href="meeting/create">CREATE</a>
            <table id="meetingTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Meeting Name</th>
                        <th>Counter</th>
                        <th>Total Resolution</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meetingList as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->counter_name }}</td>
                            <td>{{ $data->total_no }}</td>
                            <td><a href="meeting/{{ $data->meeting_id }}/edit">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div> 
    </div> 
</div> 
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/dataTables.bootstrap4.min.js') !!}"></script>

<script>
    
    $(document).ready(function() {
        $('#meetingTable').DataTable();
    } );

</script>
@endsection
