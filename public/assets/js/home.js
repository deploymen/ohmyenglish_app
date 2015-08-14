var App = App || angular.module('omeApp', []);
var OME = OME || {};
OME.runOnce = false;
var isHover = false;

App.controller('PopQuizController', function ($scope, $http, $timeout){
    $scope.questionQueue = [];
    $scope.totalQuestion = 0;
    $scope.curQuestionNo = 0;
    $scope.totalCorrect = 0;
    $scope.characters = ['anusha', 'zack'];

    $scope.onQuestion = {};
    $scope.onAnswer = {};



    $scope.init = function(){        
        $scope.questionQueue = OME.popQuizs;
        $scope.totalQuestion = OME.popQuizs.length;
        $scope.nextQuestion();
        //$scope.showSummary();
    }

    $scope.nextQuestion = function(){
        console.log($scope.questionQueue);
        var question = $scope.questionQueue.shift();
        $scope.onQuestion = question;
        $scope.onAnswer = {"message": "", "pass": false}; 

        if(!question){ 
            
            OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_popQuizLast_action, OME.trackCopy.home_popQuizLast_label, 'userAction');
            $scope.showSummary();

        }else{
            
            $scope.onQuestion = question;
            $scope.onAnswer = {"message": "", "pass": false}; 
            $scope.curQuestionNo += 1;   
            if($scope.curQuestionNo > 1){
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_popQuizHalf_action.replace('{nth}', $scope.curQuestionNo - 1), OME.trackCopy.home_popQuizHalf_label, 'userAction');
            }            

            $('.popQuiz').removeClass('done');      
            $('.quiz-wrap').removeClass('disabled');
            $('.quiz-wrap .btn').removeClass('correct wrong');
            $('.popQuiz .emote').removeClass($scope.characters.join(' '));            
            $('.popQuiz .emote').addClass($scope.characters[Math.floor(Math.random()*$scope.characters.length)]);
            $('.popQuiz .emote').removeClass('default correct wrong goodjob');
            $('.popQuiz .emote').addClass('default');
            
            $scope.characterRespond = OME.popQuizsCopy.default;
        }

    }

    $scope.choose = function($event, option){
        var answerOpt = $scope.onQuestion.answer, delay = 1000;
        
        if($('.quiz-wrap').hasClass('disabled')){ return; }

        $('.quiz-wrap').addClass('disabled');
        $('.quiz-wrap a').removeClass('correct wrong');
        $('.popQuiz .emote').removeClass('default correct wrong goodjob');

        if(option == answerOpt){
            angular.element($event.currentTarget).addClass('correct');
            $('.popQuiz .emote').addClass('correct');
            $scope.characterRespond = OME.popQuizsCopy.correct;
            $scope.totalCorrect += 1;
            delay = 1000;
        }else{
            angular.element($event.currentTarget).addClass('wrong');
            $('.quiz-wrap a.option' + answerOpt).addClass('correct');
            $('.popQuiz .emote').addClass('wrong');
            $scope.characterRespond = OME.popQuizsCopy.wrong;
            delay = 2000;
        }

        $timeout($scope.nextQuestion, delay);      
        
    }  

    $scope.showSummary = function(){
        var scoreClass = 'low-score';
        $('.popQuiz').addClass('done');        

/*        scoreClass = 'low-score'; 
        $scope.resultText = OME.popQuizsCopy.low_score;
        $scope.resultTextBubble = OME.popQuizsCopy.low_score_bubble;
        if($scope.totalCorrect >= 5){ 
            scoreClass = 'medium-score'; 
            $scope.resultText = OME.popQuizsCopy.medium_score; 
            $scope.resultTextBubble = OME.popQuizsCopy.medium_score_bubble; 

        }

        if($scope.totalCorrect >= 10){ 
            scoreClass = 'high-score'; 
            $scope.resultText = OME.popQuizsCopy.high_score; 
            $scope.resultTextBubble = OME.popQuizsCopy.high_score_bubble; 

        }

        $('.quiz-results-anusha, .quiz-results-zack').removeClass('low-score medium-score high-score');
        $('.quiz-results-anusha, .quiz-results-zack').addClass(scoreClass); 
*/

    }

});

$(document).ready(function() {
    /*MOVIDEO.init({
        appAlias: 'basic',
        apiKey: 'movideoAstroCeria'
    });

    getFeeds();
    startVideo();*/
});

/*play movideo*/
function startVideo(){
    //console.log('startVideo');
    $('#video-player').html('');

//console.log('$(#video-player)');
//console.log($('#video-player').player);

    $('#video-player').player({
        apiKey: "movideoAstroCeria", 
        flashAppAlias: "flashApp",
        iosAppAlias: "iPhone",
        api: "//api.movideo.com/rest/",
        mediaId: OME.videoID,//charInfo[index].video,
        autoPlay: false,
        shareLinkGeneratorFunction: 'moVideoShareLink'            
    });
    //console.log('startVideo');
    if(!flashIsInstalled() && !isMobileDevice()){
        $('#video-player').html('<div class="no-flash">You need Flash player to play this video.<br /><a target="_blank" href="http://www.adobe.com/go/getflash">Download Flash from Adobe</a></div>');
    }

}

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


//social feed
function getFeeds(){

    //do ajax here
    var path = OME.apiSocialFeedUrl;
    var data = { page: 1, filter: 'all', page_size: 4 };

    $.ajax({
        type: 'GET',
        data: data,
        url: path,
        timeout: 30000,
        dataType: 'json',
        beforeSend:function(){
            showFeedPreloader(true);
        },
        success:function(response, status){ 
            setTimeout(function(){
                showFeedPreloader(false);
                if(typeof(response.status) != 'undefined'){
                    if(response.status == 'success'){

                        bindEntries(response.data);
                    }
                    else
                        alert(response.msg);
                }else
                    alert('Oops... Something unexpected has occured. Please try again.');
            }, 500);
        },
        error:function(objAJAXRequest, strError){
            showFeedPreloader(false);
            alert('Oops... Something unexpected has occured. Please try again.');
        }
    });
}

function bindEntries(data){
    var feeds = data.feeds.data, strContentHtml = '', feed, target, strHtml, i;

    if(!feeds.length){ return; }

    //put in the template
    $('#feed-list').html([
        '<ul class="feed-temp">',
            '<li><a href="#"></a></li>',
            '<li><a href="#"></a></li>',
            '<li><a href="#"></a></li>',
            '<li><a href="#"></a></li>',
        '</ul>',
        '<div class="clear"></div>'
    ].join(''));
           
    for(i=0; i<feeds.length; i++){        
        feed = feeds[i];

        target = $('.feed-temp a:nth('+i+')');

        if((i+1) % 2){ $(target).addClass('alt'); }
            
        strHtml = '';
        switch(feed.platform){
            case 'facebook': strHtml = '<span class="post-type facebook"><i class="fa fa-facebook"></i></span>'; break;
            case 'twitter': strHtml = '<span class="post-type twitter"><i class="fa fa-twitter"></i></span>'; break;
            case 'instagram': strHtml = '<span class="post-type instagram"><i class="fa fa-instagram"></i></span>'; break;

        }

        switch(feed.type){
            case 'text':
                strHtml += '<span class="message" data-platform="'+feed.platform+'" data-feed-id="'+feed.feed_id+'">';                         
                if(feed.message.length > 50){
                    strHtml += '<small>'+feed.message+'</small>';
                }else{
                    strHtml += feed.message;
                }
                strHtml += '</span>';                            
                break;   
            case 'photo':
                strHtml += '<input type="hidden" class="feed-image message" value="'+feed.picture+'" alt="" data-platform="'+feed.platform+'" data-post-link="'+feed.post_link+'"  />';
                break;                 
        }

        $(target).html(strHtml);
        $(target).addClass('feed-item');

    }    

    bindClickFeedEvt();  
    
    //clean up
    $('.feed-temp a:not(.feed-item)').parents('li').remove();
    $('.feed-temp').removeClass('feed-temp');
    
    //postload images
    postloadImage('.feed-image', 300);

}
//social feed




$(function(){
    

	/* home slider */
	if($('#banner ul li').length > 1){
		bindHomeSlider('#banner', '#btn-mast-prev', '#btn-mast-next', 350, 7000, null, null, true, true);
	}
    /* take quiz slider */
    if($('.takeQuizSlider ul li').length > 1){
        bindSlider('.takeQuizSlider', '#btn-quiz-prev', '#btn-quiz-next', 350, 0, null, null, false, true);
    }
    /* game slider */
    if($('.gameSlider ul li').length > 1){
        bindSlider('.gameSlider', '#btn-game-prev', '#btn-game-next', 350, 0, null, null, false, true);
    }
    /* coolEnglish slider */
    if($('.coolEnglishSlider ul li').length > 1){
        bindSlider('.coolEnglishSlider', '#btn-coolEnglish-prev', '#btn-coolEnglish-next', 350, 0, null, null, false, true);
    }


    function bindHomeSlider(container, prevTrigger, nextTrigger, speed, interval, animTimer, slotIndicator, rotating, isdisplayCount){
        var totalItems = $(container).find('li').length;
        var containerWidth = $('.withSkinner').length ? $('.withSkinner .content').width() : $(window).width();//$(container).width();
        var displayItem = 1;//Math.round(Number( containerWidth/$(container).find('li').width() ) );
        var containerScrollWidth = Number( totalItems * containerWidth);//Number( totalItems/ ( containerWidth/$(container).find('li').width() ) ) * containerWidth;
        $(container).find('li').width(containerWidth);
        var liWidth = containerWidth;

            console.log('container width = ', containerWidth, $('.withSkinner').length, $('.withSkinner .content').width())

        /*if(rotating){
            var animBannerTimer = setInterval(function(){ $(nextTrigger).click(); }, 7000);
        }*/
        

        alignBanner(container);

        //hide next, prev button if displayed item = total item
        if(displayItem >= totalItems){
            $(nextTrigger).css('opacity', '0.5').addClass('disable');
            $(prevTrigger).css('opacity', '0.5').addClass('disable');
        }
        //setup hidden counters
        var strCounters = '<input type="hidden" class="currentItem" value="1" />\
                            <input type="hidden" class="liWidth" value="'+liWidth +'" />\
                            <input type="hidden" class="displayItem" value="'+displayItem +'" />\
                            <input type="hidden" class="totalItem" value="'+totalItems+'" />';
        
        $(container).append(strCounters);
        
        var i = 0;
        $(container).find('li').each(function(){
            $(this).append('<input type="hidden" class="itemCount" value="'+(++i)+'">');
        });
        
        //setup slot indicator if available
        if(slotIndicator != null && slotIndicator != 'undefined'){
            var strSlotIndicator = '<ul>'
            for(i=0; i< totalItems; i++){
                strSlotIndicator += '<li><span>'+(i+1)+'</span></li>';
            }
            strSlotIndicator += '</ul>';
            
            //bind the indicators
            $(slotIndicator).html(strSlotIndicator);
            
            //adjust the indicator position
            //$(slotIndicator).css('position', 'absolute');
            $(slotIndicator).css('left', '50%');
            $(slotIndicator).css('marginLeft', '-' + parseInt($(slotIndicator).width()/2) + 'px');
            
            //default selection
            $(slotIndicator).find('li:first').addClass('selected');
        }
        
        //bind the width for the scroller first
        //$(container).find('ul:first').width(containerScrollWidth);
        //$(container).find('ul:first').css('position', 'absolute');
        //$(container).find('ul:first').css('top', 0);
        $(container).find('ul:first').css('transform', 'translate3d(0px, 0px, 0px)');
        $(container).find('ul:first').width(containerScrollWidth);
        
        //bind button scrollers
        $(prevTrigger).click(function(e){
            e.preventDefault();
            if(animTimer){
                clearInterval(animTimer);
                animTimer = setInterval(function(){
                    scrollHomeSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, true);
                }, interval);
            }
            if(!$(this).hasClass('disable'))scrollHomeSlider(container, prevTrigger, nextTrigger, false, speed, slotIndicator, rotating);
        });
        $(nextTrigger).click(function(e){
            e.preventDefault();
            if(animTimer){
                clearInterval(animTimer);
                animTimer = setInterval(function(){
                    scrollHomeSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, true);
                }, interval);
            }
            if(!$(this).hasClass('disable'))scrollHomeSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, rotating);
        });

        $('.disable').click(function(e){
            e.preventDefault();
        });            
            
        
        if(interval != '' && interval != 0 && animTimer != 'undefined'){
            animTimer = setInterval(function(){
                scrollHomeSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, true);
            }, interval);
        }
        
        if(!rotating)
            //$(prevTrigger).hide();
            $(prevTrigger).css('opacity', '0.5').addClass('disable');

        var newDisplayCount,
            newWidth;
        $(window).resize(function(el) {
            newWidth = $(container).width();
            newDisplayCount = Math.round(Number( newWidth/$(container).find('li').width() ) );
            containerScrollWidth = Number( totalItems/ ( newWidth/$(container).find('li').width() ) ) * newWidth;
            $(container).find('ul:first').width(containerScrollWidth);
            //console.log(newDisplayCount, newWidth);
            $(container).find('.displayItem:first').attr('value', newDisplayCount);

            alignBanner(container);
        });
    }

    function alignBanner(container){

        if($(window).width() <= 1280 && $(window).width() >= 768 || ($('.withSkinner').length && $(window).width() >= 768)){
            $('.mast-head ul li a').each(function(){
                var src = $(this).data('src')
                $(this).html(' <img src="'+src.replace(/.{7}$/g, '_sm.jpg')+'"/> ');
            });
        }  else if($(window).width() < 768 || ($('.withSkinner').length && $(window).width() && $(window).width() < 768 ) ){
            $('.mast-head ul li a').each(function(){
                var src = $(this).data('src')
                $(this).html(' <img src="'+src.replace(/.{7}$/g, '_xs.jpg')+'"/> ');
            });
        } else {
            $('.mast-head ul li a').each(function(){
                var src = $(this).data('src');
                $(this).html(' <img src="'+src+'"/> ');
            });
        }

        var liWidth = $('.withSkinner').length ? $('.withSkinner .content').width() : $(window).width();
        $(container).find('ul:first').width( Math.round($(container).find('li').length * $(window).width() ) );
        $(container).find('li').width(liWidth);
        $(container).find('.liWidth:first').val(liWidth);
        //$(container).find('.currentItem:first').val()
         var slideWidth = -(Number($(container).find('.currentItem:first').val()) - 1) * liWidth
        $('#banner ul').css('transform', 'translate3d('+slideWidth+'px,0px,0px)') ;

        var imgWidth,
            imgLeft;

        if($(window).width()  <= 1280 && $(window).width()  >= 768 ){
            imgWidth = 1280;
        }else if($('.withSkinner').length && $(window).width()  >= 768 ){
            imgWidth = $(window).width();
        }else if( $(window).width() < 768 || ($('.withSkinner').length && $(window).width() < 768)){
            imgWidth = 768;

        } else {
            imgWidth = 1920;
        }
        console.log(imgWidth);
        imgLeft = -(imgWidth - $(window).width()) /2;
        //console.log(imgLeft)
        $('.slide').css('left', imgLeft)
    }
    
    function scrollHomeSlider(container, prevTrigger, nextTrigger, isForward, speed, slotIndicator, rotating){
        
        var containerWidth = $(container).width();
        
        var displayNo = Number(containerWidth/$(container).find('li').width()) -1;

        var containerSlider = $(container).find('ul:first');
        var currentItem = $(container).find('.currentItem:first').val();
        var displayItem = $(container).find('.displayItem:first').val();
        var totalItem = $(container).find('.totalItem:first').val();
        var prevItem = currentItem;
        var liWidth = $(container).find('.liWidth:first').val();
        var translation = getTransform( $('#banner ul') );
        
        var slideWidth;// = translation - liWidth;
        //console.log(translation, slideWidth)
        //stop if still in animate progress
        if($(containerSlider).hasClass('animating')){
            return;
        }
        
        //check has the rotating option enabled
        if(rotating == null || rotating == 'undefined'){
            rotating = false; 
        }

        //disable auto rotate on mouse over
        $('.banner li').mouseover(function(){
            isHover = true;
        });
        $('.banner li').mouseout(function(){
            isHover = false;
        });

        //determine the direction to go
        if(!isHover){
            if(isForward){
                if(currentItem == totalItem){
                    currentItem = 1;
                } else {
                    currentItem++;
                }
                if(currentItem > prevItem){
                    slideWidth = (-(currentItem -2) * Number(liWidth) ) - Number(liWidth);
                    $(containerSlider).css('transform', 'translate3d('+slideWidth+'px,0px,0px)');
                }
            }else{
                if(currentItem == 1){
                    currentItem = totalItem;
                } else {
                    currentItem--;
                }
                if(currentItem < prevItem){
                    slideWidth = (-(currentItem) * Number(liWidth) ) + Number(liWidth);
                    $(containerSlider).css('transform', 'translate3d('+slideWidth+'px,0px,0px)') ;
                }
            }
        }
        

        //handling rotations
        var rotateForward = false;
        var rotateBackward = false;
        var prevSlide = $(containerSlider).find('.itemCount[value="'+prevItem+'"]').parents('li');
        var currentSlide = $(containerSlider).find('.itemCount[value="'+currentItem+'"]').parents('li');

        //$(container).find('ul:first').css('transform', 'translate3d(0px, 0px, 0px)');
        if(!isHover){
            if(rotating){
                if(isForward && currentItem < prevItem){
                    $(containerSlider).css('transform', 'translate3d(0px,0px,0px)');
                    rotateForward = true;
                }else if(!isForward && currentItem > prevItem){
                    //$(currentSlide).prependTo($(containerSlider));
                    $(containerSlider).css('transform', 'translate3d(-'+ Number((totalItem-1) * liWidth) +'px,0px,0px)');
                    rotateBackward = true;
                }
            }
        }
        
        
        //update the current selected item
        $(container).find('.currentItem:first').val(currentItem);
        
        var targetPanelLoc = liWidth;//$(containerSlider).find('.itemCount[value="'+currentItem+'"]:first').parents('li').position().left;
        var totalJumps = 1;
        var itemLeftLoc = 0 - targetPanelLoc;
        
        

        //console.log(translation[0]);
        if(!rotating)
            totalJumps = Math.abs(currentItem - prevItem);

        //$(containerSlider).addClass('animating');
        
        /*if(currentItem + (displayItem - 1) == totalItem){
            //console.log(currentItem, displayItem - 1, totalItem)
            //$(containerSlider).css('transform', 'translate3d(-1280px,0px,0px)') ;
            $(nextTrigger).css('opacity', '0.5').addClass('disable');
        }else {

            //$(containerSlider).css('transform', 'translate3d(1280px,0px,0px)') ;
            $(nextTrigger).css('opacity', '1').removeClass('disable');
        }
        if(currentItem == 1)
                    $(prevTrigger).css('opacity', '0.5').addClass('disable');
                else
                    $(prevTrigger).css('opacity', '1').removeClass('disable');*/
        
    }
    $(window).scroll(function(){
        var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html' || (navigator.userAgent.toLowerCase().indexOf('windows phone') != -1) ?   'html' : 'body' );
            windowHeight = $(window).height();
            viewportTop = $(scrollElem).scrollTop(),
            viewportBottom = (viewportTop + windowHeight);

        var elemTop = Math.round($('.sneakPeak').offset().top) + 200,
            elemBottom = elemTop + ($('.sneakPeak').height());

        var element = $('.aniSlide');
        
        if($('.removeAniEnd').hasClass('noAni')){
            return;
        }
        if ((elemTop < viewportBottom) && (elemBottom > viewportTop)) {
            aniEnd(element);
        }
        

    });

    function aniEnd(element){

        $('.aniSlideWrap').addClass('aniSlide');
        $('.cikgu').addClass('aniLady');
        
        var e = document.getElementsByClassName('removeAniEnd')[0];
        var transitionEvent = whichTransitionEvent();
        
        $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend", function() {
            removeCssAnimation($('.removeAniEnd'));
        });


    }

    function removeCssAnimation(el){
        var removeAniTimer; 
        clearInterval(removeAniTimer);
        removeAniTimer = setTimeout( function(){
            el.addClass('noAni');
        }, 100);
        //clearInterval(removeAniTimer);

        /*MOVIDEO.init({
        appAlias: 'basic',
        apiKey: 'movideoAstroCeria'
        });*/
        //$('.sneakPeak .titleNormal').html('End: ' + Math.random());
        if(!OME.runOnce){
            OME.runOnce = true;
            getFeeds();
            startVideo();

        }
        
        
    }
    


});

function getTransform(el) {

    var src = $(el).css('transform'),
        p = (src)?src.split(','):[];


    return (p.length > 4)?p[4]:0;

}


/* From Modernizr */
function whichTransitionEvent(){
    var t;
    var el = document.createElement('fakeelement');
    var transitions = {
      'transition':'transitionend',
      'OTransition':'oTransitionEnd',
      'MozTransition':'transitionend',
      'WebkitTransition':'webkitTransitionEnd'
    }

    for(t in transitions){
        if(typeof el.style[t] !== 'undefined'){
            return transitions[t];
        }
    }
    //$('.sneakPeak .titleNormal').html('No Transition'+ Math.random())
}

/* Listen for a transition! */
/*var transitionEvent = whichTransitionEvent();
transitionEvent && e.addEventListener(transitionEvent, function() {
    console.log('Transition complete!  This is the callback, no library needed!');
});*/

/*
    The "whichTransitionEvent" can be swapped for "animation" instead of "transition" texts, as can the usage :)
*/

/* util */
function flashIsInstalled(){
    if(!FlashDetect.installed){
        return false;
    }else{
        return true;
    }
}
/* end of util */

/* event handler */
$( document ).ready(function() {
    $('.sneakPeak a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_sneakPeak_action, OME.trackCopy.home_sneakPeak_label, 'userAction');
    });

    $('.exercise a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_classroomExercise_action, OME.trackCopy.home_classroomExercise_label, 'userAction');
    });  

    $('.popQuiz .addOn-result a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_popQuizStart_action.replace('{nth}', '0'), OME.trackCopy.home_popQuizStart_label, 'userAction');
    });  

    $('.meetHenry a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_featuredCharacter_action, OME.trackCopy.home_featuredCharacter_label, 'userAction');
    });  

/*    $('.xxx a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_personalityQuiz_action, OME.trackCopy.home_personalityQuiz_label, 'userAction');
    });  */  

    $('.feedHenry a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_featuredGame_action, OME.trackCopy.home_featuredGame_label, 'userAction');
    });   

/*    $('.xxx a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_article_action, OME.trackCopy.home_article_label, 'userAction');
    }); */ 

    $('.askCikgu a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.home_askCikgu_action, OME.trackCopy.home_askCikgu_label, 'userAction');
    });   

    //sto banner
    /*if(!isMobileDevice()){
        $('.sto').fadeToggle('slow');
        $('.sto').on('click', function(){
            $(this).fadeToggle();
        }); 
    }*/
                                
});