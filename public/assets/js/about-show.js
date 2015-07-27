var OME = OME || {};

/* event handler */
$( document ).ready(function() {
    $('.btn_character a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtShow_meetTheChar_action, OME.trackCopy.abtShow_meetTheChar_label, 'userAction');
    });

    $('.btn_trailer a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtShow_viewTrailer_action, OME.trackCopy.abtShow_viewTrailer_label, 'userAction');
    });                             
});