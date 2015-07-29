@extends('layouts.master', ['pageTitle' => 'Test Twitter','page' => 'learn'])

@section('meta_include')

@stop

@section('css_include')

@stop

@section('javascript_include') 
<script type="text/javascript" src="{{ asset('assets/js/flash_detect_min.js') }}"></script>

<script type="text/javascript">
var OME = OME || {};

</script>
@stop

@section('content')
<div class="socialContent bgBlueGrey">
Test Twitter
</div>
@stop