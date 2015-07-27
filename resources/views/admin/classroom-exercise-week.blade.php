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
.template-option  { font-size: 15px; text-align: center; height: 50px; line-height: 50px; border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; }
.last-row { border-bottom: 1px solid #000; }
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
            <div class="col-lg-6">
                @for ($i = 0; $i < 5; $i++)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option">
                            <a href="/admin/weeks/{{$week}}/t{{$i+1}}"><span class="templates">Template {{$i+1}}</span></a>
                        </div>
                    </div>
                </div>
                @endfor
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option last-row">
                            <a href="/admin/weeks/{{$week}}/t6"><span class="templates">Template 6</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@stop