var App = App || angular.module('omeApp'),
    OME = OME || {};

OME.trailerDetailLength = 20;

App.controller('MainController', function($scope, $http) {

    $http.defaults.headers.put["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.trailers = [];
    $scope.trailerEn = OME.trailerEn || [];
    while($scope.trailerEn.length < OME.trailerDetailLength){
        $scope.trailerEn.push({'week':'', 'movideo_id':'', 'url_name':'', 'show_time':'', 'meta_title':'', 'meta_desc':'', 'title':'', 'desc':'', 'share_title':'', 'share_desc':'', 'enable':''});
    }
    $scope.trailerMs = OME.trailerMs || [];
    while($scope.trailerMs.length < OME.trailerDetailLength){
        $scope.trailerMs.push({'week':'', 'movideo_id':'', 'url_name':'', 'show_time':'', 'meta_title':'', 'meta_desc':'', 'title':'', 'desc':'', 'share_title':'', 'share_desc':'', 'enable':''});
    }

    $scope.init = function() {
  
    }

    $scope.saveTrailerDetail = function(lang) {
        var i, q, jsonTrailerDetail = [];

        switch(lang){
			case 'en': $scope.trailers = $scope.trailerEn; break;  	
			case 'ms': $scope.trailers = $scope.trailerMs; break;  	
		}

        //clean
        //call ajax to save the trailerDetail
        for(i=0; i<$scope.trailers.length; i++) {
            q = $scope.trailers[i];
            if(q.id != '' || q.week != '' || q.movideo_id != '' || q.url_name != '' || q.show_time != '' || q.meta_title != '' || q.meta_desc != '' || q.title != '' || q.desc != '' || q.share_title != '' || q.share_desc != '' || q.enable != '' ) {
                jsonTrailerDetail.push({"language":lang,"id":q.id,"week":q.week,"movideo_id":q.movideo_id,"url_name":q.url_name,"show_time":q.show_time,"meta_title":q.meta_title,"meta_desc":q.meta_desc,"title":q.title,"desc":q.desc,"share_title":q.share_title,"share_desc":q.share_desc,"enable":q.enable});

            }
        }
        console.log(jsonTrailerDetail);

        //jsonTrailerDetail is ready
        //alert(angular.toJson(jsonTrailerDetail));
        var trailerDetail = angular.toJson(jsonTrailerDetail);

        //PUT 
        $http.put('/api/admin/video-trailer', "video_trailer="+trailerDetail).
        success(function(data, status, headers, config) {

            if (data.status == 'success') {
                
                alert('success');
            } else {
                alert(data.message);
            }
        });

    }

});
