@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">SETTING</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Classroom Exercise&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Setting</li>
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
<script src="/assets/admin/js/setting-weeks-template.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        
        <h3>Week 1 Template 1</h3>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ANSWER</th>
                <th>QUESTION</th>
              </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < 20; $i++)
              <tr>
                <td class="answer">
                  <div class="answer{{$i+1}}">
                    <input type="text" value="" name="answer" class="form-control">
                  </div>
                </td>
                <td class="question">
                  <div class="question{{$i+1}}">
                    <input type="text" value="" name="question" class="form-control">
                  </div>
                </td>
              </tr>
            @endfor
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