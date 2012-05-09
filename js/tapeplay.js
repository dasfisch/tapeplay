jQuery(document).ready(function(){
    var infoBubbleOpen = false;
    var showing = false;

    jQuery('#arrow').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('.arrowSmall').click(function(){
        jQuery(this).siblings('.dropper').children('.potentials').slideDown();
    });

    jQuery('.potentials li').click(function(){
        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middleMedium').children('.value').html(jQuery(this).html());

        jQuery('.potentials').slideUp();
    });

    jQuery('.checkbox').click(function(){
        var showing = jQuery(this).attr('showing');

        console.log(showing + " is showing outside " + typeof(showing));

        showing = typeof(showing) === 'undefined' ? 'false' : 'true';

        if(showing == 'false') {
            console.log(showing + " is showing in false")

            jQuery(this).children('.box').children('.checkMark').show();

            jQuery(this).attr('showing', 'true');
        } else {
            console.log(showing + " is showing in true")

            jQuery(this).children('.box').children('.checkMark').hide();

            jQuery(this).attr('showing', 'false');
        }
    });

    jQuery('.slider').slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 75, 300 ],
    });

    jQuery('#password').blur(function(){
        if(jQuery(this).val() === '') {
            jQuery(this).attr('type', '').val('Password');
        }
    });

    jQuery('.accordion .header').click(function() {
        jQuery(this).next().slideToggle('slow');

        return false;
    }).next().hide();

    jQuery('.edit').click(function() {
        var inputField = jQuery(this).parentsUntil('.chunk').siblings('.accountInfo').children('.inputField');
        var p = jQuery(this).parentsUntil('.chunk').siblings('.accountInfo').children('p')

        if(inputField.hasClass('hidden')) {
            jQuery(this).html('Done');
        } else {
            jQuery(this).html('Edit');
        }

        inputField.toggleClass('hidden');
        p.toggleClass('hidden');
    });

    if(jQuery('#main').length > 0) {
        var height = jQuery('#main').outerHeight();
        if(jQuery('#ad').height() < height) {
            console.log(height + ' is the height main');
            jQuery('#ad').height(height);
        }
    } else if(jQuery('#landing').length > 0) {
        var height = jQuery('#landing').outerHeight();
        if(jQuery('#ad').height() < height) {
            console.log(height + ' is the height ad');
            jQuery('#ad').height(height);
        }
    }

    jQuery('.infoOpen').hover(
        function() {
            if(infoBubbleOpen === true) {
                jQuery('.infoBubble').fadeOut();
            }

            var position = jQuery(this).position();

            var bubble = jQuery(this).next('.infoBubble');
            var bubbleWidth = bubble.width();
            var thisHeight = jQuery(this).height();
            var thisWidth = jQuery(this).width();

            console.log(thisHeight + " " + position.top);

            bubble
                    .css('left', position.left - (bubbleWidth * .5) + (thisWidth * .5))
                    .css('top', position.top + thisHeight + 12)
                    .show();

            infoBubbleOpen = true;
        },
        function() {
            var _this = jQuery(this);

            jQuery(document).click(function() {
                _this.next('.infoBubble').fadeOut();

                //infoBubbleOpen = false;
            });
        }
    );
});