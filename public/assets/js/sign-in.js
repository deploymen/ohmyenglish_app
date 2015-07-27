var App = App || angular.module('omeApp', []);

App.controller('MainController', function($scope, $http) {

    $scope.signIn = function() {
        
        var username = angular.element(".username input").val(),
            password = angular.element(".password input").val();

        if (username == '' || password == '') {
            alert('Please enter both username & password to sign in.');
            return;
        }

        $http.post('/api/admin/sign-in', {
            'username': username,
            'password': password

        }).success(function(data, status, headers, config) {
            if (data.status == 'success') {

                location = "/admin";
            } else {
                
                console.log(data.message);
            }
        });

    }

});