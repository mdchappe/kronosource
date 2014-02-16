var lease_term_count = 1;

$(document).ready(function(){
	$('.dynamic-subject a.new').find('i').removeClass('icon-comment-alt').addClass('icon-comment');	
	
	$('a.j-back').click(function(){
        parent.history.back();
        return false;
    });

	$('#unit_date').datepicker();
	$('.date_input').datepicker();
	$('#add_term').click(add_lease_term);
	$('#random').click(generate_random);
	
	
    $(".reg-box input").focus();
    
    /* Scroll event handler */
    $(window).bind('scroll',function(e){
    	parallaxScroll();
    });
    
    /* Scroll the background layers */
	function parallaxScroll(){
		var scrolled = $(window).scrollTop();
		$('.hero-inner-wrapper').css('top',(0-(scrolled*-0.75))+'px');
	}
	
	$('.nav1-login').click(function() {
		$('.login-dropdown').animate({height: 'toggle', opacity: 'toggle'}, 'fast');
		$('.nav1-login i').toggleClass('rotate');
     });
     
     $('.home-text1 a, .nav1-feedback').click(function() {
     	 $('body').css('overflow', 'hidden');
	     $('.overlay, .not-yet').fadeIn(500);
	     return false;
     });
     
     $('.overlay, .not-yet').click(function() {
     	 $('body').css('overflow', 'auto');
	     $('.overlay, .not-yet').fadeOut(500);
	     if (!$(".home-wrapper textarea").val()) {
			 $('.flexible-text').slideUp(500); 
	         $('.detailed').fadeIn(500);
		 }
	     return false;
     });
     
     $('.detailed').click(function() {
	    $('.flexible-text').slideDown(500);
	    $(this).fadeOut(500); 
	     $(".home-wrapper textarea").focus();
     });
     
     $(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - 100
	        }, 500);
	        return false;
	      }
	    }
	  });
	});
	
	var logged_in_styles = {
		background:'none', 
		padding:'0',
		width:'auto',
		top:'0', 
		width:'500px',
		textAlign:'right'
	};
	

	if ($('.login-dropdown ul').hasClass('logged-in-nav')) {
		$('.login-dropdown').show().css(logged_in_styles);
		$('.home-hero, .features, .who-uses, .home-faq, .home-text1').hide();
		$('.home-all-wrapper').css('padding-top', '0');
		$('.home-wrapper').css('margin-top', '200px');
		
	}
	

});

function add_lease_term(){
	var fragment = '<tr>';
		fragment += '<td><input type="text" value="" name="lease_term_'+lease_term_count+'"> months</td>';
		fragment += '<td>$<input type="text" value="" name="monthly_rent_'+lease_term_count+'"></td>';
		fragment += '<td>$<input type="text" value="" name="deposit_'+lease_term_count+'"></td>';
		fragment += '<td>$<input type="text" value="" name="pet_rent_'+lease_term_count+'"></td>';
		fragment += '<td>$<input type="text" value="" name="pet_deposit_'+lease_term_count+'"></td>';
		fragment += '</tr>';
	
	$('#rent_information_table').append(fragment);
	$('#lease_term_count').attr('value',lease_term_count);
	lease_term_count++;
}

function generate_random(){
	
	var characters="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
	var random_string = "";
	
	while(random_string.length < 8){
		random_string += characters[ Math.floor(Math.random()*characters.length) ];
	}
	
	$('#code').attr('value',random_string);
}
