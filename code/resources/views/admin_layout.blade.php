<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('./public/Js/dropzone/dropzone.css')}}" type="text/css">
	<script src="https://cdn.tiny.cloud/1/gs0pa5cuczbr5b24pvedu0twwply9bryqr1lal4ncmjdtkfm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/admin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/menu_footer.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/decuongchitiet.css')}}"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/themdecuong.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/khungchuongtrinh.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/dghp_khgd.css')}}">
	
</head>
<body>
	
	<div class="admin">
		<div class="aside-left">
			<div class="top-aside-left">
				<div class="img">
					<a href="{{URL::to('/')}}"><img src="{{ asset('./public/Images/logofooter.png')}}" id="imgscrhd"></a>
				</div>
			</div>
			<ul class="menu-ad-nav">
				<li class="menu-ad-item item-dashboard">
					<p><a href="{{URL::to('/admin')}}">Dashboard</a></p>
				</li>
				<li class="menu-ad-item1">
					<p>Custom</p>
				</li>
				
				<li class="menu-ad-item">
					<p>Đề cương</p>
					<i class="icon-menu-ad-item fas fa-chevron-right"></i>
					<ul class="sub-menu-ad-item">
						<li><p><a href="{{URL::to('admin/decuong/them-moi-de-cuong')}}">Thêm đề cương</a></p></li>
						<li><p><a href="{{URL::to('admin/decuong/khung-chuong-trinh/142')}}">Khung chương trình</a></p></li>
						<li><p><a href="{{URL::to('admin/decuong/khgd-khung-chuong-trinh/142')}}">Kế hoạch giảng dạy</a></p></li>
						<!-- <li><p><a href="{{URL::to('admin/decuong/danh-sach-de-cuong/0/146')}}">Danh sách đề cương</a></p></li> -->
						<!-- <li><p><a href="{{URL::to('admin/decuong/danh-sach-chuan-dau-ra-chung')}}">Chuẩn đầu ra chung</a></p></li> -->
						<li><p><a href="{{URL::to('admin/decuong/danh-sach-chuan-dau-ra-chung/1')}}">Chuẩn đầu ra chung</a></p></li>
					</ul>
				</li>
				<li class="menu-ad-item">
					<p>Khung chương trình học phần</p>
					<i class="icon-menu-ad-item fas fa-chevron-right"></i>
					<ul class="sub-menu-ad-item">
						<li><p><a href="{{URL::to('admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/142')}}"> Danh sách khung chương trình học phần</a></p></li>
						<li><p><a href="{{URL::to('admin/decuong/them-hoc-phan-khung-chuong-trinh')}}"> Thêm học phần cho khung chương trình</a></p></li>
					</ul>
				</li>
				<li class="menu-ad-item">
					<p><a href="#">VKU Đề Cương</a></p>
				</li>
			</ul>
		</div>
		<div class="aside-right">
			<div class="top-aside-right">
				<div class="div-info-left">
					
				</div>
				<div class="div-info-right" id="info-right">
					<div class="logo-div-info-right">
						<img src="{{ asset('./public/Images/logofooter.png')}}">
					</div>
					<h3>Admin</h3>
				</div>
				<a href="#">
					<div id="logout">
						<p>Thoát</p>
					</div>
				</a>
			</div>
			<div class="bottom-aside-right">

		 		@yield('admin_content')

			</div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">

	$(document).ready(function() {

		$('.menu-ad-nav .menu-ad-item').on('click', function() {
			$(this).children('.sub-menu-ad-item').slideToggle();
			$(this).children('.icon-menu-ad-item').toggleClass('fa-chevron-right fa-chevron-down');
		});

		$('.list-danh-muc .icon-menu').on('click', function () {
			$(this).parent('li').children('.sub-menu').slideToggle();
			$(this).toggleClass('fa-chevron-right fa-chevron-down');
		});

		$('.list-danh-muc > li > ul > li > p').on('click', function() {
			var datadmcl = this.dataset.value;
			$('.list-danh-muc > li > ul > li > p').removeClass('ocldm');
			(this).classList.toggle('ocldm');
			$('#hddanhmuc').val(datadmcl);
			var namedmcl = $(this).text();
			$('#thumucdc').val(namedmcl);
		});

		$('#info-right').on('click', function() {
			// alert('msg');
			document.getElementById("logout").style.display = 'block';
		});
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgPrime').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]); 
			}
		}		

		$("#fileUpload").change(function() {
			readURL(this);
		});


	});

</script>