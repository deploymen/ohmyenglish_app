var OME = OME || {};



var curBannerSize;
var extraCharLoaded = false;
var animBannerTimer;

$(function(){
    bindCharEvt();  
/*    setTimeout(function(){
        $('.char-item').each(function(){
            var href = $(this).find('.char-know-more-content a').attr('href');
            $(this).find('img').wrap("<a href='" + href + "'></a>");
        });
    }, 2000);*/

    setTimeout(function(){
        $('.char-item').each(function(){
            var href = $(this).find('.char-know-more-content a').attr('href');
            $(this).find('img').click(function(){
                location = href;
            });
        });
    }, 2000);
});

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

    $('.show-char-info').click(function(e){
        e.preventDefault();

        showCharInfo($(this).data('index'));
    });

    $('.watch-char').click(function(e){
        e.preventDefault();
        
        showVideo($(this).data('index'));
    });
    
    $('#btn-video-frame-close').click(function(e){
        e.preventDefault();
        
        hideVideo();
    });
    
    $('#btn-char-overlay-close').click(function(e){
        e.preventDefault();
        hideCharInfo();
    });

    $('#btn-feed, #btn-feed-banner, #btn-feed-banner-mini').click(function(e){
        e.preventDefault();
        scrollToElementAnimated('#game', 500);
    });

    postloadImage('.char-img:lt(18)', 300);
}
/* end of evt handling */


/* banner */
function resetBanner(){
    var prevBannerSize = curBannerSize;
    curBannerSize = $('#banner').width();

    //only update when there are size changes
    if(prevBannerSize != curBannerSize){

        $('#banner ul').css('left', 0);
        $('#banner').find('.currentItem:first').val(1);
    }
    
    var curItem = $('#banner .currentItem').val();
    if(curItem == 2)
        $('.mast-head').addClass('slide02');
    else
        $('.mast-head').removeClass('slide02');
}
/* end of banner */


/* char */
function showCharInfo(index){

    if(isMobileDevice()){
        setTimeout(function(){ $('.char-item.expand').removeClass('expand'); }, 100);
    }

    $('#char-overlay .char-img').html('<input type="hidden" class="postload-img" value="' + OME.charInfo[index].img + '" />');
    $('#char-overlay .profile-name').html(OME.charInfo[index].title + ' <span>(' + OME.charInfo[index].actor + ')</span>');
    $('#char-overlay .profile-desc').text(OME.charInfo[index].desc);

    $('#char-overlay').css('marginTop', $(document).scrollTop());
    $('#char-overlay').removeClass('hide');
    $('#char-overlay-bg').removeClass('hide');

    postloadImage('#char-overlay .char-img .postload-img', 150);
}

function hideCharInfo(){
    $('#char-overlay').addClass('hide');
    $('#char-overlay-bg').addClass('hide');
}

function showVideo(index){
    if(isMobileDevice())
        setTimeout(function(){ $('.char-item.expand').removeClass('expand'); }, 100);
            
    $('#video-player').html('');
    $('#video-player').player({
        apiKey: "movideoAstroCeria", 
        flashAppAlias: "flashApp",
        iosAppAlias: "iPhone",
        api: "//api.movideo.com/rest/",
        mediaId: OME.charInfo[index].video,
        autoPlay: false,
        shareLinkGeneratorFunction: 'moVideoShareLink'            
    });
    
    if(!flashIsInstalled() && !isMobileDevice()){
        $('#video-player').html('<div class="no-flash">You need Flash player to play this video.<br /><a target="_blank" href="http://www.adobe.com/go/getflash">Download Flash from Adobe</a></div>');
    }
    
    $('#video-frame').css('marginTop', $(document).scrollTop());
    $('#video-frame').removeClass('hide');
    $('#video-overlay-bg').removeClass('hide');
}

function hideVideo(){
    $('#video-player').html('');
    $('#video-frame').addClass('hide');
    $('#video-overlay-bg').addClass('hide');
}
/* end of char */


/* util */
function flashIsInstalled(){
    if(!FlashDetect.installed){
        return false;
    }else{
        return true;
    }
}
/* end of util */