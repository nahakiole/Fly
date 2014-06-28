jQuery(function () {
    var checkbox;
    jQuery('.btn-add-software').click(function (event) {
        event.preventDefault();
        checkbox = jQuery(this).find('.application-checkbox');
        checkbox.prop("checked", !checkbox.prop("checked"));

        console.log(checkbox.prop("checked"));
        if (jQuery(this).hasClass('btn-software-added')) {
            jQuery(this).removeClass('btn-software-added');
            jQuery(this).find('.action').html('Add');

        }
        else {
            jQuery(this).addClass('btn-software-added');
            jQuery(this).find('.action').html('Added');
        }

        jQuery('.count-packages').html(jQuery(".application-checkbox:checked").length);

    });

    jQuery('.start-building').click(function () {
        jQuery('html, body').animate({
            scrollTop: jQuery(".container-hero").offset().top + 20
        }, 1337, 'easeOutQuint');
    });


    jQuery(".filter").keyup(function () {
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
        // Loop through the comment list
        $(".packages > .list-group").each(function(){

            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).fadeIn();
                count++;
            }
        });
    });


});

