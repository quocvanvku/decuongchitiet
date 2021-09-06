@extends('admin_layout')
@section('admin_content') 

<div class="danh-sach-khung-chuong-trinh">
    <div class="container-fluid">

        <div class="row">
			<div class="col-md-12 nopadding title">
				<p>Khối lượng kiến thức</p>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12 nopadding body-khung-chuong-trinh">
                <select name="" id="select_khungchuongtrinh">
                    @foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh)
                        @if($value_all_khungchuongtrinh->level == 1)
                        <option value="{{$value_all_khungchuongtrinh->id}}" <?php if($id_khung == $value_all_khungchuongtrinh->id) echo "selected" ?> >|____{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                        @else
                        <option value="{{$value_all_khungchuongtrinh->id}}" <?php if($id_khung == $value_all_khungchuongtrinh->id) echo "selected" ?> >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                        @endif
                    @endforeach
                </select> 

                <div class="title-table">
                    <i class="fas fa-list"></i><span>Danh mục Khối kiến thức</span>
                </div>

                <table class="table-khoi-kien-thuc">
                    <thead> 
                        <tr>
                            <td style="width:40px;">STT</td>
                            <td>Tên học phần</td>
                            <td>Số tín chỉ</td>
                            <td>Học kỳ</td>
                        </tr>
                    </thead> 

                    <tbody>
                        <?php $stt_parent = 0; $array = array('I', 'II', 'III', 'IV', 'V'); ?>
                        <?php $stt = 1; ?>
                        @foreach($all_khoiluongkienthuc as $value_all_klkt)

                            @if(isset($value_all_klkt->hasChild)) 
                            <?php $l2=1; ?>
                            <tr style="background:#f6caad; font-weight: 600;">
                                <td>{{$stt_l2 = $array[$stt_parent++]}}</td>
                                <td colspan="3" style="text-align: left;" >{{$value_all_klkt->tenkhoiluongkienthuc}}</td>
                            </tr>
                            @elseif($value_all_klkt->level == 0)
                                <tr style="background:#f6caad; font-weight: 600;">
                                    <td>{{$array[$stt_parent++]}}</td>
                                    <td colspan="3" style="text-align: left;" >{{$value_all_klkt->tenkhoiluongkienthuc}}</td>
                                </tr>
                                @if(isset($value_all_klkt->hp_klkt))

                                    @foreach($value_all_klkt->hp_klkt as $value_hp_klkt)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td style="text-align: left;">{{$value_hp_klkt->tenhocphan}}</td>
                                        <td>{{$value_hp_klkt->soTC}}</td>
                                        <td>{{$value_hp_klkt->hocky}}</td>
                                    </tr>
                                    @endforeach
                                @endif
 
                            @elseif($value_all_klkt->level == 1)
                                <tr style="background:#f6caad; font-weight: 600;">
                                    <td>{{$stt_l2.'.'.$l2++}}</td>
                                    <td colspan="3" style="text-align: left;" >|____{{$value_all_klkt->tenkhoiluongkienthuc}}</td>
                                </tr>
                                @if(isset($value_all_klkt->hp_klkt))

                                    @foreach($value_all_klkt->hp_klkt as $value_hp_klkt)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td style="text-align: left;">{{$value_hp_klkt->tenhocphan}}</td>
                                        <td>{{$value_hp_klkt->soTC}}</td>
                                        <td>{{$value_hp_klkt->hocky}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            @endif

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
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/khoi-kien-thuc/' + url;
			}
          return false;
        });

	});
</script>


@endsection