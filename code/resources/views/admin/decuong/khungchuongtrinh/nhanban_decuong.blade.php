@extends('admin_layout')
@section('admin_content') 

<script>
	function Opentab(e, tabId) {

		var i;
		var list_tab = document.getElementsByClassName("list-tab-body");

		for (i = 0; i < list_tab.length; i ++) {
			list_tab[i].style.display = 'none';
		}

		list_tab[tabId - 1].style.display = 'block';

		var tabLink_1 = document.getElementsByClassName("tabLink");

		for (i = 0; i < tabLink_1.length; i ++) {
			tabLink_1[i].className = tabLink_1[i].className.replace(' active', '');
		}

		event.currentTarget.className += ' active';

	} 

</script>
  
<div class="containe-fluid">
    <div class="them-moi-de-cuong">

		<div class="row">
			<div class="col-md-12 title nopadding">
				<p>Nhân bản đề cương</p>
			</div>
		</div>

        <div class="row body-them-moi-de-cuong">
            <div class="col-md-2 nopadding">
                <div class="tab-header">
					<div onclick="Opentab(event, 1)" class="tabLink active" >Chọn tên học phần</div>
					<div onclick="Opentab(event, 2)" class="tabLink" >Chọn giảng viên</div>
					<div onclick="Opentab(event, 3)" class="tabLink" >Mô tả đề cương</div>	
					<div onclick="Opentab(event, 4)" class="tabLink" >Chuẩn đầu ra học phần</div>
					<div onclick="Opentab(event, 5)" class="tabLink" >Nhiệm vụ tài liệu</div>
				</div>
            </div>
            <div class="col-md-10 nopadding">
				<form action="{{URL::to('admin/decuong/nhan-ban-de-cuong')}}" method="post">
				{{ csrf_field() }}
					<div class="tab-body">
						<div class="list-tab-body active">

							<input type="hidden" name="khungchuongtrinh_cu" value="{{$khungchuongtrinh_cu}}">

							<div class="block">
								<table> 
									<tr>
										<td>
											<p class="">Chọn khung chương trình</p>
										</td>
										<td>
											<select name="khungchuongtrinh" id="select_khoa" required="" multiple>
												@foreach($khungchuongtrinh as $value_khungchuongtrinh)
													@if($value_khungchuongtrinh->level == 1)
													<option value="{{$value_khungchuongtrinh->id}}" <?php if($value_khungchuongtrinh->id == $id_khung) {echo "selected";} else {echo "disabled";} ?> >|____{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
													@else
													<option value="{{$value_khungchuongtrinh->id}}" <?php if($value_khungchuongtrinh->id == $id_khung) {echo "selected";} else {echo "disabled";} ?> >{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
													@endif
												@endforeach
											</select> 
										</td>
									</tr>
									<tr>
										<td>
											<p>1. Tên học phần</p>
										</td>
										<td>
											<div>
												<input type="text" name="ten_hoc_phan" id="ip-ten-hoc-phan" placeholder="Nhập tên học phần" required="" value="{{$all_decuong->tenhocphan}}" disabled>
												<input type="hidden" name="id_ten_hoc_phan" id="id-ten-hoc-phan" value="{{$all_decuong->id_hocphan}}">
												<div id="tenhocphanaj" class="list-danh-sach">
									
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<p class="">2. Số tiết lý thuyết</p>
										</td>
										<td>
											<input type="number" name="so_tiet_ly_thuyet" id="ip-so-tiet-lt" placeholder="Số tiết lí thuyết" required="" value="{{$all_decuong->phanbo_lythuyet}}">
										</td>
									</tr>
									<tr>
										<td>
											<p>3. Số tiết bài tập</p>
										</td>
										<td>
											<input type="number" name="so_tiet_bai_tap" placeholder="Số tiết bài tập" required="" value="{{$all_decuong->phanbo_baitap}}">
										</td>
									</tr>
									<tr>
										<td>
											<p class="">4. Số tiết thực hành</p>
										</td>
										<td>
											<input type="number" name="so_tiet_thuc_hanh" placeholder="Số tiết thực hành" required="" value="{{$all_decuong->phanbo_thuchanh}}">
										</td>
									</tr>
									<tr>
										<td>
											<p>5. Số tiết tự học</p>
										</td>
										<td>
											<input type="number" name="so_tiet_tu_hoc" placeholder="Số tiết tự học" required="" value="{{$all_decuong->phanbo_tuhoc}}">
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="list-tab-body">
							<div class="block">
								<table>
									<tr>
										<td>
											<p class="">6. Giảng viên phụ trách</p>
										</td>
										<td>
											<div class="gvpt">
												<input type="text" name="giang_vien_phu_trach" id="giang-vien-phu-trach" placeholder="Nhập tên Giảng viên phụ trách" required="" value="{{$all_decuong->chucdanh.'. '.$all_decuong->hodem.' '.$all_decuong->ten}}">
												<input type="hidden" name="id_giang_vien_phu_trach" id="id-giang-vien-phu-trach" required="" value="{{$all_decuong->giangvienphutrach_id}}">
												<div id="giangvienphutrachaj" class="list-danh-sach">

												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>7. Giảng viên dạy cùng</td>
										<td>
											<div>
												<input type="text" name="giang_vien_day_cung" id="giang-vien-day-cung" placeholder="Nhập tên Giảng viên dạy cùng">
												<div id="giangviendaycungaj" class="list-danh-sach">

												</div>
											</div>
										</td> 
										<td>
											<div class="danh-sach-gvdc">
												<h4>Danh sách các giảng viên cùng giảng dạy: </h4>
												<ul id="list-gvdc">
                                                    @foreach($list_gvdc as $val_gvdc)
                                                    <li>
                                                        <p>{{$val_gvdc["ten_gv"]}}</p>
                                                        <p id="delete-gvdc">Xoá</p>
                                                        <input type="hidden" name="list_id_gvdc[]" value="{{$val_gvdc["id_gv"]}}">
                                                    </li>
                                                    @endforeach
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td>9. Khoa phụ trách</td>
										<td>
											<select multiple name="khoa_phu_trach" class="khoa-phu-trach" required>
												<option value="1" <?php if($all_decuong->khoaphutrach == 1) echo "selected"; ?> >Khoa học máy tính</option>
												<option value="2" <?php if($all_decuong->khoaphutrach == 2) echo "selected"; ?> >Khoa kỹ thuật máy tính & điện tử</option>
												<option value="3" <?php if($all_decuong->khoaphutrach == 3) echo "selected"; ?> >Khoa kinh tế số & thương mại điện tử</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>10. Loại học phần</td>
										<td>
											<select multiple name="loai_hoc_phan" class="loai-hoc-phan" required>
												<option value="1" <?php if($all_decuong->loaihocphan == 1) echo "selected"; ?> >Bắt buộc</option>
												<option value="2" <?php if($all_decuong->loaihocphan == 2) echo "selected"; ?> >Tự chọn bắt buộc</option>
												<option value="3" <?php if($all_decuong->loaihocphan == 3) echo "selected"; ?> >Tự chọn tự do</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>11. Thuộc khối kiến thức</td>
										<td>
											<select multiple name="khoi_kien_thuc" class="khoi-kien-thuc" required>
												<option value="1" <?php if($all_decuong->khoikienthuc == 1) echo "selected"; ?> >Toán và Khoa học tự nhiên</option>
												<option value="2" <?php if($all_decuong->khoikienthuc == 2) echo "selected"; ?> >Kiến thức chung</option>
												<option value="3" <?php if($all_decuong->khoikienthuc == 3) echo "selected"; ?> >Kiến thức cơ sở ngành</option>
												<option value="4" <?php if($all_decuong->khoikienthuc == 4) echo "selected"; ?> >Kiến thức chuyên ngành</option>
												<option value="5" <?php if($all_decuong->khoikienthuc == 5) echo "selected"; ?> >Thực tập</option>
												<option value="6" <?php if($all_decuong->khoikienthuc == 6) echo "selected"; ?> >Đồ án tốt nghiệp</option>
											</select>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="list-tab-body">
							<div class="block">
								<table>
									<tr>
										<td>12. Mô tả tóm tắt học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="mota_tomtat" required="" placeholder="Mô tả tóm tắt học phần">{{$all_decuong->mota_tomtat}}</textarea>
										</td>
									</tr>
									<tr>
										<td>13. Mục tiêu kiến thức của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctieu_kienthuc" required="" placeholder="Mục tiêu kiến thức của học phần">{{$all_decuong->muctieu_kienthuc}}</textarea>
										</td>
									</tr>
									<tr>
										<td>14. Mục tiêu kỹ năng của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctiey_kynang" required="" placeholder="Mục tiêu kỹ năng của học phần">{{$all_decuong->muctieu_kynang}}</textarea>
										</td>
									</tr>
									<tr>
										<td>15. Mục tiêu thái độ của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctieu_thaido" required="" placeholder="Mục tiêu thái độ của học phần">{{$all_decuong->muctieu_thaido}}</textarea>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="list-tab-body">
							<div class="block">
								<table>

									<tr>
										<td class="c1">Thêm chuẩn đầu ra:</td>
										<td>Thêm các chuẩn đầu ra cho học phần {{$ten_hocphan}}</td>
									</tr>

									<tr>
										<td colspan="2" class="danh-sach-clo">
											<p>Danh sách chuẩn đầu ra của học phần {{$ten_hocphan}}</p>
											<p style="color:red;" id="text-warning">Chưa có học CLO nào được thêm</p>
										</td>
									</tr>

									<tr>
										<td colspan="2">
											<table class="table table-bordered table-add-clo">
												<thead>
													<tr>
														<td class="align-middle">#</td>
														<td class="align-middle">CLO</td>
														<td class="align-middle">Action</td>
													</tr>
												</thead>
												<tbody id="body-clo">
													
												</tbody>
												<tr id="tr-add-clo">
													<td class="align-middle"></td>
													<td class="align-middle">
														<textarea name="" id="noidung_clo_add" cols="70" rows="2" placeholder="Nhập chuẩn đầu ra học phần" ></textarea>
													</td>
													<td class="align-middle">
														<p id="add-clo">Thêm</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									
									<tr>
										<td colspan="2">
											<table style="width:100%;" class="table-chuan-dau-ra" border="1px">
												<thead>
													<tr>
														<td style="width:15px;">#</td>
														<td style="width:20%;">Chuẩn đầu ra chung (PLO) </td>
														<td>Chuẩn đầu ra học phần (CLO) </td>
													</tr>
												</thead>
												<tbody id="chuan-dau-ra">
													
												</tbody>
																								
											</table>
										</td>

									</tr>

								</table>
							</div>
						</div>
						<div class="list-tab-body">
							<div class="block">
								<table>
									<tr>
										<td>17. Nhiệm vụ của học viên</td>
										<td>
											<textarea class="list-textarea-chung" name="nhiemvu" required="" placeholder="Nhiệm vụ của học viên">{{$all_decuong->nhiemvu}}</textarea>
										</td>
									</tr>									
									<!-- <tr>
										<td>18. Tài liệu tham khảo - Giáo trình</td>
										<td>
											<textarea class="list-textarea-chung" name="tltk_giaotrinh" required="" placeholder="Tài liệu tham khảo - Giáo trình">{{$all_decuong->tailieuthamkhao_giaotrinh}}</textarea>
										</td>
									</tr>
									<tr>
										<td>19. Tài liệu tham khảo - Sách</td>
										<td>
											<textarea class="list-textarea-chung" name="tltk_sach" required="" placeholder="Tài liệu tham khảo - Sách">{{$all_decuong->tailieuthamkhao_sach}}</textarea>
										</td>
									</tr> -->
									<tr>
										<td colspan="2">18. Tài liệu tham khảo - Giáo trình</td>
									</tr>
									<tr>
										<td colspan="2" style="width:80%;">
											<table class="table table-bordered" id="table-tltk-giaotrinh">
												<thead>
													<tr>
														<td class="align-middle">STT</td>
														<td class="align-middle">Tên tác giả</td>
														<td class="align-middle">Năm XB</td>
														<td class="align-middle">Tên tài liệu</td>
														<td class="align-middle">Nơi XB</td>
														<td class="align-middle">Nhà XB</td>
														<td class="align-middle">Url</td>
														<td class="align-middle">Action</td>
													</tr>
												</thead>
												<tbody id="list-tltk-giaotrinh">
													<?php $stt_tltk_giaotrinh=1; ?>
													@foreach($all_tltk_giaotrinh as $value_all_tltk_giaotrinh)
													<tr>
														<td class="stt-tltk-giaotrinh align-middle">
															<p>{{$stt_tltk_giaotrinh++}}</p>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_giaotrinh->tentacgia}}</textarea>
														</td>
														<td class="align-middle">
															<input type="number" name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" style="width:80px" value="{{$value_all_tltk_giaotrinh->namxuatban}}">
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_giaotrinh->tensach}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_giaotrinh->noixuatban}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_giaotrinh->nhaxuatban}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_giao_trinh[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_giaotrinh->url}}</textarea>
														</td>
														<td class="align-middle" id="delete-tltk-giaotrinh">
															<p>Xóa</p>
														</td>
													</tr>
													@endforeach
												</tbody>
												<tr>
													<td class="align-middle" colspan="7" id="add-tltk-giaotrinh">
														<p style="tex-algin:center;">Thêm</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan="2">19. Tài liệu tham khảo - Sách</td>
									</tr>
									<tr>
										<td style="width:80%;" colspan="2">
											<table class="table table-bordered" id="table-tltk-sach">
												<thead>
													<tr>
														<td class="align-middle">STT</td>
														<td class="align-middle">Tên tác giả</td>
														<td class="align-middle">Năm XB</td>
														<td class="align-middle">Tên tài liệu</td>
														<td class="align-middle">Nơi XB</td>
														<td class="align-middle">Nhà XB</td>
														<td class="align-middle">Url</td>
														<td class="align-middle">Action</td>
													</tr>
												</thead>
												<tbody id="list-tltk-sach">
													<?php $stt_tltk_sach=1; ?>
													@foreach($all_tltk_sach as $value_all_tltk_sach)
													<tr>
														<td class="stt-tltk-sach align-middle">
															<p>{{$stt_tltk_sach++}}</p>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_sach[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_sach->tentacgia}}</textarea>
														</td>
														<td class="align-middle">
															<input type="number" name="tai_lieu_tham_khao_sach[]" id="" required="" style="width:80px" value="{{$value_all_tltk_sach->namxuatban}}">
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_sach[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_sach->tensach}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_sach[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_sach->noixuatban}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_sach[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_sach->nhaxuatban}}</textarea>
														</td>
														<td class="align-middle">
															<textarea name="tai_lieu_tham_khao_sach[]" id="" required="" cols="15" rows="5">{{$value_all_tltk_sach->url}}</textarea>
														</td>
														<td class="align-middle" id="delete-tltk-sach">
															<p>Xóa</p>
														</td>
													</tr>
													@endforeach
												</tbody>
												<tr>
													<td class="align-middle" colspan="7" id="add-tltk-sach">
														<p style="tex-algin:center;">Thêm</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>Ngày phê duyệt</td>
										<td>
											<input type="date" name="ngay_phe_duyet" required="" >
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>		
            </div>
        </div>
		<center><input style="margin-bottom:100px;" class="btn btn-success" type="submit" name="sm_decuong" id="sm-decuong" value="Nhân bản"></center>
		</form>	
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#ip-ten-hoc-phan').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-ten-hoc-phan-de-cuong')}}",
					method: 'GET',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#tenhocphanaj').fadeIn();  
       						$('#tenhocphanaj').html(data);
						}   
					}
				});
			} else {
				$('#tenhocphanaj').fadeOut();   
			}

		});


		$('#tenhocphanaj').on('click', 'ul li', function() {
			$('#ip-ten-hoc-phan').val($(this).text()); 
			$('#tenhocphanaj').fadeOut();  
			var idtenhocphan = this.dataset.value;
			document.getElementById("id-ten-hoc-phan").value = idtenhocphan;
		});

		$('#giang-vien-phu-trach').keyup(function() {
			var query = $(this).val();

			if (query != '') {

				$.ajax({
					url: "{{URL::to('admin/decuong/get-giang-vien-phu-trach-de-cuong')}}",
					method: 'GET',
					data:{query:query},
					success: function(data) {
						if (data != null) {
							$('#giangvienphutrachaj').fadeIn();  
       						$('#giangvienphutrachaj').html(data);
						}   
					}
				});
			} else {
				$('#giangvienphutrachaj').fadeOut();   
			}

		});


		$('#giangvienphutrachaj').on('click', 'ul li', function() {
			$('#giang-vien-phu-trach').val($(this).text()); 
			$('#giangvienphutrachaj').fadeOut();  
			var idgvpt = this.dataset.value;
			document.getElementById("id-giang-vien-phu-trach").value = idgvpt;
		});

		$('#giang-vien-day-cung').keyup(function() {
			var tengiangvien = $(this).val();
			var id_gvptc = $('#id-giang-vien-phu-trach').val();

			var id_gvdc1 = document.querySelectorAll('[name="list_id_gvdc[]"]').value;

			if (tengiangvien != '') {
				$.ajax({
					url: "{{URL::to('admin/decuong/get-giang-vien-day-cung-de-cuong')}}",
					method: 'GET',
					data:{tengiangvien:tengiangvien, id_gvptc:id_gvptc, id_gvdc1:id_gvdc1},
					success: function(data) {
						if (data != null) {
							$('#giangviendaycungaj').fadeIn();  
       						$('#giangviendaycungaj').html(data);
						}   
					}
				});
			} else {
				$('#giangviendaycungaj').fadeOut();   
			}

		});

		$('#giangviendaycungaj').on('click', 'ul li', function() {
			$('#giang-vien-day-cung').val(""); 
			$('#giangviendaycungaj').fadeOut(); 

			var id_gvcgd = this.dataset.value;


			var p = document.createElement("li");

			var p1 = document.createElement("p");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_gvdc[]");
			p2.setAttribute("value", id_gvcgd);

			var p3 = document.createElement("p")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-gvdc";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-gvdc");
			div.appendChild(p);

		});

		$(document).on('click', function(){  
	    	$('#tenhocphanaj').fadeOut(); 
	    	$('#giangvienphutrachaj').fadeOut();  
	    	$('#giangviendaycungaj').fadeOut();    
		}); 

		$('#list-gvdc').on('click', 'li p', function() {
			$(this).parent('li').remove();
		});

		function select_nganh(id_hocphan, khungchuongtrinh) {

			$.ajax({
				url: "{{URL::to('admin/decuong/chon-nganh-de-cuong')}}",
				method: 'GET',
				data:{id_hocphan:id_hocphan, khungchuongtrinh:khungchuongtrinh},
				success: function(data) {
					if (data != null) { 
						//alert(data);
       					$('#chuan-dau-ra').html(data);
					}   
				}
			});
		}

		$('#chuan-dau-ra').on('click', 'tr td div div h5#add-moilienhe', function() {

			var id_chuandaura_chung = $(this).attr('data-value');

			var id_chuandaura = $(this).parent('div').children('#select_chuandaura').val().toString();
			var mucdo = $(this).parent('div').children('#select_mucdo').val().toString();

			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			if (!id_chuandaura.length) {
				alert("Bạn vui lòng chọn Chuẩn đầu ra và tiếp tục");
			} else {
				$.ajax({
					url: "{{URL::to('admin/decuong/add-moilienhe-clo-plo')}}",
					method: 'GET',
					data:{id_chuandaura_chung:id_chuandaura_chung, id_chuandaura:id_chuandaura, mucdo:mucdo, id_hocphan:id_hocphan, id_khung:id_khung},
					success: function(data) {
						if (data != null) {
							select_nganh(id_hocphan, id_khung);
							alert(data);
						}   
					}
				});
			}
	
		});

		$('#chuan-dau-ra').on('click', 'tr td div div select#select_chuandaura', function() {
			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			var id_chuandaura = $(this).val().toString();
			var id_moilienhe = $(this).parent('div').children('#delete-moilienhe').attr('data-value');

			if(id_moilienhe) {
				$.ajax({
					url: "{{URL::to('admin/decuong/edit-moilienhe-clo-plo-cdr')}}",
					method: 'GET',
					data:{id_moilienhe:id_moilienhe, id_chuandaura:id_chuandaura},
					success: function(data) {
						if (data != null) {
							select_nganh(id_hocphan, id_khung);
							alert(data);
						}   
					}
				});
			}

		});

		$('#chuan-dau-ra').on('click', 'tr td div div select#select_mucdo', function() {
			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			var mucdo = $(this).val().toString();
			var id_moilienhe = $(this).parent('div').children('#delete-moilienhe').attr('data-value');

			if(id_moilienhe) {
				$.ajax({
					url: "{{URL::to('admin/decuong/edit-moilienhe-clo-plo-mucdo')}}",
					method: 'GET',
					data:{id_moilienhe:id_moilienhe, mucdo:mucdo},
					success: function(data) {
						if (data != null) {
							select_nganh(id_hocphan, id_khung);
							alert(data);
						}   
					}
				});
			}

		});

		$('#chuan-dau-ra').on('click', 'tr td div div span#delete-moilienhe', function() {

			var answer = window.confirm("Bạn có chắc chắn muốn xóa không?");
			if (answer) {
				var id_hocphan = {{$id_hocphan}};
				var id_khung = {{$id_khung}};

				var id_moilienhe = $(this).attr('data-value');

				$.ajax({
					url: "{{URL::to('admin/decuong/delete-moilienhe-clo-plo')}}",
					method: 'GET',
					data:{id_moilienhe:id_moilienhe},
					success: function(data) {
						if (data != null) {
							select_nganh(id_hocphan, id_khung);
							alert(data);
						}   
					}
				});
			}
			else {
				
			}

		});


		$('#tr-add-clo').on('click', 'td p#add-clo', function() {

			var noidung_clo = $(this).parent('td').parent('tr').children('td').children('#noidung_clo_add').val();

			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			if (!$.trim(noidung_clo)) {
				alert('Nội dung CLO trống!!! Vui lòng điền thông tin CLO rồi tiếp tục');
			} else {
				$.ajax({
					url: "{{URL::to('admin/decuong/add-clo')}}",
					method: 'GET',
					data:{id_hocphan:id_hocphan, id_khung:id_khung, noidung_clo:noidung_clo},
					success: function(data) {
						if (data != null) {
							load_CLO();
						}   
					}
				});
			}			
		});

		load_CLO();

		function load_CLO() {
			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			$.ajax({
				url: "{{URL::to('admin/decuong/load-clo')}}",
				method: 'GET',
				data:{id_hocphan:id_hocphan, id_khung:id_khung},
				success: function(data) {
					if (data != null) {
						$('#noidung_clo_add').val(null);
						$('#body-clo').html(data);

						var numberOfSpans = $('#body-clo').children('tr').length;

						if (numberOfSpans < 1) {
							$('#text-warning').html("Chưa có học CLO nào được thêm");
						} else if ( numberOfSpans >= 3 && numberOfSpans <= 4 ) {
							$('#text-warning').html("");
						} else {
							$('#text-warning').html("Học phần đang có: "+numberOfSpans+" CLO, số CLO nên có là từ 3 -> 4 CLO");
						}

						select_nganh(id_hocphan, id_khung);

					}   
				}
			});

		}

		$('#body-clo').on('click', 'td p#edit-clo', function() {

			var noidung_clo = $(this).parent('td').parent('tr').children('td').children('#noidung_clo').val();

			var id_hocphan = {{$id_hocphan}};
			var id_khung = {{$id_khung}};

			var id_clo = $(this).attr('data-value');

			if (!$.trim($("#noidung_clo").val())) {
				alert('Nội dung CLO trống!!! Vui lòng điền thông tin CLO rồi tiếp tục');
			} else {
				$.ajax({
					url: "{{URL::to('admin/decuong/edit-clo')}}",
					method: 'GET',
					data:{id_hocphan:id_hocphan, id_khung:id_khung, noidung_clo:noidung_clo, id_clo:id_clo},
					success: function(data) {
						if (data != null) {
							load_CLO();
						}   
					}
				});
			}

		});


		$('#body-clo').on('click', 'td p#delete-clo', function() {

			var answer = window.confirm("Bạn có chắc chắn muốn xóa không?");

			if (answer) {

				var id_clo = $(this).attr('data-value');

				$.ajax({
					url: "{{URL::to('admin/decuong/delete-clo')}}",
					method: 'GET',
					data:{id_clo:id_clo},
					success: function(data) {
						if (data != null) {
							alert(data);
							load_CLO();
						}   
					}
				});
				
			} else {

			}

		});

		$('#table-tltk-giaotrinh').on('click', 'tr td#add-tltk-giaotrinh', function() {

			var p = document.createElement("tr");

			var p1 = document.createElement("td");
			p1.setAttribute("class", "stt-tltk-giaotrinh align-middle");
			var node1 = document.createTextNode("1");
			p1.appendChild(node1);

			var p2 = document.createElement("td");
			p2.setAttribute("class", "align-middle");
			var node2 = document.createElement("textarea");
			node2.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node2.setAttribute('required',true);
			node2.rows = 5;
			node2.cols = 15;
			p2.appendChild(node2);

			var p3 = document.createElement("td");
			p3.setAttribute("class", "align-middle");
			var node3 = document.createElement("input");
			node3.type = "number";
			node3.style = "width:80px";
			node3.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node3.setAttribute('required',true);
			p3.appendChild(node3);

			var p4 = document.createElement("td");
			p4.setAttribute("class", "align-middle");
			var node4 = document.createElement("textarea");
			node4.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node4.setAttribute('required',true);
			node4.rows = 5;
			node4.cols = 15;
			p4.appendChild(node4);

			var p5 = document.createElement("td");
			p5.setAttribute("class", "align-middle");
			var node5 = document.createElement("textarea");
			node5.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node5.setAttribute('required',true);
			node5.rows = 5;
			node5.cols = 15;
			p5.appendChild(node5);

			var p6 = document.createElement("td");
			p6.setAttribute("class", "align-middle");
			var node6 = document.createElement("textarea");
			node6.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node6.setAttribute('required',true);
			node6.rows = 5;
			node6.cols = 15;
			p6.appendChild(node6);

			var p7 = document.createElement("td");
			p7.setAttribute("class", "align-middle");
			var node7 = document.createElement("textarea");
			node7.setAttribute("name", "tai_lieu_tham_khao_giao_trinh[]");
			node7.setAttribute('required',true);
			node7.rows = 5;
			node7.cols = 15;
			p7.appendChild(node7);

			var p8 = document.createElement("td");
			p8.setAttribute("class", "align-middle");
			p8.id = "delete-tltk-giaotrinh";
			var node8 = document.createElement("p");
			var node8_1 = document.createTextNode("Xóa");
			node8.appendChild(node8_1);
			p8.appendChild(node8);

			p.appendChild(p1);
			p.appendChild(p2);
			p.appendChild(p3);
			p.appendChild(p4);
			p.appendChild(p5);
			p.appendChild(p6);
			p.appendChild(p7);
			p.appendChild(p8);

			var div = document.getElementById("list-tltk-giaotrinh");
			div.appendChild(p);

			var x = document.getElementsByClassName('stt-tltk-giaotrinh');
			for (var i = 0; i < x.length; i++) {
				x[i].innerHTML = i+1;
			}

		});

		$('#list-tltk-giaotrinh').on('click', 'tr td#delete-tltk-giaotrinh', function() {
			$(this).parent('tr').remove();
			var x = document.getElementsByClassName('stt-tltk-giaotrinh');
			for (var i = 0; i < x.length; i++) {
				x[i].innerHTML = i+1;
			}
		});

		$('#table-tltk-sach').on('click', 'tr td#add-tltk-sach', function() {

			var p = document.createElement("tr");

			var p1 = document.createElement("td");
			p1.setAttribute("class", "stt-tltk-sach align-middle");
			var node1 = document.createTextNode("1");
			p1.appendChild(node1);

			var p2 = document.createElement("td");
			p2.setAttribute("class", "align-middle");
			var node2 = document.createElement("textarea");
			node2.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node2.setAttribute('required',true);
			node2.rows = 5;
			node2.cols = 15;
			p2.appendChild(node2);

			var p3 = document.createElement("td");
			p3.setAttribute("class", "align-middle");
			var node3 = document.createElement("input");
			node3.type = "number";
			node3.style = "width:80px";
			node3.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node3.setAttribute('required',true);
			p3.appendChild(node3);

			var p4 = document.createElement("td");
			p4.setAttribute("class", "align-middle");
			var node4 = document.createElement("textarea");
			node4.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node4.setAttribute('required',true);
			node4.rows = 5;
			node4.cols = 15;
			p4.appendChild(node4);

			var p5 = document.createElement("td");
			p5.setAttribute("class", "align-middle");
			var node5 = document.createElement("textarea");
			node5.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node5.setAttribute('required',true);
			node5.rows = 5;
			node5.cols = 15;
			p5.appendChild(node5);

			var p6 = document.createElement("td");
			p6.setAttribute("class", "align-middle");
			var node6 = document.createElement("textarea");
			node6.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node6.setAttribute('required',true);
			node6.rows = 5;
			node6.cols = 15;
			p6.appendChild(node6);

			var p7 = document.createElement("td");
			p7.setAttribute("class", "align-middle");
			var node7 = document.createElement("textarea");
			node7.setAttribute("name", "tai_lieu_tham_khao_sach[]");
			node7.setAttribute('required',true);
			node7.rows = 5;
			node7.cols = 15;
			p7.appendChild(node7);

			var p8 = document.createElement("td");
			p8.setAttribute("class", "align-middle");
			p8.id = "delete-tltk-sach";
			var node8 = document.createElement("p");
			var node8_1 = document.createTextNode("Xóa");
			node8.appendChild(node8_1);
			p8.appendChild(node8);

			p.appendChild(p1);
			p.appendChild(p2);
			p.appendChild(p3);
			p.appendChild(p4);
			p.appendChild(p5);
			p.appendChild(p6);
			p.appendChild(p7);
			p.appendChild(p8);

			var div = document.getElementById("list-tltk-sach");
			div.appendChild(p);

			var x = document.getElementsByClassName('stt-tltk-sach');
			for (var i = 0; i < x.length; i++) {
				x[i].innerHTML = i+1;
			}

		});

		$('#list-tltk-sach').on('click', 'tr td#delete-tltk-sach', function() {
			$(this).parent('tr').remove();
			var x = document.getElementsByClassName('stt-tltk-sach');
			for (var i = 0; i < x.length; i++) {
				x[i].innerHTML = i+1;
			}
		});

	});
</script>

@endsection