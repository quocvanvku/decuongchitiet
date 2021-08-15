@extends('admin_layout')
@section('admin_content') 

<div class="chuan-dau-ra-chung">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nopadding title">
                <p>Danh sách chuẩn đầu ra chung</p>
            </div>
        </div>

        <div class="row table-chuan-dau-ra-chung">
            <div class="col-md-12 nopadding">

                <select multiple size="14" id="select-nganh-cdr" style="margin-top: 10px;">
                    @foreach($all_nganh as $value_nganh)
                    @if($value_nganh->id == $id_nganh)
                    <option value="{{$value_nganh->id}}" selected>{{$value_nganh->tennganh}}</option>
                    @else
                    <option value="{{$value_nganh->id}}">{{$value_nganh->tennganh}}</option>
                    @endif
                    @endforeach
                </select>

                <h4 class="title-chuandaura-chung">Danh sách chuẩn đầu ra chung của {{$ten_nganh}}</h4>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="cl-1">#</td>
                            <td class='cl-2'>Nội dung</td>
                            <td class='cl-3'>Action</td>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $stt=1; ?>
                        @foreach($data_chuandau_chung as $value_data)
                        <tr>
                            <td class='cl-1'>{{$stt++}}</td>
                            <td class='cl-2'>
                                <textarea name="" rows="5" cols="145" id="noidung-cdr-{{$value_data->id_cdr_chung}}" <?php if($value_data->change == 0) {echo "disabled";} ?> >{{$value_data->noidung_cdr_chung}}</textarea>        
                            </td>
                            <td class='cl-3'>
                                @if($value_data->change == 1)
                                <p id="edit-cdr" data-value="{{$value_data->id_cdr_chung}}" >Sửa</p>
                                <p id="delete-cdr" data-value="{{$value_data->id_cdr_chung}}" >Xóa</p>   
                                @endif
                            </td>      
                        </tr>
                        @endforeach
                        <tr>
                            <td class='cl-1'></td>
                            <td class='cl-2'>
                                <textarea name="" rows="5" cols="145" id="noidung-cdr" ></textarea>        
                            </td>
                            <td class='cl-3'>
                                <p id="add-cdr" data-value="{{$id_nganh}}" >Thêm</p>  
                            </td>      
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>

<script>
	$(document).ready(function() {
		$('#select-nganh-cdr').on('change', function () {
			var url = $(this).val();
			if (url) { 
				window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/danh-sach-chuan-dau-ra-chung/' + url;
			}
          return false;
        });

        $('.cl-3 #edit-cdr').live('click',function() {
            var id_cdr_chung = this.dataset.value;
            var noidung = document.getElementById("noidung-cdr-"+id_cdr_chung).value;
			
            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-chuan-dau-ra-chung')}}",
                    method: 'post',
                    data:{id_cdr_chung:id_cdr_chung, noidung:noidung,  _token:_token},
                    success: function(data) {
                        if (data != null) {
                            location.reload();
                        }   
                    }
                });
            }

        });

        $('.cl-3 #delete-cdr').live('click',function() {
            var id_cdr_chung = this.dataset.value;
            var noidung = document.getElementById("noidung-cdr-"+id_cdr_chung).value;

            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{URL::to('admin/decuong/xoa-chuan-dau-ra-chung')}}",
                method: 'post',
                data:{id_cdr_chung:id_cdr_chung, noidung:noidung,  _token:_token},
                success: function(data) {
                    if (data != null) {
                        location.reload();
                    }   
                }
            });

        });

        $('.cl-3 #add-cdr').live('click',function() {

            var id_nganh = this.dataset.value;
            var noidung = document.getElementById("noidung-cdr").value;

            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
                var _token = $('input[name="_token"]').val();
            
                $.ajax({
                    url: "{{URL::to('admin/decuong/them-chuan-dau-ra-chung')}}",
                    method: 'post',
                    data:{id_nganh:id_nganh, noidung:noidung,  _token:_token},
                    success: function(data) {
                        if (data != null) {
                            location.reload();
                        }   
                    }
                });
            }
        });

	});
</script>


@endsection