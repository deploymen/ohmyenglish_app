function bindMenuEvt(){
    //set page selected
    var pageTitle = $('#menu-title span').text();
    $('#nav .menu li a[data-title="'+pageTitle+'"]').addClass('selected');
    
    //set lang selected
    if($('#nav').hasClass('ms'))
        $('.lang-sel li a.ms').addClass('selected');
    else
        $('.lang-sel li a.en').addClass('selected');
    
    $('#btn-menu-drop-down').click(function(e){
        e.preventDefault();
        toggleMenu();
    });

    
	
	
}



function toggleMenu(){
    $('#nav').toggleClass('expand');
}

//--validations--
//Is it a mobile device, e.g. tablet, smartphones
function isMobileDevice(){
	if( navigator.userAgent.match(/Android/i)
	 || navigator.userAgent.match(/webOS/i)
	 || navigator.userAgent.match(/iPhone/i)
	 || navigator.userAgent.match(/iPad/i)
	 || navigator.userAgent.match(/iPod/i)
	 || navigator.userAgent.match(/BlackBerry/i)
	 ){
		return true;
	}else{
		return false;
	}
}
//--end of validations--


//--strings--
//Get hash value, the string after # in url
function getHashValue(){
	return window.location.hash.replace('#', '');
}
//--end of strings--


//--events--
//Bind trigger onclick, back to the top of the page
function bindBackToTopTrigger(element){
	$(element).click(function(e){
		e.preventDefault(); //prevent redirect
		
		var currentLocation = $('html').scrollTop();
		//some browser cannot support, read the body element then
		if(currentLocation == 0)
			currentLocation = $('body').scrollTop();
			
		var delay = parseInt(currentLocation / 1.5);
		$('html,body').animate({'scrollTop': 0}, delay);
	});
}

//Setup animated slider
function bindSlider(container, prevTrigger, nextTrigger, speed, interval, animTimer, slotIndicator, rotating, isdisplayCount, isScaleElement){
	var totalItems = $(container).find('li').length;
	var containerWidth = $(container).width();
	var displayItem = Math.round(Number( containerWidth/$(container).find('li').width() ) );
	var containerScrollWidth = Number( totalItems/ ( containerWidth/$(container).find('li').width() ) ) * containerWidth,
		transformMatrix,
		scaleX = 1;
	

	//custom for css scale element
	if(isScaleElement){
		transformMatrix =  $(isScaleElement).css("-webkit-transform") ||
						   $(isScaleElement).css("-moz-transform")    ||
						   $(isScaleElement).css("-ms-transform")     ||
						   $(isScaleElement).css("-o-transform")      ||
						   $(isScaleElement).css("transform"); 
		if(transformMatrix !== 'none'){
			scaleX = transformMatrix.replace(/[^0-9\-.,]/g, '').split(',')[0];
		}
	}
	
	
	var itemName = $(container).children('ul').children('li'),
		currItemNo = 1;
	for(var i=1; i <= itemName.length; i++){
		if(itemName.eq(i-1).children('a').hasClass('active')){
			currItemNo = i;
			//console.log(currItemNo, itemName.eq(i-1).children('a'))
		}
	}
	
	//hide next, prev button if displayed item = total item
	if(displayItem >= totalItems){
		//$(nextTrigger).hide();
		//$(prevTrigger).hide();
		$(nextTrigger).css('opacity', '0.5').addClass('disable');
		$(prevTrigger).css('opacity', '0.5').addClass('disable');
	} else if(currItemNo > (totalItems - displayItem)){
		$(nextTrigger).css('opacity', '0.5').addClass('disable');
		$(prevTrigger).show();
		currItemNo = (totalItems - displayItem)+1;
	} else {
		$(nextTrigger).show();
		$(prevTrigger).show();
	}

	//setup hidden counters
	var strCounters = '<input type="hidden" class="currentItem" value="'+currItemNo+'" />\
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
		$(slotIndicator).css('position', 'absolute');
		$(slotIndicator).css('left', '50%');
		$(slotIndicator).css('marginLeft', '-' + parseInt($(slotIndicator).width()/2) + 'px');
		
		//default selection
		$(slotIndicator).find('li:first').addClass('selected');
	}
	//console.log(currItemNo, $(container).find('li').width())
	//bind the width for the scroller first
	//$(container).find('ul:first').width(containerScrollWidth);
	$(container).find('ul:first').css('position', 'absolute');
	$(container).find('ul:first').css('top', 0);
	$(container).find('ul:first').css('left', 0);
	$(container).find('ul:first').width(containerScrollWidth);
	//animate slide to current active state
	
	var countLast = currItemNo < displayItem ? 1 : 1;//totalItems - displayItem;
	if(totalItems  > displayItem){
		$(container).find('ul:first').animate({
			'left':-Number(currItemNo-1) * $(container).find('li').width()
		},500)
	}
	
		
	//bind button scrollers
	$(prevTrigger).click(function(e){
		e.preventDefault();
		if(animTimer)
			clearInterval(animTimer);
		if(!$(this).hasClass('disable'))scrollSlider(container, prevTrigger, nextTrigger, false, speed, slotIndicator, rotating, isdisplayCount, scaleX);
	});
	$(nextTrigger).click(function(e){
		e.preventDefault();
		if(animTimer)
			clearInterval(animTimer);
		if(!$(this).hasClass('disable'))scrollSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, rotating, isdisplayCount, scaleX);
	});

	$('.disable').click(function(e){
		e.preventDefault();
	});
	
	if(interval != '' && interval != 0 && animTimer != 'undefined'){
		animTimer = setInterval(function(){
			scrollSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, true, isdisplayCount, scaleX);
		}, interval);
	}
	
	if(!rotating && currItemNo == 1){
		$(prevTrigger).css('opacity', '0.5').addClass('disable');
	}
		

	var newDisplayCount,
		newWidth;
	$(window).resize(function(el) {
		newWidth = $(container).width();
		newDisplayCount = Math.round(Number( newWidth/$(container).find('li').width() ) );
		containerScrollWidth = Number( totalItems/ ( newWidth/$(container).find('li').width() ) ) * newWidth;
		$(container).find('ul:first').width(containerScrollWidth);
		//console.log(newDisplayCount, newWidth);
		$(container).find('.displayItem:first').attr('value', newDisplayCount);
	});
}

function scrollSlider(container, prevTrigger, nextTrigger, isForward, speed, slotIndicator, rotating, isdisplayCount, scaleX){
	var containerWidth = $(container).width();
	
	var displayNo = Number(containerWidth/$(container).find('li').width()) -1;

	var containerSlider = $(container).find('ul:first');
	var currentItem = $(container).find('.currentItem:first').val();
	var displayItem = $(container).find('.displayItem:first').val();
	var totalItem = $(container).find('.totalItem:first').val();
	var prevItem = currentItem;

	//stop if still in animate progress
	if($(containerSlider).hasClass('animating'))
		return;
	
	//check has the rotating option enabled
	if(rotating == null || rotating == 'undefined')
		rotating = false;
		
		
	//determine the direction to go
	if(isForward){
		if(currentItem == totalItem){
			currentItem = 1;
		}else
			currentItem++;
	}else{
		if(currentItem == 1)
			currentItem = totalItem;
		else
			currentItem--;
	}

	//handling rotations
	var rotateForward = false;
	var rotateBackward = false;
	var prevSlide = $(containerSlider).find('.itemCount[value="'+prevItem+'"]').parents('li');
	var currentSlide = $(containerSlider).find('.itemCount[value="'+currentItem+'"]').parents('li');

	if(rotating){
		if(isForward && currentItem < prevItem){ 
			$(prevSlide).prependTo($(containerSlider));
			$(containerSlider).css('left', '+'+$(prevSlide).position().left + 'px');
			rotateForward = true;
		}else if(!isForward && currentItem > prevItem){
			$(currentSlide).prependTo($(containerSlider));
			$(containerSlider).css('left', '-'+$(prevSlide).position().left+'px');
			rotateBackward = true;
		}
	}
	
	//update the current selected item
	$(container).find('.currentItem:first').val(currentItem);
	
	var targetPanelLoc = Math.round($(containerSlider).find('.itemCount[value="'+currentItem+'"]:first').parents('li').position().left / scaleX);
	var totalJumps = 1;
	var itemLeftLoc = 0 - targetPanelLoc;
	
	if(!rotating)
		totalJumps = Math.abs(currentItem - prevItem);

	$(containerSlider).addClass('animating');
	
	$(containerSlider).stop(true, true).animate({
		'left': itemLeftLoc+'px'
	}, speed * totalJumps, function(){
		$(this).removeClass('animating');
		
		if(rotating){
			if(rotateForward){
				$(prevSlide).appendTo($(containerSlider));
				$(containerSlider).css('left', '+'+$(currentSlide).position().left + 'px');
			}else if(rotateBackward){
				$(currentSlide).appendTo($(containerSlider));
				$(containerSlider).css('left', '-'+$(currentSlide).position().left + 'px');
			}
		}else{
			if(currentItem + (displayItem - 1) == totalItem)
				$(nextTrigger).css('opacity', '0.5').addClass('disable');//.hide();
			else
				$(nextTrigger).css('opacity', '1').removeClass('disable');//.show();
			
			if(currentItem == 1)
				$(prevTrigger).css('opacity', '0.5').addClass('disable');//.hide();
			else
				$(prevTrigger).css('opacity', '1').removeClass('disable');//.show();
		}
		
		//update the slot indicator if present
		if(slotIndicator != null && slotIndicator != 'undefined')
			updateItemSlotIndicator(slotIndicator, currentItem);
	});
}

function updateItemSlotIndicator(slotIndicator, currentItem){
	$(slotIndicator).find('ul:first li').removeClass('selected');
	$(slotIndicator).find('ul:first li:nth('+(currentItem-1)+')').addClass('selected');
}
//--end of events--


//--helper--
//preload images
function preloadImage(images){
	try{
		if(images instanceof Array){
			for(var i=0; i<images.length; i++){
				var image = images[i];
				var imgObj = new Image();
			
				$(imgObj).load(function(){ }).error(function(){ }).prop('src', image);
			}
		}else{
			var imgObj = new Image();
			$(imgObj).load(function(){ }).error(function(){ }).prop('src', images);
		}
	}catch(err){

	}	
}

//postload image
function postloadImage(element, delay){
	if(delay == null || delay == 'undefined')
		delay = 300;
	
    var max = $(element).length;
    
    if(max > 0)
        loadImage(element, 0, max, delay);
}


function loadImage(elementName, index, max, delay){
    var item = $(elementName+':nth('+index+')');
    var src = $(item).val();
    var elem = $(item).parent();
    var imgLoaded = $(elem).find('img').length; 
    var imgAlt = $(item).prop('alt');
    
    if(!imgLoaded){
        var img = new Image();
        img.alt = imgAlt;

        $(img).load(function(){
            $(elem).append(img);
            $(img).fadeIn(delay).css('display', 'block');
        }).error(function(){
            //do nothing on error
        }).attr('src', src);
    }

    if(index < max){
        setTimeout(function(){
            loadImage(elementName, ++index, max, delay);
        }, 50); 
    }
}
//--end of helper--

//--animation--
//Scroll to the selected element, based on the specified delay
function scrollToElementAnimated(element, delay, parent){
	if(parent != null && parent != 'undefined'){
		var containerOffset = $(parent).offset().top;
		var sectionOffset = $(element).offset().top
		var scroll = sectionOffset - containerOffset;

		$(parent).animate({'scrollTop': '+=' + scroll + 'px' }, delay);
	}else{
		var elementScrollTop = $(element).offset().top;
		$('html,body').animate({'scrollTop': elementScrollTop}, delay);
	}
}
//--end of animation--
//social feed
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
            for(i=0;i<feeds.length;i++){                    
                if(i < 1){
                    feed = fDouble.shift();
                    target = $('.feed-temp li.double a:nth(' + fDouble.length + ')');
                    //console.log(target);
                }else if(i < 4){
                    feed = fRex.shift();                        
                    target = $('.feed-temp li.rec a:nth(' + fRex.length + ')');
                }else{
                    feed = fSingle.shift();
                    target = $('.feed-temp li:not(.double, .rec) a:nth(' + fSingle.length + ')');
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

//social feed

$(function(){
	var isIe = ($('html').hasClass('ie') || (Function('/*@cc_on return document.documentMode===10@*/')())) ? true : false;
	if(isIe){
		$('#astromininav').after('<div class="notice">'+OME.isIe+'</div>')
	}

	/*mobile nav dropdown*/
	$('#btn-menu-drop-down').on('click',function(){
		//console.log($(this).children('i'));
		if($(this).children('i').hasClass('fa-arrow-down')){
			$(this).children('i').removeClass('fa-arrow-down');
			$(this).children('i').addClass('fa-arrow-up')
		} else {
			$(this).children('i').removeClass('fa-arrow-up');
			$(this).children('i').addClass('fa-arrow-down')
		}
		//$(this).children('i').removeClass('fa-arrow-down')
		$('#nav').slideToggle();		
	});

	/*about inner dropdown*/
	$('.reveal-char-info a').on('click', function(ev){
		var $btn = $(this);
		ev.preventDefault();
		if($(this).children('i').hasClass('fa-chevron-down')){
			$(this).children('i').removeClass('fa-chevron-down');
			$(this).children('i').addClass('fa-chevron-up');
			$(this).css('border-radius','0')
		} else {
			$(this).children('i').removeClass('fa-chevron-up');
			$(this).children('i').addClass('fa-chevron-down');
			setTimeout( function(ev){
			    $btn.css('border-radius','0 0 10px 10px')
	        },350);
		}
		$('.char-info-reveal').slideToggle();
	});

	/**/
	var $window = $(window);
	var windowsize = $window.width();
	
	$(window).scroll(function(){
	   	
        if (windowsize > 767) {
        	var topPush = $(window).scrollTop() < 100 ?  400 : 300;
			var desTop = topPush - $('.innerContent').offset().top + $(window).scrollTop(),
				maxTop = ($(document).height() - $(window).height()) -80;
				maxBtm = $(document).height() - $('.responsive-footer-link-holder').height() - $('.inner-char-navigation').height() - topPush;
			if(desTop < maxTop && desTop < maxBtm){
				$('.inner-char-navigation').stop(true, true).animate({
					top : desTop
				}, 150, 'linear');
			}
		}
		
	});

	var isNavHover = false,
		NavTimer; 
	$('.dropdown-menu > a').on('click mouseenter',function(e){
		//set subnav align center below nav
		

		if(e.type == 'mouseenter'){
			$(this).next().css('left',-(($(this).next().width() - $(this).parent().width()) / 2))
			if($(window).width() > 767){
				clearTimeout(NavTimer);
				if($('.dropdown-menu').hasClass('selected')){
					$('.dropdown-menu.selected ul').slideToggle();
					$('.dropdown-menu').removeClass('selected');
				}
			    if(!isNavHover){
			    	$(this).parent().addClass('selected');
			    	$(this).next().slideToggle();
			    	isNavHover = true;
			    }	
			}
		} else {
			if(isMobileDevice()){ console.log('ismobile');$(this).next().css('left',0)}
			if($(this).parent().hasClass('selected')){
				$(this).parent().removeClass('selected');
				$(this).next().slideToggle();
				isNavHover = false;
			} else {
				$('.dropdown-menu.selected ul').slideToggle();
				$('.dropdown-menu').removeClass('selected');
				$(this).parent().addClass('selected');
				$(this).next().slideToggle();
				isNavHover = true;
			}

		}
		
	    
	}); 
	$('.dropdown-menu > a, .sub-navi li').on('mouseout',function(){
			if($(window).width() > 767){
				isNavHover = false;
			    NavTimer = setTimeout( function(){
			    		$('.dropdown-menu.selected ul').slideToggle();
				    	$('.dropdown-menu').removeClass('selected');
				    	//reset subnav align center below nav
				    	//$('.sub-navi').delay(2000).css('left', 0)
				}, 200);
			}

	});

	$('.sub-navi li').on('mouseenter',function(){
		clearTimeout(NavTimer);
	});


	$('.btnEpi.active').on('click', function(ev){
		ev.stopPropagation();
	});

	
	
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,
	//grab the "back to top" link
	$back_to_top = $('.cd-top');

	 
	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').stop().stop().animate({
			scrollTop: 0 ,
			}, scroll_top_duration
		);
	});

});