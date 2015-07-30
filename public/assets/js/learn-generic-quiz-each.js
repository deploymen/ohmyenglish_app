var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};
OME.container = $('.quiz-container');

App.controller('QuizController', function ($scope, $http, $timeout){

    $scope.init = function(){
        $scope.questionQueue = OME.questions;
        $scope.totalQuestion = OME.questions.length;
        $scope.opt1 = 0;
        $scope.opt2 = 0;
        $scope.opt3 = 0;
        $scope.curQuestionNo = 0; 
        $scope.onQuestion = {}; 
        $scope.resultCopy = {
            "title":"",
            "info":"",
            "share_title":""
        }; 
        
        OME.container.removeClass('complete');
        switch(OME.quiz){
            case 'how-malaysian-is-your-english': OME.container.addClass('malaysianEnglish'); break;
            case 'which-english-words-describes-you': OME.container.addClass('describeYou'); break;
            case 'which-character-are-you': OME.container.addClass('omeCharacter'); break;
        }

        $scope.nextQuestion();
    }

    $scope.nextQuestion = function(){
        console.log('nextQuestion');
        var question = $scope.questionQueue.shift();
        $scope.onQuestion = question;
        
        if(!question){ 
            OME.container.addClass('complete');
            /*
                If A > B or C , equal to personality 1
                If B > A or C , equal to personality 2
                If C > A or B , equal to personality 3

                If A = B, equal to personality 4
                If B = C, equal to personality 5
                If C = A, equal to personality 6
            */
            if($scope.opt1 == $scope.opt2){ $scope.onResult = 4; }
            if($scope.opt2 == $scope.opt3){ $scope.onResult = 5; }
            if($scope.opt1 == $scope.opt3){ $scope.onResult = 6; }
            if($scope.opt1 > $scope.opt2 && $scope.opt1 > $scope.opt3){ $scope.onResult = 1; }
            if($scope.opt2 > $scope.opt1 && $scope.opt2 > $scope.opt3){ $scope.onResult = 2; }
            if($scope.opt3 > $scope.opt1 && $scope.opt3 > $scope.opt2){ $scope.onResult = 3; }            

            switch($scope.onResult){
                case 1: $scope.resultCopy = OME.copy.result1; break;
                case 2: $scope.resultCopy = OME.copy.result2; break;
                case 3: $scope.resultCopy = OME.copy.result3; break;
                case 4: $scope.resultCopy = OME.copy.result4; break;
                case 5: $scope.resultCopy = OME.copy.result5; break;
                case 6: $scope.resultCopy = OME.copy.result6; break;
            }



            console.log([$scope.onResult, $scope.opt1, $scope.opt2, $scope.opt3, $scope.opt4, $scope.opt5, $scope.opt6]);

            OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPersonalityQuiz_result1_action, OME.trackCopy.learnPersonalityQuiz_result1_label, 'userAction'); 

            $('.btn_share').shareButtons(OME.shareUrl + '?result=' + $scope.onResult, {
                twitter: {
                    text: OME.copyTwitter + ' ' + OME.shareUrlShort,
                    //via: "ohMyEnglish"
                },
                facebook: true,
                googlePlus: true
            });

            $('.showSocialButtons').hover(function(){
                $('.btn_xs').addClass("hovered")
            }, function(){
                $('.btn_xs').removeClass("hovered")
            })

            $('.btn_share').click(function(){
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPersonalityQuiz_share_action, OME.trackCopy.learnPersonalityQuiz_share_label, 'userAction');
            });

             $('.btn_takeQuiz').on('click touchstart', function(){
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPersonalityQuiz_takeOtherQuiz_action, OME.trackCopy.learnPersonalityQuiz_takeAnother_label, 'userAction');
            });

        }else{
          
            $scope.onQuestion = question;
            $scope.curQuestionNo += 1;    

        }
    };

    $scope.choose = function(option){
        switch(+option){
            case 1: $scope.opt1 += 1; break;
            case 2: $scope.opt2 += 1; break;
            case 3: $scope.opt3 += 1; break;
        }

        $scope.nextQuestion();
    };

    


});

