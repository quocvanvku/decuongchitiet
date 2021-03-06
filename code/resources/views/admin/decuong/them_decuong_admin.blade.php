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
				<p>Thêm mới đề cương</p>
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
				<form action="{{URL::to('admin/decuong/them-moi-de-cuong')}}" method="post">
				{{ csrf_field() }}
					<div class="tab-body">
						<div class="list-tab-body active">
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
													<option value="{{$value_khungchuongtrinh->id}}" >|____{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
													@else
													<option value="{{$value_khungchuongtrinh->id}}" >{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
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
												<input type="text" name="ten_hoc_phan" id="ip-ten-hoc-phan" placeholder="Nhập tên học phần" required="">
												<input type="hidden" name="id_ten_hoc_phan" id="id-ten-hoc-phan">
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
											<input type="number" name="so_tiet_ly_thuyet" id="ip-so-tiet-lt" placeholder="Số tiết lí thuyết" required="" class="ip2row">
										</td>
									</tr>
									<tr>
										<td>
											<p>3. Số tiết bài tập</p>
										</td>
										<td>
											<input type="number" name="so_tiet_bai_tap" class="ip2row" placeholder="Số tiết bài tập" required="">
										</td>
									</tr>
									<tr>
										<td>
											<p class="">4. Số tiết thực hành</p>
										</td>
										<td>
											<input type="number" name="so_tiet_thuc_hanh" class="ip2row" placeholder="Số tiết thực hành" required="">
										</td>
									</tr>
									<tr>
										<td>
											<p>5. Số tiết tự học</p>
										</td>
										<td>
											<input type="number" name="so_tiet_tu_hoc" class="ip2row" placeholder="Số tiết tự học" required="">
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
												<input type="text" name="giang_vien_phu_trach" id="giang-vien-phu-trach" placeholder="Nhập tên Giảng viên phụ trách" required="">
												<input type="hidden" name="id_giang_vien_phu_trach" id="id-giang-vien-phu-trach" required="">
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
													
												</ul>
											</div>
										</td>
									</tr>
									<tr>
										<td>9. Khoa phụ trách</td>
										<td>
											<select multiple name="khoa_phu_trach" class="khoa-phu-trach" required>
												<option value="1">Khoa học máy tính</option>
												<option value="2">Khoa kỹ thuật máy tính & điện tử</option>
												<option value="3">Khoa kinh tế số & thương mại điện tử</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>10. Loại học phần</td>
										<td>
											<select multiple name="loai_hoc_phan" class="loai-hoc-phan" required>
												<option value="1">Bắt buộc</option>
												<option value="2">Tự chọn bắt buộc</option>
												<option value="3">Tự chọn tự do</option>
											</select>
										</td>
									</tr>
									<tr> 
										<td>11. Thuộc khối kiến thức</td>
										<td>
											<select multiple name="khoi_kien_thuc" class="khoi-kien-thuc" required>
												<option value="1">Toán và Khoa học tự nhiên</option>
												<option value="2">Kiến thức chung</option>
												<option value="3">Kiến thức cơ sở ngành</option>
												<option value="4">Kiến thức chuyên ngành</option>
												<option value="5">Thực tập</option>
												<option value="6">Đồ án tốt nghiệp</option>
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
											<textarea class="list-textarea-chung" name="mota_tomtat" required="" placeholder="Mô tả tóm tắt học phần"></textarea>
										</td>
									</tr>
									<tr>
										<td>13. Mục tiêu kiến thức của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctieu_kienthuc" required="" placeholder="Mục tiêu kiến thức của học phần"></textarea>
										</td>
									</tr>
									<tr>
										<td>14. Mục tiêu kỹ năng của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctiey_kynang" required="" placeholder="Mục tiêu kỹ năng của học phần"></textarea>
										</td>
									</tr>
									<tr>
										<td>15. Mục tiêu thái độ của học phần</td>
										<td>
											<textarea class="list-textarea-chung" name="muctieu_thaido" required="" placeholder="Mục tiêu thái độ của học phần"></textarea>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="list-tab-body">
							<div class="block">
								<table>
									<tr>
										<td class="c1">16.Chọn ngành</td>
										<td>
											<select multiple name="nganh" id="select-nganh" multiple class="chon-nganh" required>
												@foreach($all_nganh as $value_nganh)
												@if($value_nganh->id == 1)
												<option value="{{$value_nganh->id}}" selected>{{$value_nganh->tennganh}}</option>
												@else
												<option value="{{$value_nganh->id}}">{{$value_nganh->tennganh}}</option>
												@endif
												@endforeach
											</select>
										</td>
									</tr>
									 
									<tr>
										<td></td>
										<td>
											<table class="table-chuan-dau-ra" border="1px">
												<thead>
													<tr>
														<td>#</td>
														<td>Chuẩn đầu ra chung (PLO) </td>
														<td>Chuẩn đầu ra học phần (CLO) </td>
													</tr>
												</thead>
												<tbody id="chuan-dau-ra">
													<?php $stt_cdr_chung = 1; ?>
													@foreach($all_cdr_chung as $value_cdr_chung)
													<tr>
														<td class="stt-cdr">{{$stt_cdr_chung}}</td>
														<td class="noi-cdr-chung">{{$value_cdr_chung->noidung_cdr_chung}}</td>
														<td class="list-cdr-hoc-phan" style="width:400px" >
															<p id="add-cdr" data-value="{{$value_cdr_chung->id_cdr_chung}}">Thêm</p>
															<div id="add-parent-cdr-{{$value_cdr_chung->id_cdr_chung}}">
																
															</div>
														</td>
													</tr>
													<?php $stt_cdr_chung++; ?>
													@endforeach
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
											<textarea class="list-textarea-chung" name="nhiemvu" required="" placeholder="Nhiệm vụ của học viên"></textarea>
										</td>
									</tr>									
									<!-- <tr>
										<td>18. Tài liệu tham khảo - Giáo trình</td>
										<td>
											<textarea class="list-textarea-chung" name="tltk_giaotrinh" required="" placeholder="Tài liệu tham khảo - Giáo trình"></textarea>
										</td>
									</tr>
									<tr>
										<td>19. Tài liệu tham khảo - Sách</td>
										<td>
											<textarea class="list-textarea-chung" name="tltk_sach" required="" placeholder="Tài liệu tham khảo - Sách"></textarea>
										</td>
									</tr> -->
									<tr>
										<td>18. Tài liệu tham khảo - Giáo trình</td>
										<td style="width:80%;">
											<table class="table table-bordered" id="table-tltk-giaotrinh">
												<thead>
													<tr>
														<td class="align-middle">STT</td>
														<td class="align-middle">Tên tác giả</td>
														<td class="align-middle">Năm XB</td>
														<td class="align-middle">Tên tài liệu</td>
														<td class="align-middle">Nơi XB</td>
														<td class="align-middle">Nhà XB</td>
														<td class="align-middle">Action</td>
													</tr>
												</thead>
												<tbody id="list-tltk-giaotrinh">
													<!-- <tr>
														<td class="align-middle">
															<p>1</p>
														</td>
														<td class="align-middle">
															<textarea name="" id="" cols="15" rows="5"></textarea>
														</td>
														<td class="align-middle">
															<input type="number" name="" id="" style="width:80px">
														</td>
														<td class="align-middle">
															<textarea name="" id="" cols="15" rows="5"></textarea>
														</td>
														<td class="align-middle">
															<textarea name="" id="" cols="15" rows="5"></textarea>
														</td>
														<td class="align-middle">
															<textarea name="" id="" cols="15" rows="5"></textarea>
														</td>
														<td class="align-middle">
															<p>Xóa</p>
														</td>
													</tr> -->
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
										<td>19. Tài liệu tham khảo - Sách</td>
										<td style="width:80%;">
											<table class="table table-bordered" id="table-tltk-sach">
												<thead>
													<tr>
														<td class="align-middle">STT</td>
														<td class="align-middle">Tên tác giả</td>
														<td class="align-middle">Năm XB</td>
														<td class="align-middle">Tên tài liệu</td>
														<td class="align-middle">Nơi XB</td>
														<td class="align-middle">Nhà XB</td>
														<td class="align-middle">Action</td>
													</tr>
												</thead>
												<tbody id="list-tltk-sach">
													
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
											<input type="date" name="ngay_phe_duyet" required="">
										</td>
									</tr>
 
									<tr>
										<td></td>
										<td>
											<input type="submit" name="sm_decuong" id="sm-decuong" value="Tạo đề cương">
										</td>
									</tr>
 
								</table>
							</div>
						</div>
					</div>
				</form>		
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#ip-ten-hoc-phan').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/dc-ten-hoc-phan')}}",
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

			var id_gvdc1 = $('#list-gvdc-id').val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/dc-giang-vien-phu-trach')}}",
					method: 'GET',
					data:{query:query, _token:_token},
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

		select_nganh(1);

		$('#select-nganh').on('change', function() {
			var id_nganh = this.value;
			select_nganh(id_nganh);
		});

		function select_nganh(id_nganh) {
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{URL::to('admin/decuong/select-nganh-aj')}}",
				method: 'GET',
				data:{id_nganh:id_nganh, _token:_token},
				success: function(data) {
					if (data != null) { 
       					$('#chuan-dau-ra').html(data);
					}   
				}
			});
		}


		$('#giangvienphutrachaj').on('click', 'ul li', function() {
			$('#giang-vien-phu-trach').val($(this).text()); 
			$('#giangvienphutrachaj').fadeOut();  
			var idgvpt = this.dataset.value;
			document.getElementById("id-giang-vien-phu-trach").value = idgvpt;
		});

		$('#giang-vien-day-cung').keyup(function() {
			var query = $(this).val();
			var id_gvptc = $('#id-giang-vien-phu-trach').val();

			var id_gvdc1 = document.querySelectorAll('[name="list_id_gvdc[]"]').value;
			//$('#list-gvdc-id').val();
			
			// new Array();
			// id_gvdc1 = ;

			//alert("id"+id_gvdc1);

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/dc-giang-vien-day-cung')}}",
					method: 'GET',
					data:{query:query, id_gvptc:id_gvptc, id_gvdc1:id_gvdc1, _token:_token},
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
			p2.setAttribute("class", "list-gvdc-id");

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


		//chuan dau ra
		$('#chuan-dau-ra').on('click', 'tr td p', function() {

			p2 = document.createElement("input");

			//var b = $(this).closest('div').attr('id');

			var b = $(this).attr('data-value');

			p = document.createElement("div");
			p.setAttribute("class", "line-add-cdr");

			p4 = document.createElement("input");
			p4.setAttribute("type", "hidden");
			p4.setAttribute("name", "list_cdr[]");
			p4.setAttribute("value", b);
			p.appendChild(p4);

			p2 = document.createElement("textarea");
			p2.setAttribute("name", "list_cdr[]");
			p.appendChild(p2);

			p3 = document.createElement("h5");
			var nodexoa = document.createTextNode("Xoá");
			p3.appendChild(nodexoa);
			p3.id = "delete-cdr";
			p.appendChild(p3);

			var div = document.getElementById("add-parent-cdr-"+b);
			div.appendChild(p);


			// var x = document.getElementsByClassName('stt-cdr');
			// for (var i = 0; i < x.length; i++) {
			//     x[i].innerHTML = i+1;
			// } 

		});

		$('#chuan-dau-ra').on('click', 'tr td div div h5', function() {
			$(this).parent('div').remove();
			var x = document.getElementsByClassName('stt-cdr');
			for (var i = 0; i < x.length; i++) {
			    x[i].innerHTML = i+1;
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
			p7.id = "delete-tltk-giaotrinh";
			var node7 = document.createElement("p");
			var node7_1 = document.createTextNode("Xóa");
			node7.appendChild(node7_1);
			p7.appendChild(node7);

			p.appendChild(p1);
			p.appendChild(p2);
			p.appendChild(p3);
			p.appendChild(p4);
			p.appendChild(p5);
			p.appendChild(p6);
			p.appendChild(p7);

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
			p7.id = "delete-tltk-sach";
			var node7 = document.createElement("p");
			var node7_1 = document.createTextNode("Xóa");
			node7.appendChild(node7_1);
			p7.appendChild(node7);

			p.appendChild(p1);
			p.appendChild(p2);
			p.appendChild(p3);
			p.appendChild(p4);
			p.appendChild(p5);
			p.appendChild(p6);
			p.appendChild(p7);

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