@extends('layouts.master', ['pageTitle' => trans("learn-article.page"),'page' => 'learn', 'subPage' => 'article'])

@section('meta_include')
    <meta name="description" content="{{trans('learn-article.meta_description')}}">
    <meta name="keywords" content="{{trans('learn-article.meta_keyword')}}">

    <meta property="og:type" content="article"/>
    <meta property="og:keyword" content="{{trans('learn-article.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('learn-article.meta_title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('learn-article.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" />
    <meta name="twitter:title" content="{{trans('learn-article.meta_title')}}">
    <meta name="twitter:description" content="{{trans('learn-article.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('learn-article.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
<link rel="stylesheet" href="{{ asset('assets/css/learn-article.css') }}" />
<style type="text/css">
    .list i.note{ display: none}

</style>
@stop

@section('javascript_include')
<script type="text/javascript">
var OME = OME || {};

</script>
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/learn-article.js') }}"></script>

@stop

@section('content')
<div class="articleContent" ng-init="init()" ng-controller="ArticleController">
    <div class="container intro">
        <h1 class="title alt"><i>{{trans('learn-article.content_title')}}</i></h1>
        <p class="info">
            {{trans('learn-article.content_info')}}
        </p>

    </div>
    <div class="container list">
        <div class="row-centered">
            <div class="col-xs-12 col-sm-4 col-lg-3 col-centered" ng-repeat="article in articles">
                <a href="{{$urlEachBase}}/@{{article.url_slug}}" class="list-thumb">
                    <!-- if new, show note -->
                    <i class='note' ng-class="{show: $index==0}">{{trans('learn-article.new')}}</i>
                    <img src="{{url('/assets/images/article/uploads')}}/@{{article.url_slug}}.thumb.jpg" alt="@{{article.title}}" />
                    <span class="desc">
                        <h2>@{{article.title}}</h2>
                        <i class="date">@{{article.published_at | cmdate:'dd.MM.yyyy'}}</i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="btnWrap"><a href="javascript:;" id="btn-feed-load-more" class="btnZm btn_sm" ng-class="{hide: articlesPaginate.current_page == articlesPaginate.last_page}" ng-click="loadMore()"><span><b>{{trans('learn-article.load_more')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
    </div>

</div>
@stop