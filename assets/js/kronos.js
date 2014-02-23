var lease_term_count = 1;

$(document).ready(function(){
	$('.dynamic-subject a.new').find('i').removeClass('icon-comment-alt').addClass('icon-comment');	
	
		$( window ).scroll(function() {
			if ($('.nav1-login i').hasClass('rotate')) {
				$('.nav1-login').click();
			}
		});
	
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
		$('.login-dropdown').animate({height:'toggle', opacity:'toggle'},200);
		$('.nav1-login i').toggleClass('rotate');
		$(".login-dropdown input:first-child").focus();
	});
	

	    
     $('.home-text1 a, .nav1-feedback').click(function() {
     	 $('body').css('overflow', 'hidden');
	     $('.overlay, .not-yet').fadeIn(500);
	     return false;
     });
     
	 if(window.location.href.indexOf("register") > -1 || 
	 	window.location.href.indexOf("forgot") > -1) {
    	$('.nav1-feedback, .nav1-login').remove();
	 } 
     
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
	        $('html,body').animate({ scrollTop: target.offset().top - 100 }, 500);
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
	}
	
	if(window.location.href.indexOf("locator") > -1) {
    	$('.page-content').css({'top':'120px', 'margin-bottom':'200px'});
	}else if (window.location.href.indexOf("admin") > -1) {
		$('.page-content').css({'top':'120px', 'margin-bottom':'200px'});
		$("a.brand").attr("href", "/index.php/admin/controlPanel")
	}else if (window.location.href.indexOf("property") > -1) {
		$('.page-content').css({'top':'120px', 'margin-bottom':'200px'});
	}
	
	$(function() {
		$('[rel="tooltip-home"]').tooltip({placement:'bottom'});
	});
	
	$(function() {
		$('[rel="tooltip"]').tooltip({placement:'bottom'});
	});
	
	$(function() {
		$('[rel="tooltip-right"]').tooltip({placement:'right'});
	});
	
	$(function() {
		$('[rel="tooltip-top"]').tooltip({placement:'top'});
	});
	
	//search page
	$('.unit-switch').click(function() {
		$('.browse-inner').animate({height:'492px'},400);
		$('a.btn').removeClass('active-tab');
		$(this).addClass('active-tab');
		$('.property-search').fadeOut(400, function() {
			$('.unit-search').fadeIn(400);
		});
	});
	
	$('.property-switch').click(function() {
		$('.browse-inner').animate({height:'666px'},400);
		$('a.btn').removeClass('active-tab');
		$(this).addClass('active-tab');
		$('.unit-search').fadeOut(400, function() {
			$('.property-search').fadeIn(400);
		});
	});
	
	//property-management page
	
	$('.p-unit-switch').click(function() {
		if ($(this).hasClass('active-tab')) {
			return;
		} else {
		var unit_mgmt = $('.unit-mgmt').height() - 80;

			$('.edit-inner').animate({height:unit_mgmt},400);
			$('a.btn').removeClass('active-tab');
			$(this).addClass('active-tab');
			$('.prop-mgmt').fadeOut(400, function() {
				$('.unit-mgmt').fadeIn(400);
			});
		}
	});
	
	$('.p-property-switch').click(function() {
		if ($(this).hasClass('active-tab')) {
			return;
		} else {
			$('.edit-inner').animate({height:'922px'},400);
			$('a.btn').removeClass('active-tab');
			$(this).addClass('active-tab');
			$('.unit-mgmt').fadeOut(400, function() {
				$('.prop-mgmt').fadeIn(400);
			});
		}
	});
	
	$('.manage-tabs .pf').click(function() {
		$('.manage-tabs li a').addClass('black');
		$(this).find('a').removeClass('black');
		$('.edit-inner').animate({height:'922px'},200);
		$('#pet-policy, #announcements1').fadeOut(200, function() {
			$('#property-features').delay(200).fadeIn(200);
		});
	});
	
	$('.manage-tabs .pp').click(function() {
		$('.manage-tabs li a').addClass('black');
		$(this).find('a').removeClass('black');
		$('.edit-inner').animate({height:'870px'},200);
		$('#property-features, #announcements1').fadeOut(200, function() {
			$('#pet-policy').delay(200).fadeIn(200);
		});
	});
	
	$('.manage-tabs .pa').click(function() {
		$('.manage-tabs li a').addClass('black');
		$(this).find('a').removeClass('black');
		$('.edit-inner').animate({height:'870px'},200);
		$('#property-features, #pet-policy').fadeOut(200, function() {
			$('#announcements1').delay(200).fadeIn(200);
		});
	});
	
	
	if(window.location.href.indexOf("manage") > -1) {
    	var referrer =  document.referrer;
		if (referrer.indexOf('gallery') > -1 || 
			referrer.indexOf('update_unit') > -1 ||
			referrer.indexOf('add_unit') > -1 ) {
			$('a.btn').addClass('transition-none').removeClass('active-tab');
			$('.p-unit-switch').addClass('active-tab transition-none');
			$('.prop-mgmt').hide();
			$('.unit-mgmt').show();
			$('a.btn').removeClass('transition-none');
			return false;
		}
	}
	
	if(window.location.href.indexOf("searchProperties") > -1) {
    	var referrer =  document.referrer;
		if (referrer.indexOf('units') > -1) {
			$('a.btn').addClass('transition-none').removeClass('active-tab');
			$('.unit-switch').addClass('active-tab transition-none');
			$('.property-search').hide();
			$('.unit-search').show();
			$('a.btn').removeClass('transition-none');
			return false;
		}
	}
	
	if(window.location.href.indexOf("viewProperty") > -1) {
		var yelp_link = $('a.yelp').attr('href').toLowerCase();
		
		if (yelp_link.indexOf("apartments") > -1) {
			var yelp_fix = yelp_link.replace(/\ /g,'-').replace(/\--/g,'-');
			$('a.yelp').attr('href',yelp_fix);
		} else {
			var yelp_fix2 = yelp_link.replace(/\ /g,'-').replace(/\--/g,'-apartments-');
			$('a.yelp').attr('href',yelp_fix2);
		}
	}
	
});//doc ready

function add_lease_term(){
	var fragment = '<tr>';
		fragment += '<td><input type="text" value="" name="lease_term_'+lease_term_count+'"> months</td>';
		fragment += '<td>$<input type="text" value="" name="monthly_rent_'+lease_term_count+'"></td>';
		fragment += '<td>$<input type="text" value="" name="deposit_'+lease_term_count+'"></td>';
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
	$('#code').val(random_string);
}
