var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};

App.controller('ExerciseController', function ($scope, $http, $timeout){

    $scope.curWeek = OME.curWeek;
    $scope.weeksAvailable = OME.weeksAvailable;

    $scope.exercises = OME.exercises;
    $scope.templates = [];

    $scope.curQuestion = 0;
    $scope.totalQuestion = 0;

    $scope.questionQueue = [];
    $scope.onQuestion = {};
    $scope.onAnswer = {};

    $scope.totalCorrect = 0;
    $scope.tempWrong = 0;
    $scope.answered = false;

    $scope.didWellMsg = '';

    
    
    $scope.init = function(){
        $scope.updateExerciseVars(); //return;
        $scope.reset(); 
        $scope.start();
    }

    $scope.updateExerciseVars = function(){
        var i, j, e, q, total = 0, prevTplIndex = 0;
        //get overall question total
        for(i=0; i<$scope.exercises.length; i++){
            total += $scope.exercises[i].questions.length;
        }
        $scope.totalQuestion = total;

        //$scope.templates = [];
        $scope.questionQueue = []; //reformat data
        for(i=0; i<$scope.exercises.length; i++){
            e = $scope.exercises[i];
            //$scope.templates.push(e.template);
            for(j=0; j<e.questions.length; j++){
                if(e.template == 3 || e.template == 4 || e.template == 5){
                    q = {};
                    q.question = e.questions[j];
                }else{
                    q = e.questions[j];         
                }

                q['template'] = e.template;         
 
/*                if(i > 0 && e.template != prevTplIndex){
                    $scope.questionQueue.slice(-1)[0]['last'] = true;
                }*/

                $scope.questionQueue.push(q);

                prevTplIndex = e.template;
            }
        }

        console.log('$scope.questionQueue');
        console.log($scope.questionQueue);


    }

    $scope.reset = function(){
        
    }  

    $scope.start = function(){
        $scope.nextQuestion();
    }

    $scope.showTemplate = function(index){
        var i;
        for(i=1; i<=6; i++){
            $('.container .exercises').removeClass('template' + i);
        }
        $('.container .exercises').removeClass('templateResult');

        $('.container .exercises').addClass('template' + index);
        $('.exercises > .content.wrap' + index).removeClass('hide');
    }

    $scope.showSummary = function(){        
        $('.container .exercises').addClass('templateResult');
        $('.container .exercises .content').addClass('hide');
        $('.container .exercises .wrapResult').removeClass('hide');

        $scope.didWellMsg = OME.copy.did_well_3;
        if($scope.totalCorrect >= 5){
            $scope.didWellMsg = OME.copy.did_well_2;
        }
        if($scope.totalCorrect >= 7){
            $scope.didWellMsg = OME.copy.did_well_1;
        }        

        
    }

    $scope.nextQuestion = function(){
        var question, template;
        console.log('nextQuestion');
        question = $scope.questionQueue.shift();
        $scope.onQuestion = question;
        $scope.onAnswer = {"message": "", "pass": false};

        $scope.$apply(function(){
            $scope.onQuestion = question;
            $scope.onAnswer = {"message": ""};          
        });

        if(!question){ 
            console.log('showSummary');
            OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnExercise_lastCompletion_action, OME.trackCopy.learnExercise_lastCompletion_label, 'userAction');

            $scope.showSummary();

        }else{
            
            $scope.curQuestion += 1;
            template = +question.template;

            if($scope.curQuestion > 1){
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnExercise_nthCompletion_action, OME.trackCopy.learnExercise_nthCompletion_label.replace('{nth}', $scope.curQuestion - 1), 'userAction');
                OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnExercise_tmpl_action, OME.trackCopy.learnExercise_tmpl_label.replace('{template}', template), 'userAction');
            }

            $('.exercises > .content').addClass('hide');
            $('.container .exercises .content').addClass('hide');
            $('.content.wrap' + template + ' .btnSubmit').removeClass('hide');
            $('.content.wrap' + template + ' .btnNext').addClass('hide');    

            $scope.answered = false;
            $scope.tempWrong = 0; 
            $scope.showTemplate(question.template);
           
            switch(template){
                case 1: $scope.prepTpl1Question(question); break;
                case 2: $scope.prepTpl2Question(question); break;
                case 3: $scope.prepTpl3Question(question); break;
                case 4: $scope.prepTpl4Question(question); break;
                case 5: $scope.prepTpl5Question(question); break;
                case 6: $scope.prepTpl6Question(question); break;
            }   

            //       
        }
    }

    //template 1
    $scope.prepTpl1Question = function(question){
        console.log('prepTpl1Question');
        
        $('.content.wrap1 .answer').addClass('hide');
        $('.content.wrap1 .correct').addClass('hide');
        $('.content.wrap1 .wrong').addClass('hide');  
         
        $('.content.wrap1 .submit').val('');      
        $('.content.wrap1 .submit').focus();
        
        // 
    }

    $scope.tpl1Answer = function(){ }

    $scope.tpl1Submit = function(){
        if(($scope.onAnswer.message == "You're correct!")){ 
            $scope.nextQuestion(); 
            return;
        }

        if($scope.answered && $scope.tempWrong == 0){ return; }
        $scope.answered = true;

        var answer = $scope.onQuestion.correct.toLowerCase(),
            userAnswer = $('.content.wrap1 .submit').val().toLowerCase(),
            correct = (userAnswer == answer);

        $('.content.wrap1 .correct').addClass('hide');
        $('.content.wrap1 .wrong').addClass('hide');
        $('.content.wrap1 .answer').addClass('hide');


        if(correct){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;

            $('.content.wrap1 .correct').removeClass('hide');
            $('.content.wrap1 .answer').addClass('hide');
            $('.content.wrap1 .btnSubmit').addClass('hide');
            $('.content.wrap1 .btnNext').removeClass('hide');          

            $scope.onAnswer = {
                "message": "You're correct!"
            };

        }else{
            $scope.tempWrong += 1;
            $('.content.wrap1 .wrong').removeClass('hide');
            $('.content.wrap1 .answer').removeClass('hide');

            $scope.onAnswer = {
               "message": OME.copy.tpl1_ops.replace('{answer}', "<strong>" + answer + "</strong>"),
            };
            
            $('.content.wrap1 .submit').select().focus();
        }  

        // 
    }

    //template 2
    $scope.prepTpl2Question = function(question){
        console.log('prepTpl2Question');

        var correctProb = 0.6,
            answerIs = Math.random() > correctProb;

        $scope.onQuestion.answerIs = answerIs;
        $scope.onQuestion.display = (answerIs)?question.correct:question.wrong;

        $('.content.wrap2 .answer span').text((answerIs)?'correct':'wrong');
        $('.content.wrap2 .answer').addClass('hide');
        $('.content.wrap2 .choice').removeClass('hide');
        $('.content.wrap2 .submitWrap > div').removeClass('hide');           

    }

    $scope.tpl2Answer = function(choiceCorrect){ 

        if($scope.answered && $scope.tempWrong == 0){ return; }

        $scope.onQuestion.choiceCorrect = choiceCorrect;
        $('.content.wrap2 .choice').addClass('hide');
        $('.content.wrap2 .submitWrap > div').addClass('hide');
        if(choiceCorrect){
            $('.submitWrap .correct').removeClass('hide');
        }else{
            $('.submitWrap .wrong').removeClass('hide');
        }

    }

    $scope.tpl2Submit = function(){

        var answer = $scope.onQuestion.answerIs,
            userAnswer = $scope.onQuestion.choiceCorrect,
            correct = (userAnswer == answer),
            copyCorrect = '',
            copySentenceIsCorrect = OME.copy.tpl2_ops1.replace('{answer}', $scope.onQuestion.correct),
            copySentenceIsWrong = OME.copy.tpl2_ops2;

        if(correct){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;
            $scope.onAnswer = {
                "message": OME.copy.yup
            };

            $('.content.wrap2 .btnSubmit').addClass('hide');
            $('.content.wrap2 .btnNext').removeClass('hide');   

        }else{
            $('.content.wrap2 .choice').removeClass('hide');
            $('.content.wrap2 .submitWrap > div').removeClass('hide');            
            $scope.tempWrong += 1;
            if(!answer){
                $scope.onAnswer = {
                    "message": copySentenceIsCorrect
                };
            }else{
                $scope.onAnswer = {
                    "message": copySentenceIsWrong
                };   
            }
        }   
        $('.content.wrap2 .answer').removeClass('hide');
        
    }

    //template 3
    $scope.prepTpl3Question = function(question){
        console.log('prepTpl3Question');

        var questions = question.question,
            displays = shuffle(questions, { 'copy': true }), 
            i, rand, tmp;

        $scope.onQuestion.displays = displays;
        $scope.onAnswer = '';

        $('.content.wrap3 .ui-droppable').removeClass('hBingo bingo hOps ops active');  
        $('.content.wrap3 .dropBox').removeClass('hBingo bingo hOps ops active');
        $('.content.wrap3 .ui-droppable-disabled').removeClass('ui-droppable-disabled');        
        $('.content.wrap3 .dropBox span').html('');

        $timeout(function(){
            $('.dropCol > .answer').addClass('hide');

            $(".content.wrap3 .dragContainer .ui-draggable").draggable({ 
                revert: "valid",
                containment: ".wrap3",
                opacity: 0.75,
                appendTo: ".wrap3",
                helper: 'clone'             
            }); 
            /*$("body").droppable({
                drop: function( event, ui ) {}
            });*/


            $(".content.wrap3 .dropBox").droppable({
                activeClass: "ui-state-hover",
                hoverClass: "ui-state-active",
                accept: ".ui-draggable",

                drop: function( event, ui ) {
                    console.log('drop drop drop');
                    var userAnswer = ui.draggable.text(),
                        answer = $(this).parent().parent().parent().find('.answer span'),
                        element = this;

/*                    console.log('userAnswer: ' + userAnswer);
                    console.log('answer: ' + answer.text());
                    console.log($(this).children('span'));*/
                    $('.wrap3 .dropGroup').each(function(){
                        var dropGroup = this,
                            dropActive = $(dropGroup).find('.dropBox');
                        dropActive.removeClass('ops');
                        if(dropActive.hasClass('active') && dropActive.children('span').html() == ui.draggable.text() ){
                           dropActive.children('span').html('');
                           dropActive.removeClass('active');
                        } 
                        if(dropActive.children('span').html() != $(element).children('span').text()){
                            $('.wrap3 .dragContainer #dragBox').each(function(){
                                if( $(element).children('span').text() == $(this).children('span').text()){
                                    $(this).removeClass('active');
                                }
                            })
                        }
                    });

                    ui.draggable.addClass('active');
                    $(element).addClass('active');
                    $(element).children('span').text(userAnswer);

                    if(userAnswer == answer.text()){
                        //console.log(['this drop is correct', userAnswer, answer.text()]);
                        answer.addClass('hBingo');
                        $(element).addClass('hBingo');
                        ui.draggable.addClass('hBingo');
                        answer.removeClass('hOps');
                        $(element).removeClass('hOps');
                        ui.draggable.removeClass('hOps');
                    }else{
                        //console.log(['this drop is wrong', userAnswer, answer.text()]);
                        answer.removeClass('hBingo');
                        $(element).removeClass('hBingo');
                        ui.draggable.removeClass('hBingo');
                        answer.addClass('hOps');
                        $(element).addClass('hOps');
                        ui.draggable.addClass('hOps');
                    }

                }
            });


        }, 800);        

    }  

    $scope.tpl3Answer = function(){ 

        if($scope.answered && $scope.tempWrong == 0){ return; }

        var question = $(this).find('.dropTitle span').text(),
            answer = $(this).find('.dropBox > span').text();

        console.log('answering: ' + question);
    }

    $scope.tpl3Submit = function(){
        console.log('tpl3Submit: ' + Math.random());

        var totalQuestion = $scope.onQuestion.question.length, 
            totalCorrect = $('.content.wrap3 .answer span.hBingo').length;

        $('.content.wrap3 .answer').addClass('hide');
        //show all wrong answer 1
        $(".content.wrap3 .answer").addClass('hide');
        $(".content.wrap3 .answer:not(.hBingo)").removeClass('hide');
        $('.content.wrap3 .ui-droppable.hBingo').removeClass('hBingo').addClass('bingo');
        $('.content.wrap3 .ui-droppable.hOps').removeClass('hOps').addClass('ops');

        //disable correct draggable & dropable
        $('.ui-draggable.hBingo').draggable({
          disabled: true
        });
        $('.ui-draggable.hOps').removeClass('active')
        $('.content.wrap3 .ui-droppable.bingo').droppable({
            disabled: true
        });
        console.log([totalCorrect, totalQuestion]);

        if(totalQuestion == totalCorrect){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;
            $scope.onAnswer = {
                "message": OME.copy.yup
            };

            $(".content.wrap3 .dropBox").droppable('destroy');

            $('.content.wrap3 .btnSubmit').addClass('hide');
            $('.content.wrap3 .btnNext').removeClass('hide');   
            $(".content.wrap3 .answer").addClass('hide');
        }else{   
            $scope.tempWrong += 1;  
            $scope.onAnswer = {
                "message": OME.copy.tpl3_ops
            };                      
        }
        return;

    } 


    //template 4
    $scope.prepTpl4Question = function(question){
        console.log('prepTpl4Question');

        var answer = question.question,
            display = shuffle(answer, { 'copy': true }), 
            i, rand, tmp;
         
        $scope.onQuestion.display = display;
        $scope.onAnswer = {
            "message": OME.copy.tpl4_guide
        };

        $timeout(function(){
            $(".content.wrap4 .dragContainer .ui-draggable").draggable({ 
                revert: "valid",
                containment: ".template4",
                opacity: 0.75,
                appendTo: ".template4",
                helper: 'clone'             
            }); 
            /*$("body").droppable({
                drop: function( event, ui ) {}
            });*/
            $(".content.wrap4 .dropInfo").droppable({
                activeClass: "ui-state-hover",
                hoverClass: "ui-state-active",
                accept: ".ui-draggable",
                drop: function( event, ui ) {
                    var userAnswer = ui.draggable.text(),
                        answer = $(this).parent().parent().find('.answer'),
                        element = $(this);

                    $('.wrap4 .dropGroup').each(function(){
                        var dropGroup = this,
                            dropActive = $(dropGroup).find('.dropInfo');
                        dropActive.removeClass('ops')
                        if(dropActive.hasClass('active') && dropActive.children('span').html() == ui.draggable.text() ){
                           dropActive.children('span').html('');
                           dropActive.removeClass('active');
                        } 
                        if(dropActive.children('span').html() != $(element).children('span').text()){
                            $('.wrap4 .dragContainer #dragBox').each(function(){
                                if( $(element).children('span').text() == $(this).children('span').text()){
                                    $(this).removeClass('active')
                                }
                            })
                        }
                    });

                    $(this).find('span').text(userAnswer);

                    ui.draggable.addClass('active');
                    $(element).addClass('active')
                    $(element).children('span').text(userAnswer);

                    if(userAnswer == answer.text()){
                        //console.log(['this drop is correct', userAnswer, answer.text()]);
                        answer.addClass('hBingo');
                        $(element).addClass('hBingo');
                        ui.draggable.addClass('hBingo');
                        answer.removeClass('hOps');
                        $(element).removeClass('hOps');
                        ui.draggable.removeClass('hOps');
                    }else{
                        //console.log(['this drop is wrong', userAnswer, answer.text()]);
                        answer.removeClass('hBingo');
                        $(element).removeClass('hBingo');
                        ui.draggable.removeClass('hBingo');
                        answer.addClass('hOps');
                        $(element).addClass('hOps');
                        ui.draggable.addClass('hOps');
                    }

                }
            });
        }, 1000);       
    }      

    $scope.tpl4Answer = function(){ 

        if($scope.answered && $scope.tempWrong == 0){ return; }  

/*        var userAnswer = $(this).find('.content.wrap4 .dropInfo span').text(),
            realAnswer = $(this).find('.content.wrap4 .answer').text();

        if(userAnswer == realAnswer){
            console.log('correct: ' + userAnswer + ', answer is' + realAnswer);
        }else{
            console.log('wrong: ' + userAnswer + ', answer is' + realAnswer);
        }
*/
        
    }    

    $scope.tpl4Submit = function(){
        console.log('tpl4Submit: ' + Math.random());

        var totalQuestion = $scope.onQuestion.question.length, 
            totalCorrect = $('.content.wrap4 .dragContainer .hBingo').length;   

        console.log([totalCorrect, totalQuestion]);

        $('.content.wrap4 .answer').addClass('hide');
        //show all wrong answer 1
        $(".content.wrap4 .answer").addClass('hide');
        $(".content.wrap4 .answer:not(.hBingo)").removeClass('hide');
        $('.content.wrap4 .ui-droppable.hBingo').removeClass('hBingo').addClass('bingo');
        $('.content.wrap4 .ui-droppable.hOps').removeClass('hOps').addClass('ops');

        //disable correct draggable & dropable
        $('.content.wrap4 .ui-draggable.hBingo').draggable({
          disabled: true
        });
        $('.content.wrap4 .ui-draggable.hOps').removeClass('active')
        $('.content.wrap4 .ui-droppable.bingo').droppable({
          disabled: true
        });

        if(totalQuestion == totalCorrect){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;
            $scope.onAnswer = {
                "message": OME.copy.yup
            };

            $('.content.wrap4 .btnSubmit').addClass('hide');
            $('.content.wrap4 .btnNext').removeClass('hide');   
            $(".content.wrap4 .answer").addClass('hide');
        }else{   
            $scope.tempWrong += 1;  
            $(".content.wrap4 .answer").removeClass('hide');
            $scope.onAnswer = {
                "message": OME.copy.tpl4_ops
            };                      
        }

    } 

    //template 5
    $scope.prepTpl5Question = function(question){
        console.log('prepTpl5Question');

        var answer = question.question.replace(/\s+/ig, ' ').split(' '),
            display = shuffle(answer, { 'copy': true }), 
            i, rand, tmp;

         
        $scope.onQuestion.display = display;
        console.log(display);
        console.log($scope.onQuestion.display);        

        $('.content.wrap5 .answer span').text(answer.join(' '));

        $('.content.wrap5 .correct').addClass('hide');
        $('.content.wrap5 .wrong').addClass('hide');
      

        $(".content.wrap5 .user-answer").sortable({
            tolerance: 'pointer',
            containment: 'parent',
            placeholder: "placeholder",
            scroll: false,
            forceHelperSize: true
          });
        $(".content.wrap5 .user-answer").disableSelection(); 

        console.log('end prepTpl5Question');         
    }

    $scope.tpl5Submit = function(){
        var answer = $scope.onQuestion.question,
            userAnswer = [],
            correct = (userAnswer == answer);
        
        $('.content.wrap5 .user-answer span').each(function(){
            userAnswer.push($(this).text());
        });

        userAnswer = userAnswer.join(' ');
        correct = (userAnswer == answer);

        console.log(correct);

        if(correct){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;
            $('.content.wrap5 .answer').addClass('hide');
            $scope.nextQuestion();
        }else{
            $scope.tempWrong += 1;
            $('.content.wrap5 .answer').removeClass('hide');
        }   

        // 

    }


    //template 6
    $scope.prepTpl6Question = function(question){
        console.log('prepTpl6Question');
        console.log(question);

        var q = question.wrong.split(' '),
            words = [],
            i, rand, a, w, is;

        for(i=0; i<q.length; i++){
            a = q[i];
            is = false;
            if(a.match(/\[(.+)\]/g)){
                a = a.replace(/\[(.+)\]/g, '$1');
                is = true;
            }

            words.push({
                text: a,
                isAnswer: is 
            });
        }

        $('.wrap6 .answer').addClass('hide');
        $('.wrap6 .wrongMsg').addClass('hide');

        $scope.onQuestion.correct = question.correct.replace(/(\[(.+)\])/gi, "<b>$2</b>");
        //$scope.onQuestion.correct = "Oops, the right answer is: <strong>" + $scope.onQuestion.correct + "</strong>"
        $scope.onQuestion.words = words;

        console.log($scope.onQuestion.words);
    }    







   


    $scope.tpl6Answer = function($event, isAnswer){
        if($scope.answered && $scope.tempWrong == 0){ return; }

        $('.wrap6 .selectBtn').removeClass('active');
        angular.element($event.currentTarget).addClass('active');

        $scope.onAnswer = isAnswer;
    }
    
    $scope.tpl6Submit = function(){

        $scope.answered = true;

        
        $('.wrap6 .correct').addClass('hide');
        $('.wrap6 .wrong').addClass('hide');
        $('.wrap6 .answer').removeClass('hide');

        if($scope.onAnswer){
            $scope.totalCorrect += (!$scope.tempWrong)?1:0;
            $('.wrap6 .wrongMsg').addClass('hide');
            $('.wrap6 .correct').removeClass('hide');
            $('.wrap6 .btnSubmit').addClass('hide');
            $('.wrap6 .btnNext').removeClass('hide');
        }else{
            $scope.tempWrong += 1;
            $('.wrap6 .wrong').removeClass('hide');
            $('.wrap6 .wrongMsg').removeClass('hide');
        }

    }


});


App.controller('ExerciseWeekListController', function ($scope, $http, $timeout){
    $scope.curWeek = OME.curWeek;
    $scope.weeksAvailable = OME.weeksAvailable;

    $scope.init = function(){
        $timeout(function(){
            bindSlider('#learnSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);
        }, 1000)
    }

});

App.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            console.log('ngEnter');
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
 
                event.preventDefault();
            }
        });
    };
});
