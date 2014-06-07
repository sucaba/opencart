 $(document).ready(function() {

 	// Animation for the languages and currency dropdown
$('.switcher').hover(function() {
$(this).find('.option').stop(true, true).slideDown(300);
},function() {
$(this).find('.option').stop(true, true).slideUp(150);
}); 
  
  
 });
 
 /* Ajax Cart */
	$('#cart > .heading a').live('hover', function() {
		$('#cart').addClass('active');
		
		$('#cart').load('index.php?route=module/cart #cart > *');
		
		$('#cart').live('mouseleave', function() {
			$(this).removeClass('active');
		});
	});



