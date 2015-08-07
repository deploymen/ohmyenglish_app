@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">POP QUIZ ENABLE</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Pop Quiz Enable</li>
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
<script src="/assets/admin/js/pop-quiz-enable.js"></script>
<script>
var OME = OME || {};
OME.weeks = {!!json_encode($weeks)!!};

</script>
@stop

@section('content')

<div class="row" style="margin:20px -15px;" data-ng-init="init()">
    <div class="col-lg-12">
        <table>
            <thead>
                <tr style="background-color:#333; color:#FFF">
                    <th width="100">Weeks</th>
                    <th width="200">Enable</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="week in weeks">
                    <td>@{{week.week}}</td>
                    <td><input name="enable" type="text" value="@{{week.enable}}" ng-model="weeks[$index].enable"/></td>
                </tr>
            </tbody>
        </table>

        <input type="submit" value="Save" style="margin-top:20px" ng-click="savePopQuizWeeks();">

    </div>
</div>

@stop