var OME = OME || {};

/* event handler */
$( document ).ready(function() {
    $('.reveal-char-info a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtInner_clickToReveal_action, OME.trackCopy.abtInner_clickToReveal_label, 'userAction');
    });

    $('.btn_trailer a.cta').click(function(){ 
        OME.trackPush(dataLayer, OME.trackCopy.category, OME.trackCopy.abtInner_viewTrailer_action, OME.trackCopy.abtInner_viewTrailer_label, 'userAction');
    });                             
});