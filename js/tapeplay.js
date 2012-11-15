var infoBubbleOpen = false;
var timeout = {};
var addThis = '';

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

    jQuery.validator.addMethod('checked', function (value, element) {
        return $(element).is(':checked');
    }, 'This is not a valid value.');

	jQuery.each(jQuery('.checkbox'), function() {
        $((jQuery(this).get(0)).parentNode).siblings('input[type=checkbox]').each(function(){
            var position = $((jQuery(this).get(0)).parentNode).children('label').children('.checkbox').position();

            jQuery(this).css('left', position.left);
            jQuery(this).css('position', 'absolute');
            jQuery(this).css('top', position.top);
        });

        $((jQuery(this).get(0)).parentNode).click(function(event) {
            event.preventDefault();

            if(jQuery(this).siblings('input[type=checkbox]').hasClass('single')) {
                jQuery('.single').removeAttr('checked');
                jQuery('.singleCheck').removeClass('on');
            }

            if ($(this).hasClass('on')) {
                $(this).siblings('input[type=checkbox]').removeAttr('checked');
            } else {
                $(this).siblings('input[type=checkbox]').prop('checked', 'checked');
            }

            $(this).toggleClass('on');
        });
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
                    required: true
                },
                lastName: {
                    required: true
                },
                password: {
                    noDefault: true,
                    minlength: 6,
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
                },
                theAgree: {
                    required: true
                }
            },
            messages: {
                zipcode: {
                    required: 'Enter valid 5-digit zip code.',
                    minlength: 'Enter valid 5-digit zip code.',
                    maxlenght: 'Enter valid 5-digit zip code.'
                },
                gender: {
                    noDefaultSel: 'Enter gender',
                    required: 'Enter gender'
                },
                birthYear: {
                    noDefaultSel: 'Enter birth year.',
                    required: 'Enter birth year.'
                }
            },
            errorPlacement: function(error, element) {
                return false;
            },
            unhighlight: function(element, errorClass) {
                if(jQuery(element).parentsUntil('.input-field').siblings('.error-alert').hasClass('shown')) {
                    jQuery(element).parentsUntil('.input-field').siblings('.error-alert').removeClass('shown');

                    if(jQuery(element).parentsUntil('.input-field').siblings('.error-alert').children('ul').children('li').html() == 'A user with this email already exists!') {
                        jQuery(element).parentsUntil('.input-field').siblings('.error-alert').children('ul').html('<li>Enter valid email address.</li><li>Example: abc@generic.com</li>');
                    }
                }

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
        errorPlacement: function() {
            return false;
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
        var id = jQuery(this).prop('id');

        _gaq.push(['_trackEvent', 'user-action', id]);

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

    jQuery('.userEdit').click(function() {
        var _this = jQuery(this);

        var dropDowns = _this.parentsUntil('li').children('.accountInfo').children('fieldset').children('select');
        var inputs = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center').children('input');

        var inputField = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center');
        var p = _this.parentsUntil('li').children('.category');

        var keys = [];
        var post = {};

        _this.parentsUntil('li').children('.accountInfo').toggleClass('hidden');
        p.toggleClass('hidden');

        if(_this.parentsUntil('li').children('.accountInfo').hasClass('hidden')) {
            inputs.each(function(i) {
                var key = {};

                key.name = jQuery(this).attr('id');
                key.value = jQuery(this).val();

                keys.push(key);
            });

            dropDowns.each(function(i) {
                var key = {};

                key.name = jQuery(this).attr('id');
                key.value = jQuery(this).val();

                keys.push(key);
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

                        if(inputs.attr('id') !== '_hash') {
                            p.html(newValue);
                        }

                        _this.children('span').html('Edit');

                        _gaq.push(['_trackEvent',
                              'user-action',           // The top-level name for your online content categories.  Required parameter.
                              _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                              'player-account-page'
                           ]);

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
            _this.children('span').html('Save');
        }
    });

    jQuery('.videoEdit').click(function() {
        var _this = jQuery(this);

        var videoForm = _this.parents('.btn-holder').siblings('.accountInfo');
        var videoInfo = _this.parents('.btn-holder').siblings('.videoInfo');

        var dropDowns = videoForm.children('fieldset').children('select');
        var inputs = videoForm.children('.input_custom-text').children('.custom-input_center').children('input');

        var keys = [];
        var post = {};
        var title = '';

        videoForm.toggleClass('hidden');
        videoInfo.toggleClass('hidden');

        if(videoForm.hasClass('hidden')) {
            inputs.each(function(i) {
                var key = {};

                key.name = jQuery(this).attr('id');
                key.value = jQuery(this).val();

                title = key.value;

                keys.push(key);
            });

            dropDowns.each(function(i) {
                var key = {};

                key.name = jQuery(this).attr('id');
                key.value = jQuery(this).val();

                keys.push(key);
            });

            post.hash = jQuery('#hash').val();
            post.data = keys;
            post.videoId = _this.parents('li').children('.video-id').val();

            jQuery.post(
                '/ajax/videoupdate/',
                post,
                function(data) {
                    if(data == 200) {
                        var newValue = '';

                        videoInfo.children('.title').html(title);

                        _gaq.push(['_trackEvent',
                              'user-action',           // The top-level name for your online content categories.  Required parameter.
                              _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                              'player-account-page'
                           ]);

                        _this.children('span').html('Edit');
                    } else {

                    }
                }
            );
        } else {
            _this.children('span').html('Save');
        }
    });

    jQuery('.playerEdit').click(function() {
        var _this = jQuery(this);

        var playerId = _this.parentsUntil('.parentHolder').siblings('.player-id').val();

        var dropDowns = _this.parentsUntil('.text-holder').siblings('.accountInfo').children('div').children('fieldset').children('select');

        var inputs = _this.parentsUntil('.text-holder').siblings('.accountInfo')
                        .children('div').children('fieldset')
                        .children('.input_custom-text').children('.custom-input_center').children('input');

        var checkboxes = _this.parentsUntil('.text-holder').siblings('.accountInfo')
                            .children('div').children('fieldset')
                            .children('ul').children('li').children('input[type=checkbox]');

        var inputField = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center');
        var p = _this.parentsUntil('li').children('.category');

        var extras = [];
        var keys = [];
        var post = {};

        _this.parentsUntil('li').children('.accountInfo').toggleClass('hidden');
        p.toggleClass('hidden');

        jQuery.each(checkboxes, function() {
            var position = $(this).siblings('label').children('.checkbox').position();

            jQuery(this).css('left', position.left);
            jQuery(this).css('position', 'absolute');
            jQuery(this).css('top', position.top);
        });

        if(_this.parentsUntil('li').children('.accountInfo').hasClass('hidden')) {
            checkboxes.each(function() {
                var key = {};
                var extra = {};

                if(jQuery(this).prop('checked') == true) {
                    var text = jQuery(this).siblings('label').children('.display').text();

                    extra.name = key.name = jQuery(this).attr('id');
                    extra.value = key.value = jQuery(this).val();
                    extra.type = key.type = 'checkbox';
                    extra.theText = text;

                    keys.push(key);
                    extras.push(extra);
                }
            });

            dropDowns.each(function() {
                var key = {};
                var extra = {};

                extra.name = key.name = jQuery(this).attr('id');
                extra.value = key.value = jQuery(this).val();
                extra.type = key.type = 'dropDown';
                extra.theText = jQuery(this).find('option:selected').text();

                keys.push(key);
                extras.push(extra);
            });

            inputs.each(function() {
                var key = {};
                var extra = {};

                if(jQuery(this).val() != '' && jQuery(this).val() != 'true' && typeof(jQuery(this)) !== 'undefined') {
                    extra.name = key.name = jQuery(this).attr('id');
                    extra.theText = extra.value = key.value = jQuery(this).val();
                    extra.type = key.type = 'text';

                    keys.push(key);
                    extras.push(extra);
                }
            });

            post.hash = jQuery('#hash').val();
            post.data = keys;
            post.playerId = playerId;

            jQuery.post(
                '/ajax/profileupdate/',
                post,
                function(data) {
                    if(data == 200) {
                        var newValue = '';
                        var j = 0;
                        var separator = ' / ';

                        for(var i in extras) {
                            separator = extras[i].type == 'checkbox' ? ', ' : ' / ';

                            if(i < (extras.length - 2)) {
                                j=parseInt(i)+1; // dafuq was this turning into a string???

                                if(extras[j].type != 'checkbox') {
                                    separator = ' / ';
                                }
                            }

                            extras[i].theText = extras[i].name == '_number' ? '#' + extras[i].theText : extras[i].theText;

                            newValue += (i < (extras.length - 1)) ? extras[i].theText + separator : extras[i].theText;
                        }

                        _this.siblings('.accountInfo').children('p').html(newValue);

                        p.html(newValue);

                        _this.children('span').html('Edit');

                        _gaq.push(['_trackEvent',
                              'user-action',           // The top-level name for your online content categories.  Required parameter.
                              _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                              'player-account-page'
                           ]);

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
            _this.children('span').html('Save');
        }
    });

    jQuery('.statButton').click(function() {
        var _this = jQuery(this);

        var playerId = _this.parentsUntil('.parentHolder').siblings('.player-id').val();

        var keys = [];
        var post = {};

        var statHidden = _this.parents('.btn-holder').siblings('.statHidden');
        var stats = _this.parentsUntil('li').children('.three-column').children('li');
        var statsHolder = _this.parentsUntil('li').children('.three-column');

        jQuery('.stats').remove();

        if(stats.first().hasClass('hidden') || (stats.length === 0 && _this.children('span').html() === 'Save')) {
            var inputs = statHidden.children('.three-column').children('li').children('.input_custom-text').children('.custom-input_center').children('input');

            statsHolder.html('');

            jQuery(inputs).each(function(i) {
                if(jQuery(this).val() == "0" || jQuery(this).val() == '') {
                    return;
                }

                var key = {};

                key.name = jQuery(this).attr('name');
                key.value = jQuery(this).val();

                keys[i] = (key);

                if(key.value != 0) {
                    var newHtml = jQuery('<li><div class="stat"><p><span class="statName"></span><span class="bold"></span></p></div></li>');

                    var displayText = jQuery(jQuery(inputs)[i]).parentsUntil('li').siblings('p').html();

                    newHtml.children('.stat').children('p').children('.statName').html(displayText);
                    newHtml.children('.stat').children('p').children('.bold').html(key.value);

                    statsHolder.append(newHtml);
                }
            });

            post.hash = jQuery('#hash').val();
            post.data = keys;
            post.playerId = playerId;

            jQuery.post(
                '/ajax/updatestats/',
                post,
                function(data) {
                    stats.toggleClass('hidden');
                    statHidden.toggleClass('hidden');

                    _gaq.push(['_trackEvent',
                          'user-action',           // The top-level name for your online content categories.  Required parameter.
                          _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                          'player-account-page'
                       ]);

                    _this.children('span').html('Edit');
                }
            );
        } else {
            stats.toggleClass('hidden');
            statHidden.toggleClass('hidden');

            _this.children('span').html('Save');
        }
    });

    jQuery('.schoolEdit').click(function() {
        var _this = jQuery(this);

        var playerId = _this.parentsUntil('.parentHolder').siblings('.player-id').val();

        var inputField = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center');
        var p = _this.parentsUntil('li').children('.category');

        _this.parentsUntil('li').children('.accountInfo').toggleClass('hidden');
        p.toggleClass('hidden');

        if(_this.parentsUntil('li').children('.accountInfo').hasClass('hidden')) {
            var schoolId = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center').children('.passer').val();
            var schoolName = _this.parentsUntil('li').children('.accountInfo').children('.input_custom-text').children('.custom-input_center').children('.schoolSearchInput').val();

            jQuery.post(
                '/ajax/schoolupdate/',
                {
                    hash: jQuery('#hash').val(),
                    value: schoolId,
                    playerId: playerId
                },
                function(data) {
                    if(data == 200) {
                        _this.parentsUntil('li').children('.category').html(schoolName);

                        _this.children('span').html('Edit');

                        _gaq.push(['_trackEvent',
                              'user-action',           // The top-level name for your online content categories.  Required parameter.
                              _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                              'player-account-page'
                           ]);

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
            _this.children('span').html('Save');
        }
    });

    jQuery('.btn-deactivate').click(function() {
        var r = confirm('Are you sure you want to deactivate your account?');

        if (r == true) {
            jQuery.post('/ajax/deactivateme/', {hash: jQuery('#hash').val()}, function(data) {
                _gaq.push(['_trackEvent',
                      'user-action',           // The top-level name for your online content categories.  Required parameter.
                      'user-deactivate',  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                      'player-account-page'
                   ]);

                document.location.reload(true);
            });
        }
        else {
            //close the popup
        }
    });

    jQuery('.deleteVideo').click(function() {
        var _this = jQuery(this);

        var r = confirm('Are you sure you want to delete this video?');
        if (r == true) {
            jQuery.post('/ajax/deletevideo/', {hash: jQuery('#hash').val(), videoId: _this.prop('id')}, function(data) {
                if(data == 200) {
                    _gaq.push(['_trackEvent',
                          'user-action',           // The top-level name for your online content categories.  Required parameter.
                          _this.prop('id'),  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                          'player-account-page'
                       ]);

                    var curTotal = _this.parentsUntil('.active').siblings('.opener').html().split('(');
                    curTotal = curTotal[1].replace(/\)/, '');

                    curTotal = parseInt(curTotal) - 1;

                    _this.parentsUntil('.active').siblings('.opener').html('My Videos (' + curTotal + ')');

                    _this.parents('li').first().fadeOut('slow');
                }
            });
        }
        else {
            //close the popup
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

                _this.parents('.popup').children('.holder').children('.frame').html(text);

                setTimeout(function(){
                    _this.parents('.infoBubble').fadeOut();
                }, 3000);
            }
        );
    });

    jQuery('.close').click(function() {
        jQuery('.infoBubble').fadeOut();
    });

    if(jQuery('.schoolSearchInput').length > 0) {
        jQuery('.schoolSearchInput').autocomplete({
            source: function( request, response ) {
                jQuery.post(
                    "/ajax/schools/",
                    {
                        hash: jQuery('#hash').val(),
                        schoolName: request.term
                    },
                    function( data ) {
                        response( jQuery.map( eval(data), function( item ) {
                            var locale = item.city != '' ? item.city + ', ' + item.state : '';

                            return {
                                desc: locale,
                                label: item.name,
                                id: item.id
                            }
                        }));

//                        var height = jQuery('.schoolSearchInput').data('lastClicked').parentsUntil('li').children('.accountInfo').children('.input_custom-text').outerHeight();
//                        var width = jQuery('.schoolSearchInput').data('lastClicked').parentsUntil('li').children('.accountInfo').children('.input_custom-text').outerWidth();
//                        var position = jQuery('.schoolSearchInput').data('lastClicked').parentsUntil('li').children('.accountInfo').children('.input_custom-text').offset();
//
//                        jQuery('.schoolSearchInput').data('lastClicked').parentsUntil('li').children('.accountInfo').children('.input_custom-text').css(
//                            {
//                                'position': 'relative',
//                                'z-index': 10
//                            }
//                        );
//
//                        var top = position.top + height - 2;
//                        width -= 6;
//
//                        jQuery('.ui-autocomplete').css(
//                            {
//                                'border': '1px solid #ccc',
//                                'border-top': 'none',
//                                'left': (position.left) + 'px',
//                                'position': 'absolute',
//                                'top': top + 'px',
//                                'width': width + 'px',
//                                'z-index': 2
//                            }
//                        );
                    }
                );
            },
            select: function(event, ui) {
                jQuery(this).html(ui.item.label);
                jQuery(this).siblings('.passer').val(ui.item.id);
            }
        }).data( "autocomplete" )._renderItem = function( ul, item ) {
            var append = item.desc !== '' ? '<br />' + item.desc : '';

            return $( "<li>" )
                .data( "item.autocomplete", item )
                .append( "<a><span class='bigger'>"+ item.label + "</span>" + append + "</a>" )
                .appendTo( ul );
        };
    }

    /*jQuery('.addAnother').click(function() {
        if(addThis == '') {
            var _this = addThis = jQuery(this).parentsUntil('#emailFriend').children('.copy').first().html();
        }

        jQuery(this).parentsUntil('#emailFriend').children('.copy').append(addThis);
    });*/

    jQuery('#emailFriend').validate();

    // jQuery('.pws').focus(function() {
        // jQuery(this).siblings('input[type="password"]').removeClass('hidden').focus();
        // jQuery(this).remove();
    // });
    jQuery(".input_password").bind('click focus blur', function(event) {
    	
    	if ($("html").hasClass("ie8") || $("html").hasClass("ie7")) {
    		
    		var text = $(this);
	    	var pass = $("<input type='password' class='input_password' name='password' value='' />");
	    	
	    	function textToPassword(event) {
	    		$(this).replaceWith(pass);
	    		setTimeout(function() {$(pass).focus()},100);
	    		$(pass).bind('click focus blur', passwordToText);
	    	}
	    	
	    	function passwordToText(event) {
	    		if (event.type == "blur" && (($(this).get(0)).value == "" || ($(this).get(0)).value == ($(this).get(0)).defaultValue)) {
	    			$(this).replaceWith(text);
	    			$(text).bind('click focus blur', textToPassword);
	    		}
	    	}
	    	
	    	if ($(this).attr("type") == "text") {
	    		textToPassword.call(this);
	    	}
    		
    	} else {
			if ($(this).attr("type") == "text") {
				($(this).get(0)).type = 'password';
			}

        	if (event.type == "blur" && (($(this).get(0)).value == "" || ($(this).get(0)).value == ($(this).get(0)).defaultValue)) {
				($(this).get(0)).type = "text";
			}
    	}
    	
    });

    jQuery('input[type=text]').on('click focus blur', function(event) {
    	if (event.type == "blur" && (($(this).get(0)).value == "" || ($(this).get(0)).value == ($(this).get(0)).defaultValue)) {
            jQuery(this).css('color', '#B2B2B2');
    		($(this).get(0)).value = ($(this).get(0)).defaultValue;
    	} else if((event.type == "focus") && ($(this).get(0)).defaultValue == ($(this).get(0)).value) {
            jQuery(this).css('color', '#000');
            ($(this).get(0)).value = '';
        }
    });

    jQuery('.videoOptin').click(function() {
        jQuery.post(
            '/ajax/videoprivacy/',
            {level: jQuery(this).val(), hash: jQuery('#hash').val()}
        );
    });

    jQuery('.optin').click(function() {
        var switcher = jQuery(this).is(':checked') ? 'on' : 'off';

        jQuery.post(
            '/ajax/optins/',
            {optin: jQuery(this).val(), switcher: switcher, hash: jQuery('#hash').val()}
        );
    });

    jQuery('.jcf-hidden').change(function(){
        jQuery(this).siblings('.select-area').children('.center').css('color', '#000');
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
	var bgClass = "";

	switch (true)
	{
		case browserWidth >= 1600:
			bgClass = "bg1600";
			break;
		case browserWidth >= 1440:
			bgClass = "bg1440";
			break;
		case browserWidth >= 1366:
			bgClass = "bg1366";
			break;
		default:
			bgClass = "bg1280";
			break;
	}

	// create image name
	$("#container").addClass(bgClass);
}

function openFacebook(url, title)
{
    window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(url) + '&t=' + encodeURIComponent(title), 'fbSharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}

function openGooglePlus(url)
{
    window.open('https://plus.google.com/share?url=' + encodeURIComponent(url), 'gSharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}

function openMySpace(url)
{
    window.open('http://www.myspace.com/?url=' + encodeURIComponent(url), 'myspaceSharer');
    return false;
}

function openTwitter(url, tweet)
{
    window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(tweet) + '&url=' + encodeURIComponent(url), 'twitterSharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}