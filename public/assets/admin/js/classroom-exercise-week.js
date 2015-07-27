var App = App || angular.module('omeApp', []);

App.controller('MainController', function($scope, $http) {

    $scope.init = function() {
        
    }

    $scope.save = function() {
        
        var radio = angular.element(".form-group input[name='radio-btn']:checked").val();
        alert(radio);

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