@extends('admin_layout')
@section('admin_content') 

<div class="thong-ke-khung">
    <div class="container-fluid">

        <div class="row">
			<div class="col-md-12 nopadding title">
				<p>Thống kê khung {{$ten_khung}}</p>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12 list-thong-ke">
                <div>
                    <span>Tổng số học phần: {{$info_kct['tongsohocphan']}}</span>
                </div>
                <div>
                    <span>Số học phần thiếu đề cương: {{$info_kct['hocphanthieudecuong']}}</span>
                </div>
                <div>
                    <span>Số học phần thiếu lịch trình: {{$info_kct['hocphanthieukhgd']}}</span>
                </div>
                <div>
                    <span>Học phần thiếu điều kiện học trước: </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 nopadding body-thong-ke-khung">

                <table class="table-danh-sach">
                    <thead> 
                        <tr>
                            <td>STT</td>
                            <td>Tên Học phần</td>
                            <td>Đề cương</td>
                            <td>Lịch trình</td>
                            <td>Điều kiện học trước</td>
                        </tr>
                    </thead> 
 
                   <tbody>
                       <?php $stt=1; ?>
                       @foreach($all_kct_hocphan as $value_all_kct_hocphan) 
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$value_all_kct_hocphan->tenhocphan}}</td>
                            <td>
                                @if(isset($value_all_kct_hocphan->has_decuong))
                                <img style="width:24px;" src="{{ asset('./public/Images/icons/check-yes.png')}}">
                                @else
                                <img style="width:24px;" src="{{ asset('./public/Images/icons/check-no.png')}}">
                                @endif
                            </td>
                            <td>
                                @if(isset($value_all_kct_hocphan->has_khgd))
                                <img style="width:24px;" src="{{ asset('./public/Images/icons/check-yes.png')}}">
                                @else
                                <img style="width:24px;" src="{{ asset('./public/Images/icons/check-no.png')}}">
                                @endif
                            </td>
                            <td></td>
                        </tr>
                       @endforeach
                   </tbody>

                        
                </table>

            </div>
        </div>
    </div>
</div>


@endsection