$(document).ready(function() {

	if($('#detail').length){
	 	CKEDITOR.replace('detail');
	}
	if($('.ckfinder-popup').length){
	 	var dem = $('.ckfinder-popup').length;
	}
	 
	if(dem == 1){
	 	$('#xoa-anh').attr('disabled', 'disabled');
	}
	 $('#them-anh').click(function() {
	 	if(dem == 5){
	 		$(this).attr('disabled', 'disabled');
	 	}
	 	else{
	 		dem++;
	 		$('#xoa-anh').removeAttr('disabled');
		 	$('#group-img').append(
		 		'<div class="form-group">'+
		 		'<div class="input-group">'+
		 		'<input id="ckfinder-input-'+dem+'" type="text" class="form-control" required placeholder="Chọn hình ảnh" maxlength="90" name="otherimg[]">'+
		 		'<div class="input-group-btn">'+
		 		' <button class="btn btn-primary ckfinder-popup" type="button">Browse Server</button>'+
		 		'</div>'+		 		
		 		'</div>'+
		 		'</div>'
		 	);
		 	if(dem == 5){
	 		$(this).attr('disabled', 'disabled');
	 	}
	 	}	 	
	 });

	 $('#xoa-anh').click(function(event) {
	 	if(dem == 1){
	 		$(this).attr('disabled', 'disabled');
	 	}
	 	else{	 		
	 		$('#them-anh').removeAttr('disabled');
	 		$('#group-img').children('div.form-group:nth-child('+(dem)+')').remove();
	 		dem--;
	 		//console.log(dem);
	 		if(dem == 1){
	 		$(this).attr('disabled', 'disabled');
	 	}
	 	}
	 });

	if($('#ckfinder-popup-avatar').length){
	 	var button1 = document.getElementById( 'ckfinder-popup-avatar' );
	    // var button2 = document.getElementById( 'ckfinder-popup-2' );

	    button1.onclick = function() {
	        selectFileWithCKFinder( 'ckfinder-input-avatar' );
	    };
	}

	if($('#ckfinder-popup-slide').length){
	 	var button1 = document.getElementById( 'ckfinder-popup-slide' );
	    // var button2 = document.getElementById( 'ckfinder-popup-2' );

	    button1.onclick = function() {
	        selectFileWithCKFinder( 'ckfinder-input-slide' );
	    };
	}
    

    $(document).on('click', "button.ckfinder-popup", function() {
	    var inputName = $(this).parent().siblings('input.form-control').attr('id');
    	//console.log(inputName);
    	selectFileWithCKFinder( inputName );      
	});
	

    function selectFileWithCKFinder( elementId ) {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }


    //ajax lấy bill detail
    $(document).on('click', "button.viewDetail", function() {
	    var idBill = $(this).attr('data');
        $.get('admin/bill/view-bill-detail/'+ idBill, function(data) {
            $('#billDetail').html(data);
        });
	});


    //VALIDATION

    
    $('input').on('blur', function() {

    	if($("#formCategoryGroup").length){
    		if ($("#formCategoryGroup").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}

    	if($("#formCategoryProduct").length){
    		if ($("#formCategoryProduct").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}

    	if($("#formProduct").length){
    		if ($("#formProduct").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}

    	if($("#formBill").length){
    		if ($("#formBill").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}

    	if($("#formSlide").length){
    		if ($("#formSlide").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}

    	if($("#formUser").length){
    		if ($("#formUser").valid()) {
            	$('#submit').prop('disabled', false);  
	        } else {
	            $('#submit').prop('disabled', 'disabled');
	        }
    	}
        
    });

    jQuery.validator.addMethod("characterAndNumberAndDash", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i.test(value);
	}, "Chỉ nhập kí tự bao gồm chữ thường, chữ hoa, số và dấu gạch ngang."); 

	jQuery.validator.addMethod("password", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z\d]+$/i.test(value);
	}, "Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.");

	jQuery.validator.addMethod("NumberOnly", function(value, element) {
	  return this.optional(element) || /^[\d]+$/i.test(value);
	}, "Chỉ nhập số."); 

	jQuery.validator.addMethod("characterOnly", function(value, element) {
	  return this.optional(element) || 
	  /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i.test(value);
	}, "Chỉ nhập chữ thường và chữ hoa");  

	jQuery.validator.addMethod("customUrl", function(value, element) {
	  return this.optional(element) || 
	  /^[a-zA-Z_\.\:\/\-\d]+$/i.test(value);
	}, "Url không hợp lệ.");  


	//form Product
	$('#formProduct').validate({
		rules: {
			name: {
				required:true,
				maxlength: 100,
				minlength:3,
				characterAndNumberAndDash:true
			},
			price: {
				digits:true,
				required:true,
				maxlength: 10,
				minlength:4
			},
			sale: {
				digits:true,
				required:true,
				maxlength: 10
			},
			// size: {
			// 	required:true,				
			// 	characterOnly:true
			// },
			color: {
				required:true,				
				characterOnly:true
			},
			describe: {
				required:true,
				maxlength: 100,
				minlength:80,
				characterAndNumberAndDash:true
			},
			avatar: {
				customUrl:true,
				required:true,
				maxlength: 190,
			},
			"otherimg[]": {
				customUrl:true,
				required:true,				
			},
			
		},
		messages: {
			name: {
				required: "Vui lòng nhập tên sản phẩm.",
				minlength: "Tên sản phẩm có độ dài 3-100 kí tự.",
				maxlength: "Tên sản phẩm có độ dài 3-100 kí tự.",				
			},
			price: {
				digits: "Giá sản phẩm không âm.",	
				required: "Vui lòng nhập giá sản phẩm.",
				number:"Vui lòng chỉ nhập số.",
				maxlength:"Giá sản phẩm từ 4-10 kí số.",
				minlength:"Giá sản phẩm từ 4-10 kí số."	
			},
			sale: {
				digits: "Giá sản phẩm không âm.",	
				required: "Vui lòng nhập giá sản phẩm.",
				number:"Vui lòng chỉ nhập số",
				maxlength:"Giá sản phẩm quá 10 kí số"		
			},
			// size: {
			// 	required: "Vui lòng nhập size sản phẩm.",				
			// 	maxlength: "Tên sản phẩm có độ dài 1-2 kí tự.",				
			// },
			color: {
				required: "Vui lòng nhập màu cho sản phẩm.",				
				maxlength: "Màu sản phẩm có độ dài 1-5 kí tự.",				
			},
			describe: {
				required: "Vui lòng nhập mô tả sản phẩm.",
				minlength: "Mô tả sản phẩm có độ dài 80-100 kí tự.",
				maxlength: "Mô tả sản phẩm có độ dài 80-100 kí tự.",				
			},
			avatar: {
				required: "Vui lòng chọn ảnh sản phẩm.",				
				maxlength: "Url sản phẩm có độ dài 190 kí tự.",				
			},
			"otherimg[]": {
				required: "Vui lòng chọn ảnh sản phẩm.",						
			},

		},
		
	}); 	

	//formBill
	$('#formBill').validate({
		rules: {
			email: {
				email:true,
				required:true,
				maxlength:30				
			},
			phone: {
				digits:true,
				required:true,
				maxlength: 11				
			},
			addRess: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength: 100
			},		
			
		},
		messages: {
			email: {
				email:"Email không hợp lệ",
				required:"Vui lòng điền email.",
				maxlength: "Email có độ dài từ 10-30 kí tự."			
			},
			phone: {
				digits:"true",
				required:"Vui lòng nhập số điện thoại.",
				maxlength: "Số điện thoại không vượt quá 10 kí số."				
			},
			addRess: {				
				required:"Vui lòng nhập địa chỉ.",
				maxlength: "Địa chỉ có độ dài không quá 100 kí tự."
			},		

		},
		
	}); 

	//formBill
	$('#formCategoryGroup, #formCategoryProduct').validate({
		rules: {
			Ten: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:3				
			},					
		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên nhóm danh mục.',
				maxlength: 'Tên nhóm danh mục có độ dài 3-100 kí tự.',
				minlength: 'Tên nhóm danh mục có độ dài 3-100 kí tự.'				
			},
			
		},		
	});

	//formSlide
	$('#formSlide').validate({
		rules: {
			tieude: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:6				
			},	
			des: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:6				
			},	
			img: {
				customUrl:true,
				required:true,
				maxlength:190,
				minlength:6				
			},	

		},
		messages: {
			tieude: {				
				required: 'Vui lòng nhập tiêu đề.',
				maxlength: 'Tiêu đề có độ dài 6-100 kí tự.',
				minlength: 'Tiêu đề có độ dài 6-100 kí tự.'				
			},
			des: {				
				required: 'Vui lòng nhập mô tả.',
				maxlength: 'Mô tả có độ dài 6-100 kí tự.',
				minlength: 'Mô tả có độ dài 6-100 kí tự.'				
			},
			img: {				
				required: 'Vui lòng chọn ảnh.',
				maxlength: 'Url có độ dài 6-100 kí tự.',
				minlength: 'Url có độ dài 6-100 kí tự.'				
			},
			
		},		
	});

	//formUser
	$('#formUser').validate({
		rules: {
			Ten: {
				characterOnly:true,
				required:true,
				minlength:3				
			},
			Email:{
				required:true,
				email:true,
			},
			Password:{
				required:true,
				minlength:6,
				maxlength:50,
				password:true
			},
			PasswordAgain:{
				equalTo: '#password',
				required: true,
				minlength:6,
				maxlength:50
			},
			DiaChi:{
				characterAndNumberAndDash:true,
				minlength:3,
				maxlength:100
			},
			SoDT:{
				maxlength:11,
				minlength:6,
				NumberOnly: true
			}

		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên nhóm danh mục.',
				maxlength: 'Tên nhóm danh mục có độ dài 3-100 kí tự.',
				minlength: 'Tên nhóm danh mục có độ dài 3-100 kí tự.'				
			},
			Email:{
				required: 'Bạn chưa nhập email.',
				email: 'Bạn chưa nhập đúng định dạng email'
			},
			Password:{
				required: 'Bạn chưa nhập mật khẩu.',
				minlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				maxlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
			},
			PasswordAgain:{
				required: 'Bạn chưa nhập lại mật khẩu.',
				minlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				maxlength: 'Mật khẩu có độ dài từ 6-50 ký tự.',
				equalTo : 'Mật khẩu chưa trùng khớp.'
			},
			DiaChi: {
				minlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
				maxlength: 'Địa chỉ có dộ dài từ 3-100 kí tự.',
			},
			SoDT:{
				maxlength: 'Số điện thoại có độ dài từ 6-11 kí số.',
				minlength: 'Số điện thoại có độ dài từ 6-11 kí số.'
			}
		}		
	});


	//Hien ẩn đổi mật khẩu user phần admin
	$("#groupPassword").hide();
	$("#changepass").change(function() {
		if($(this).is(":checked")){
			$("#groupPassword").append(
				' <div class="form-group">'+
				'<label>Mật khẩu</label>'+
				'<input id="password" class="form-control" type="password" required minlength="6" maxlength="50" name="Password" placeholder="Nhập mật khẩu" />'+
				'</div>'+
				'<div class="form-group">'+
				'<label>Nhập lại mật khẩu</label>'+
				'<input class="form-control" type="password" required minlength="6" maxlength="50" name="PasswordAgain" placeholder="Nhập lại mật khẩu"/>'+
				'</div>'
			);	
			$("#groupPassword").show('slow/400/fast');		
		}else {
			$("#groupPassword").hide('slow/400/fast');
			$("#groupPassword").children().remove();
		}
	});

});