var App = App || angular.module('omeApp', []),
    OME = OME || {};

OME.weeksLength = 20;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.weeks = OME.weeks || [];
    while($scope.weeks.length < OME.weeksLength){
        $scope.weeks.push({'week':'', 'enable':''});
    }

    $scope.init = function() {
       
    }

    $scope.savePopQuizWeeks = function() {
        var i, w, jsonWeeksEnable = [];

        /*switch(lang){
            case 'en': $scope.trailers = $scope.trailerEn; break;   
            case 'ms': $scope.trailers = $scope.trailerMs; break;   
        }*/
        
        //clean
        //call ajax to save the weeksEnable
        for(i=0; i<$scope.weeks.length; i++) {
            w = $scope.weeks[i];
            if(w.week != '' || w.enable != '' ) {
                jsonWeeksEnable.push({"week":w.week,"enable":w.enable});

            }
        }
        
        //jsonWeeksEnable is ready
        var weeksEnable = angular.toJson(jsonWeeksEnable);
        console.log(weeksEnable);

        //PUT 
        $http.put('/api/enable/weeks', "week="+weeksEnable).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                
                alert('success');
            } else {
                alert(data.message);
            }
        });

    }

});