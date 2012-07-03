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
        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.value').html(jQuery(this).html());

        jQuery('.potentials').slideUp();
    });

    jQuery('.checkbox').click(function(){
        var showing = jQuery(this).attr('showing');

        console.log(showing );

        if(typeof(showing) === 'undefined') {
            showing = 'false';
        }

        if(showing == 'false') {
            jQuery(this).children('.box').children('.checkMark').show();

            jQuery(this).attr('showing', 'true');
        } else {
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
        var clicked = jQuery(this);

        jQuery(this).next().slideToggle('slow', function() {
            var curText = clicked.children('p').children('.collapse').html();

            curText = (curText == 'Collapse') ? 'Expand' : 'Collapse';

            clicked.children('p').children('.collapse').html(curText);
        });

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
            jQuery('#ad').height(height);
        }
    } else if(jQuery('#landing').length > 0) {
        var height = jQuery('#landing').outerHeight();
        if(jQuery('#ad').height() < height) {
            jQuery('#ad').height(height);
        }
    }

    jQuery('.infoOpen').hover(
        function() {
            var thePosition = 0;

            if(infoBubbleOpen === true) {
                jQuery('.infoBubble').fadeOut();
            }

            var position = jQuery(this).position();

            var bubble = jQuery(this).next('.infoBubble');
            var bubbleWidth = bubble.width();
            var thisHeight = jQuery(this).height();
            var thisWidth = jQuery(this).width();

            if(jQuery(this).hasClass('leftShift')) {
                thePosition = position.left - bubbleWidth;
            } else if(jQuery(this).hasClass('rightShift')) {

            } else {
                thePosition = position.left - (bubbleWidth * .5) + (thisWidth * .5);
            }

            bubble
                    .css('left', thePosition)
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

    // Get window width for size
    var windowWidth = jQuery(window).width();
    var adWidth = windowWidth - 1010;

    jQuery('#ad').width(adWidth);

    jQuery("input:text").each(function () {
        var v = this.value;

        jQuery(this).blur(function () {
            // if input is empty, reset value to default
            if (this.value.length == 0) {
                this.value = v;
                jQuery(this).css('color', '#b2b2b2');
            }
        })
        .focus(function () {
            // when input is focused, clear its contents
            this.value = "";
            jQuery(this).css('color', '#333333');
        });
    });

    jQuery('.plusCircle').click(function() {

    });

    jQuery('.x').click(function() {
        jQuery(this).html('');
        jQuery(this).siblings('.showing').removeClass('showing');
    });

    jQuery('.option .value').click(function() {
        if(jQuery(this).hasClass('showing')) {
            jQuery(this).prev('.x').html('');
            jQuery(this).removeClass('showing');
        } else {
            jQuery(this).prev('.x').html('x');
            jQuery(this).addClass('showing');
        }
    });

    jQuery('.height').slider({
        min: 55,
        max: 95,
        range: true,
        step: 1,
        values: [55, 95],
        slide: function() {
//            jQuery(this).siblings('.')
        }
    });
});