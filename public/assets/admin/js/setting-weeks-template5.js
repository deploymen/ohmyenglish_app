var App = App || angular.module('omeApp', []),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {
    
    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.questions = OME.questions || [];
    while($scope.questions.length < OME.questionLength){
        $scope.questions.push('');
    }

    $scope.init = function() {
        
    }

    $scope.saveChanges = function(weeks, template) {

        var i, q, jsonQuestions = [];

        //call ajax to save the questions
        for(i=0; i<$scope.questions.length; i++) {
            q = $scope.questions[i];
            if(q != ''){
                jsonQuestions.push(q);
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

    }

});