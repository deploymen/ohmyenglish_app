@extends('layouts.master', ['pageTitle' => trans("social.page"),'page' => 'social'])

@section('meta_include')

    <meta name="description" content="{{trans('social.meta_description')}}">
    <meta name="keywords" content="{{trans('social.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="x">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('social.title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('social.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}">
    <meta name="twitter:title" content="{{trans('social.title')}}">
    <meta name="twitter:description" content="{{trans('social.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('social.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">   
@stop

@section('css_include')
<link rel="stylesheet" href="{{ asset('assets/css/social-buzz.css') }}" /> 
@stop

@section('javascript_include') 
<script type="text/javascript" src="{{ asset('assets/js/flash_detect_min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/social.js') }}"></script>
<script type="text/javascript">
var OME = OME || {};
OME.apiSocialFeedUrl = '{{ url('/api/socialbuzz') }}';
</script>
@stop

@section('content')
<div class="socialContent bgBlueGrey">
    <section class="social-buzz">
        <div class="content">
            <h1 class="title alt"><i>{{trans('social.content_title')}}</i></h1>
            <p class="info">
                {{trans('social.content_info')}}
            </p>
            <div class="filter-option">
                <ul>
                    <li class="first"><a class="btnZm btnSocial all selected" data-filter="all" href="#"><span><b><i class="fa"></i>{{trans('social.content_option')}}</b></span></a></li>
                    <li><a class="btnZm btnSocial facebook" data-filter="facebook" href="#"><span><b><i class="fa fa-facebook"></i>Facebook</b></span></a></li>
                    <li><a class="btnZm btnSocial twitter" data-filter="twitter" href="#"><span><b><i class="fa fa-twitter"></i>Twitter</b></span></a></li>
                    <li class="last"><a class="btnZm btnSocial instagram" data-filter="instagram" href="#"><span><b><i class="fa fa-instagram"></i>Instagram</b></span></a></li>
                </ul>
            </div>
            <div id="feed-list" class="feed-list"></div>
            <div class="clear"></div>
            <div id="feed-preloader" class="feed-preloader">
                <img src="{{ url('assets/images/preloader.gif') }}" alt="Loading" />
            </div>
            <div class="btnWrap"><a href="#" id="btn-feed-load-more" class="btnZm btn_sm"><span><b>{{trans('social.load_more')}}<i class="fa fa-chevron-right"></i></b></span></a></div>
        </div>
    </section>
    <div id="template" class="hide">
        <ul class="template1">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="double"><a href="#"></a></li>
            <li class="pos column1 row5"><a href="#"></a></li>
            <li class="pos column2 row5"><a href="#"></a></li>
        </ul>
        <ul class="template2">
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="double"><a href="#"></a></li>
            <li class="pos column1 row4"><a href="#"></a></li>
            <li class="pos column2 row4"><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
        </ul>
        <ul class="template3">
            <li class="double"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
        </ul>
        <ul class="template4">
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
            <li class="rec"><a href="#"></a></li>
        </ul>
        <ul class="template5">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="double"><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li class="double"><a href="#"></a></li>
            <li class="pos column1 row5"><a href="#"></a></li>
            <li class="pos column2 row5"><a href="#"></a></li>
        </ul>
    </div>
</div>
@stop