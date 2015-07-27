@extends('layouts.master', ['pageTitle' => trans("learn-exercise.page"),'page' => 'learn', 'subPage' => 'classroom-exercises'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1" />

    <meta name="description" content="{{trans('learn-exercise.meta_description', ['week' => $curWeek])}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('global.meta_title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/ome_logo.png')}}"/>
    <meta property="og:description" content="{{trans('global.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta property="twitter:url" content="{{$url}}"/>
    <meta name="twitter:title" content="Oh My English! Season 4">
    <meta name="twitter:description" content="{{trans('global.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/ome_logo.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/learn.css') }}" />
    <style type="text/css">
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
          display: none !important;
        }
    </style>
@stop

@section('javascript_include')
    <script type="text/javascript">
        var OME = OME || {};
        OME.baseUrl = '{{url()}}';
        OME.curWeek = {{$curWeek}};
        OME.weeksAvailable = {!!json_encode($weeksAvailable)!!};
        OME.exercises = {!!json_encode($exercises)!!};
        OME.copy = {
            "yup": "{!!trans('learn-exercise.yup')!!}",
            "tpl1_ops": "{{trans('learn-exercise.tmpl1_message_ops')}}",
            "tpl2_ops1": "{{trans('learn-exercise.tmpl2_message_ops_1')}}",
            "tpl2_ops2": "{{trans('learn-exercise.tmpl2_message_ops_2')}}",
            "tpl3_ops": "{{trans('learn-exercise.tmpl3_message_ops')}}",
            "tpl4_guide": "{{trans('learn-exercise.tmpl4_guide')}}",
            "tpl4_ops": "{{trans('learn-exercise.tmpl4_message_ops')}}",
            "did_well_1": "{{trans('learn-exercise.did_well_1')}}",
            "did_well_2": "{{trans('learn-exercise.did_well_2')}}",
            "did_well_3": "{{trans('learn-exercise.did_well_3')}}",
        };
        OME.trackCopy = {
            "category": "{{trans('track.learn_category')}}",

            "learnExercise_nthCompletion_action": "{{trans('track.learnExercise_nthCompletion_action')}}",
            "learnExercise_nthCompletion_label": "{{trans('track.learnExercise_nthCompletion_label', ['nth' => '{nth}'])}}",

            "learnExercise_lastCompletion_action": "{{trans('track.learnExercise_lastCompletion_action')}}",
            "learnExercise_lastCompletion_label": "{{trans('track.learnExercise_lastCompletion_label')}}",

            "learnExercise_tmpl_action": "{{trans('track.learnExercise_tmpl_action')}}",
            "learnExercise_tmpl_label": "{{trans('track.learnExercise_tmpl_label', ['template' => '{template}'])}}"
        };

        $('.goList').on('click',function(ev){
            ev.preventDefault();
            var ListTop = $('.listItem').offset().top;
            console.log(ListTop);
            $("html, body").animate({ scrollTop: ListTop });
        });


    </script>
    <script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/angular-sanitize/angular-sanitize.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/shuffle-array/dist/shuffle-array.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/learn-exercise.js')}}?r={{time()}}"></script>

@stop

@section('content')
<div class="learnContent" ng-init="init()" ng-controller="ExerciseController">
    <div class="container">
        <h1 class="title alt"><i>{{trans('learn-exercise.content_title')}}</i></h1>
        <p class="info">
            {{trans('learn-exercise.content_info')}}
        </p>

        <!-- template wrapper -->
        <div class="exercises ng-cloak"><!-- template1,template2,template3,template4,template5,template6,templateResult  -->
            <div class="score"><span>{{trans('learn-exercise.question')}} <b>@{{curQuestion}} / @{{totalQuestion}} </b></span></div>
            <div class="scoreResult"><span>{{trans('learn-exercise.result')}}</span></div>
            <div class="imgNote"></div>
            <div class="imgLaptop"></div>
            <div class="resultBgLeft"></div>
            <div class="resultBgRight"></div>
            <h2 class="title">{{trans('learn-exercise.week')}} @{{curWeek}}</h2>
            <!-- template 1 -->
            <div class="content wrap1 hide"><!-- hide -->
                <p class="info">{{trans('learn-exercise.tmpl1_description')}}</p>
                <div class="displayText">@{{onQuestion.wrong}}</div>
                <div class="hint">{{trans('learn-exercise.tmpl1_clue')}}: <span>@{{onQuestion.clue}}</span></div>
                <div class="submitWrap">
                    <input type="text" class="submit" ng-enter="tpl1Submit()" />
                    <div class="correct"><!-- hide  --><span><i class='fa fa-check'></i></span></div>
                    <div class="wrong "><!-- hide --><span><i class='fa fa-times'></i></span></div>
                </div>
                <div class="answer"><span ng-bind-html="onAnswer.message"></span></div>

                <div class="btnWrap btnNext hide"><!-- hide --><a class="btnZm btn_sm" ng-click="nextQuestion()"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                <div class="btnWrap btnSubmit"><!-- hide --><a class="btnZm btn_sm" ng-click="tpl1Submit()"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
            </div>
            <!-- template 1 -->

            <!-- template 2 -->
            <div class="content wrap2 hide"><!-- hide -->
                <a ng-click="tpl2Answer(true)" class="choice btnLeft"></a>
                <a ng-click="tpl2Answer(false)" class="choice btnRight "></a>

                <p class="info">{{trans('learn-exercise.tmpl2_description')}}</p>
                <div class="displayText">@{{onQuestion.display}}</div>
                <div class="answer"><span ng-bind-html="onAnswer.message"></span></div>

                <div class="submitWrap">
                    <div class="correct"><!-- hide/active --><span><i class='fa fa-check'></i></span><b>{{trans('learn-exercise.correct')}}</b></div>
                    <div class="wrong "><!-- hide/active --><span><i class='fa fa-times'></i></span><b>{{trans('learn-exercise.wrong')}}</b></div>
                </div>

                <div class="btnWrap btnNext hide"><!-- hide --><a ng-click="nextQuestion()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                <div class="btnWrap btnSubmit"><!-- hide --><a class="btnZm btn_sm" ng-click="tpl2Submit()"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

            </div>
            <!-- template 2 -->

            <!-- template 3 -->
            <!-- drag/drop - touchpunch -->
            <div class="content wrap3 hide"><!-- hide -->
                <p class="info">
                    <span class='mbl_hide'>{{trans('learn-exercise.tmpl3_description')}}</span>
                    <span class='mbl_show'>{{trans('learn-exercise.tmpl3_description_mobile')}}</span>
                </p>
                <div class="dragContainer options">
                    <div id="dragBox" class="ui-widget-content ui-draggable" ng-repeat="question in onQuestion.displays track by $index"><span>@{{question.answer}}</span></div>
                </div>
                <div class="dropContainer">
                    <!-- drop -->
                    <div class="dropCol" ng-repeat="question in onQuestion.question track by $index">
                        <div class="dropGroup">
                            <div class="dropTitle"><span>@{{question.question}}</span></div>
                            <div class="dropInfo">
                                <b>Answer</b>
                                <div class="dropBox"><!-- dropped/active/bingo/ops -->
                                    <span></span><!-- answer/blank -->
                                    <div class="correct"><span><i class='fa fa-check'></i></span></div>
                                    <div class="wrong"><span><i class='fa fa-times'></i></span></div>
                                </div>
                                <select class="hide selectBox">
                                    <option>Select one</option>
                                    <option ng-repeat="opt in onQuestion.displays track by $index"> @{{opt.answer}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="answer hide">{{trans('learn-exercise.right_answer_is')}}<span>@{{question.answer}}</span></div>
                    </div>
                    <!-- drop -->


                </div>

                <div class="alert"><!-- answer/blank -->@{{onAnswer.message}}</div>
                <div class="btnWrap btnNext hide"><!-- hide --><a ng-click="nextQuestion()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                <div class="btnWrap btnSubmit"><!-- hide --><a ng-click="tpl3Submit()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
            </div>
            <!-- template 3 -->

            <!-- template 4 -->
            <div class="content wrap4 hide"><!-- hide -->
                <p class="info">
                    <span class='mbl_hide'>{{trans('learn-exercise.tmpl4_description')}}</span>
                    <span class='mbl_show'>{{trans('learn-exercise.tmpl4_description_mobile')}}</span>
                </p>
                <div class="dragContainer mbl_hide2">
                    <div id="dragBox" class="ui-widget-content ui-draggable"  ng-repeat="q in onQuestion.display track by $index"><span>@{{q}}</span></div>
                </div>
                <div class="dropContainer">

                    <!-- drop1 -->
                    <div class="dropCol" ng-repeat="q in onQuestion.question track by $index">
                        <div class="dropGroup">
                            <div class="dropInfo mbl_hide2"><span></span></div>
<!--                             <select class="mbl_show selectBox">
                                <option>Select one</option>
                                <option ng-repeat="a in onQuestion.display track by $index">@{{a}}</option>
                            </select> -->
                            <div class="dropIcon"><i></i></div>
                        </div>
                        <div class="answer hide">@{{q}}<!-- answer/blank --></div>
                    </div>
                    <!-- drop1 -->

                </div>

                <div class="submitWrap hide">
                    <div class="correct hide"><!-- hide/active --><span><i class='fa fa-check'></i></span><b>Correct</b></div>
                    <div class="wrong "><!-- hide/active --><span><i class='fa fa-times'></i></span><b>Wrong</b></div>
                </div>

                <div class="alert"><!-- answer/blank -->@{{onAnswer.message}}</div>
                <div class="btnWrap btnNext hide"><!-- hide --><a ng-click="nextQuestion()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                <div class="btnWrap btnSubmit"><!-- hide --><a ng-click="tpl4Submit()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

            </div>
            <!-- template 4 -->

            <!-- template 5 -->
            <div class="content wrap5 hide"><!-- hide -->

                <p class="info">{{trans('learn-exercise.tmpl5_description')}}</p>

                <div class="sortContainer user-answer">
                    <div id="dragBox" class="ui-widget-content ui-draggable" ng-repeat="word in onQuestion.display track by $index"><span>@{{word}}</span></div>
                </div>
                <div class="answer hide">{{trans('learn-exercise.wrong_answer_type1')}}<span></span><!-- answer/blank --></div>

                <div class="btnWrap ">
                    <div class="correct hide"><!-- hide/active --><span><i class='fa fa-check'></i></span><b>Correct</b></div>
                    <div class="wrong hide"><!-- hide/active --><span><i class='fa fa-times'></i></span><b>Wrong</b></div>
                </div>

                <div class="btnWrap btnNext hide"><!-- hide --><a ng-click="nextQuestion()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                <div class="btnWrap btnSubmit"><!-- hide --><a ng-click="tpl5Submit()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
            </div>
            <!-- template 5 -->

            <!-- template 6 -->
            <div class="content wrap6 hide"><!-- hide -->

                <p class="info">{{trans('learn-exercise.tmpl6_description')}}</p>
                <div class="row">
                    <div class="selectContainer">
                        <a class="selectBtn" ng-click="tpl6Answer($event, word.isAnswer)" ng-repeat="word in onQuestion.words track by $index"><span>@{{word.text}}</span></a>
                    </div>
                </div>


                <div class="row resultWrap "><!-- hide -->
                    <div class="correct hide"><!-- hide --><span><i class='fa fa-check'></i></span></div>
                    <div class="wrong hide"><!-- hide --><span><i class='fa fa-times'></i></span></div>
                    <div class="answer">
                        <span ng-bind-html="onQuestion.correct"><!-- answer/blank --></span>
                    </div>
                </div>
                <div class="wrongMsg">{{trans('learn-exercise.tmpl6_message')}}</div>

                <div class="btnWrap btnNext hide"><!-- hide --><a ng-click="nextQuestion()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.next_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                <div class="btnWrap btnSubmit"><!-- hide --><a ng-click="tpl6Submit()" class="btnZm btn_sm"><span><b>{{trans('learn-exercise.submit_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
            </div>
            <!-- template 6 -->

            <!-- end -->
            <div class="content wrapResult"><!-- hide -->
                <div class="resultBoard">
                    <div class="boardWrap">
                        <div class="resultScore">
                            <span>{{trans('learn-exercise.your_score')}} <b>@{{totalCorrect}} / @{{totalQuestion}}</b></span>
                        </div>
                        <div class="excerpt">
                            <h3 class="subTitle">@{{didWellMsg}}</h3>
                            <p class="info">{{trans('learn-exercise.more_exercise')}}</p>
                            <div class="btnWrap"><a href="#" class="goList"><i class="fa fa-chevron-circle-down"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->

        </div>
        <!-- template wrapper -->

    </div>
</div>

<div class="learnList" ng-init="init()" ng-controller="ExerciseWeekListController">
    <div class="container">
        <h2 class="title">{{trans('learn-exercise.list_title')}}</h2>
        <div id="listItem" class="listItem">
            <div id="learnSlider">
                <ul>
                    <li ng-repeat="week in weeksAvailable">
                       <a href="{{route('learn_exercise_each', ['week' => ''])}}@{{ week.week }}" ng-if="+week.enable==1" class="btnZm btnWeek"
                            ng-class="{'active':week.week == curWeek, 'locked': +week.enable==0}">
                            <span>{{trans('learn-exercise.week')}}<b>@{{week.week}}</b></span></a>

                       <a href="javascript:;" ng-if="+week.enable==0" class="btnZm btnWeek"
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