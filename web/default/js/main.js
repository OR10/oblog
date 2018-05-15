$( document ).ready(function() {
    $('#blog-dropdown').hover(function() {
    	$(this).find('div[name="dropdown-block"]').show();
    },
    function() {
    	$(this).find('div[name="dropdown-block"]').hide();
    })
});