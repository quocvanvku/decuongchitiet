@extends('admin_layout')
@section('admin_content') 

<div class="top-dang-bai-viet">
	<p>Danh sách đề cương</p>
</div>

<p><?php if(Session::has('response_faild')) {echo Session::get('response_faild'); session()->forget('response_faild'); } ?></p>

<p><?php if(Session::has('response_succ')) {echo Session::get('response_succ'); session()->forget('response_succ'); } ?></p>

<select name="" id="select_khoa">
	<option value="0">All</option>
	<option value="1" <?php if($id_khoa == 1) echo "selected" ?> >Khoa Khoa học máy tính</option>
	<option value="2" <?php if($id_khoa == 2) echo "selected" ?> >Khoa Kỹ thuật máy tính</option>
	<option value="3" <?php if($id_khoa == 3) echo "selected" ?> >Khoa Kinh tế số và Thương mại điện tử</option>
</select> 

<select name="" id="select_khungchuongtrinh">
	@foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh)
	<option value="{{$value_all_khungchuongtrinh->id}}" <?php if($khungchuongtrinh == $value_all_khungchuongtrinh->id) echo "selected" ?> >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
	@endforeach
</select>

<div class="tim-kiem-de-cuong">
	Tìm Kiếm: 
	<input type="text" name="" id="nhap_tim_kiem_de_cuong" placeholder="Nhập tên đề cương hoặc giáo viên phụ trách chính...">
</div>

<h3 class="title_select_khoa">Danh sách đề cương {{$ten_khoa}}. Năm học: {{$ten_khungchuongtrinh}}</h3>

<script>
	$(document).ready(function() {
		$('#select_khoa').on('change', function () {
			var url = $(this).val();
			var idnh = $('#select_namhoc').val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/danh-sach-de-cuong/' + url + '/' + idnh;
			}
          return false;
      });

	  $('#select_namhoc').on('change', function () {
			var idnh = $(this).val();
			var url = $('#select_khoa').val();
			if (idnh) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/danh-sach-de-cuong/' + url + '/' + idnh;
			}
          return false;
      });

	});
</script>

<table class="danh-sach-de-cuong">
	<thead>
		<tr>
			<td>STT</td>
			<td>Tên đề cương</td>
			<td>Giảng viên phụ trách</td>
			<td></td>
			<td></td>
			<td>Xem</td>
			<td>Sửa</td>
			<td>Xoá</td>
		</tr>
	</thead> 

	<tbody id="body-danh-sach-de-cuong">
		<?php $stt_dsdc = 1; ?>
		@foreach($all_decuong as $value_decuong)
		<tr>
			<td>{{$stt_dsdc}}</td>
			<td>{{$value_decuong->tenhocphan}}</td>
			<td>{{$value_decuong->hodem}} {{$value_decuong->ten}}</td>
			@if($value_decuong->has_dghp == 0)
			<td>
				<a href="{{URL::to('admin/decuong/danh-gia-hoc-phan/'.$value_decuong->id_decuong)}}" class="add-dsdc">Thêm đánh giá học phần</a>
			</td>
			@else
			<td>
				<a href="{{URL::to('admin/decuong/edit-danh-gia-hoc-phan/'.$value_decuong->id_decuong)}}" class="edit-dsdc">Sửa đánh giá học phần</a>
			</td>
			@endif
			@if($value_decuong->has_khgd == 0)
			<td>
				<a href="{{URL::to('admin/decuong/ke-hoach-giang-day/'.$value_decuong->id_decuong)}}" class="add-dsdc">Thêm Kế hoạch giảng dạy và học</a>
			</td> 
			@else
			<td>
				<a href="{{URL::to('admin/decuong/edit-ke-hoach-giang-day/'.$value_decuong->id_decuong)}}" class="edit-dsdc">Sửa Kế hoạch giảng dạy và học</a>
			</td>
			@endif
			<td class="list-icon l-icon-views">
				<a href="{{URL::to('admin/decuong/xem-de-cuong/'.$value_decuong->id_decuong)}}">
					<img src="{{ asset('./public/Images/icons/views.png')}}">
					<!-- <i class="fas fa-eye" style="color: #002147;"> -->
				</a>
			</td>
			<td class="list-icon">
				<a href="{{URL::to('admin/decuong/edit-de-cuong/'.$value_decuong->id_decuong)}}">
					<img src="{{ asset('./public/Images/icons/edit.png')}}">
					<!-- <i class="fas fa-edit" style="color: #28a745;"> -->
				</a>
			</td>
			<td class="list-icon">
				<a href="{{URL::to('admin/decuong/delete-de-cuong/'.$value_decuong->id_decuong)}}">
					<img src="{{ asset('./public/Images/icons/delete.png')}}">
					<!-- <i class="fas fa-trash-alt" style="color: #dc3545;"> -->
				</a>
			</td>
			<?php $stt_dsdc++; ?>
		</tr>
		@endforeach
	</tbody>
		
</table>

<script type="text/javascript">
	$(document).ready(function() {
		$('#nhap_tim_kiem_de_cuong').keyup(function() {
			
			var query = this.value;
			var id_khoa = {{$id_khoa}};
			var namhoc = $('#select_namhoc').val();

			var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/tim-kiem-de-cuong')}}",
					method: 'post',
					data:{query:query, id_khoa:id_khoa, namhoc:namhoc, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#body-danh-sach-de-cuong').html(data);
							//alert(data);
						}   
					}
				});

		});
	});

</script>


@endsection