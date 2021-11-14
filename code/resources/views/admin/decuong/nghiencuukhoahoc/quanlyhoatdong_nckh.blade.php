@extends('admin_layout')
@section('admin_content')
<div class="quan-ly-hoat-dong-nckh">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 nopadding">
                <div class="top">
                    <span id="click-nam-hoc-nckh" class="nam-hoc">{{$namhoc_dangchon->nambatdau.' - '.$namhoc_dangchon->namketthuc}}</span> 
                    <div id="modal-nam-hoc-nckh" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <div class="table-modal-nam-hoc-nckh">
                                <h4>Đổi năm học</h4>
                                <hr>
                                <p><i>Chọn năm học cần đổi</i> <br> </p>
                                <span><i style="color:#9c0225;" class="fas fa-square"></i> : Năm học đã kết thúc <br> </span>
                                <span><i style="color:#3d9af9;" class="fas fa-check-circle"></i> : Năm học đang chọn</span>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td style="width:55%;">Năm học</td>
                                            <td>Cấu hình</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=1; ?>
                                        @foreach ($all_namhoc as $value_all_namhoc)
                                            <tr>
                                                <td>{{$stt++}}</td>
                                                @if ($value_all_namhoc->hienhanh == 1)
                                                    <td>
                                                        <a href="<?php echo url('admin/decuong/quan-ly-hoat-dong-nghien-cuu-khoa-hoc/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
                                                    </td>
                                                    <td><i style="color:#3d9af9;" class="fas fa-check-circle"></i></td>
                                                @else
                                                    <td>
                                                        <a href="<?php echo url('admin/decuong/quan-ly-hoat-dong-nghien-cuu-khoa-hoc/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
                                                    </td>
                                                    <td><i style="color:#9c0225;" class="fas fa-square"></i></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="list-quan-ly-hoat-dong-nckh">
                    <div class="list-action">
                        <span id="them-moi-hoat-dong">Thêm mới Hoạt động</span>
                        <span id="sua-hoat-dong">Sửa hoạt động</span>
                        <span id="xoa-hoat-dong">Xóa hoạt động</span>
                    </div>
                    <div class="table-quan-ly-hoat-dong-nckh">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tên hoạt động</td>
                                    <td>Điểm công trình</td>
                                    <td>Giờ khoa học</td>
                                    <td>Loại</td>
                                </tr>
                            </thead>
                            <tbody id="body-quan-ly-hoat-dong-nckh">

                            </tbody>

                            <input type="hidden" name="" id="id-hoat-dong">

                        </table>
                    </div>

                    <div id="modal-them-quan-ly-hoat-dong-nckh" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <div class="them-hoat-dong-nckh">
                                <h4>Thêm hoạt động</h4>
                                <hr>
                                <span>Loại 1: Tạp chí <br> </span>
                                <span>Loại 2: Sách giáo trình <br> </span>
                                <span>Loại 3: Còn lại <br> </span>
                                <table>
                                    <tr>
                                        <td>Tên hoạt động: </td>
                                        <td>
                                            <input type="text" id="ip-ten-hoat-dong-them">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Điểm công trình: </td>
                                        <td>
                                            <input type="number" name="" id="ip-diem-cong-trinh-them">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giờ khoa học</td>
                                        <td><input type="number" name="" id="ip-gio-khoa-hoc-them"></td>
                                    </tr>
                                    <tr>
                                        <td>Loại</td>
                                        <td>
                                            <select name="" id="select-them-chon-loai-hoat-dong" multiple>
                                                <option value="1">Loại 1</option>
                                                <option value="2">Loại 2</option>
                                                <option value="3">Loại 3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:50px"></td>
                                        <td>
                                            <span id="insert-them-hoat-dong">Thêm hoạt động</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="modal-sua-quan-ly-hoat-dong-nckh" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <div class="sua-hoat-dong-nckh">
                                <h4>Sửa hoạt động</h4>
                                <hr>
                                <span>Loại 1: Tạp chí <br> </span>
                                <span>Loại 2: Sách giáo trình <br> </span>
                                <span>Loại 3: Còn lại <br> </span>
                                <table id="table-sua-hoat-dong-nckh">
                                    <tr>
                                        <td>Tên hoạt động: </td>
                                        <td>
                                            <input type="text" id="ip-ten-hoat-dong-sua" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Điểm công trình: </td>
                                        <td>
                                            <input type="number" name="" id="ip-diem-cong-trinh-sua">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Giờ khoa học</td>
                                        <td><input type="number" name="" id="ip-gio-khoa-hoc-sua"></td>
                                    </tr>
                                    <tr>
                                        <td>Loại</td>
                                        <td>
                                            <select name="" id="select-sua-chon-loai-hoat-dong" multiple>
                                                <option value="1">Loại 1</option>
                                                <option value="2">Loại 2</option>
                                                <option value="3">Loại 3</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:50px"></td>
                                        <td>
                                            <span id="insert-sua-hoat-dong">Sửa hoạt động</span>
                                        </td>
                                    </tr>
                                </table>
                            </div> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        load_hoatdong_nckh()

        function load_hoatdong_nckh() {

            let id_namhoc = {{$id_namhoc}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-hoat-dong-nghien-cuu-khoa-hoc')}}",
                method: 'GET',
                data:{id_namhoc:id_namhoc},
                success: function(data) {
                    if (data != null) {
                        $('#body-quan-ly-hoat-dong-nckh').html(data);
                    }   
                }
            });

        }

        $('#body-quan-ly-hoat-dong-nckh').on('click', 'tr', function(){
            $(".click-hoatdong").removeClass('active');
            $(this).addClass("active");
            $("#id-hoat-dong").val($(this).attr('data-value'));
        });

        $('#sua-hoat-dong').click(function() {

            let id_hoatdong = $("#id-hoat-dong").val();
            let id_namhoc = {{$id_namhoc}}

            //alert(id_hoatdong);

            if(id_hoatdong.trim().length) {
                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-hoat-dong-nghien-cuu-khoa-hoc')}}",
                    method: 'GET',
                    data:{id_hoatdong:id_hoatdong, id_namhoc:id_namhoc},
                    success: function(data) {
                        if (data != null) {
                            //console.log(data['tenhoatdongnghiencuu']);
                            document.getElementById("modal-sua-quan-ly-hoat-dong-nckh").style.display = "block";
                            $('#ip-ten-hoat-dong-sua').val(data['tenhoatdongnghiencuu']);
                            $('#ip-diem-cong-trinh-sua').val(data['diemcongtrinh']);
                            $('#ip-gio-khoa-hoc-sua').val(data['giokhoahoc']);

                            $('#select-sua-chon-loai-hoat-dong').children("option:selected").prop("selected", false)
                           
                            var x = $('#select-sua-chon-loai-hoat-dong').children('option[value="'+ data['loai_hoatdong'] +'"]');
                            x.prop("selected", "selected");
                           
                        }   
                    },
                    dataType:"json"
                });
                
            } else {
                alert("Vui lòng chọn học phần cần sửa và tiếp tục !!!");
            }

        });

        $('#insert-sua-hoat-dong').click(function() {

            let id_hoatdong = $("#id-hoat-dong").val();
            let id_namhoc = {{$id_namhoc}}

            let tenhoatdong_sua = $("#ip-ten-hoat-dong-sua").val();
            let diemcongtrinh_sua = $("#ip-diem-cong-trinh-sua").val();
            let giokhoahoc_sua = $("#ip-gio-khoa-hoc-sua").val();
            let loai_sua = $("#select-sua-chon-loai-hoat-dong").val().toString();
            
            $.ajax({
                url: "{{URL::to('admin/decuong/insert-sua-hoat-dong-nghien-cuu-khoa-hoc')}}",
                method: 'GET',
                data:{id_hoatdong:id_hoatdong, id_namhoc:id_namhoc, tenhoatdong_sua:tenhoatdong_sua, diemcongtrinh_sua:diemcongtrinh_sua, giokhoahoc_sua:giokhoahoc_sua, loai_sua:loai_sua},
                success: function(data) {
                    if (data != null) {
                        load_hoatdong_nckh()
                        document.getElementById("modal-sua-quan-ly-hoat-dong-nckh").style.display = "none";
                        alert('Sửa hoạt động thành công');
                    }   
                }
            });

        });

        $("#select-sua-chon-loai-hoat-dong").attr("size",$("#select-sua-chon-loai-hoat-dong option").length);
        $("#select-them-chon-loai-hoat-dong").attr("size",$("#select-them-chon-loai-hoat-dong option").length);

        $('#click-nam-hoc-nckh').click(function() {
            document.getElementById("modal-nam-hoc-nckh").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            document.getElementById("modal-them-quan-ly-hoat-dong-nckh").style.display = "none";
            document.getElementById("modal-sua-quan-ly-hoat-dong-nckh").style.display = "none";
        });

        window.onclick = function(event) {

            let modal1 = document.getElementById("modal-nam-hoc-nckh");
            if (event.target == modal1) {
                document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            }

            let modal2 = document.getElementById("modal-them-quan-ly-hoat-dong-nckh");
            if (event.target == modal2) {
                document.getElementById("modal-them-quan-ly-hoat-dong-nckh").style.display = "none";
            }

            let modal3 = document.getElementById("modal-sua-quan-ly-hoat-dong-nckh");
            if (event.target == modal3) {
                document.getElementById("modal-sua-quan-ly-hoat-dong-nckh").style.display = "none";
            }

        }

        $('#them-moi-hoat-dong').click(function() {
            document.getElementById("modal-them-quan-ly-hoat-dong-nckh").style.display = "block";
        });

        $('#insert-them-hoat-dong').click(function() {

            let id_namhoc = {{$id_namhoc}}

            let tenhoatdong_them = $("#ip-ten-hoat-dong-them").val();
            let diemcongtrinh_them = $("#ip-diem-cong-trinh-them").val();
            let giokhoahoc_them = $("#ip-gio-khoa-hoc-them").val();
            let loai_them = $("#select-them-chon-loai-hoat-dong").val().toString();

            //alert(tenhoatdong_them+diemcongtrinh_them+giokhoahoc_them+loai_them);

            $.ajax({
                url: "{{URL::to('admin/decuong/insert-them-hoat-dong-nghien-cuu-khoa-hoc')}}",
                method: 'GET',
                data:{id_namhoc:id_namhoc, tenhoatdong_them:tenhoatdong_them, diemcongtrinh_them:diemcongtrinh_them, giokhoahoc_them:giokhoahoc_them, loai_them:loai_them},
                success: function(data) {
                    if (data != null) {
                        load_hoatdong_nckh()
                        document.getElementById("modal-them-quan-ly-hoat-dong-nckh").style.display = "none";
                        alert('Thêm hoạt động thành công');
                    }   
                }
            });

        });



    });
</script>

@endsection