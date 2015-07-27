var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  
    $scope.question = {};
    $scope.ddCategory = [{"id":"vocabulary","name":"Vocabulary"},{"id":"idioms","name":"Idioms"},{"id":"grammar","name":"Grammar"},{"id":"advice","name":"Advice"},{"id":"others","name":"Others"}];

    $scope.init = function(){
        $scope.question = OME.question;
    }

    $scope.reply = function(){
        $http.post('/api/learn/ask-henry/questions/' + $scope.question.id + '/reply', [
            "question=" + $scope.question.question,
            "answer=" + $scope.question.answer,
            "category=" + $scope.question.category,
            "screen_name=" + $scope.question.twitter_screen_name,
            "status_id=" + $scope.question.twitter_post_id
        ].join('&')).
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                window.location = "/admin/ask-henry";
            } else {
                alert(data.message);
            }
        });  
    }
    

});


