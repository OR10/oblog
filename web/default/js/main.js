$( document ).ready(function() {
    $('#blog-dropdown').hover(function() {
		console.log('kek');
    	$(this).find('div[name="dropdown-block"]').show();
    },
    function() {
    	console.log('kok');
    	$(this).find('div[name="dropdown-block"]').hide();
    })
});