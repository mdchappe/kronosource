function add_lease_term(){var e="<tr>";e+='<td><input type="text" value="" name="lease_term_'+lease_term_count+'"> months</td>';e+='<td>$<input type="text" value="" name="monthly_rent_'+lease_term_count+'"></td>';e+='<td>$<input type="text" value="" name="deposit_'+lease_term_count+'"></td>';e+='<td>$<input type="text" value="" name="pet_rent_'+lease_term_count+'"></td>';e+='<td>$<input type="text" value="" name="pet_deposit_'+lease_term_count+'"></td>';e+="</tr>";$("#rent_information_table").append(e);$("#lease_term_count").attr("value",lease_term_count);lease_term_count++}function generate_random(){var e="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789",t="";while(t.length<8)t+=e[Math.floor(Math.random()*e.length)];$("#code").attr("value",t)}var lease_term_count=1;$(document).ready(function(){function e(){var e=$(window).scrollTop();$(".hero-inner-wrapper").css("top",0-e*-0.75+"px")}$(".dynamic-subject a.new").find("i").removeClass("icon-comment-alt").addClass("icon-comment");$("a.j-back").click(function(){parent.history.back();return!1});$("#unit_date").datepicker();$(".date_input").datepicker();$("#add_term").click(add_lease_term);$("#random").click(generate_random);$(".reg-box input").focus();$(window).bind("scroll",function(t){e()});$(".nav1-login").click(function(){$(".login-dropdown").animate({height:"toggle",opacity:"toggle"},200);$(".nav1-login i").toggleClass("rotate");$(".login-dropdown input:first-child").focus()});$(".home-text1 a, .nav1-feedback").click(function(){$("body").css("overflow","hidden");$(".overlay, .not-yet").fadeIn(500);return!1});window.location.href.indexOf("register")>-1&&$(".nav1-feedback").hide();$(".overlay, .not-yet").click(function(){$("body").css("overflow","auto");$(".overlay, .not-yet").fadeOut(500);if(!$(".home-wrapper textarea").val()){$(".flexible-text").slideUp(500);$(".detailed").fadeIn(500)}return!1});$(".detailed").click(function(){$(".flexible-text").slideDown(500);$(this).fadeOut(500);$(".home-wrapper textarea").focus()});$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);e=e.length?e:$("[name="+this.hash.slice(1)+"]");if(e.length){$("html,body").animate({scrollTop:e.offset().top-100},500);return!1}}})});var t={background:"none",padding:"0",width:"auto",top:"0",width:"500px",textAlign:"right"};if($(".login-dropdown ul").hasClass("logged-in-nav")){$(".login-dropdown").show().css(t);$(".home-hero, .features, .who-uses, .home-faq, .home-text1").hide()}if(window.location.href.indexOf("locator")>-1)$(".page-content").css({top:"120px","margin-bottom":"200px"});else if(window.location.href.indexOf("admin")>-1){$(".page-content").css({top:"120px","margin-bottom":"200px"});$("a.brand").attr("href","/index.php/admin/controlPanel")}else window.location.href.indexOf("property")>-1&&$(".page-content").css({top:"120px","margin-bottom":"200px"});$(function(){$('[rel="tooltip"]').tooltip({placement:"bottom"})});$(function(){$('[rel="tooltip-right"]').tooltip({placement:"right"})})});