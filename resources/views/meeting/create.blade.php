@extends('layouts.app')

@section('headTitle', 'Resolution')
@section('urlLink', 'homeraajj')
@section('style')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <meeting-create :counters="{{json_encode($counterList)}}"></meeting-create>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>

</script>
@endsection
