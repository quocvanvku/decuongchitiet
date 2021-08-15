@extends('admin_layout')
@section('admin_content') 

<div class="top-dang-bai-viet">
	<p>Thêm đề cương</p>
</div>

<select name="khungchuongtrinh" id="select_khungchuongtrinh">
	<option value="">Chọn khung chương trình</option>
    @foreach($khungchuongtrinh as $value_khungchuongtrinh)
    <option value="{{$value_khungchuongtrinh->id}}" <?php if($id_khungchuongtrinh == $value_khungchuongtrinh->id) {echo "selected ";} ?> >{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
    @endforeach
</select> 

<div class="tim-kiem-de-cuong">
	Tìm Kiếm: 
	<input type="text" name="" id="nhap_tim_kiem_de_cuong" placeholder="Nhập tên đề cương hoặc giáo viên phụ trách chính...">
</div>
 
<h3 class="title_select_khoa">Chọn thêm mới đề cương hoặc chỉnh sửa và thêm mới từ đề cương có sẵn</h3>

<div class="them-moi-decuong">
    <a href="{{URL::to('admin/decuong/them-moi-de-cuong')}}">Thêm mới đề cương</a>
</div>

<script>
	$(document).ready(function() {
		$('#select_namhoc').on('change', function () {
			var url = $(this).val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/them-de-cuong/' + url;
			}
          	return false;
      	});

		  
		$('#nhap_tim_kiem_de_cuong').keyup(function() {
			
			var query = this.value;
			var namhoc = $('#select_namhoc').val();

			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{URL::to('admin/decuong/tim-kiem-de-cuong-them-moi')}}",
				method: 'post',
				data:{query:query, namhoc:namhoc, _token:_token},
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

<h3 class="title_select_khoa">Danh sách đề cương năm học: {{$ten_khungchuongtrinh}}</h3>

<table class="danh-sach-de-cuong dsdc-them">
	<thead>
		<tr>
			<td>STT</td>
			<td>Tên đề cương</td>
			<td>Giảng viên phụ trách</td>
			<td>Khoa</td>
			<td>Năm học</td>
			<td></td>
		</tr>
	</thead> 

	<tbody id="body-danh-sach-de-cuong">
		<?php $stt_dsdc = 1; ?>
		@foreach($all_decuong as $value_decuong)
		<tr>
			<td>{{$stt_dsdc}}</td>
			<td>{{$value_decuong->tenhocphan}}</td>
			<td>{{$value_decuong->hodem}} {{$value_decuong->ten}}</td>
			<td>{{$value_decuong->tenKhoa}}</td>
            <td>{{$value_decuong->tenkhungchuongtrinh}}</td>
            <td>
                <a href="{{URL::to('admin/decuong/chinh-sua-them-moi-de-cuong/'.$value_decuong->id_decuong)}}" style="color:#f64e60;">Chỉnh sửa và nhân bản</a>
            </td>
			<?php $stt_dsdc++; ?>
		</tr>
		@endforeach
	</tbody>
		
</table>

<script type="text/javascript">
	// $(document).ready(function() {
	// 	$('#nhap_tim_kiem_de_cuong').keyup(function() {
			
	// 		var query = this.value;
	// 		var id_khoa = 

	// 		var _token = $('input[name="_token"]').val();
	// 			$.ajax({
	// 				url: "{{URL::to('admin/decuong/tim-kiem-de-cuong')}}",
	// 				method: 'post',
	// 				data:{query:query, id_khoa:id_khoa, _token:_token},
	// 				success: function(data) {
	// 					if (data != null) {
	// 						$('#body-danh-sach-de-cuong').html(data);
	// 					}   
	// 				}
	// 			});

	// 	});
	// });

</script>


@endsection