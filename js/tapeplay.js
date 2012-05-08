jQuery(document).ready(function(){
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

    var height = jQuery('#main').outerHeight();
    if(jQuery('#ad').height() < height) {
        console.log(height + ' is the height');
        jQuery('#ad').height(height);
    }

    jQuery('.infoOpen').hover(
        function() {
            /*var position = jQuery(this).position();
            var height = jQuery(this).height();
            var width = jQuery(this).width();

            console.log('postion: ' + position.top + ' ' + position.left + '; height: ' + height + '; width: ' + width);

            jQuery(this).next('.infoBubble').css('top', (position.top + height + 15)).css('left', (position.left)).show();*/

            jQuery(this).next('.infoBubble').show();
        },
        function() {
            var _this = jQuery(this);

            jQuery(document).click(function() {
                console.log('HERE')
                _this.next('.infoBubble').fadeOut();
            });
        }
    );
});