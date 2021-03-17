jQuery(function($) {
	
	
	
	var slidefeed ={
      infinite: true,
      autoplay: false,
      arrows: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
      //prevArrow: '<button class="prev"></button>',
      //nextArrow: '<button class="next"></button>',
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
			 autoplay: false,
			fade: true,
          }
			
        },
        
     
      ]

    };
	
	var slidefeedmobile ={
		    slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
		};
	
	
    $(document).ready(function() {
		
      $('.content-slide-category-izumilano').slick(slidefeed);
		
		
		//card-category-menu
		//
		$('body').on('click', '.card-category-menu', function(e) {
			//alert('click');
           	var data = $(this).data('menu');
			var data_number = $(this).data('number');
			var data_number_slide =  Number(data_number) - 1;
			//alert(data_number);
			
            $('.content-card-menu-izumilano-preload').removeClass('open');
			//content-header-menu-izumilano
			$('.content-header-menu-izumilano').addClass('open');
			$('.close-menu-izu').addClass('open');
			//current
            $('#'+data).addClass('current');
			
			$('.content-slide-category-izumilano').slick('slickGoTo', data_number_slide);
			
			//.button-slide-category-menu.mobile-action-btn-izu
			$('input[name="curret_menuizu_card"]').val(data_number);
			
			
			//ID -> menu-izu-milano-conteiner-top
			$('html, body').animate({
                scrollTop: $("#menu-izu-milano-conteiner-top").offset().top
            }, 400);
			
			
        });
		
		$('body').on('click', '.button-slide-category-menu.next.mobile-action-btn-izu', function(e) {
			var data = $('input[name="curret_menuizu_card"]').val();
			//total_curret_menuizu_card
			var data_total = $('input[name="total_curret_menuizu_card"]').val();
			
			var data_number = Number(data) + 1;
			
			if(data_number > data_total){
				data_number = 1;
			}
			
			//alert(data_number);
			
			//content-header-menu-izumilano
			$('.menu-category-izumilano').removeClass('current');
	
			//current
            $('#menu-'+data_number).addClass('current');
			
			//.button-slide-category-menu.mobile-action-btn-izu
			//$('.button-slide-category-menu.mobile-action-btn-izu').data('number', data_number);
			$('input[name="curret_menuizu_card"]').val(data_number);
			
	//$('.content-slide-category-izumilano').slick(slidefeedmobile);
		});
		
		
		
		$('body').on('click', '.button-slide-category-menu.prev.mobile-action-btn-izu', function(e) {
			var data = $('input[name="curret_menuizu_card"]').val();
			//total_curret_menuizu_card
			var data_total = $('input[name="total_curret_menuizu_card"]').val();
			
			var data_number = Number(data) - 1;
			
			if(data_number == 0){
				data_number = data_total;
			}
			
			//alert(data_number);
			
			//content-header-menu-izumilano
			$('.menu-category-izumilano').removeClass('current');
	
			//current
            $('#menu-'+data_number).addClass('current');
			
			//.button-slide-category-menu.mobile-action-btn-izu
			//$('.button-slide-category-menu.mobile-action-btn-izu').data('number', data_number);
			$('input[name="curret_menuizu_card"]').val(data_number);
			
			//$('.content-slide-category-izumilano').slick(slidefeedmobile);
		});
		
		//item-category-menu
		
		$('body').on('click', '.item-category-menu div', function(e) {
			//alert('click');
           	var data = $(this).data('menu');
			var data_number = $(this).data('number'); 
			//alert(data_number);
			
			//content-header-menu-izumilano
			$('.menu-category-izumilano').removeClass('current');
	
			//current
            $('#'+data).addClass('current');
			
			//.button-slide-category-menu.mobile-action-btn-izu
			//$('.button-slide-category-menu.mobile-action-btn-izu').data('number', data_number);
			$('input[name="curret_menuizu_card"]').val(data_number);
        });
		
          
		
		$('body').on('click', '.close-menu-izu', function(e) {
			
          
			//content-header-menu-izumilano
			$('.menu-category-izumilano').removeClass('current');
			$('.content-header-menu-izumilano').removeClass('open');
			$('.content-card-menu-izumilano-preload').addClass('open');
			$('.close-menu-izu').removeClass('open');
			//current
           
        });
		
		//
		//
		//
		if ($(window).width() < 800) {
			$('.content-slide-category-izumilano').on('afterChange', function(event, slick, currentSlide, nextSlide){
				var dataId = $('.slick-current').attr("data-slick-index");
				var data_number_id = Number(dataId) + 1;
				//alert(data_number_id)   
				$('.menu-category-izumilano').removeClass('current');
				$('#menu-'+data_number_id).addClass('current');
				$('input[name="curret_menuizu_card"]').val(data_number_id);
			});
		}

		 
    
        
    });
	
	
	

	
	
  });


  var $ = window.jQuery;
  
  
  
  