var infoBubbleOpen = false;
var timeout = {};

jQuery(document).ready(function(){
    var showing = false;

    jQuery('#arrow').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('#sportSelect').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('.arrowSmall').click(function(){
        jQuery(this).siblings('.dropper').children('.potentials').slideDown();
    });

    jQuery('#potentials li').click(function() {
        var sportId = jQuery(this).children('.sportId').val();
        var form = jQuery('#sportChooser');

        form.children('#chosenSport').val(sportId);

        form.submit();
    });

    jQuery('.potentials li').click(function() {
        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.value').html(jQuery(this).html());
        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.dropVal').val(jQuery(this).html());

        jQuery('.potentials').slideUp();
    });

    jQuery('.checkbox').click(function(){
        var showing = jQuery(this).attr('showing');

        if(typeof(showing) === 'undefined') {
            showing = 'false';
        }

        if(showing == 'false') {
            jQuery(this).children('.box').children('.checkMark').show();
//            jQuery(this).children('.checkValue').val('true');

            jQuery(this).children('input').attr('checked', true);

            jQuery(this).attr('showing', 'true');
        } else {
            jQuery(this).children('.box').children('.checkMark').hide();
            jQuery(this).children('.checkValue').val('');

            jQuery(this).children('input').attr('checked', false);

            jQuery(this).attr('showing', 'false');
        }
    });

    if(jQuery('.slider').length > 0) {
        jQuery('.slider').slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
        });
    }

    jQuery('#password').blur(function(){
        if(jQuery(this).val() === '') {
            jQuery(this).attr('type', '').val('Password');
        }
    });

//    jQuery('.accordion .header').click(function() {
//        var clicked = jQuery(this);
//
//        jQuery(this).next().slideToggle('slow', function() {
//            var curText = clicked.children('p').children('.collapse').html();
//
//            curText = (curText == 'Collapse') ? 'Expand' : 'Collapse';
//
//            clicked.children('p').children('.collapse').html(curText);
//        });
//
//        return false;
//    }).next().hide();

    jQuery('.formEdit').click(function() {
        var inputField = jQuery(this).siblings('.accountInfo').children('.inputField');
        var dropDown = jQuery(this).siblings('.accountInfo').children('.sportSelect');
        var p = jQuery(this).siblings('.accountInfo').children('p')

        inputField.toggleClass('hidden');
        dropDown.toggleClass('hidden');
        p.toggleClass('hidden');

        if(inputField.hasClass('hidden')) {
//            jQuery.post(
//                '/ajax/profileupdate',
//                {
//                    member: jQuery(this).attr('id'),
//                    value: jQuery(this).siblings('.accountInfo')
//                },
//                function() {
//
//                }
//            );
            jQuery(this).parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Edit');
//            jQuery(this).parents('.chunk').children('.bigButton').removeClass('formEdit');
        } else {
            jQuery(this).parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Done');
//            jQuery(this).parents('.chunk').children('.bigButton').addClass('formEdit');
        }
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
            openBubble(jQuery(this));
        },
        function() {
            var _this = jQuery(this);

            jQuery(document).click(function() {
                _this.next('.infoBubble').fadeOut();
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

    if(jQuery('.height').length > 0) {
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
    }

    jQuery('#save').click(function() {
        var _this = jQuery(this);

        jQuery.post(
            '/ajax/save/',
            {
                hash: jQuery('#hash').val(),
                user: jQuery('#user-id').val(),
                video: jQuery('#video-id').val()
            },
            function(data) {
                var text = '';

                if(data.response == '') {
                    text = _this.siblings('.infoBubble').children('.middle').children('p').html();
                } else {
                    text = data;
                }

                _this.siblings('.infoBubble').children('.middle').children('p').html(text);

                openBubble(_this);

                setTimeout(function(){
                    _this.siblings('.infoBubble').fadeOut();
                }, 1500);
            }
        );
    });

    jQuery('#schoolSearchInput').autocomplete({
        source: function( request, response ) {
            jQuery.post(
                "/ajax/schools/",
                {
                    hash: jQuery('#hash').val(),
                    schoolName: jQuery('#schoolSearchInput').val()
                },
                function( data ) {
                    response( jQuery.map( eval(data), function( item ) {
                        return {
                            label: item.name,
                            id: item.id
                        }
                    }));

                    jQuery('.ui-autocomplete').css(
                        {
                            'border': '1px solid #ccc',
                            'border-top': 'none',
                            'top': '1178px',
                            'left': '70px',
                            'width': '454px'
                        }
                    );
                }
            );
        },
        select: function(event, ui) {

            jQuery(this).html(ui.item.label);
            jQuery('#newSchool').val(ui.item.id);
        }
    });
});

function openBubble(obj) {
    var thePosition = {top: 0, left: 0};

    if(infoBubbleOpen === true) {
        jQuery('.infoBubble').hide();
    }

    var position = obj.position();

    var bubble = obj.next('.infoBubble');
    var bubbleWidth = bubble.width();
    var thisHeight = obj.height();
    var thisWidth = obj.width();

    if(obj.hasClass('leftShift')) {
        thePosition.left = position.left - bubbleWidth;
    } else if(obj.hasClass('rightShift')) {

    } else {
        thePosition.left = position.left - (bubbleWidth * .5) + (thisWidth * .5);
    }

    thePosition.top = position.top + thisHeight + 12;

    /**
     * @TODO: Positioning;
     */
//    if(bubble.hasClass('topCentered')) {
//        thePosition.top = obj.parents().next().height() / 2;
//    } else {
//        thePosition.top = position.top + thisHeight + 12;
//    }
//
//    if(bubble.hasClass('topCentered')) {
//        thePosition.left = thisWidth / 2;
//    } else {
//        thePosition.top = position.top + thisHeight + 12;
//    }

    bubble
            .css('left', thePosition.left)
            .css('top', thePosition.top)
            .show();

    /**
     * @TODO: figure out good way to hide the bubble on mouseout
     */
//    bubble.mouseout(function() {
//       setTimeout(function() {
//           bubble.fadeOut();
//       }, 500);
//    });

    infoBubbleOpen = true;
}