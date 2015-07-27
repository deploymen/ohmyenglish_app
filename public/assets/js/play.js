

$(function(){
    bindPlayListEvt();
});


/* playList slider*/
/* evt handling */
function bindPlayListEvt(){
    bindSlider('#playSlider', '#btn-plist-prev', '#btn-plist-next', 350, 0, null, null, false, true);
    var currentItem = $('#playSlider .currentItem').val();
    //var activeItem = $('#playSlider').find('li');

    //set default 1st item active
    //$('#playSlider ul').children().eq(currentItem-1).children(".btnZm").addClass('active');

    $('#btn-plist-prev, #btn-plist-next').click(function(e){
        e.preventDefault();
        //console.log($(this).next().val();)
    });

    $('#btn-plist-prev').click(function(e){
        e.preventDefault();
        var currentItem = $('#playSlider .currentItem').val();
    });
    $('#btn-plist-next').click(function(e){
        e.preventDefault();
        var currentItem = $('#playSlider .currentItem').val();
    });

}

