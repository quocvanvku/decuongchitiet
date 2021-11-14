@extends('admin_layout')
@section('admin_content') 

<div class="them-hoc-phan-khung-chuong-trinh">
	<div class="container">
		<div class="row">
			<div class="col-md-12 nopadding">
				<div class="frame-them-hoc-phan-khung-chuong-trinh">

                    <h4 class="title">Sửa học phần khung chương trình</h4>

                    <form action="{{URL::to('admin/decuong/sua-hoc-phan-khung-chuong-trinh')}}" method="post">
                    {{ csrf_field() }}
                        <table>
                            <tr>
                                <td>
                                    <p>1. Chọn khung chương trình</p>
                                </td>
                                <td> 
                                    <select name="khungchuongtrinh" id="select_khoa" required="" style="margin-left:0px;">
                                        @foreach($all_khungchuongtrinh as $value_khungchuongtrinh)
                                        <option value="{{$value_khungchuongtrinh->id}}" <?php if($value_khungchuongtrinh->id == $all_kct->id_khung) {echo "selected";} else {echo "disabled";} ?> >{{$value_khungchuongtrinh->tenkhungchuongtrinh}}</option>
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
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hptt->mahocphan.' - '.$value_list_hptt->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hptt[]" value="{{$value_list_hptt->id}}">
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
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hptq->mahocphan.' - '.$value_list_hptq->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hptq[]" value="{{$value_list_hptq->id}}">
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
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hpht->mahocphan.' - '.$value_list_hpht->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hpht[]" value="{{$value_list_hpht->id}}">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>

							<tr>
                                <td  class="c1">7. Học phần tương đương</td>
                                <td class="c2-dsgvdc">
                                    <div class="gvdc">
                                        <input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-tuong-duong" class="ip-hocphan-kct" placeholder="Nhập tên Học phần tương đương">
                                        <div id="hocphantuongduong" class="list-danh-sach">

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dsgvdc">
                                        <h4>Danh sách các Học phần tương đương: </h4>
                                        <ul id="list-hptd">
                                            @foreach($list_hptd as $value_list_hptd)
                                            <li>
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hptd->mahocphan.' - '.$value_list_hptd->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hptd[]" value="{{$value_list_hptd->id}}">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td  class="c1">8. Học phần song hành</td>
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
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hpsh->mahocphan.' - '.$value_list_hpsh->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hpsh[]" value="{{$value_list_hpsh->id}}">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>

							<tr>
                                <td  class="c1">9. Học phần Học ghép</td>
                                <td class="c2-dsgvdc">
                                    <div class="gvdc">
                                        <input type="text" class="input-ajax-hocphan" name="" id="hoc-phan-hoc-ghep" class="ip-hocphan-kct" placeholder="Nhập tên Học phần học ghép">
                                        <div id="hocphanhocghep" class="list-danh-sach">

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dsgvdc">
                                        <h4>Danh sách các Học phần học ghép: </h4>
                                        <ul id="list-hphg">
                                            @foreach($list_hphg as $value_list_hphg)
                                            <li>
                                                <span> <i class="fas fa-stream"></i> {{$value_list_hphg->mahocphan.' - '.$value_list_hphg->tenhocphan}}</span>
                                                <span id="delete-hp">Xoá</span>
                                                <input type="hidden" name="list_id_hphg[]" value="{{$value_list_hphg->id}}">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>10. Thuộc khối kiến thức</p>
                                </td>
                                <td>
                                    <select name="khoiluongkienthuc" multiple id="select_khoiluongkienthuc" required="">
                                        @foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc)
                                            @if(isset($value_all_khoiluongkienthuc->hasChild))
                                                <option disabled >{{$value_all_khoiluongkienthuc->tenkhoiluongkienthuc}}</option>
                                            @elseif($value_all_khoiluongkienthuc->level == 0)
                                                <option value="{{$value_all_khoiluongkienthuc->id}}" <?php if($value_all_khoiluongkienthuc->id == $all_kct->khoikienthuc) {echo "selected";} ?> >{{$value_all_khoiluongkienthuc->tenkhoiluongkienthuc}}</option>
                                            @elseif($value_all_khoiluongkienthuc->level == 1)
                                                <option value="{{$value_all_khoiluongkienthuc->id}}" <?php if($value_all_khoiluongkienthuc->id == $all_kct->khoikienthuc) {echo "selected";} ?> >|____{{$value_all_khoiluongkienthuc->tenkhoiluongkienthuc}}</option>			
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p class="">11. Học phần tự chọn</p>
                                </td>
                                <td> 
                                    <select name="tuchon" multiple id="select_hp_tuchon" required="" style="margin-left:0px;">
                                        <option value="1" <?php if($all_kct->tuchon == 1) {echo "selected";} ?> >Yes</option>
                                        <option value="0" <?php if($all_kct->tuchon == 0) {echo "selected";} ?> >No</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                    <input class="btn btn-success" type="submit" name="" id="sua-hp-kct" value="Sửa học phần">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
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
					type: 'GET',
					data:{query:query, _token:_token},
				
				}).done(function(data) {
					if (data != null) {
						$('#tenhocphanaj').fadeIn();  
						$('#tenhocphanaj').html(data);
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

		$('#hoc-phan-thay-the').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'GET',
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


		$('#hocphanthaythe').on('click', ' ul li', function() {
			$('#hoc-phan-thay-the').val(""); 
			$('#hocphanthaythe').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hptt[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
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
					method: 'GET',
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


		$('#hocphantienquyet').on('click', 'ul li', function() {
			$('#hoc-phan-tien-quyet').val(""); 
			$('#hocphantienquyet').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hptq[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
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
					method: 'GET',
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


		$('#hocphanhoctruoc').on('click', 'ul li', function() {
			$('#hoc-phan-hoc-truoc').val(""); 
			$('#hocphanhoctruoc').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hpht[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hpht");
			div.appendChild(p);

		});

		$('#hoc-phan-tuong-duong').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'GET',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphantuongduong').fadeIn();  
       						$('#hocphantuongduong').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphantuongduong').fadeOut();   
			}

		});


		$('#hocphantuongduong').on('click', 'ul li', function() {
			$('#hoc-phan-tuong-duong').val(""); 
			$('#hocphantuongduong').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hptd[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hptd");
			div.appendChild(p);

		});

		$('#hoc-phan-song-hanh').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'GET',
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


		$('#hocphansonghanh').on('click', 'ul li', function() {
			$('#hoc-phan-song-hanh').val(""); 
			$('#hocphansonghanh').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hpsh[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hpsh");
			div.appendChild(p);

		});

		$('#hoc-phan-hoc-ghep').keyup(function() {
			var query = $(this).val();

			if (query != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{URL::to('admin/decuong/get-hoc-phan-kcthp')}}",
					method: 'GET',
					data:{query:query, _token:_token},
					success: function(data) {
						if (data != null) {
							$('#hocphanhocghep').fadeIn();  
       						$('#hocphanhocghep').html(data);
							//alert(data);
						}   
					}
				});
			} else {
				$('#hocphanhocghep').fadeOut();   
			}

		});


		$('#hocphanhocghep').on('click', 'ul li', function() {
			$('#hoc-phan-hoc-ghep').val(""); 
			$('#hocphanhocghep').fadeOut(); 

			var id_hp = this.dataset.value;

			var p = document.createElement("li");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_hphg[]");
			p2.setAttribute("value", id_hp);
			//p2.setAttribute("class", "list-gvdc-id");

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-hp";

			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-hphg");
			div.appendChild(p);

		});

		
		$('.dsgvdc').on('click', 'ul li span#delete-hp', function() {
			$(this).parent('li').remove();
		});

	});
</script>

@endsection