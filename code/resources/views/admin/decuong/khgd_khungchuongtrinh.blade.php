@extends('admin_layout')
@section('admin_content') 

<div class="danh-sach-khung-chuong-trinh">
    <div class="container-fluid">

        <div class="row">
			<div class="col-md-12 nopadding title">
				<p>Kế hoạch giảng dạy</p>
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
                            <td>Khóa học</td>
                            <td>Kế hoạch giảng dạy</td>
                        </tr>
                    </thead> 

                    <tbody id="body-danh-sach-khung-chuong-trinh">

                        @foreach($all_kct_hocphan as $value_all_kct_hocphan)
                        <tr>
                            <td>{{$value_all_kct_hocphan->stt}}</td>
                            <td>{{$value_all_kct_hocphan->mahocphan}}</td>
                            <td>{{$value_all_kct_hocphan->tenhocphan}}</td>
                            <td>{{$value_all_kct_hocphan->nambatdau.' - '.$value_all_kct_hocphan->namketthuc}}</td>
                            @if(isset($value_all_kct_hocphan->has_khgd))
                            <td>
                                <a href="{{URL::to('admin/decuong/sua-ke-hoach-giang-day-thu-gon/'.$value_all_kct_hocphan->id_hocphan.'/'.$value_all_kct_hocphan->id_khung)}}" style="color: #4169e1;">Sửa KHGD</a>
                            </td>
                            @else
                            <td>
                                <a href="{{URL::to('admin/decuong/them-ke-hoach-giang-day-thu-gon/'.$value_all_kct_hocphan->id_hocphan.'/'.$value_all_kct_hocphan->id_khung)}}" style="color: #f64e60;">Thêm KHGD</a>
                            </td>
                            @endif
                                      
                        </tr>
                        @endforeach

                    </tbody>
                        
                </table>

            </div>
        </div>
    </div>
</div>



<script>

	$(document).ready(function() {

		$('#select_khungchuongtrinh').on('change', function () {
			var url = $(this).val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/khgd-khung-chuong-trinh/' + url;
			}
          return false;
        });
	});

</script>


@endsection