var OME = OME || {};
OME.trackPush = function(dataLayer, category, action, label, evt, env){
	
	//alert([category, action, label, evt].join(','));
	console.log([category, action, label, evt]);
	dataLayer.push({'eventCategory':category, 'eventAction':action, 'eventLabel':label});
	dataLayer.push({'event':evt});
}

//for home
/*$( document ).ready(function() {
    $('#nav .menu .home a').click(function(){ });
});
*/




