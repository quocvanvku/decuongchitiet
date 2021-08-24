@extends('admin_layout')
@section('admin_content') 

<div class="them-hoc-phan-khung-chuong-trinh">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 nopadding title">
				<p>Thêm học phần cho khung chương trình</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 nopadding">
				<form action="{{URL::to('admin/decuong/sua-hoc-phan-khung-chuong-trinh/'.$all_kct->id)}}" method="post">
				{{ csrf_field() }}
					<table>
						<tr>
							<td>
								<p>1. Chọn khung chương trình</p>
							</td>
							<td> 
								<select name="khungchuongtrinh" id="select_khoa" required="" style="margin-left:0px;">
									@foreach($all_khungchuongtrinh as $value_khungchuongtrinh)
									<option value="{{$value_khungchuongtrinh->id}}" hidden <?php if($value_khungchuongtrinh->id == $all_kct->id_khung) {echo "selected";} ?> >{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
									@endforeach
								</select>
							</td>
						</tr> 
						<tr>
							<td>
								<p>2. Học kỳ</p>
							</td>
							<td>
								<input type="number" name="hocky" value="{{$all_kct->hocky}}" id="ip-so-tiet-lt" placeholder="Học kỳ" required="" class="ip2row">
							</td>
						</tr>
						<tr>
							<td>
								<p>3. Tên học phần</p>
							</td>
							<td>
								<div class="tlhp">
									<input type="text" class="input-ajax-hocphan" name="ten_hoc_phan" disabled value="{{$all_kct->tenhocphan}}" id="ip-ten-hoc-phan" placeholder="Nhập tên học phần" required="">
									<input type="hidden" name="id_ten_hoc_phan" value="{{$all_kct->id_hocphan}}" id="id-ten-hoc-phan" >
									<div id="tenhocphanaj" class="list-danh-sach">

									</div>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td  class="c1">4. Học phần thay thế</td>
							<td class="c2-dsgvdc">
								<div class="gvdc">
									<input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-thay-the" class="ip-hocphan-kct" placeholder="Nhập tên Học phần thay thế">
									<div id="hocphanthaythe" class="list-danh-sach">

									</div>
								</div>
							</td>
							<td>
								<div class="dsgvdc">
									<h4>Danh sách các Học phần thay thế: </h4>
									<ul id="list-hptt">
										@foreach($list_hptt as $value_list_hptt)
										<li>
											<p>{{$value_list_hptt["ten_hp"]}}</p>
											<p id="delete-hp">Xoá</p>
											<input type="hidden" name="list_id_hptt[]" value="{{$value_list_hptt["id_hp"]}}">
										</li>
										@endforeach
									</ul>
								</div>
							</td>
						</tr>

						<tr>
							<td  class="c1">5. Học phần tiên quyết</td>
							<td class="c2-dsgvdc">
								<div class="gvdc">
									<input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-tien-quyet" class="ip-hocphan-kct" placeholder="Nhập tên Học phần tiên quyết">
									<div id="hocphantienquyet" class="list-danh-sach">

									</div>
								</div>
							</td>
							<td>
								<div class="dsgvdc">
									<h4>Danh sách các Học phần tiên quyết: </h4>
									<ul id="list-hptq">
										@foreach($list_hptq as $value_list_hptq)
										<li>
											<p>{{$value_list_hptq["ten_hp"]}}</p>
											<p id="delete-hp">Xoá</p>
											<input type="hidden" name="list_id_hptq[]" value="{{$value_list_hptq["id_hp"]}}">
										</li>
										@endforeach
									</ul>
								</div>
							</td>
						</tr>

						<tr>
							<td  class="c1">6. Học phần học trước</td>
							<td class="c2-dsgvdc">
								<div class="gvdc">
									<input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-hoc-truoc" class="ip-hocphan-kct" placeholder="Nhập tên Học phần học trước">
									<div id="hocphanhoctruoc" class="list-danh-sach">

									</div>
								</div>
							</td>
							<td>
								<div class="dsgvdc">
									<h4>Danh sách các Học phần học trước: </h4>
									<ul id="list-hpht">
										@foreach($list_hpht as $value_list_hpht)
										<li>
											<p>{{$value_list_hpht["ten_hp"]}}</p>
											<p id="delete-hp">Xoá</p>
											<input type="hidden" name="list_id_hpht[]" value="{{$value_list_hpht["id_hp"]}}">
										</li>
										@endforeach
									</ul>
								</div>
							</td>
						</tr>

						<tr>
							<td  class="c1">7. Học phần song hành</td>
							<td class="c2-dsgvdc">
								<div class="gvdc">
									<input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-song-hanh" class="ip-hocphan-kct" placeholder="Nhập tên Học phần song hành">
									<div id="hocphansonghanh" class="list-danh-sach">

									</div>
								</div>
							</td>
							<td>
								<div class="dsgvdc">
									<h4>Danh sách các Học phần song hành: </h4>
									<ul id="list-hpsh">
										@foreach($list_hpsh as $value_list_hpsh)
										<li>
											<p>{{$value_list_hpsh["ten_hp"]}}</p>
											<p id="delete-hp">Xoá</p>
											<input type="hidden" name="list_id_hpsh[]" value="{{$value_list_hpsh["id_hp"]}}">
										</li>
										@endforeach
									</ul>
								</div>
							</td>
						</tr>

						<tr>
							<td>
								<p class="">8. Học phần tự chọn</p>
							</td>
							<td> 
								<select name="tuchon" multiple id="select_hp_tuchon" required="" style="margin-left:0px;">
									<option value="1" <?php if($all_kct->hocky == 1) {echo "selected";} ?> >Yes</option>
									<option value="0" <?php if($all_kct->hocky == 0) {echo "selected";} ?> >No</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td>
								<input type="submit" name="" id="" value="Sửa học phần">
							</td>
						</tr>

					</table>
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
					method: 'post',
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

		$('#tenhocphanaj ul li').live('click', function() {
			$('#ip-ten-hoc-phan').val($(this).text()); 
			$('#tenhocphanaj').fadeOut();  
			var idtenhocphan = this.dataset.value;
			document.getElementById("id-ten-hoc-phan").value = idtenhocphan;
		});

		$('#hoc-phan-thay-the').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'post',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphanthaythe').fadeIn();  
       						$('#hocphanthaythe').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphanthaythe').fadeOut();   
			}

		});


		$('#hocphanthaythe ul li').live('click', function() {
			$('#hoc-phan-thay-the').val(""); 
			$('#hocphanthaythe').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("p");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hptt[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("p")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hptt");
			div.appendChild(p);

		});

		$('#hoc-phan-tien-quyet').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'post',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphantienquyet').fadeIn();  
       						$('#hocphantienquyet').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphantienquyet').fadeOut();   
			}

		});


		$('#hocphantienquyet ul li').live('click', function() {
			$('#hoc-phan-tien-quyet').val(""); 
			$('#hocphantienquyet').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("p");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hptq[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("p")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hptq");
			div.appendChild(p);

		});

		$('#hoc-phan-hoc-truoc').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'post',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphanhoctruoc').fadeIn();  
       						$('#hocphanhoctruoc').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphanhoctruoc').fadeOut();   
			}

		});


		$('#hocphanhoctruoc ul li').live('click', function() {
			$('#hoc-phan-hoc-truoc').val(""); 
			$('#hocphanhoctruoc').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("p");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hpht[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("p")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hpht");
			div.appendChild(p);

		});

		$('#hoc-phan-song-hanh').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'post',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphansonghanh').fadeIn();  
       						$('#hocphansonghanh').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphansonghanh').fadeOut();   
			}

		});


		$('#hocphansonghanh ul li').live('click', function() {
			$('#hoc-phan-song-hanh').val(""); 
			$('#hocphansonghanh').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("p");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hpsh[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("p")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hpsh");
			div.appendChild(p);

		});

		

		$('#delete-hp').live('click', function() {
			$(this).parent('li').remove();
		});

	});
</script>

@endsection