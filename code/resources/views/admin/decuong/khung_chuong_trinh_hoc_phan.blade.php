@extends('admin_layout')
@section('admin_content') 

<div class="khung-chuong-trinh-hoc-phan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nopadding title">
                <p>Danh sách khung chương trình học phần</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 nopadding">

                <select multiple size="14" id="select-khungchuongtrinh-hocphan">
                    @foreach($all_khungchuongtrinh as $value_all_khungchuongtrinh)                 
                        @if($value_all_khungchuongtrinh->level == 1)
                        <option value="{{$value_all_khungchuongtrinh->id}}" <?php if($value_all_khungchuongtrinh->id == $id_khungchuongtrinh) {echo "selected";} ?> >|____ {{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                        @else
                        <option value="{{$value_all_khungchuongtrinh->id}}" <?php if($value_all_khungchuongtrinh->id == $id_khungchuongtrinh) {echo "selected";} ?> >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                        @endif
                    @endforeach
                </select>

                <h4 class="title-tieu-de-khung-chuong-trinh-hoc-phan">Danh sách  khung chương trình học phần của {{$id_khungchuongtrinh}}</h4>

                <table class="table-danh-sach">
                    <thead>
                        <tr>
                            <td></td>
                            <td>STT</td>
                            <td>Tên học phần</td>
                            <td>Học kỳ</td>
                            <td>Học phần: tiên quyết (a), học trước (b), song hành (c)</td>
                            <td>HP tự chọn</td>
                            <td>Sửa</td>
                            <td>Xoá</td> 
                        </tr>
                    </thead> 

                    <tbody id="body-khung-chuong-trinh-hoc-phan"> 
                        <?php $cr_hocky = 0; ?>
                        @foreach($all_kct_hocphan as $value_kct_hocphan)

                        <tr>
                            <td>
                                @if($value_kct_hocphan->hocky == $cr_hocky)
                                <span id="up-stt" data-value="{{$value_kct_hocphan->id.'_'.$value_kct_hocphan->id_khung}}">
                                    <img src="{{ asset('./public/Images/icons/up.png')}}" alt="">
                                </span>
                                @endif
                                @if($value_kct_hocphan->stt != $value_kct_hocphan->totalhocky)
                                <span id="down-stt" data-value="{{$value_kct_hocphan->id.'_'.$value_kct_hocphan->id_khung}}">
                                    <img src="{{ asset('./public/Images/icons/down.png')}}" alt="">
                                </span>
                                @endif
                            </td>
                            <td >{{$value_kct_hocphan->stt}}</td>
                            <td >
                                {{$value_kct_hocphan->tenhocphan}}       
                            </td>
                            <td >
                                {{$value_kct_hocphan->hocky}}      
                            </td>
                            <td id="dshplq-{{$value_kct_hocphan->id_hocphan}}" class="ds-hp-lq"></td>
                            <script type="text/javascript">
                                var dataenc = <?php echo json_encode(html_entity_decode($value_kct_hocphan->ds_hocphan_lienquan, ENT_QUOTES, "utf-8")); ?>;
                                $('#dshplq-{{$value_kct_hocphan->id_hocphan}}').html(dataenc);
                            </script>
                            <td >
                                @if($value_kct_hocphan->tuchon == 1)
                                    <img src="{{ asset('./public/Images/icons/check-yes.png')}}" style="width:24px" alt="">
                                @else
                                    <img src="{{ asset('./public/Images/icons/check-no.png')}}" style="width:24px" alt="">
                                @endif        
                            </td>
                            <td>
                                <a href="{{URL::to('admin/decuong/sua-hoc-phan-khung-chuong-trinh/'.$value_kct_hocphan->id)}}">
                                    <img src="{{ asset('./public/Images/icons/edit.png')}}" style="width:24px;height:24px;" >
                                    <!-- <i class="fas fa-edit" style="color: #28a745;"> -->
                                </a>
                            </td>
                            <td>
                                <a href="{{URL::to('admin/decuong/xoa-hoc-phan-khung-chuong-trinh/'.$value_kct_hocphan->id)}}">
                                    <img src="{{ asset('./public/Images/icons/delete.png')}}" style="width:24px;height:24px;">
                                    <!-- <i class="fas fa-trash-alt" style="color: #dc3545;"> -->
                                </a>
                            </td>       
                        </tr>
                        <?php $cr_hocky = $value_kct_hocphan->hocky; ?>
                        @endforeach
                    </tbody>
                        
                </table>

            </div>
        </div>

    </div>
</div>


<script>
	$(document).ready(function() {
		$('#select-khungchuongtrinh-hocphan').on('change', function () {
			var url = $(this).val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/' + url;
			}
          return false;
        });

        $('#body-khung-chuong-trinh-hoc-phan').on('click', 'tr td span#up-stt',function() {

            var vl_kct = this.dataset.value;
            var mang_kct = vl_kct.split("_");

            var id_kct_hp = mang_kct[0];
            var id_khung = mang_kct[1];
            
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{URL::to('admin/decuong/up-kct-hp')}}",
                method: 'GET',
                data:{id_kct_hp:id_kct_hp, id_khung:id_khung, _token:_token},
                success: function(data) {
                    if (data != null) {
                        location.reload();
                        //alert(data);
                    }   
                }
            });

        });

        $('#body-khung-chuong-trinh-hoc-phan').on('click', 'tr td span#down-stt',function() {
            
            var vl_kct = this.dataset.value;
            var mang_kct = vl_kct.split("_");

            var id_kct_hp = mang_kct[0];
            var id_khung = mang_kct[1];
            
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{URL::to('admin/decuong/down-kct-hp')}}",
                method: 'GET',
                data:{id_kct_hp:id_kct_hp, id_khung:id_khung, _token:_token},
                success: function(data) {
                    if (data != null) {
                        location.reload();
                        //alert(data);
                    }   
                }
            });

        });

	});
</script>


@endsection