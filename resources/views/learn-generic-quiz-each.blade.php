@extends('layouts.master', ['pageTitle' => trans("learn-generic-quiz.page"),'page' => 'learn', 'subPage' => 'generic-quiz'])

@section('meta_include')
    <meta name="description" content="{!!$metaDescription!!}">
    <meta name="keywords" content="{{trans('learn-generic-quiz.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('learn-generic-quiz.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{!!$ogTitle!!}"/>
    <meta property="og:url" content="{{$ogUrl}}"/>
    <meta property="og:image" content="{!!$ogImage!!}"/>
    <meta property="og:description" content="{!!$ogDescription!!}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" />
    <meta name="twitter:title" content="{!!$ogTitle!!}">
    <meta name="twitter:description" content="{!!$ogDescription!!}">
    <meta name="twitter:keyword" content="{{trans('learn-generic-quiz.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{!!$ogImage!!}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('bower_components/cool-share/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/learn-generic-quiz.css') }}" />
    <style type="text/css">
    .quiz-option a{ cursor: pointer; }
    </style>
@stop

@section('javascript_include')
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/cool-share/plugin.js') }}"></script>
<script type="text/javascript">
var OME = OME || {};
OME.shareUrl = '{{$url}}';
OME.shareUrlShort = '{{$shortUrl}}';
OME.questions = {!!$questions!!};
OME.quiz = '{{$quiz}}';
OME.copy = {
    "result1":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result1_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result1_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result1_share_title')!!}"},
    "result2":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result2_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result2_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result2_share_title')!!}"},
    "result3":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result3_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result3_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result3_share_title')!!}"},
    "result4":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result4_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result4_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result4_share_title')!!}"},
    "result5":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result5_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result5_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result5_share_title')!!}"},
    "result6":{'title': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result6_title")!!}', 'info': '{!!trans("learn-generic-quiz.quiz".$quizIndex."_result6_info")!!}', 'share_title': "{!!trans( 'learn-generic-quiz.quiz'.$quizIndex.'_result6_share_title')!!}"}
};
OME.copyTwitter = "{!!$metaDescription!!}"; //same no matter what's the result.

OME.trackCopy = {
    "category": "{{trans('track.learn_category')}}",

    "learnPersonalityQuiz_share_action": "{{trans('track.learnPersonalityQuiz_share_action')}}",
    "learnPersonalityQuiz_share_label": "{{trans('track.learnPersonalityQuiz_share_label')}}",

    "learnPersonalityQuiz_takeOtherQuiz_action": "{{trans('track.learnPersonalityQuiz_takeOtherQuiz_action')}}",
    "learnPersonalityQuiz_takeOtherQuiz_label": "{{trans('track.learnPersonalityQuiz_takeOtherQuiz_label')}}",

    "learnPersonalityQuiz_result1_action": "{{trans('track.learnPersonalityQuiz_result1_action')}}",
    "learnPersonalityQuiz_result1_label": "{{trans('track.learnPersonalityQuiz_result1_label')}}",

    "learnPersonalityQuiz_result2_action": "{{trans('track.learnPersonalityQuiz_result2_action')}}",
    "learnPersonalityQuiz_result2_label": "{{trans('track.learnPersonalityQuiz_result2_label')}}",

    "learnPersonalityQuiz_result3_action": "{{trans('track.learnPersonalityQuiz_result3_action')}}",
    "learnPersonalityQuiz_result3_label": "{{trans('track.learnPersonalityQuiz_result3_label')}}",

    "learnPersonalityQuiz_result4_action": "{{trans('track.learnPersonalityQuiz_result4_action')}}",
    "learnPersonalityQuiz_result4_label": "{{trans('track.learnPersonalityQuiz_result4_label')}}",

    "learnPersonalityQuiz_result5_action": "{{trans('track.learnPersonalityQuiz_result5_action')}}",
    "learnPersonalityQuiz_result5_label": "{{trans('track.learnPersonalityQuiz_result5_label')}}",

    "learnPersonalityQuiz_result6_action": "{{trans('track.learnPersonalityQuiz_result6_action')}}",
    "learnPersonalityQuiz_result6_label": "{{trans('track.learnPersonalityQuiz_result6_label')}}",

};



</script>

<script type="text/javascript" src="{{asset('assets/js/learn-generic-quiz-each.js') }}"></script>
@stop

@section('content')
<div class="genQuizEachContent" ng-init="init()" ng-controller="QuizController">
    <div class="container intro">
        <div class="title alt"><i>{{trans('learn-generic-quiz.content_title')}}</i></div>
    </div>

    <div class="container">
        <div class="quiz-container"><!-- <=== control type 1 - malaysianEnglish, 2 - describeYou, 3 - omeCharacter ,<=== once done - complete -->
            <div class="quizTop">
                <h1>{{trans('learn-generic-quiz.quiz'.$quizIndex.'_title')}}</h1>
                <p class="info">{{trans('learn-generic-quiz.quiz'.$quizIndex.'_info')}}</p>
                <div class="bubble">
                    <span>{{trans('learn-generic-quiz.question')}}</span>
                    <b>@{{curQuestionNo}} / @{{totalQuestion}}</b>
                </div>
            </div>

            <div class="quizBottom disabled"><!-- <=== once submited - disabled -->
                <div class="leftBack"></div>
                <div class="leftFront"></div>

                <div class="rightBack"></div>
                <div class="rightFront"></div>

                <div class="quiz-wrap">
                    <h2 class="quiz-title">@{{onQuestion.question}}</h2>
                    <!-- correct green hover is class "quiz-correct" and wrong is "quiz-wrong". Apply it on the <a class=""> !-->
                    <div class="quiz-option"><a class="option1" ng-click="choose(1)"><span class="quiz-letters">A.</span> @{{onQuestion.option1}}</a></div>
                    <div class="quiz-option"><a class="option2" ng-click="choose(2)"><span class="quiz-letters">B.</span> @{{onQuestion.option2}}</a></div>
                    <div class="quiz-option"><a class="option3" ng-click="choose(3)"><span class="quiz-letters">C.</span> @{{onQuestion.option3}}</a></div>

                </div>
            </div>

            <div class="quiz-container-result result1"><!-- result1, result2, result3, result4, result5, result6 -->
                <div class="bubble">
                    <span>{{trans('learn-generic-quiz.you_are')}}</span>
                </div>
                <div class="leftFront"></div>
                <div class="rightFront"></div>
                <div class="quiz-wrap">
                    <h2>@{{resultCopy.title}}</h2>
                    <p class="info">@{{resultCopy.info}}</p>

                    <div class="btn_share"><a class="btnZm btn_xs"><span><b><i class="fa fa-share left"></i>{{trans('learn-generic-quiz.share_btn')}}</b></span></a></div>
                    <a href="{{$urlIndex}}" class="btnZm btn_lg btn_takeQuiz"><span><b>{{trans('learn-generic-quiz.takeQuiz_btn')}}<i class="fa fa-chevron-right"></i></b></span></a>
                </div>
            </div>
        </div>

    </div>


</div>
@stop