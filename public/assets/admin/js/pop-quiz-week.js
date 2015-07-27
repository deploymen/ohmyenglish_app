var App = App || angular.module('omeApp', []),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.quizs = [];

    $scope.init = function() {
        $scope.quizs = OME.quizs;
    }


    $scope.saveChanges = function() {

        var i, q, jsonQuestions = [];

        //validation
        for(i=0; i<$scope.quizs.length; i++) {
            q = $scope.quizs[i];
            if(q.option1 == '' || q.option2 == '' || q.option3 == '' || q.answer == ''){
                alert('please fill in all to save');
                return;
            }
        }

    
        //jsonQuestions is ready
        //alert(angular.toJson(jsonQuestions));
        var jsonQuizs = angular.toJson($scope.quizs);


        //PUT 
        $http.put('/api/learn/pop-quiz/weeks/' + OME.week, "quizs="+jsonQuizs).
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                
                alert('success');
            } else {
                alert(data.message);
            }
        });

    }

});
