$(document).ready(function() {

	if($('#datetimepicker1').length){
	 	$('#datetimepicker1').datetimepicker({
	 		format:"DD-MM-YYYY HH:mm:ss",
	 	});
	}

	if($('#datetimepicker2').length){
	 	$('#datetimepicker2').datetimepicker({
	 		format:"DD-MM-YYYY HH:mm:ss",
	 	});
	}


	if($('#detail').length){
	 	CKEDITOR.replace('detail');
	}
	//multiselect
	if($('.demo').length){
	 	$('.demo').fSelect();
	}

	if($('.ckfinder-popup').length){
	 	var dem = $('.ckfinder-popup').length;
	}
	 

	//xu xu chon anh
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
		 		'<input id="ckfinder-input-'+dem+'" type="hidden" class="form-control" required placeholder="Chọn hình ảnh" maxlength="90" name="otherimg[]">'+
		 		'<div><img id="img-pro-'+dem+'" src="upload\\images\\image-icon.png"  alt="" class="img-edit img-fluid"></div>'+
		 		' <button class="btn btn-info ckfinder-popup" data-toggle="modal" data-target="#myModal" type="button">Chọn ảnh</button>'+		 				 		
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


	function initUpload(){
		list_image('sanpham');
		list_image('danhmuc');
		list_image('khuyenmai');
		list_image('slide');

	}

	

	$(document).on('click', '#sanpham2', function(event) {
		event.preventDefault();
		var data = $(this).attr('data')
		$('#cartegory-upload').attr('cartegory', data);
	});
	$(document).on('click', '#danhmuc2', function(event) {
		event.preventDefault();
		var data = $(this).attr('data')
		$('#cartegory-upload').attr('cartegory', data);
	});
	$(document).on('click', '#khuyenmai2', function(event) {
		event.preventDefault();
		var data = $(this).attr('data')
		$('#cartegory-upload').attr('cartegory', data);
	});
	$(document).on('click', '#slide2', function(event) {
		event.preventDefault();
		var data = $(this).attr('data')
		$('#cartegory-upload').attr('cartegory', data);
	});

	function tatthongbao(){
		if ($('#success').length) {
			$('#success').hide();
		}
		if ($('#fail').length) {
			$('#fail').hide();
		}
		if ($('#delete-success').length) {
			$('#delete-success').hide();
		}
		if ($('#no-choise').length) {
			$('#no-choise').hide();
		}

	}
	tatthongbao();

	function list_image(category)
	 {
		$.ajax({
		   url:"admin/imageview/"+category,
		   success:function(data){
		    $('#'+category).html(data);
		   }
		});
	 }
	if ($('#my-dropzone').length) {
		var category1 = '';

		
		var myDropzone = new Dropzone("#my-dropzone", {
			url: "admin/imageupload",
			paramName: "files",
			// params: {category:category1},
			uploadMultiple:true,
			addRemoveLinks: true,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			dictRemoveFile: "Remove",
			maxFilesize: 3,
			maxFiles: 10,
			autoProcessQueue: false,
		    acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
		    dictFileTooBig:"Ảnh lớn hơn 3MB",

		  	init: function(){
			   	var submitButton = document.querySelector('#submit-all');
			   	myDropzone1 = this;
			   	submitButton.addEventListener("click", function(){			    	
						category1 = $('#cartegory-upload').attr('cartegory');

						myDropzone1.on("sending", function(file, xhr, formData){							
		                formData.append("category", category1);

		        	});					 
						
					myDropzone1.processQueue();	
								

			   	});
			   	
			   	this.on("complete", function(data){
			   		if ($('#success').length) {
						$('#success').show();
					}
				    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
				    {
				     	var _this = this;
				     	_this.removeAllFiles();
				    }
				    	list_image(category1);
				    	// console.log(data);
			   	});			   	
		  	},
		  	
            error: function (file, response) {
		        tatthongbao();
		        if ($('#fail').length) {
					$('#fail').show();
				}
		    },
		    success: function(file, response){
                // console.log('WE NEVER REACH THIS POINT.');
                // alert(response);
            }
		});
	}


	$(document).on('click', '.remove_image', function(){
		tatthongbao();
	  	var imageName = $(this).attr('id');
	  	var category = $(this).attr('data');
	  	// console.log(imageName);
	  	$.ajax({
		   url:"admin/imageremove",
		   method:"POST",
		   data:{
		   	name:imageName,
		   	category:category,
		   },
		   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		   success:function(data){
		   	if ($('#delete-success').length) {
				$('#delete-success').show();
			}
		     list_image(category);
		   }
		});
	});

	$(document).on('blur', '#myModal', function(event) {	
		tatthongbao();
	});

	//Chon hinh

	$(document).on('click', '.card', function(event) {
		$('.card').removeClass('active-box-shadow');
		$(this).addClass('active-box-shadow');
	});

	//set anh cho input

	function setImage(inputID,imgID,data){
		var input = document.getElementById(inputID);
		input.value = data;
		var image = document.getElementById(imgID);
		image.setAttribute('src', data);
	}

	function selectFileWithMyUpload(inputID,imgID){
		if($('.card.active-box-shadow img').length){
		    	var data =  $('.card.active-box-shadow img').attr('src');
			    setImage(inputID, imgID, data);
			    $('#myModal').modal('toggle');
		    }else {
		    	tatthongbao();
		    	if ($('#no-choise').length) {
					$('#no-choise').show();
				}
		    }
		    $('.card').removeClass('active-box-shadow');
	}
	//set anh cho danh muc san pham

	$(document).on('click', '#ckfinder-popup-cate-pro', function(event) {
		event.preventDefault();
		initUpload();
	});
	if($('#ckfinder-input-cate-pro').length){
        $(document).on('click', '#choise', function(event) {
		    event.preventDefault();
		    selectFileWithMyUpload('ckfinder-input-cate-pro', 'img-cate-pro');
	    });
	}

	//set anh cho slide

	$(document).on('click', '#ckfinder-popup-slide', function(event) {
		event.preventDefault();
		initUpload();
	});
	if($('#ckfinder-input-slide').length){
        $(document).on('click', '#choise', function(event) {
		    event.preventDefault();
		    selectFileWithMyUpload('ckfinder-input-slide', 'img-slide');		    
	    });
	}

	//set anh cho promotion

	$(document).on('click', '#ckfinder-popup-promotion', function(event) {
		event.preventDefault();
		initUpload();
	});
	if($('#ckfinder-input-promotion').length){
        $(document).on('click', '#choise', function(event) {
		    event.preventDefault();
		    selectFileWithMyUpload('ckfinder-input-promotion', 'img-promotion');		    
	    });
	}

	//set anh cho sanpham

	// $(document).on('click', '#ckfinder-popup-avatar-pro', function(event) {
	// 	event.preventDefault();
	// 	initUpload();

	// });
	// if($('#ckfinder-input-avatar-pro').length){
	// 	// var button_avatar_pro = do
 //        $(document).on('click', '#choise', function(event) {
	// 	    event.preventDefault();
	// 	    selectFileWithMyUpload('ckfinder-input-avatar-pro', 'img-avatar-pro');		    
	//     });
	// }

    
	//set anh cho other image san pham
	var inputOtherID='ckfinder-input-1';
	var imgOtherID= 'img-pro-1';
    $(document).on('click', "button.ckfinder-popup", function() {
    	event.preventDefault();
    	initUpload();
	    inputOtherID = $(this).siblings('input.form-control').attr('id');
	    imgOtherID = $(this).prev().children('img.img-edit').attr('id');
	    // console.log(inputOtherID);      
	});

	if($('#'+inputOtherID).length && $('#'+imgOtherID).length){
        $(document).on('click', '#choise', function(event) {
		    event.preventDefault();
		    console.log(inputOtherID);
		    console.log(imgOtherID);
		    selectFileWithMyUpload(inputOtherID, imgOtherID);		    
	    });
	}


    //ajax lấy bill detail
    $(document).on('click', "button.viewDetail", function() {
	    var idBill = $(this).attr('data');
        $.get('admin/bill/view-bill-detail/'+ idBill, function(data) {
            $('#billDetail').html(data);            
        });
	});
    //ajax lấy history category group
	$(document).on('click', "button.view-history-cate-group", function() {
	    var idCateG = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/categorygroup/view-history-cate-group/'+ idCateG, 
	    	success: function(data){
            	table.DataTable().destroy();
	            $('#cateGroupHistory').html(data);      

	            setTimeout(function() {

	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	            
	            
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});



	//ajax lấy history size
	$(document).on('click', "button.view-history-size", function() {
	    var idsize = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/size/view-history-size/'+ idsize, 
	    	success: function(data){
            	table.DataTable().destroy();
	            $('#sizeHistory').html(data);      

	            setTimeout(function() {

	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	            
	            
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});
	
	//ajax lấy history category product
	$(document).on('click', "button.view-history-cate-product", function() {
	    var idCate = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/categoryproduct/view-history-cate-product/'+ idCate, 
	    	success: function(data){
            	table.DataTable().destroy();
	            $('#cateProductHistory').html(data);      

	            setTimeout(function() {

	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	            
	            
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});


	

	//ajax lấy history slide
	$(document).on('click', "button.view-history-slide", function() {
	    var idSlide = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/slide/view-history-slide/'+ idSlide, 
	    	success: function(data){
            	table.DataTable().destroy();
	            $('#slideHistory').html(data);        

	            setTimeout(function() {
	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	            
	            
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});

	//ajax lấy history product
	$(document).on('click', "button.view-history-pro", function() {
	    var idPro = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/product/view-history-pro/'+ idPro, 
	    	success: function(data){
            	table.DataTable().destroy();            	
	            $('#proHistory').html(data);      
	            

	            setTimeout(function() {

	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	   
				      
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});

	

	//ajax lấy history promotion
	$(document).on('click', "button.view-history-promotion", function() {
	    var idPromotion = $(this).attr('data');
	    var table = $('#dataTables-history');
	    var loadding = $('#loadding');
	    var error = $('#error');
	    table.hide();
	    loadding.show();
	    error.hide();
	    
	    $.ajax({
	    	type: "get",
	    	url: 'admin/promotion/view-history-promotion/'+ idPromotion, 
	    	success: function(data){
            	table.DataTable().destroy();
	            $('#promotionHistory').html(data);        

	            setTimeout(function() {
	            	table.DataTable({
		                responsive: true,              
		            });
				    table.show();
				    loadding.hide();
				}, 800);	            
	            
        	},
        	error: function() {
        		setTimeout(function() {
	            	loadding.hide();
		        	error.show();
				}, 800);
        		
		    },
    	});        
	});

    //VALIDATION

    
    // $('input').on('blur', function() {

    // 	if($("#formCategoryGroup").length){
    // 		if ($("#formCategoryGroup").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formCategoryProduct").length){
    // 		if ($("#formCategoryProduct").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formProduct").length){
    // 		if ($("#formProduct").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formBill").length){
    // 		if ($("#formBill").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formSlide").length){
    // 		if ($("#formSlide").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formUser").length){
    // 		if ($("#formUser").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}if($("#formAdmin").length){
    // 		if ($("#formAdmin").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formSize").length){
    // 		if ($("#formSize").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}

    // 	if($("#formPromosition").length){
    // 		if ($("#formPromosition").valid()) {
    //         	$('#submit').prop('disabled', false);  
	   //      } else {
	   //          $('#submit').prop('disabled', 'disabled');
	   //      }
    // 	}
        
    // });

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
			// sale: {
			// 	digits:true,
			// 	required:true,
			// 	maxlength: 10
			// },
			// size: {
			// 	required:true,				
			// 	characterOnly:true
			// },
			// color: {
			// 	required:true,				
			// 	characterOnly:true
			// },
			describe: {
				required:true,
				maxlength: 100,
				
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
			// sale: {
			// 	digits: "Giá sản phẩm không âm.",	
			// 	required: "Vui lòng nhập giá sản phẩm.",
			// 	number:"Vui lòng chỉ nhập số",
			// 	maxlength:"Giá sản phẩm quá 10 kí số"		
			// },
			// size: {
			// 	required: "Vui lòng nhập size sản phẩm.",				
			// 	maxlength: "Tên sản phẩm có độ dài 1-2 kí tự.",				
			// },
			// color: {
			// 	required: "Vui lòng nhập màu cho sản phẩm.",				
			// 	maxlength: "Màu sản phẩm có độ dài 1-5 kí tự.",				
			// },
			describe: {
				required: "Vui lòng nhập mô tả sản phẩm.",
				
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

	//#formCategoryGroup
	$('#formCategoryGroup').validate({
		rules: {
			Ten: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:2			
			},					
		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên danh mục.',
				maxlength: 'Tên danh mục có độ dài 2-100 kí tự.',
				minlength: 'Tên danh mục có độ dài 2-100 kí tự.'				
			},
			
		},		
	});

	// #formCategoryProduct
	$('#formCategoryProduct').validate({
		rules: {
			Ten: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:2			
			},	
			image: {
				customUrl:true,
				required:true,
				maxlength: 190,
			},				
		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên danh mục.',
				maxlength: 'Tên danh mục có độ dài 2-100 kí tự.',
				minlength: 'Tên danh mục có độ dài 2-100 kí tự.'				
			},
			image: {
				required: "Vui lòng chọn ảnh sản phẩm.",				
				maxlength: "Url sản phẩm có độ dài 190 kí tự.",				
			},
			
		},		
	});

	$('#formPromosition').validate({
		rules: {
			Ten: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:100,
				minlength:2			
			},					
		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên khuyến mãi.',
				maxlength: 'Tên khuyến mãi có độ dài 2-100 kí tự.',
				minlength: 'Tên khuyến mãi có độ dài 2-100 kí tự.'				
			},
			
		},		
	});

	//formSize
	$('#formSize').validate({
		rules: {
			Ten: {
				characterAndNumberAndDash:true,
				required:true,
				maxlength:3,
				minlength:1			
			},					
		},
		messages: {
			Ten: {				
				required: 'Vui lòng nhập tên size.',

				maxlength: 'Tên size có độ dài 1-3 kí tự.',
				minlength: 'Tên size có độ dài 1-3 kí tự.'				

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
			link: {
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
			link: {				
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
	$('#formUser, #formAdmin').validate({
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
				required: 'Vui lòng nhập tên.',
				maxlength: 'Tên có độ dài 3-100 kí tự.',
				minlength: 'Tên có độ dài 3-100 kí tự.'				
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

	// //Xử lý chọn sản phẩm trang khuyren mãi

	// $('.checkbox-sp').change(function(event) {
	// 	var id = $(this).attr('attrId');		
	// 	if($(this).is(":checked")){		
	// 		var name = $(this).attr('attrName');
	// 		$('#tag').append(
	// 			'<div class="sp-'+id+'" style="margin-right: 5px;margin-bottom: 5px; float:left;">'+
	// 			'<input type="hidden" name="sp[]"'+
	// 			'value="'+id +'"><span class="btn btn-primary">'+name+' <i class="fa fa-times" ></i></span></input>'+
	// 			'</div>'
	// 		);
	// 	}else{		
	// 		$('.sp-'+id).remove();			
	// 	}

	// });
	// $(document).on('click', '#tag i.fa', function(event) {
	// 	var id = $(this).parent().prev().val();
	// 	$('.check-sp-'+id).prop('checked', false);
	// 	$('.sp-'+id).remove();	
	// });

});

//