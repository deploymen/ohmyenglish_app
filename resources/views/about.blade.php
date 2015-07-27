@extends('layouts.master', ['pageTitle' => trans("about.page"),'page' => 'about', 'subPage' => 'characters'])

@section('meta_include')  
    <meta name="description" content="{{trans('about.meta_description')}}">
    <meta name="keywords" content="{{trans('about.meta_keyword')}}">    

    <meta property="og:type" content="website"/>
    <meta property="og:keyword" content="{{trans('about.meta_keyword')}}">
    <meta property="og:site_name" content="Oh My English"/>

    <meta property="og:title" content="{{trans('about.meta_title')}}"/>
    <meta property="og:url" content="{{$url}}"/>
    <meta property="og:image" content="{{asset('assets/images/share/share-rectangle.png')}}"/>
    <meta property="og:description" content="{{trans('about.meta_description')}}"/> 

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Oh_My_english">
    <meta name="twitter:url" content="{{$url}}" /> 
    <meta name="twitter:title" content="{{trans('about.meta_title')}}">
    <meta name="twitter:description" content="{{trans('about.meta_description')}}">
    <meta name="twitter:keyword" content="{{trans('about.meta_keyword')}}">
    <meta name="twitter:creator" content="@Oh_My_english">
    <meta name="twitter:image" content="{{asset('assets/images/share/share-rectangle.png')}}">  
      
@stop

@section('css_include')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" /> 
@stop

@section('javascript_include') 
<?php 
    $charPath = asset('assets/images/about/characters');
?>
<script type="text/javascript" src="{{ asset('assets/js/about-character.js') }}"></script>
<script type="text/javascript">
var OME = OME || {};

</script>
@stop

@section('content')
<div class="aboutContent">
    <section id="meet-char" class="meet-char">
        <div class="content">
        	<h1 class="title alt"><i>{{trans('about.meet_char_content_title')}}</i></h1>
            <p class="info">
                {{trans('about.meet_char_content_info')}}
            </p>
            <div class="char-list">
                <ul>                            
                    <li class="main">
                        <div class="char-item">
                           <input type="hidden" class="char-img" value="{{ $charPath }}/{{trans('about.char_img_anim_01')}}" alt="{{ trans('about.char_name_01') }}"/>
                            <div class="char-know-more">
                                <div class="char-know-more-content">
                                    <a href="{{str_replace('{character}', strtolower(str_replace(' ', '-', trans('about.char_name_01'))), LaravelLocalization::getLocalizedURL($lang, trans('routes.about_characters_each')))}}" class="char-name" data-index="0">{{ trans('about.char_name_01') }}<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>




                    <?php $slot = 1; ?>
                    @for ($i = 2; $i <= 18; $i++)
                        <?php $index = sprintf("%02d", $i); ?>
                        <li>
                            <div class="char-item">
                                <input type="hidden" class="char-img" value="{{ $charPath.'/'.trans('about.char_img_anim_'.$index) }}" alt="{{ trans('about.char_name_'.$index) }}" />
                                <div class="char-know-more">
                                    <div class="char-know-more-content">
                                        <a href="{{str_replace('{character}', strtolower(str_replace(' ', '-', trans('about.char_name_'.$index))), LaravelLocalization::getLocalizedURL($lang, trans('routes.about_characters_each')))}}" class="char-name" data-index="0">{{ trans('about.char_name_'.$index) }}<i class="fa fa-chevron-right"></i></a>                                   
                                    </div>
                                </div>
                            </div>
                        </li>          
                        @if($i == 3 || $i == 5 || $i == 7)
                            <li class="empty slot{{$slot++}}"></li>
                        @endif                    

                    @endfor

                    <li class="and-more">
                        {{trans('about.meet_char_content_and_more')}}
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </section>

</div>
@stop