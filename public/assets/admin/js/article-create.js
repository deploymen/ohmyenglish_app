var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $scope.article = {};

    $scope.submitArticle = function() {
        alert($scope.article.title);
    }



});


