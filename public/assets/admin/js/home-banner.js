var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $scope.banners = [];

    $scope.init = function() {
        $scope.banners = OME.banners;
    }

    $scope.remove = function(bannerId) {

        if(!window.confirm('Confirm action?')){ return; }

        $http.delete('/api/home-banner/' + bannerId).success(function(data, status, headers, config) {
            if (data.status == 'success') {
                alert('success');
                location = "/admin/home-banner";
            } else {
                alert(data.message);
            }
        }); 
    }

});


