@extends('admin_layout')
@section('admin_content') 

<div class="ke-hoach-giang-day">
	<div class="container-fluid">

		<div class="row top-ke-hoach-giang-day">
			<div class="col-md-12 title nopadding">
				<p>Sửa Kế hoạch giảng dạy thu gọn </p>			
			</div>
			<p style="width:100%;padding-top:15px;">Khung chương trình: {{$ten_khungchuongtrinh}}</p>
			<p style="padding-top:5px;">Học phần: {{$ten_hocphan}}</p>
		</div>

		<div class="row table-ke-hoach-giang-day">
			<div class="col-md-12 nopadding">
				<form action="{{URL::to('admin/decuong/sua-ke-hoach-giang-day-thu-gon')}}" method="post">
					{{ csrf_field() }}

					<input type="hidden" name="id_khung" value="{{$id_khung}}">
					<input type="hidden" name="id_hocphan" value="{{$id_hocphan}}">

					<h3>Kế hoạch giảng dạy và học cho phần lý thuyết</h3>

					<table class="table table-bordered">
						<thead>
							<tr>
								<td>#</td>
								<td class="align-middle">Tuần/buổi</td>
								<td class="align-middle">Nội dung chi tiết</td>
								<td class="align-middle">Action</td>
							</tr>
						</thead>
						<tbody id="list-khgd">
							<?php $counter = 0; ?>
							@foreach($all_edit_khgd as $value_all_edit_khgd)
							<tr>
								<td>
									@if($counter != 0)
									<p id="up-buoi" data-value="{{$value_all_edit_khgd->id.'_'.$value_all_edit_khgd->id_hocphan.'_'.$value_all_edit_khgd->thuochocphan.'_'.$value_all_edit_khgd->khungchuongtrinh}}">
										<img src="{{ asset('./public/Images/icons/up.png')}}" alt="">
									</p>
									@endif
									@if($counter != count( $all_edit_khgd ) - 1)
									<p id="down-buoi" data-value="{{$value_all_edit_khgd->id.'_'.$value_all_edit_khgd->id_hocphan.'_'.$value_all_edit_khgd->thuochocphan.'_'.$value_all_edit_khgd->khungchuongtrinh}}">
										<img src="{{ asset('./public/Images/icons/down.png')}}" alt="">
									</p>
									@endif
								</td>
								<td class="stt-khgd">
									{{$value_all_edit_khgd->buoi}}
								</td>
								<td>
									<textarea name="ke_hoach_giang_day[]" required="true" rows="7" cols="142">{{$value_all_edit_khgd->noidung}}</textarea>
								</td>
								<td id="delete-ke-hoach-giang-day">
									<p>Xóa</p>
								</td>
							</tr>
							<?php $counter++; ?>
							@endforeach
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
								<td>#</td>
								<td class="align-middle">Tuần/buổi</td>
								<td class="align-middle">Nội dung chi tiết</td>
								<td class="align-middle">Action</td>
							</tr>
						</thead>
						<tbody id="list-khgd-thuchanh">
							<?php $counter_th = 0; ?>
							@foreach($all_edit_khgd_thuchanh as $value_all_edit_khgd_thuchanh)
							<tr>
								<td>
									@if($counter_th != 0)
									<p id="up-buoi" data-value="{{$value_all_edit_khgd_thuchanh->id.'_'.$value_all_edit_khgd_thuchanh->id_hocphan.'_'.$value_all_edit_khgd_thuchanh->thuochocphan.'_'.$value_all_edit_khgd_thuchanh->khungchuongtrinh}}">
										<img src="{{ asset('./public/Images/icons/up.png')}}" alt="">
									</p>
									@endif
									@if($counter_th != count( $all_edit_khgd_thuchanh ) - 1)
									<p id="down-buoi" data-value="{{$value_all_edit_khgd_thuchanh->id.'_'.$value_all_edit_khgd_thuchanh->id_hocphan.'_'.$value_all_edit_khgd_thuchanh->thuochocphan.'_'.$value_all_edit_khgd_thuchanh->khungchuongtrinh}}">
										<img src="{{ asset('./public/Images/icons/down.png')}}" alt="">
									</p>
									@endif
								</td>
								<td class="stt-khgd-thuchanh">
									{{$value_all_edit_khgd_thuchanh->buoi}}
								</td>
								<td>
									<textarea name="ke_hoach_giang_day_thuchanh[]" required="true" rows="7" cols="142">{{$value_all_edit_khgd_thuchanh->noidung}}</textarea>
								</td>
								<td id="delete-ke-hoach-giang-day">
									<p>Xóa</p>
								</td>
							</tr>
							<?php $counter_th++; ?>
							@endforeach
							
						</tbody>
						<tr>
							<td class="align-middle" colspan="6" id="add-ke-hoach-giangday-thuchanh">
								<p>Thêm</p>
							</td>
						</tr>
					</table>

					<div class="sm-khgd">
						<input type="submit" value="Sửa kế hoạch giảng dạy" class="submit-ke-hoach-giang-day">
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script>
	var temp = 0;
	var temp_thuchanh = 0;
	$('#add-ke-hoach-giangday').live('click', function() {
		
		var p = document.createElement("tr");

        var p0 = document.createElement("td");

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

        p.appendChild(p0);
		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p6);

		var div = document.getElementById("list-khgd");
		div.appendChild(p);

		var x = document.getElementsByClassName('stt-khgd');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});

	$('#delete-ke-hoach-giang-day').live('click', function() {
		$(this).parent('tr').remove();
		var x = document.getElementsByClassName('stt-khgd');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
		var y = document.getElementsByClassName('stt-khgd-thuchanh');
		for (var i = 0; i < x.length; i++) {
			y[i].innerHTML = i+1;
		}
	});

	$('#add-ke-hoach-giangday-thuchanh').live('click', function() {

		var p = document.createElement("tr");

        var p0 = document.createElement("td");

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

        p.appendChild(p0);
		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p6);

		var div = document.getElementById("list-khgd-thuchanh");
		div.appendChild(p);

		var x = document.getElementsByClassName('stt-khgd-thuchanh');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});

    $('#up-buoi').live('click',function() {
		var vl_khgd = this.dataset.value;

		var mang_khgd = vl_khgd.split("_");

		var id_khgd = mang_khgd[0];
		var id_hocphan_khgd = mang_khgd[1];
		var thuochocphan_khgd = mang_khgd[2];
		var khungchuongtrinh_khgd = mang_khgd[3];
		
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: "{{URL::to('admin/decuong/up-khgd')}}",
			method: 'post',
			data:{id_khgd:id_khgd, id_hocphan_khgd:id_hocphan_khgd, thuochocphan_khgd:thuochocphan_khgd, khungchuongtrinh_khgd:khungchuongtrinh_khgd, _token:_token},
			success: function(data) {
				if (data != null) {
					location.reload();
					//alert(data);
				}   
			}
		});

	});

	$('#down-buoi').live('click',function() {
		var vl_khgd = this.dataset.value;

		var mang_khgd = vl_khgd.split("_");

		var id_khgd = mang_khgd[0];
		var id_hocphan_khgd = mang_khgd[1];
		var thuochocphan_khgd = mang_khgd[2];
		var khungchuongtrinh_khgd = mang_khgd[3];
		
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: "{{URL::to('admin/decuong/down-khgd')}}",
			method: 'post',
			data:{id_khgd:id_khgd, id_hocphan_khgd:id_hocphan_khgd, thuochocphan_khgd:thuochocphan_khgd, khungchuongtrinh_khgd:khungchuongtrinh_khgd, _token:_token},
			success: function(data) {
				if (data != null) {
					location.reload();
					//alert(data);
				}   
			}
		});

	});


</script>


@endsection