@extends('layouts.master', ['pageTitle' => trans("ask-henry.page"),'page' => 'learn', 'subPage' => 'ask-henry'])

@section('meta_include')
    <meta name="description" content="{{trans('ask-henry.meta_description')}}">
    <meta name="keywords" content="{{trans('ask-henry.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('ask-henry.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('ask-henry.meta_title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('ask-henry.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" />
    <meta name="twitter:title" content="{{trans('ask-henry.meta_title')}}">
    <meta name="twitter:description" content="{{trans('ask-henry.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('ask-henry.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/ask-henry.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript">
var OME = OME || {};
OME.twitterConnectUrl = "{{route('twitter.login')}}";
OME.reply = {!!json_encode($reply) or 'null' !!};
OME.trackCopy = {
    "category": "{{trans('track.learn_category')}}",

    "learnAskHenry_connect_action": "{{trans('track.learnAskHenry_connect_action')}}",
    "learnAskHenry_connect_label": "{{trans('track.learnAskHenry_connect_label')}}",

    "learnAskHenry_category_action": "{{trans('track.learnAskHenry_category_action')}}",
    "learnAskHenry_category_label": "{{trans('track.learnAskHenry_category_label', ['category' => '{category}'])}}"
};

</script>
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/ask-henry.js') }}"></script>

@stop

@section('content')
<div class="askhenryContent ng-cloak" ng-init="init()" ng-controller="AskHenryController">
<div class="askhenryContent">
    <div class="container intro">
        <h1 class="title alt"><i>{{trans('ask-henry.content_title')}}</i></h1>
        <p class="info">
            {{trans('ask-henry.content_info')}}
        </p>
        <div class="twitterConnect switchable hide">
            <div class="imgHenry"></div>
            <a class="btnZm btnRed_lg" ng-click="connectTwitter()" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Connect to ask '].join(' | '));"><i class="fa fa-twitter"></i><span>{{trans('ask-henry.btn_connect')}}</span></a>
        </div>
        <div class="twitterSubmit switchable hide">
            <div class="submitHeader">
                <div class="imgMegaphone"></div>
                <div class="logState">{{trans('ask-henry.signin_title')}} <b>@@{{askScreenName}}</b></div>
            </div>
            <textarea class="submitArea" maxlength="130" ng-keyup="askCharCount()" ng-model="askText" placeholder="{{trans('ask-henry.submit_default')}}"></textarea>
            <div class="submitFooter row">
                <div class="maxChar col-xs-12 col-sm-6"><span class="maxNo">@{{askCharLeft}}</span> {{trans('ask-henry.max_char')}}</div>
                <div class="btnWrap col-xs-12 col-sm-6"><a href="javascript:;" ng-click="submitQuestion()" class="btnZm btn_sm"><span><b>{{trans('ask-henry.btn_submit')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

            </div>
        </div>
        <div class="twitterThx switchable ">
            <div class="imgLeft"></div>
            <div class="imgRight"></div>
            <div class="thxWrap">
                <div class="imgTop"></div>
                <h2 class="subTitle">{{trans('ask-henry.thx_title')}}</h2>
                <p class="desc">{{trans('ask-henry.thx_info')}}</p>
                <a href="javascript:;" ng-click="gotIt()" class="btnZm btn_sm"><span><b>{{trans('ask-henry.btn_done')}}<i class="fa fa-chevron-right"></i></b></span></a>
            </div>
        </div>
    </div>
</div>

<div class="qna">
    <div class="qnaList">
        <div class="container">
            <h2 class="title">{{trans('ask-henry.cat_title')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_all')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_vocab')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_grammar')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_idioms')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_advice')}}</h2>
            <h2 class="hide">{{trans('ask-henry.cat_others')}}</h2>
            <div id="listItem" class="listItem">
                <div id="qnaSlider">
                    <ul>
                        <li><a href="javascript:;" class="btnZm all btnQna" ng-click="switchCategory('all')" ng-class="{active:category=='all'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : All'].join(' | '));"><b>{{trans('ask-henry.cat_all_letter')}}</b><span>{{trans('ask-henry.cat_all')}}</span></a></li>
                        <li><a href="javascript:;" class="btnZm vocabulary btnQna" ng-click="switchCategory('vocabulary')" ng-class="{active:category=='vocabulary'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Vocabulary'].join(' | '));"><b>{{trans('ask-henry.cat_vocab_letter')}}</b><span>{{trans('ask-henry.cat_vocab')}}</span></a></li>

                        <li><a href="javascript:;" class="btnZm grammar btnQna" ng-click="switchCategory('grammar')" ng-class="{active:category=='grammar'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Grammar'].join(' | '));"><b>{{trans('ask-henry.cat_grammar_letter')}}</b><span>{{trans('ask-henry.cat_grammar')}}</span></a></li>
                        <li><a href="javascript:;" class="btnZm idioms btnQna" ng-click="switchCategory('idioms')" ng-class="{active:category=='idioms'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Idioms'].join(' | '));"><b>{{trans('ask-henry.cat_idioms_letter')}}</b><span>{{trans('ask-henry.cat_idioms')}}</span></a></li>
                        <li><a href="javascript:;" class="btnZm advice btnQna" ng-click="switchCategory('advice')" ng-class="{active:category=='advice'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Advice'].join(' | '));"><b>{{trans('ask-henry.cat_advice_letter')}}</b><span>{{trans('ask-henry.cat_advice')}}</span></a></li>
                        <li><a href="javascript:;" class="btnZm others btnQna" ng-click="switchCategory('others')" ng-class="{active:category=='others'}" onClick="console.log(['TRACK', 'BM : Ask Henry', 'BM : Others'].join(' | '));"><b>{{trans('ask-henry.cat_others_letter')}}</b><span>{{trans('ask-henry.cat_others')}}</span></a></li>
                    </ul>
                </div>

            </div>
            <a id="btn-list-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
            <a id="btn-list-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
        </div>
    </div>
    <div class="qnacontent">
        <div class="container">
            <!-- qnaGroup  vocabulary, grammar, idioms, advice, others  -->
            <div class="qnaGroup @{{q.category}}" ng-repeat="q in questions" ng-click="readAnswer($event)">
                <div class="question">
                    <div class="username">@@{{q.twitter_screen_name}}</div>
                    <span class="label">{{trans('ask-henry.question_title')}}:</span>
                    <span>@{{q.question.replace('#ohmyenglish','')}}</span>
                </div>
                <div class="answer">
                    <span class="label">{{trans('ask-henry.answer_title')}}:</span>
                    <span><pre>@{{q.answer}}</pre></span>
                </div>
            </div>

            <div class="qnaGroup no-result @{{category}}" ng-if="questions.length == 0">
                {{trans('ask-henry.no_result')}}
            </div>

        </div>
    </div>
    <div class="pegination">
        <div class="container">
            <ul class="pegiList display-lg">
                <li><a href="javascript:;" class="btnPegi" ng-repeat="n in [] | range:lgNavLength" value="X" ng-class="{active:(lgNavStart + n)==page}" ng-click="fetchQuestions(category, lgNavStart + n)">@{{lgNavStart + n}}</a></li>
            </ul>
            <ul class="pegiList display-sm">
                <li><a href="javascript:;" class="btnPegi" ng-repeat="n in [] | range:smNavLength" value="X" ng-class="{active:(smNavStart + n)==page}" ng-click="fetchQuestions(category, smNavStart + n)">@{{smNavStart + n}}</a></li>
            </ul>
            <ul class="pegiList display-xs">
                <li><a href="javascript:;" class="btnZm btn_sm" ng-click="loadMore()"><span><b>{{trans('ask-henry.btn_more')}}<i class="fa fa-chevron-right"></i></b></span></a></li>
            </ul>
            <div class="arrowForward">
                <!-- <a href="javascript:;" class="fastForward disable"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i></a> -->
                <a href="javascript:;" class="backward" ng-click="fetchQuestions(category, page - 1)"><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="arrowBackward">
                <a href="javascript:;" class="forward" ng-click="fetchQuestions(category, page + 1)"><i class="fa fa-chevron-right"></i></a>
                <!-- <a href="javascript:;" class="fastBackward"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a> -->
            </div>
        </div>
    </div>
</div>
</div>
@stop