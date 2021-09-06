@extends('admin_layout')
@section('admin_content') 

<div class="thong-ke-khung">
    <div class="container-fluid">

        <div class="row">
			<div class="col-md-12 nopadding title">
				<p>Thống kê khung</p>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12 nopadding body-thong-ke-khung">

                <div class="title-table">
                    <i class="fas fa-list"></i><span>THỐNG KÊ KHUNG CHƯƠNG TRÌNH</span>
                </div>

                <table class="table-thong-ke-khung">
                    <thead> 
                        <tr>
                            <td>STT</td>
                            <td>Mã ngành</td>
                            <td>Tên Khung chương trình</td>
                            <td>Tổng số học phần</td>
                            <td>Thiếu đề cương</td>
                            <td>Thiếu lịch trình</td>
                            <td>Thiếu điều kiện học trước</td>
                            <td></td>
                        </tr>    
                    </thead> 
 
                   <tbody>
                        <?php $stt=1; ?>
                        @foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh) 
                            @if(isset($value_all_khungchuongtrinh->hasChild))
                            <tr style="background: #E3E3E3;">
                                <td>{{$stt++}}</td>
                                <td></td>
                                <td colspan="6" style="text-align: left;">{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</td>
                            </tr>
                            @elseif($value_all_khungchuongtrinh->level == 1)
                            <tr>
                                <td>{{$stt++}}</td>
                                <td></td>
                                <td style="text-align: left;" >|___{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</td>
                                <td style="color: #AD0101;">{{$value_all_khungchuongtrinh->tongsohocphan}}</td>
                                <td>{{$value_all_khungchuongtrinh->hocphanthieudecuong}} / <font style="color: #AD0101;">{{$value_all_khungchuongtrinh->tongsohocphan}}</font> </td>
                                <td>{{$value_all_khungchuongtrinh->hocphanthieukhgd}}  / <font style="color: #AD0101;">{{$value_all_khungchuongtrinh->tongsohocphan}}</font> </td>
                                <td></td>
                                <td>
                                    <a href="{{URL::to('admin/decuong/thong-ke-khung-chi-tiet/'.$value_all_khungchuongtrinh->id)}}" style="color:#009879;"><i class="fas fa-chevron-circle-right"></i> Xem chi tiết</a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>{{$stt++}}</td>
                                <td></td>
                                <td style="text-align: left;" >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</td>
                                <td style="color: #AD0101;" >{{$value_all_khungchuongtrinh->tongsohocphan}}</td>
                                <td>{{$value_all_khungchuongtrinh->hocphanthieudecuong}} / <font style="color: #AD0101;">{{$value_all_khungchuongtrinh->tongsohocphan}}</font> </td>
                                <td>{{$value_all_khungchuongtrinh->hocphanthieukhgd}} / <font style="color: #AD0101;">{{$value_all_khungchuongtrinh->tongsohocphan}}</font> </td>
                                <td></td>
                                <td>
                                    <a href="{{URL::to('admin/decuong/thong-ke-khung-chi-tiet/'.$value_all_khungchuongtrinh->id)}}" style="color:#009879;"><i class="fas fa-chevron-circle-right"></i> Xem chi tiết</a>
                                </td>
                            </tr>
                            @endif

                        @endforeach

                   </tbody>

                        
                </table>

            </div>
        </div>
    </div>
</div>


@endsection