@extends('layouts.master', ['pageTitle' => trans("play-spy-leader.page"),'page' => 'play', 'subPage' => 'spy-leader'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="{{trans('play-spy-leader.meta_description')}}">
    <meta name="keywords" content="{{trans('play-spy-leader.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-spy-leader.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-spy-leader.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  
    <meta property="og:description" content="{{trans('play-spy-leader.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_spy_leader'))}}">
    <meta name="twitter:title" content="{{trans('play-spy-leader.title')}}">
    <meta name="twitter:description" content="{{trans('play-spy-leader.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-spy-leader.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  

@stop

@section('css_include') 
    <link rel="stylesheet" href="{{asset('season3/css/characterminigames2.css')}}">   
    <link rel="stylesheet" href="{{ asset('assets/css/play.css')}}" /> 
    <style type="text/css">
        li.special {
            margin-bottom: -56px;
        }
    </style>
    
@stop

@section('javascript_include') 


<script type="text/javascript">
    var OME = OME || {};
    OME.baseUrl = '{{url()}}';
    OME.assetUrl = '{{asset("")}}';

</script>
<script src="{{asset('season3/js/spritespin.min.js')}}"></script>
<script src="{{asset('season3/js/pause.js')}}"></script>
<script src="{{asset('season3/js/jquery.queryloader2.js')}}"></script>
<script type="text/javascript" src="{{asset('season3/js/characterminigames2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/play.js')}}"></script>
@stop

@section('content')

<div class="playContent">
    <div class="en_pageviewport">
        
        
        
        <div class="gamecanvas2wrapper">
            <div class="container">
                <h1 class="title alt"><i>{{trans('play.spy_leader_title')}}</i></h1>
                <p class="info">
                    {{trans('play.spy_leader_info')}}
                </p>

                <div class="gamecanvas2 answernow" gameSession="546c8b2490665-rz4hdwzv">



                    <!--GAME INTERFACE-->
                    <div class="back_layer2">
                            <div class="trainer1"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/trainer1.png')}}"></div>
                            <div class="trainer2_container">
                                <div class="trainer2"></div>
                            </div>
                            <div class="trainer3_container">
                                <div class="trainer3"></div>
                            </div>
                            <div class="trainer4"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/trainer4.png')}}"></div>
                            <div class="trainee_container">
                                <div class="trainee"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/cheerleader.png')}}"> --></div>
                            </div>

                            <div class="rightguardian_container">
                                <div class="rightguardian"></div>
                            </div>
                        
                    </div>
                    <div class="backgrass_layer2">
                        <div class="back_grass2"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/backgrass2.png')}}"></div>
                            <div class="back_grass1"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/backgrass1.png')}}"></div>
                            
                    </div>

                    <div class="orange_layer">
                        <!-- <div class="gameover">GAME OVER!</div> -->
                        <!-- <div class="timesup"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/timesup.png')}}"></div> -->
                    </div>

                    <div class="guardian_container">
                        <div class="mazleeinfo_container clearfix">
                            <div class="info_btn">i</div>
                            <div class="mazleeinfo">
                                Answer Mazlee’s question and he will help 
                                distract the coach for you! Pick from one 
                                of the  three  letters  to  complete  the 
                                spelling of the word.
                            </div>
                        </div>
                        <div class="question_container clearfix">
                            <div class="question"><p>aw__some!</p></div>
                            <div class="answer1"><p><a href="javascript:;">e</a></p></div>
                            <div class="answer2"><p><a href="javascript:;">a</a></p></div>
                            <div class="answer3"><p><a href="javascript:;">o</a></p></div>
                            
                        </div>
                        <div class="guardian"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/mazlee.png')}}"> --></div>
                                
                    </div>


                    <div class="wall_layer2"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/wall.jpg')}}"></div>
                    <div class="front_layer2">
                        <div class="girl_hide"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/girl_hide.png')}}"> --></div>
                        <div class="girlstand_container">
                            <div class="girl_stand"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/girl_stand.png')}}"> --></div>
                        </div>
                        
                        <div class="girl_shock"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/girl_shock.png')}}"></div>
                        <div class="getcaught_container">
                            <div class="getcaught"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/shock.png')}}"> --></div>
                        </div>
                        
                    </div>

                    <div class="top_layer2 clearfix">
                        <div class="freeze_time"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/freezetime.png')}}"></div>
                        <div class="topleft_layer2">
                            <span>60</span><br>sec
                        </div>
                        <div class="topright_layer2">
                            
                            
                        <div class="score_count"><span>0</span> pts</div>
                        </div>
                        
                    </div>

                    

                    <div class="score_container">

                        <div class="score_inner">
                            <div class="score_counting clearfix">
                                <div class="activemazlee">ACTIVATED</div>
                                <div style="position: absolute; right:0">
                                    <div class="scorebar_x"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/scorebar-x.png')}}"> --></div>
                                </div>
                                <div class="scorebar_bullet"></div>
                                <div class="scorebar_bullet"></div>
                                
                            </div>
                            
                        </div>
                        <div class="mazleebtn"><!-- <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/mazleebtn.png')}}"> --></div>
                    </div>

                    <!--Before Start-->
                    <div class="prepare_start">
                        <div class="tutorial_layer">
                            <div class="tutorial1">
                                <div class="tutorial1_word"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/tutorial1_word.png')}}"></div>
                                <div class="tutorial1_img"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/tutorial1_img.png')}}"></div>
                            </div>
                            <div class="tutorial2">
                                <div class="tutorial2_word"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/tutorial2_word.png')}}"></div>
                                <div class="tutorial2_img"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/tutorial2_img.png')}}"></div>
                            </div>
                        </div>
                        <div class="countdown_layer">
                            <div class="countdown_word">3</div>
                            <div class="countdown_start"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/countdown_start.png')}}"></div>
                        </div>

                    </div>

                    <!-- LANDING PAGE -->
                    <div class="landingpage">
                        <div class="landing_title"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_title.png')}}"></div>
                        <div class="leaderboard_btn"><a href="javascript:;" class="leaderboard"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/leaderboard_btn.png')}}"></a></div>
                        <div class="landing_infobtn"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_infobtn.png')}}"></a></div>
                        
                        <div class="landing_start_bg"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_start_bg.png')}}"></a></div>
                        <div class="landing_start"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_start.png')}}"></a></div>
                        
                        <div class="landing_start_rollover_bg"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_start_rollover_bg.png')}}"></a></div>
                        <div class="landing_start_rollover"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_start_rollover.png')}}"></a></div>
                        <div class="back_landing2"> 
                            
                        </div>
                        <div class="backgrass_landing2">
                            <div class="landing_grass2"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/backgrass2.png')}}"></div>
                            <div class="landing_grass1"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/backgrass1.png')}}"></div>
                        </div>
                        <div class="landinggirl"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/landing_girl.png')}}"></div>
                        <div class="landingdescription">
                            “ Ayer Cetek is practicing their cheerleading routine!<br>
                            Help Anusha to spy on them and get the news back to Ayer Dalam! ”
                        </div>
                    </div>
                    
                    
                    <!--AFTER GAME-->
                    <div class="aftergame">
                        <div class="loading">Loading...</div>
                        <div class="endscene">
                            <!-- <div class="endscene_score">Your Score: <span></span></div> -->
                            <!-- <div class="nameInput_container">
                                <h1>Your Name:</h1>
                                <input type="text" value="" required>
                                <a href="javascript:;" class="completeInput">DONE</a>
                            </div> -->
                            <div class="gameoverword"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/gameover_word.png')}}"></div>
                            <div class="timesupword"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/timesup_title.png')}}"></div>
                            <div class="gameover_container clearfix">
                                <div class="gameover_title"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/endscenetitle.png')}}"></div>
                                <div class="gameover_rank">rank <br> <span>123</span></div>
                                <div class="gameover_rightcontainer">
                                    score <br> <span>pts</span>
                                    <div class="socialmedia_container clearfix">
                                        
                                        <div class="fbshare"><a href="javascript:;" class="game2leaderboard-fbshare-btn" data-link="http://www.ohmyenglish.com.my/character-mini-games2" data-image="{{asset('season3/graphic/characterminigames/game2/fb_image.jpg')}}" data-caption=""><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/fbshare.png')}}"></a></div>
                                        <div class="twshare"><a href="javascript:;" class="game2leaderboard-twtshare-btn" data-link="http://www.ohmyenglish.com.my/character-mini-games2"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/twshare.png')}}"></a></div>
                                    </div>
                                </div>
                                
                                <div class="inputname_container">
                                    <!-- <input class="inputname firstinput" type="text" value="_" disabled="disabled">
                                    <input class="inputname secondinput" type="text" value="_" disabled="disabled">
                                    <input class="inputname thirdinput" type="text" value="_" disabled="disabled">
                                    <input class="inputname fourthinput" type="text" value="_" disabled="disabled">
                                    <input class="inputname fifthinput" type="text" value="_" disabled="disabled">
                                    <input class="inputname sixthinput" type="text" value="_" disabled="disabled"> -->
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="inputname_containertop">
                                    <input type="text" class="fname" name="fname" autofocus>
                                </div>
                                <div class="submittedtext">-submitted-</div>
                                <div class="gameover_btncontainer clearfix">
                                    <div class="endscene_submit"><a href="javascript:;">SUBMIT</a></div>
                                    <div class="gameover_leaderboard"><a href="javascript:;" class="leaderboard"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/leaderboard_btn.png')}}"></a></div>
                                </div>
                                <div class="gameover_playagain"><a href="{{LaravelLocalization::getLocalizedURL($lang, trans('routes.play_spy_leader'))}}?skipintro=yes">PLAY AGAIN</a></div>
                                <div class="gameover_blink"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/gameover_blink.png')}}"></div>
                            </div>
                            <!-- <div class="gameover_leaderboard"><a href="javascript:;" class="leaderboard">LEADERBOARD</a></div> -->
                        </div>
                    </div>

                    <!--INFO PAGE-->
                    <div class="instruction_layer">
                        <div class="instruction_container">
                            <div class="instruction_title"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction_title.png')}}"></div>
                            <div class="instruction_prev"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction_prev.png')}}"></a></div>
                            <div class="instruction_next"><a href="javascript:;"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction_next.png')}}"></a></div>
                            <div class="instruction_pages clearfix">
                                <ul>
                                    <li><a href="javascript:;" page-data="instruction1"><div class="page1 everypage_dots"></div></a></li>
                                    <li><a href="javascript:;" page-data="instruction2"><div class="page2 everypage_dots"></div></a></li>
                                    <li><a href="javascript:;" page-data="instruction3"><div class="page3 everypage_dots"></div></a></li>
                                    <li><a href="javascript:;" page-data="instruction4"><div class="page4 everypage_dots"></div></a></li>
                                    <li><a href="javascript:;" page-data="instruction5"><div class="page5 everypage_dots"></div></a></li>
                                </ul>
                            </div>
                            <div class="instruction_close"><a href="javascript:;">CLOSE</a></div>
                            <ul class="instructionall">
                                <li>
                                    <div class="instruction1 instructionpage">
                                        <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction1.png')}}">
                                        <p>To spy on Ayer Cetek, left-click on your mouse/touch your mobile screen and hold for a few seconds.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="instruction2 instructionpage">
                                        <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction2.png')}}">
                                        <p>Look out for the coach! To avoid being seen, lift your finger to release the hold. Anusha will go back down to hide.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="instruction3 instructionpage">
                                        <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction3.png')}}">
                                        <p>If you get caught spying, the game is over!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="instruction4 instructionpage">
                                        <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction4.png')}}">
                                        <p>Once you hit 300 points, the OME Guardian will come out to help you.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="instruction5 instructionpage">
                                        <img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/instruction5.png')}}">
                                        <p>Answer Mazlee’s cheerleading questions and he will distract the coach for you to continue spying.</p>
                                    </div>
                                </li>
                            </ul>
                            
                            
                            
                            
                            
                        </div>
                    </div>


                    <!--Leaderboard-->
                    <div class="leaderboard_layer">
                        <div class="leaderboard_container">
                            <div class="leaderboard_title"><img draggable="false" src="{{asset('season3/graphic/characterminigames/game2/leaderboard_title.png')}}"></div>
                            <div class="leaderboard_contents">
                                <ul class="two_up tiles">

                                </ul>
                            </div>
                            
                            <div class="close_leaderboard"><a href="javascript:;">CLOSE</a></div>
                        </div>
                        
                    </div>
                </div>
                <div class="audioarea">
                    <audio controls id="playingaudio">
                      <source src="{{asset('season3/media/characterminigames/game2/thebuilder.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/thebuilder.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/thebuilder.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="landingaudio" autoplay loop>
                      <source src="{{asset('season3/media/characterminigames/game2/fun_in_a_bottle.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/fun_in_a_bottle.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/fun_in_a_bottle.wav')}}" type="audio/wav">
                    </audio>
                     <audio controls id="gotchaaudio">
                      <source src="{{asset('season3/media/characterminigames/game2/gotcha.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/gotcha.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/gotcha.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="timesupaudio">
                      <source src="{{asset('season3/media/characterminigames/game2/fanfare.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/fanfare.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/fanfare.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="gameoveraudio">
                      <source src="{{asset('season3/media/characterminigames/game2/gameover.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/gameover.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/gameover.wav')}}" type="audio/wav">
                    </audio>
                     <audio controls id="hmmaudio">
                      <source src="{{asset('season3/media/characterminigames/game2/hmm.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/hmm.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/hmm.wav')}}" type="audio/wav">
                    </audio>
                    <audio controls id="countdownaudio">
                      <source src="{{asset('season3/media/characterminigames/game2/countdown.ogg')}}" type="audio/ogg">
                      <source src="{{asset('season3/media/characterminigames/game2/countdown.mp3')}}" type="audio/mpeg">
                      <source src="{{asset('season3/media/characterminigames/game2/countdown.wav')}}" type="audio/wav">
                    </audio>
                </div>
            </div>
        </div>

    </div>
</div>

@include('components.play-slider', ['spyLeader' => 'active'])

@stop