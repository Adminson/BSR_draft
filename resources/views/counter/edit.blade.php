@extends('layouts.app')

@section('headTitle', 'Edit Counter')
@section('style')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <counter-edit :counter="{{json_encode($counter)}}"></counter-edit>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>

</script>
@endsection
