@extends('layouts.master', ['pageTitle' => trans("about-trailer.page"),'page' => 'about', 'subPage' => 'trailers'])

@section('meta_include')

    <meta name="description" content="{{$trailer->meta_desc}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{$trailer->title}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/about/trailer/uploads/'.$trailerEn->url_name.'.jpg')}}"/>
    <meta property="og:description" content="{{$trailer->meta_desc}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta property="twitter:url" content="{{$url}}"/>
    <meta name="twitter:title" content="{{$trailer->title}}">
    <meta name="twitter:description" content="{{$trailer->meta_desc}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/about/trailer/uploads/'.$trailerEn->url_name.'.jpg')}}">
@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/about-trailer.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript" src="{{asset('bower_components/angular/angular.min.js')}}"></script>
<script type="text/javascript" src="//static.movideo.com/js/movideo.min.latest.js"></script>
<script type="text/javascript" src="{{asset('assets/js/about-trailer.js')}}"></script>
<script type="text/javascript">
var OME = OME || {};
OME.videoID = "{{$trailer->movideo_id}}";
OME.trailerUrl = '{{$url}}';
OME.baseUrl = '{{url()}}';
OME.curWeek = {{$curWeek}};
OME.trailerAvailable = {!!json_encode($trailerAvailable)!!};
OME.trackCopy = {
    "category": "{!!trans('track.about_category')!!}",

    "abtTrailer_episode_action": "{!!trans('track.abtTrailer_episode_action')!!}",
    "abtTrailer_episode_label": "{!!trans('track.abtTrailer_episode_label', ['episode' => '{episode}'])!!}",

};

$(function(){
    /* Learn slider */
    /*if($('#trailerSlider li').length > 0){
        bindSlider('#trailerSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);
    } */

    $('#video-player').html('');
    $('#video-player').player({
        apiKey: "movideoAstroCeria",
        flashAppAlias: "flashApp",
        iosAppAlias: "iPhone",
        api: "//api.movideo.com/rest/",
        mediaId: OME.videoID,
        autoPlay: false,
        shareLinkGeneratorFunction: 'moVideoShareLink'
    });

/*    if(!flashIsInstalled() && !isMobileDevice()){
        $('#video-player').html('<div class="no-flash">You need Flash player to play this video.<br /><a target="_blank" href="http://www.adobe.com/go/getflash">Download Flash from Adobe</a></div>');
    }*/
});

function moVideoShareLink(data) {
    var linkUrl = '';
    switch (data.shareType) {
        case 'link':
            linkUrl = OME.trailerUrl;
        break;
        case 'facebook':
            linkUrl = OME.trailerUrl;
            data.media.id;
        break;
        case 'twitter':
            linkUrl = OME.trailerUrl;
            data.media.id;
        break;
        default:
        linkUrl = '';
    }
    return linkUrl;
}

</script>
@stop

@section('content')
<div class="aboutTrailerContent">
	<section id="about-trailer" class="about-trailer" >
    	<div class="content" >
        	<div class="container">
            	<h1 class="title alt"><i>{{trans('about-trailer.trailer_title')}}</i></h1>
                <p class="info-center-text">{{trans('about-trailer.trailer_info')}}</p>
            	<div class="row">
                	<div class="col-lg-6 trailer-left">
                    	<div class="video-frame">
                        	<div id="video-player" class="video-player"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 trailer-right">
                    	<div class="trailer-info">
                    	 	<!-- <h1 class="trailer-episode">{{trans('about-trailer.trailer_episode')}}</h1><br/> -->
                            <h1 class="trailer-episode-title">{{$trailer->title}}</h1>
                            <br/>
                            <span class="trailer-details">{{$trailer->show_time}}</span><br/>
                            <span class="trailer-details">{{trans('about-trailer.trailer_channel')}}</span>
                            <br/>
                            <p class="info-text">{{$trailer->desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="trailerList" ng-init="init()" ng-controller="TrailerWeekListController">
    <div class="container">
        <h2 class="title">{{trans('about-trailer.trailer_list_title')}}</h2>
        <div id="listItem" class="listItem">
            <div id="trailerSlider">
                <ul>
                    <li ng-repeat="episode in trailerAvailable track by $index">
                       <a href="@{{ (+episode.enable == 1)?episode.url_name:'javascript:;' }}" class="btnZm btnEpi"
                            ng-class="{'active':episode.week == curWeek, 'locked': +episode.enable == 0}" ng-click="trackClick(episode.week)">
                            <span>{{trans('about-trailer.trailer_episode_list')}}<b>@{{episode.week}}</b></span></a>
                    </li>
                </ul>
            </div>

        </div>
        <a id="btn-list-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
        <a id="btn-list-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
    </div>
</div>
@stop