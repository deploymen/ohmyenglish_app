@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">VIDEO TRAILER</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Video Trailer (MS)</li>
    </ol>
    <div class="clearfix"></div>
</div>
@stop

@section('css_include')
<style type="text/css">
.videoTrailer-Container{ overflow-x: scroll; max-width: 100%; }
input[type="text"] { width: 150px; }
</style>
@stop

@section('javascript_include')
<script>
  var OME = OME || {};
</script>
<script src="/assets/admin/js/video-trailer-ms.js"></script>
@stop

@section('content')
<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        <div class="videoTrailer-Container">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                    <th>Week</th>               
                    <th>Movideo ID</th>               
                    <th>URL Name</th>               
                    <th>Show Time</th>               
                    <th>Meta Title</th>               
                    <th>Meta Description</th>               
                    <th>Title</th>               
                    <th>Description</th>               
                    <th>Share Title</th>               
                    <th>Share Description</th>               
                    <th>Enable</th>               
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="video in videoTrailer">
                    <td class="week">
                      <div>
                        @{{video.week}}
                      </div>
                    </td>
                    <td class="movideo_id">
                      <div>
                        <input type="text" value="@{{video.wrong}}" name="movideo_id" class="form-control" ng-model="video[$index].wrong">
                      </div>
                    </td>
                    <td class="url_name">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="url_name" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="show_time">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="show_time" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="meta_title">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="meta_title" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="meta_desc">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="meta_desc" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="title">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="title" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="desc">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="desc" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="share_title">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="share_title" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="share_desc">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="share_desc" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                    <td class="enable">
                      <div>
                        <input type="text" value="@{{video.clue}}" name="enable" class="form-control" ng-model="video[$index].clue">
                      </div>
                    </td>
                  </tr>              
              </tbody>
            </table>
          </div>
        </div>

        <div class="clearfix">&nbsp;</div>
        
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success" ng-click="saveChanges()">Save</button>
            </div>
        </div>

    </div>
</div>
@stop