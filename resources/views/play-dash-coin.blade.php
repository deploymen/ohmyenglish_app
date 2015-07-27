@extends('layouts.master', ['pageTitle' => trans("play-dash-coin.page"),'page' => 'play', 'subPage' => 'dash-coin'])

@section('meta_include')
    <meta name="description" content="{{trans('play-dash-coin.meta_description')}}">
    <meta name="keywords" content="{{trans('play-dash-coin.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-dash-coin.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-dash-coin.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">
    <meta property="og:description" content="{{trans('play-dash-coin.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_dash_coin'))}}">
    <meta name="twitter:title" content="{{trans('play-dash-coin.title')}}">
    <meta name="twitter:description" content="{{trans('play-dash-coin.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-dash-coin.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/play.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/play-dash-coin.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript" src="{{ asset('bower_components/crypto-js/crypto-js.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/play-dash-coin.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/play-dash-coin-engine.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/play.js')}}"></script>

<script type="text/javascript">
    var OME = OME || {};
    OME.baseUrl = '{{url()}}';
    OME.imgPath = "{{ url('/assets/images/play/dash-cash') }}";
    OME.sk = '{{config('app.game_secret')}}';
    OME.unscrambleWords = {!!json_encode($scrambleWords)!!};

    $(document).ready(function() {


    });

</script>
@stop

@section('content')
<div class="playContent">
    <div class="container">

    <h1 class="title"><i>{{trans('play.dash_cash_title')}}</i></h1>
    <p class="info">
        {{trans('play.dash_cash_info')}}
    </p>

    <!-- dash for cash -->
    <div class="game">
        <div class="content">
            <div class="interface"><!-- stages: intro, howto, leaderboard, ingame(unscramble, gameover, gamepause, gamerestart, gamequit)  -->
                <div id="game-preloader" class="preloader"><img src="{{ url('assets/images/game/preloader.gif') }}" alt="Loading" /></div>
                <div id="game-overlay" class="overlay"></div>
                <div class="game-bg"></div>
                <div class="game-body">
                    <!-- dummy -->
<!--
                    <div class="btn-gameover" style="left:70px; top:400px; position:absolute">gameover</div>
                    <div class="btn-gameover-score" style="left:120px; top:500px; position:absolute">gameover highscore</div> -->
                </div>

                <div class="game-header">
                    <div class="mast-head"></div>
                    <div class="status-bar">
                        <div class="status-icon"></div>
                        <div class="status-score"><b>score</b><span>0</span></div>
                        <a href="javascript:;" class="btnZm btn-pause"></a>
                    </div>
                </div>

                <div class="game-footer">

                    <div class="main-menu">
                        <a href="javascript:;" class="btn-howto btnZm"></a>
                        <a href="javascript:;" class="btn-start btnZm"></a>
                        <a href="javascript:;" class="btn-leaderboard btnZm"></a>
                    </div>

                    <div class="overlay-howto">
                        <a href="javascript:;" class="btn-close btnZm"></a>
                        <div class="title"></div>
                        <div class="howto-slider">
                            <ul>
                                <li><div class="slider-step1">
                                <img src="{{ url('assets/images/play/dash-cash/howtoplay1.png') }}" alt="how to step 1" />
                                <p class="info">Click/tap on the money without touching the other objects.</p>
                                </div></li>
                                <li><div class="slider-step2">
                                <img src="{{ url('assets/images/play/dash-cash/howtoplay2.png') }}" alt="how to step 2" />
                                <p class="info">If you do touch an object, unscramble the word within 10 seconds to continue the game.</p>
                                </div></li>
                            </ul>
                        </div>
                        <a id="btn-howto-prev" class="sliderBtn left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
                        <a id="btn-howto-next" class="sliderBtn right"><i class="fa fa-chevron-right"></i><span>Next</span></a>

                        <div class="howto-pegi">
                            <ul>
                                <li class="active"></li>
                                <li></li>
                            </ul>
                        </div>
                        <a href="javascript:;" class="btn-capsule-md btnZm btn-playnow"><span>Play Now</span></a>
                    </div>

                    <div class="overlay-leaderboard">
                        <a href="javascript:;" class="btn-close btnZm"></a>
                        <div class="title"></div>
                        <div class="title-icon"></div>
                        <div class="scoreboard">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" >
                                <tr>
                                    <th width="55px">Rank</th>
                                    <th>Name</th>
                                    <th width="80px">Points</th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <div class="user-status">
                            <div class="last-score">Last Score : <span>0</span></div>
                            <div class="best-score">Your best : <span>0</span></div>
                        </div>
                        <a href="javascript:;" class="btn-capsule-md btnZm btn-playnow"><span>Play Now</span></a>
                    </div>

                    <div class="overlay-unscramble"><!-- welldone, timesup -->
                        <div class="title"></div>
                        <ul>
                            <li class="landing">
                                <div class="timer">
                                    <div class="clock"><span>10</span></div>
                                    <div class="timer-bg"><i><!-- left -160px --></i></div>
                                </div>
                                <div class="question"></div>
                                <div class="hint"><i class="fa fa-lightbulb-o"></i><span></span></div>
                                <input class="answer" type="input" name="answer" max='6'/>

                                <a href="javascript:;" class="btnZm btn-capsule-sm btn-done"><span>done</span></a>
                                <div class="note"></div>
                            </li>
                            <li class="pass">
                                <p class="info">Well done!</p>
                                <div class="welldone-emote"></div>
                                <a href="javascript:;" class="btnZm btn-capsule-lg btn-continue"><span>Continue</span></a>
                            </li>
                            <li class="nopass">
                                <div class="timesup-emote"><img src="{{ url('assets/images/play/dash-cash/timesup.png') }}" alt="clock" /></div>
                                <h3>Time's up!</h3>
                                <p class="info">Let's see your score.</p>
                                <a href="javascript:;" class="btnZm btn-capsule-lg btn-continue"><span>Continue</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="overlay-gameover"><!-- topscore -->
                        <div class="title"></div>
                        <div class="gameover-emote"></div>
                        <h3>Your Score</h3>
                        <div class="user-score">0</div>
                        <p class="info best-score">Best Score : <span>0</span></p>
                        <a href="javascript:;" class="btnZm btn-capsule-lg btn-playagain"><span>Play Again</span></a>
                        <a href="javascript:;" class="btnZm btn-capsule-xs btn-trophy"><i class="fa fa-trophy"></i></a>
                        <a href="javascript:;" class="btnZm btn-capsule-xs btn-home"><i class="fa fa-home"></i></a>
                        <div class="submit-score">
                            <p class="info">Congratulations!<br>You are in the top 5!</p>
                            <span class="title-name">Enter your name:</span>
                            <input class="name" maxlength="9" />
                            <a href="javascript:;" class="btnZm btn-capsule-sm btn-submit"><span>Submit</span></a>
                        </div>
                    </div>

                    <div class="overlay-pause">
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-resume"><span>Resume</span></a>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-restart"><span>Restart</span></a>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-quit"><span>Quit</span></a>
                    </div>

                    <div class="overlay-restart">
                        <div>Restart</div>
                        <p class="info">Are you sure?</p>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-yes"><span>Yes</span></a>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-no"><span>No</span></a>
                    </div>

                    <div class="overlay-quit">
                        <div>Quit</div>
                        <p class="info">Are you sure?</p>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-yes"><span>Yes</span></a>
                        <a href="javascript:;" class="btn-capsule-lg btnZm btn-no"><span>No</span></a>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- feed henry -->
    </div>
</div>

@include('components.play-slider', ['dashCoin' => 'active'])
@stop