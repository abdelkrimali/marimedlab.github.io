

$(function () {
  'use strict';
  // Adjust Slider Height
  var winH    = $(window).height(),
      upperH  = $('.upper-bar').innerHeight(),
      navH    = $('.navbar').innerHeight();
  $('.slider, .carousel-item').height(winH - ( upperH ));



  // Featured Work Shuffle
  $('.featured-work ul li').on('click', function () {
    $(this).addClass('active').siblings().removeClass('active');
    if ($(this).data('class') === 'all') {
      $('.shuffle-imgs .col-md').css('opacity', 1);
    } else {
      $('.shuffle-imgs .col-md').css('opacity', '.08');
      $($(this).data('class')).parent().css('opacity', 1);
    }
  });

});

// Trigger Nice scroll

$(document).ready(function () {

    
    
    // Nice Scroll
    
    $("html").niceScroll({

      cursorcolor : '#125840',
      cursorwidth : '8px',
      zindex      :'100'

    });}
    
  );

// Scroll to Top

$(function(){

  var scrollbutton =$(".scroll-top");

  $(window).scroll(function()
  {

   if($(this).scrollTop()> 700)
   {
    scrollbutton.show();
   }
   else
   {
    scrollbutton.hide();
   }

  });
  scrollbutton.click(function(){
    $("html,body").animate({scrollTop : 0},1300);

  });

});

// Start Section Loading Website

$(window).on('load',function(){

   
    $(".loading-overlay .spinner").fadeOut(1000, function(){ //7000
      $(this).parent().fadeOut(500, function(){ //1500
        $("body").css("overflow","auto");
        $(this).remove();
      });
    });

});

// Create the Pop up Box 

/*

$(".overlay").on('click',function(){


  // create overlay elemtn
 
  var bi = $('.carousel-item.active').css("background-image");// image url
 


  let overlay=document.createElement('div');
  //add class to overlay;
  overlay.className='popup-overlay';
  document.body.appendChild(overlay);

 
  let popupbox=document.createElement('div');
  popupbox.className = 'popup-box';

  let popupimage =document.createElement('img');
  //Set image source
 // popupimage.src= bi.split(/"/)[1];

// popupimage.src='img/desc.png';
 // popupimage.className ='img-thumbnail';
  //console.log(popupimage.src);


  // create table 



  // add image to popup box
 

   if($(".carousel-item.active").attr('title')!= null)
   {

    let imgheading=document.createElement("h3");
    let imgtext=document.createTextNode($(".carousel-item.active").attr('title'));

    let desc=document.createElement("h3");
    let desctext=document.createTextNode("Description");
    let desccontent=document.createElement("p");
    let pcontent=document.createTextNode(" Ce complément alimentaire joue un role contre la fatigue cérébrale, en diminuant les méfaits Ce complément alimentaire joue un role contre la fatigue cérébrale, en diminuant les méfaits");

    desc.appendChild(desctext);
    desccontent.appendChild(pcontent);


      //add text to the heading
      imgheading.appendChild(imgtext);


      // Add the heading to the popup box
      popupbox.appendChild(imgheading);
      popupbox.appendChild(desc);
      popupbox.appendChild(desccontent);
   }

   popupbox.appendChild(popupimage);
   document.body.appendChild(popupbox);


  // Create the Close Span
    let closebutton=document.createElement('span');

    //Create the close button text
    let closebuttontext=document.createTextNode("X");

    //add text to close button
    closebutton.appendChild(closebuttontext);

    //add class to close button
    closebutton.className='close-button';

    // add close button to the popup box
    popupbox.appendChild(closebutton);




    


    // Close Popup

document.addEventListener("click",(e)=>{
  if(e.target.className === "close-button"){

    //Remove the current popup
    e.target.parentNode.remove();

    //Remove Overlay
    document.querySelector('.popup-overlay').remove();
  }


});


/*
      if($(".carousel-item.active").attr('title')== 'mincivite'){
        console.log("Mincivite");
      }else
      {
        alert("produit");
      }





});

*/


