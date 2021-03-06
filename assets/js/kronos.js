var lease_term_count = 1;

$(document).ready(function(){
		
	$('.dynamic-subject a.new').find('i').removeClass('icon-comment-alt').addClass('icon-comment');	
	
	if(window.location.href.indexOf("whouses=1") > -1) {
		$('.who-uses').show();
	} else {
		$('.who-uses').remove();
	}
	
	if(window.location.href.indexOf("faq=1") > -1) {
		$('.home-faq').show();
	} else {
		$('.home-faq').remove();
	}
	
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
		//The following call is flawed in that it assumes that every URL will have "admin" in it - this is untrue in cases like the inbox, which is usable by all user types. Implemented same redirect-based solution as locators and properties on homepage instead.
		//$("a.brand").attr("href", "/index.php/admin/controlPanel")
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
		var prop_mgmt = $('.prop-mgmt').height();
		
			$('.edit-inner').animate({height:prop_mgmt},400);
			$('a.btn').removeClass('active-tab');
			$(this).addClass('active-tab');
			$('.unit-mgmt').fadeOut(400, function() {
				$('.prop-mgmt').fadeIn(400);
			});
		}
	});
	
	
	$('.manage-tabs li').click(function(e) {
		var _tab = $(this);
		var _sibs =_tab.siblings();
		
		if (_tab.find('a').hasClass('black')) {
			 _sibs.find('a').addClass('black');
			 _tab.find('a').removeClass('black');
		} else {e.preventDefault();}
		
		function _bringIt(el) {
			el.siblings().stop().fadeOut(50);
			el.stop().delay(55).fadeIn(100);
		}
		
		if (_tab.hasClass('pf')) {
			_bringIt($('#property-features'));
		}else if (_tab.hasClass('pp')) {
			_bringIt($('#pet-policy'));
		}else if (_tab.hasClass('pr')) {
			_bringIt($('#requirements'));
		}else if (_tab.hasClass('pa')) {
			_bringIt($('#announcements1'));
		}
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


if(window.location.href.indexOf("kronosaurus=1") > -1) {
		$('body').append('<div class="kronosaurus"></div>');	
	} 
	
	
//update banners and version numbers. will need to manually change prod version number when prod changes.
var prod_version = '1.0';
var dev_version = prod_version + '.5';

//DEV.KRONOSOURCE.COM
if(window.location.href.indexOf("dev.kronosource.com") > -1) {
		$('body').prepend('<div id="version-info">DEV&nbsp;&nbsp;-&nbsp;&nbsp;<span class="vnum">v</span><span class="ts"></span><i class="icon-remove-circle"></i></div>');	
		$(function() {
		
		$('#wrap-section, .navbar-fixed-top').css('padding-top', '40px');
        $('#version-info .ts').commitment({
            user: 'mdchappe',
            repo: 'kronosource',
            success: function() {
                console.log('Commit messages were successfuly retrieved from Github!');
            },
            error: function(message) {
                console.log(message);
            }
        });

    });	
		$('.vnum').append(dev_version);
		
//DEMO.KRONOSOURCE.COM
}else if(window.location.href.indexOf("demo.kronosource.com") > -1) {
		$('#wrap-section, .navbar-fixed-top').css('padding-top', '40px');
		$('body').prepend('<div style="line-height:40px;" id="version-info">DEMO&nbsp;&nbsp;-&nbsp;&nbsp;<span class="vnum">v</span><i class="icon-remove-circle"></i></div>');
		$('.vnum').append(prod_version);
		
//KRONOSOURCE.COM
}else if(window.location.href.indexOf("kronosource.com") > -1) {
	$('.vnum').html(prod_version);
	$('.version-info, .version-info-demo').remove();

//LOCAL
}else {
	$('body').prepend('<div id="version-info">LOCAL&nbsp;&nbsp;-&nbsp;&nbsp;<span class="vnum">v</span><span class="ts"></span><i class="icon-remove-circle"></i></div>');
	$(function() {
		
		$('#wrap-section, .navbar-fixed-top').css('padding-top', '40px');
        $('#version-info .ts').commitment({
            user: 'mdchappe',
            repo: 'kronosource',
            success: function() {
                console.log('Commit messages were successfuly retrieved from Github!');
            },
            error: function() {
                console.log('theres been a problem getting github shit!');
            }
        });

    });
	$('.vnum').append(dev_version);
	
}
		
$('#version-info .icon-remove-circle').click(function() {
	$('#version-info').slideUp(200);
	$('#wrap-section, .navbar-fixed-top').animate({'padding-top': '0'},200);
	
});

// shut it down for non payment
// commented out for dev.kronosource.com
/*
	$('body').append('<div class="down"><span>Please Contact The Site Owner.</span></div>');
	$('*').unbind('click');
	$.extend({
			getUrlVars: function() {
				var vars = [], hash;
				var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
				for(var i = 0; i < hashes.length; i++) {
					hash = hashes[i].split('=');
				    vars.push(hash[0]);
				    vars[hash[0]] = hash[1];
				}
				return vars;
			},
			  getUrlVar: function(name){
			    return $.getUrlVars()[name];
			  }
		});
		
		var krInit = window.location.href.split('?')[0] + '?';
		if ($.getUrlVar('siteIsUnavailable') != null) {
				var _nonP = parseInt($.getUrlVar('siteIsUnavailable'));
				if (_nonP !== 1)	{
					window.location.href = krInit + "siteIsUnavailable=1";
				}
			
		} else {
			window.location.href = krInit + "siteIsUnavailable=1";
		}
*/
// end of shut down 