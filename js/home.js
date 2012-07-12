jQuery(document).ready(function(){

    jQuery('#sportSelect').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('#potentials li').click(function() {
        console.log('here')
        jQuery(this).parentsUntil('.values').children('#value').html(jQuery(this).html());
//        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.dropVal').val(jQuery(this).html());

        jQuery('#potentials').slideUp();
    });
});