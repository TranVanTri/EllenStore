$(document).ready(function() {
	

	// *************************************XU LY NUT SEARCH****************************************
	$('.icon-search-toggle').click(function(event) {
		$('.search').toggleClass('active');
		$(this).toggleClass('active icon-search-animate');
		$(".icon-search-toggle > .fa-search, .icon-search-toggle > .fa-times").toggleClass("fa-search fa-times");
	});;
	// *************************************END XU LY NUT SEARCH****************************************

	// *************************************XU LY MENU****************************************

	if($('.menu-top').length){
		var vt_menu_top= $('.menu-top').offset().top;
	}


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
		if(vt_body>=50){
			$('.icon-search-toggle').addClass('show');
		}else {
			$('.icon-search-toggle').removeClass('show');
		}
	});

	$('.back-to-top').click(function(event) {
		$('html,body').animate({scrollTop: 0}, 1000,"easeOutExpo");
	});

	$('.user-icon').click(function(event) {
		$('.toggle-login').toggleClass('active');
		$('.nen-xam').addClass('active');
	});

	$('.nen-xam').click(function(event) {
		$(this).removeClass('active');
		$('.toggle-login').removeClass('active');
		$('.cart').removeClass('active');
	});

	$('.cart-icon').click(function(event) {
		$('.cart').addClass('active');
		$('.nen-xam').addClass('active');
	});
	$('.cart-close').click(function(event) {
		$('.cart').removeClass('active');
		$('.nen-xam').removeClass('active');
	});




	// *************************************END XU LY MENU****************************************

	// **********************XU LY CHATBOX***********************

	$('.icon-chatbox, .close-chatbox').click(function(event) {
		$('.chatbox').toggleClass('chatbox-hide');
		
	});
	// **********************END XU LY CHATBOX***********************

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

	$('.banner.owl-carousel').owlCarousel({
		items:1,
		loop:true,
		autoplayHoverPause:true,
		autoplay:true,
		autoplayTimeout:4000,
		animateOut:'slideOutRight',
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

	$('.promotion.row.owl-carousel').owlCarousel({
		loop:true,
		autoplayHoverPause:true,
		autoplay:true,
		autoplayTimeout:5000,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				loop:true,
				
			},
			600:{
				items:1,
				loop:true
			},
			1000:{
				items:2,
				loop:true,
			}
		}
	});

	// $(document).on('click', '.san-pham .other-image-product ul li a', function(event) {
	// 	event.preventDefault();
		
	// });
	$('.image-product a').fancybox({
		openEffect : 'elastic',
		openSpeed  : 150,

		closeEffect : 'elastic',
		closeSpeed  : 150
	});

	$('.san-pham .other-image-product ul li a').fancybox({
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
		$('.input-check').removeAttr('checked');
		$(this).addClass('active');
		$(this).next().addClass('active');
		$(this).prev().attr('checked','true');
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

	$('.dropdown-cate-pro').click(function(event) {
		event.preventDefault();
		$(this).next().slideToggle(400);
		$(this).children('.fa-minus-square-o, .fa-plus-square-o').toggleClass('fa-minus-square-o fa-plus-square-o');
	});

	// *************************************END XU LY Tat CA SAN PHAM****************************************
	// *************************************XU LY LOGIN****************************************

	//validation

	// $('input').on('blur', function() {

 //    	if($("#formLogin").length){
 //    		if ($("#formLogin").valid()) {
 //            	$('#submit').prop('disabled', false);  
	//         } else {
	//             $('#submit').prop('disabled', 'disabled');
	//         }
 //    	}
 //    	if($("#formRegister").length){
 //    		if ($("#formRegister").valid()) {
 //            	$('#submit').prop('disabled', false);  
	//         } else {
	//             $('#submit').prop('disabled', 'disabled');
	//         }
 //    	}
 //    });



 	jQuery.validator.addMethod("characterAndNumberAndDash", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s\/]+$/i.test(value);
	}, "Chỉ nhập kí tự bao gồm chữ thường, chữ hoa, số và dấu gạch ngang."); 

	jQuery.validator.addMethod("password", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z\d]+$/i.test(value);
	}, "Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.");

	jQuery.validator.addMethod("NumberOnly", function(value, element) {
	  return this.optional(element) || /^[\d]+$/i.test(value);
	}, "Chỉ nhập số."); 

	jQuery.validator.addMethod("characterOnly", function(value, element) {
	  return this.optional(element) || 
	  /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i.test(value);
	}, "Chỉ nhập chữ thường và chữ hoa");  

	jQuery.validator.addMethod("customUrl", function(value, element) {
	  return this.optional(element) || 
	  /^[a-zA-Z_\.\:\/\-\d]+$/i.test(value);
	}, "Url không hợp lệ.");  

	//formLogin
	$('#formLogin').validate({
		rules: {
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
				minlength:6,
				maxlength:50,
				password:true,
			},

		},
		messages: {
			
			email:{
				required: 'Bạn chưa nhập email.',
				email: 'Bạn chưa nhập đúng định dạng email',
			},
			password:{
				required: 'Bạn chưa nhập mật khẩu.',
				minlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				maxlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
			},
			
		}		
	});

	//formRegister
	$('#formRegister').validate({
		rules: {
			email:{
				required:true,
				email:true,
			},
			name:{
				required:true,
				characterOnly:true,
			},
			password:{
				required:true,
				minlength:6,
				maxlength:50,
				password:true
			},
			repassword:{
				equalTo: '#password',
				required: true,
				minlength:6,
				maxlength:50
			},
			address:{
				required:true,
				characterAndNumberAndDash:true,
				minlength:3,
				maxlength:100
			},
			phone:{
				required:true,
				maxlength:11,
				minlength:10,
				NumberOnly: true
			}

		},
		messages: {
			
			email:{
				required: 'Bạn chưa nhập email.',
				email: 'Bạn chưa nhập đúng định dạng email'
			},
			password:{
				required: 'Bạn chưa nhập mật khẩu.',
				minlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				maxlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
			},
			repassword:{
				required: 'Bạn chưa nhập lại mật khẩu.',
				minlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				maxlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				equalTo : 'Mật khẩu chưa trùng khớp.'
			},
			address: {
				required: 'Bạn chưa nhập địa chỉ.',
				minlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
				maxlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
			},
			phone:{
				required: 'Bạn chưa nhập số điện thoại.',
				maxlength: 'Số điện thoại có độ dài từ 10-11 kí số.',
				minlength: 'Số điện thoại có độ dài từ 10-11 kí số.'
			}
		}		
	});

	$('#formOrder').validate({
		rules: {
			email:{
				required:true,
				email:true,
			},
			name:{
				required:true,
				characterOnly:true,
			},
			
			address:{
				required:true,
				characterAndNumberAndDash:true,
				minlength:3,
				maxlength:100
			},
			phone:{
				required:true,
				maxlength:11,
				minlength:10,
				NumberOnly: true
			}

		},
		messages: {
			
			email:{
				required: 'Bạn chưa nhập email.',
				email: 'Bạn chưa nhập đúng định dạng email'
			},

			name:{
				required: 'Bạn chưa nhập tên.',
				
			},
			
			address: {
				required: 'Bạn chưa nhập địa chỉ.',
				minlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
				maxlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
			},
			phone:{
				required: 'Bạn chưa nhập số điện thoại.',
				maxlength: 'Số điện thoại có độ dài từ 10-11 kí số.',
				minlength: 'Số điện thoại có độ dài từ 10-11 kí số.'
			}
		}		
	});

	// *************************************END XU LY LOGIN****************************************
	
});
