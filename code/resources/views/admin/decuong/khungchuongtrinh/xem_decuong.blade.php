<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/xem-de-cuong.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="xem-de-cuong">
		<div class="container"> 
			<div class="row">
				<div class="col-md-10 nopadding" style="margin: auto;">

					<table class="table-top">
						<tr>
							<td>
								<span>ĐẠI HỌC ĐÀ NẴNG</span> <br>
								<span><b>TRƯỜNG ĐH CNTT & TT VIỆT-HÀN</b></span>
							</td>
							<td>
								<span><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></span> <br>
								<span class="text-underline"><b>Độc Lập - Tự Do - Hạnh Phúc</b></span>
								
							</td>
						</tr>
					</table>

					<center><h4 class="title">Chương trình đào tạo</h4></center>

					<table style="width:100%">
						<tr>
							<td>Trình độ đào tạo:</td>
							<td>Đại học</td>
						</tr>
						<tr>
							<td>Ngành/Chuyên ngành:</td>
							<td>{{$all_decuong->tennganh}}</td>
							<td>Mã số: {{$all_decuong->manganh}}</td>
						</tr>
					</table>

					<center><h4 class="title">Đề cương chi tiết học phần</h4></center>

					<center>
						<p>
							<b>Tên học phần: {{$all_decuong->tenhocphan}}</b> <br>
							<b>Tên tiếng anh</b>
						</p>
					</center>

					<table class="table table-bordered table-thong-tin-ve-hoc-phan">
						<tr>
							<td style="width:50%;" class="align-middle"><b>1. Mã học phần</b></td>
							<td class="align-middle">{{$all_decuong->mahocphan}}</td>
						</tr>
						<tr>
							<td class="align-middle"><b>2. Số tín chỉ</b></td>
							<td class="align-middle">{{$all_decuong->soTC}} TC</td>
						</tr>
						<tr>
							<td class="align-middle"><b>3. Phân bố thời gian</b></td>
							<td class="align-middle">2</td>
						</tr>
						<tr>
							<td class="align-middle">- Lý thuyết</td>
							<td class="align-middle">{{$all_decuong->phanbo_lythuyet}}</td>
						</tr>
						<tr>
							<td class="align-middle">- Bài tập/Thảo luận</td>
							<td class="align-middle">{{$all_decuong->phanbo_baitap}}</td>
						</tr>
						<tr>
							<td class="align-middle">- Thực hành/Thí nghiệm</td>
							<td class="align-middle">{{$all_decuong->phanbo_thuchanh}}</td>
						</tr>
						<tr>
							<td class="align-middle">- Tự học</td>
							<td class="align-middle">{{$all_decuong->phanbo_tuhoc}}</td>
						</tr>
						<tr>
							<td class="align-middle"><b>4. Các giảng viên phụ trách học phần</b></td>
							<td class="align-middle">{{$all_decuong->hodem}} {{$all_decuong->ten}}</td>
						</tr>
						<tr>
							<td class="align-middle">- Giảng viên phụ trách chính:  </td>
							<td class="align-middle">{{$all_decuong->hodem}} {{$all_decuong->ten}}</td>
						</tr>
						<tr>
							<td class="align-middle">- Danh sách giảng viên cùng giảng dạy:</td>
							<td class="align-middle">
								<ul>
									@foreach($list_gvdc as $val_lgvdc)
									<li>
										<p>{{$val_lgvdc}}</p>
									</li>
									@endforeach
								</ul>
							</td>
						</tr>
						<tr>
							<td class="align-middle">- Bộ môn phụ trách giảng dạy:</td>
							<td class="align-middle">{{$all_decuong->tenKhoa}}</td>
						</tr>
						<tr>
							<td class="align-middle"><b>5. Điều kiện tham gia học phần</b></td>
						</tr>
						<tr>
							<td class="align-middle">- Học phần tiên quyết:</td>
							<td class="align-middle">2</td>
						</tr>
						<tr>
							<td class="align-middle">- Học phần học trước:</td>
							<td class="align-middle">2</td>
						</tr>
						<tr>
							<td class="align-middle">- Học phần song hành:</td>
							<td>2</td>
						</tr>
						<tr>
							<td class="align-middle"><p>6. Loại học phần</p></td>
							<td class="align-middle">
								<ul>
									<li>
										<input id="av" type="checkbox" name="" class="check-box" <?php if($all_decuong->loaihocphan == 1) echo "checked"; ?> >
										Bắt buộc
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->loaihocphan == 2) echo "checked"; ?> >
										Tự chọn bắt buộc
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->loaihocphan == 3) echo "checked"; ?> >
										Tự chọn tự do
									</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td class="align-middle"><b>7. Thuộc khối kiến thức</b></td>
							<td class="align-middle">
								<ul>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 1) echo "checked"; ?> >
										Toán và Khoa học tự nhiên
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 2) echo "checked"; ?> >
										Kiến thức chung
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 3) echo "checked"; ?> >
										Kiến thức Cơ sở ngành
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 4) echo "checked"; ?> >
										Kiến thức Chuyên ngành
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 5) echo "checked"; ?> >
										Thực tập
									</li>
									<li>
										<input type="checkbox" name="" class="check-box" <?php if($all_decuong->khoikienthuc == 6) echo "checked"; ?> >
										Đồ án tốt nghiệp
									</li>
								</ul>		
							</td>
						</tr>
					</table>

					<p><b>8. Mô tả tóm tắt học phần</b></p>
					<p>{{$all_decuong->mota_tomtat}}</p>

					<p><b>9. Mục tiêu của học phần: </b></p>
					<p><b>a. Kiến thức</b></p>
					<p>Trang bị cho sinh viên những kiến thức như sau:</p>
					<p id="muctieu-kienthuc">
						
					</p>

					<p><b>b. Kỹ năng</b></p>
					<p>Rèn luyện cho sinh viên kỹ năng cá nhân, kỹ năng giao tiếp thiết yếu cùng với các kỹ năng thực hành thực tế. cụ thể như sau:</p>
					<p id="muctieu-kynang">
						
					</p>
					<p><b>c. Thái độ</b></p>
					<p id="muctieu-thaido">
						
					</p>

					<p><b>10. Chuẩn đầu ra của học phần: </b></p>
					<p>Sau khi kết thúc học phần sinh viên có khả năng</p>

					<table class="table table-bordered table-clo">
					<thead>
						<tr>
							<td class="row-stt"><b>STT</b></td>
							<td><b>Chuẩn đầu ra học phần (CLO)</b></td>
						</tr>
					</thead>
					<tbody>
						@foreach($all_cdr as $value_all_cdr)
							<tr>
								<td>CLO {{$value_all_cdr->stt}}</td>
								<td>{{$value_all_cdr->noi_dung}}</td>
							</tr>
						@endforeach
					</tbody>
					</table>

					<p><b>11. Nhiệm vụ của học viên: </b></p>
					<p>Sinh viên phải thực hiện các nhiệm vụ sau đây:</p>
					<p id="nhiemvu-hocvien">

					</p>

					@if(isset($all_dghp) && $all_dghp != null)
					<p><b>12.	Đánh giá học phần: </b></p>
					<p>Kết quả học tập của sinh viên được đánh giá bằng các thành phần: đánh giá quá trình, đánh giá giữa kỳ, đánh giá cuối kỳ, các hoạt động đánh giá khác. </p>
					<table border="1px" cellspacing="0" class="table-danh-gia-hoc-phan">
						<thead>
							<tr>
								<td>Thành phần đánh giá</td>
								<td>Bài đánh giá</td>
								<td>Phương pháp đánh giá</td>
								<td>Trọng số bài đánh giá (%)</td>
								<td>Trọng số thành phần (%)</td>
								<td>CĐR học phần</td>
							</tr>
						</thead>
						<tbody>
							<?php $stt = 1; ?>
							@foreach($all_dghp as $value_dghp_parent)
								@if(isset($value_dghp_parent->Level))
									@if($value_dghp_parent->Level == 0)
										<tr>
											<td rowspan="2"><p class="left-bdg">A.<?php echo $stt; ?></p> <p>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</p></td>
											<td><p class="left-bdg">A.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->ten_thanhphandanhgia}}</p></td>
											<td><p class="left-bdg">P.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->phuongphapdanhgia}}</p></td>
											<td><p class="left-bdg">W.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->trongsobaidanhgia}} %</p></td>
											<td rowspan="2">
												<p class="left-bdg">W.<?php echo $stt; ?></p> 
												<p> 
												@foreach($all_trongso as $value_trongso)
													@if($value_trongso->id_trongso == $value_dghp_parent->id_baidanhgia)
														{{$value_trongso->trongso*100}}
													@endif
												@endforeach
												%
												</p>
											</td>
											<td>
												<p>
												@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
													@if (next($value_dghp_parent->cdr_hocphan)==true)
													CLO {{$value_list_cdr}},
													@else
													CLO {{$value_list_cdr}}
													@endif
												@endforeach
												</p>
											</td>
										</tr>
										<?php $a = $stt; ?>
										<?php $stt++; ?>
									@else
										<tr>
											<td><p class="left-bdg">A.<?php echo $a; ?>.2</p> <p>{{$value_dghp_parent->ten_thanhphandanhgia}}</p></td>
											<td><p class="left-bdg">P.<?php echo $a; ?>.2</p> <p>{{$value_dghp_parent->phuongphapdanhgia}}</p></td>
											<td><p class="left-bdg">W.<?php echo $a; ?>.2 <p></p>{{$value_dghp_parent->trongsobaidanhgia}} %</p></td>
											<td>
												<p>
												@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
													@if (next($value_dghp_parent->cdr_hocphan)==true)
													CLO {{$value_list_cdr}},
													@else
													CLO {{$value_list_cdr}}
													@endif
												@endforeach
												</p>
											</td>
										</tr>
									@endif			
								@else 
									<tr>
										<td><p class="left-bdg">A.<?php echo $stt; ?></p>  <p>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</p> </td>
										<td><p class="left-bdg">A.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->ten_thanhphandanhgia}}</p></td>
										<td><p class="left-bdg">P.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->phuongphapdanhgia}}</p></td>
										<td><p class="left-bdg">W.<?php echo $stt; ?>.1</p> <p>{{$value_dghp_parent->trongsobaidanhgia}} %</p></td>
										<td>
											<p class="left-bdg">W.<?php echo $stt; ?></p> 
											<p> 
											@foreach($all_trongso as $value_trongso)
												@if($value_trongso->id_trongso == $value_dghp_parent->id_baidanhgia)
													{{$value_trongso->trongso*100}}
												@endif
											@endforeach
											%
											</p>
										</td>
										<td>
											<p>
											@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
												@if (next($value_dghp_parent->cdr_hocphan)==true)
												CLO {{$value_list_cdr}},
												@else
												CLO {{$value_list_cdr}}
												@endif
											@endforeach
											</p>
										</td>
									</tr>
									<?php $stt++; ?>
								@endif
							@endforeach
						</tbody>
					</table>
					@endif

					@if(isset($all_kehoachgiangday_lt) && $all_kehoachgiangday_lt != null)
					<p><b>13. Kế hoạch giảng dạy và học: </b></p>
					<p><b>13.1 Kế hoạch giảng dạy và học cho phần lý thuyết: </b></p>
					<table class="table table-bordered table-ke-hoach-giang-day">
						<thead>
							<tr>
								<td class="row-stt-khgd">Tuần / Buổi</td>
								<td>Nội dung chi tiết</td>
								<td>Hoạt động dạy và học</td>
								<td>Bài đánh giá</td>
								<td>CĐR học phần</td>
							</tr>
						</thead>
						<tbody>
							<?php $stt_lt=1; ?>
							@foreach($all_kehoachgiangday_lt as $value_all_khgd_lt)
							<tr>
								<td class="row-stt-khgd">{{$stt_lt++}}</td>
								<td>
									<ul>
										@for($i = 0; $i < count($value_all_khgd_lt->noidung); $i++ )
										<li>{{$value_all_khgd_lt->noidung[$i]}}</li>
										@endfor
									</ul>
								</td> 
								<td>
									<ul>
										@for($i = 0; $i < count($value_all_khgd_lt->hoatdongdayhoc); $i++ )
										<li>{{$value_all_khgd_lt->hoatdongdayhoc[$i]}}</li>
										@endfor
									</ul>
								</td>
								<td>
									@foreach($value_all_khgd_lt->baidanhgia as $value_list_bdg)
										@if (next($value_all_khgd_lt->baidanhgia)==true)
										{{$value_list_bdg}},
										@else
										{{$value_list_bdg}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($value_all_khgd_lt->cdrhocphan as $value_list_cdr)
										@if (next($value_all_khgd_lt->cdrhocphan)==true)
										CLO {{$value_list_cdr}},
										@else
										CLO {{$value_list_cdr}}
										@endif
									@endforeach
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif

					@if(isset($all_kehoachgiangday_th) && $all_kehoachgiangday_th != null)
					<p><b>13.2 Kế hoạch giảng dạy và học cho phần thực hành: </b></p>
					<table class="table table-bordered table-ke-hoach-giang-day">
						<thead>
							<tr>
								<td>Tuần / Buổi</td>
								<td>Nội dung chi tiết</td>
								<td>Hoạt động dạy và học</td>
								<td>Bài đánh giá</td>
								<td>CĐR học phần</td>
							</tr>
						</thead>
						<tbody>
							<?php $stt_lt=1; ?>
							@foreach($all_kehoachgiangday_th as $value_all_khgd_th)
							<tr>
								<td class="row-stt-khgd">{{$stt_lt++}}</td>
								<td>
									<ul>
										@for($i = 0; $i < count($value_all_khgd_th->noidung); $i++ )
										<li>{{$value_all_khgd_th->noidung[$i]}}</li>
										@endfor
									</ul>
								</td>
								<td>
									<ul>
										@for($i = 0; $i < count($value_all_khgd_th->hoatdongdayhoc); $i++ )
										<li>{{$value_all_khgd_th->hoatdongdayhoc[$i]}}</li>
										@endfor
									</ul>
								</td>
								<td>
									@foreach($value_all_khgd_th->baidanhgia as $value_list_bdg)
										@if (next($value_all_khgd_th->baidanhgia)==true)
										{{$value_list_bdg}},
										@else
										{{$value_list_bdg}}
										@endif
									@endforeach
								</td>
								<td>
									@foreach($value_all_khgd_th->cdrhocphan as $value_list_cdr)
										@if (next($value_all_khgd_th->cdrhocphan)==true)
										CLO {{$value_list_cdr}},
										@else
										CLO {{$value_list_cdr}}
										@endif
									@endforeach
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif

					<p><b>14. Tài liệu học tập: </b></p>
					<p><b>14.1 Sách, bài giảng, giáo trình chính: </b></p>
					@if( ($all_decuong->tailieuthamkhao_giaotrinh != null) && ($all_decuong->tailieuthamkhao_sach == null) )
					<p id="tailieuthamkhao-gt">

					</p>
					<p><b>14.2 Sách, tài liệu tham khảo: </b></p>
					<p id="tailieuthamkhao-sach">

					</p>
					@else
					<table class="table table-bordered">
						<thead>
							<tr>
								<td>STT</td>
								<td>Tên tác giả</td>
								<td>Năm XB</td>
								<td>Tên sách, giáo trình, tên bài báo, văn bản</td>
								<td>NXB, tên tạp chí/ nơi ban hành VB</td>
							</tr>
						</thead>
						<tbody>
							<tr style="background:#ddd;">
								<td colspan="5">Sách, bài giảng, giáo trình chính</td>
							</tr>
							@if(isset($all_tailieuthamkhao_giaotrinh))
								<?php $stt_tltk_gt = 1; ?>
								@foreach($all_tailieuthamkhao_giaotrinh as $value_all_tailieuthamkhao_giaotrinh)
								<tr>
									<td>{{$stt_tltk_gt++}}</td>
									<td>{{$value_all_tailieuthamkhao_giaotrinh->tentacgia}}</td>
									<td>{{$value_all_tailieuthamkhao_giaotrinh->namxuatban}}</td>
									<td>{{$value_all_tailieuthamkhao_giaotrinh->tentacgia}}</td>
									<td>{{$value_all_tailieuthamkhao_giaotrinh->noixuatban .', '. $value_all_tailieuthamkhao_giaotrinh->nhaxuatban}}</td>
								</tr>
								@endforeach
							@endif
							<tr  style="background:#ddd;">
								<td colspan="5">Sách, tài liệu tham khảo</td>
							</tr>
							@if(isset($all_tailieuthamkhao_sach))
								<?php $stt_tltk_s = 1; ?>
								@foreach($all_tailieuthamkhao_sach as $value_all_tailieuthamkhao_sach)
								<tr>
									<td>{{$stt_tltk_s++}}</td>
									<td>{{$value_all_tailieuthamkhao_sach->tentacgia}}</td>
									<td>{{$value_all_tailieuthamkhao_sach->namxuatban}}</td>
									<td>{{$value_all_tailieuthamkhao_sach->tentacgia}}</td>
									<td>{{$value_all_tailieuthamkhao_sach->noixuatban .', '. $value_all_tailieuthamkhao_sach->nhaxuatban}}</td>
								</tr>
								@endforeach
							@endif
						</tbody>
					</table>
					@endif
					<p class="cate">15. Ngày phê duyệt: {{gmdate("d-m-Y", $all_decuong->ngaypheduyet)}}</p>
				</div>
			</div>
		</div>
	</div>

	<script>

		function list_content(content_li, id_li) {
			var a = content_li;
			var b = a.split('\n');

			var p = document.createElement("ul");

				for (var i = 0; i < b.length; i++) {

				var p1 = document.createElement("li");
				var node = document.createTextNode("- "+b[i]);
				p1.appendChild(node);
				p.appendChild(p1);
			}

			var div = document.getElementById(id_li);
			div.appendChild(p);

		}

		function list_content_gt(content_li, id_li) {
			var a = content_li;
			var b = a.split('\n');

			var p = document.createElement("ul");

				for (var i = 0; i < b.length; i++) {

				var p1 = document.createElement("li");
				var node = document.createTextNode("["+(i+1)+"] "+b[i]);
				p1.appendChild(node);
				p.appendChild(p1);
			}

			var div = document.getElementById(id_li);
			div.appendChild(p);

		}

		var ct = <?php echo json_encode($all_decuong->muctieu_kienthuc, JSON_HEX_TAG); ?>;
		var id_p = "muctieu-kienthuc";
		list_content(ct, id_p);

		var ct_kn = <?php echo json_encode($all_decuong->muctieu_kynang, JSON_HEX_TAG); ?>;
		var id_kn = "muctieu-kynang";
		list_content(ct_kn, id_kn);

		var ct_td = <?php echo json_encode($all_decuong->muctieu_thaido, JSON_HEX_TAG); ?>;
		var id_td = "muctieu-thaido";
		list_content(ct_td, id_td);
		

		var ct_nv = <?php echo json_encode($all_decuong->nhiemvu, JSON_HEX_TAG); ?>;
		var id_nv = "nhiemvu-hocvien";
		list_content(ct_nv, id_nv);

		var ct_gt = <?php echo json_encode($all_decuong->tailieuthamkhao_giaotrinh, JSON_HEX_TAG); ?>;
		var id_gt = "tailieuthamkhao-gt";
		list_content_gt(ct_gt, id_gt);

		var ct_sach = <?php echo json_encode($all_decuong->tailieuthamkhao_sach, JSON_HEX_TAG); ?>;
		var id_sach = "tailieuthamkhao-sach";
		list_content_gt(ct_sach, id_sach);

		

	</script>

</body>
</html>

