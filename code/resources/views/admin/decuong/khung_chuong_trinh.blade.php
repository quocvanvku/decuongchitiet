@extends('admin_layout')
@section('admin_content') 

<div class="danh-sach-khung-chuong-trinh">
    <div class="container-fluid">

        <div class="row">
			<div class="col-md-12 nopadding title">
				<p>Khung chương trình đề cương</p>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12 nopadding body-khung-chuong-trinh">
                <select name="" id="select_khungchuongtrinh">
                    @foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh)
                    <option value="{{$value_all_khungchuongtrinh->id}}" <?php if($id_khungchuongtrinh == $value_all_khungchuongtrinh->id) echo "selected" ?> >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                    @endforeach
                </select>

                <table class="table-danh-sach">
                    <thead> 
                        <tr>
                            <td>STT</td>
                            <td>Mã học phần</td>
                            <td>Tên học phần</td>
                            <td>Học kỳ</td>
                            <td>Học phần: tiên quyết (a), học trước (b), song hành (c)</td>
                            <td>HP tự chọn</td>
                            <td>Khóa học</td>
                            <td>Đề cương chi tiết</td>
                        </tr>
                    </thead> 

                    <tbody id="body-danh-sach-khung-chuong-trinh">
                        <?php $stt_kct=1; ?>
                        @foreach($all_kct_hocphan as $value_all_kct_hocphan)
                        <tr>
                            <td>{{$stt_kct++}}</td>
                            <td>{{$value_all_kct_hocphan->mahocphan}}</td>
                            <td>{{$value_all_kct_hocphan->tenhocphan}}</td>
                            <td>{{$value_all_kct_hocphan->hocky}}</td>
                            <td id="dshplq-{{$value_all_kct_hocphan->id_hocphan}}" class="ds-hp-lq"></td>
                            <script type="text/javascript">
                                var dataenc = <?php echo json_encode(html_entity_decode($value_all_kct_hocphan->ds_hocphan_lienquan, ENT_QUOTES, "utf-8")); ?>;
                                $('#dshplq-{{$value_all_kct_hocphan->id_hocphan}}').html(dataenc);
                            </script>
							@if($value_all_kct_hocphan->tuchon == 1)
							<td><img style="width:24px" src="{{ asset('./public/Images/icons/check-yes.png')}}"></td>
							@else
							<td><img style="width:24px" src="{{ asset('./public/Images/icons/check-no.png')}}"></td>
							@endif
                            <td>{{$value_all_kct_hocphan->nambatdau.' - '.$value_all_kct_hocphan->namketthuc}}</td>
                            
                            @if(isset($value_all_kct_hocphan->has_decuong))
                            <td style="color: #4169e1;cursor: pointer;" id="myBtn_1" data-value="{{$value_all_kct_hocphan->id_decuong}}">Sửa đề cương</td>
                            @else
                            <td style="color: #f64e60;cursor: pointer;" id="myBtn_2" data-value="{{$value_all_kct_hocphan->id_hocphan}}" >Nhân bản đề cương</td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>

                    <div id="myModal_1" class="modal_1">
                        <div class="modal-content">
                            <span class="close_1">&times;</span>
                            <p style="text-align:center;">Chỉnh sửa đề cương</p>
                            <div id="decuong_kct"></div>
                        </div>
                    </div>

                    <div id="myModal_2" class="modal_2">
                        <div class="modal-content">
                            <span class="close_2">&times;</span>
                            <p style="text-align:center;" >Danh sách đề cương </p>
                            <div id="nhanban_decuong_kct"></div>
                        </div>
                    </div>
                        
                </table>

            </div>
        </div>
    </div>
</div>


<!-- <div class="top-dang-bai-viet">
	<p>Khung chương trình</p>
</div>

<select name="" id="select_khungchuongtrinh">
	@foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh)
	<option value="{{$value_all_khungchuongtrinh->id}}" <?php if($id_khungchuongtrinh == $value_all_khungchuongtrinh->id) echo "selected" ?> >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
	@endforeach
</select>

<div class="tim-kiem-de-cuong">
	Tìm Kiếm: 
	<input type="text" name="" id="nhap_tim_kiem_hoc_phan" placeholder="Nhập tên học phần...">
</div> -->

<script>
	$(document).ready(function() {

		$('#select_khungchuongtrinh').on('change', function () {
			var url = $(this).val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/khung-chuong-trinh/' + url;
			}
          return false;
        });

		var modal_1 = document.getElementById("myModal_1");
		var span_1 = document.getElementsByClassName("close_1")[0];

		$('#body-danh-sach-khung-chuong-trinh').on('click', 'tr td#myBtn_1',function() {
			modal_1.style.display = "block";

			var id_decuong = this.dataset.value;

            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{URL::to('admin/decuong/de-cuong-khung-chuong-trinh')}}",
                method: 'GET',
                data:{id_decuong:id_decuong,  _token:_token},
                success: function(data) {
                    if (data != null) {
                        //location.reload();
						$('#decuong_kct').html(data);
						//alert(data);
                    }   
                }
            });

		});

		span_1.onclick = function() {
			modal_1.style.display = "none";
		}
		

		var modal_2 = document.getElementById("myModal_2");
		var span_2 = document.getElementsByClassName("close_2")[0];

		// $('#myBtn_2').live('click',function() {
		// 	modal_2.style.display = "block";
		// });

		span_2.onclick = function() {
			modal_2.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal_1) {
				modal_1.style.display = "none";
			}

			if (event.target == modal_2) {
				modal_2.style.display = "none";
			}
		}

		$('#body-danh-sach-khung-chuong-trinh').on('click', 'tr td#myBtn_2',function() {

			modal_2.style.display = "block";

			var id_hocphan = this.dataset.value;

            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{URL::to('admin/decuong/nhan-ban-de-cuong-khung-chuong-trinh')}}",
                method: 'GET',
                data:{id_hocphan:id_hocphan,  _token:_token},
                success: function(data) {
                    if (data != null) {
                        //location.reload();
						$('#nhanban_decuong_kct').html(data);
						//alert(data);
                    }   
                }
            });

		});

		$(document).ready(function() {
			$('#nhap_tim_kiem_hoc_phan').keyup(function() {
				
				var query = this.value;
				var kct = $('#select_khungchuongtrinh').val();

				var _token = $('input[name="_token"]').val();
					$.ajax({
						url: "{{URL::to('admin/decuong/tim-kiem-hoc-phan-khung-chuong-trinh')}}",
						method: 'post',
						data:{query:query, kct:kct, _token:_token},
						success: function(data) {
							if (data != null) {
								$('#body-danh-sach-khung-chuong-trinh').html(data);
								//alert(data);
							}   
						}
					});

			});
		});


	});
</script>


@endsection