jQuery(function(){
    jQuery('.btn-add-software').click(function(event){
        event.preventDefault();
        if(jQuery(this).hasClass('btn-software-added')){
            jQuery(this).removeClass('btn-software-added');
            jQuery(this).html('Add');

        }
        else {
            jQuery(this).addClass('btn-software-added');
            jQuery(this).html('Added');
        }
    });

    jQuery('.start-building').click(function(){
        jQuery('html, body').animate({
            scrollTop: jQuery(".container-hero").offset().top
        }, 1337, 'easeInOutExpo');
    });

    var packagesContainer = jQuery('.packages');
// initialize
    packagesContainer.masonry({
        itemSelector: '.col-sm-6'
    });


});