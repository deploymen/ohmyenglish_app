var App = App || angular.module('omeApp', ['ngSanitize']);
var OME = OME || {};

App.controller('ArticleController', function ($scope, $http, $timeout){
    $scope.articles = [];
    $scope.articlesPaginate = {};


    $scope.init = function(){
        $scope.fetchArticles(1);
    }

    $scope.fetchArticles = function(page){
        $http.get('/api/articles/list?page=' + page).
        success(function(data, status, headers, config) {
            if (data.status == 'success') {
                var i, d;
                for(i=0; i<data.data.articles.data.length; i++){
                    d = data.data.articles.data[i];
                    $scope.articles.push(d);
                }
                $scope.articlesPaginate = data.data.articles;
                //delete $scope.articlesPaginate.data; 
                
                console.log(data.data);
                console.log($scope.articles);
                console.log($scope.articlesPaginate);
            } else {
                alert(data.message);
            }
        });     
    }

    $scope.loadMore = function(){
        $scope.fetchArticles($scope.articlesPaginate.current_page + 1);    
    }

});

App.filter('cmdate', [
    '$filter', function($filter) {
        return function(input, format) {
            return $filter('date')(new Date(input), format);
        };
    }
]);
$(function(){
    bindSlider('#articleSlider', '#btn-list-prev', '#btn-list-next', 350, 0, null, null, false, true);
});