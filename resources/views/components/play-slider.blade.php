@section('play_list') 
<div class="playList" style="display:block">
    <div class="container">
        <h2 class="title">{{trans('play.list_title')}}</h2>
        <div id="listItem" class="listItem">
            <div id="playSlider">
                <ul>
                    <li><a href="{{url(App::getLocale().trans('global.url_dash_coin'))}}" class="btnZm btnImg {{$dashCoin or ''}}"><img src="{{ url('assets/images/play/play_dash_for_cash.png') }}" alt="{{trans('play.dash_coin_title')}}"/><h2><b>{{trans('play.dash_coin_title')}}</b></h2></a></li>
                    <li><a href="{{url(App::getLocale().trans('global.url_feed_henry'))}}" class="btnZm btnImg {{$feedHenry or ''}}"><img src="{{ url('assets/images/play/playFeedHenry.png') }}" alt="{{trans('play.feed_henry_title')}}"/><h2><b>{{trans('play.feed_henry_title')}}</b></h2></a></li>
                    <li><a href="{{url(App::getLocale().trans('global.url_spy_leader'))}}" class="btnZm btnImg {{$spyLeader or ''}}"><img src="{{ url('assets/images/play/playSpyLeader.png') }}" alt="{{trans('play.spy_leader_title')}}"/><h2><b>{{trans('play.spy_leader_title')}}</b></h2></a></li>
                    <li><a href="{{url(App::getLocale().trans('global.url_football_fever'))}}" class="btnZm btnImg {{$footballFever or ''}}"><img src="{{ url('assets/images/play/playFootballFever.png') }}" alt="{{trans('play.football_fever_title')}}" /><h2><b>{{trans('play.football_fever_title')}}</b></h2></a></li>
                    <li><a href="{{url(App::getLocale().trans('global.url_super_typer'))}}" class="btnZm btnImg {{$superTyper or ''}}"><img src="{{ url('assets/images/play/playSuperTyper.png') }}" alt="{{trans('play.super_typer_title')}}" /><h2><b>{{trans('play.super_typer_title')}}</b></h2></a></li>
                    <li><a href="{{url(App::getLocale().trans('global.url_protect_princess'))}}" class="btnZm btnImg {{$protectPrincess or ''}}"><img src="{{ url('assets/images/play/playProtectPrincess.png') }}" alt="{{trans('play.protect_princess_title')}}" /><h2><b>{{trans('play.protect_princess_title')}}</b></h2></a></li>
                </ul>
            </div>
                
        </div>
        <a id="btn-plist-prev" class="nav left"><i class="fa fa-chevron-left"></i><span>Previous</span></a>
        <a id="btn-plist-next" class="nav right"><i class="fa fa-chevron-right"></i><span>Next</span></a>
    </div>
</div>
@show