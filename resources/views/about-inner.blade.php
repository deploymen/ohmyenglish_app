@extends('layouts.master', ['pageTitle' => trans($charFile.".title"), 'page' => 'about', 'subPage' => 'characters'])

@section('meta_include')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{!!trans("{$charFile}.meta_description")!!}">
    <meta name="keywords" content="{!!trans("{$charFile}.meta_keyword")!!}">

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{!!trans("{$charFile}.meta_keyword")!!}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{!!trans("{$charFile}.shared-title")!!}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/characters/'.$character->id.'/rectangle.jpg')}}"/>
    <meta property="og:description" content="{!!trans("{$charFile}.shared-description")!!}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{!!$url!!}">
    <meta name="twitter:title" content="{!!trans("{$charFile}.shared-title")!!}">
    <meta name="twitter:description" content="{!!trans("{$charFile}.shared-description")!!}">
    <meta name="twitter:keyword" content="{!!trans("{$charFile}.meta_keyword")!!}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/characters/'.$character->id.'/square.jpg')}}">

@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/about-inner.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/cool-share/plugin.css') }}" />
@stop

@section('javascript_include')
<script type="text/javascript" src="{{ asset('bower_components/cool-share/plugin.js') }}"></script>
<script type="text/javascript">
var OME = OME || {};
OME.trackCopy = {
    "category": "{!!trans('track.about_category')!!}",

    "abtInner_share_action": "{!!trans('track.abtInner_share_action', ['charName' => $character->name])!!}",
    "abtInner_share_label": "{!!trans('track.abtInner_share_label')!!}",

    "abtInner_clickToReveal_action": "{!!trans('track.abtInner_clickToReveal_action', ['charName' => $character->name])!!}",
    "abtInner_clickToReveal_label": "{!!trans('track.abtInner_clickToReveal_label')!!}",

    "abtInner_viewTrailer_action": "{!!trans('track.abtInner_viewTrailer_action', ['charName' => $character->name])!!}",
    "abtInner_viewTrailer_label": "{!!trans('track.abtInner_viewTrailer_label')!!}"
};


$( document ).ready(function() {
    $('.btnChar').on('click',function(ev){
        ev.preventDefault();

        var imgPos = -$('.main-character-image').width() * ($(this).attr('data-index') -1);
        $('.main-character-image').css('background-position',imgPos);

        $('a').removeClass('btnActive');
        $('.btn_click_me').hide();

        /* Adding active class to btn clicked */
        $(this).addClass('btnActive');

    });
    //
    OME.shareUrl = '{{url("en/about/characters/".$character)}}';
    switch(OME.language){
        case 'en': OME.shareUrl = '{{url("en/about/characters/".$character->id)}}'; break;
        case 'ms': OME.shareUrl = '{{url("ms/tentang/watak/".$character->id)}}'; break;
    }

    $('.btn_share').shareButtons(OME.shareUrl, {
      twitter: {
        text: '{{trans("about-inner.share-text")}}'//, via: 'Oh_My_english'
      },
      facebook: true,
      googlePlus: true
    });

    $('.btn_share').click(function(){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtInner_share_action, OME.trackCopy.abtInner_share_label, 'userAction');
    });

    $('.showSocialButtons').hover(function(){
        $('.btn_xs').addClass("hovered")
    }, function(){
        $('.btn_xs').removeClass("hovered")
    })
});

</script>
<script type="text/javascript" src="{{ asset('assets/js/about-inner.js') }}"></script>
@stop

@section('content')
<div class="aboutContent">
	<section id="inner-char" class="inner-char {{$character->id}}">
    	<div class="content">
        	<div class="container">
            	<div class="row">
                	<div class="col-lg-1"></div>
                    <div class="col-lg-5 col-xs-12 inner-char-left">
                        <div class="main-character-image"></div>
                        <div class="btn_click_me"><img src='{{asset("assets/images/{$lang}/click-me.png")}}' alt="Click Me - Oh My English" /></div>
                        <div class="btn_heart"><a href="#" class="btnZm btnChar" data-index="2"><i></i></a></div>
                        <div class="btn_cupcake"><a href="#" class="btnZm btnChar btnActive" data-index="1"><i></i></a></div>
                        <div class="btn_pencil"><a href="#" class="btnZm btnChar" data-index="3"><i></i></a></div>

                        <!-- fix content !-->
                        <div class="inner-char-books"></div>
                        <div class="inner-char-bag"></div>
                        <!-- end fix content !-->
                    </div>
                    <div class="col-lg-5 col-xs-12 inner-char-right">
                        <div class="inner-char-info">
                            <div class="inner-char-name">
                                <h1 class="actor-name">{{trans("{$charFile}.name")}}</h1><br/>
                                <h2 class="actor-real-name">({{trans("{$charFile}.actor_name")}})</h2>
                                <div class="btn_share"><a class="btnZm btn_xs"><span><b><i class="fa fa-share left"></i>{{trans('about-inner.char-inner-share')}}</b></span></a></div>
                            </div>
                            <div class="inner-char-description">
                                <div class="row">
                                    @if (trans("{$charFile}.date_birth") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-date-birth')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.date_birth")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.birth_place") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-birth-place')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.birth_place")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.personality") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-personality')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.personality")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.movie") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-movie')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.movie")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.music") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-music')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.music")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.foods") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-foods')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.foods")}}</div>
                                        <div class="mbl_spacer"></div>
                                    @endif
                                    @if (trans("{$charFile}.sports") != '')
                                        <div class="col-sm-6 col-xs-12 info-left">{{trans('about-inner.char-inner-sports')}}</div>
                                        <div class="col-sm-6 col-xs-12 info-right">{{trans("{$charFile}.sports")}}</div>
                                    @endif
                                </div>
                            </div>

                            @if ($character->quote != '')
                                <div class="inner-char-quote">
                                	<i class="fa fa-quote-left"></i> <h2>{{$character->quote}}</h2> <i class="fa fa-quote-right"></i>
                                </div>
                            @endif

                            <div class="inner-char-know">
                                <div class="fun-fact">
                                	<h2 class="inner-char-title">{{trans('about-inner.fun-fact-title')}}</h2>
                                    <div class="inner-char-question-mark"><img src="{{asset('assets/images/about-inner/question_mark.png')}}" /></div>
                                    <div class="inner-char-vector"><img src='{{asset("assets/images/about-inner/uploads/{$character->url_slug}_vector.png")}}' alt='{{trans("{$charFile}.alt-text")}}' /></div>
                                </div>
                                <div class="reveal-char-info">
                                    <a class="cta">{{trans('about-inner.click-to-reveal')}} <i class="fa fa-chevron-down"></i></a>
                                </div>
                                <div class="char-info-reveal">{{trans("{$charFile}.did_you_know")}}</div>
                            </div>

                            @if ($character->side_story != '')
                                <div class="inner-char-heard">
                                    <h2 class="inner-char-title">{{trans('about-inner.heard-title')}}</h2>
                                    <div class="row inner-char-heard-info">
                                        <div class="col-lg-4 col-sm-3 col-xs-12"><img src='{{asset("assets/images/about-inner/{$character->id}/polaroid.png")}}' alt='{{trans("{$charFile}.alt-text")}}' /></div>
                                        <div class="col-lg-8 col-sm-9 col-xs-12">{{$character->side_story}}</div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
            <div class="row">
            	<div class="btn_trailer">
                	<a href="{{url(App::getLocale().trans('global.url_about_trailers'))}}" class="cta btnZm btn_sm"><span><b>{{trans('about-inner.view-trailers')}}<i class="fa fa-chevron-right"></i></b></span></a>
                </div>
            </div>
        </div>

        <!-- Navigations !-->
        <div class="inner-char-navigation">
        	<div class="arrow-right"><a class="" href="{{$nextCharUrl}}"><i class="fa fa-chevron-right"></i></a></div>
            <div class="show-all"><a class="" href="{{url(App::getLocale().trans("about-inner.url_body"))}}"><img src="{{asset('assets/images/'.$lang.'/btn_all.png')}}" /></a></div>
            <div class="arrow-left"><a class="" href="{{$prevCharUrl}}"><i class="fa fa-chevron-left"></i></a></div>
        </div>
    </section>
</div>
@stop