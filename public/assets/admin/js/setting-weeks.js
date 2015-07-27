var App = App || angular.module('omeApp', []);

App.controller('MainController', function($scope, $http) {

    $scope.init = function() {
        
    }

    $scope.save = function() {
        
        var radio = angular.element(".form-group input[name='radio-btn']:checked").val(),
            title = angular.element(".title input").val(),
            video_id = angular.element(".video_id input").val(),
            description = angular.element(".description input").val(),
            url_trail = angular.element(".url_trail input").val();
        alert(radio + " " + title + " " +  video_id + " " +  description + " " +  url_trail);

        /*$http.post('/api/admin/sign-in', {
            'username': username,
            'password': password

        }).success(function(data, status, headers, config) {
            if (data.status == 'success') {

                location = "/admin";
            } else {
                
                console.log(data.message);
            }
        });*/

    }

});