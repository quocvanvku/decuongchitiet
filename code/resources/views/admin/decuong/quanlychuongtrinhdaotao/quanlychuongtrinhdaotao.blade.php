@extends('admin_layout')
@section('admin_content')

<div class="quan-ly-chuong-trinh-dao-tao">
    <div class="container">
        <div class="row">
            <div class="col-md-12 nopadding">
                <div class="top">
                    <div class="title">
                        <span class="quanlykhungchuongtrinh">Quản lý chương trình đào tạo cho các ngành/chuyên ngành</span>
                        <span id="doi-khung-chuong-trinh">{{$khungchuongtrinh->tenkhungchuongtrinh}}</span>

                        <div id="modal-doi-khung-chuong-trinh" class="modal">
                            <div class="modal-content">
                                <span class="close-modal">&times;</span>
                                <div class="table-modal-doi-khung-chuong-trinh">
                                    <h4>Đổi khung chương trình</h4>
                                    <hr>
                                    <p><i>Chọn khung chương trình cần đổi</i> <br> </p>
                                    <span><i style="color:#3d9af9;" class="fas fa-check-circle"></i> : Khung chương trình đang chọn</span>
                                    <div class="table-scroll">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td style="width:3%;">#</td>
                                                    <td style="width:55%;">Khung chương trình</td>
                                                    <td style="width:5%;">Cấu hình</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $stt=1; ?>
                                                @foreach ($all_khungchuongtrinh as $value_all_khungchuongtrinh)
                                                    @if ($value_all_khungchuongtrinh->hasChild == 0)
                                                    <tr>
                                                        <td>{{$stt++}}</td>
                                                        <td style="width:55%;text-align:left;">
                                                            <a href="<?php echo url('admin/decuong/quan-ly-chuong-trinh-dao-tao/'.$value_all_khungchuongtrinh->id); ?>">{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</a>
                                                        </td>
                                                        <td>
                                                            @if ($value_all_khungchuongtrinh->id == $id_khung)
                                                                <i style="color:#3d9af9;" class="fas fa-check-circle"></i>
                                                            @endif
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

                    </div>
                    <div class="list-option">
                        <span id="tao-moi-ctdt"><i class="fas fa-plus-circle"></i> Tạo CTĐT mới | </span>
                        <span id="sua-doi-ctdt"><i class="far fa-edit"></i> Sửa đổi CTĐT | </span>
                        <span id="xoa-ctdt"><i class="fas fa-trash-alt"></i> Xóa CTĐT | </span>
                        <span id="xoa-noi-dung-ctdt"><i class="far fa-minus-square"></i> Xóa nội dung CTĐT | </span>
                        <span id="copy-noi-dung-tu-ctdt-khac"><i class="fas fa-copy"></i> Sao chép nội dung từ chương trình khác</span>
                    </div>
                </div>

                <div class="thong-tin-khung-chuong-trinh">
                    <table>
                        <tr>
                            <td class="column-1">Mã chương trình:</td>
                            <td><strong>ABC123</strong></td>
                            <td>
                                <input type="checkbox" onclick="return false;" checked name="" id="">
                                Đào tạo theo hình thức tín chỉ
                            </td>
                        </tr>
                        <tr>
                            <td class="column-1">Tên chương trình:</td>
                            <td><strong>{{$khungchuongtrinh->tenkhungchuongtrinh}}</strong></td>
                        </tr>
                        <tr>
                            <td class="column-1">Sử dụng cho ngành:</td>
                            <td colspan="3"><strong>{{$khungchuongtrinh->tennganh}}</strong></td>
                            <td style="padding-left:150px">Loại hình đào tạo: <strong>Chính quy</strong></td>
                        </tr>
                        <tr>
                            <td class="column-1">Tổng số TC phải tích lũy:</td>
                            <td><strong>0</strong></td>
                            <td>Số TC bắt buộc: <strong>{{$khungchuongtrinh->soTCTCbatbuoc}}</strong></td>
                            <td>Số TC tự chọn: <strong>0</strong></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="checkbox" onclick="return false;" checked name="" id="">
                                <small>Chương trình hiện đang sử dụng</small>
                            </td>
                        </tr>
                        
                    </table>
                </div>

                <div class="list-hocphan-khungchuongtrinh">
                    <div class="list-action">
                        <span id="thay-doi-tinh-chat-hoc-phan">Thay đổi tính chất học phần</span>
                        <span id="xoa-hoc-phan">Xóa học phần</span>
                        <span id="thiet-lap-moi-quan-he-hoc-phan">Thiết lập quan hệ học phần</span>
                        <span id="quan-ly-nhom-hoc-phan" data-href='{{url("/admin/decuong/them-khoi-luong-kien-thuc-khung-chuong-trinh/".$id_khung)}}'>Quản lý nhóm học phần</span>
                    </div>
                    <div class="top-khung-chuong-trinh">
                        <table>
                            <tr>
                                <td id="text-hoc-ky-du-kien">Học kì dự kiến:</td>
                                <td>
                                    <input type="checkbox" name="" id="hien-thi-theo-nhom-hoc-phan">
                                    Hiển thị nội dung chương trình đào tạo theo nhóm học phần
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="" id="select-hoc-ky-du-kien">
                                        <option value="0">Tất cả</option>
                                        @foreach($list_hocky as $value_list_hocky)
                                        <option value="{{$value_list_hocky->hocky}}" <?php if($value_list_hocky->hocky == 1) {echo "selected";} ?> >Học kỳ {{$value_list_hocky->hocky}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                
                            </tr>
                        </table>
                    </div>
                    
                    <div class="table-khung-chuong-trinh">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td style="text-align: left;">Mã học phần</td>
                                    <td style="text-align: left;width:60%;">Tên học phần</td>
                                    <td>Số TC</td>
                                    <td>Học kỳ</td>
                                    <td>Bắt buộc</td>
                                    <td>Tích lũy</td>
                                </tr>
                            </thead>
                            <tbody id="body-table-hocphan-khungchuongtrinh">
                                
                            </tbody>
                            <input type="hidden" name="" id="id-hocphan-clicked">
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<script>
	$(document).ready(function() {

        $('#thay-doi-tinh-chat-hoc-phan').click(function() {

            let id_hocphan_clicked = $("#id-hocphan-clicked").val();
            let id_khung = {{$id_khung}};

            if(id_hocphan_clicked.trim().length) {
                window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/sua-hoc-phan-khung-chuong-trinh/'+id_hocphan_clicked+'/'+ id_khung;
            } else {
                alert("Vui lòng chọn học phần cần thay đổi tính chất và tiếp tục !!!");
            }

        });

        $('#select-hoc-ky-du-kien').on('change', function () {
			var hocky = $(this).val();
			if (hocky) { 
				load_hocphan_khungchuongtrinh(hocky);
			}
            return false;
        });

        load_hocphan_khungchuongtrinh(1);

        function load_hocphan_khungchuongtrinh(hocky) {

            let id_khung = {{$id_khung}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-hoc-phan-khung-chuong-trinh')}}",
                method: 'GET',
                data:{hocky:hocky,id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-table-hocphan-khungchuongtrinh').html(data);
                    }   
                }
            });
        }

        $(".table-khung-chuong-trinh").on('click', 'table tbody tr.click-hocphan', function() {
            $(".click-hocphan").removeClass('active');
            $(this).addClass("active");
            $("#id-hocphan-clicked").val($(this).attr('data-value'));
        });

        $('#thiet-lap-moi-quan-he-hoc-phan').click(function() {

            let id_hocphan_clicked = $("#id-hocphan-clicked").val();
            let id_khung = {{$id_khung}};

            if(id_hocphan_clicked.trim().length) {

                window.location.href = window.location.origin + '/decuongchitiet/admin/decuong/thiet-lap-moi-quan-he-hoc-phan/'+id_khung+'/'+ id_hocphan_clicked;

            } else {
                alert("Vui lòng chọn học phần cần thiết lập mối quan hệ và tiếp tục !!!");
            }

        });


        $('#quan-ly-nhom-hoc-phan').click(function() {
            window.location.href = $(this).data("href");
        });

        check_view();

        $("#hien-thi-theo-nhom-hoc-phan").click(function() {
            check_view();
        });

        function check_view() {
            if($("#hien-thi-theo-nhom-hoc-phan").prop('checked') == true){

                document.getElementById("select-hoc-ky-du-kien").style.display = 'None';
                document.getElementById("text-hoc-ky-du-kien").style.display = 'None';

                let id_khung = {{$id_khung}};

                $.ajax({
                    url: "{{URL::to('admin/decuong/load-hoc-phan-khung-chuong-trinh-theo-nhom-hoc-phan')}}",
                    method: 'GET',
                    data:{id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {
                            $('#body-table-hocphan-khungchuongtrinh').html(data);
                        }   
                    }
                });

            } else {
                document.getElementById("select-hoc-ky-du-kien").style.display = 'Block';
                document.getElementById("text-hoc-ky-du-kien").style.display = 'Block';
                load_hocphan_khungchuongtrinh(1);
            }
        }


        $('#doi-khung-chuong-trinh').click(function() {
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
        });

        window.onclick = function(event) {
            let modal1 = document.getElementById("modal-doi-khung-chuong-trinh");
            if (event.target == modal1) {
                document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
            }
        }


    });
</script>


@endsection