<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>	
<script type="text/javascript" src="asset/js/popper.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="asset/js/myJs.js"></script>
<script type="text/javascript" src="asset/fancybox-2.1.7/lib/jquery.mousewheel.pack.js"></script>
<script type="text/javascript" src="asset/fancybox-2.1.7/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="asset/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="asset/js/myScript.js"></script>

<!-- FB -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Sản phẩm xem gần đây -->
<!-- kiểm tra có local storage hay k -->
<script>
	// Check browser support
	if (typeof(Storage) !== "undefined") {
	  // Store
	  localStorage.setItem("lastname", "Smith");
	  // Retrieve
	  document.getElementById("result").innerHTML = localStorage.getItem("lastname");
	} else {
	  document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
	}
</script>

<!-- thêm sản phảm vào mảng -->
<script>
	
</script>