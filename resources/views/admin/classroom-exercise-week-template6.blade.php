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
        <li><a href="/admin/weeks/{{$week}}">Week {{$week}}</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Template {{$template}}</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.row { max-width: 1000px; }
</style>
@stop

@section('javascript_include')
<script>
  var OME = OME || {};
  OME.questions = {!!json_encode($questions)!!};
</script>
<script src="/assets/admin/js/classroom-exercise-week-template6.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        
        <h3>Week {{$week}} Template {{$template}}</h3>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>CORRECT</th>
                <th>WRONG</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="question in questions">
                <td class="wrongT6">
                  <div>
                    <input type="text" value="@{{question.correct}}" name="wrongT6" class="form-control" ng-model="questions[$index].correct">
                  </div>
                </td>
                <td class="correctT6">
                  <div>
                    <input type="text" value="@{{question.wrong}}" name="correctT6" class="form-control" ng-model="questions[$index].wrong">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success" ng-click="saveChanges({{$week}}, {{$template}})">Save</button>
            </div>
        </div>

    </div>
</div>
@stop