@extends('admin_layout')
@section('admin_content') 

<div class="ke-hoach-giang-day">
	<div class="container-fluid">

		<div class="row top-ke-hoach-giang-day">
			<div class="col-md-12 title nopadding">
				<p>Thêm Kế hoạch giảng dạy thu gọn </p>
			</div>
			<p style="width:100%;padding-top:15px;">Khung chương trình: {{$ten_khungchuongtrinh}}</p>
			<p style="padding-top:5px;">Học phần: {{$ten_hocphan}}</p>
		</div>

		<div class="row table-ke-hoach-giang-day">
			<div class="col-md-12 nopadding" id="body-ke-hoach-giang-day">
				<form action="{{URL::to('admin/decuong/them-ke-hoach-giang-day-thu-gon')}}" method="post">
					{{ csrf_field() }}

					<input type="hidden" name="id_khung" value="{{$id_khung}}">
					<input type="hidden" name="id_hocphan" value="{{$id_hocphan}}">

					<h3>Kế hoạch giảng dạy và học cho phần lý thuyết</h3>

					<table class="table table-bordered">
						<thead>
							<tr>
								<td class="align-middle">Tuần/buổi</td>
								<td class="align-middle">Nội dung chi tiết</td>
								<td class="align-middle">Action</td>
							</tr>
						</thead>
						<tbody id="list-khgd">
						</tbody>
						<tr>
							<td class="align-middle" colspan="6" id="add-ke-hoach-giangday">
								<p>Thêm</p>
							</td>
						</tr>
					</table>

					<h3>Kế hoạch giảng dạy và học cho phần thực hành</h3>

					<table class="table table-bordered">
						<thead>
							<tr>
								<td class="align-middle">Tuần/buổi</td>
								<td class="align-middle">Nội dung chi tiết</td>
								<td class="align-middle">Action</td>
							</tr>
						</thead>
						<tbody id="list-khgd-thuchanh">
						</tbody>
						<tr>
							<td class="align-middle" colspan="6" id="add-ke-hoach-giangday-thuchanh">
								<p>Thêm</p>
							</td>
						</tr>
					</table>

					<div class="sm-khgd">
						<input type="submit" value="Thêm kế hoạch giảng dạy" class="submit-ke-hoach-giang-day">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script>
	var temp = 0;
	var temp_thuchanh = 0;
	$('#body-ke-hoach-giang-day').on('click', 'form table tr td#add-ke-hoach-giangday', function() {
		
		temp++;
		var temp_ip = document.createElement("input");
		temp_ip.setAttribute("type", "hidden");
		temp_ip.setAttribute("name", "ke_hoach_giang_day[]");
		temp_ip.setAttribute("value", temp);

		var p = document.createElement("tr");

		var p1 = document.createElement("td");
		p1.setAttribute("class", "stt-khgd");
		var node1 = document.createTextNode("1");
		p1.appendChild(node1);

		var p2 = document.createElement("td");
		var node2 = document.createElement("textarea");
		node2.setAttribute("name", "ke_hoach_giang_day[]");
		node2.setAttribute('required',true);
		node2.rows = 7;
		node2.cols = 142;
		p2.appendChild(node2);

		var p6 = document.createElement("td");
		p6.id = "delete-ke-hoach-giang-day";
		var node6 = document.createElement("p");
		var node6_1 = document.createTextNode("Xóa");
		node6.appendChild(node6_1);
		p6.appendChild(node6);

		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p6);
		p.appendChild(temp_ip);

		var div = document.getElementById("list-khgd");
		div.appendChild(p);

		var x = document.getElementsByClassName('stt-khgd');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});

	$('#list-khgd').on('click', 'tr td#delete-ke-hoach-giang-day', function() {
		$(this).parent('tr').remove();
		var x = document.getElementsByClassName('stt-khgd');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});

	$('#list-khgd-thuchanh').on('click', 'tr td#delete-ke-hoach-giang-day', function() {
		$(this).parent('tr').remove();
		var y = document.getElementsByClassName('stt-khgd-thuchanh');
		for (var i = 0; i < x.length; i++) {
			y[i].innerHTML = i+1;
		}
	});

	$('#body-ke-hoach-giang-day').on('click', 'form table tr td#add-ke-hoach-giangday-thuchanh', function() {

		temp_thuchanh++;
		var temp_ip_thuchanh = document.createElement("input");
		temp_ip_thuchanh.setAttribute("type", "hidden");
		temp_ip_thuchanh.setAttribute("name", "ke_hoach_giang_day_thuchanh[]");
		temp_ip_thuchanh.setAttribute("value", temp_thuchanh);

		var p = document.createElement("tr");

		var p1 = document.createElement("td");
		p1.setAttribute("class", "stt-khgd-thuchanh");
		var node1 = document.createTextNode("1");
		p1.appendChild(node1);
		
		var p2 = document.createElement("td");
		var node2 = document.createElement("textarea");
		node2.setAttribute("name", "ke_hoach_giang_day_thuchanh[]");
		node2.setAttribute('required',true);
		node2.rows = 7;
		node2.cols = 142;
		p2.appendChild(node2);

		var p6 = document.createElement("td");
		p6.id = "delete-ke-hoach-giang-day";
		var node6 = document.createElement("p");
		var node6_1 = document.createTextNode("Xóa");
		node6.appendChild(node6_1);
		p6.appendChild(node6);

		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p6);
		p.appendChild(temp_ip_thuchanh);

		var div = document.getElementById("list-khgd-thuchanh");
		div.appendChild(p);

		var x = document.getElementsByClassName('stt-khgd-thuchanh');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});


</script>


@endsection