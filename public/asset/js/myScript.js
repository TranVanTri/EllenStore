$(document).ready(function(){
	$('.updateNumber').click(function(){
		var rowId = $(this).attr('id');
		var qty = $(this).parent().find(".qty").val();
		var token = $("input[name='_token']").val();
		//alert(rowId);
		$.ajax({
			url:'cap-nhat/'+rowId+'/'+qty,
			type:'GET',
			cache:false,
			data:{"_token":token,"id":rowId,"qty":qty},
			success:function(data){
				if(data == "oke"){
					window.location = "gio-hang"
				}
				else{
					alert("no");
				}
			}
		});
		
	});
});