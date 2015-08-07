@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Trailer Image</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Trailer Image Detail (MS)</li>
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
<script src="/assets/admin/js/trailer-image-detail.js"></script>
<script>
var OME = OME || {};
OME.trailerMs = {!!json_encode($trailerMs)!!};


</script>
@stop

@section('content')

<div class="row ng-cloak" style="margin:20px -15px;" data-ng-init="init()">
    <div class="col-lg-12">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:1000px" ng-repeat="ms in trailerMs">
            <thead>
                <tr style="background-color:#333; color:#FFF">
                    <th width="180"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Week</td>
                    <td><input name="movideo_id_ms" type="text" size="100%" value="@{{ms.week}}" disabled/></td>
                </tr>
                <tr>
                    <td>Movideo ID</td>
                    <td><input name="movideo_id_ms" type="text" size="100%" value="@{{ms.movideo_id}}" ng-model="trailerMs[$index].movideo_id"/></td>
                </tr>
                <tr>
                    <td>Image Name</td>
                    <td><input name="url_name_ms" type="text" size="100%" value="@{{ms.url_name}}" ng-model="trailerMs[$index].url_name"/></td>
                </tr>
                <tr>
                    <td>Show Time</td>
                    <td><input name="show_time_ms" type="text" size="100%" value="@{{ms.show_time}}" ng-model="trailerMs[$index].show_time"/></td>
                </tr>
                <tr>
                    <td>Meta Title</td>
                    <td><input name="meta_title_ms" type="text" size="100%" value="@{{ms.meta_title}}" ng-model="trailerMs[$index].meta_title" /></td>
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><input name="meta_title_ms" type="text" size="100%" value="@{{ms.meta_desc}}" ng-model="trailerMs[$index].meta_desc" /></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input name="title_ms" type="text" size="100%" value="@{{ms.title}}" ng-model="trailerMs[$index].title"/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="5" cols="100" value="@{{ms.desc}}" ng-model="trailerMs[$index].desc"></textarea></td>
                </tr>
                <tr>
                    <td>Share Title</td>
                    <td><input name="share_title_ms" type="text" size="100%" value="@{{ms.share_title}}" ng-model="trailerMs[$index].share_title"/></td>
                </tr>
                <tr>
                    <td>Share Description</td>
                    <td><input name="share_desc_ms" type="text" size="100%" value="@{{ms.share_desc}}" ng-model="trailerMs[$index].share_desc"/></td>
                </tr>
                <tr>
                    <td>Enable</td>
                    <td><input name="enable_ms" type="text" size="100%" value="@{{ms.enable}}" ng-model="trailerMs[$index].enable"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#F0F2F5">&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <input type="button" value="Save" ng-click="saveTrailerDetail('ms');"/>

    </div>
</div>

@stop