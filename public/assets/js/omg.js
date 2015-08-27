var OME = OME || {};



var curBannerSize;
var extraCharLoaded = false;
var animBannerTimer;

$(function(){
    bindCharEvt(); 
    startVideo();

    $('.close').click(function(e){
        $('.overlay').fadeToggle('fast');
    });

    $('.char-item').click(function(e){
        var thisNo = $(this).find('.char-name').data('index'),
            charImg = "<img src='"+ OME.charInfo[thisNo-1].imgUrl +"' alt='"+ OME.charInfo[thisNo-1].charName +"'/>"
            charTitle = OME.charInfo[thisNo-1].charName + " (" + OME.charInfo[thisNo-1].actorName + ")";
        $('.overlay .char-thumb').html(charImg);
        $('.overlay h3').html(charTitle);
        $('.overlay p.info').html(OME.charInfo[thisNo-1].charDesc);
        $('.overlay').fadeToggle('fast');
    });
});

/*play movideo*/
function startVideo(){
    //console.log('startVideo');
    $('#video-player').html('');
    var videoNo = 0,
        videoWidth = $('.trailer .content').width(),
        videoLength = $('.trailer .content ul li').length,
        videoCount =  videoWidth * videoLength;
    $('.trailer .content ul').width(videoCount);
    $('.trailer .content ul li').width(videoWidth);

    if($('.trailerSlider ul li').length > 1){
        bindSlider('.trailerSlider', '#btn-video-prev', '#btn-video-next', 350, 0, null, null, false, false);
    }

    // if(videoLength > 1){
    //     $('.trailer > .content').append( "<a id='btn-video-prev' class='nav left'><i class='fa fa-chevron-left'></i><span>Previous</span></a><a id='btn-video-next' class='nav right'><i class='fa fa-chevron-right'></i><span>Next</span></a>" )
    // }

    $('.video-player').each(function(){
        $(this).player({
            apiKey: "movideoAstroCeria", 
            flashAppAlias: "flashApp",
            iosAppAlias: "iPhone",
            api: "//api.movideo.com/rest/",
            mediaId: OME.videoID[videoNo],//charInfo[index].video,
            autoPlay: false,
            shareLinkGeneratorFunction: 'moVideoShareLink'            
        });
        videoNo++;
    });

    $('#btn-video-prev, #btn-video-next').click(function(){
        if(!$(this).hasClass('disable')){
            $(".video-player").player("stop");
        }
    });
    //console.log('startVideo');
    if(!flashIsInstalled() && !isMobileDevice()){
        $('#video-player').html('<div class="no-flash">You need Flash player to play this video.<br /><a target="_blank" href="http://www.adobe.com/go/getflash">Download Flash from Adobe</a></div>');
    }

    $(window).resize(function(el) {
        videoWidth = $('.trailer .content').width(),
        videoLength = $('.trailer .content ul li').length,
        videoCount =  videoWidth * videoLength;
        
        $('.trailer .content ul').width(videoCount);
        $('.trailer .content ul li').width(videoWidth);
        
    });

}

/* evt handling */
function bindCharEvt(){

    //not mobile? add the option for hover animation
    if(!isMobileDevice()){
        $('.char-item').addClass('desktop');
    }
    
    $('.char-item').click(function(e){
        //since mobile dont have hover effect
        if(isMobileDevice()){
            $('.char-item').removeClass('expand');
            $(this).addClass('expand');
        }
    });


    postloadImage('.char-img:lt(18)', 300);
}
/* end of evt handling */




/* util */
function flashIsInstalled(){
    if(!FlashDetect.installed){
        return false;
    }else{
        return true;
    }
}
/* end of util */