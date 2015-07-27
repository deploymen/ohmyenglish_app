@extends('layouts.master', ['pageTitle' => trans("play-feed-henry.page"),'page' => 'play', 'subPage' => 'feed-henry'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="{{trans('play-feed-henry.meta_description')}}">
    <meta name="keywords" content="{{trans('play-feed-henry.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-feed-henry.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-feed-henry.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">
    <meta property="og:description" content="{{trans('play-feed-henry.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_feed_henry'))}}">
    <meta name="twitter:title" content="{{trans('play-feed-henry.title')}}">
    <meta name="twitter:description" content="{{trans('play-feed-henry.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-feed-henry.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/play.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/feed-henry.css') }}" />
    <style type="text/css">
        li.special {
            margin-bottom: -56px;
        }
    </style>
@stop

@section('javascript_include')
<script type="text/javascript" src="{{ asset('bower_components/crypto-js/crypto-js.js') }}"></script>


<script type="text/javascript">
    var OME = OME || {};
    OME.baseUrl = '{{url()}}';
    OME.sk = '{{\Config::get('app.game_secret')}}';
    OME.trackCopy = {
        "category": "{{trans('track.play_category')}}",

        "playFeedHenry_play_action": "{{trans('track.playFeedHenry_play_action')}}",
        "playFeedHenry_play_label": "{{trans('track.playFeedHenry_play_label')}}",

        "playFeedHenry_fbConnect_action": "{{trans('track.playFeedHenry_fbConnect_action')}}",
        "playFeedHenry_fbConnect_label": "{{trans('track.playFeedHenry_fbConnect_label')}}",

        "playFeedHenry_playAgain_action": "{{trans('track.playFeedHenry_playAgain_action')}}",
        "playFeedHenry_playAgain_label": "{{trans('track.playFeedHenry_playAgain_label')}}",

        "playFeedHenry_gameComplete_action": "{{trans('track.playFeedHenry_gameComplete_action')}}",
        "playFeedHenry_gameComplete_label": "{{trans('track.playFeedHenry_gameComplete_label')}}",
    };
</script>
<script type="text/javascript" src="{{asset('assets/js/play-feed-henry.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/play.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({ cache: true });
      $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
          appId: OME.fbAppId,
          version: 'v2.3'
        });
        FB.getLoginStatus();
      });

      initGameItems("{{ url('/api/game/questions') }}", "{{ url('/api/game/submission') }}", "{{ url('/api/game/submission') }}", "{{ url('/assets/images/game') }}");
    });
</script>
@stop

@section('content')
<div class="playContent">
    <div class="container">

    <h1 class="title"><i>{{trans('play.feed_henry_title')}}</i></h1>
    <p class="info">
        {{trans('play.feed_henry_info')}}
    </p>

    <!-- feed henry -->
    <div class="game">
        <div class="content">
            <div class="interface">
                <div id="game-overlay" class="overlay hide"></div>
                <div id="game-preloader" class="preloader"><img src="{{ url('assets/images/game/preloader.gif') }}" alt="Loading..." /></div>
                <div id="game-main-menu" class="slide bg-def main-menu">
                    <div class="content">
                        <div class="logo"></div>
                        <ul class="option">
                            <li><a id="btn-game-play-now" href="#" class="button cta btn-play-now">{{trans('play-feed-henry.game_btn_play_now')}}</a></li>
                            <li><a id="btn-game-how-to" href="#" class="button btn-how-to"><span>How to</span></a></li>
                            <li><a id="btn-game-leaderboard" href="#" class="button btn-leaderboard"><span>Leaderboard</span></a></li>
                        </ul>
                    </div>
                </div>
                <div id="game-status-bar" class="game-status-bar">
                    <div class="content">
                        <div class="stat-box left">
                            <div id="level-stat" class="level-stat hide">
                                <small>{{trans('play-feed-henry.level_stat')}}</small>
                                <span id="game-level-label"></span>
                            </div>
                            <a id="btn-game-menu-back" class="back"><i class="fa fa-arrow-left"></i></a>
                        </div>
                        <div class="stat-box right">
                            <a id="btn-game-menu" class="btn-menu"><span>Menu</span></a>
                        </div>
                        <div class="timer">
                            <span class="ico"></span><span id="game-timer">00:00</span>
                        </div>
                    </div>
                </div>
                <div id="game-menu" class="game-menu">
                    <div class="content">
                        <ul>
                            <li><a id="btn-game-menu-restart" class="button">{{trans('play-feed-henry.btn_game_menu_restart')}}</a></li>
                            <li><a id="btn-game-menu-leaderboard" class="button bg2">{{trans('play-feed-henry.btn_game_menu_leaderboard')}}</a></li>
                            <li><a id="btn-game-menu-how-to" class="button bg3">{{trans('play-feed-henry.btn_game_menu_how_to')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div id="game-map" class="slide bg-map map hide">
                    <div class="content">
                        <a id="btn-game-back-to-main" href="#" class="back"><i class="fa fa-arrow-left"></i> Back</a>
                        @for ($i = 1; $i <= 14; $i++)
                        <a id="spot{{ $i }}" class="spot spot{{ $i }} disabled" href="#" data-level="{{ $i }}">{{ $i }}</a>
                        @endfor
                    </div>
                </div>
                <div id="game-level" class="slide game-level bg-level hide">
                    <div class="content">
                        <div id="game-img-slots" class="img-slots">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="answer-panel">
                            <a id="btn-game-hint" class="hint"><span>5</span><small>{{trans('play-feed-henry.btn_game_hint')}}</small></a>
                            <ul class="answer">
                            </ul>
                            <ul class="choice">
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="game-pit-stop" class="slide bg-def pit-stop hide">
                    <div class="content">
                        <div class="overview">
                            <div class="stats">
                                <div class="result">2m 53s</div>
                                <div class="label">{{trans('play-feed-henry.game_pit_stop_overview_stats')}}</div>
                            </div>
                            <div class="text">
                                {{trans('play-feed-henry.game_pit_stop_overview_text')}}
                            </div>
                        </div>
                        <a id="btn-game-pit-stop-next" class="opt-button" href="#">{{trans('play-feed-henry.game_pit_stop_next')}}</a>
                        <div class="henry-sprite">

                        </div>
                    </div>
                </div>
                <div id="game-completed" class="slide bg-def game-completed hide">
                    <div class="content">
                        <div class="overview">
                            <div class="header">
                                <span></span>
                                <h2>{{trans('play-feed-henry.game_completed_header')}}</h2>
                                <div class="ranking">
                                    <ul>
                                        <li class="rank-label">{{trans('play-feed-henry.game_completed_ranking')}}</li>
                                        <li class="time"></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="text">
                                    Log in to Facebook and see how you rank against your friends!
                                </div>
                                <a id="btn-game-end-fb-connect" class="cta opt-button facebook" href="#">{{trans('play-feed-henry.game_completed_facebook_connect')}}</a>
                                <a id="btn-game-end-play-again" class="cta opt-button" href="#">{{trans('play-feed-henry.game_end_play_again')}}</a>
                            </div>
                        </div>
                        <div class="henry-sprite stage1"></div>
                    </div>
                </div>
                <!-- msg box -->
                <div id="game-level-msg-box-briefing" class="msg-box briefing hide">
                    <div class="content">
                        <div class="ico stage-num">1</div>
                        <div class="shadow"></div>
                        <div class="face">
                            <div class="msg">
                                <h3>The Great Road Trip Begins in Johor!</h3>
                                What better place to start a Malaysian food tour than here? Guess the
                                common word in the pictures so Mr. Middleton will know what he's in for!
                            </div>
                            <div class="option">
                                <ul>
                                    <li><a id="btn-game-briefing-start" href="#" class="opt-button">{{trans('play-feed-henry.btn_game_start')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='game-level-msg-box-hint' class='msg-box hint hide'>
                    <div class="content">
                        <div class="ico">?</div>
                        <div class="shadow"></div>
                        <div class="face">
                            <div class="msg">
                                <h3>Uh-oh! It seems like you've run out of hints.</h3>
                            </div>
                            <div class="option">
                                <ul>
                                    <li><a id="btn-game-hint-resume" href="#" class="opt-button">Resume Game</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="game-level-msg-box-restart" class="msg-box restart hide">
                    <div class="content">
                        <div class="ico">?</div>
                        <div class="shadow"></div>
                        <div class="face">
                            <div class="msg">
                                <h3>{{trans('play-feed-henry.game_level_restart_msg1')}}</h3>
                                {{trans('play-feed-henry.game_level_restart_msg2')}}
                            </div>
                            <div class="option">
                                <ul>
                                    <li><a id="btn-game-restart-yes" href="#" class="opt-button">{{trans('play-feed-henry.btn_game_restart_yes')}}</a></li>
                                    <li><a id="btn-game-restart-no" href="#" class="opt-button no">{{trans('play-feed-henry.btn_game_restart_no')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pop ups -->
                <div id="game-leaderboard" class="pop-up leaderboard hide">
                    <div class="content">
                        <a id="btn-game-leaderboard-close" class="btn-close" href="#"><span></span></a>
                        <div class="header">
                            <span></span>
                            <h2>{{trans('play-feed-henry.game_leaderboard_header')}}</h2>
                        </div>
                        <ul class="score-list">
                            <li>
                                <span class="num rank">1</span>
                                <span class="name">Henry</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                            <li>
                                <span class="num rank">1</span>
                                <span class="name">Henry</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                            <li>
                                <span class="num rank">1</span>
                                <span class="name">Henry</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                            <li>
                                <span class="num rank">1</span>
                                <span class="name">Henry</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                            <li>
                                <span class="num rank">1</span>
                                <span class="name">Henry</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                            <li class="me special">
                                <span class="num rank">X</span>
                                <span class="name">XXX</span><br />
                                <span class="play_time">0m 0s</span>
                            </li>
                        </ul>
                        <div class="option">
                            <ul>
                                <li><a id="btn-game-leaderboard-share" href="#" class="opt-button facebook">Share on Facebook</a></li>
                                <li><a id="btn-game-leaderboard-play-now" href="#" class="opt-button" onClick="console.log(['TRACK', 'BM - Feed Henry', 'BM - Play now'].join(' | '));">{{trans('play-feed-henry.btn_game_leaderboard_play_now')}}</a></li>
                                <li><a id="btn-game-leaderboard-play-again" href="#" class="opt-button">Play Again</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="game-how-to" class="pop-up how-to hide">
                    <div class="content">
                        <a id="btn-game-how-to-close" class="btn-close" href="#"><span></span></a>
                        <h2 class="title">{{trans('play-feed-henry.game_how_to_title')}}</h2>
                        <div id="how-to-slide" class="how-to-slide">
                            <ul>
                                <li>
                                    <img src="{{ url('assets/images/game/how_to_slide1.jpg') }}" />
                                    <span>{{trans('play-feed-henry.game_how_to_slide_info_01')}}</span>
                                </li>
                                <li>
                                    <img src="{{ url('assets/images/game/how_to_slide2.jpg') }}" />
                                    <span>{{trans('play-feed-henry.game_how_to_slide_info_02')}}</span>
                                </li>
                                <li>
                                    <img src="{{ url('assets/images/game/how_to_slide3.jpg') }}" />
                                    <span>{{trans('play-feed-henry.game_how_to_slide_info_03')}}</span>
                                </li>
                            </ul>
                        </div>
                        <div id="how-to-slide-indicator" class="slide-indicator"></div>
                        <a id="btn-game-how-to-prev" class="nav left"><span>Previous</span></a>
                        <a id="btn-game-how-to-next" class="nav right"><span>Next</span></a>
                        <a id="btn-game-how-to-skip" class="button">{{trans('play-feed-henry.btn_game_skip')}}</a>
                        <a id="btn-game-how-to-start-game" class="button hide">{{trans('play-feed-henry.btn_how_to_game_start')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feed henry -->
    </div>
</div>

@include('components.play-slider', ['feedHenry' => 'active'])
@stop