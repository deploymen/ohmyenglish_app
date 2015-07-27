@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">POP QUIZ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/pop-quiz">Pop Quiz</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Week {{$week}}</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
/*.row { max-width: 1000px; }*/
/*input[type="text"] { width: 150px; }*/
</style>
@stop

@section('javascript_include')
<script>
var OME = OME || {};
OME.week = {{$week}};
OME.quizs = {!!json_encode($quizs)!!};


</script>
<script src="/assets/admin/js/pop-quiz-week.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">

        <h3>Pop Quiz Week {{$week}}</h3>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>           
                  <th>Question</th>               
                  <th>Option 1</th>               
                  <th>Option 2</th>               
                  <th>Option 3</th>               
                  <th>Answer</th>                           
              </tr>
            </thead>
            <tbody>
                <tr ng-repeat="quiz in quizs">
                  <td class="question">
                    <div>
                      <input type="text" value="@{{quiz.question}}" name="option1" class="form-control" ng-model="quizs[$index].question">
                    </div>
                  </td>
                  <td class="option1">
                    <div>
                      <input type="text" value="@{{quiz.option1}}" name="option1" class="form-control" ng-model="quizs[$index].option1">
                    </div>
                  </td>                  
                  <td class="option2">
                    <div>
                      <input type="text" value="@{{quiz.option2}}" name="option2" class="form-control" ng-model="quizs[$index].option2">
                    </div>
                  </td>
                  <td class="option3">
                    <div>
                      <input type="text" value="@{{quiz.option3}}" name="option3" class="form-control" ng-model="quizs[$index].option3">
                    </div>
                  </td>
                  <td class="answer">
                    <div>
                      <input type="text" value="@{{quiz.answer}}" name="answer" class="form-control" ng-model="quizs[$index].answer">
                    </div>
                  </td>
                </tr>              
            </tbody>
          </table>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success" ng-click="saveChanges()">Save</button>
            </div>
        </div>

    </div>
</div>
@stop