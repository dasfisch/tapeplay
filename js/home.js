jQuery(document).ready(function(){

    jQuery('#sportSelect').click(function(){
        jQuery('#potentials').slideDown();
    });

    jQuery('#potentials li').click(function() {
        jQuery('#value').children('.sportName').html(jQuery(this).children('.sportName').html());
        jQuery('#chosenSport').val(jQuery(this).children('.sportId').val());
//        jQuery(this).parentsUntil('.values').children('#value').html(jQuery(this).html());
//        jQuery(this).parentsUntil('.sportSelect').children('.dropper .middle').children('.dropVal').val(jQuery(this).html());

        jQuery('#potentials').slideUp();
    });
});