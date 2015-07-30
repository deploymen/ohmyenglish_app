@extends('layouts.master', ['pageTitle' => trans("learn-article.page"),'page' => 'learn', 'subPage' => 'article'])

@section('meta_include')
    <meta name="description" content="{!!$article->meta_description!!}">
    <meta name="keywords" content="{{trans('learn-article.meta_keyword')}}">

    <meta property="og:type" content="article"/>
    <meta property="og:keyword" content="{{trans('learn-article.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{!!$article->title!!}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{url('/assets/images/article/uploads')}}/{{$article->url_slug}}.share.jpg"/>
    <meta property="og:description" content='{!!$article->meta_description!!}'/>
    <meta property="og:type" content="article" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" />
    <meta name="twitter:title" content="{!!$article->title!!}">
    <meta name="twitter:description" content='{!!$article->meta_description!!}'>
    <meta name="twitter:keyword" content="{{trans('learn-article.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{url('/assets/images/article/uploads')}}/{{$article->url_slug}}.share.jpg">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('bower_components/cool-share/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/learn-article.css') }}" />

@stop

@section('javascript_include')
<script type="text/javascript">
var OME = OME || {};
OME.articlesMayLike = {!!json_encode($articlesMayLike)!!};
OME.trackCopy = {
    "category": "{{trans('track.learn_category')}}",

    "learnArticle_share_action": "{{trans('track.learnArticle_share_action')}}",
    "learnArticle_share_label": "{{trans('track.learnArticle_share_label')}}",

};

$( document ).ready(function() {
    //
    OME.shareUrl = '{{$url}}';

    $('.btn_share').shareButtons(OME.shareUrl, {
      twitter: {
        text: "{!!$article->title.' '.$shortUrl !!} #ohMyEnglish"
      },
      facebook: true,
      googlePlus: true
    });

    $('.btn_share').click(function(){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnArticle_share_action, OME.trackCopy.learnArticle_share_label, 'userAction');
    });


    $('.showSocialButtons').hover(function(){
        $('.btn_xs').addClass("hovered")
    }, function(){
        $('.btn_xs').removeClass("hovered")
    })
});

</script>
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('bower_components/cool-share/plugin.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/learn-article-each.js') }}"></script>
@stop

@section('content')
<div class="articleContent">
    <!-- Navigations !-->
    <div class="inner-char-navigation">
        <div class="arrow-right"><a class="" href="{{$prevArticleUrl}}"><i class="fa fa-chevron-right"></i></a></div>
        <div class="show-all"><a class="" href="{{$urlList}}"><img src="{{asset('assets/images/'.$lang.'/btn_all.png')}}" /></a></div>
        <div class="arrow-left"><a class="" href="{{$nextArticleUrl}}"><i class="fa fa-chevron-left"></i></a></div>
    </div>

    <div class="container intro">
        <div class="title alt"><i>{!!trans('learn-article.content_title')!!}</i></div>
        <p class="info">
            {!!trans('learn-article.content_info')!!}
        </p>

    </div>
    <div class="container articleMain">
        <div class="articleSingle">
            <div class="iconPen"></div>
            <div class="iconBook"></div>
            <div class="articleHeader">
                <h1>{{$article->title}}</h1>
                <div class="publishDate">{{trans('learn-article.publish')}} {{date("d.m.Y",strtotime($article->published_at))}}</div>
                <div class="btn_share"><a class="btnZm btn_xs"><span><b><i class="fa fa-share left"></i>{{trans('about-inner.char-inner-share')}}</b></span></a></div>
            </div>
            <div class="articleBody">{!!$article->content!!}</div>

        </div>

    </div>

</div>

<div class="articleXsell" style="display:block" ng-init="init()" ng-controller="ArticleController">
    <div class="container">
        <h2 class="title">{{trans('learn-article.list_title')}}</h2>
        <div class="xsellList">
            <div id="articleSlider">
                <ul>
                    <li ng-repeat="article in articlesMayLike track by $index">
                        <a href="@{{article.url_slug}}" class="btnZm btnImg">
                            <img src="/assets/images/article/uploads/@{{article.url_slug}}.xsell.png" alt="@{{article.title}}" />
                            <span><b><h3>@{{article.title}}</h3></b></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <a id="btn-list-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
        <a id="btn-list-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
    </div>
</div>


@stop