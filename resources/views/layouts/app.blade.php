<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" href="img/favicon.ico" />

	<!-- Load font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	 crossorigin="anonymous">

	<!-- owl carousel libraries -->
	<link rel="stylesheet" href="{{asset('front-end/js/owlcarousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/js/owlcarousel/owl.theme.default.min.css')}}">
	<script src="{{asset('front-end/js/Jquery/Jquery.min.js')}}"></script>
	<script src="{{asset('front-end/js/owlcarousel/owl.carousel.min.js')}}"></script>

	<!-- tidio - live chat -->
	<!-- <script src="//code.tidio.co/bfiiplaaohclhqwes5xivoizqkq56guu.js"></script> -->

	<!-- our files -->
	<!-- css -->
	<link rel="stylesheet" href="{{asset('front-end/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/topnav.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/header.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/banner.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/taikhoan.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/trangchu.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/home_products.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/pagination_phantrang.css')}}">
	<link rel="stylesheet" href="{{asset('front-end/css/footer.css')}}">
	<!-- js -->
	<script src="{{asset('front-end/data/products.js')}}"></script>
	<script src="{{asset('front-end/js/classes.js')}}"></script>
	<script src="{{asset('front-end/js/dungchung.js')}}"></script>
	<script src="{{asset('front-end/js/trangchu.js')}}"></script>

</head>

<body>
	<script> addTopNav(); </script>

    @yield('content')

	<script>
		addContainTaiKhoan(); addPlc();
	</script>

	<div class="footer"><script>addFooter();</script></div>

	<i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
</body>

</html>
