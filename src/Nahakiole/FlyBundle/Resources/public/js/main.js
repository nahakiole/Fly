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

    jQuery('.btn-group-distribution .btn').click(function () {
        jQuery('.distribution').val(jQuery(this).val());
    });


    jQuery(".filter").keyup(function () {
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
        // Loop through the comment list
        $(".packages > .list-group").each(function () {

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

    var $collectionHolder;

    // setup an "add a tag" link
    var $addTagLink = jQuery('<a href="#" class="add_tag_link btn btn-primary col-lg-offset-2 top10">Add packet</a>');
    var $newLinkLi = jQuery('<li></li>').append($addTagLink);
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.packets');

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function () {
        addTagFormDeleteLink($(this));
    });


    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)

        addTagFormDeleteLink(addTagForm($collectionHolder, $newLinkLi));
    });


    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormA = $('<a href="#" class="btn btn-danger col-lg-offset-2 top10">Remove packet</a>');
        $tagFormLi.append($removeFormA);

        $removeFormA.on('click', function (e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);

        return $newFormLi;
    }


});

