var App = App || angular.module('omeApp', []),
    OME = OME || {};

OME.setLength = 10;
OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";

    var i, emptySet = [];
    for(i=0; i<10; i++){
        emptySet.push('');
    }

    $scope.questions = OME.questions || [];
    for(i=0; i<$scope.questions.length; i++){
        while($scope.questions[i].length < OME.questionLength){
           $scope.questions[i].push('');
        }
    }

    while($scope.questions.length < OME.setLength){
        $scope.questions.push((JSON.parse(JSON.stringify(emptySet))));
    }

    $scope.init = function() {
        
    }

    $scope.saveChanges = function(weeks, template) {
        
        var i, j, set, q, jsonSets = [], jsonQuestions = [];
        jsonSets = [];
        for(i=0; i<$scope.questions.length; i++) {
            set = $scope.questions[i];

            for(j=0; j<set.length; j++) {
                q = set[j];
                if(q != ''){
                    jsonQuestions.push(q);
                }
            }

            if(jsonQuestions.length > 0){
                jsonSets.push((JSON.parse(JSON.stringify(jsonQuestions))));
            }
            
            jsonQuestions = [];

        }

        //jsonQuestions is ready
        //alert(angular.toJson(jsonQuestions));
        var questions = angular.toJson(jsonSets);

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