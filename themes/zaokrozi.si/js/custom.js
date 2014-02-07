jQuery(document).ready(function ($) {

/* Contact Form */
//var $contactform  = $('#contact-form'),
//    $success    = '<strong>Successfully!</strong> Your message has been sent. Thank you for using our contact form! We will contact you soon.';
//	$error      = '<strong>Error!</strong> Required fields are not filled or filled incorrectly, please send a check and try again.';
//   
//    $contactform.submit(function(){
//        $.ajax({
//            type: "POST",
//            url: "php/contact.php",
//            data: $(this).serialize(),
//            success: function(msg) {
//                if (msg == 'SEND') {
//                    response = '<div class="successfully">'+ $success +'</div>';
//                }
//                else {
//                    response = '<div class="error">'+ $error +'</div>';
//                }
//                $(".error,.successfully").remove();
//                $contactform.prepend(response);
//            }
//         });
//        return false;
//    });

$(window).stellar();

    var links = $('.navigation').find('li');
    slide = $('.slide');
    button = $('.button');
    mywindow = $(window);
    htmlbody = $('html,body');
	
    slide.waypoint(function (event, direction) {

        dataslide = $(this).attr('data-slide');

        if (direction === 'down') {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
			$('.navigation li[data-slide="1"]').removeClass('active');
        }
        else {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');
        }
    });
 
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-slide="1"]').addClass('active');
            $('.navigation li[data-slide="2"]').removeClass('active');
        }
    });
	
	function goToByScroll(dataslide) {
		var goal = $('.slide[data-slide="' + dataslide + '"]').offset().top;
		if (mywindow.scrollTop()<goal) {
			var goalPx = goal + 1;
		} else {
			var goalPx = goal - 1;
		}
        htmlbody.animate({
            scrollTop: goalPx
        }, 2500, 'easeInOutQuint');
    }
	
	links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);

    });
	
	// Blog
		$(".blog-container").eq(0).addClass("active");
		$(".blog .blog-content").eq(0).show();
	
		$(".blog-container").click(function(){
			$(this).next(".blog-content").slideToggle("fast")
			.siblings(".blog-content:visible").slideUp("fast");
			$(this).toggleClass("active");
			$(this).siblings(".blog-container").removeClass("active");
		});
		
	// prettyPhoto
		$("a[rel^='prettyPhoto']").prettyPhoto();
	
	// Sticky Navigation	
		$(".menu").sticky({topSpacing:0});

	$("#slide1, #selide3, #slide5, #slide7, #slide12, #slide13, #slide14").each(function () {
        var slide_h = $(this).height();
		
		$(this).css('background-size', '100% '+slide_h+'px');
		
    });
});

// Sort Portfolio 
$(function(){
        
  var $container = $('.projects');

  $container.isotope({
	itemSelector : '.element'
  });
    
  var $optionSets = $('#options .option-set'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = $(this);

	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected');
	$this.addClass('selected');

	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  
	  changeLayoutMode( $this, options )
	} else {
	  
	  $container.isotope( options );
	}
	
	return false;
  }); 
});