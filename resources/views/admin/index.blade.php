@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Dashboard</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin8/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <!-- <li class="hidden"><a href="javascript:;">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
        </li> -->
        <li class="active">Dashboard</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">

</style>
@stop

@section('javascript_include')
<!-- <script src="/assets/js/.js"></script> -->
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        HELLO
    </div>
</div>
@stop