var App = App || angular.module('omeApp', []);
var OME = OME || {};

App.controller('TrailerWeekListController', function ($scope, $http, $timeout){

    $scope.curWeek = 1;
    $scope.trailerAvailable = [];

    $scope.init = function(){
	    $scope.curWeek = OME.curWeek;
	    $scope.trailerAvailable = OME.trailerAvailable;
	    console.log($scope.trailerAvailable);
        $timeout(function(){
            bindSlider('#trailerSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);
        }, 1000)
    }
    $scope.trackClick = function(week){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtTrailer_episode_action, OME.trackCopy.abtTrailer_episode_label.replace('{episode}', week), 'userAction');
    }


});