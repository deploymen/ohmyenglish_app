var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.questionLength = 10;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.questions = [];
    $scope.status = 'pending';
    $scope.page = 1;
    $scope.pages = [];
    $scope.ddStatuses = [{
        "id": "pending", "name": "Pending"
    },{
        "id": "approved", "name": "Reply & Approve"
    },{
        "id": "rejected", "name": "Reject"
    }];

    $scope.ddStatusesSeleted = $scope.ddStatuses[0];

    $scope.init = function() {
        $scope.fetchQuestions('pending', 1);
    }

    $scope.switchStatus = function(){
        $scope.status = $scope.ddStatusesSeleted.id;
        $scope.fetchQuestions($scope.status, 1);
    }

    $scope.fetchQuestions = function(status, page){
        status = status || $scope.status;
        page = page || $scope.page;
        $scope.status = status;
        $scope.page = page;

        $http.get('/api/learn/ask-henry?page=' + page + '&status=' + status).
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                var i;
                $scope.paginate = data.data.questions;
                $scope.questions = data.data.questions.data;
                $scope.pages = [];
                for(i=0; i<data.data.questions.last_page; i++){
                    $scope.pages.push(i+1);
                }

            } else {
                alert(data.message);
            }
        });        
    }

    $scope.pending = function(question){
        if(!window.confirm("Confirm pending: " + question.question)){ return; }

        $http.put('/api/learn/ask-henry/questions/' + question.id, "status=pending").
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                window.location.reload();
            } else {
                alert(data.message);
            }
        });  
    }

    $scope.reply = function(question){
        window.location = 'ask-henry/reply/questions/' + question.id;
    }

    $scope.reject = function(question){
        if(!window.confirm("Confirm reject: " + question.question)){ return; }


        $http.put('/api/learn/ask-henry/questions/' + question.id, "status=rejected").
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                window.location.reload();
            } else {
                alert(data.message);
            }
        }); 
    }        



});


