var App = App || angular.module('omeApp', []),
    OME = OME || {};

OME.questionLength = 20;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.videoTrailer = [
        {'week':1},
        {'week':2},
        {'week':3},
        {'week':4},
        {'week':5},
        {'week':6},
        {'week':7},
        {'week':8},
        {'week':9},
        {'week':10},
        {'week':11},
        {'week':12},
        {'week':13},
        {'week':14},
        {'week':15},
        {'week':16},
        {'week':17},
        {'week':18},
        {'week':19},
        {'week':20},
    ];

    /* $scope.questions = OME.questions || [];

   $scope.questions = OME.questions || [];
    while($scope.questions.length < OME.questionLength){
        $scope.questions.push({'correct':'', 'wrong':'', 'clue':''});
    }

    $scope.init = function() {
        
    }

    $scope.saveChanges = function(weeks, template) {

        var i, q, jsonQuestions = [];
        for(i=0; i<$scope.questions.length; i++) {
            q = $scope.questions[i];
            if((q.correct != '' && q.wrong == '' && q.clue == '') || (q.correct == '' && q.wrong != '' && q.clue == '')
             || (q.correct == '' && q.wrong == '' && q.clue != '') || (q.correct != '' && q.wrong != '' && q.clue == '')
              || (q.correct != '' && q.wrong == '' && q.clue != '') || (q.correct == '' && q.wrong != '' && q.clue != '')){
                alert('Not a valid set');
                return;
            }
        }

        //clean
        //call ajax to save the questions
        for(i=0; i<$scope.questions.length; i++) {
            q = $scope.questions[i];
            if(q.correct != '' && q.wrong != '' && q.clue != ''){
                jsonQuestions.push({"correct":q.correct,"wrong":q.wrong,"clue":q.clue});
            }
        }

        //jsonQuestions is ready
        //alert(angular.toJson(jsonQuestions));
        var questions = angular.toJson(jsonQuestions);

        //PUT 
        $http.put('/api/learn/classroom-exercise/weeks/'+weeks+'/templates/'+template, "questions="+questions).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                
                alert('success');
            } else {
                alert(data.message);
            }
        });

    }*/

});
