@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">ABOUT</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>About Characters</li>
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
<script src="/assets/admin/js/about-characters.js"></script>
<script>
var OME = OME || {};
OME.charactersEn = {!!json_encode($charactersEn)!!};
OME.charactersMs = {!!json_encode($charactersMs)!!};

</script>
@stop

@section('content')

<div class="row" style="margin:20px -15px;" data-ng-init="init()">
    <div class="col-lg-12">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
                <tr style="background-color:#333; color:#FFF">
                    <th width="150">ID</th>
                    <th width="150">Character Name</th>
                    <th>Quote</th>
                    <th>Side Story</th>
                    <th width="100">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="en in charactersEn">
                    <td>@{{en.id}}</td>
                    <td>@{{en.name}}</td>
                    <td>@{{en.quote}}</td>
                    <td>@{{en.side_story}}</td>
                    <td align="center"><button><a href="{{url('/admin/about-characters/edit')}}?id=@{{en.id}}">Edit</a></button></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

@stop