@extends('layouts.master', ['pageTitle' => trans("play-protect-princess.page"),'page' => 'play', 'subPage' => 'protect-princess'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="{{trans('play-protect-princess.meta_description')}}">
    <meta name="keywords" content="{{trans('play-protect-princess.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-protect-princess.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-protect-princess.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  
    <meta property="og:description" content="{{trans('play-protect-princess.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_protect_princess'))}}">
    <meta name="twitter:title" content="{{trans('play-protect-princess.title')}}">
    <meta name="twitter:description" content="{{trans('play-protect-princess.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-protect-princess.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  

@stop

@section('css_include') 
    <link rel="stylesheet" href="{{asset('season3/css/gumby.css')}}">
    <link rel="stylesheet" href="{{asset('season3/css/gumby-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('season3/css/characterminigames3.css?v=1.8.3')}}">
    <link rel="stylesheet" href="{{asset('assets/css/play.css')}}" /> 
    
@stop

@section('javascript_include') 


<script type="text/javascript">
    var OME = OME || {};
    OME.baseUrl = '{{url()}}';
    OME.assetUrl = '{{asset("")}}';

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

</script>

<script src="{{asset('season3/js/spritespin.min.js')}}"></script>
<script>//<![CDATA[
(function(){var e=jQuery,f="jQuery.pause",d=1,b=e.fn.animate,a={};function c(){return new Date().getTime()}e.fn.animate=function(k,h,j,i){var g=e.speed(h,j,i);g.complete=g.old;return this.each(function(){if(!this[f]){this[f]=d++}var l=e.extend({},g);b.apply(e(this),[k,e.extend({},l)]);a[this[f]]={run:true,prop:k,opt:l,start:c(),done:0}})};e.fn.pause=function(){return this.each(function(){if(!this[f]){this[f]=d++}var g=a[this[f]];if(g&&g.run){g.done+=c()-g.start;if(g.done>g.opt.duration){delete a[this[f]]}else{e(this).stop();g.run=false}}})};e.fn.resume=function(){return this.each(function(){if(!this[f]){this[f]=d++}var g=a[this[f]];if(g&&!g.run){g.opt.duration-=g.done;g.done=0;g.run=true;g.start=c();b.apply(e(this),[g.prop,e.extend({},g.opt)])}})}})();
//]]></script>
<script src="{{asset('season3/js/jquery.queryloader2.js')}}"></script>
<script src="{{asset('season3/js/imagesloaded.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/characterminigames3.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/play.js')}}"></script>

@stop

@section('content')

<div class="playContent">
    <div class="container">
    <h1 class="title alt"><i>{{trans('play.protect_princess_title')}}</i></h1>
        <p class="info">
            {{trans('play.protect_princess_info')}}
        </p>

        <div class="en_pageviewport">
    
            
            
            <div class="gamecanvas3wrapper">
                    <div class="imageloadedcontainer">
                        <div class="gamecanvas3" gameSession="546ab918221f9-oi66soji">
                            <!-- GAME INTERFACE BG -->
                            <div class="game3bg-container">
                                <div class="game3bg-top"></div>
                                <div class="game3bg-bottom">
                                    <div class="game3bg-mountain"></div>
                                    <div class="game3bg-tree"></div>
                                </div>
                            </div>
                            <div class="game3top-container">
                                <div class="game3-distancecontainer">
                                    <div class="distanceguardian">!</div>
                                    <div class="distanceme"><img src="{{asset('season3/graphic/characterminigames/game3/distanceme.png')}}"></div>
                                </div>
                            </div>
                            <div class="game3-bujang">
                                <div class="game3-bujangcontainer">
                                    <div class="yellowsign"><img src="{{asset('season3/graphic/characterminigames/game3/yellowsign.png')}}"></div>
                                    <div class="greensign"><img src="{{asset('season3/graphic/characterminigames/game3/greensign.png')}}"></div>
                                    <div class="orangesign"><img src="{{asset('season3/graphic/characterminigames/game3/orangesign.png')}}"></div>
                                    <div class="redsign"><img src="{{asset('season3/graphic/characterminigames/game3/redsign.png')}}"></div>
                                    <div class="bujanghide"><img src="{{asset('season3/graphic/characterminigames/game3/bujanghide.png')}}"></div>
                                    <div class="bujangfollow"></div>
                                    <div class="bujangwin"></div>
                                </div>
                            </div>
                            <div class="game3-shockcontainer"><div class="game3-shock"></div></div>
                            <div class="game3-putri">
                                <div class="game3-putricontainer">
                                    <div class="game3-putrinormal"></div>
                                    <div class="game3-putrispeed"></div>
                                    <div class="game3-putrishock"></div>
                                    <div class="game3-putricaught"></div>
                                </div>
                            </div>
                            <div class="game3-warning"><img src="{{asset('season3/graphic/characterminigames/game3/warningsign.png')}}"></div>
                            <div class="game3-papa"><img src="{{asset('season3/graphic/characterminigames/game3/papa.png')}}"></div>
                            <div class="game3-guardiancontainer">
                                <div class="questioncontainer clearfix">
                                    <div class="questionwrapper">

                                        <div class="question">hey! one plus one equal to?</div>
                                    </div>
                                    <div class="answercontainer">
                                        <a href="javascript:;" class="answer answer1">one</a>
                                        <a href="javascript:;" class="answer answer2">two</a>
                                        <a href="javascript:;" class="answer answer3">three</a>
                                    </div>
                                    <div class="stoptherecontainer"><div class="stopthere"></div></div>
                                    <div class="toobadcontainer">
                                        <div class="toobad">Too bad, the answer is <span></span></div>
                                    </div>
                                    <div class="correctanscontainer">
                                        <div class="correctans"><span></span> &nbsp<i class="icon-check"></i></div>
                                    </div>
                                </div>
                                <div class="guardianwrong"><img src="{{asset('season3/graphic/characterminigames/game3/guardianwrong.png')}}"></div>
                                <div class="bujangcorrect"><img src="{{asset('season3/graphic/characterminigames/game3/bujangcorrect.png')}}"></div>
                                <div class="guardiancorrect"><img src="{{asset('season3/graphic/characterminigames/game3/guardiancorrect.png')}}"></div>
                                <div class="guardianask"><img src="{{asset('season3/graphic/characterminigames/game3/guardianask.png')}}"></div>
                                <div class="wrongansspray"><img src="{{asset('season3/graphic/characterminigames/game3/wrongansspray.png')}}"></div>
                                <div class="guardianwrongans"><div class="guardianfrozen"></div></div>
                            </div>
                            <div class="game3-gameovercontainer">
                                <div class="game3-gameover"><img src="{{asset('season3/graphic/characterminigames/game3/gameover.png')}}"></div>
                                <div class="game3-gotcha"><img src="{{asset('season3/graphic/characterminigames/game3/gotcha.png')}}"></div>
                                <div class="game3-loseher"><img src="{{asset('season3/graphic/characterminigames/game3/loseher.png')}}"></div>
                                <div class="game3-inputcontainer">
                                    <div class="game3-inputspotcontainer">
                                        <p>Rank <span class='rankno'></span></p>
                                        <input type="text" class="fname" name="fname" autofocus maxLength="6">
                                        <div class="game3-inputlinecontainer">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <a href="javascript:;" class="inputenter"><img src="{{asset('season3/graphic/characterminigames/game3/inputenter.png')}}"></a>
                                    <a href="javascript:;" class="inputcancel"><img src="{{asset('season3/graphic/characterminigames/game3/inputcancel.png')}}"></a>
                                    
                                </div>
                                <div class="game3-aftersubmit">
                                    <a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_protect_princess'))}}?playagain=yes" class="game3-playagain">PLAY AGAIN</a>
                                    <a href="javascript:;" class="leaderboard-end-btn"><img src="{{asset('season3/graphic/characterminigames/game3/leaderboardbtn.png')}}"></a>
                                </div>
                            </div>
                            <div class="game3-scorecontainer">
                                <div class="game3-score">0</div><span class="score-info">+6</span>
                            </div>

                            <!-- Landing Page -->
                            <div class="landingpagewrapper">
                                <div class="landingbg"><img src="{{asset('season3/graphic/characterminigames/game3/landingbg.jpg')}}"></div>
                                <div class="landingstickcontainer"><div class="landingstick"></div></div>
                                <div class="landingbujang1container"><div class="landingbujang1"></div></div>
                                <div class="landingbujang2container"><div class="landingbujang2"></div></div>
                                <div class="landingtitle"><img src="{{asset('season3/graphic/characterminigames/game3/landingtitle.png')}}"></div>

                                <a href="javascript:;" class="leaderboard-btn"><img src="{{asset('season3/graphic/characterminigames/game3/leaderboardbtn.png')}}" class="landing-normal"><img src="{{asset('season3/graphic/characterminigames/game3/leaderboardbtn-hover.png')}}" class="landing-hover"></a>
                                <a href="javascript:;" class="info-btn"><img src="{{asset('season3/graphic/characterminigames/game3/infobtn.png')}}" class="landing-normal"><img src="{{asset('season3/graphic/characterminigames/game3/infobtn-hover.png')}}" class="landing-hover"></a>
                                <a href="javascript:;" class="startbtn">START GAME</a>

                            </div>

                            <!--Instruction Page-->
                            <div class="instructionwrapper">
                                <a href="javascript:;" class="insback-btn"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/back.png')}}"></a>
                                <div class="clearfix">
                                    <a href="javascript:;" class="insprev-btn"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/btn_prev.png')}}"></a>
                                    <div class="insprev-btnspace"></div>

                                    <ul class="insimgcontainer">
                                        <li class="instruction1 showins"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/ins1.png')}}"></li>
                                        <li class="instruction2"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/ins2.png')}}"></li>
                                        <li class="instruction3"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/ins3.png')}}"></li>
                                        <li class="instruction4"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/ins4.gif')}}"></li>
                                        <li class="instruction5">
                                            <img src="{{asset('season3/graphic/characterminigames/game3/instruction/ins5.png')}}">
                                            <a href="javascript:;" class="insstart-btn"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/start_btn.png')}}"></a>
                                        </li>
                                    </ul>
                                    <a href="javascript:;" class="insnext-btn"><img src="{{asset('season3/graphic/characterminigames/game3/instruction/btn_next.png')}}"></a>
                                    <div class="insnext-btnspace"></div>
                                </div>
                                <div class="insdotswrapper">
                                    <a href="javascript:;" class="insdots showdots" dots-count="instruction1"></a>
                                    <a href="javascript:;" class="insdots" dots-count="instruction2"></a>
                                    <a href="javascript:;" class="insdots" dots-count="instruction3"></a>
                                    <a href="javascript:;" class="insdots" dots-count="instruction4"></a>
                                    <a href="javascript:;" class="insdots" dots-count="instruction5"></a>
                                </div>
                                <ul class="insdesccontainer">
                                    <li class="instruction1 showins">
                                        <p>When Putri turns her head, you have to hide!</p>
                                        <p>Putri’s cycling speed will change, so you have to keep up.</p>
                                    </li>
                                    <li class="instruction2">
                                        <p>Stay close to Putri to earn more points</p>
                                        <p>If Putri sees you, the game is over.</p>
                                    </li>
                                    <li class="instruction3">
                                        <p>If guradian appears, you have to answer his question.</p>
                                        <p>Answer correctly or you’ll lose sight of Putri.</p>
                                    </li>
                                    <li class="instruction4">
                                        <p>Yellow zone = +1 point, Green zone = +3 points</p>
                                        <p>Orange zone = +6 points, Red zone = Game Over</p>
                                    </li>
                                    <li class="instruction5">
                                        <p>To move forward, click mouse or tap screen.</p>
                                        <p>To hide, stop clicking or stop tapping.</p>
                                    </li>
                                </ul>
                            </div>

                            <!--Leaderboard-->
                            <div class="leaderboard_overlay_layer">
                                <a class="close_leaderboard" href="javascript:;"><img src="{{asset('season3/graphic/characterminigames/game3/leaderboardclose.png')}}"></a>

                                <div class="leaderboard_layer">
                                    <div class="leaderboard_container">
                                        <div class="leaderboard_title"><img src="{{asset('season3/graphic/characterminigames/game3/leaderboard-title.png')}}"></div>
                                        <div class="leaderboard_contents">
                                            <ul class="two_up tiles">
                                                <li>
                                                    <div class="leaderboard-numbering">1</div>
                                                    <div class="leaderboard-info">
                                                        Loading...
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="game3loading">
                                <img src="{{asset('season3/graphic/characterminigames/game3/loading.gif')}}">
                            </div>
                        </div>
                    </div>
                    
                <div class="audioarea">
                    
                    <audio controls id="landingaudio" autoplay loop>
                      <source src="{{asset('season3/media/characterminigames/game3/set1_menu_Winner_Winner.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/set1_menu_Winner_Winner.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/set1_menu_Winner_Winner.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="gameplayaudio" loop>
                      <source src="{{asset('season3/media/characterminigames/game3/set1_gameplay_One-eyed_Maestro.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/set1_gameplay_One-eyed_Maestro.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/set1_gameplay_One-eyed_Maestro.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="bicycleaudio" loop>
                      <source src="{{asset('season3/media/characterminigames/game3/bicycle.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/bicycle.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/bicycle.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="walkingaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/grass_walking.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/grass_walking.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/grass_walking.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="getcaughtaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/gasp.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/gasp.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/gasp.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="ridefastaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/ouu.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/ouu.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/ouu.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="suspectaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/huh.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/huh.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/huh.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="failresultaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/busted_game_over.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/busted_game_over.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/busted_game_over.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="successresultaudio">
                      <source src="{{asset('season3/media/characterminigames/game3/fanfare.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game3/fanfare.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game3/fanfare.wav')}}" type="audio/wav">
                    </audio>
                    
                </div>
            </div>

            


        </div>
        
    </div>
</div>

@include('components.play-slider', ['protectPrincess' => 'active'])

@stop