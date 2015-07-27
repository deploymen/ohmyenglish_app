@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">ASK HENRY</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/ask-henry">Ask Henry</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
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

</script>
<script src="/assets/admin/js/ask-henry.js"></script>
@stop

@section('content')

<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        <select ng-options="status.name for status in ddStatuses" ng-model="ddStatusesSeleted" ng-change="switchStatus()"></select>
    </div>
</div>
<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
        <table>
            <thead>
            <tr style="background-color:#333; color:#FFF">
                <th width="50">ID</th>
                <th width="100">User</th>
                <th width="100">Category</th>
                <th width="500">Question</th>
                <th width="80">Status</th>
                <th width="100" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="q in questions">
                <td>@{{q.id}}</td>
                <td>@{{q.twitter_screen_name}}</td>
                <td>@{{q.category}}</td>
                <td>@{{q.question}}</td>
                <td>@{{q.status}}</td>
                <td><button ng-click="pending(q)">Pending</button></td>
                <td><button ng-click="reply(q)">Reply &amp; Approve</button></td>
                <td><button ng-click="reject(q)">Reject</button></td>
            </tr>
            </tbody>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="pagination">
            <li ng-repeat="p in pages" ng-class="{active:p==paginate.current_page}"><a href="javascript:;" ng-click="fetchQuestions(status, p)">@{{p}}</a></li>
        </ul>
    </div>
</div>
@stop