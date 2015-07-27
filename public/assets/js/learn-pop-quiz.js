var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};

App.controller('PopQuizController', function ($scope, $http, $timeout){

    $scope.questionQueue = [];
    $scope.totalQuestion = 0;
    $scope.curQuestionNo = 0;
    $scope.totalCorrect = 0;
    $scope.characters = ['quiz-character-zack', 'quiz-character-anusha'];

    $scope.onQuestion = {};
    $scope.onAnswer = {};

    
    


    $scope.init = function(){        
        $scope.questionQueue = OME.popQuizs;
        $scope.totalQuestion = OME.popQuizs.length;
        $scope.nextQuestion();
    }

    $scope.nextQuestion = function(){
        console.log($scope.questionQueue);
        var question = $scope.questionQueue.shift();
        $scope.onQuestion = question;
        $scope.onAnswer = {"message": "", "pass": false}; 

        if(!question){ 
            OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPopQuiz_lastCompletion_action, OME.trackCopy.learnPopQuiz_lastCompletion_label, 'userAction');
            $scope.showSummary();

        }else{
            
            $scope.onQuestion = question;
            $scope.onAnswer = {"message": "", "pass": false}; 
            $scope.curQuestionNo += 1;    
            if($scope.curQuestionNo > 1){
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPopQuiz_nthCompletion_action, OME.trackCopy.learnPopQuiz_nthCompletion_label.replace('{nth}', $scope.curQuestionNo - 1), 'userAction');    
            }
                       

            $('.quiz-container').removeClass('hide');
            $('.quiz-container-result').addClass('hide');
            $('.quiz-container').removeClass('disabled');

            $('.quiz-container .character').removeClass($scope.characters.join(' '));
            $('.quiz-container .character').removeClass('correct wrong');
            $('.quiz-container .character').addClass($scope.characters[Math.floor(Math.random()*$scope.characters.length)]);
            $('.quiz-container .character').addClass('default');

            $('.quiz-container .quiz-option a').removeClass('default quiz-correct quiz-wrong');
            
            $scope.characterRespond = OME.copyBubble.default;
        }

    };

    $scope.choose = function($event, option){
        var answerOpt = $scope.onQuestion.answer, delay = 1000;
        
        if($('.quiz-container').hasClass('disabled')){ return; }

        $('.quiz-container').addClass('disabled');
        $('.quiz-container .quiz-option a').removeClass('quiz-correct quiz-wrong');
        $('.quiz-container .character').removeClass('default correct wrong');
        if(option == answerOpt){
            angular.element($event.currentTarget).addClass('quiz-correct');
            $('.quiz-container .character').addClass('correct');
            $scope.characterRespond = OME.copyBubble.correct;
            $scope.totalCorrect += 1;
            delay = 1000;
        }else{
            angular.element($event.currentTarget).addClass('quiz-wrong');
            $('.quiz-container .quiz-option a.option' + answerOpt).addClass('quiz-correct');
            $('.quiz-container .character').addClass('wrong');
            $scope.characterRespond = OME.copyBubble.wrong;
            delay = 2000;
        }

        $timeout($scope.nextQuestion, delay);      
        
    }

    $scope.showSummary = function(){
        var scoreClass = 'low-score';
        $('.quiz-container').addClass('hide');        
        $('.quiz-container').addClass('disabled'); 
        $('.quiz-container-result').removeClass('hide'); 

        scoreClass = 'low-score'; 
        $scope.resultText = OME.copyBubble.low_score;
        $scope.resultTextBubble = OME.copyBubble.low_score_bubble;
        if($scope.totalCorrect >= 5){ 
            scoreClass = 'medium-score'; 
            $scope.resultText = OME.copyBubble.medium_score; 
            $scope.resultTextBubble = OME.copyBubble.medium_score_bubble; 

        }

        if($scope.totalCorrect >= 10){ 
            scoreClass = 'high-score'; 
            $scope.resultText = OME.copyBubble.high_score; 
            $scope.resultTextBubble = OME.copyBubble.high_score_bubble; 

        }

        $('.quiz-results-anusha, .quiz-results-zack').removeClass('low-score medium-score high-score');
        $('.quiz-results-anusha, .quiz-results-zack').addClass(scoreClass); 


    }


});


App.controller('PopQuizWeekListController', function ($scope, $http){
    $scope.curWeek = OME.curWeek;
    $scope.weeksAvailable = OME.weeksAvailable;
    console.log([$scope.curWeek, $scope.weeksAvailable]);

    $scope.init = function(){
        setTimeout(function(){
            bindSlider('#learnSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);
        }, 1000)
    }

});