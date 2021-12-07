<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xem đề cương</title>
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

					<h4 class="title">Đề cương chi tiết học phần</h4>

					<table class="table-thong-tin-ctdd">
						<tr>
							<td><b>Trình độ đào tạo: Đại học</b></td>
							<td><b>Chương trình đào tạo: CNTT</b></td>
							<td><b>Ngành: Kỹ thuật phần mềm</b></td>
						</tr>
					</table>

					<table class="table table-bordered table-thong-tin-ve-hoc-phan">
						<tr>
							<td colspan="2"><b>1. Thông tin chung về học phần</b></td>
						</tr>
						<tr>
							<td style="width:50%;"><b>1.1 Mã học phần: {{$all_decuong->mahocphan}}</b></td>
							<td><b>1.2 Tên học phần: {{$all_decuong->tenhocphan}}</b></td>
						</tr>
						<tr>
							<td>
								<b>1.3 Loại học phần:</b> <br>
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
							<td><b>1.4 Tên tiếng anh: </b></td>
						</tr>
						<tr>
							<td><b>1.5. Số tín chỉ</b></td>
							<td>{{$all_decuong->soTC}}</td>
						</tr>
						<tr>
							<td><b>1.6 Phân bố thời gian</b></td>
							<td></td>
						</tr>
						<tr>
							<td>- Lý thuyết</td>
							<td>{{$all_decuong->phanbo_lythuyet}}</td>
						</tr>
						<tr>
							<td>- Bài tập/Thảo luận</td>
							<td>{{$all_decuong->phanbo_baitap}}</td>
						</tr>
						<tr>
							<td>- Thực hành/Thí nghiệm</td>
							<td>{{$all_decuong->phanbo_thuchanh}}</td>
						</tr>
						<tr>
							<td>- Tự học</td>
							<td>{{$all_decuong->phanbo_tuhoc}}</td>
						</tr>
						<tr>
							<td><b>1.7 Các giảng viên phụ trách học phần</b></td>
							<td>
								{{$all_decuong->chucdanh}} {{$all_decuong->hodem}} {{$all_decuong->ten}}, 
								@foreach($list_gvdc as $val_lgvdc)
									<span>{{$val_lgvdc}} </span>
									@if( next( $list_gvdc ) ) 
										<span>,</span>
									@endif
								@endforeach
							</td>
						</tr>
						<tr>
							<td>- Giảng viên phụ trách chính:  </td>
							<td>{{$all_decuong->chucdanh}} {{$all_decuong->hodem}} {{$all_decuong->ten}}</td>
						</tr>
						<tr>
							<td>- Danh sách giảng viên cùng giảng dạy:</td>
							<td>
								@foreach($list_gvdc as $val_lgvdc)
									<span>{{$val_lgvdc}} </span>
									@if( next( $list_gvdc ) ) 
										<span>,</span>
									@endif
								@endforeach
							</td>
						</tr>
						<tr>
							<td>- Bộ môn phụ trách giảng dạy:</td>
							<td> Ten Khoa </td>
						</tr>
						<tr>
							<td><b>1.8 Điều kiện tham gia học phần</b></td>
						</tr>
						<tr>
							<td>- Học phần tiên quyết:</td>
							<td>2</td>
						</tr>
						<tr>
							<td>- Học phần học trước:</td>
							<td>2</td>
						</tr>
						<tr>
							<td>- Học phần song hành:</td>
							<td>2</td>
						</tr>
						
					</table>

					<p><b>2. Mô tả tóm tắt học phần</b></p>
					<p>{{$all_decuong->mota_tomtat}}</p>

					<p><b>3. Mục tiêu của học phần: </b></p>
					<p>a. Kiến thức</p>
					<p>Trang bị cho sinh viên những kiến thức như sau:</p>
					<p class="content" id="muctieu-kienthuc">
						
					</p>
					<p>b. Kỹ năng</p>
					<p>Rèn luyện cho sinh viên kỹ năng cá nhân, kỹ năng giao tiếp thiết yếu cùng với các kỹ năng thực hành thực tế. cụ thể như sau:</p>
					<p id="muctieu-kynang">
						
					</p>
					<p>c. Thái độ</p>
					<p id="muctieu-thaido">
						
					</p>
					<p><b>4. Chuẩn đầu ra của học phần (Course Learning Outcome – viết tắt là CLO): </b></p>
					<p>Sau khi kết thúc học phần sinh viên có khả năng</p>
					<center><b>Bảng 4.1. Chuẩn đầu ra của học phần (CLO)</b></center>

					<table class="table table-bordered table-clo">
						<thead>
							<tr>
								<td><b>Ký hiệu CLO</b></td>
								<td><b>Nội dung CLO</b></td>
							</tr>
						</thead>
						<tbody>
							<?php $stt=1; ?>
							@foreach($all_cdr as $value_all_cdr)
							<tr>
								<td class="column-1">CLO {{$value_all_cdr->stt}}</td>
								<td>{{$value_all_cdr->noi_dung}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<p><b>5. Ma trận thể hiện sự đóng góp của các chuẩn đầu ra học phần (CLO) vào việc đạt được các chuẩn đầu ra của CTĐT (PLO) và các chỉ số PI (Performance Indicator): </b></p>
					<center><p><b>Bảng 5.1. Mối liên hệ giữa CLO và PLO/PI</b></p></center>
					<center><p>Điền một trong các mức I, R, M hoặc chừa trống (nếu không có sự liên hệ) và điền A vào ô tương ứng</p></center>

					<table class="table table-bordered table-moi-lien-he-clo-plo-pi">
						<thead>

							<tr>
								<td rowspan="4" class="align-middle">CLO</td>

							</tr>

							<tr>
								<td colspan="{{$tong_pi}}" class="align-middle">PLO và chỉ số PI</td>
							</tr>

							<?php $stt_plo = 0; ?>
							<tr>
								@foreach($all_PLO as $value_all_PLO)
									<?php $stt_plo++; ?>
									<td colspan="{{$value_all_PLO->count_pli}}" class="align-middle">PLO {{$stt_plo}}</td>
								@endforeach	
							</tr>

							<tr>
								@foreach($all_PI as $value_all_PI)
									
									@if(isset($value_all_PI->noPI))
										<td></td>
									@else
										<td class="align-middle">PI {{$value_all_PI->stt_pi}}</td>
									@endif

								@endforeach	
							</tr>
						</thead>

						<tbody>
							@foreach($all_cdr as $value_all_cdr)
								<tr>
									<td class="column-1 align-middle">CLO {{$value_all_cdr->stt}}</td>
									@foreach($all_PI as $value_all_PI)
										<?php $check=0; ?>
										@if(isset($value_all_PI->moilienhe))

											@foreach($value_all_PI->moilienhe as $value1) 
												@if($value_all_cdr->id == $value1->id_chuandaura_monhoc) 
													<?php $check=1; ?>
													<td>{{$value1->ten_mucdo}}</td>
												@endif
											@endforeach
										@endif

										@if($check == 0) 
											<td></td>
										@endif
									@endforeach	
								</tr>
							@endforeach
						</tbody>
					</table>

					@if(isset($all_dghp) && $all_dghp != null)
					<p><b>6.	Đánh giá học phần: </b></p>
					<p>Sinh viên được đánh giá kết quả học tập trên cơ sở điểm thành phần như sau:</p>
					<center><b>Bảng 6.1. Phương pháp, hình thức kiểm tra - đánh giá kết quả học tập của SV </b></center>
					<table class="table table-bordered table-danh-gia-hoc-phan">
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
											<td rowspan="2"><span>A.<?php echo $stt; ?></span> <span>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</span></td>
											<td><span>A.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
											<td><span>P.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
											<td><span>W.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
											<td rowspan="2">
												<span>W.<?php echo $stt; ?></span> 
												<span> 
												@foreach($all_trongso as $value_trongso)
													@if($value_trongso->id_trongso == $value_dghp_parent->id_baidanhgia)
														{{$value_trongso->trongso*100}}
													@endif
												@endforeach
												%
												</span>
											</td>
											<td>
												<span>
												@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
													@if (next($value_dghp_parent->cdr_hocphan)==true)
													CLO {{$value_list_cdr}},
													@else
													CLO {{$value_list_cdr}}
													@endif
												@endforeach
												</span>
											</td>
										</tr>
										<?php $a = $stt; ?>
										<?php $stt++; ?>
									@else
										<tr>
											<td><span>A.<?php echo $a; ?>.2</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
											<td><span>P.<?php echo $a; ?>.2</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
											<td><span>W.<?php echo $a; ?>.2 <span></span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
											<td>
												<span>
												@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
													@if (next($value_dghp_parent->cdr_hocphan)==true)
													CLO {{$value_list_cdr}},
													@else
													CLO {{$value_list_cdr}}
													@endif
												@endforeach
												</span>
											</td>
										</tr>
									@endif			
								@else 
									<tr>
										<td><span>A.<?php echo $stt; ?></span>  <span>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</span> </td>
										<td><span>A.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
										<td><span>P.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
										<td><span>W.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
										<td>
											<span>W.<?php echo $stt; ?></span> 
											<span> 
											@foreach($all_trongso as $value_trongso)
												@if($value_trongso->id_trongso == $value_dghp_parent->id_baidanhgia)
													{{$value_trongso->trongso*100}}
												@endif
											@endforeach
											%
											</span>
										</td>
										<td>
											<span>
											@foreach($value_dghp_parent->cdr_hocphan as $value_list_cdr)
												@if (next($value_dghp_parent->cdr_hocphan)==true)
												CLO {{$value_list_cdr}},
												@else
												CLO {{$value_list_cdr}}
												@endif
											@endforeach
											</span>
										</td>
									</tr>
									<?php $stt++; ?>
								@endif
							@endforeach
						</tbody>
					</table>
					@endif

					@if(isset($all_kehoachgiangday_lt) && $all_kehoachgiangday_lt != null)
					<p><b>7. Kế hoạch giảng dạy và học: </b></p>
					<p><b>7.1 Kế hoạch giảng dạy và học cho phần lý thuyết: </b></p>
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
					<p><b>7.2 Kế hoạch giảng dạy và học cho phần thực hành: </b></p>
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

					<p><b>8. Học liệu: </b></p>
					<p><center><b>Bảng 8.1 Sách, bài giảng, giáo trình chính: </b></center></p>
					<table class="table table-bordered table-tai-lieu-tham-khao">
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
								<td colspan="5"><b>Sách, bài giảng, giáo trình chính</b></td>
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
								<td colspan="5"><b>Sách, tài liệu tham khảo</b></td>
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

