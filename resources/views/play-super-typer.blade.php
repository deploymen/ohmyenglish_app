@extends('layouts.master', ['pageTitle' => trans("play-super-typer.page"),'page' => 'play', 'subPage' => 'super-typer'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="{{trans('play-super-typer.meta_description')}}">
    <meta name="keywords" content="{{trans('play-super-typer.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('play-super-typer.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('play-super-typer.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  
    <meta property="og:description" content="{{trans('play-super-typer.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{url(App::getLocale().trans('global.url_super_typer'))}}">
    <meta name="twitter:title" content="{{trans('play-super-typer.title')}}">
    <meta name="twitter:description" content="{{trans('play-super-typer.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('play-super-typer.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  

@stop

@section('css_include')   
    

    <link rel="stylesheet" href="{{asset('season3/css/celcomgames.css')}}">
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

<script src="js/libs/modernizr-2.6.2.min.js"></script>
<!-- Grab Google CDN's jQuery, fall back to local if offline -->
<!-- 2.0 for modern browsers, 1.10 for .oldie -->

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

    <script>window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}});}(document,"script","twitter-wjs"));$(function(){function qotd_tweet(event){if(event){console.log(event)
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

<script src="{{asset('season3/js/index.js')}}"></script>
<script src="{{asset('season3/js/celcomgames.js')}}"></script>
<script src="{{asset('season3/js/jquery.scrollintoview.js')}}"></script>
<script src="{{asset('season3/js/jquery.scrollintoview.min.js')}}"></script>
<script src="{{asset('season3/js/console-shim.js')}}"></script>
<script src="{{asset('season3/js/console-shim.min.js')}}"></script>

@stop

@section('content')

<div class="playContent">
    <div class="container">
        <h1 class="title alt"><i>{{trans('play.super_typer_title')}}</i></h1>
        <p class="info">
            {{trans('play.super_typer_info')}}
        </p>

        <div>
            <?php
            $gameDialog[0][] = "Hi ";
            $gameDialog[0][] = "Jojie!";

            $gameDialog[1][] = "Aww, ";
            $gameDialog[1][] = "what ";
            $gameDialog[1][] = "happened? ";
            $gameDialog[1][] = "You ";
            $gameDialog[1][] = "can ";
            $gameDialog[1][] = "tell ";
            $gameDialog[1][] = "me ";
            $gameDialog[1][] = "all ";
            $gameDialog[1][] = "about ";
            $gameDialog[1][] = "it ";
            $gameDialog[1][] = "here.";

            $gameDialog[2][] = "Don't ";
            $gameDialog[2][] = "worry, ";
            $gameDialog[2][] = "we're ";
            $gameDialog[2][] = "on ";
            $gameDialog[2][] = "S.O.X. ";
            $gameDialog[2][] = "remember?";

            $gameDialog[3][] = "That's ";
            $gameDialog[3][] = "right!";

            $gameDialog[4][] = "OK... ";
            $gameDialog[4][] = "You ";
            $gameDialog[4][] = "don't ";
            $gameDialog[4][] = "like ";
            $gameDialog[4][] = "going ";
            $gameDialog[4][] = "to ";
            $gameDialog[4][] = "weddings?";

            $gameDialog[5][] = "Then ";
            $gameDialog[5][] = "what ";
            $gameDialog[5][] = "was ";
            $gameDialog[5][] = "it?";


            $gameDialog[6][] = "That ";
            $gameDialog[6][] = "sounds ";
            $gameDialog[6][] = "awful! ";
            $gameDialog[6][] = "&lt;hugs&gt;";

            $gameDialog[7][] = "Is ";
            $gameDialog[7][] = "it ";
            $gameDialog[7][] = "because ";
            $gameDialog[7][] = "you ";
            $gameDialog[7][] = "don't ";
            $gameDialog[7][] = "get ";
            $gameDialog[7][] = "along ";
            $gameDialog[7][] = "with ";
            $gameDialog[7][] = "your ";
            $gameDialog[7][] = "relatives? ";
            $gameDialog[7][] = ";(";

            //multi line section
            $gameDialog[8][] = "O_o ";
            $gameDialog[8][] = "An ";
            $gameDialog[8][] = "elephant ";
            $gameDialog[8][] = "fell ";
            $gameDialog[8][] = "on ";
            $gameDialog[8][] = "your ";
            $gameDialog[8][] = "head? ";
            $gameDialog[8][] = "=P";

            $gameDialog[9][] = "&lt;rolls ";
            $gameDialog[9][] = "eyes&gt; ";
            $gameDialog[9][] = "Were ";
            $gameDialog[9][] = "you ";
            $gameDialog[9][] = "picking ";
            $gameDialog[9][] = "your ";
            $gameDialog[9][] = "nose ";
            $gameDialog[9][] = "and ";
            $gameDialog[9][] = "someone ";
            $gameDialog[9][] = "took ";
            $gameDialog[9][] = "your ";
            $gameDialog[9][] = "photo?";

            //multi line section
            $gameDialog[10][] = "=_= ";
            $gameDialog[10][] = "Your ";
            $gameDialog[10][] = "S.O.X. ";
            $gameDialog[10][] = "credit ";
            $gameDialog[10][] = "expired?";

            $gameDialog[11][] = "Did ";
            $gameDialog[11][] = "your ";
            $gameDialog[11][] = "mum ";
            $gameDialog[11][] = "make ";
            $gameDialog[11][] = "you ";
            $gameDialog[11][] = "wear ";
            $gameDialog[11][] = "a ";
            $gameDialog[11][] = "kebaya?";

            $gameDialog[12][] = "Well ";
            $gameDialog[12][] = "you ";
            $gameDialog[12][] = "have ";
            $gameDialog[12][] = "to ";
            $gameDialog[12][] = "tell ";
            $gameDialog[12][] = "me ";
            $gameDialog[12][] = "so ";
            $gameDialog[12][] = "I ";
            $gameDialog[12][] = "can ";
            $gameDialog[12][] = "help ";
            $gameDialog[12][] = "you. ";
            $gameDialog[12][] = "Like ";
            $gameDialog[12][] = "Mr. ";
            $gameDialog[12][] = "Middleton ";
            $gameDialog[12][] = "always ";
            $gameDialog[12][] = "says, ";
            $gameDialog[12][] = htmlentities("\"a ");
            $gameDialog[12][] = "problem ";
            $gameDialog[12][] = "shared ";
            $gameDialog[12][] = "is ";
            $gameDialog[12][] = "a ";
            $gameDialog[12][] = "problem ";
            $gameDialog[12][] = htmlentities("halved\".");


            //multi line section
            $gameDialog[13][] = "COME ";
            $gameDialog[13][] = "ON ";
            $gameDialog[13][] = "TELL ";
            $gameDialog[13][] = "ME ";
            $gameDialog[13][] = "WHAT ";
            $gameDialog[13][] = "HAPPENED??????????";

            $gameDialog[14][] = "That's ";
            $gameDialog[14][] = "not ";
            $gameDialog[14][] = "a ";
            $gameDialog[14][] = "disaster, ";
            $gameDialog[14][] = "Jojie! ";
            $gameDialog[14][] = "&lt;wilted ";
            $gameDialog[14][] = "rose&gt;";

            $gameDialog[15][] = "&lt;disappointed&gt;";

            $gameDialog[16][] = "Is-";
            $gameDialog[16][] = "it-";
            $gameDialog[16][] = "who-";
            $gameDialog[16][] = "I-";
            $gameDialog[16][] = "think-";
            $gameDialog[16][] = "it-";
            $gameDialog[16][] = "is";
            $gameDialog[16][] = "????????";

            $gameDialog[17][] = "Jibam?";
            
            $gameDialog[18][] = "Zack?";

            $gameDialog[19][] = "KHAI?";

            $gameDialog[20][] = "But ";
            $gameDialog[20][] = "you ";
            $gameDialog[20][] = "sit ";
            $gameDialog[20][] = "next ";
            $gameDialog[20][] = "to ";
            $gameDialog[20][] = "him ";
            $gameDialog[20][] = "in ";
            $gameDialog[20][] = "class ";
            $gameDialog[20][] = "every ";
            $gameDialog[20][] = "day.";

            $gameDialog[21][] = "You ";
            $gameDialog[21][] = "did ";
            $gameDialog[21][] = "this ";
            $gameDialog[21][] = "weekend.";

            $gameDialog[22][] = "LOL. ";
            $gameDialog[22][] = "Gotta ";
            $gameDialog[22][] = "love ";
            $gameDialog[22][] = "S.O.X. ";
            $gameDialog[22][] = "cheap ";
            $gameDialog[22][] = "rates!!";

            $gameDialog[23][] = "I ";
            $gameDialog[23][] = "do ";
            $gameDialog[23][] = "that ";
            $gameDialog[23][] = "too!! ";
            $gameDialog[23][] = "Except ";
            $gameDialog[23][] = "not ";
            $gameDialog[23][] = "about ";
            $gameDialog[23][] = "Khai. ";
            $gameDialog[23][] = "I ";
            $gameDialog[23][] = "just ";
            $gameDialog[23][] = "tell ";
            $gameDialog[23][] = "my ";
            $gameDialog[23][] = "friend ";
            $gameDialog[23][] = "about ";
            $gameDialog[23][] = "everything ";
            $gameDialog[23][] = "that ";
            $gameDialog[23][] = "happened ";
            $gameDialog[23][] = "at ";
            $gameDialog[23][] = "school ";
            $gameDialog[23][] = "that ";
            $gameDialog[23][] = "day.";

            $gameDialog[24][] = "Haha. ";
            $gameDialog[24][] = "So ";
            $gameDialog[24][] = "what ";
            $gameDialog[24][] = "did ";
            $gameDialog[24][] = "he ";
            $gameDialog[24][] = "do?";

            $gameDialog[25][] = "OMG!!! ";
            $gameDialog[25][] = "&lt;shocked&gt; ";  
            $gameDialog[25][] = "&lt;shocked&gt; ";
            $gameDialog[25][] = "&lt;shocked&gt; ";
            $gameDialog[25][] = "&lt;shocked&gt; ";
            $gameDialog[25][] = "&lt;shocked&gt; ";
            $gameDialog[25][] = "&lt;shocked&gt;";

            $gameDialog[26][] = "Yea, ";
            $gameDialog[26][] = "how ";
            $gameDialog[26][] = "did ";
            $gameDialog[26][] = "it ";
            $gameDialog[26][] = "happen?";

            // multi line
            $gameDialog[27][] = "HE ";
            $gameDialog[27][] = "HELD ";
            $gameDialog[27][] = "YOUR ";
            $gameDialog[27][] = "HAND ";
            $gameDialog[27][] = "WHILE ";
            $gameDialog[27][] = "EATING ";
            $gameDialog[27][] = "DESSERT???";

            $gameDialog[28][] = "Ex-squeeze-me? ";
            $gameDialog[28][] = "Why ";
            $gameDialog[28][] = "can't ";
            $gameDialog[28][] = "he ";
            $gameDialog[28][] = "feed ";
            $gameDialog[28][] = "himself?";

            $gameDialog[29][] = "You ";
            $gameDialog[29][] = "should ";
            $gameDialog[29][] = "have ";
            $gameDialog[29][] = "MMS ";
            $gameDialog[29][] = "me ";
            $gameDialog[29][] = "a ";
            $gameDialog[29][] = "picture!! ";
            $gameDialog[29][] = "It's ";
            $gameDialog[29][] = "free ";
            $gameDialog[29][] = "on ";
            $gameDialog[29][] = "S.O.X.";

            $gameDialog[30][] = "How ";
            $gameDialog[30][] = "I ";
            $gameDialog[30][] = "wish ";
            $gameDialog[30][] = "I ";
            $gameDialog[30][] = "could ";
            $gameDialog[30][] = "be ";
            $gameDialog[30][] = "a ";
            $gameDialog[30][] = "fly ";
            $gameDialog[30][] = "on ";
            $gameDialog[30][] = "the ";
            $gameDialog[30][] = "wall ";
            $gameDialog[30][] = "that ";
            $gameDialog[30][] = "day! ";
            $gameDialog[30][] = "Haha. ";
            $gameDialog[30][] = "So ";
            $gameDialog[30][] = "did ";
            $gameDialog[30][] = "he ";
            $gameDialog[30][] = "break ";
            $gameDialog[30][] = "both ";
            $gameDialog[30][] = "arms?";

            $gameDialog[31][] = "LOL.";

            $gameDialog[32][] = "Aww ";
            $gameDialog[32][] = "Jojie, ";
            $gameDialog[32][] = "you're ";
            $gameDialog[32][] = "such ";
            $gameDialog[32][] = "a ";
            $gameDialog[32][] = "nice ";
            $gameDialog[32][] = "person!!";

            $gameDialog[33][] = "Yes, ";
            $gameDialog[33][] = "but ";
            $gameDialog[33][] = "you ";
            $gameDialog[33][] = "were ";
            $gameDialog[33][] = "being ";
            $gameDialog[33][] = "super ";
            $gameDialog[33][] = "nice ";
            $gameDialog[33][] = "to ";
            $gameDialog[33][] = "Khai... ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt; ";
            $gameDialog[33][] = "&lt;heart&gt;";

            $gameDialog[34][] = "OK ";
            $gameDialog[34][] = "so ";
            $gameDialog[34][] = "how ";
            $gameDialog[34][] = "did ";
            $gameDialog[34][] = "he ";
            $gameDialog[34][] = "hold ";
            $gameDialog[34][] = "your ";
            $gameDialog[34][] = "hand?";

            $gameDialog[35][] = "WOW. ";
            $gameDialog[35][] = "You ";
            $gameDialog[35][] = "made ";
            $gameDialog[35][] = "him ";
            $gameDialog[35][] = "CRY!";
            
            $gameDialog[36][] = "Aww... ";
            $gameDialog[36][] = "Poor ";
            $gameDialog[36][] = "Khai.";
            
            $gameDialog[37][] = "LOL. ";
            $gameDialog[37][] = "Did ";
            $gameDialog[37][] = "he ";
            $gameDialog[37][] = "ask ";
            $gameDialog[37][] = "to ";
            $gameDialog[37][] = "hold ";
            $gameDialog[37][] = "your ";
            $gameDialog[37][] = "hand?";

            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG-";
            $gameDialog[38][] = "OMG";


            $gameDialog[39][] = "Erm... ";
            $gameDialog[39][] = "Jojie, ";
            $gameDialog[39][] = "is ";
            $gameDialog[39][] = "he ";
            $gameDialog[39][] = "the ";
            $gameDialog[39][] = "first ";
            $gameDialog[39][] = "boy ";
            $gameDialog[39][] = "to ";
            $gameDialog[39][] = "hold ";
            $gameDialog[39][] = "your ";
            $gameDialog[39][] = "hand?";

            $gameDialog[40][] = "Alamak! ";
            $gameDialog[40][] = "What ";
            $gameDialog[40][] = "are ";
            $gameDialog[40][] = "you ";
            $gameDialog[40][] = "going ";
            $gameDialog[40][] = "to ";
            $gameDialog[40][] = "do ";
            $gameDialog[40][] = "tomorrow ";
            $gameDialog[40][] = "when ";
            $gameDialog[40][] = "you ";
            $gameDialog[40][] = "see ";
            $gameDialog[40][] = "him ";
            $gameDialog[40][] = "at ";
            $gameDialog[40][] = "school?";
            
            $gameDialog[41][] = "You're ";
            $gameDialog[41][] = "going ";
            $gameDialog[41][] = "to ";
            $gameDialog[41][] = "skip ";
            $gameDialog[41][] = "school? ";
            $gameDialog[41][] = "Are ";
            $gameDialog[41][] = "you ";
            $gameDialog[41][] = "not ";
            $gameDialog[41][] = "scared ";
            $gameDialog[41][] = "of ";
            $gameDialog[41][] = "Puan ";
            $gameDialog[41][] = "Aida?";

            $gameDialog[42][] = "Maybe ";
            $gameDialog[42][] = "you ";
            $gameDialog[42][] = "can ";
            $gameDialog[42][] = "try ";
            $gameDialog[42][] = "telling ";
            $gameDialog[42][] = "her ";
            $gameDialog[42][] = "through ";
            $gameDialog[42][] = "SMS?";

            $gameDialog[43][] = "HAHAHAHAHA. ";
            $gameDialog[43][] = "Yea ";
            $gameDialog[43][] = "she's ";
            $gameDialog[43][] = "not ";
            $gameDialog[43][] = "exactly ";
            $gameDialog[43][] = "12-17 ";
            $gameDialog[43][] = "years ";
            $gameDialog[43][] = "old. ";
            $gameDialog[43][] = "This ";
            $gameDialog[43][] = "phone ";
            $gameDialog[43][] = "plan ";
            $gameDialog[43][] = "is ";
            $gameDialog[43][] = "only ";
            $gameDialog[43][] = "for ";
            $gameDialog[43][] = "the ";
            $gameDialog[43][] = "youth!";

            $gameDialog[44][] = "What ";
            $gameDialog[44][] = "would ";
            $gameDialog[44][] = "you ";
            $gameDialog[44][] = "do ";
            $gameDialog[44][] = "if ";
            $gameDialog[44][] = "you ";
            $gameDialog[44][] = "could?";

            $gameDialog[45][] = "Ouch, ";
            $gameDialog[45][] = "Jojie! ";
            $gameDialog[45][] = "That's ";
            $gameDialog[45][] = "so ";
            $gameDialog[45][] = "mean ";
            $gameDialog[45][] = ":-p";


            $gameDialog[46][] = "That's ";
            $gameDialog[46][] = "true. ";
            $gameDialog[46][] = "Maybe ";
            $gameDialog[46][] = "you ";
            $gameDialog[46][] = "can ";
            $gameDialog[46][] = "do ";
            $gameDialog[46][] = "it ";
            $gameDialog[46][] = "tomorrow?";

            $gameDialog[47][] = "Yup. ";
            $gameDialog[47][] = "It's ";
            $gameDialog[47][] = "only ";
            $gameDialog[47][] = "2 ";
            $gameDialog[47][] = "sen ";
            $gameDialog[47][] = "to ";
            $gameDialog[47][] = "SMS ";
            $gameDialog[47][] = "me ";
            $gameDialog[47][] = "because ";
            $gameDialog[47][] = "we're ";
            $gameDialog[47][] = "both ";
            $gameDialog[47][] = "on ";
            $gameDialog[47][] = "S.O.X. ";
            $gameDialog[47][] = "so ";
            $gameDialog[47][] = "you ";
            $gameDialog[47][] = "send ";
            $gameDialog[47][] = "me ";
            $gameDialog[47][] = "messages ";
            $gameDialog[47][] = "as ";
            $gameDialog[47][] = "you ";
            $gameDialog[47][] = "want.";

            $gameDialog[48][] = "You'll ";
            $gameDialog[48][] = "be ";
            $gameDialog[48][] = "all ";
            $gameDialog[48][] = "right ";
            $gameDialog[48][] = "Jojie!";


            $gameDialog[49][] = "My ";
            $gameDialog[49][] = "lips ";
            $gameDialog[49][] = "are ";
            $gameDialog[49][] = "sealed ";
            $gameDialog[49][] = "=-#";


            $gameDialogQuestion[1][] = "Hi..."; 
            $gameDialogQuestion[2][] = "Last weekend was the worst weekend of my life!";
            $gameDialogQuestion[3][] = "This might take forever though.";
            $gameDialogQuestion[4][] = "Oh yea. Free calls or SMS or MMS all day after we reach RM1, right?";
            $gameDialogQuestion[5][] = "Well I went to my cousin Farouk’s wedding on Saturday.";
            $gameDialogQuestion[6][] = "No, it wasn’t the wedding that was the problem.";
            $gameDialogQuestion[7][] = "It started off as a normal family gathering but ended in disaster. ";
            $gameDialogQuestion[8][] = "I know! That’s why I’m so mad.";
            $gameDialogQuestion[9][] = "No, that wasn’t the reason.";


            $gameDialogQuestion[10][] = "I’m too fast for the elephant. Guess again.";
            $gameDialogQuestion[11][] = "Was I? No, I’m too smart for that. Guess again.";
            $gameDialogQuestion[12][] = "Ahaha... no that was last month. I made sure I topped up RM5 for the full 30 days this time.";
            $gameDialogQuestion[13][] = "I only wear kebaya during Raya! It was much worse than that.";
            $gameDialogQuestion[14][] = "Urghhh… I just want to forget it =(";
            $gameDialogQuestion[15][] = "OKOK!! I had to sit next to someone I really didn’t want to see!";
            $gameDialogQuestion[16][] = "Well it is if you know who I’m talking about.";
            $gameDialogQuestion[17][] = "The person I can’t stand in class just had to turn up at my cousin’s wedding.";
            $gameDialogQuestion[18][] = "Who do you think it is?";
            $gameDialogQuestion[19][] = "More annoying than Jibam.";


            $gameDialogQuestion[20][] = "More irritating then Zack."; 
            $gameDialogQuestion[21][] = "Yes! =_= ";
            $gameDialogQuestion[22][] = "But it doesn’t mean I want to see him on the weekends.";
            $gameDialogQuestion[23][] = "Yea!! I called my friend and just freaked out for the whole 3 minutes of my 28 sen call!";
            $gameDialogQuestion[24][] = "That’s why I joined this plan in the first place. Every time I got mad at Mr. OCD in class I would go home and call my friend and blah to her for the whole night!";
            $gameDialogQuestion[25][] = "Now I need to tell you everything.";
            $gameDialogQuestion[26][] = "He held my hand!!";
            $gameDialogQuestion[27][] = "I couldn’t believe it.";
            $gameDialogQuestion[28][] = "It all started with the dessert.";
            $gameDialogQuestion[29][] = "No… He asked me to feed him.";


            $gameDialogQuestion[30][] = "He broke his arm and it was in a cast. So he asked me to help him."; 
            $gameDialogQuestion[31][] = "Yea I’ll choose that freebie next time so I can just MMS you all day.";
            $gameDialogQuestion[32][] = "Only one. It was awkward okay?";
            $gameDialogQuestion[33][] = "He said he was in pain, so he couldn’t reach the food.";
            $gameDialogQuestion[34][] = "I am always a nice person.";
            $gameDialogQuestion[35][] = "It’s not what you think it is!";
            $gameDialogQuestion[36][] = "After I fed him, he started crying.";
            $gameDialogQuestion[37][] = "He said he didn’t have many friends at school.";
            $gameDialogQuestion[38][] = "Yea first poor him. Then poor me.";
            $gameDialogQuestion[39][] = "No way! He just… he just put his hand on mine when I wasn’t looking.";


            $gameDialogQuestion[40][] = "&lt;Confused&gt;"; 
            $gameDialogQuestion[41][] = "YES! But being his friend doesn’t mean I want him to hold my hand =(";
            $gameDialogQuestion[42][] = "Urghh!! I don’t know!! I can’t go to school tomorrow.";
            $gameDialogQuestion[43][] = "I’ve already been traumatised this weekend. The principal is not as scary as Khai right now.";
            $gameDialogQuestion[44][] = "What? No… I can’t! Anyway she’s not on S.O.X. because she’s not a teenager!";
            $gameDialogQuestion[45][] = "If only I could turn back time.";
            $gameDialogQuestion[46][] = "&lt;light bulb&gt; I would go and break his other arm!";
            $gameDialogQuestion[47][] = "LOL. Well if he had two broken arms he couldn’t hold my hand!";
            $gameDialogQuestion[48][] = "I’ll SMS you before I do it.";
            $gameDialogQuestion[49][] = "OK. This is still gonna be the worst weekend EVER.";
            $gameDialogQuestion[50][] = "Promise me you won’t tell anyone about this!!";

        ?>



        <script>
            var dialogArray = [[]];
            <?php $totalHints =  count($gameDialog) ?>
                @for ( $a = 0; $a < $totalHints; $a++)
                     <?php $dialogTotal = count($gameDialog[$a]); ?>
                     dialogArray[{{$a}}]= []; 
                     // multi line answers
                    @if($a >= 99 && $a <= 99)
                        @for($v = 0; $v < $dialogTotal; $v++)
                            dialogArray[{{$a}}][{{$v}}]= "<div class='multiLineAnswer'><div class='row'> <div class ='three columns'>"
                                + "<img src='{{asset("season3/graphic/celcomgames/timer_red.png")}}' class='timePenalty'/></div><div class ='nine columns'>"
                                + "<div class='hintContainer textContainerAnswer word_wrap container{{$a}}'>"+ "<span class='" + "{{$v}}" 
                                + " active'>" + "{{$gameDialog[$a][$v]}}" + "</span><textarea class='hint textAnswerContainer textCont{{$a}}"
                                + "'></textarea></div></div></div></div>";
                        @endfor
                    @else
                        @for($v = 0; $v< $dialogTotal; $v++)
                            @if( $v == 0)
                                dialogArray[{{$a}}][{{$v}}]= "<div class='row'> <div class ='three columns'>"
                                + "<img src='{{asset("season3/graphic/celcomgames/timer_red.png")}}' class='timePenalty penalty{{$a}}'/></div><div class ='nine columns'>"
                                + "<div class='row'><div class='eleven columns'><div class='hintContainer textContainerAnswer word_wrap container{{$a}}'>"+ "<span class='" + "{{$v}} " 
                                + " active'>" 
                                + "{{$gameDialog[$a][$v]}}" + "</span>";
                            @else
                                dialogArray[{{$a}}][{{$v}}]= "<span class='" + "{{$v}}" + " active'>" + "{{$gameDialog[$a][$v]}}" + "</span>";
                            @endif
                        @endfor
                    @endif
                @endfor
                
        </script>

        <div style="display: none">

            <audio id="send" >
                <source src="{{asset('season3/media/typing/send.mp3')}}"/>
                <source src="{{asset('season3/media/typing/send.ogg')}}"/>
            </audio>
             
            <audio id="mistake" >
                <source src="{{asset('season3/media/typing/wrong_typing.mp3')}}"/>
                <source src="{{asset('season3/media/typing/wrong_typing.ogg')}}"/>
            </audio>

            <audio id="typing">
                <source src="{{asset('season3/media/typing/typing.mp3')}}" />
                <source src="{{asset('season3/media/typing/typing.ogg')}}"/>

            </audio>

            <audio id="receive">
                <source src="{{asset('season3/media/typing/receive.mp3')}}"/>
                <source src="{{asset('season3/media/typing/receive.ogg')}}"/>
            </audio>

            <audio id="online">
                <source src="{{asset('season3/media/typing/online.mp3')}}"/>
                <source src="{{asset('season3/media/typing/online.ogg')}}"/>
            </audio>

            <audio id="offline">
                <source src="{{asset('season3/media/typing/offline.mp3')}}"/>
                <source src="{{asset('season3/media/typing/offline.ogg')}}"/>
            </audio>

            <audio id="result">
                <source src="{{asset('season3/media/typing/result.mp3')}}"/>
                <source src="{{asset('season3/media/typing/result.ogg')}}"/>
            </audio>

            <audio id="background" loop>
                <source src="{{asset('season3/media/typing/Monkeys Spinning Monkeys.mp3')}}"/>
                <source src="{{asset('season3/media/typing/Monkeys Spinning Monkeys.ogg')}}"/>
            </audio>
        </div>



        
        <div class="row mobileContainer">
            
            <div class="twelve columns">

                <div class="typeGameContainer">
                    


                    <div class="chatGameContainer"> 
                        <div class="row">

                            <div class="three columns mobileLeft">
                        
                            </div>

                            
                            <div class="six columns center mobileCenter">

                                <img src="{{asset('season3/graphic/celcomgames/phonespeaker.jpg')}}" class="speaker"/>
                                <img src="{{asset('season3/graphic/celcomgames/leftThumb.png')}}" class="leftThumb"/>
                                <img src="{{asset('season3/graphic/celcomgames/rightThumb.png')}}" class="rightThumb"/>


                                <div class="typeGameSplash">
                                    <div class="splashContainerChat">
                                        <div class="shadowOverlay">

                                            <img src="{{asset('season3/graphic/celcomgames/logo.png')}}" class="celcomlogo"/>
                                            

                                            <div class="splashText">

                                                <div class="splashInstructions">
                                                    One of our friends from SMK Ayer Dalam wants to chat with you. Type  the replies as fast as you can
                                                    before the time runs out!
                                                </div>

                                                    <div class="notificationText">Type in the box to start 
                                                    <br /> 
                                                        <div class="infoIconContainer">  </div>
                                                    </div>
                                        

                                                <div class="typeButtonContainer">
                                                    <input type="text" class="inputStartButton" >
                                                    <a href="#" class="typeStartButton">START</a>
                                                </div>


                                            </div>

                                            <div class="infoIconContainer">
                                                <img src="{{asset('season3/graphic/celcomgames/how_to_btn_landing.png')}}" class="infoIconImage" />
                                            </div>

                                            <div class="typeSplashFooter">
                                                Ignited by S.O.X.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="infoPageContainer">
                                        <img src="{{asset('season3/graphic/celcomgames/purple_close_btn.png')}}" class="infoPageClose" />
                                        <img src="{{asset('season3/graphic/celcomgames/how-to-play.jpg')}}" class="infoPage" />
                                    </div>

                                    <div class="pausePageContainer">
                                        <div class="pauseUiContainer">
                                            <img src="{{asset('season3/graphic/celcomgames/pasue-logo.png')}}" class="" />
                                            <div class="buttonWrapper">
                                                <div class="pausePageButtonContainer">
                                                    
                                                    <a href="#" class="resumeButton">Resume</a>
                                                </div>

                                                <div class="pausePageButtonContainer">
                                                    
                                                    <a href="#" class="closeButton">Quit</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="keyboardContainer">
                                            
                                            <div class="keyboard">
                                                <img src="{{asset('season3/graphic/celcomgames/keyboard.png')}}" class="keyboardImage" />
                                            </div>

                                        </div>
                                    </div>


                                    <div class="typeGameContent">
                                            <div class="row">

                                            <div class="twelve columns">

                                                <div class="chatarea">

                                                    <div class="row">

                                                        <div class="twelve columns">
                                                            <div class="headerTimer">
                                                                <div class="row">
                                                                        <div class="two columns">
                                                                        <div class="alignLeft">
                                                                            <img src="{{asset('season3/graphic/celcomgames/sound_on.png')}}" class="mute" />
                                                                            <img src="{{asset('season3/graphic/celcomgames/sound_off.png')}}" class="unmute" />
                                                                        </div>
                                                                    </div>  

                                                                    <div class="six columns">
                                                                        <div class='timerContainer'>
                                                                            <img src="{{asset('season3/graphic/celcomgames/headertimeicon.png')}}" class="" />
                                                                            <span class="countdown">90</span>
                                                                            <span>' sec</span>
                                                                        </div>  
                                                                        
                                                                    </div>
                                                                    <div class="four columns">
                                                                        <div class="alignRight">
                                                                            <img src="{{asset('season3/graphic/celcomgames/how_to_btn.png')}}" class="infoHeader" />
                                                                        </div>
                                                                        <div class="alignRight">
                                                                            <img src="{{asset('season3/graphic/celcomgames/pasue_btn.png')}}" class="pauseHeader" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row">

                                                        <div class="twelve columns">
                                                            
                                                            <div id="progressbar"></div>
                                                        </div>
                                                        
                                                    </div>

                                                    

                                                    <div class="chatboxgeneric">

                                                        <div class="onlineStatus">
                                                            Jojie is online!
                                                        </div>

                                                        <div class="chatbox1">

                                                            <div class="chatrow questionContainer chat1">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[1][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint0">



                                                            </div>

                                                        </div>      

                                                        <div class="chatbox2">
                                                            
                                                            <div class="chatrow questionContainer chat2">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[2][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint1">



                                                            </div>

                                                        </div>  

                                                                                        

                                                        <div class="chatbox3">
                                                            
                                                            <div class="chatrow questionContainer chat3">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[3][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint2">



                                                            </div>

                                                        </div>  

                                                        <div class="chatbox4">
                                                            
                                                            <div class="chatrow questionContainer chat4">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[4][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint3">



                                                            </div>

                                                        </div>


                                                        <div class="chatbox5">
                                                            
                                                            <div class="chatrow questionContainer chat5">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[5][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint4">



                                                            </div>

                                                        </div>


                                                        <div class="chatbox6">
                                                            
                                                            <div class="chatrow questionContainer chat6">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[6][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint5">



                                                            </div>

                                                        </div>


                                                        <div class="chatbox7">
                                                            
                                                            <div class="chatrow questionContainer chat7">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[7][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint6">



                                                            </div>

                                                        </div>

                                                        <div class="chatbox8">
                                                            
                                                            <div class="chatrow questionContainer chat8">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[8][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint7">



                                                            </div>

                                                        </div>

                                                        <div class="chatbox9">
                                                            
                                                            <div class="chatrow questionContainer chat9">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[9][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint8">



                                                            </div>

                                                        </div>

                                                        <div class="chatbox10">
                                                            
                                                            <div class="chatrow questionContainer chat10">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[10][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint9">



                                                            </div>

                                                        </div>

                                                        <div class="chatbox11">
                                                             
                                                            <div class="chatrow questionContainer chat11">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[11][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint10">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox12">
                                                             
                                                            <div class="chatrow questionContainer chat12">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[12][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint11">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox13">
                                                             
                                                            <div class="chatrow questionContainer chat13">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[13][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint12">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox14">
                                                             
                                                            <div class="chatrow questionContainer chat14">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[14][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint13">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox15">
                                                             
                                                            <div class="chatrow questionContainer chat15">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[15][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint14">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox16">
                                                             
                                                            <div class="chatrow questionContainer chat16">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[16][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint15">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox17">
                                                             
                                                            <div class="chatrow questionContainer chat17">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[17][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint16">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox18">
                                                             
                                                            <div class="chatrow questionContainer chat18">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[18][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint17">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox19">
                                                             
                                                            <div class="chatrow questionContainer chat19">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[19][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint18">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox20">
                                                             
                                                            <div class="chatrow questionContainer chat20">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[20][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint19">



                                                            </div>
                                                        </div>


                                                        <div class="chatbox21">
                                                             
                                                            <div class="chatrow questionContainer chat21">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[21][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint20">



                                                            </div>
                                                        </div>


                                                        <div class="chatbox22">
                                                             
                                                            <div class="chatrow questionContainer chat22">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[22][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint21">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox23">
                                                             
                                                            <div class="chatrow questionContainer chat23">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[23][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint22">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox24">
                                                             
                                                            <div class="chatrow questionContainer chat24">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[24][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint23">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox25">
                                                             
                                                            <div class="chatrow questionContainer chat25">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[25][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint24">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox26">
                                                             
                                                            <div class="chatrow questionContainer chat26">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[26][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint25">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox27">
                                                             
                                                            <div class="chatrow questionContainer chat27">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[27][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint26">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox28">
                                                             
                                                            <div class="chatrow questionContainer chat28">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[28][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint27">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox29">
                                                             
                                                            <div class="chatrow questionContainer chat29">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[29][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint28">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox30">
                                                             
                                                            <div class="chatrow questionContainer chat30">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[30][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint29">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox31">
                                                             
                                                            <div class="chatrow questionContainer chat31">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[31][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint30">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox32">
                                                             
                                                            <div class="chatrow questionContainer chat32">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[32][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint31">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox33">
                                                             
                                                            <div class="chatrow questionContainer chat33">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[33][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint32">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox34">
                                                             
                                                            <div class="chatrow questionContainer chat34">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[34][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint33">



                                                            </div>
                                                        </div>


                                                        <div class="chatbox35">
                                                             
                                                            <div class="chatrow questionContainer chat35">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[35][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint34">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox36">
                                                             
                                                            <div class="chatrow questionContainer chat36">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[36][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint35">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox37">
                                                             
                                                            <div class="chatrow questionContainer chat37">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[37][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint36">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox38">
                                                             
                                                            <div class="chatrow questionContainer chat38">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[38][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint37">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox39">
                                                             
                                                            <div class="chatrow questionContainer chat39">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[39][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint38">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox40">
                                                             
                                                            <div class="chatrow questionContainer chat40">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[40][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint39">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox41">
                                                             
                                                            <div class="chatrow questionContainer chat41">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[41][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint40">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox42">
                                                             
                                                            <div class="chatrow questionContainer chat42">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[42][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint41">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox43">
                                                             
                                                            <div class="chatrow questionContainer chat43">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[43][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint42">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox44">
                                                             
                                                            <div class="chatrow questionContainer chat44">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[44][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint43">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox45">
                                                             
                                                            <div class="chatrow questionContainer chat45">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[45][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint44">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox46">
                                                             
                                                            <div class="chatrow questionContainer chat46">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[46][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint45">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox47">
                                                             
                                                            <div class="chatrow questionContainer chat47">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[47][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint46">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox48">
                                                             
                                                            <div class="chatrow questionContainer chat48">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[48][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint47">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox49">
                                                             
                                                            <div class="chatrow questionContainer chat49">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[49][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint48">



                                                            </div>
                                                        </div>

                                                        <div class="chatbox50">
                                                             
                                                            <div class="chatrow questionContainer chat50">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    <?php echo $gameDialogQuestion[50][0] ?>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chatrow chatAnswerContainer hint49">



                                                            </div>
                                                        </div>


                                                        <div class="goodbye">
                                                            
                                                            <div class="chatrow questionContainer">
                                                                <div class="row">
                                                                    <div class ="three columns">
                                                                        <div class="imageContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/head-icon.png')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class ="nine columns">
                                                                        <div class="row">
                                                                            <div class="one column">
                                                                                <div class="dialogLeftTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="eleven columns">
                                                                                <div class="textContainerQuestion" value="">
                                                                                    Oops! I have to go! Talk to you later.
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="hack1">

                                                                
                                                        </div>


                                                        <div class="bebahOffline">Jojie is offline</div>

                                                        <div class="chatScoreboard">
                                                            <div class="resultContainer">
                                                                <div class="row">
                                                                    <div class ="six columns">
                                                                        <div class="thumbsupContainer">
                                                                            <img src="{{asset('season3/graphic/celcomgames/thumbs-up-256.png')}}" width= "100px" height="100px">
                                                                            <div class="thumbsupText">2</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class ="six columns">
                                                                        <div class="mistakes">
                                                                            <div class="row">
                                                                                <div class="six columns">
                                                                                    Mistakes:
                                                                                </div>
                                                                                <div class="six columns">
                                                                                    <div class="resultText">
                                                                                        <span class="mistakeSpn"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>  
                                                                            
                                                                            
                                                                        </div>
                                                                        <div class="completed">
                                                                            <div class="row">
                                                                                <div class="six columns">
                                                                                    <br/>Correct <br/> replies:
                                                                                </div>
                                                                                <div class="six columns">
                                                                                    <div class="resultText">
                                                                                        <br />
                                                                                        <br />
                                                                                        <span class="completedSpn"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="chatrow replay">

                                                            <div class="row">
                                                                <div class ="nine columns">
                                                                    <div class="replayPrompt">

                                                                        <div class='row'>
                                                                            <div class='one column'>
                                                                                <div class='dialogLeftTail'>
                                                                                <img src="{{asset('season3/graphic/celcomgames/chatbox_tail.png')}}" class='' />
                                                                                </div>
                                                                            </div>

                                                                            <div class='eleven columns'>
                                                                                <div class="replayText">
                                                                                    Play again? YES/NO
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="replyPrompt">
                                                                    <div class ="push_eight four columns">

                                                                        <div class="row">
                                                                            <div class="nine columns">
                                                                                <div class="hintContainer textContainerAnswer word_wrap resultChat" style="left: 0px;">
                                                                                    <div class="replayReply">
                                                                                        <input class="replayReplyInput" type="text" maxlength="3" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="three columns">
                                                                                <div class="dialogRightTail">
                                                                                    <img src="{{asset('season3/graphic/celcomgames/chatbox_tail_light-orange.png')}}" class="answerTailImage">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="hack">

                                                                            
                                                            </div>
                                                                

                                                        </div>
                                                    </div>

                                                </div>
                                                                                        

                                            </div>

                                                

                                            </div>

                                                


                                            <div class="keyboardContainer">
                                                
                                                <div class="keyboard">
                                                    <img src="{{asset('season3/graphic/celcomgames/keyboard.png')}}" class="keyboardImage" />
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="three columns mobileRight">
                                                    
                                    
                                </div>

                            </div>

                        

                                
                    </div>

                

                </div>
            </div>
            
        </div>





    </div>
</div>

@include('components.play-slider', ['superTyper' => 'active'])

@stop