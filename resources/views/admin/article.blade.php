@extends('layouts.master-admin')

@section('breadcrumb')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">ARTICLE</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-left">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/admin/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="/admin/ask-henry">Article</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
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
OME.articles = {!!json_encode($articles)!!};

</script>
<script src="/assets/admin/js/article.js"></script>
@stop

@section('content')

<div class="row" data-ng-init="init()">
    <div class="col-lg-12">
        <button><a href="{{url('/admin/articles/create')}}">Create New Article</a></button>
    </div>
</div>
<div class="row" style="margin:20px -15px;">
    <div class="col-lg-12">
        <table>
            <thead>
            <tr style="background-color:#333; color:#FFF">
                <th width="50">ID</th>
                <th width="300">Title</th>
                <th width="400">Content</th>
                <th width="100">Enable</th>
                <th width="200" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="article in articles">
                <td>@{{article.id}}</td>
                <td>@{{article.title}}</td>
                <td>@{{article.intro}}</td>
                <td>@{{article.enable}}</td>
                <td><button><a href="/en/learn/fun-reads/@{{article.url_slug}}?preview=1" target="_blank">View Article</a></button></td>
                <td><button><a href="/admin/articles/@{{article.id}}/edit">Edit</a></button></td>
                <td><button><a href="/admin/articles/@{{article.id}}/enable-toogle">Toogle Enable</a></button></td>
                <td><button ng-click="remove(article.id)">Remove</button></td>
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