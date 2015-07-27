var App = App || angular.module('omeApp', []);

App.controller('GlobalController', function ($scope, $http){
    
	$scope.signout = function(){

        $http.post('/api/admin/sign-out', {}).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                
                location = "/admin/sign-in";
            } else {
                
                alert(data.message);
            }
        });
    }
    

});

App.controller('MainController', function ($scope, $http){


});
