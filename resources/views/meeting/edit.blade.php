@extends('layouts.app')

@section('headTitle', 'Edit Meeting')
@section('style')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <meeting-edit :meeting="{{json_encode($meeting)}}"></meeting-edit>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>

</script>
@endsection
