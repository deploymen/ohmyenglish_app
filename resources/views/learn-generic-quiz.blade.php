@extends('layouts.master', ['pageTitle' => trans("learn-generic-quiz.page"),'page' => 'learn', 'subPage' => 'generic-quiz'])

@section('meta_include')
    <meta name="description" content="{{trans('learn-generic-quiz.meta_description')}}">
    <meta name="keywords" content="{{trans('learn-generic-quiz.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('learn-generic-quiz.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('learn-generic-quiz.meta_title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('learn-generic-quiz.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" />
    <meta name="twitter:title" content="{{trans('learn-generic-quiz.meta_title')}}">
    <meta name="twitter:description" content="{{trans('learn-generic-quiz.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('learn-generic-quiz.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/learn-generic-quiz.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript">
var OME = OME || {};

OME.trackCopy = {
    "category": "{{trans('track.learn_category')}}",

    "learnPersonalityQuiz_action": "{{trans('track.learnPersonalityQuiz_action')}}",
    "learnPersonalityQuiz_firstQuestion_label": "{{trans('track.learnPersonalityQuiz_firstQuestion_label')}}",
    
};

</script>
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/learn-generic-quiz.js') }}"></script>

@stop

@section('content')
<div class="genQuizContent">
    <div class="container intro">
        <div class="title alt"><i>{{trans('learn-generic-quiz.content_title')}}</i></div>
        <p class="info">
            {{trans('learn-generic-quiz.content_info')}}
        </p>



    </div>
    <div class="container quizWrap">
        <h2 class="title">{{trans('learn-generic-quiz.content_sub_title')}}</h2>
        <div class="row-centered">

            <div class="col-xs-12 col-lg-4 col-centered">
                <div class="genQuiz malaysianEnglish">
                    <h3><span>{{trans('learn-generic-quiz.quiz1_title')}}</span></h3>
                    <p class="info">{{trans('learn-generic-quiz.quiz1_info')}}</p>
                    <div class="btnWrap"><a href="{{$urlQuiz1}}" class="btnZm btn_lg btn_quiz1"><span><b>{{trans('learn-generic-quiz.take_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                </div>
            </div>

            <div class="col-xs-12 col-lg-4 col-centered">
                <div class="genQuiz describeYou">
                    <h3><span>{{trans('learn-generic-quiz.quiz2_title')}}</span></h3>
                    <p class="info">{{trans('learn-generic-quiz.quiz2_info')}}</p>
                    <div class="btnWrap"><a href="{{$urlQuiz2}}" class="btnZm btn_lg btn_quiz2"><span><b>{{trans('learn-generic-quiz.take_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                </div>
            </div>

            <div class="col-xs-12 col-lg-4 col-centered">
                <div class="genQuiz perfectJob">
                    <h3><span>{{trans('learn-generic-quiz.quiz3_title')}}</span></h3>
                    <p class="info">{{trans('learn-generic-quiz.quiz3_info')}}</p>
                    <div class="btnWrap"><a href="{{$urlQuiz3}}" class="btnZm btn_lg btn_quiz3"><span><b>{{trans('learn-generic-quiz.take_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                </div>
            </div>

            <!-- <div class="col-xs-12 col-lg-4 col-centered">
                <div class="genQuiz omeCharacter">
                    <h3><span>{{trans('learn-generic-quiz.quiz3_title')}}</span></h3>
                    <p class="info">{{trans('learn-generic-quiz.quiz3_info')}}</p>
                    <div class="btnWrap"><a href="{{$urlQuiz3}}" class="btnZm btn_lg"><span><b>{{trans('learn-generic-quiz.takeQuiz_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                </div>
            </div> -->

        </div>
    </div>

</div>
@stop