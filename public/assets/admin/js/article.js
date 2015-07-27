var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $scope.articles = [];

    $scope.init = function() {
        $scope.articles = OME.articles;
    }

    $scope.remove = function(articleId) {

        if(!window.confirm('Confirm action?')){ return; }

        $http.delete('/api/articles/' + articleId).success(function(data, status, headers, config) {
            if (data.status == 'success') {
                alert('success');
                location = "/admin/articles";
            } else {
                alert(data.message);
            }
        }); 
    }

});


