// Required: jquery.js 


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
function bindSlider(container, prevTrigger, nextTrigger, speed, interval, animTimer, slotIndicator, rotating){
	var totalItems = $(container).find('li').length;
	var containerWidth = $(container).width();
	var containerScrollWidth = totalItems * containerWidth;
	
	//setup hidden counters
	var strCounters = '<input type="hidden" class="currentItem" value="1" />\
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
	
	//bind the width for the scroller first
	//$(container).find('ul:first').width(containerScrollWidth);
	$(container).find('ul:first').css('position', 'absolute');
	$(container).find('ul:first').css('top', 0);
	$(container).find('ul:first').css('left', 0);
	
	//bind button scrollers
	$(prevTrigger).click(function(e){
		e.preventDefault();
		if(animTimer)
			clearInterval(animTimer);
		scrollSlider(container, prevTrigger, nextTrigger, false, speed, slotIndicator, rotating);
	});
	$(nextTrigger).click(function(e){
		e.preventDefault();
		if(animTimer)
			clearInterval(animTimer);
		scrollSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, rotating);
	});
	
	if(interval != '' && interval != 0 && animTimer != 'undefined'){
		animTimer = setInterval(function(){
			scrollSlider(container, prevTrigger, nextTrigger, true, speed, slotIndicator, true);
		}, interval);
	}
	
	if(!rotating)
		$(prevTrigger).hide();
}

function scrollSlider(container, prevTrigger, nextTrigger, isForward, speed, slotIndicator, rotating){
	var containerSlider = $(container).find('ul:first');
	var currentItem = $(container).find('.currentItem:first').val();
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
	
	var targetPanelLoc = $(containerSlider).find('.itemCount[value="'+currentItem+'"]:first').parents('li').position().left;
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
			if(currentItem == totalItem)
				$(nextTrigger).hide();
			else
				$(nextTrigger).show();
			
			if(currentItem == 1)
				$(prevTrigger).hide();
			else
				$(prevTrigger).show();
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
    
    if(!imgLoaded){
        var img = new Image();

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