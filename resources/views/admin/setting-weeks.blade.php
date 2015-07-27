@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">SETTING</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
       <li><a href="/admin/">Weeks</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Week {{$week}}</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.row { max-width: 1200px; }
.option  { font-size: 15px; text-align: center; height: 50px; line-height: 50px; border: 1px solid #000; }
.template-option  { font-size: 15px; text-align: center; height: 50px; line-height: 50px; border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; }
.last-row { border-bottom: 1px solid #000; }
span.templates { position:absolute;  left: 0;  width:100%;  height:100%; }
.input { padding: 7px; }
</style>
@stop

@section('javascript_include')
<script src="/assets/admin/js/setting-weeks.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group option">
                            <input type="radio" name="radio-btn" value="on">&nbsp;On <span style="padding-left: 25px"></span>
                            <input type="radio" name="radio-btn" value="off" checked>&nbsp;Off
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option">Classroom Exercise</div>
                    </div>
                </div>
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

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option">Video Trailer</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option input title">
                            <input type="text" value="" placeholder="Title" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option input video_id">
                            <input type="text" value="" placeholder="Video ID" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option input description">
                            <input type="text" value="" placeholder="Description" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="template-option last-row input url_trail">
                            <input type="text" value="" placeholder="URL Trail" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="clearfix">&nbsp;</div>
                
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <button type="submit" class="btn btn-success" ng-click="save()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@stop