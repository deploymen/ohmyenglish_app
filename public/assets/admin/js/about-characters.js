var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $scope.charactersEn = [];
    $scope.charactersMs = [];

    $scope.init = function() {
        $scope.charactersEn = OME.charactersEn;
        $scope.charactersMs = OME.charactersMs;
    }

});


