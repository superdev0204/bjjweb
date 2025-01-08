$(document).ready(function() {
  if($(window).width() > 800) {
      $("#hero1").attr("src", "./images/hero-image/hero-img-1.jpg");
      $("#hero2").attr("src", "./images/hero-image/hero-img-2.jpg");
      $("#hero3").attr("src", "./images/hero-image/hero-img-3.jpg");
      $("#hero4").attr("src", "./images/hero-image/hero-img-4.jpg");
      $("#no-1").attr("src", "./images/img/1.svg");
      $("#no-2").attr("src", "./images/img/2.svg");
      $("#no-3").attr("src", "./images/img/3.svg");
      $("#no-4").attr("src", "./images/img/4.svg");
      $("#no-5").attr("src", "./images/img/5.svg");
      $("#no-6").attr("src", "./images/img/6.svg");
  } 
}); 
function toggleMenu() {
  const mediaQuery = window.matchMedia('(max-width: 800px)')
  var x = document.getElementById("toggleMenu");
  if (x.style.display === "block" && mediaQuery.matches) {
    x.style.display = "none";
  } else {
    x.style.display = "block";
    
  }
}
// Active menu item

$('li').on('click', function(){
  $('li').removeClass('active-page');
  $(this).toggleClass('active-page');
})
// SLider Hero Image
//var myIndex = 0;
//var dots = document.getElementsByClassName("dot");
//carousel();

//function carousel() {
//  var i;
 // var x = document.getElementsByClassName("mySlides");
  //for (i = 0; i < x.length; i++) {
   // x[i].style.display = "none";
  //}
  //myIndex++;
  
  //if (myIndex > x.length) {myIndex = 1}    
  //x[myIndex-1].style.display = "block";
  //for (i = 0; i < dots.length; i++) {
    //dots[i].className = dots[i].className.replace(" active", "");
  //}
  //dots[myIndex - 1].className += " active";
  //setTimeout(carousel, 4000); // Change image every 4 seconds
//}

// Video Slider

// $(document).ready(function(){
//   var slider2 = $('.video-carousel').slick({
//     speed: 500,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     draggable: false,
//     autoplay: false,
//     focusOnSelect: false,
//     // centerMode: true,
//     infinite: false,
//     variableWidth: true,
//     prevArrow:"<img class='a-left control-c prev slick-prev' src='/assets/svg/arrow-left.svg'>",
//     nextArrow:"<img class='a-right control-c next slick-next' src='/assets/svg/arrow-right.svg'>",
//     responsive: [{
//       breakpoint: 1024,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         // centerMode: true,

//       }

//     }, {
//       breakpoint: 800,
//       settings: {
//         slidesToShow: 2,
//         slidesToScroll: 2,
//         slidesPerRow: 1,
//         rows: 2,
//         infinite: true,

//       }
//     },  {
//       breakpoint: 480,
//       settings: {
//         slidesToShow: 2,
//         slidesToScroll: 2,
//         slidesPerRow: 1,
//         rows: 2,
//         infinite: true,
//         // autoplay: true,
//         // autoplaySpeed: 2000,
//       }
//     }]
//   });
//   $('.slick-prev').hide();
  
//   slider2.on('afterChange', function(event, slick, currentSlide) {  	
//   	//If we're on the first slide hide the Previous button and show the Next
//     if (currentSlide === 0) {
//       $('.slick-prev').hide();
//       $('.slick-next').show();
//     }
//     else {
//     	$('.slick-prev').show();
//     }
    
//     //If we're on the last slide hide the Next button.
//     if (slick.slideCount === currentSlide + 1) {
//     	$('.slick-next').hide();
//     }
//   });
// });

// Gym Slider

// $(document).ready(function(){
//   var slider2 = $('.gyms-carousel').slick({
//     speed: 500,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     autoplay: false,
//     focusOnSelect: false,
//     // centerMode: true,
//     infinite: false,
//     variableWidth: true,
//     prevArrow:"<img class='a-left control-c prev slick-prev' src='/assets/svg/arrow-left.svg'>",
//     nextArrow:"<img class='a-right control-c next slick-next' src='/assets/svg/arrow-right.svg'>",
//     responsive: [{
//       breakpoint: 1024,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         // centerMode: true,

//       }

//     }, {
//       breakpoint: 800,
//       settings: {
//         slidesToShow: 2,
//         draggable: false,
//         slidesToScroll: 2,
//         slidesPerRow: 1,
//         rows: 2,
//         infinite: true,

//       }
//     },  {
//       breakpoint: 480,
//       settings: {
//         slidesToShow: 2,
//         draggable: false,
//         slidesToScroll: 2,
//         slidesPerRow: 1,
//         rows: 2,
//         infinite: true,
//         // autoplay: true,
//         // autoplaySpeed: 2000,
//       }
//     }]
//   });
//   $('.slick-prev').hide();
  
//   slider2.on('afterChange', function(event, slick, currentSlide) {  	
//   console.log(currentSlide);
//   	//If we're on the first slide hide the Previous button and show the Next
//     if (currentSlide === 0) {
//       $('.slick-prev').hide();
//       $('.slick-next').show();
//     }
//     else {
//     	$('.slick-prev').show();
//     }
    
//     //If we're on the last slide hide the Next button.
//     if (slick.slideCount === currentSlide + 1) {
//     	$('.slick-next').hide();
//     }
//   });
// });
// Show and hide button of gyms list

function toggleList() {
  var x = document.getElementById("stateDropdown");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
$(document).on('click', '.articles-gym-list-title', function() {
  $('.caret-icon').toggleClass('fa-caret-up fa-caret-down');
  
})


function menuItemDropMobile() {
  var x = document.getElementById("drop-item-mobile");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// Go on top Button
var mybutton = document.getElementById("goTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$(function () {
  $(window).resize(function () {
    var reswidth=screen.width;
    if (reswidth<400){
      var x = document.getElementsById("next");
      x.src="../images/colbysmall.png"
    }
  });
});


// Question Popup
function openQuestionPopup() {
  // document.getElementById('questionPopup').style.display = 'flex';
  window.open()
}

function closeQuestionPopup() {
  document.getElementById('questionPopup').style.display = 'none';
}

// Answer Popup
function openAnswerPopup(qID) {
  document.getElementById('question_id').value = qID;
  document.getElementById('answerPopup').style.display = 'flex';
}

function closeAnswerPopup() {
  document.getElementById('answerPopup').style.display = 'none';
}

// Login Popup
function openLoginPopup() {
  document.getElementById('loginPopup').style.display = 'flex';
}

function closeLoginPopup() {
  document.getElementById('loginPopup').style.display = 'none';
}

// Signup Popup
function closeSignupPopup() {
  document.getElementById('signupPopup').style.display = 'none';
}
