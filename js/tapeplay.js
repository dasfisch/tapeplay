jQuery(document).ready(function(){
    jQuery('#arrow').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('#potentials li').click(function(){
        console.log(jQuery(this).html())


        jQuery('#value').html(jQuery(this).html());

        jQuery('#potentials').slideUp();
    });
});