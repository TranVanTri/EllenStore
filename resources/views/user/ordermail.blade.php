<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		.header{
			font-family: Avenir,Helvetica,sans-serif;
		    box-sizing: border-box;
		    padding: 25px 0;
		    text-align: center;height: 50px;
		    background-color: #f5f8fa;	
		}
		a{
			font-family: Avenir,Helvetica,sans-serif;
		    box-sizing: border-box;
		    color: #bbbfc3;
		    font-size: 19px;
		    font-weight: bold;
		    text-decoration: none;
		}
		p{
			font-family: Avenir,Helvetica,sans-serif;
		    box-sizing: border-box;
		    line-height: 1.5em;
		    margin-top: 0;
		    color: #aeaeae;
		    font-size: 12px;
		    text-align: center;
		}
		.text{
			font-family: Avenir,Helvetica,sans-serif;
			color: #74787e;
			box-sizing: border-box;
			font-size: 16px;
			line-height: 1.5rem;
		}
		.boder {  
		  border: 1px solid #ddd;
		  text-align: left;
		}

		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  padding: 15px;
		}
	</style>

</head>
<body>
	<table style="font-family: Avenir,Helvetica, sans-serif;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    width: 100%;">
		<tbody>
			<tr>
				<td class="header"><a style="color: #bbbfc3;" href="https://ellen.com.vn">Ellen Store</a></td>
			</tr>
			<tr>
				<td style="padding: 25px 25px 0 25px;">

					<div class="text">Xin chào bạn, <span style="
    font-size: 18px;">{{$bill->name}} !</span></div>
					<div class="text">Bạn đã đặt hàng thành công.</div>
					<div class="text">Thông tin đơn hàng bạn:</div>
					
				</td>
			</tr>
			<tr>
				<td style="padding:0 25px 25px 25px;">
					<table class="boder" style="color: #74787e;">
					    <thead>
					      <tr>
					        <th class="boder">Tên sản phẩm</th>
					        <th class="boder">Đơn giá</th>
					        <th class="boder">Số lượng</th>
					        <th class="boder">Size</th>
					        <th class="boder">Thành tiền</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php $tong = 0;?>
					    	@foreach($billDetail as $child)
						    <tr style="text-align: center;">
							    <td class="boder">{!!$child->nameProduct!!}</td>					    
							    <td class="boder">{{$child->price}}</td>
							    <td class="boder">{{$child->quantity}}</td>
							    <td class="boder">{{$child->size}}</td>
							    <td class="boder">{{$child->price * $child->quantity}}</td>
							    <?php $tong +=($child->price * $child->quantity);?>
						    </tr>
						    @endforeach
					    </tbody>
					 </table>

					<div class="text">Tổng tiền: <span style="color: #2f3133;
    font-size: 19px;">{{$tong}} VNĐ</span></div>
				</td>
			</tr>
			<tr style="background-color: #f5f8fa;">
				<td class="header"><p>© 2019 EllenStore. All rights reserved.</p></td>
			</tr>
		</tbody>
	</table>
	
</body>
</html>