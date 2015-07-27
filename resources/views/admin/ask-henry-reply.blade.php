@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">ASK HENRY REPLY</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/ask-henry">Ask Henry</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Reply</li>
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
<script>
var OME = OME || {};
OME.question = {!!$question!!};

</script>
<script src="/assets/admin/js/ask-henry-reply.js"></script>
@stop

@section('content')
<div class="row" style="margin-top:20px;" data-ng-init="init()">
    <div class="col-lg-12">
        <table>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>@{{question.id}}</td>
                </tr>
                <tr>
                    <td>NAME</td>
                    <td>@{{question.twitter_screen_name}}</td>
                </tr>
                <tr>
                    <td>QUESTION</td>
                    <td><input type="text" ng-model="question.question" style="width:100%" /></td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>@{{question.status}}</td>
                </tr> 
                <tr>
                    <td>Category</td>
                    <td><select ng-options="category.id as category.name for category in ddCategory" ng-model="question.category"></select></textarea></td>
                </tr>  
                <tr>
                    <td>REPLY</td>
                    <td><textarea cols="80" rows="5" ng-model="question.answer"></textarea></td>
                </tr>                                                                               
            </tbody>                        
        </table>

        <button ng-click="reply()">Reply &amp; Approve</button>
    </div>
</div>
@stop
