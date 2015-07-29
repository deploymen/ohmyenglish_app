var App = App || angular.module('omeApp', []);
var OME = OME || {};

$(document).ready(function() {
    
});

$(function(){ 

	$('.btn_quiz1').on('click touchstart', function(){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPersonalityQuiz_action, OME.trackCopy.learnPersonalityQuiz_firstQuestion_label, 'userAction');
    });

    $('.btn_quiz2').on('click touchstart', function(){
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.learnPersonalityQuiz_action, OME.trackCopy.learnPersonalityQuiz_firstQuestion_label, 'userAction');
    });

});