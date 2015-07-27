@extends('layouts.master', ['pageTitle' => trans("about-show.page"),'page' => 'about', 'subPage' => 'show'])

@section('meta_include')
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
 --><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{trans('about-show.meta_description')}}">
    <meta name="keywords" content="{{trans('global.meta_keyword')}}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('global.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('about-show.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('about-show.meta_description')}}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta property="twitter:url" content="{{$url}}"/>
    <meta name="twitter:title" content="{{trans('about-show.title')}}">
    <meta name="twitter:description" content="{{trans('about-show.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('global.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/about-show.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript">
var OME = OME || {};
OME.trackCopy = {
    "category": "{!!trans('track.about_category')!!}",

    "abtShow_meetTheChar_action": "{!!trans('track.abtShow_meetTheChar_action')!!}",
    "abtShow_meetTheChar_label": "{!!trans('track.abtShow_meetTheChar_label')!!}",

    "abtShow_viewTrailer_action": "{!!trans('track.abtShow_viewTrailer_action')!!}",
    "abtShow_viewTrailer_label": "{!!trans('track.abtShow_viewTrailer_label')!!}"
};

$('.btnChar').on('click',function(ev){
    ev.preventDefault()
    console.log(-$('.main-character-image').width() * ($(this).attr('data-index') -1));
    var imgPos = -$('.main-character-image').width() * ($(this).attr('data-index') -1);
    $('.main-character-image').css('background-position',imgPos);

	$('a').removeClass('btnActive');


	$('.btn_click_me').hide();

	/* Adding active class to btn clicked */
	$(this).addClass('btnActive');

});
</script>
<script type="text/javascript" src="{{ asset('assets/js/about-show.js') }}"></script>
@stop

@section('content')
<div class="aboutContent">
	<section id="inner-char">
    	<div class="content">
        	<div class="container">
            	<h1 class="title alt"><i>{{trans('about-show.about_show-title')}}</i></h1>
                <p class="info">
                    {{trans('about-show.about_show-info')}}
                </p>

                <div class="about-show-bg">
                	<img src="{{asset('assets/images/'.$lang.'/about_show-bg.jpg')}}" style="width:100%; max-width:1246px;" alt="{{trans('about-show.about_show-title')}}" />
                </div>

                <p class="info-center-text">
                	{{trans('about-show.about-show-description')}}
                </p>

                <p class="info-center-text">
                	{{trans('about-show.about-show-description-2')}}
                </p>

                <div class="row">
                    <div class="buttons">
                        <div class="btn_character">
                            <a href="{{url(App::getLocale().trans('global.url_about_characters'))}}" class="cta btnZm btn_lg" onClick="console.log(['TRACK', 'BM - Rancangan', 'BM - Temui watak utama'].join(' | '));"><span><b>{{trans('about-show.meet-characters')}}<i class="fa fa-chevron-right"></i></b></span></a>
                        </div>
                        <div class="btn_trailer">
                            <a href="{{url(App::getLocale().trans('global.url_about_trailers'))}}" class="cta btnZm btn_sm" onClick="console.log(['TRACK', 'BM - Rancangan', 'BM - Lihat treler'].join(' | '));"><span><b>{{trans('about-show.view-trailers')}}<i class="fa fa-chevron-right"></i></b></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop