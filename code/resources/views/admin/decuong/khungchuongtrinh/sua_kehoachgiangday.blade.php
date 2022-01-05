@extends('admin_layout')
@section('admin_content') 

<div class="ke-hoach-giang-day">
	<div class="container">

		<fieldset>
			<legend>Sửa đánh kế hoạch giảng dạy <span>{{$tenhocphan->tenhocphan}}</span></legend>

			<div class="row table-chuan-dau-ra">
				<div class="col-md-12 nopadding">

					<h4>Chuẩn đầu ra của học phần {{$tenhocphan->tenhocphan}} </h4>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>STT</td>
								<td>Chuẩn đầu ra học phần (CLO)</td>
							</tr>
						</thead>
						<tbody>
							<?php $stt=1; ?>
							@foreach($all_cdr as $value_cdr)
							<tr>
								<td class="row-stt">CLO <?php echo $stt; ?></td>
								<td style="text-align:left;" class="row-cdr">{{$value_cdr->noi_dung}}</td>
							</tr>
							<?php $stt++; ?>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>	

			<div class="row table-danh-gia-hoc-phan">
				<div class="col-md-12 nopadding">

					<h4>Đánh giá học phần {{$tenhocphan->tenhocphan}} </h4>

					<table class="table table-bordered">
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
											<td rowspan="2"><span class="left-bdg">A.<?php echo $stt; ?></span> <span>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</span></td>
											<td><span class="left-bdg">A.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
											<td><span class="left-bdg">P.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
											<td><span class="left-bdg">W.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
											<td rowspan="2">
												<span class="left-bdg">W.<?php echo $stt; ?></span> 
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
											<td><span class="left-bdg">A.<?php echo $a; ?>.2</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
											<td><span class="left-bdg">P.<?php echo $a; ?>.2</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
											<td><span class="left-bdg">W.<?php echo $a; ?>.2 <span></span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
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
										<td><span class="left-bdg">A.<?php echo $stt; ?></span>  <span>{{$value_dghp_parent->ten_thanhphandanhgia_parent}}</span> </td>
										<td><span class="left-bdg">A.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->ten_thanhphandanhgia}}</span></td>
										<td><span class="left-bdg">P.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->phuongphapdanhgia}}</span></td>
										<td><span class="left-bdg">W.<?php echo $stt; ?>.1</span> <span>{{$value_dghp_parent->trongsobaidanhgia}} %</span></td>
										<td>
											<span class="left-bdg">W.<?php echo $stt; ?></span> 
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
				</div>
			</div>

			<?php $temp = 0; $temp_thuchanh = 0; ?>

			<div class="row table-ke-hoach-giang-day">
				<div class="col-md-12 nopadding" id="body-ke-hoach-giang-day">
					<form action="{{URL::to('admin/decuong/sua-ke-hoach-giang-day/'.$id_decuong)}}" method="post">
						{{ csrf_field() }}

						<h4>Kế hoạch giảng dạy và học cho phần lý thuyết</h4>

						<table class="table table-bordered">
							<thead>
								<tr>
									<td></td>
									<td class="align-middle">Tuần/buổi</td>
									<td class="align-middle">Nội dung chi tiết</td>
									<td class="align-middle">Hoạt động dạy và học</td>
									<td class="align-middle">Bài đánh giá</td>
									<td class="align-middle">CĐR học phần</td>
									<td class="align-middle">Action</td>
								</tr>
							</thead>
							<tbody id="list-khgd">
								<?php $counter = 0; ?>
								@foreach($all_edit_khgd as $value_all_edit_khgd)
								<?php $temp++; ?>
								<tr>
									<td class="align-middle">
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
									<td class="align-middle stt-khgd">
										{{$value_all_edit_khgd->buoi}}
									</td>
									<td>
										<textarea name="ke_hoach_giang_day[]" required="true" rows="7" cols="50">{{$value_all_edit_khgd->noidung}}</textarea>
									</td>
									<td>
										<textarea name="ke_hoach_giang_day[]" required="true" rows="7" cols="50">{{$value_all_edit_khgd->hoatdongdayhoc}}</textarea>
									</td>
									<input type="hidden" value="{{$temp}}" name="ke_hoach_giang_day[]">
									<td class="align-middle">
										@foreach($baidanhgia as $value_bdg)
											<?php $check = 0; ?>
											@foreach($value_all_edit_khgd->baidanhgia as $value_baidanhgia)
												@if($value_bdg == $value_baidanhgia)
												<div class="">
													<input type="checkbox" checked value="{{$temp}}_{{$value_bdg}}" name="bai_danh_gia[]" id="">{{$value_bdg}}
												</div>
												<?php $check = 1; ?>
												@endif
											@endforeach

											@if($check == 0)
											<div class="">
												<input type="checkbox" value="{{$temp}}_{{$value_bdg}}" name="bai_danh_gia[]" id="">{{$value_bdg}}
											</div>
											@endif
										@endforeach
									</td>
									<td class="align-middle">
										<?php $stt_cdr = 1; ?>
										@foreach($all_cdr as $value_cdr_cb)
											<?php $check = 0; ?>
											@foreach($value_all_edit_khgd->cdrhocphan as $value_chuandaura_ip)
												@if($stt_cdr == $value_chuandaura_ip)
												<div class="">
													<input type="checkbox" checked value="{{$temp}}_{{$stt_cdr}}" name="chuan_dau_ra[]" id="">CLO {{$stt_cdr}}
												</div>
												<?php $check = 1; ?>
												@endif
											@endforeach

											@if($check == 0)
											<div class="">
												<input type="checkbox"value="{{$temp}}_{{$stt_cdr}}" name="chuan_dau_ra[]" id="">CLO {{$stt_cdr}}
											</div>
											@endif
											<?php $stt_cdr++; ?>
										@endforeach
									</td>
									<td class="align-middle" id="delete-ke-hoach-giang-day">
										<p>Xóa</p>
									</td>
								</tr>
								<?php $counter++; ?>
								@endforeach
							</tbody>
							<tr>
								<td class="align-middle" colspan="7" id="add-ke-hoach-giangday">
									<span>Thêm</span>
								</td>
							</tr>
						</table>

						<h4>Kế hoạch giảng dạy và học cho phần thực hành</h4>

						<table class="table table-bordered">
							<thead>
								<tr>
									<td></td>
									<td class="align-middle">Tuần/buổi</td>
									<td class="align-middle">Nội dung chi tiết</td>
									<td class="align-middle">Hoạt động dạy và học</td>
									<td class="align-middle">Bài đánh giá</td>
									<td class="align-middle">CĐR học phần</td>
									<td class="align-middle">Action</td>
								</tr>
							</thead>
							<tbody id="list-khgd-thuchanh">
								<?php $counter_th = 0; ?>
								@foreach($all_edit_khgd_thuchanh as $value_all_edit_khgd_thuchanh)
								<?php $temp_thuchanh++; ?>
								<tr>
									<td class="align-middle">
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
									<td class="align-middle stt-khgd-thuchanh">
										{{$value_all_edit_khgd_thuchanh->buoi}}
									</td>
									<td>
										<textarea name="ke_hoach_giang_day_thuchanh[]" required="true" rows="7" cols="50">{{$value_all_edit_khgd_thuchanh->noidung}}</textarea>
									</td>
									<td>
										<textarea name="ke_hoach_giang_day_thuchanh[]" required="true" rows="7" cols="50">{{$value_all_edit_khgd_thuchanh->hoatdongdayhoc}}</textarea>	
									</td>
									<input type="hidden" value="{{$temp_thuchanh}}" name="ke_hoach_giang_day_thuchanh[]">
									<td class="align-middle">
										@foreach($baidanhgia as $value_bdg_thuchanh)
											<?php $check = 0; ?>
											@foreach($value_all_edit_khgd_thuchanh->baidanhgia as $value_baidanhgia_thuchanh)
												@if($value_bdg_thuchanh == $value_baidanhgia_thuchanh)
												<div class="">
													<input type="checkbox" checked value="{{$temp_thuchanh}}_{{$value_bdg_thuchanh}}" name="bai_danh_gia_thuchanh[]" id="">{{$value_bdg_thuchanh}}
												</div>
												<?php $check = 1; ?>
												@endif
											@endforeach

											@if($check == 0)
											<div class="">
												<input type="checkbox" value="{{$temp_thuchanh}}_{{$value_bdg_thuchanh}}" name="bai_danh_gia_thuchanh[]" id="">{{$value_bdg_thuchanh}}
											</div>
											@endif
										@endforeach
									</td>
									<td class="align-middle">
										<?php $stt_cdr = 1; ?>
										@foreach($all_cdr as $value_cdr_cb_thuchanh)
											<?php $check = 0; ?>
											@foreach($value_all_edit_khgd_thuchanh->cdrhocphan as $value_chuandaura_ip_thuchanh)
												@if($stt_cdr == $value_chuandaura_ip_thuchanh)
												<div class="">
													<input type="checkbox" checked value="{{$temp_thuchanh}}_{{$stt_cdr}}" name="chuan_dau_ra_thuchanh[]" id="">CLO {{$stt_cdr}}
												</div>
												<?php $check = 1; ?>
												@endif
											@endforeach

											@if($check == 0)
											<div class="">
												<input type="checkbox"value="{{$temp_thuchanh}}_{{$stt_cdr}}" name="chuan_dau_ra_thuchanh[]" id="">CLO {{$stt_cdr}}
											</div>
											@endif
											<?php $stt_cdr++; ?>
										@endforeach 
									</td>
									<td class="align-middle" id="delete-ke-hoach-giang-day">
										<p>Xóa</p>
									</td>
								</tr>
								<?php $counter_th++; ?>
								@endforeach
							</tbody>
							<tr>
								<td class="align-middle" colspan="7" id="add-ke-hoach-giangday-thuchanh">
									<span>Thêm</span>
								</td>
							</tr>
						</table>

						<div class="sm-khgd">
							<center><input type="submit" value="Sửa kế hoạch giảng dạy" class="btn btn-success submit-ke-hoach-giang-day"></center>
						</div>

					</form>
				</div>
			</div>

		</fieldset>
		
	</div>
</div>


<script>

	var temp = <?php echo json_encode($temp); ?>;
	var temp_thuchanh = <?php echo json_encode($temp_thuchanh); ?>;

	$('#body-ke-hoach-giang-day').on('click', 'form table tr td#add-ke-hoach-giangday', function() {
		
		temp++;
		var temp_ip = document.createElement("input");
		temp_ip.setAttribute("type", "hidden");
		temp_ip.setAttribute("name", "ke_hoach_giang_day[]");
		temp_ip.setAttribute("value", temp);

		var p = document.createElement("tr");

		var p0 = document.createElement("td");

		var p1 = document.createElement("td");
		p1.setAttribute("class", "align-middle stt-khgd");
		var node1 = document.createTextNode('1');
		p1.appendChild(node1);

		// var buoilt = document.createElement("input");
		// buoilt.setAttribute("type", "hidden");
		// buoilt.setAttribute("name", "ke_hoach_giang_day[]");
		// buoilt.setAttribute("value", temp);
		// p1.appendChild(buoilt);
		
		var p2 = document.createElement("td");
		var node2 = document.createElement("textarea");
		node2.setAttribute("name", "ke_hoach_giang_day[]");
		node2.setAttribute('required',true);
		node2.rows = 7;
		node2.cols = 50;
		p2.appendChild(node2);

		var p3 = document.createElement("td");
		var node3 = document.createElement("textarea");
		node3.setAttribute("name", "ke_hoach_giang_day[]");
		node3.setAttribute('required',true);
		node3.rows = 7;
		node3.cols = 50;
		p3.appendChild(node3);

		var p4 = document.createElement("td");
		p4.setAttribute("class", "align-middle");
		@foreach($baidanhgia as $value_all_bdg_op)
		var node4 = document.createElement("div");
		var node4_1 = document.createElement("input");
		node4_1.setAttribute("name", "bai_danh_gia[]");
		node4_1.setAttribute("type", "checkbox");
		node4_1.setAttribute("value", temp+"_"+"{{$value_all_bdg_op}}");
		var node4_2 = document.createTextNode("{{$value_all_bdg_op}}");
		node4.appendChild(node4_1);
		node4.appendChild(node4_2);
		p4.appendChild(node4);
		@endforeach

		var p5 = document.createElement("td");
		p5.setAttribute("class", "align-middle");
		var vl_clo = 1;
		@foreach($all_cdr as $value_all_cdr_op)
		var node5 = document.createElement("div");
		var node5_1 = document.createElement("input");
		node5_1.setAttribute("name", "chuan_dau_ra[]");
		node5_1.setAttribute("type", "checkbox");
		node5_1.setAttribute("value", temp+"_"+vl_clo);
		var node5_2 = document.createTextNode("CLO "+(vl_clo++));
		node5.appendChild(node5_1);
		node5.appendChild(node5_2);
		p5.appendChild(node5);
		@endforeach

		var p6 = document.createElement("td");
		p6.setAttribute("class", "align-middle");
		p6.id = "delete-ke-hoach-giang-day";
		var node6 = document.createElement("p");
		var node6_1 = document.createTextNode("Xóa");
		node6.appendChild(node6_1);
		p6.appendChild(node6);

		p.appendChild(p0);
		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p3);
		p.appendChild(p4);
		p.appendChild(p5);
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

		var p0 = document.createElement("td");

		var p1 = document.createElement("td");
		p1.setAttribute("class", "align-middle stt-khgd-thuchanh");
		var node1 = document.createTextNode("1");
		p1.appendChild(node1);
		
		var p2 = document.createElement("td");
		var node2 = document.createElement("textarea");
		node2.setAttribute("name", "ke_hoach_giang_day_thuchanh[]");
		node2.setAttribute('required',true);
		node2.rows = 7;
		node2.cols = 50;
		p2.appendChild(node2);

		var p3 = document.createElement("td");
		var node3 = document.createElement("textarea");
		node3.setAttribute("name", "ke_hoach_giang_day_thuchanh[]");
		node3.setAttribute('required',true);
		node3.rows = 7;
		node3.cols = 50;
		p3.appendChild(node3);

		var p4 = document.createElement("td");
		p4.setAttribute("class", "align-middle");
		@foreach($baidanhgia as $value_all_bdg_op)
		var node4 = document.createElement("div");
		var node4_1 = document.createElement("input");
		node4_1.setAttribute("name", "bai_danh_gia_thuchanh[]");
		node4_1.setAttribute("type", "checkbox");
		node4_1.setAttribute("value", temp_thuchanh+"_"+"{{$value_all_bdg_op}}");
		var node4_2 = document.createTextNode("{{$value_all_bdg_op}}");
		node4.appendChild(node4_1);
		node4.appendChild(node4_2);
		p4.appendChild(node4);
		@endforeach

		var p5 = document.createElement("td");
		p5.setAttribute("class", "align-middle");
		var vl_clo = 1;
		@foreach($all_cdr as $value_all_cdr_op)
		var node5 = document.createElement("div");
		var node5_1 = document.createElement("input");
		node5_1.setAttribute("name", "chuan_dau_ra_thuchanh[]");
		node5_1.setAttribute("type", "checkbox");
		node5_1.setAttribute("value", temp_thuchanh+"_"+vl_clo);
		var node5_2 = document.createTextNode("CLO "+(vl_clo++));
		node5.appendChild(node5_1);
		node5.appendChild(node5_2);
		p5.appendChild(node5);
		@endforeach

		var p6 = document.createElement("td");
		p6.setAttribute("class", "align-middle");
		p6.id = "delete-ke-hoach-giang-day";
		var node6 = document.createElement("p");
		var node6_1 = document.createTextNode("Xóa");
		node6.appendChild(node6_1);
		p6.appendChild(node6);

		p.appendChild(p0);
		p.appendChild(p1);
		p.appendChild(p2);
		p.appendChild(p3);
		p.appendChild(p4);
		p.appendChild(p5);
		p.appendChild(p6);
		p.appendChild(temp_ip_thuchanh);

		var div = document.getElementById("list-khgd-thuchanh");
		div.appendChild(p);

		var x = document.getElementsByClassName('stt-khgd-thuchanh');
		for (var i = 0; i < x.length; i++) {
			x[i].innerHTML = i+1;
		}
	});

	$('.table-ke-hoach-giang-day').on('click', 'table tr td p#up-buoi', function() {
		var vl_khgd = this.dataset.value;

		var mang_khgd = vl_khgd.split("_");

		var id_khgd = mang_khgd[0];
		var id_hocphan_khgd = mang_khgd[1];
		var thuochocphan_khgd = mang_khgd[2];
		var khungchuongtrinh_khgd = mang_khgd[3];
		
		$.ajax({
			url: "{{URL::to('admin/decuong/up-stt-khgd')}}",
			method: 'GET',
			data:{id_khgd:id_khgd, id_hocphan_khgd:id_hocphan_khgd, thuochocphan_khgd:thuochocphan_khgd, khungchuongtrinh_khgd:khungchuongtrinh_khgd},
			success: function(data) {
				if (data != null) {
					location.reload();
					//alert(data);
				}   
			}
		});

	});

	$('.table-ke-hoach-giang-day').on('click', 'table tr td p#down-buoi', function() {
		var vl_khgd = this.dataset.value;

		var mang_khgd = vl_khgd.split("_");

		var id_khgd = mang_khgd[0];
		var id_hocphan_khgd = mang_khgd[1];
		var thuochocphan_khgd = mang_khgd[2];
		var khungchuongtrinh_khgd = mang_khgd[3];
		
		$.ajax({
			url: "{{URL::to('admin/decuong/down-stt-khgd')}}",
			method: 'GET',
			data:{id_khgd:id_khgd, id_hocphan_khgd:id_hocphan_khgd, thuochocphan_khgd:thuochocphan_khgd, khungchuongtrinh_khgd:khungchuongtrinh_khgd},
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