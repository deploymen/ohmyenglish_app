@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">HOME BANNER</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Home Banner</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
td, th{padding: 5px;}
tr:nth-child(even) {background: #EEE}
tr:nth-child(odd) {background: #FFF}
</style>
@stop

@section('javascript_include')
<script src="/assets/admin/js/home-banner.js"></script>
<script>
var OME = OME || {};
OME.banners = {!!json_encode($banners)!!};

</script>
@stop

@section('content')

<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        <button><a href="{{url('/admin/home-banner/create')}}">Create New Banner</a></button>
    </div>
</div>
<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
        <table>
            <thead>
                <tr style="background-color:#333; color:#FFF">
                    <th width="50">ID</th>
                    <th width="300">Title</th>
                    <th width="400">Link</th>
                    <th width="100">Enable</th>
                    <th width="200" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="banner in banners">
                    <td>@{{banner.id}}</td>
                    <td>@{{banner.image_filename}}</td>
                    <td>@{{banner.banner_link}}</td>
                    <td>@{{banner.enable}}</td>
                    <td><button><a href="{{url('/admin/home-banner/edit')}}?id=@{{banner.id}}">Edit</a></button></td>
                   <!--  <td><button><a href="/admin/articles/@{{article.id}}/enable-toogle">Toogle Enable</a></button></td> -->
                    <td><button ng-click="remove(banner.id)">Remove</button></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

@stop