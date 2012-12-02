jQuery(document).ready(function() {
    jQuery('.analytics').click(function() {
        var id = jQuery(this).prop('id');

        _gaq.push(['_trackEvent', 'something', id]);
    });
});