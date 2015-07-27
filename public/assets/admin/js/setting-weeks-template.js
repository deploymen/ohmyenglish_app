var App = App || angular.module('omeApp', []);

App.controller('MainController', function($scope, $http) {
    
    /*$scope.t1 = [];
*/
    $scope.init = function() {
        
    }

    $scope.saveChanges = function() {

        var answer, question, i, formData, completeRow, emptyRow;

        formData = [];
        for(i=1; i<=20; i++) {
            answerT1 = angular.element('.answerT1_' + i + ' input').val().trim();
            questionT1 = angular.element('.questionT1_' + i + ' input').val().trim();
/*            correctT2 = angular.element('.correctT2_' + i + ' input').val().trim();
            wrongT2 = angular.element('.wrongT2_' + i + ' input').val().trim();
            questionT3 = angular.element('.questionT3_' + i + ' input').val().trim();
            answerT3 = angular.element('.answerT3_' + i + ' input').val().trim();
            answerT4Set1 = angular.element('.answerT4Set1_' + i + ' input').val().trim();
            answerT4Set2 = angular.element('.answerT4Set2_' + i + ' input').val().trim();
            answerT4Set3 = angular.element('.answerT4Set3_' + i + ' input').val().trim();
            answerT4Set4 = angular.element('.answerT4Set4_' + i + ' input').val().trim();
            answerT4Set5 = angular.element('.answerT4Set5_' + i + ' input').val().trim();
            answerT4Set6 = angular.element('.answerT4Set6_' + i + ' input').val().trim();
            answerT4Set7 = angular.element('.answerT4Set7_' + i + ' input').val().trim();
            answerT4Set8 = angular.element('.answerT4Set8_' + i + ' input').val().trim();
            answerT4Set9 = angular.element('.answerT4Set9_' + i + ' input').val().trim();
            answerT4Set10 = angular.element('.answerT4Set10_' + i + ' input').val().trim();
            answerT5 = angular.element('.answerT5_' + i + ' input').val().trim();
            wrongT6 = angular.element('.wrongT6_' + i + ' input').val().trim();
            correctT6 = angular.element('.correctT6_' + i + ' input').val().trim();
*/
            emptyRow = (answerT1 == "") && (questionT1 == "");
            completeRow = (answerT1 != "") && (questionT1 != "");

            if (!emptyRow && !completeRow) {
                alert('Please do not submit half complete row.');
                return;
            }

            /*if(completeRow){
                formData.push({
                    "answerT1" : answerT1,
                    "questionT1" : questionT1,
                });
            }*/
        }
        
        /*if(!window.confirm('Confirm action?')){ return; }

        $http.put('/api/currency-rate', formData, {}).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                
                alert('success');
            } else {
                alert(data.message);
            }
        });*/

    }

});