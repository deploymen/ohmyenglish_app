var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};

App.controller('ArticleController', function ($scope, $http, $timeout){
    $scope.init = function(){
        $scope.articlesMayLike = OME.articlesMayLike;
    }


});