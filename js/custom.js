/*global $, alert, console */

$(function () {
   
    'use strict';

    var userError   = true,
        
        emailError  = true,
        
        msgError    = true;
    
    $('.username').blur(function () {
       
        if ($(this).val().length < 4) { // Show Error
                        
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
            
                .end().find('.asterisx').fadeIn(100);
            
            userError = true;
            
        } else { // No Errors
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            
                .end().find('.asterisx').fadeOut(100);
            
            userError = false;
            
        }
        
    });
    
    $('.email').blur(function () {
       
        if ($(this).val() === '') {
                        
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
                
                .end().find('.asterisx').fadeIn(100);
                        
            emailError = true;
            
        } else {
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            
                .end().find('.asterisx').fadeOut(100);
                        
            emailError = false;
            
        }
        
    });
    
    $('.message').blur(function () {
       
        if ($(this).val().length < 10) {
            
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
                
                .end().find('.asterisx').fadeIn(100);
            
            msgError = true;
            
        } else {
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
                
                .end().find('.asterisx').fadeOut(100);
            
            msgError = false;
            
        }
        
    });
   
    // Submit Form Validation
    
    $('.contact-form').submit(function (e) {
        
        if (userError === true || emailError === true || msgError === true) {
            
            e.preventDefault();
            
            $('.username, .email, .message').blur();
            
        }
        
    });
    
});


/*global $, jQuery, alert*/

$(document).ready(function () {
    
    "use strict";
    
    // Nice Scroll
    
    $("html").niceScroll();
    
    $('.carousel').carousel({
        
        interval: 6000
        
    });
    
    // Show Color Option Div When Click On The Gear
    
    $(".gear-check").click(function () {
        
        $(".color-option").fadeToggle();
        
    });
    
    // Change Theme Color On Click
    
    var colorLi = $(".color-option ul li"),
        
        scrollButton = $("#scroll-top");
    
    colorLi.eq(0).css("backgroundColor", "#E60024").end()
    
           .eq(1).css("backgroundColor", "#E426D5").end()
    
           .eq(2).css("backgroundColor", "#009AFF").end()
    
           .eq(3).css("backgroundColor", "#FFD500");
        
    colorLi.click(function () {
        
        $("link[href*='theme']").attr("href", $(this).attr("data-value"));
        
    });
    
    // Caching The Scroll Top Element
    
    $(window).scroll(function () {
        
        if ($(this).scrollTop() >= 700) {
            
            scrollButton.show();
            
        } else {
            
            scrollButton.hide();
        }
    });
    
    // Click On Button To Scroll Top
    
    scrollButton.click(function () {
        
        $("html,body").animate({ scrollTop : 0 }, 600);
        
    });
    
});

// Loading Screen

$(window).on('load',function(){
    
    "use strict";
    
    // Loading Elements
    
    $(".loading-overlay .spinner").fadeOut(2000, function () {
        
        // Show The Scroll

        $("body").css("overflow", "auto");
        
        $(this).parent().fadeOut(2000, function () {
            
            $(this).remove();
        });
    });
});