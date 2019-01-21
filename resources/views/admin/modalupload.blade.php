<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-lg">
	    <!-- Modal content-->
	    <div class="modal-content">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tải lên</h4>
		    </div>
	      	<div class="modal-body">   
	      		<div class="container-fluid">
		      		<div class="alert alert-success" id="success">Tải lên thành công</div>  
		      		<div class="alert alert-success" id="delete-success">Xóa thành công</div>  
		      		<div class="alert alert-danger" id="fail">Đã có lỗi xảy ra</div>  
		      		<div class="alert alert-danger" id="no-choise">Bạn chưa chọn ảnh</div>  									      	
					<div class="dropzone" id="my-dropzone"></div>	
					<div align="center" style="margin-top: 2px;">
						<div id="cartegory-upload" cartegory="sanpham"></div>
				    	<button type="button" class="btn btn-success btn-block" id="submit-all">Upload</button>
				   	</div>
					
					<div style="border: 1px solid #ddd;padding: 5px; margin-top: 2px;">
						<ul class="nav nav-tabs">
							<li class="active"><a id="sanpham2" data="sanpham" data-toggle="tab" href="#sanpham">Sản phẩm</a></li>
							<li><a id="danhmuc2" data-toggle="tab" data="danhmuc" href="#danhmuc">Danh mục</a></li>
							<li><a id="khuyenmai2" data-toggle="tab" data="khuyenmai" href="#khuyenmai">Khuyến mãi</a></li>
							<li><a id="slide2" data-toggle="tab" data="slide" href="#slide">Slide</a></li>
						</ul>

						<div class="tab-content">
						    <div id="sanpham" class="tab-pane fade in active stroll-div">
						    	<div class="row">
						    		<div class="col-lg-2">
						    			<div class="card">
											<img src="upload/images/sanpham/12u-619x794.jpg" alt="John" style="width:100% ; height: 130px">
											<button class="btn btn-danger">Xóa</button>
										</div>
						    		</div>		   		
								</div>							    
						  	</div>
							<div id="danhmuc" class="tab-pane fade stroll-div">

							</div>
						  	<div id="khuyenmai" class="tab-pane fade stroll-div">
						    	
						 	</div>
						 	<div id="slide" class="tab-pane fade stroll-div">
						    	
						 	</div>

						</div>
					</div>
				   					  
					{{-- <div id="preview"></div> --}}
				</div>
				
	       	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-info" id="choise">Chọn</button>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      	</div>
	    </div>

  	</div>
</div>