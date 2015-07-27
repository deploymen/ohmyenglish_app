@extends('layouts.master', ['pageTitle' => trans("home.page"),'page' => 'home'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1" />

    <meta name="description" content="{{trans('home.meta_description')}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('home.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('home.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}">
    <meta name="twitter:title" content="{{trans('home.title')}}">
    <meta name="twitter:description" content="{{trans('home.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />

@stop

@section('javascript_include')
    <script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/flash_detect_min.js') }}"></script>
    <script type="text/javascript" src="//static.movideo.com/js/movideo.min.latest.js"></script>
    <script type="text/javascript">

        var OME = OME || {};
        OME.baseUrl = '{{url()}}';
        OME.trailerUrl = '{{$trailerUrl}}';
        OME.apiSocialFeedUrl = "{{ url('/api/socialbuzz') }}";
        OME.videoID = "{{ $trailer->movideo_id }}";
        OME.popQuizs = {!! json_encode($popQuizs) !!};

        OME.popQuizsCopy = {
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
            "category": "{{trans('track.home_category')}}",

            "home_sneakPeak_action": "{{trans('track.home_sneakPeak_action')}}",
            "home_sneakPeak_label": "{{trans('track.home_sneakPeak_label')}}",

            "home_classroomExercise_action": "{{trans('track.home_classroomExercise_action')}}",
            "home_classroomExercise_label": "{{trans('track.home_classroomExercise_label')}}",

            "home_popQuizHalf_action": "{{trans('track.home_popQuizHalf_action', ['nth' => '{nth}'])}}",
            "home_popQuizHalf_label": "{{trans('track.home_popQuizHalf_label')}}",

            "home_popQuizLast_action": "{{trans('track.home_popQuizLast_action')}}",
            "home_popQuizLast_label": "{{trans('track.home_popQuizLast_label')}}",

            "home_popQuizStart_action": "{{trans('track.home_popQuizStart_action')}}",
            "home_popQuizStart_label": "{{trans('track.home_popQuizStart_label')}}",

            "home_featuredCharacter_action": "{{trans('track.home_featuredCharacter_action')}}",
            "home_featuredCharacter_label": "{{trans('track.home_featuredCharacter_label')}}",

            "home_personalityQuiz_action": "{{trans('track.home_personalityQuiz_action')}}",
            "home_personalityQuiz_label": "{{trans('track.home_personalityQuiz_label')}}",

            "home_featuredGame_action": "{{trans('track.home_featuredGame_action')}}",
            "home_featuredGame_label": "{{trans('track.home_featuredGame_label')}}",

            "home_article_action": "{{trans('track.home_article_action')}}",
            "home_article_label": "{{trans('track.home_article_label')}}",

            "home_askCikgu_action": "{{trans('track.home_askCikgu_action')}}",
            "home_askCikgu_label": "{{trans('track.home_askCikgu_label')}}"
        };

        $(document).ready(function() {
          $.ajaxSetup({ cache: true });
          $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
            FB.init({
              appId: OME.fbAppId,
              version: 'v2.3'
            });
            FB.getLoginStatus();
          });
        });
        //$('.master').removeClass('withSkinner');


    </script>

    <script type="text/javascript" src="{{ asset('assets/js/home.js?r'.time()) }}"></script>

@stop

@section('content')
<div class="homeContent">
    <div class="homeBucket bgBlue">
        <div class="mast-head">
            <div class="content">
                <div id="banner" class="banner">
                    <ul>
                        @for($i = 0; $i < count($banners); $i++)
                        <li>
                            <div class="slide"><a target="_blank" href="{{$banners[$i]->banner_link}}" data-src="{{asset('assets/images/home-banner/uploads/'.$banners[$i]->image_filename.'.'.$lang.'_lg.jpg')}}"></a></div>
                        </li>
                        @endfor
                    </ul>
                </div>
                <a id="btn-mast-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
                <a id="btn-mast-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
            </div>
        </div>
    </div>
    <!-- row 1 -->
    <div class="homeBucket bgMaroon sneakPeak homeRow1">
        <div class="container containerH">
            <div class="row">
                <div class="col-xs-12 col-sm-7 colH ">
                    <div id="aniSlide" class="aniSlideWrap removeAniEnd">
                        <img class="slides" src="{{asset('assets/images/home/sneakPeak_board.png')}}" align="right" alt="Oh My English! Class of 2015 | Astro" />
                        <div id="video-frame" class="video-frame">
                            <div class="content">
                                <div id="video-player" class="video-player"></div>
                            </div>
                        </div>
                    </div>
                    <img class="cikgu removeAniEnd" src="{{asset('assets/images/home/sneakPeak_cikgu.png')}}" alt="Cikgu Ayu" />
                </div>
                <div class="col-xs-12 col-sm-5 colH">
                    <h2 class="titleNormal">{{trans('home.sneakPeak_title')}}</h2>
                    <h3 class="subTitle">{!!$trailer->title!!} <br> {!!$trailer->show_time!!}</h3>
                    <p class="info">
                        {!!$trailer->desc!!}
                    </p>
                    <div class="btnWrap week{{$trailer->week or 0}}"><a href="{{url(App::getLocale().trans('global.url_about_trailers'))}}" class="cta btnZm btn_lg"><span><b>{{trans('home.sneakPeak_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row 1 -->
    <!-- row 2 -->
    <div class="homeBucket bgYellow bgGreen_left homeRow2">
        <div class="container containerH-lg">
            <div class="row">

                <div class="col-xs-12 col-sm-6 colH-lg bgGreen exercise">
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container containerH no-padding">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-lg-push-6 no-gutter-lg-right">
                                <div class="exerciseImg">
                                    <!-- <div class="bubble">
                                        {{trans('home.exercise_week')}} <b>{{$exerciseWeek or ''}}</b>
                                    </div> -->
                                    <div class="aniExercise{{$exerciseWeek or ''}}"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6 col-lg-pull-6">
                                <h2 class="titleNormal">{{trans('home.exercise_title')}}</h2>
                                <p class="info">
                                    {{trans('home.exercise_info')}}
                                </p>
                                <div class="btnWrap "><a href="{{url(App::getLocale().trans('global.url_learn'))}}" class="cta btnZm btn_sm"><span><b>{{trans('home.exercise_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 colH-lg bgYellow popQuiz" ng-init="init()" ng-controller="PopQuizController"><!-- done -->
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container containerH-lg no-padding">
                        <div class="row">

                            <div class="col-xs-12 col-lg-9 colH-lg">
                                <h2 class="titleNormal">{{trans('home.popQuiz_title')}}</h2>

                                <div class="quiz-wrap disabled">
                                    <div class="quiz-title">@{{onQuestion.question}}</div>
                                    <a class="option1 btn" ng-click="choose($event, 1)">@{{onQuestion.option1}}</a>
                                    <a class="option2 btn" ng-click="choose($event, 2)">@{{onQuestion.option2}}</a>
                                    <a class="option3 btn" ng-click="choose($event, 3)">@{{onQuestion.option3}}</a>
                                </div>
                                <div class="quiz-result">
                                    <div class="result-graphic"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-3 colH-lg">
                                <div class="addOn">
                                    <div class="recordBoard">
                                        <h3>{{trans('home.popQuiz_episodeTitle')}} {{$exerciseWeek}}</h3>
                                        <h4>{{trans('home.popQuiz_question')}}</h4>
                                        <div class="record">@{{curQuestionNo}} / @{{totalQuestion}}</div>
                                    </div>
                                    <!-- emote, anusha/zack, default/correct/wrong/goodjob*for result (emote anusha default, emote zack correct) -->
                                    <div class="emote zack">
                                        <div class="bubble">@{{characterRespond}}</div>
                                        <img src="{{asset('assets/images/home/popquiz_emote.png')}}" alt="Anusha, Zack" />
                                    </div>
                                </div>
                                <div class="addOn-result">
                                    <!-- Backend to update score !-->
                                    <h1 class="score-value">{{trans('home.popQuiz_result_score')}} @{{totalCorrect}} / @{{totalQuestion}}!</h1>
                                    <h2 class="try-harder">{{trans('home.popQuiz_result_desc')}}</h2>
                                    <a href="{{$popQuizsPrevWeekUrl}}" class="cta btnZm btn_sm"><span><b>{{trans('home.popQuiz_btn')}}<i class="fa fa-chevron-right"></i></b></span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- row 2 -->
    <!-- row 3 -->
    <div class="homeBucket bgMaroon bgBlue_left homeRow3">
        <div class="container no-padding">
            <div class="row">

                <div class="col-xs-12 col-sm-6 bgBlue meetHenry">
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container ">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 no-gutter-lg-left">
                            <div class="aniHenry"></div>
                                <img src="{{asset('assets/images/home/uploads/'.$meetCharacters[0]->filename.'.png')}}" alt="Taylor Marie Smith"/>

                            </div>
                            <div class="col-xs-12 col-lg-6 ">
                                <h2 class="titleNormal">{{trans('home.meetHenry_title')}}</h2>
                                <h3 class="subTitle">{{trans('home.meetHenry_subTitle')}}</h3>
                                <p class="info">
                                    {{trans('home.meetHenry_info')}}
                                </p>
                                <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_about_characters'))}}" class="cta btnZm btn_lg"><span><b>{{trans('home.meetHenry_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 bgMaroon takeQuiz no-padding">
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container no-padding">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 no-padding">
                                <div class="takeQuizSlider">
                                    <ul>
                                        <li><div class="slideWrap malaysianEnglish">
                                                <h3><span>{{trans('learn-generic-quiz.quiz1_title')}}</span></h3>
                                                <p class="info">{{trans('learn-generic-quiz.quiz1_info')}}</p>
                                                <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_gen_quiz1'))}}" class="cta btnZm btn_lg"><span><b>{{trans('home.takeQuiz_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                                            </div>
                                        </li>
                                        <li><div class="slideWrap describeYou">
                                                <h3><span>{{trans('learn-generic-quiz.quiz2_title')}}</span></h3>
                                                <p class="info">{{trans('learn-generic-quiz.quiz2_info')}}</p>
                                                <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_gen_quiz2'))}}" class="cta btnZm btn_lg"><span><b>{{trans('home.takeQuiz_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <a id="btn-quiz-prev" class="sliderBtn left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
                                <a id="btn-quiz-next" class="sliderBtn right"><i class="fa fa-chevron-right"></i><span>Next</span></a>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- row 3 -->
    <!-- row 4 -->
    <div class="homeBucket bgGreen bgYellow_left homeRow4">
        <div class="container ">
            <div class="row centered">

                <div class="col-xs-12 col-sm-4 col-lg-3 colEqualH no-padding bgYellow feedHenry">
                    <div class="container no-padding">
                        <div class="gameSlider">
                            <ul>
                                <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="imgLearnWrap">
                                                <img src="{{asset('assets/images/home/game_dash_coin.png')}}" alt="{{trans('home.game_title5')}}" />
                                                <p class="info">
                                                    {{trans('home.game_info5')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_dash_coin'))}}" class="cta btnZm btn_sm"><span><b>{{trans('home.game_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                                    </div>
                                </li>
                                <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="imgLearnWrap">
                                                <img src="{{asset('assets/images/home/game_feed_henry.png')}}" alt="{{trans('home.game_title1')}}" />
                                                <p class="info">
                                                    {{trans('home.game_info1')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_feed_henry'))}}" class="cta btnZm btn_sm"><span><b>{{trans('home.game_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                                    </div>
                                </li>
<!--                                 <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="imgLearnWrap">
                                                <img src="{{asset('assets/images/home/game_spy_leader.png')}}" alt="{{trans('home.game_title2')}}" />
                                                <p class="info">
                                                    {{trans('home.game_info2')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_spy_leader'))}}" class="btnZm btn_sm"><span><b>{{trans('home.game_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                                    </div>
                                </li>
                                <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="imgLearnWrap">
                                                <img src="{{asset('assets/images/home/game_football_fever.png')}}" alt="{{trans('home.game_title3')}}" />
                                                <p class="info">
                                                    {{trans('home.game_info3')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_football_fever'))}}" class="btnZm btn_sm"><span><b>{{trans('home.game_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                                    </div>
                                </li>
                                <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="imgLearnWrap">
                                                <img src="{{asset('assets/images/home/game_super_typer.png')}}" alt="{{trans('home.game_title4')}}" />
                                                <p class="info">
                                                    {{trans('home.game_info4')}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{url(App::getLocale().trans('global.url_super_typer'))}}" class="btnZm btn_sm"><span><b>{{trans('home.game_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>

                                    </div>
                                </li> -->

                            </ul>
                        </div>
                        <a id="btn-game-prev" class="sliderBtn left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
                        <a id="btn-game-next" class="sliderBtn right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-lg-3 colEqualH no-padding bgBlueDark coolEnglish">
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container no-padding">
                        <div class="coolEnglishSlider">
                            <ul>
                            @foreach ($articles as $article)
                                <li>
                                    <div class="slideWrap">
                                        <div class="equalH">
                                            <div class="vMiddle">
                                                <h2 class="titleNormal">{{$article->title}}</h2>
                                                <p class="info">{{$article->share_desc}}</p>
                                            </div>
                                        </div>
                                        <div class="btnWrap"><a href="{{$article->url}}" class="cta btnZm btn_sm" onClick="console.log(['TRACK', 'BM - Artikel', 'BM - Baca lagi'].join(' | '));"><span><b>{{trans('home.coolEnglish_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                                    </div>
                                </li>
                            @endforeach

                            </ul>
                        </div>
                        <a id="btn-coolEnglish-prev" class="sliderBtn left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
                        <a id="btn-coolEnglish-next" class="sliderBtn right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-lg-3 colEqualH bgGreen askCikgu">
                    <!-- <div class="comingSoon"><span><i>{{trans('home.comingSoon_title')}}</i></span></div> -->
                    <div class="container no-padding">
                        <div class="equalH">
                            <h2 class="titleNormal">{{trans('home.askCikgu_title')}}</h2>
                            <p class="info">
                                {{trans('home.askCikgu_info')}}
                            </p>
                            <div class="chatBox">
                                <div class="chatAni"></div>
                                <div class="chatText">{{$askHenry->question or ''}}</div>
                                <img src="{{asset('assets/images/home/askCikgu.png')}}" alt="{{trans('home.askCikgu_title')}}" />
                            </div>
                        </div>
                        <div class="btnWrap"><a href="{{$askHenryUrl}}" class="cta btnZm btn_sm"><span><b>{{trans('home.askCikgu_btn')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                    </div>
                </div>

                <div class="col-lg-3 colEqualH bgGrey lrecHolder" style="vertical-align:middle">
                    <div class="lrecBanner no-padding">
                        <div id='div-gpt-ad-1399458227946-0' style='width:300px; height:250px;'>
                            <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1399458227946-0'); });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row 4 -->
    <!-- row 5 -->
    <div class="homeBucket bgBlueGrey socialBuzz">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="social-buzz">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5 socialIcon">
                                    <div class="aniSocial"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <h2 class="titleNormal"><i>{{trans('home.social_buzz_content_title')}}</i></h2>
                                    <p class="info">
                                        {{trans('home.social_buzz_content_info')}}
                                    </p>
                                </div>
                            </div>
                            <div id="feed-list" class="feed-list"></div>
                            <div class="clear"></div>
                            <div id="feed-preloader" class="feed-preloader">
                                <img src="{{ url('assets/images/preloader.gif') }}" alt="Loading" />
                            </div>
                            <div class="row">
                                <div class="col-sm-12 centered">
                                    <div class="btnWrap"><a id="btn-feed-load-more" class="btnZm btn_sm hide" href="{{url(App::getLocale().trans('global.url_social'))}}"><span><b>{{trans('home.social_buzz_view_more')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row 5 -->
    <!-- row 6 -->
    <div class="homeBucket bgGreyLight">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="sponsor">
                        <div class="content">
                            <h2 class="titleNormal centered">{{trans('home.sponsor_content_title')}}</h2>
                            <ul>
                                <li>
                                    {{trans('home.sponsor_content_01')}}
                                    <img src="{{ url('assets/images/home/sponsor_xpax.jpg') }}" alt="XPax" />
                                </li>
                                <li class="short-logo">
                                    {{trans('home.sponsor_content_02')}}
                                    <img class="pad-top" src="{{ url('assets/images/home/sponsor_exxon_mobil.jpg') }}" alt="ExxonMobil" />
                                </li>
                                <li class="short-logo">
                                    {{trans('home.sponsor_content_03')}}
                                    <img class="pad-top" src="{{ url('assets/images/home/sponsor_vitagen.jpg') }}" alt="Vitagen" />
                                </li>
                                <li class="last">
                                    {{trans('home.sponsor_content_03')}}
                                    <img src="{{ url('assets/images/home/sponsor_faber_castell.jpg') }}" alt="Faber-Castell" />
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@stop