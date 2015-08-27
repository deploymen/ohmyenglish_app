@extends('layouts.master-ohmygoat', ['pageTitle' => trans("omg.page"), 'page' => 'omg', 'subPage' => ''])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=1" />

    <meta name="description" content="{{trans('omg.meta_description')}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('omg.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('omg.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}">
    <meta name="twitter:title" content="{{trans('omg.title')}}">
    <meta name="twitter:description" content="{{trans('omg.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/omg.css') }}" /> 
@stop

@section('javascript_include')
<?php 
    $charPath = asset('assets/images/omg/characters');
?>
<script type="text/javascript" src="{{ asset('assets/js/flash_detect_min.js') }}"></script>
<script type="text/javascript" src="//static.movideo.com/js/movideo.min.latest.js"></script>

<script type="text/javascript">
    var OME = OME || {};
    <?php
    $videoId = array('1308526','1281938','1278236');
    $js_videoId = json_encode($videoId);
    echo "OME.videoID = ". $js_videoId . ";\n";
     ?>
    OME.charInfo = [];

    @for ($o = 1; $o <= 13; $o++)
        <?php $charNo = sprintf("%02d", $o); ?>
         
        var eachInfo = {};
        eachInfo.imgUrl = "{{ $charPath.'/'.trans('omg.char_img_'.$charNo) }}";
        eachInfo.charName = "{{ trans('omg.char_name_'.$charNo) }}";
        eachInfo.actorName = "{{ trans('omg.actor_name_'.$charNo) }}";
        eachInfo.charDesc = "{{ trans('omg.char_description_'.$charNo) }}";
        OME.charInfo.push(eachInfo);

    @endfor


</script>
<script type="text/javascript" src="{{ asset('assets/js/omg.js') }}"></script>
@stop

@section('content')

<div class="omgContent">
    <section id="header" class="header">
    </section>
    <section id="trailer" class="trailer">
        <div class="content">
            <div class="trailerSlider">
                <ul>
                    @for ($u = 1; $u <= count($videoId); $u++)
                    <li class="video<?php echo $u; if($u == 1) echo ' active' ?>">
                        <div id="video-frame" class="video-frame">
                            <div class="content">
                                <div id="video-player" class="video-player"></div>
                            </div>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
            <a id="btn-video-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
            <a id="btn-video-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
        </div>
    </section>
    <section id="synopsis" class="synopsis">
        <div class="content">
            <h2 class="title">{{trans('omg.synopsis_title')}}</h2>
            <p class="info">{{trans('omg.synopsis_desc')}} </p>
        </div>
    </section>
    <section id="meet-char" class="meet-char">
        <div class="content">
            <h2 class="title">{{trans('omg.meet_char_content_title')}}</h2>

            <div class="char-list">
                <ul>                            
                    <li class="empty slot1"></li>




                    <?php $slot = 1; ?>
                    @for ($i = 1; $i <= 13; $i++)
                        <?php $index = sprintf("%02d", $i); ?>
                        <li>
                            <div class="char-item">
                                <input type="hidden" class="char-img" value="{{ $charPath.'/'.trans('omg.char_img_'.$index) }}" alt="{{ trans('omg.char_name_'.$index) }}" />
                                <div class="char-know-more">
                                    <div class="char-know-more-content">
                                        <a href="javascript:void(0);" class="char-name" data-index="<?php echo $i ?>">{{ trans('omg.char_name_'.$index) }}<i class="fa fa-chevron-right"></i></a>                                   
                                    </div>
                                </div>
                            </div>
                        </li>          
                        @if($i == 2)
                            <li class="empty slot{{$slot++}}"></li>
                        @endif                    

                    @endfor

                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </section>

</div>
<div class="overlay">
    <div class="content">
        <a href="javascript:void(0);" class="close"><i class="fa fa-close"></i></a>
        <div class="char-thumb"></div>
        <div class="char-desc">
            <h3></h3>
            <p class="info"></p>
        </div>
    </div>
</div>
@stop