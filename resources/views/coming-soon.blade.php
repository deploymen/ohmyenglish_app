@extends('layouts.master-coming-soon')

@section('meta_og_include')
    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('coming-soon.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    @if (!isset($video))
        <meta property="og:title" content="{{trans('coming-soon.title')}}"/>
        <meta property="og:url" content="{{url(App::getLocale().'/coming-soon')}}"/>
        <meta property="og:image" content="{{asset('img/share/share.default.facebook.png')}}"/>
        <meta property="og:description" content="{{trans('coming-soon.meta_description')}}"/> 
        
        <meta itemprop="description" content="{{trans('coming-soon.meta_description')}}">

    @elseif ($video == 1)
        <meta property="og:title" content="{{trans('coming-soon.title')}} - {{trans('coming-soon.video_title_01')}}"/>
        <meta property="og:url" content="{{url(App::getLocale().'/coming-soon/video1')}}"/>
        <meta property="og:image" content="{{asset('img/share/share.video1.facebook.png')}}"/>
        <meta property="og:description" content="{{trans('coming-soon.share_video_1_text')}}"/> 

        <meta itemprop="description" content="{{trans('coming-soon.share_video_1_text')}}">

    @elseif ($video == 2)
        <meta property="og:title" content="{{trans('coming-soon.title')}} - {{trans('coming-soon.video_title_02')}}"/>
        <meta property="og:url" content="{{url(App::getLocale().'/coming-soon/video2')}}"/>
        <meta property="og:image" content="{{asset('img/share/share.video2.facebook.png')}}"/>
        <meta property="og:description" content="{{trans('coming-soon.share_video_2_text')}}"/> 

        <meta itemprop="description" content="{{trans('coming-soon.share_video_2_text')}}">

    @elseif ($video == 3)
        <meta property="og:title" content="{{trans('coming-soon.title')}} - {{trans('coming-soon.video_title_03')}}"/>
        <meta property="og:url" content="{{url(App::getLocale().'/coming-soon/video3')}}"/>
        <meta property="og:image" content="{{asset('img/share/share.video3.facebook.png')}}"/>
        <meta property="og:description" content="{{trans('coming-soon.share_video_3_text')}}"/>         

        <meta itemprop="description" content="{{trans('coming-soon.share_video_3_text')}}">

    @else

    @endif

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:title" content="Oh My English! Season 4">
    <meta name="twitter:description" content="{{trans('coming-soon.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('coming-soon.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('img/share.jpg')}}">   

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="NOODP">
@stop

@section('css_include')
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1" />

<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@stop

@section('javascript_include') 
<script type="text/javascript" src="{{ asset('js/flash_detect_min.js') }}"></script>
<script type="text/javascript" src="//static.movideo.com/js/movideo.min.latest.js"></script>
<script type="text/javascript">
    var VARS = VARS || {
        lang: '{{ App::getLocale() }}',
        videoShareText: [
            "{!! trans('coming-soon.share_video_1_text') !!}",
            "{!! trans('coming-soon.share_video_2_text') !!}",
            "{!! trans('coming-soon.share_video_3_text') !!}"
        ],
        videoShareShortUrl: [
            "http://bit.ly/1DzSGv3",
            "{{url(App::getLocale().'/coming-soon/video2')}}",
            "{{url(App::getLocale().'/coming-soon/video3')}}"
        ],   
        videoIds: [1209063, 1209064, 1209065],               
        videoInitIndex: {{ isset($video)?($video-1):0 }}
    };

    var videoGalleryObj = {
        curIndex: 0,
        curVideoCode: '',
        curTitle: ''
    };
    var viewportObj = {
        minWidth: 0
    };
    var spriteObj = {
        imgs: [
            "{{ asset('img/char_mobile_set01.png') }}",
            "{{ asset('img/char_mobile_set02.png') }}",
            "{{ asset('img/char_mobile_set03.png') }}",
            "{{ asset('img/char01.png') }}",
            "{{ asset('img/char02.png') }}",
            "{{ asset('img/char03.png') }}",
            "{{ asset('img/char04.png') }}",
            "{{ asset('img/char05.png') }}",
            "{{ asset('img/char06.png') }}",
            "{{ asset('img/anim02.png') }}",
            "{{ asset('img/anim03.png') }}",
            "{{ asset('img/anim04.png') }}",
            "{{ asset('img/anim05.png') }}",
            "{{ asset('img/anim06.png') }}"
        ],
        sprite: [
            {left: '#sprite01', right: '#sprite02'},
            {left: '#sprite03', right: '#sprite04'},
            {left: '#sprite05', right: '#sprite06'}
        ]
    };
    
    $(function(){
        bindSocialBookmark();
        bindVideoEvt();
        bindVideoSocialShareEvt();
        
        $(window).resize(function(){
            setTimeout(function(){
               adjustViewport();
            }, 100);   
        });
        setTimeout(function(){
            adjustViewport();
        }, 100);
        
        window.onorientationchange = function() {
            adjustViewport();
        };

        $(window).load(function(){
            //only load for desktop
            if($(window).width() >= 1000){
                preloadImages(spriteObj.imgs,0, function(){ playVideo($('#play-list li a[data-index="' + VARS.videoInitIndex + '"]')); });
            }
            else
                playVideo($('#play-list li a[data-index="' + VARS.videoInitIndex + '"]'));
        });
    });
    
    /* evt handling */
    
    function adjustViewport(){
        return;
        try{
            var curMinWidth = 0;

            if($(window).width() >= 768)
                curMinWidth = 768;

            if(curMinWidth != viewportObj.minWidth){
                viewportObj.minWidth = curMinWidth;
                viewport = document.querySelector("meta[name=viewport]");
                viewport.setAttribute('content', 'width=1024, initial-scale=1.0, maximum-scale=1.0, user-scalable=1'); 
            }
        }catch(exception){
            
        }
    }
    
    function preloadImages(arr,num,callback){
        var c = new Image();
        var img = arr[num];
        c.src = img;

        c.onload = function(){
            if(arr.length == num+1){
                callback();
            }else{
                preloadImages(arr,num+1,callback);
            }
        }
    }
    
    function animImagesLoaded(){
        //playSprite(videoGalleryObj.curIndex);
    }
    
    function bindSocialBookmark(){
        $('#btn-follow-us').click(function(e){
            triggerSocialBookmarkMenu();
        });
    }
    
    function bindVideoEvt(){
        $('#play-list li a').click(function(e){
            e.preventDefault();
            playVideo(this);
        });
        
        $('#btn-prev-video').click(function(e){
            e.preventDefault();
            playPrevVideo();
        });
        
        $('#btn-next-video').click(function(e){
            e.preventDefault();
            playNextVideo();
        });

        $('#play-list img').mouseover(function() { 
            var src = $(this).attr("src").replace("normal.png", "hover.png");
            $(this).attr("src", src);
        
        }).mouseout(function() {
            var src = $(this).attr("src").replace("hover.png", "normal.png");
            $(this).attr("src", src);
        
        });
    }

   function bindVideoSocialShareEvt(){
        $('.social-sharing .facebook').click(function(e){
            e.preventDefault();            
            shareVideo('facebook')
        });
        
        $('.social-sharing .twitter').click(function(e){
            e.preventDefault();
            shareVideo('twitter')
        });
        $('.social-sharing .google').click(function(e){
            e.preventDefault();
            shareVideo('google')
        });
    }       
    /* end of evt handling */

    function shareVideo(platform){
        var shareUrl = "{{url('/'.App::getLocale().'/coming-soon/video')}}" + (videoGalleryObj.curIndex + 1);
        switch(platform){
            case 'facebook':
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + shareUrl);
                break;
            case 'twitter':
                window.open([
                    "http://twitter.com/share",
                    "?url=" + VARS.videoShareShortUrl[videoGalleryObj.curIndex],
                    "&text=" + VARS.videoShareText[videoGalleryObj.curIndex]
                ].join(''));
                break;
            case 'google':
                window.open('https://plus.google.com/share?url=' + shareUrl); 
                break;                                
        }
    }

    function moVideoShareLink(data){
        var shareUrl = "{{url('/'.App::getLocale().'/coming-soon/video')}}" + (videoGalleryObj.curIndex + 1);   

        switch(data.shareType){
            case 'facebook':
                return shareUrl;
            case 'twitter':
                return {'text': 'YYY', 'url': 'http://www.google.com'};
            default:
                return shareUrl;

        }
    }
    
    function triggerSocialBookmarkMenu(){
        //on desktop size, ignore it
        if($(window).width() > 1000){
            return;
        }
        
        if($('#btn-follow-us').hasClass('expanded')){
            $('#btn-follow-us').removeClass('expanded');
            $('#social-bookmark-list').removeClass('expanded');
        }else{
            $('#btn-follow-us').addClass('expanded');
            $('#social-bookmark-list').addClass('expanded');
        }
    }
    
    function playNextVideo(){
        videoGalleryObj.curIndex++;
        videoGalleryObj.curIndex = (videoGalleryObj.curIndex + 3)%3;        

        playVideo($('#play-list li a[data-index="'+videoGalleryObj.curIndex+'"]'));
    }
    
    function playPrevVideo(){
        videoGalleryObj.curIndex--;
        videoGalleryObj.curIndex = (videoGalleryObj.curIndex + 3)%3;              

        playVideo($('#play-list li a[data-index="'+videoGalleryObj.curIndex+'"]'));
    }
    
    function playVideo(elem){

        var videoId = $(elem).data('video-id');
        var index = $(elem).data('index');
        var title = $(elem).data('title');
        var frame = $(elem).parent();
        
        //video already playing, ignore
        if(title == videoGalleryObj.curTitle){
            return;
        }

        $('#play-list img').each(function(i){
            $(this).attr('src', '{{ asset('img/') }}' + '/thumb_video0' + (i + 1) +'.normal.png');
        });        
        $(elem).children('img').attr('src', '{{ asset('img/') }}' + '/thumb_video0' + (index + 1) +'.watch.png');
        


        //setup the video
        videoGalleryObj.curVideoCode = videoId;
        videoGalleryObj.curIndex = index;
        videoGalleryObj.curTitle = title;
        
        //set active playing 
        $('#play-list li').removeClass('active');
        frame.addClass('active');
        
        //set title
        setVideoTitle();
        
        //play anim
        playCharAnim(true);
        
        //start video
        startVideo();
    }
    
    function startVideo(){
        if(!flashIsInstalled() && !isMobile()){
            $('#video-player').html('<div class="no-flash">You need Flash player to play this video.<br /><a target="_blank" href="http://www.adobe.com/go/getflash">Download Flash from Adobe</a></div>');
            return;
        }
        
        $('#video-player').html('');
        $('#video-player').player({
            apiKey: "movideoAstroCeria", 
            flashAppAlias: "flashApp",
            iosAppAlias: "iPhone",
            api: "//api.movideo.com/rest/",
            mediaId: videoGalleryObj.curVideoCode,
            autoPlay: false,
            shareLinkGeneratorFunction: 'moVideoShareLink'            
        });

    }
    
    function setVideoTitle(){
        $('#video-title').text(videoGalleryObj.curTitle);
    }
    
    function playCharAnim(toAnimate){
        var left, right, group;
        var index = videoGalleryObj.curIndex;
        
        switch(parseInt(index)){
            case 1: 
                left = '#char-anim03';
                right = '#char-anim04';
                group = '#char-set02';
                break;
            case 2: 
                left = '#char-anim05';
                right = '#char-anim06';
                group = '#char-set03';
                break;
            default: 
                left = '#char-anim01';
                right = '#char-anim02';
                group = '#char-set01';
                break;
        }
        
        $('.char-anim.left').removeClass('selected');
        $('.char-anim.right').removeClass('selected');
        
        setTimeout(function(){
            $(left).addClass('selected');
            $(right).addClass('selected');
            
            startSprite(index);
        }, 300);
       
        $('.char-set').removeClass('active');
        $(group).addClass('active'); 
    }
    
    function startSprite(index){
        var left = spriteObj.sprite[index].left;
        var right = spriteObj.sprite[index].right;
        
        $('.sprite').removeClass('playing');
        $(left).addClass('playing');
        $(right).addClass('playing');
    }
    
    function isMobile(){
        if( navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         ){
            return true;
        }else{
            return false;
        }
    }
    
    function flashIsInstalled(){
        if(!FlashDetect.installed){
            return false;
        }else{
            return true;
        }
    }
</script>

@stop

@section('content')
<div class="container">
    <div class="content">
        <header class="ome {{trans('coming-soon.lang_code')}}">
            <div class="content">
                <div class="meta">Oh My English - Class of 2015: Big Changes Coming Your Way</div>
                <div class="lang-sel">
                    <ul>
                        <li><a href="?switch-language=en" class="en">EN</a></li>
                        <li><a href="?switch-language=ms" class="ms">BM</a></li>
                    </ul>
                </div>
                <div class="nav-option">
                    <!-- <a class="btn-back-to" target="_blank" href="/season3">{{trans('coming-soon.back_s3')}} <i class="fa fa-angle-double-right"></i></a> -->
                    <div class="social-bookmark">
                        <div id="btn-follow-us" class="follow-us">
                            {{trans('coming-soon.follow_us')}}
                            <span class="colon">:</span>
                            <span class="arrow"><i class="fa fa-angle-down"></i></span>
                        </div>
                   		<ul id="social-bookmark-list">
                            <li><a class="ico twitter" target="_blank" href="https://twitter.com/oh_my_english">
                                <i class="fa fa-twitter"></i></a></li>
                            <li><a class="ico facebook" target="_blank" href="https://www.facebook.com/OhMyEnglish"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="ico youtube" target="_blank" href="https://www.youtube.com/user/OhMyEnglishTV"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a class="ico instagram" target="_blank" href="https://instagram.com/ohmyenglish"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section class="video-gallery">
            <h1 style="display:none">Oh My English! Season 4</h1>
            <div class="content">
                <h2 id="video-title" class="title">A Piece of Cake</h2>
                <div class="video-frame">
                    <div id="play-list" class="play-list">
                        <ul>
                            <li class="video1">
                                <a href="#" data-video-id="1209063" data-index="0" data-title="{{trans('coming-soon.video_title_01')}}">
                                    <img src="{{ asset('img/thumb_video01.normal.png') }}" alt="{{trans('coming-soon.video_title_01')}}" />
                                </a>    
                                <div class="now-watching">{{trans('coming-soon.now_watching_text')}}</div>
                            </li>
                            <li class="video2">
                                <a href="#" data-video-id="1209064" data-index="1" data-title="{{trans('coming-soon.video_title_02')}}">
                                    <img src="{{ asset('img/thumb_video02.normal.png') }}" alt="{{trans('coming-soon.video_title_02')}}" />
                                </a>
                                <div class="now-watching">{{trans('coming-soon.now_watching_text')}}</div>
                            </li>
                            <li class="video3 last">
                                <a href="#" data-video-id="1209065" data-index="2" data-title="{{trans('coming-soon.video_title_03')}}">
                                    <img src="{{ asset('img/thumb_video03.normal.png') }}" alt="{{trans('coming-soon.video_title_03')}}" />
                                </a>
                                <div class="now-watching">{{trans('coming-soon.now_watching_text')}}</div>
                            </li>
                        </ul>
                    </div>
                    <a id="btn-prev-video" class="video-nav left" href="#"><span>Previous</span></a>
                    <a id="btn-next-video" class="video-nav right" href="#"><span>Next</span></a>
                    <div id="video-player" class="video-player"></div>
                </div>
                <div class="social-sharing">
                    <ul>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div> 
                <div class="info">
                    <p>
                        <strong>
                        {{trans('coming-soon.info_launch_date_title')}}<br />
                        {{trans('coming-soon.info_launch_date_on')}}
                        </strong>
                    </p>
                    <ul class="channel">
                        <li>
                            <img src="{{ asset('img/channel_tviq.png') }}" alt="TVIQ" />
                            {{trans('coming-soon.channel')}} 610
                        </li>
                        <li>
                            <img src="{{ asset('img/channel_maya.png') }}" alt="MAYA" />
                            {{trans('coming-soon.channel')}} 135
                        </li>
                    </ul>
                </div>
                <div class="char-set-mobile">
                    <div id="char-set01" class="char-set set01"></div>
                    <div id="char-set02" class="char-set set02"></div>
                    <div id="char-set03" class="char-set set03"></div>
                </div>
            </div>
            <div class="anim">
                <div id="sprite01" class="sprite left sprite01"></div>
                <div id="sprite02" class="sprite right sprite02"></div>
                <div id="sprite03" class="sprite left sprite03"></div>
                <div id="sprite04" class="sprite right sprite04"></div>
                <div id="sprite05" class="sprite left sprite05"></div>
                <div id="sprite06" class="sprite right sprite06"></div>
                <div id="char-anim01" class="char-anim left char01"></div>
                <div id="char-anim02" class="char-anim right char02"></div>
                <div id="char-anim03" class="char-anim left char03"></div>
                <div id="char-anim04" class="char-anim right char04"></div>
                <div id="char-anim05" class="char-anim left char05"></div>
                <div id="char-anim06" class="char-anim right char06"></div>
            </div>
        </section>
    </div>
</div>

@stop