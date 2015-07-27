@extends('layouts.master', ['pageTitle' => trans("pop-quiz.page"),'page' => 'learn', 'subPage' => 'pop-quiz'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1" />

    <meta name="description" content="{{trans('pop-quiz.meta_description', ['week' => $curWeek])}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('pop-quiz.title', ['week' => $curWeek])}}"/>
    <meta property="og:url" content="{!!$url!!}"/>
    <meta property="og:image" content="{{asset('assets/images/ome_logo.png')}}"/>
    <meta property="og:description" content="{{trans('pop-quiz.meta_description', ['week' => $curWeek])}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{!!$url!!}">
    <meta name="twitter:title" content="{{trans('pop-quiz.title', ['week' => $curWeek])}}">
    <meta name="twitter:description" content="{{trans('pop-quiz.meta_description', ['week' => $curWeek])}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/ome_logo.png')}}">

@stop

@section('css_include')
	<link rel="stylesheet" href="{{ asset('assets/css/learn.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pop-quiz.css') }}" />

@stop

@section('javascript_include')
    <script type="text/javascript">
	var OME = OME || {};
        OME.baseUrl = '{{url()}}';
        OME.curWeek = {{$curWeek}};
        OME.weeksAvailable = {!!json_encode($weeksAvailable)!!};
        OME.popQuizs = {!!json_encode($popQuizs)!!};
        OME.copyBubble = {
            "default": "{{trans('pop-quiz.answer-default')}}",
            "correct": "{{trans('pop-quiz.answer-correct')}}",
            "wrong": "{{trans('pop-quiz.answer-wrong')}}",

            "low_score_bubble": "{{trans('pop-quiz.low-score-bubble-txt')}}",
            "medium_score_bubble": "{{trans('pop-quiz.medium-score-bubble-txt')}}",
            "high_score_bubble": "{{trans('pop-quiz.high-score-bubble-txt')}}",

            "low_score": "{{trans('pop-quiz.low-score-txt')}}",
            "medium_score": "{{trans('pop-quiz.medium-score-txt')}}",
            "high_score": "{{trans('pop-quiz.high-score-txt')}}"
        };
        OME.trackCopy = {
            "category": "{{trans('track.learn_category')}}",

            "learnPopQuiz_nthCompletion_action": "{{trans('track.learnPopQuiz_nthCompletion_action')}}",
            "learnPopQuiz_nthCompletion_label": "{{trans('track.learnPopQuiz_nthCompletion_label', ['nth' => '{nth}'])}}",

            "learnPopQuiz_lastCompletion_action": "{{trans('track.learnPopQuiz_lastCompletion_action')}}",
            "learnPopQuiz_lastCompletion_label": "{{trans('track.learnPopQuiz_lastCompletion_label')}}"
        };

	</script>

    <script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/shuffle-array/dist/shuffle-array.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/learn-pop-quiz.js')}}"></script>

@stop

@section('content')
<div class="quizContent ng-cloak" ng-init="init()" ng-controller="PopQuizController">
    <div class="container">
		<h1 class="title alt"><i>{{trans('pop-quiz.pop_quiz_title')}}</i></h1>
        <p class="info">
            {{trans('pop-quiz.pop_quiz_info')}}
        </p>

        <div class="quiz-container disabled"  style="display:block">
            <div class="quiz-wrap">
            	<h2 class="quiz-title">@{{onQuestion.question}}</h2>
                <!-- correct green hover is class "quiz-correct" and wrong is "quiz-wrong". Apply it on the <a class=""> !-->
                <div class="quiz-option"><a class="option1" ng-click="choose($event, 1)"><span class="quiz-letters">A.</span> @{{onQuestion.option1}}</a></div>
                <div class="quiz-option"><a class="option2" ng-click="choose($event, 2)"><span class="quiz-letters">B.</span> @{{onQuestion.option2}}</a></div>
                <div class="quiz-option"><a class="option3" ng-click="choose($event, 3)"><span class="quiz-letters">C.</span> @{{onQuestion.option3}}</a></div>

                <div class="quiz-notepad sprite-pop-quiz">
                	<h2 class="notepad-title">{{trans('pop-quiz.notepad-week')}} {{$curWeek}}</h2>
                	<div class="question">{{trans('pop-quiz.notepad-question')}}</div>
                    <div class="question-number">@{{curQuestionNo}} / @{{totalQuestion}}</div>
                </div>

                <!-- sprite default : default, sprite correct : bubble-correct, sprite wrong : wrong !-->
                <div class="character default" style="display:block">
                	<div class="quiz-character-content">
                    	<div class="ribbon sprite-pop-quiz"></div>
                        <div class="sprite-pop-quiz bubble answer-wrong">@{{characterRespond}}</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="quiz-container-result hide">
        	<div class="quiz-notepad sprite-pop-quiz">
            	<!-- Backend to update the week and the question number below !-->
            	<h2 class="notepad-title">{{trans('pop-quiz.notepad-week')}} {{$curWeek}}</h2>
            </div>
            <div class="white-board">
                <div class="whiteboard-border"></div>
                <div class="whiteboard-content">
                	<h2 class="score-title">{{trans('pop-quiz.score-title')}}</h2>
                    <!-- Backend to update , medium-score, medium-score, or high-score !-->
                    <div class="score-content medium-score">
                    	<!-- Backend to update score !-->
                    	<!-- <h1 class="score-value">@{{totalCorrect}} / @{{totalQuestion}}</h1> -->
                    	<div class="right-ribbon sprite-pop-quiz"></div>
                        <div class="left-ribbon sprite-pop-quiz"></div>
                         <!-- Backend to update , medium-score, medium-score, or high-score !-->
                        <h2 class="try-harder">@{{resultText}}</h2>
                        <span class="whiteboard-info">{{trans('pop-quiz.whiteboard-info-txt-1')}}<br/>{{trans('pop-quiz.whiteboard-info-txt-2')}}</span>
                        <br/><br/>
                        <span class="fa fa-chevron-down"></span>
                    </div>
                </div>
                <div class="whiteboard-border"></div>
            </div>
            <div class="orange-spacer"></div>
            <!-- Backend to update , low-score, medium-score, or high-score !-->
            <div class="quiz-results-anusha">
            	<div class="item-left-1 sprite-pop-quiz"></div>
                <div class="item-left-2 sprite-pop-quiz"></div>
                <div class="bubble sprite-pop-quiz">@{{resultTextBubble}}</div>
            </div>
            <!-- Backend to update , low-score, medium-score, or high-score !-->
            <div class="quiz-results-zack">
            	<div class="item-right-1 sprite-pop-quiz"></div>
            </div>
        </div>
    </div>
</div>

<div class="learnList" ng-init="init()" ng-controller="PopQuizWeekListController">
    <div class="container">
        <h2 class="title">{{trans('pop-quiz.list_title')}}</h2>
        <div id="listItem" class="listItem">
          <div id="learnSlider">
                <ul>
                    <li ng-repeat="week in weeksAvailable">
                       <a href="@{{ (+week.enable)?week.week:'#' }}" class="btnZm btnWeek"
                            ng-class="{'active':week.week == curWeek, 'locked': +week.enable==0}">
                            <span>{{trans('learn-exercise.week')}}<b>@{{week.week}}</b></span></a>
                    </li>
                </ul>
            </div>

        </div>
        <a id="btn-list-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
        <a id="btn-list-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
    </div>
</div>

@stop