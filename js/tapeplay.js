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
        console.log(jQuery(this).html())


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
    })
});