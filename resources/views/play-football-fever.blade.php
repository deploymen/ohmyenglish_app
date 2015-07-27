@extends('layouts.master', ['pageTitle' => trans("play-football-fever.page"),'page' => 'play', 'subPage' => 'football-fever'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="{{trans('play-football-fever.meta_description')}}">
    <meta name="keywords" content="{{trans('play-football-fever.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-football-fever.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-football-fever.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  
    <meta property="og:description" content="{{trans('play-football-fever.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_football_fever'))}}">
    <meta name="twitter:title" content="{{trans('play-football-fever.title')}}">
    <meta name="twitter:description" content="{{trans('play-football-fever.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-football-fever.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  

@stop

@section('css_include') 
    <!-- <link rel="stylesheet" href="{{asset('season3/css/gumby.css')}}"/>
    <link rel="stylesheet" href="{{asset('season3/css/gumby-responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('season3/css/flexslider.css')}}"/>
    <link rel="stylesheet" href="{{asset('season3/css/style.css')}}"/> -->

    <link rel="stylesheet" href="{{asset('season3/css/characterminigames.css')}}">
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

<script type="text/javascript" src="{{asset('season3/js/libs/modernizr-2.6.2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/jquery1.10.1.min.js')}}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('season3/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/jquery.flip.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/jQueryRotateCompressed.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/play.js')}}"></script>

<script>//<![CDATA[
!function($){'use strict';function Validation($this,req){if(Gumby){Gumby.debug('Initializing Validation',$this);}
this.$this=$this;this.$field=this.$this.parents('.field');this.req=req||function(){return!!this.$this.val().length;};var scope=this;if(this.$this.is('[type=checkbox], [type=radio]')){this.$field=this.$this.parent('label');this.$field.on('gumby.onChange',function(){scope.validate();});}else if(this.$this.is('select')){this.$field=this.$this.parents('.picker');this.$field.on('change',function(){scope.validate();});}else{this.$this.on('blur',function(e){if(e.which!==9){scope.validate();}});}}
Validation.prototype.validate=function(){var result=this.req(this.$this);if(!result){this.$field.removeClass('success').addClass('danger');}else{this.$field.removeClass('danger').addClass('success');}
return result;};$.fn.validation=function(options){var
settings=$.extend({submit:false,fail:false,required:[]},options),validations=[];return this.each(function(){if(!settings.required.length){return false;}
var $this=$(this),reqLength=settings.required.length,i;for(i=0;i<reqLength;i++){validations.push(new Validation($this.find('[name="'+settings.required[i].name+'"]'),settings.required[i].validate||false));}
$this.on('submit',function(e){var failed=false;if(!$this.data('passed')){e.preventDefault();var reqLength=validations.length,i;for(i=0;i<reqLength;i++){if(!validations[i].validate()){failed=true;}}
if(!failed){if(settings.submit&&typeof settings.submit==='function'){settings.submit($this.serializeArray());return;}
$this.data('passed',true).submit();}else{if(settings.fail&&typeof settings.fail==='function'){settings.fail();return;}}}});});};}(jQuery);
//]]></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    
    <!-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->
    
    
    
    <script src="{{asset('season3/js/general.js')}}"></script>

    <script>
    window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];
        if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}});}(document,"script","twitter-wjs"));
    $(function(){function qotd_tweet(event){if(event){console.log(event)
    $.ajax({type:"POST",url:"http://www.ohmyenglish.com.my/ajax/ajax_track_omeguardian_social.php",cache:false,data:{gameName:"quote-"+event.target.id,gameAction:"twittershare"},success:function(data){}})}}
    twttr.ready(function(twttr){twttr.events.bind('tweet',qotd_tweet);});})
window.fbAsyncInit=function(){FB.init({appId:'261791247326791',xfbml:true,version:'v2.0'});$(".caption-gallery-col,.caption-specific").on("click",".caption-fb-share-btn",function(){var obj=$(this)
FB.ui({method:'feed',name:'Ohmyenglish Caption This',link:obj.attr("data-link"),picture:obj.attr("data-image"),caption:obj.attr("data-caption"),description:'This is ohmyenglish caption this'},function(response){if(response&&response.post_id){$.ajax({type:"POST",url:"http://www.ohmyenglish.com.my/ajax/ajax_track_meme_social.php",cache:false,data:{memeEntryID:obj.attr("memeEntryID"),socialType:"facebook"},success:function(data){}})}else{}});})
$(".game1leaderboard-fbshare-btn").click(function(){var obj=$(this)
FB.ui({method:'feed',name:'OME Guardians',link:obj.attr("data-link"),picture:obj.attr("data-image"),caption:obj.attr("data-caption"),description:'I’ve got Football Fever” and scored '+$(".lcurrent-points").html()+'etres on OME Guardians!!'},function(response){if(response&&response.post_id){$.ajax({type:"POST",url:"http://www.ohmyenglish.com.my/ajax/ajax_track_omeguardian_social.php",cache:false,data:{scores:obj.attr("scores"),socialType:"facebook"},success:function(data){}})}else{}});})
$(".game2leaderboard-fbshare-btn").click(function(){var obj=$(this)
FB.ui({method:'feed',name:'CHARACTER MINI GAME 2 - OME GUARDIANS SPY LEADER',link:obj.attr("data-link"),picture:obj.attr("data-image"),caption:obj.attr("data-caption"),description:"My score of "+$(".score_count span").html()+" makes me the ultimate spy for Ayer Dalam! Play OME Guardian’s SpyLeader at http://www.ohmyenglish.com.my/character-mini-games2"},function(response){if(response&&response.post_id){$.ajax({type:"POST",url:"http://www.ohmyenglish.com.my/ajax/ajax_track_omeguardian_social.php",cache:false,data:{scores:obj.attr("scores"),socialType:"facebook-2"},success:function(data){}})}else{}});})
$(".qotd-slider").on("click",".qotd-fb",function(){var obj=$(this)
FB.ui({method:'feed',name:'Oh My English! Seasons 3',link:"http://www.ohmyenglish.com.my/",picture:obj.attr("data-image"),caption:"Oh My English! Season 3 Quote Of The Week",description:obj.attr("data-caption")},function(response){if(response&&response.post_id){$.ajax({type:"POST",url:"ajax/ajax_track_characterminigames.php",cache:false,data:{gameName:"quote-"+obj.attr("quoteID"),gameAction:"facebookshare"}})}else{}});})};(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}
js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/en_US/sdk.js";fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>


<script src="{{asset('season3/js/TweenMax.min.js')}}"></script>
<script src="{{asset('season3/js/jquery.gsap.min.js')}}"></script>
<script src="{{asset('season3/js/jquery.timer.js')}}"></script>
<script src="{{asset('season3/js/spritespin.min.js')}}"></script>
<script src="{{asset('season3/js/characterminigames1.js')}}"></script>

@stop

@section('content')

<div class="playContent">

    <div class="container">

        <h1 class="title"><i>{{trans('play.football_fever_title')}}</i></h1>
        <p class="info">
            {{trans('play.football_fever_info')}}
        </p>

        <div class="en_pageviewport">
            <div class="audioarea">
                <audio controls id="gameaudio" loop>
                  <source src="{{asset('season3/media/characterminigames/game-bg.ogg')}}" type="audio/ogg">
                  <source src="{{asset('season3/media/characterminigames/game-bg.mp3')}}" type="audio/mpeg">
                  <source src="{{asset('season3/media/characterminigames/game-bg.wav')}}" type="audio/wav">
                </audio>
                <audio controls id="introaudio" autoplay loop>
                  <source src="{{asset('season3/media/characterminigames/intro-bg.ogg')}}" type="audio/ogg">
                  <source src="{{asset('season3/media/characterminigames/intro-bg.mp3')}}" type="audio/mpeg">
                  <source src="{{asset('season3/media/characterminigames/intro-bg.wav')}}" type="audio/wav">
                </audio>
            </div>
            
            

            <div class="characterminigames-col">
                <div class="smallscreenreplacement-content">
                    <div class="row">
                        <div class="six columns">
                            <h2>Opps</h2>
                            <p>
                                This game requires a larger screen. Please use a tablet or a desktop computer.
                            </p>
                        </div>
                        <div class="six columns">
                            <img src="{{asset('season3/graphic/noflash.png')}}" class="noflash-tb">
                        </div>
                    </div>
                </div>
                <div class="gamecanvas disableinteraction" gameSession="546a969a9655f-he6m3aqg" webroot="http://www.ohmyenglish.com.my/">
                    <a href="javascript:;" class="music-btn">
                    </a>
                    <a href="javascript:;" class="intro-col ">
                        <div class="intro-instruc">click here to start</div>
                    </a>
                    
                    <div class="gamestart-col">
                        <div class="instruction-ready">
                            <a href="javascript:" class="start-btn">start</a>
                        </div>

                        <!--<div style="background:#000; width: 320px; height: 320px; position: absolute; left: 50%; top: 50%; margin: -160px 0 0 -160px; z-index:10">-->

                        <div class="instruction-mask">
                            
                            <div class="instruction"></div>
                            <div class="clicking-hand"></div>
                            <div class="simple-instruction">hit the space bar on your<br> keyboard to make jibam jump!
                                <a href="javascript:;" class="moretips-btn">
                                    <img src="{{asset('season3/graphic/characterminigames/game1/more-btn.png')}}">
                                </a>
                            </div>

                        </div>
                        <div class="tips-col">
                            <a href="javascript:;" class="tips-back-btn"><img src="{{asset('season3/graphic/characterminigames/game1/back-btn.png')}}"></a>
                            
                            <div class="tips-item selected">
                                <img src="{{asset('season3/graphic/characterminigames/game1/1.png')}}">
                                <div class="simple-instruction">When Jibam gets caught, you've reach the end.<br>
                                    
                                </div>
                            </div>
                            <div class="tips-item">
                                <img src="{{asset('season3/graphic/characterminigames/game1/2.png')}}">
                                <div class="simple-instruction">
                                    Be ready for Sliders coming from the <br>
                                    other side. Jump to dodge them.
                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/3.png')}}">
                                <div class="simple-instruction">
                                    Answer Henry's english question<br>
                                    correctly to gain extra points.
                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/4.png')}}">
                                <div class="simple-instruction">
                                    This mystery box contains a guardian <br>
                                    to help Jibam get out of trouble.

                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/5.png')}}">
                                <div class="simple-instruction">Jojie offers you a speed boost<br>
                                    that last for 5 seconds.
                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/6.png')}}">
                                <div class="simple-instruction">
                                    Anusha has a healing tiffin carrier<br>
                                    to help you run away from Sarjan.
                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/7.png')}}">
                                <div class="simple-instruction">
                                    See Yew Soon gives immunity <br>
                                    to dodge the Slider once.
                                </div>
                            </div>
                            <div class="tips-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/8.png')}}">
                                <div class="simple-instruction">
                                    Watch out for Mr. Bujang lurking around <br>
                                    the corner! He's there to scare you!
                                </div>
                            </div>
                            <div class="tips-item last-item">
                                 <img src="{{asset('season3/graphic/characterminigames/game1/9.png')}}">
                                <div class="simple-instruction">
                                    When Jibam gets caught, you've reach the end.
                                    Time to tap the spacebar as fast as you can to score!
                                </div>
                            </div>

                            <div class="tips-page">
                                <span class="tips-numbering">1 / 9</span><a href="javascript:" class="next-tips-btn">next</a>
                            </div>
                        </div>
                        <div class="circle-animation">
                            <div class="landingcircle"></div>
                            <div class="landingrunnersprite"></div>
                            <div class="landingrunnerjumpsprite"></div>
                            <div class="landingtacklesprite"></div>
                        </div>
                        
                    </div>
                    <div class="bg-sky">
                        <div class="cloud1"></div>
                        <div class="cloud2"></div>
                        <div class="cloud3"></div>

                    </div>
                    <div class="minigames-time">
                        <div class="timesprite"></div>
                        <div class="minigames-seconds" incrementtime="1000">0 m</div>

                    </div>
                    <div class="mountains"></div>
                    <div class="bg-grass"></div>
                    <div class="henry">
                        
                        <div style="position: relative; margin-left: -50px">
                            <div class="dialog">
                                <div class="henryquestion-left">
                                    Hello
                                </div>
                                <div class="dialog-tail"></div>
                            </div>
                        </div>

                        <div class="henrysprite"></div>


                    </div>

                    <div class="chaser" data-distance="3">

                        <div class="chasersprite"></div>
                        <div class="chasercatchingsprite"></div>
                    </div>
                    <div class="runner">
                        <div class="runnersprite"></div>
                        <div class="runnerfallsprite"></div>
                        <div class="runnerjumpsprite"></div>

                        <div class="runnerhelmetsprite"></div>
                        <div class="runnerhelmetfallsprite"></div>
                        <div class="runnerhelmetjumpsprite"></div>

                        <div class="runnerspeedsprite"></div>
                        <div class="runnerspeedjumpsprite"></div>
                        <!-- 
                        <div class="runnerhelmetfallsprite"></div>
                        <div class="runnerhelmetjumpsprite"></div>              
                        -->
                    </div>
                    
                    <div class="tackle">
                        <div class="tacklesprite"></div>
                    </div>
                    <div class="hiddentreasurebox">
                        <div class="hiddentreasuresprite"></div>
                        <div class="hiddentreasureopensprite"></div>
                        <div class="hiddencursebox">
                            <div class="hiddencursesprite"></div>
                        </div>
                    </div>

                    <div class="guardian-takeover">
                        <div class="guardian1sprite"></div>
                        <div class="guardian2sprite"></div>
                        <div class="guardian3sprite"></div>
                    </div>
                    <div class="shoutsprite"></div>
                    <div class="kickoff-col">
                        <div class="kickoff-overlay">
                            <div class="kickoff-dialog">
                                
                                you got caught by Sarjan! <br><a href="javascript:;">tap the space bar</a> as fast as you can to kick the ball!
                                
                                
                                <!-- 
                                    tap the space bar as fast as you can
                                     tap the space bar as fast as you can

                                </a>-->
                            </div>
                        </div>
                        <div class="kicking-text">
                            <img src="{{asset('season3/graphic/characterminigames/game1/power-kick-time.png')}}">
                        </div>
                        <div class="kickingsprite"></div>   
                        <div class="kickimpact">
                            0 pt
                        </div>
                        <div class="ballsprite"></div>
                    </div>
                    <div class="leaderboard-col">
                        <div class="leaderboard-current-points">
                            <div class="lcurrent-points-text">
                                your score:
                                <div class="lcurrent-points">0m</div>

                                <div class="socialmedia-col">
                                    share
                                    <br>
                                    <a href="javascript:;" scores="" class="game1leaderboard-fbshare-btn" data-link="http://www.ohmyenglish.com.my/character-mini-games" data-image="graphic/characterminigames/game1/fb-share.png"><img src="{{asset('season3/graphic/characterminigames/game1/facebook.jpg')}}"></a>
                                    <a href="https://twitter.com/intent/tweet?text=I've%20got%20Football%20Fever%20and%20scored%200%20m%60etres%20on%20OME%20Guardians!!" class="game1leaderboard-twtshare-btn"><img src="{{asset('season3/graphic/characterminigames/game1/twitter.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                        <div class="leaderboard-slide"></div>
                        <div class="leaderboard-overlay">
                            <div class="leaderboard-popup">
                                <div class="leaderboard-dialog">
                                    good game! you made it to the top 10!! type in your name to submit your high score.

                                    <form method="post">
                                        <input type="text" maxlength="6" placeholder="type here" name="username" class="username">
                                        <input type="submit" value="submit" class="submitname">
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_football_fever'))}}?tap=yes" class="leaderboard-pagain">
                                <img src="{{asset('season3/graphic/characterminigames/game1/play-again.jpg')}}">
                            </a>

                        
                        <div class="leaderboard-panel">
                            <div class="leaderboard-title"></div>

                            <ul class="leaderboard-listing five_up tiles">
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="orange-bar"></div>
                </div>

                
                <div class="characterminigames-desc">
                    When Jibam climbed over the fence today, he accidentally woke Sarjan from his nap. Now Sarjan is on his tail and Jibam has to keep running away! Help him get to safety across the football field but keep your eyes peeled for what comes up. Call on the OME Guardians for their super powers!

                </div>
            </div>

        </div>


        <script type="text/javascript">$(function(){$(".tips-back-btn").click(function(){$(".tips-col").fadeOut()})
        $(".moretips-btn").click(function(){$(".tips-col").fadeIn()})
        $(".next-tips-btn").click(function(){var obj=$(".tips-item.selected")
        $(".tips-item").fadeOut()
        if(!obj.hasClass("last-item"))
        {obj.removeClass("selected").next().fadeIn().addClass("selected")}
        else
        {$(".tips-item").removeClass("selected")
        $(".tips-item").eq(0).addClass("selected").fadeIn()}
        console.log($(".tips-item.selected").index())
        $(".tips-numbering").html($(".tips-item.selected").index()+" / 9")})})</script> </div>
    </div>
</div>

@include('components.play-slider', ['footballFever' => 'active'])

@stop