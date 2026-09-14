var carouselJQuery = window.jQuery || window.$;
function lazyOwl(selector, options) {
    var elements = document.querySelectorAll(selector);
    if (!elements.length) return;
    var initialized = false;
    function init() {
        if (initialized) return;
        initialized = true;
        carouselJQuery(selector).owlCarousel(options);
    }
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            if (entries.some(function(entry) { return entry.isIntersecting; })) {
                observer.disconnect();
                window.requestAnimationFrame(init);
            }
        }, { rootMargin: '250px 0px' });
        elements.forEach(function(element) { observer.observe(element); });
    } else {
        window.requestAnimationFrame(init);
    }
}

/*-----------------------header sticky------------------------*/
const header = document.querySelector(".header");
const toggleClass = "is-sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 150) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});
/*-----------------------header sticky------------------------*/


lazyOwl('.cat_slick_block', {
    loop:true,
    margin:10,
    dots:true,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

lazyOwl('.values-join', {
    loop:true,
    margin:0,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})


lazyOwl('.test-slide-jobs', {
    loop:true,
    margin:0,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})




lazyOwl('.popUlar_article', {
    loop:false,
    margin:10,
    dots:true,
    nav:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

lazyOwl('.trending_cour', {
    loop:false,
    margin:0,
    dots:false,
    nav:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

lazyOwl('.recent_blog_s', {
    loop:false,
    margin:10,
    dots:false,
    nav:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})




lazyOwl('.uni_logo', {
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})







lazyOwl('.test_slide , .blog_slide', {
    loop:true,
    margin:0,
    dots:false,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

lazyOwl('.career_slider', {
    loop:false,
    margin:0,
    dots:false,
    nav:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

/*---------------------------------------------------*/
lazyOwl('.tab_1_slider , .tab_2_slider , .tab_3_slider , .tab_4_slider , .tab_5_slider', {
    loop:false,
    margin:0,
    dots:false,
    nav:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
		991:{
            items:3
        },
        1000:{
            items:2
        }
    }
})




/*------------------------------------------------------*/




$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 70;  // How many characters are shown by default
    var ellipsestext = "";
    var moretext = "Read More";
    var lesstext = "Read Less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '...</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


/*--------------lis_OpEN---------------*/
$(".lis_OpEN").click(function(){
  $("#nav-tabs-wrapper").toggleClass("act");
});

$(".courselistul a").click(function() {
  var selectedText = $(this).text(); // Clicked 'a' ka text get karo
  $(".lis_OpEN span").first().text(selectedText); // First span ke andar text replace karo
  $("#nav-tabs-wrapper").removeClass("act"); // ul ko hide karne ke liye 'act' class remove karo
});


/*--------------discover-top-categories---------------*/
$(".more_button_cat").click(function(){
  $(".discover-top-categories").toggleClass("viewmore");
  $(".more_view").toggleClass("hide");
  $(".less_view").toggleClass("show");
});




/*--------------discover-top-categories---------------*/

/*--------------discover-top-categories---------------*/
$(".header_close").click(function(){
  $(".header_offer").addClass("hide");
});
/*--------------discover-top-categories---------------*/




/*--------------header sidebar---------------*/
$(".header_side_togle").click(function(){
  $(".slide_menu_back").addClass("open");
});
$(".menu_CClose").click(function(){
  $(".slide_menu_back").removeClass("open");
});




$('.header_side_togle').click(function() {
    $('#test-menu-left').css({		
		    'left': '0px;',
    'right': 'auto',
    'transform': 'translateX(0%)',
    'display': 'block'
    });
});

$('.menu_CClose').click(function() {
     $('#test-menu-left').removeAttr('style');
});

/*-----------------------------------------------------*/
$('.ofr').click(function() {
    $('.header_offer').css({		
    'display': 'block'
    });
});

$('.header_close').click(function() {
	$(".header_offer").removeClass("hide");
     $('.header_offer').removeAttr('style');
});






$("#cattrigger").click(function(){
  $("#menu_cat_gory").addClass("active").css("display", "block");
});


/*--------------header sidebar---------------*/

/*--------------discover-top-categories---------------*/
$("#fix-rig").click(function(){
  $(".ani-pio").addClass("active");
  $("#fix-rig").addClass("hide");
  });
  
 $("#side_cont").click(function(){
  $(".ani-pio").removeClass("active");
  $("#fix-rig").removeClass("hide");
  });
  
  
/*--------------discover-top-categories---------------*/







/*----------------------------------------*/
$(".dropdown-toggl").click(function(){
  $(".extra_me").toggleClass("show");
});
/*----------------------------------------*/

/*------------------trending course----------------------*/
$("#trdn").click(function(){
  $("#trnd_show").toggleClass("show");
});
/*-------------------trending course---------------------*/




/*--------------------li hover-------------------------*/
// Elementos del menu
let items = document.querySelectorAll('#brow_ser_hover li');

// Loopeo y agrego evento
items.forEach(item => {
  item.addEventListener('mouseenter', function() {
    item.classList.add('active');
  });

  item.addEventListener('mouseleave', function() {
    item.classList.remove('active');
  });
});
/*--------------------li hover-------------------------*/

/*--------------------Youtube popup-------------------------*/
$(function() {
    $('.popup-youtube, .popup-vimeo').magnificPopup( {
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
/*--------------------Youtube popup-------------------------*/

/*--------------------popup window Open-------------------------*/


  
function showIt() {
  var popup = document.getElementById("hid");
  popup.classList.add("new-class");
}


$("#close_delay").click(function(){
  $("#hid").removeClass("new-class");
});
setTimeout(showIt, 8000);
/*--------------------popup window Open-------------------------*/


$(window).scroll(function(){
  var sticky = $('.cour_se_fg'),
      scroll = $(window).scrollTop();

  if (scroll >= 400) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});




lazyOwl('.certification-projects-slider', {
    loop:false,
    margin:15,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})


lazyOwl('.other_cor', {
    loop:false,
    margin:15,
    nav:true,
    dots:false,
	navText: [
        '<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path></svg>',
        '<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path></svg>'
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})




lazyOwl('.test_learn_slider', {
    loop:false,
    margin:15,
    nav:true,
    dots:true,
	navText: [
        '<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path></svg>',
        '<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path></svg>'
    ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
})


/*---------------------------------------------------*/
$(window).scroll(function(){
    var sticky = $('.key_sticky'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 500) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });
  
/*---------------------------------------------------*/


$(document).ready(function(){
    $('.key_sticky ul li a').click(function(){
      $('li a').removeClass("active");
      $(this).addClass("active");
  });
  });




  $('.featcardmain').click(function() {
    if ($(this).hasClass('active')) {
        $('.featcardmain').removeClass('active');
        // hide if clicked item is currently active
    } else {
        $('.featcardmain').removeClass('active');
        // hide others
        $(this).addClass('active');
        // make currently clicked active
    }
});

$('body').click(function(evt) {
    if ($(evt.target).hasClass("featcardmain") || $(evt.target).closest('.featcardmain').length)
        return;

    $('.featcardmain').removeClass('active');
});

/*----------------------------------------------------------*/
$(function() {
	const rowsPerPage = 10;
	const rows = $('#my-table tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals
	const numbers = $('#numbers');
	
	// Generate the pagination.
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li><a href="#">' + (i+1) + '</a></li>');
	}
		
	// Mark the first page link as active.
	$('#numbers li:first-child a').addClass('active');

	// Display the first set of rows.
	displayRows(1);
	
	// On pagination click.
	$('#numbers li a').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		// Remove the active class from the links.
		$('#numbers li a').removeClass('active');
		
		// Add the active class to the current link.
		$this.addClass('active');
		
		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text());
	});
	
	// Function that displays rows for a specific page.
	function displayRows(index) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
		
		// Hide all rows.
		rows.hide();
		
		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
});


    // Select the elements
    const toggleButton = document.getElementById('header_side_togle');
    const controlButton = document.getElementById('controls');
    const slider = document.querySelector('.slider');

    // Function to add the transform style
    toggleButton.addEventListener('click', () => {
        slider.style.transform = 'translateX(1%)';
    });

    // Function to remove the transform style
    controlButton.addEventListener('click', () => {
        slider.style.transform = 'translateX(-100%)'; // Adjust as needed
    });



/*----------------------------------------------------------*/



function showCategoryCourse(THIS,catid) {			 
    var $this = $(THIS);
    $(".cortablinks").removeClass("active");    
    if (!$this.hasClass('active')) {
    $this.addClass('active');
    $('.modal-course-list .cortablinks').addClass('active');
    } 
    $.ajax({
    "url":"/get_category_course/"+catid,
    "type":"GET",
    "success":function(data,textStatus,jqXHR){
    
    if(data.length>0){
    $('.show-all-category-courses').html(data);				 
    }	}	});				
    };



$("#men_u_bar").click(function(){
  $(".nes_css").toggleClass("active");
});



	
/*---------------------------------*/
document.querySelectorAll('.main_xx_drop').forEach(drop => {
    drop.addEventListener('click', function () {
        // Agar click kiya gaya element already active hai, to active class remove karo
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            // Sabhi elements se active class remove karo
            document.querySelectorAll('.main_xx_drop').forEach(el => el.classList.remove('active'));
            
            // Click kiye huye element par active class add karo
            this.classList.add('active');
        }
    });
});


/*---------------------------------*/	


document.querySelectorAll('.crOUSE_if').forEach(button => {
    button.addEventListener('click', function() {
        // Remove 'active' class from all buttons
        document.querySelectorAll('.crOUSE_if').forEach(btn => btn.classList.remove('active'));
        
        // Add 'active' class to the clicked button
        this.classList.add('active');
    });
});



