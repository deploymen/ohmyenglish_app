var OME = OME || {},
	feedObj = {
	    filter: 'all',
	    page: 1,
	    page_size: 14
	};

$(function(){
    bindFeedEvt();
    
    $(window).load(function(){
        getFeeds();
    });
});

/* evt handling */
function bindFeedEvt(){
    $('.filter-option a').click(function(e){
        e.preventDefault();
        
        $('.filter-option a').removeClass('selected');
        $(this).addClass('selected');
        
        feedObj.filter = $(this).data('filter');
        feedObj.page = 1;
        
        $('#feed-list').html('');
        getFeeds();
    });
    $('#btn-feed-load-more').click(function(e){
        e.preventDefault();
        
        feedObj.page = feedObj.page + 1;
        getFeeds();
    });
}
/* end of evt handling */


function getFeeds(changeFilter){

    //do ajax here
    var path = OME.apiSocialFeedUrl;
    var data = { page: feedObj.page, filter: feedObj.filter, page_size: feedObj.page_size };

    $.ajax({
        type: 'GET',
        data: data,
        url: path,
        timeout: 60000,
        dataType: 'json',
        beforeSend:function(){
            showFeedPreloader(true);
        },
        success:function(response, status){	
            setTimeout(function(){
                showFeedPreloader(false);
                if(typeof(response.status) != 'undefined'){
                    if(response.status == 'success'){
                        bindEntries(response.data, changeFilter);
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

function bindEntries(data, changeFilter){
    var feeds = data.feeds.data,
        strContentHtml = '',
        feed, templateNum, templateHtml, mode, countText, countPhoto;

    if(parseInt(feedObj.page) >= parseInt(data.feeds.last_page)){
        $('#btn-feed-load-more').addClass('hide');
    }

    if(feeds.length == 0){ return; }



    mode = 'normal';
    countText = countPhoto = 0;

    for(i=0;i<feeds.length;i++){
        feed = feeds[i];

        countText += (feed.type == 'text')?1:0;
        countPhoto += (feed.type == 'photo')?1:0;
    }
    if(countText == feeds.length){ mode = 'text'; }
    if(countPhoto == feeds.length){ mode = 'photo'; }

    switch(mode){
        case 'text': 
        case 'photo': 
            templateNum = (mode=='text')?4:5;
            templateHtml = $('#template .template'+templateNum).clone();

            //put in the template
            if(!changeFilter){
                $('#feed-list').append('<ul class="feed-temp">'+templateHtml.html()+'</ul><div class="clear"></div>');
            }
            else{
                $('#feed-list').html('<ul class="feed-temp">'+templateHtml.html()+'</ul><div class="clear"></div>');
            } 

            for(i=0;i<feeds.length;i++){
                
                feed = feeds[i];

                var target = $('.feed-temp a:nth('+i+')');

                if((i+1) % 2 == 0){ $(target).addClass('alt'); }
                    
                var strHtml = '';

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
                        //strHtml += '<span class="post-by"></span>';    
                        break;   
                    case 'photo':
                        strHtml += '<input type="hidden" class="feed-image message" value="'+feed.picture+'" alt="" data-platform="'+feed.platform+'" data-post-link="'+feed.post_link+'"  />';
                        break;                 
                }

                $(target).html(strHtml);
                $(target).addClass('feed-item');

            }    

            break;

        case 'normal': 

            templateNum = Math.ceil(Math.random() * 3);
            templateHtml = $('#template .template'+templateNum).clone();

            //put in the template
            if(!changeFilter){
                $('#feed-list').append('<ul class="feed-temp">'+templateHtml.html()+'</ul><div class="clear"></div>');
            }
            else{
                $('#feed-list').html('<ul class="feed-temp">'+templateHtml.html()+'</ul><div class="clear"></div>');
            }

            var fDouble, fRex, fSingle, target;
            fDouble = [];
            fRex = [];
            fSingle = [];
            for(i=0;i<feeds.length;i++){
                feed = feeds[i];
                if(feed.type == 'photo' && fDouble.length < 1){
                    fDouble.push(feed);

                }else if(feed.type == 'text' && fRex.length < 3){
                    fRex.push(feed);

                }else{
                    fSingle.push(feed);
                }                   
            }        
            
            console.log('fDouble: ' + fDouble.length);
            console.log('fRex: ' + fRex.length);
            console.log('fSingle: ' + fSingle.length);

            for(i=0;i<feeds.length;i++){                    

                if(i < 1){
                    feed = fDouble.shift();
                    target = $('.feed-temp li.double a:nth(' + fDouble.length + ')');
                    console.log(target);

                }else if(i < 4){
                    feed = fRex.shift();                        
                    target = $('.feed-temp li.rec a:nth(' + fRex.length + ')');
                }else{
                    feed = fSingle.shift();
                    target = $('.feed-temp li:not(.double, .rec) a:nth(' + fSingle.length + ')');
                }

                if(!feed){                         
                    continue;
                }
                

                if((i+1) % 2 == 0){ $(target).addClass('alt'); }
                    
                var strHtml = '';

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
                        //strHtml += '<span class="post-by"></span>';    
                        break;   
                    case 'photo':
                        strHtml += '<input type="hidden" class="feed-image message" value="'+feed.picture+'" alt="" data-platform="'+feed.platform+'" data-post-link="'+feed.post_link+'"  />';
                        break;                 
                }

                $(target).html(strHtml);
                $(target).addClass('feed-item');

            }           
            break;
        default: return;
    }

    bindClickFeedEvt();  
    


    //clean up
    $('.feed-temp a:not(.feed-item)').parents('li').remove();
    $('.feed-temp').removeClass('feed-temp');
    
    //postload images
    postloadImage('.feed-image', 300);

}

function bindClickFeedEvt(){
    $('#feed-list li>a').click(function(e){
        e.preventDefault();
        var platform, feedId, p;
        platform = $(this).children('.message').data('platform');

        switch(platform){
            case 'facebook':
                feedId = $(this).children('.message').data('feed-id');                       
                p = feedId.split('_');
                window.open('https://www.facebook.com/' + p[0] + '/posts/' + p[1] + '');
                break;

            case 'twitter':
                feedId = $(this).children('.message').data('feed-id');                       
                p = feedId.split('_');                        
                window.open('https://twitter.com/Oh_My_English/status/' + feedId);
                break;       

            case 'instagram':
                p = $(this).children('.message').data('post-link');                    
                window.open(p);
                break;                                                   
        }
    });        
}


function showFeedPreloader(toShow){
    if(toShow){
        $('#feed-preloader').show();
        $('#btn-feed-load-more').addClass('hide');
    }else{
        $('#feed-preloader').hide();
        $('#btn-feed-load-more').removeClass('hide');
    }
}