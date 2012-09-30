var infoBubbleOpen = false;
var timeout = {};

setContainerBGImage();

jQuery(document).ready(function(){
   jQuery.validator.addMethod('noDefault', function (value, element) {
       if (element.value === element.defaultValue) {
          return false;
       }
       return true;
   }, 'This is not a valid value.');

   jQuery.validator.addMethod('noDefaultSel', function (value, element) {
       if (element.value === jQuery(element).find('option.default').text()) {
          return false;
       }
       return true;
   }, 'This is not a valid value.');

	jQuery.each(jQuery('.checkbox'), function() {
			$((jQuery(this).get(0)).parentNode).bind('click', function(event) {
				event.preventDefault();
				if ($(this).hasClass('on')) {
					$(this).removeClass('on');
					$(this).children('input').attr('checked',false);
				} else {
					$(this).addClass('on');
					$(this).children('input').attr('checked',true);
				}
			})
	});


    /**
     * THIS IS THE CODE FOR THE JOIN PAGE (http://beta.tapeplay.com/user/personal/)
     *
     * The dropdowns do not validate. birthYear is the example of the dropdown
     * that is not validating.
     */
   jQuery('.joinForm').validate(
       {
           rules: {
               email: {
                   email: true,
                   required: true
               },
               firstName: {
                   noDefault: true,
                   required: true
               },
               lastName: {
                   noDefault: true,
                   required: true
               },
               password: {
                   noDefault: true,
                   minlength: 8,
                   required: true
               },
               zipcode: {
                   required: true,
                   minlength: 5,
                   maxlength: 5
               },
               gender: {
                   noDefaultSel: true,
                   required: true
               },
               birthYear: {
                   noDefaultSel: true,
                   required: true
               }
           },
           errorPlacement: function() {
               return false;
           },
           unhighlight: function(element, errorClass) {
               jQuery(element).parentsUntil('.input-field').siblings('.error-alert').hide();
           },
           highlight: function(element, errorClass) {
               jQuery(element).parentsUntil('.input-field').siblings('.error-alert').show();
           }
       }
   );

    jQuery('.uploadForm').validate({
        rules: {
            title: {
                noDefault: true,
                required: true
            }
        },
        unhighlight: function(element, errorClass) {
            jQuery(element).parentsUntil('.input-field').siblings('.error-alert').hide();
        },
        highlight: function(element, errorClass) {
            jQuery(element).parentsUntil('.input-field').siblings('.error-alert').show();
        }
    });

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

    jQuery('#chosenSport').change(function() {
        console.log('the')

        jQuery('#sportChooser').submit();
    });

    jQuery('.special li').click(function() {
        var sportId = jQuery(this).children('.sportId').val();
        var label = jQuery(this).remove('input').html();

        jQuery('#sport_id').val(sportId);

        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.value').html(label);

        jQuery('.potentials').slideUp();
    });

    jQuery('.potentials li').click(function() {
        if(jQuery(event.target).parents('.potentials').hasClass('special')) {
            return;
        }

        var label = jQuery(this).remove('input').html();
        var value = jQuery(this).children('.value').val();

        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.value').html(label);
        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.dropVal').val(value);

        jQuery('.potentials').slideUp();
    });

    // jQuery('.checkbox').click(function(){
        // var showing = jQuery(this).attr('showing');
//
        // if(typeof(showing) === 'undefined') {
            // showing = 'false';
        // }
//
        // if(showing == 'false') {
            // jQuery(this).children('.box').children('.checkMark').show();
            // jQuery(this).children('.checkValue').val('true');
//
            // jQuery(this).children('input').attr('checked', true);
//
            // jQuery(this).attr('showing', 'true');
        // } else {
            // jQuery(this).children('.box').children('.checkMark').hide();
            // jQuery(this).children('.checkValue').val('');
//
            // jQuery(this).children('input').attr('checked', false);
//
            // jQuery(this).attr('showing', 'false');
        // }
    // });

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
//        clicked.children('.arrow').toggleClass('down').toggleClass('up');
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

    jQuery('.userEdit').click(function() {
            var _this = jQuery(this);

            var inputs = _this.siblings('.accountInfo').find('input');

            var inputField = jQuery(this).siblings('.accountInfo').children('.inputField');
            var dropDown = jQuery(this).siblings('.accountInfo').children('.sportSelect');
            var p = jQuery(this).siblings('.accountInfo').children('p');

            var keys = [];
            var post = {};

            inputField.toggleClass('hidden');
            dropDown.toggleClass('hidden');
            p.toggleClass('hidden');

            if(inputField.hasClass('hidden')) {
                jQuery(inputs).each(function(i) {
                    var key = {};

                    key.name = jQuery(this).attr('id');
                    key.value = jQuery(this).val();

                    keys[i] = (key);
                });

                post.hash = jQuery('#hash').val();
                post.data = keys;
                jQuery.post(
                    '/ajax/userupdate/',
                    post,
                    function(data) {
                        if(data == 200) {
                            var newValue = '';

                            for(var i in keys) {
                                newValue += (i < (keys.length - 1)) ? keys[i].value + " " : keys[i].value;
                            }

                            _this.siblings('.accountInfo').children('p').html(newValue);

                            _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Edit');

                            _this.parents('.chunk').children('.status').removeClass('hidden').show();

                            setTimeout(
                                function() {
                                    _this.parents('.chunk').children('.status').fadeOut();
                                },
                                2000
                            );
                        } else {

                        }
                    }
                );
            } else {
                _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Done');
            }
        });

    jQuery('.playerEdit').click(function() {
        var _this = jQuery(this);

        var inputs = _this.siblings('.accountInfo').find('input');

        var inputField = jQuery(this).siblings('.accountInfo').children('.inputField');
        var dropDown = jQuery(this).siblings('.accountInfo').children('.sportSelect');
        var p = jQuery(this).siblings('.accountInfo').children('p');

        var keys = [];
        var post = {};

        inputField.toggleClass('hidden');
        dropDown.toggleClass('hidden');
        p.toggleClass('hidden');

        console.log(inputField.hasClass('hidden'))

        if(inputField.hasClass('hidden')) {
            jQuery(inputs).each(function(i) {
                var key = {};

                if(jQuery(this).val() != '' && jQuery(this).val() != 'true' && typeof(jQuery(this)) !== 'undefined') {
                    key.name = jQuery(this).attr('id');
                    key.value = jQuery(this).val();

                    keys[i] = (key);
                }
            });

            post.hash = jQuery('#hash').val();
            post.data = keys;

            jQuery.post(
                '/ajax/profileupdate/',
                post,
                function(data) {
                    if(data == 200) {
                        var newValue = '';

                        for(var i in keys) {
                            newValue += (i < (keys.length - 1)) ? keys[i].value + " " : keys[i].value;
                        }

                        _this.siblings('.accountInfo').children('p').html(newValue);

                        _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Edit');

                        _this.parents('.chunk').children('.status').removeClass('hidden').show();

                        setTimeout(
                            function() {
                                _this.parents('.chunk').children('.status').fadeOut();
                            },
                            2000
                        );
                    } else {

                    }
                }
            );
        } else {
            _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Done');
        }
    });

    jQuery('#statButton').click(function() {
        var _this = jQuery(this);

        var keys = [];
        var post = {};

        var statHidden = _this.siblings('.accountInfo').children('#statistics').children('#stats').children('li').children('.statHidden');
        var stats = _this.siblings('.accountInfo').children('#statistics').children('#stats').children('li').children('.stat');

        if(stats.first().hasClass('hidden')) {
            var inputs = statHidden.children('.inputFieldSmall').children('.middle').children('input');

            jQuery(inputs).each(function(i) {
                var key = {};

                key.name = jQuery(this).attr('name');
                key.value = jQuery(this).val();

                keys[i] = (key);

                jQuery(this).parents('.statHidden').prev('.stat').children('p').children('span').html(key.value);
            });

            post.hash = jQuery('#hash').val();
            post.data = keys;
            post.player = jQuery('#user-id').val();

            jQuery.post(
                '/ajax/updatestats/',
                post,
                function(data) {
                    stats.toggleClass('hidden');
                    statHidden.toggleClass('hidden');
                    _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Edit');
                }
            );
        } else {
            stats.toggleClass('hidden');
            statHidden.toggleClass('hidden');

            _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Done');
        }
    });

    jQuery('.schoolEdit').click(function() {
        var _this = jQuery(this);

        var inputField = jQuery(this).siblings('.accountInfo').children('.inputField');
        var dropDown = jQuery(this).siblings('.accountInfo').children('.sportSelect');
        var p = jQuery(this).siblings('.accountInfo').children('p');

        inputField.toggleClass('hidden');
        dropDown.toggleClass('hidden');
        p.toggleClass('hidden');

        if(inputField.hasClass('hidden')) {
            var schoolId = _this.siblings('.accountInfo').children('.inputField').children('.middle').children('.passer').val();
            var schoolName = _this.siblings('.accountInfo').children('.inputField').children('.middle').children('#schoolSearchInput').val();

            jQuery.post(
                '/ajax/schoolupdate/',
                {
                    hash: jQuery('#hash').val(),
                    member: _this.attr('id'),
                    value: schoolId
                },
                function(data) {
                    console.log(data)
                    if(data == 200) {
                        console.log(schoolName);
                        _this.siblings('.accountInfo').children('p').html(schoolName);

                        _this.parents('.chunk').children('.bigButton').children('.middle').children('.edit').html('Edit');

                        _this.parents('.chunk').children('.status').removeClass('hidden');

                        setTimeout(
                            function() {
                                _this.parents('.chunk').children('.status').fadeOut();
                            },
                            2000
                        );
                    } else {

                    }
                }
            );

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
            jQuery('.infoBubble').fadeOut();
        }
    );

    // Get window width for size
    var windowWidth = jQuery(window).width();
    var adWidth = windowWidth - 1010;

    jQuery('#ad').width(adWidth);

//    jQuery("input:text").each(function () {
//        var v = this.value;
//
//        jQuery(this).blur(function () {
//            // if input is empty, reset value to default
//            if (this.value.length == 0) {
//                this.value = v;
//                jQuery(this).css('color', '#b2b2b2');
//            }
//        })
//        .focus(function () {
//            // when input is focused, clear its contents
//            this.value = "";
//            jQuery(this).css('color', '#333333');
//        });
//    });

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

    if(jQuery('.heightSlider').length > 0) {
        jQuery('.heightSlider').slider({
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
                }, 3000);
            }
        );
    });

    jQuery('#removeVideo').click(function() {
        var _this = jQuery(this);

        jQuery.post(
            '/ajax/removevideo/',
            {
                hash: jQuery('#hash').val(),
                user: jQuery('#user-id').val(),
                video: _this.next(jQuery('#video-id')).val()
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
                }, 3000);
            }
        );
    });

    jQuery('#report').click(function() {
        var _this = jQuery(this);

        jQuery.post(
            '/ajax/report/',
            {
                hash: jQuery('#hash').val(),
                video: jQuery('#video-id').val()
            },
            function(data) {
                var text = '';

                text = data;

                _this.parents('.infoBubble').children('.middle').children('p').html(text);

                setTimeout(function(){
                    _this.parents('.infoBubble').fadeOut();
                }, 3000);
            }
        );
    });

    jQuery('.close').click(function() {
        jQuery('.infoBubble').fadeOut();
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
                    console.log(data);
                    return;

                    response( jQuery.map( eval(data), function( item ) {
                        return {
                            label: item.name,
                            id: item.id
                        }
                    }));

                    var position = jQuery('#schoolSearchInput').parents('.inputField').position();

                    var left = position.left;
                    var top = position.top;
                    var height = jQuery('#schoolSearchInput').parents('.inputField').height();
                    var width = jQuery('#schoolSearchInput').parents('.inputField').width();

                    jQuery('.ui-autocomplete').css(
                        {
                            'border': '1px solid #ccc',
                            'border-top': 'none',
                            'top': top + height,
                            'left': left,
                            'width': width + 'px'
                        }
                    );
                }
            );
        },
        select: function(event, ui) {

            jQuery(this).html(ui.item.label);
            jQuery(this).siblings('.passer').val(ui.item.id);
        }
    });

    jQuery('.addAnother').click(function() {
        var _this = jQuery(this).siblings('.copy').first();

        _this.after(_this.clone());
    });

    // jQuery('.pws').focus(function() {
        // jQuery(this).siblings('input[type="password"]').removeClass('hidden').focus();
        // jQuery(this).remove();
    // });
    jQuery(".input_password").bind('click focus blur', function(event) {
    	if ($(this).attr("type") == "text") {
    		($(this).get(0)).type = 'password';
    	}

        if (event.type == "blur" && (($(this).get(0)).value == "" || ($(this).get(0)).value == ($(this).get(0)).defaultValue)) {
    		($(this).get(0)).type = "text";
    	}
    });

    jQuery("input[type=text]").bind('click focus blur', function(event) {
    	if (event.type == "blur" && (($(this).get(0)).value == "" || ($(this).get(0)).value == ($(this).get(0)).defaultValue)) {
            jQuery(this).css('color', '#B2B2B2');
    		($(this).get(0)).value = ($(this).get(0)).defaultValue;
    	} else if(event.type == "focus" && ($(this).get(0)).defaultValue == ($(this).get(0)).value) {
            jQuery(this).css('color', '#000');
            ($(this).get(0)).value = '';
        }
    });
});

function openBubble(obj) {
    var thePosition = {top: 0, left: 0};

    if(infoBubbleOpen === true) {
        jQuery('.infoBubble').hide();
    }

    var position = obj.position();

    var bubble = obj.children('.infoBubble');

    var bubbleWidth = bubble.width();
    var bubbleHeight = bubble.outerHeight();
    var thisHeight = obj.height();
    var thisWidth = obj.width();

    if(obj.hasClass('leftShift')) {
        thePosition.left = position.left - bubbleWidth;
    } else if(obj.hasClass('rightShift')) {

    } else {
        thePosition.left = position.left - (bubbleWidth * .5) + (thisWidth * .5);
    }

//    thePosition.top = position.top + thisHeight + 12;

    /**
     * @TODO: Positioning;
     */
    if(bubble.hasClass('above')) {
        thePosition.top = obj.parents().next().height() / 2;
    } else {
        thePosition.top = position.top + thisHeight + 12;
    }

    if(bubble.hasClass('above')) {
        thePosition.top = obj.offset().top - bubbleHeight - 12;
    } else {
        thePosition.top = position.top + thisHeight + 12;
    }

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

function setContainerBGImage()
{
	// set ad size based on browser width
	var browserWidth = $(window).width();
	var imageSize = "";

	switch (true)
	{
		case browserWidth >= 1600:
			imageSize = 1600;
			break;
		case browserWidth >= 1440:
			imageSize = 1440;
			break;
		case browserWidth >= 1366:
			imageSize = 1366;
			break;
		default:
			imageSize = 1280;
			break;
	}

	// create image name
	var bgName = "hp_betaAd_background_" + imageSize.toString() + ".jpg";
	$("#container").css("background-image", "url(/media/images/ads/" + imageSize);
}
