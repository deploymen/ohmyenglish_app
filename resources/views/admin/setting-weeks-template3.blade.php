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
        <li><a href="/admin/weeks/{{$week}}">Week {{$week}}</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Template {{$template}}</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.Template3Set { overflow-x: scroll; max-width: 100%; }
input[type="text"] { width: 150px; }
</style>
@stop

@section('javascript_include')
<script>
  var OME = OME || {};
  OME.questions = {!!json_encode($questions)!!};
</script>
<script src="/assets/admin/js/setting-weeks-template3.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        <div class="Template3Set">
          <h3>Week {{$week}} Template {{$template}}</h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  @for ($i = 0; $i < 5; $i++)
                    <th>SET {{$i+1}}</th>
                  @endfor                    
                </tr>
              </thead>
              <tbody>
                <tr>
                  @for ($i = 0; $i < 5; $i++)
                    <td><table width="100%" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <td width="50%">QUESTION</td>
                          <td width="50%">ANSWER</td>             
                        </tr>                      
                      </thead>  
                      <tbody>
                        <tr ng-repeat="q in questions[{{$i}}]">
                          <td><input type="text" value="@{{q.question}}" class="form-control" ng-model="questions[{{$i}}][$index].question"></td>
                          <td><input type="text" value="@{{q.answer}}" class="form-control" ng-model="questions[{{$i}}][$index].answer"></td>
                        </tr>
                      </tbody>
                    </table></td>
                  @endfor                
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success" ng-click="saveChanges({{$week}}, {{$template}})">Save</button>
            </div>
        </div>

    </div>
</div>
@stop