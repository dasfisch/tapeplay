jQuery(document).ready(function(){
    var visible;

    jQuery('#arrow').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('.potentials li').click(function(){
        console.log(jQuery(this).html())


        jQuery('#value').html(jQuery(this).html());

        jQuery('#potentials').slideUp();
    });


    jQuery('.arrowSmall').click(function(){
        jQuery(this).siblings('.dropper').children('.potentials').slideDown();
    });

    jQuery('.potentials li').click(function(){
        jQuery('.value').html(jQuery(this).html());

        jQuery('.potentials').slideUp();
    });

    jQuery('.checkbox').click(function(){
        if(visible) {
            jQuery(this).children('.box').children('.checkMark').hide();

            visible = false;
        } else {
            jQuery(this).children('.box').children('.checkMark').show();

            visible = true;
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
});