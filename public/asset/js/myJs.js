$(document).ready(function() {
	
	new WOW().init();
	// *************************************XU LY MENU****************************************
	// $('.menu-toggle').click(function(event) {
	// 	$(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times")
	// 	$('.menu-top nav').toggleClass('active');
	// });
	// $('.icon-search').click(function(event) {
	// 	$('input.input-search').toggleClass('show-input-search');
	// 	$(this).toggleClass('zoomIn animated');

	// });

	// *************************************XU LY NUT SEARCH****************************************
	$('.icon-search-toggle').click(function(event) {
		$('.search').toggleClass('active');
		$(this).toggleClass('active icon-search-animate');
		$(".icon-search-toggle > .fa-search, .icon-search-toggle > .fa-times").toggleClass("fa-search fa-times")
	});;
	// *************************************END XU LY NUT SEARCH****************************************

	$("#respMenu").aceResponsiveMenu({
	  // Set the same in Media query  
	  resizeWidth: '768',      
	  // slow, medium, fast
	  animationSpeed: 'fast', 
	  // Expands all the accordion menu on click
	  accoridonExpAll: false 
	});

	var vt_menu_top= $('.menu-top').offset().top;


	$(window).scroll(function(event) {
		var vt_body= $('html,body').scrollTop();
		
		if(vt_body >= vt_menu_top && $(window).innerWidth() >=768){
			$('.menu-top').addClass('sticky-top');
		}else {
			$('.menu-top').removeClass('sticky-top');
		}
		if(vt_body>=1000){
			$('.back-to-top').addClass('active');
		}else {
			$('.back-to-top').removeClass('active');
		}
		if(vt_body>=500){
			$('.icon-search-toggle').addClass('show');
		}else {
			$('.icon-search-toggle').removeClass('show');
		}
	});

	$('.back-to-top').click(function(event) {
		$('html,body').animate({scrollTop: 0}, 1000,"easeOutExpo");
	});

	$('ul li.sub-menu').click(function(event) {
		event.preventDefault();
		$(this).siblings().removeClass('active');
		$(this).toggleClass('active ');
	});


	// *************************************END XU LY MENU****************************************

	// ************************************* XU LY CHI TIET SAN PHAM****************************************

	$('.image-product.owl-carousel').owlCarousel({
		items:1,
		loop:false,
		center:true,
		margin:10,
		URLhashListener:true,
		autoplayHoverPause:true,
		startPosition: 'URLHash'
	});

	$('.other-image-product ul.owl-carousel').owlCarousel({
		items:3,
		margin:20,
		autoWidth:false,
		nav:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});

	$('.sp-lien-quan.row.owl-carousel').owlCarousel({
		loop:true,
		autoplayHoverPause:true,
		autoplay:true,
		autoplayTimeout:3000,
		responsiveClass:true,
		responsive:{
			0:{
				items:2,
				nav:true,
				loop:true,
				
			},
			600:{
				items:3,
				nav:true,
				loop:true
			},
			1000:{
				items:4,
				nav:true,
				loop:true,
				navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
			}
		}
	});
	$('.image-product a').fancybox({
		openEffect : 'elastic',
		openSpeed  : 150,

		closeEffect : 'elastic',
		closeSpeed  : 150
	});

	// Check MAU SAN PHAM
	$('.pro-properties .color-name').click(function(event) {
		$('.pro-properties .color-name').removeClass('active');
		$('.pro-properties .color-name').next().removeClass('active');
		$(this).addClass('active');
		$(this).next().addClass('active');
	});

	//CHECK  SIZE SAN PHAM
	$('.pro-properties .size-name').click(function(event) {
		$('.pro-properties .size-name').removeClass('active');
		$('.pro-properties .size-name').next().removeClass('active');
		$(this).addClass('active');
		$(this).next().addClass('active');
	});

	//CHON SO LUONG SAN PHAM
	$('.group-input-number span.plus').click(function(event) {
		var value = $('.pro-properties-number .input-number').val();
		$('.pro-properties-number .input-number').val(+ value + 1);
	});
	$('.group-input-number span.minus').click(function(event) {
		var value = $('.pro-properties-number .input-number').val();
		$('.pro-properties-number .input-number').val(+Math.max(1, value -1));
	});

	$('.btn-list .btn-mo-ta').click(function(event) {
		$('.btn-list .btn-comment-fb').removeClass('active');
		$(this).addClass('active');
		$('.mo-ta .mo-ta-content').addClass('active');
		$('.mo-ta .binh-luan-fb').removeClass('active');
	});

	$('.btn-list .btn-comment-fb').click(function(event) {
		$('.btn-list .btn-mo-ta').removeClass('active');
		$(this).addClass('active');
		$('.mo-ta .binh-luan-fb').addClass('active');
		$('.mo-ta .mo-ta-content').removeClass('active');
	});


	// *************************************END XU LY CHI TIET SAN PHAM****************************************
	// *************************************XU LY Tat CA SAN PHAM****************************************

	$('.my-dropdow').click(function(event) {
		$(this).next().slideToggle(400);
		$(this).toggleClass('active');
		$(this).children('i.fa').toggleClass('active');
	});
	// *************************************END XU LY Tat CA SAN PHAM****************************************
	// *************************************XU LY LOGIN****************************************

	$('.register-title').click(function(event) {
		$('.register').addClass('active')
		$('.login').removeClass('active');
		$('.forget-p').removeClass('active');
		$(this).addClass('active');
		$('.login-title').removeClass('active');
	});

	$('.login-title').click(function(event) {
		$('.login').addClass('active')
		$('.register').removeClass('active');
		$('.forget-p').removeClass('active');
		$(this).addClass('active');
		$('.register-title').removeClass('active');
	});

	$('.content-box a').click(function(event) {
		$('.forget-p').addClass('active');
		$('.register').removeClass('active');
		$('.login').removeClass('active');
		$('.login-title').removeClass('active');
	});

	$('.icon-user, .login-modal .blurs').click(function(event) {
		$('.login-modal .blurs').toggleClass('active');
		$('.login-modal .content-box').toggleClass('active');
	});

	// *************************************END XU LY LOGIN****************************************
});

