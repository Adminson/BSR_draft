

@extends('layouts.app')

@section('headTitle', 'Home')
@section('urlLink', 'rod')
@section('style')
@endsection
@section('content')


<h1>create</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <rod-create></rod-create>
        </div>
    </div>
</div>



@endsection
@section('script')

<script>
    window.Laravel = '<?php echo json_encode(['csrfToken' => csrf_token(),]); ?>';
</script>

@endsection
