var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};
OME.successConnect = function(){};


App.controller('AskHenryController', function ($scope, $http, $timeout){

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.listQAs = [];
    $scope.askScreenName = "";
    $scope.askText = "";
    $scope.askCharLeft = 130;
    $scope.maxChar = 130;

    $scope.page = 1;
    $scope.category = "all";
    $scope.questions = [];
    
    $scope.lgNavMaxLength = 9;
    $scope.lgNavLength = 9;
    $scope.lgNavStart = 1;

    $scope.smNavMaxLength = 7;
    $scope.smNavLength = 7;
    $scope.smNavStart = 1; 


    $scope.init = function(){        
        $scope.listQAs = [];
        $scope.switchAskHenryView('show-connect');

        if(OME.reply){
            $scope.questions.push(OME.reply);
            $scope.updatePageNav(false);
            $scope.category = "/";
            $timeout(function(){
                angular.element('.qnacontent .qnaGroup:first-child').trigger('click');
            }, 300);   
        }else{
            $scope.fetchQuestions("all", 1);
        }

    }

    $scope.fetchQuestions = function(category, page, loadMore){
        console.log('fetchQuestions');
        if(page < 1){ page = 1; }
        $scope.category = category;
        $scope.page = page;

        $http.get('/api/learn/ask-henry?page=' + page + '&category=' + category).
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                var i;

                if(loadMore){
                    $scope.questions.push.apply($scope.questions, data.data.questions.data);
                    $('.qnacontent .qnaGroup:first-child').children('.answer').fadeToggle();
                    if(data.data.questions.last_page == $scope.page){
                        $('.pegiList.display-xs').addClass('hide');
                    }
                }else{
                    $scope.questions = data.data.questions.data;                    
                    if($scope.questions.length > 0){
                        $scope.updatePageNav(data.data.questions); 
                    }else{
                        $scope.updatePageNav(false); 
                    }
                    $timeout(function(){
                        angular.element('.qnacontent .qnaGroup:first-child').trigger('click');
                    }, 300);
                }


            } else {
                alert(data.message);
            }
        });        
    }    

    $scope.loadMore = function(){
        $scope.fetchQuestions($scope.category, $scope.page + 1, true);
    }

    $scope.switchCategory = function(category){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnAskHenry_category_action, OME.trackCopy.learnAskHenry_category_label.replace('{category}', category), 'userAction');
        $scope.fetchQuestions(category, 1);
    }

    $scope.updatePageNav = function(paginate){

        if(!paginate){ $('.pegination').addClass('hide'); return; }

        $('.pegination').removeClass('hide');

        $scope.lgNavLength = (paginate.last_page < $scope.lgNavMaxLength)?paginate.last_page:$scope.lgNavMaxLength;
        $scope.lgNavStart = $scope.page - Math.floor($scope.lgNavMaxLength / 2);         
        if((paginate.last_page - $scope.page) <= Math.floor($scope.lgNavMaxLength / 2)){ $scope.lgNavStart = paginate.last_page - $scope.lgNavMaxLength + 1; }
        if($scope.lgNavStart < 1 || $scope.lgNavLength >= paginate.last_page){ $scope.lgNavStart = 1; }

        $scope.smNavLength = (paginate.last_page < $scope.smNavMaxLength)?paginate.last_page:$scope.smNavMaxLength;
        $scope.smNavStart = $scope.page - Math.floor($scope.smNavMaxLength / 2);         
        if((paginate.last_page - $scope.page) <= Math.floor($scope.smNavMaxLength / 2)){ $scope.smNavStart = paginate.last_page - $scope.smNavMaxLength + 1; }
        if($scope.smNavStart < 1 || $scope.smNavLength >= paginate.last_page){ $scope.smNavStart = 1; }

        $('.pegination .forward, .pegination .backward').addClass('hide');
        if($scope.page != 1 /*&& $scope.lgNavLength == $scope.lgNavMaxLength*/ ){ $('.pegination .backward').removeClass('hide'); }
        if($scope.page != paginate.last_page /*&& $scope.lgNavLength == $scope.lgNavMaxLength*/){ $('.pegination .forward').removeClass('hide'); }
    }

    $scope.readAnswer = function($event){

        //angular.element($event.target).parent();
        var that = angular.element($event.currentTarget);

        if(that.hasClass('active')){
            that.removeClass('active')
            that.children('.answer').fadeToggle();
        } else{
            that.parent().find('.qnaGroup.active .answer').fadeToggle();
            that.parent().find('.qnaGroup').removeClass('active');
            that.addClass('active');
            that.children('.answer').fadeToggle();
        }        
    }


    $scope.switchAskHenryView = function(state){
    	$('.switchable').addClass('hide');

    	switch(state){
    		case 'show-connect': $('.askhenryContent .twitterConnect').removeClass('hide'); break;
    		case 'show-submit': $('.askhenryContent .twitterSubmit').removeClass('hide'); break;
    		case 'show-thx': $('.askhenryContent .twitterThx').removeClass('hide'); break;
    	}
    }

    $scope.connectTwitter = function(){        
		var winConnect, 
			strWindowFeatures = "width=800,height=300,top=100,left=100";

        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnAskHenry_connect_action, OME.trackCopy.learnAskHenry_connect_label, 'userAction');
		winConnect = window.open(OME.twitterConnectUrl, "winConnect", strWindowFeatures);
    }    

    $scope.successConnect = function(askScreenName){ 
    	$scope.$apply(function(){
    		$scope.askScreenName = askScreenName;
    	});    	
		$scope.switchAskHenryView('show-submit');
    }    
    OME.successConnect = $scope.successConnect;

    $scope.askCharCount = function(){ 

        if($scope.askText.length > $scope.maxChar){
            $scope.askText = $scope.askText.substring(0, $scope.maxChar);
        }

    	$scope.askCharLeft = $scope.maxChar - $scope.askText.length;
    }    
    
    $scope.submitQuestion = function(){
    	if($scope.askText.length < 5){ return; }

        $http.post('/api/learn/ask-henry', 'question=' + $scope.askText).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                $scope.switchAskHenryView('show-thx');
                $scope.askText = "";
            } else {
                alert(data.message);
            }
        });     	
    }

    $scope.gotIt = function(){
    	$timeout(function(){ 
    		$scope.switchAskHenryView('show-connect'); 
    		$("html, body").animate({ scrollTop: $('.qnaList').offset().top });
    	}, 1000);    
        
    }
    
});

App.filter('range', function() {
  return function(input, total) {
    total = parseInt(total);
    for (var i=0; i<total; i++)
      input.push(i);
    return input;
  };
});

$(document).ready(function() {
	bindSlider('#qnaSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);

/*	$('.qnacontent .qnaGroup').on('click',function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active')
			$(this).children('.answer').fadeToggle();
		} else{
			
			$(this).parent().find('.qnaGroup.active').children('.answer').fadeToggle();
			console.log('--->',$(this).parent().find('.qnaGroup.active').children('.answer'))
			$(this).parent().find('.qnaGroup.active').removeClass('active');
			$(this).addClass('active')
			$(this).children('.answer').fadeToggle();
		}
	});*/

	$('.btnQna').on('click', function(){
		$('#qnaSlider ul li').find('.active').removeClass('active');
		$(this).addClass('active')
	});
});