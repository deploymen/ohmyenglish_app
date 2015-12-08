@extends('layouts.master-teaser')

@section('meta_og_include')

@stop

@section('css_include')

@stop

@section('javascript_include') 
<script type="text/javascript" src="{{ asset('js/jquery-sha1.js') }}"></script>
<script type="text/javascript">
var TEASER_VARS = TEASER_VARS || {};
TEASER_VARS.sk = '{{\Config::get('app.game_secret')}}';

$(document).ready(function() {

  $.ajaxSetup({ cache: true });
  $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
    FB.init({
      appId: TEASER_VARS.fbAppId,
      version: 'v2.3'
    });     
    FB.getLoginStatus(function(response) {
        alert(response.status);
        if (response.status === 'connected') {            
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;
        } else if (response.status === 'not_authorized') {

        } else {

        }
    });
  });
});

function fbConnect(){

}

function submitScore(){    

    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {            
            var uid = response.authResponse.userID,
                accessToken = response.authResponse.accessToken,
                key = (new Date()).toISOString();

            $.ajax({
                method: "POST",
                url: "/api/game/submission?facebook_access_token=" + accessToken,
                data: { 
                    play_time: $('.play_time').val(),
                    key: key,
                    hash: $.sha1($('.play_time').val() + key + TEASER_VARS.sk)
                }

            }).done(function( msg ) {
                alert('callback');
            });

        } else {
            FB.login(function(response) {
                if (response.authResponse) {
                    submitScore();
                }
            }, {scope: 'email', return_scopes: true});
        }



/*        
        if (response.status === 'connected') {            
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;

            $.ajax({
                method: "POST",
                url: "/api/game/submission",
                data: { play_time: $('.play_time').val() }

            }).done(function( msg ) {
                alert( msg );
            });

        } else {

        }

        FB.login(function(response) {
            alert('response1');
            if (response.authResponse) {
             FB.api('/me', function(response) {
                alert('response2');
                $.ajax({
                    method: "POST",
                    url: "/api/game/submission",
                    data: { play_time: $('.play_time').val() }

                }).done(function( msg ) {
                    alert( msg );
                });
             });
            } else {
             console.log('User cancelled login or did not fully authorize.');
            }
        }, {scope: 'email', return_scopes: true});

        */
    });    
}


</script>

@stop

@section('content')
<br />
TEST GAME SUBMIT <br /><br />

<input type="text" class="play_time" value="100" />
<br />
<a href="javascript:submitScore();">Submit Score</a>
<br />
@stop