@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">CLASSROOM EXERCISE</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
       <li><a href="/admin/weeks">Classroom Exercise</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Week {{$week}}</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.row { max-width: 1000px; }
.option  { font-size: 15px; text-align: center; height: 50px; line-height: 50px; border: 1px solid #000; }
.template-option{ font-size: 15px; text-align: center; height: 50px; line-height: 50px; }
.template-list:nth-child(even) .template-option{background: #2e2e2e}
.template-list:nth-child(odd) .template-option{background: #e2e2e2}
span.templates { position:absolute;  left: 0;  width:100%;  height:100%; }
.input { padding: 7px; }
</style>
@stop

@section('javascript_include')
<script src="/assets/admin/js/classroom-exercise-week.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        
        <div class="row">
            <div class="template-list col-lg-6">
                @for ($i = 1; $i <= 6; $i++)
                <div class="template-option">
                    <a href="/admin/weeks/{{$week}}/templates/{{$i}}"><span class="templates">TEMPLATE {{$i}}</span></a>
                </div>
                @endfor
            </div>
        </div>
    
    </div>
</div>
@stop