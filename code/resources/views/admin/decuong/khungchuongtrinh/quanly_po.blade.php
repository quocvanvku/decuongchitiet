@extends('admin_layout')
@section('admin_content') 

<div class="chuan-dau-ra-chung">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nopadding title">
                <span class="quanlyplo">Quản lý PO</span>
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
                                            <tr>
                                                <td>{{$stt++}}</td>
                                                <td style="width:55%;text-align:left;">
                                                    <a href="<?php echo url('admin/decuong/quan-ly-po/'.$value_all_khungchuongtrinh->id); ?>">{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</a>
                                                </td>
                                                <td>
                                                    @if ($value_all_khungchuongtrinh->id == $id_khung)
                                                        <i style="color:#3d9af9;" class="fas fa-check-circle"></i>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>

            </div> 
        </div>

        <div class="row">
            <div class="col-md-12 nopadding">

                <fieldset id="table-plo">
                    <legend>Quản lý Mục tiêu Chương trình đào tạo</legend>
                    <h4><strong>Danh sách Mục tiêu Chương trình đào tạo của {{$khungchuongtrinh->tenkhungchuongtrinh}}</strong></h4>
                    <div class="list-action">
                        <span id="show-them-muc-tieu-ctdt">Thêm PO</span>
                        <span id="show-sua-muc-tieu-ctdt">Sửa PO</span>
                        <span id="xoa-muc-tieu-ctdt">Xóa PO</span>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Tên PO</td>
                                <td>Nội dung</td>
                            </tr>
                        </thead>
                        
                        <tbody id="body-muc-tieu-ctdt">

                        </tbody>

                        <input type="hidden" name="" id="id-muc-tieu-ctdt">

                    </table>
                </fieldset>

                <div id="modal-them-po" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="content-modal-them-plo">
                            <h4>Thêm Mục tiêu Chương trình đào tạo</h4>
                            <hr>

                            <div class="">
                                <textarea name="" id="noi-dung-muc-tieu-ctdt-them" rows="3" placeholder="Nhập Mục tiêu Chương trình đào tạo"></textarea>
                                <center><button type="button" data-value="{{$id_khung}}" id="them-muc-tieu-ctdt" class="btn btn-success">Thêm PO</button></center>
                            </div>
                        
                        </div> 
                    </div>
                </div>

                <div id="modal-sua-po" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="content-modal-them-plo">
                            <h4>Sửa Mục tiêu Chương trình đào tạo</h4>
                            <hr>

                            <table>
                                <tr>
                                    <td style="width:5%;">STT</td>
                                    <td>Nội dung PO</td>
                                </tr>
                                <tr>
                                    <td><input style="width:50px;height:50px;padding-left:7px;" type="number" name="" id="stt-muc-tieu-ctdt-sua"></td>
                                    <td><textarea style="width:90%;" name="" id="noi-dung-muc-tieu-ctdt-sua" rows="3"></textarea></td>
                                </tr>
                            </table>

                            <div class="">
                                <center><button type="button" id="sua-muc-tieu-ctdt" class="btn btn-success">Lưu lại</button></center>
                            </div>
                        
                        </div> 
                    </div>
                </div>


                <fieldset style="margin-bottom:100px">
                    <legend>Thêm mối liên hệ giữa PO và PLO</legend>
                    <h4><strong>Mối liên hệ giữa PO và PLO của {{$khungchuongtrinh->tenkhungchuongtrinh}}</strong></h4>
                    <table class="table table-bordered table-moi-lien-he-po-plo">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Tên PO</td>
                                <td>Nội dung PLO</td>
                            </tr>
                        </thead>
                        
                        <tbody id="body-moilienhe-po-plo">
                            
                        </tbody>

                    </table>
                </fieldset>


            </div>
        </div>

    </div>
</div>

<script>
	$(document).ready(function() {

        $('#doi-khung-chuong-trinh').click(function() {
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
            document.getElementById("modal-them-po").style.display = "none";
            document.getElementById("modal-sua-po").style.display = "none";
        });

        window.onclick = function(event) {
            let modal1 = document.getElementById("modal-doi-khung-chuong-trinh");
            if (event.target == modal1) {
                document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
            }

            let modal2 = document.getElementById("modal-them-po");
            if (event.target == modal2) {
                document.getElementById("modal-them-po").style.display = "none";
            }

            let modal3 = document.getElementById("modal-sua-po");
            if (event.target == modal3) {
                document.getElementById("modal-sua-po").style.display = "none";
            }

        }

        $('.list-action').on('click', 'span#show-them-muc-tieu-ctdt', function() {
            document.getElementById("modal-them-po").style.display = "block";
        });

        load_po();

        function load_po() {

            let id_khung = {{$id_khung}};

            $.ajax({
                url: "{{URL::to('admin/decuong/load-po')}}",
                method: 'get',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-muc-tieu-ctdt').html(data);
                    }   
                }
            });
        }

        $('.content-modal-them-plo').on('click', 'button#them-muc-tieu-ctdt', function() {

            var id_khung = this.dataset.value;
            var noidung = document.getElementById("noi-dung-muc-tieu-ctdt-them").value;

            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
        
                $.ajax({
                    url: "{{URL::to('admin/decuong/them-po')}}",
                    method: 'get',
                    data:{id_khung:id_khung, noidung:noidung},
                    success: function(data) {
                        if (data != null) {

                            alert(data);

                            load_po();
                            document.getElementById("modal-them-po").style.display = "none";
                            document.getElementById("noi-dung-muc-tieu-ctdt-them").value = '';
                            load_moilienhe_po_plo();
                        }   
                    }
                });

            }
        });

        $('#body-muc-tieu-ctdt').on('click', 'tr', function() {
            $(".click-plo").removeClass('active');
            $(this).addClass("active");
            $("#id-muc-tieu-ctdt").val($(this).attr('data-value'));
        });


        $('.list-action').on('click', 'span#show-sua-muc-tieu-ctdt', function() {

            let id_muctieu = $("#id-muc-tieu-ctdt").val();

            if(id_muctieu.trim().length) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/load-sua-po')}}",
                    method: 'GET',
                    data:{id_muctieu:id_muctieu},
                    success: function(data) {
                        if (data != null) {
                            //console.log(data);
                            document.getElementById("modal-sua-po").style.display = "block";

                            $('#stt-muc-tieu-ctdt-sua').val(data['ten_po']);
                            $('#noi-dung-muc-tieu-ctdt-sua').val(data['noidung_po']);
                            $('#sua-muc-tieu-ctdt').attr("data-value", data['id'])

                        }   
                    },
                    dataType:"json"
                });
            
            } else {
                alert("Vui lòng chọn PO cần sửa và tiếp tục !!!");
            }
        });

        $('.content-modal-them-plo').on('click', 'button#sua-muc-tieu-ctdt', function() {

            var id_muctieu = this.dataset.value;
            var stt_muctieu = document.getElementById("stt-muc-tieu-ctdt-sua").value;
            var noidung = document.getElementById("noi-dung-muc-tieu-ctdt-sua").value;

            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-po')}}",
                    method: 'get',
                    data:{id_muctieu:id_muctieu, stt_muctieu:stt_muctieu, noidung:noidung},
                    success: function(data) {
                        if (data != null) {

                            alert(data);
                            load_po();

                            document.getElementById("modal-sua-po").style.display = "none";
                            $("#id-muc-tieu-ctdt").val('');

                            load_moilienhe_po_plo();
                        }   
                    }
                });
            }
        });


        $('.list-action').on('click', 'span#xoa-muc-tieu-ctdt', function() {

            let id_muctieu = $("#id-muc-tieu-ctdt").val();

            if(id_muctieu.trim().length) {

                var answer = window.confirm("Bạn có chắc chắn muốn xóa không?");
            	if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/xoa-po')}}",
                        method: 'get',
                        data:{id_muctieu:id_muctieu},
                        success: function(data) {
                            if (data != null) {
                                alert(data);
                                load_po();
                                $("#id-muc-tieu-ctdt").val('');
                                load_moilienhe_po_plo();
                            }   
                        }
                    });
                }

            } else {
                alert("Vui lòng chọn PO cần Xóa và tiếp tục !!!");
            }
        });


        load_moilienhe_po_plo();

        function load_moilienhe_po_plo() {

            let id_khung = {{$id_khung}};

            $.ajax({
                url: "{{URL::to('admin/decuong/load-moilienhe-po-plo')}}",
                method: 'get',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-moilienhe-po-plo').html(data);
                    }   
                }
            });
        }



        $('#body-moilienhe-po-plo').on('click', 'tr td .line-them-moi-lien-he div span#them-moilienhe-po-plo', function() {
            
            let id_po = this.dataset.value;
            let id_plo_them = $(this).parent('div').children('input').val();
            let id_khung = {{$id_khung}};

            if (id_plo_them.trim().length) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/them-moilienhe-po-plo')}}",
                    method: 'get',
                    data:{id_po:id_po, id_plo_them:id_plo_them, id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {

                            alert(data);
                            load_po();
                            load_moilienhe_po_plo();
                        }   
                    }
                });
                
            } else {
                alert("Vui lòng chọn PLO cần thêm mối liên hệ và tiếp tục !!!");
            }
        });


        $('#body-moilienhe-po-plo').on('click', 'tr td .line-them-moi-lien-he select#select_plo', function() {
            var id_plo_them = $(this).val();
            $(this).parent('div').children('div').children('input').val(id_plo_them);
        });

        $('#body-moilienhe-po-plo').on('click', 'tr td .line-sua-moi-lien-he span#xoa-moi-lien-he-po-plo', function() {

            let id_moilienhe = this.dataset.value;

            $.ajax({
                url: "{{URL::to('admin/decuong/xoa-moilienhe-po-plo')}}",
                method: 'get',
                data:{id_moilienhe:id_moilienhe},
                success: function(data) {
                    if (data != null) {

                        alert(data);
                        load_po();
                        load_moilienhe_po_plo();
                    }   
                }
            });
        });


        $('#body-moilienhe-po-plo').on('click', 'tr td .line-sua-moi-lien-he select#select_sua_plo', function() {

            let moilienhe = $(this).val().toString().split('_');

            let id_moilienhe = moilienhe[0];
            let id_po = moilienhe[1];
            let id_plo = moilienhe[2];
            let id_khung = {{$id_khung}}; 

            $.ajax({
                url: "{{URL::to('admin/decuong/sua-moilienhe-po-plo')}}",
                method: 'get',
                data:{id_moilienhe:id_moilienhe, id_po:id_po, id_plo:id_plo, id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        alert(data);
                        load_po();
                        load_moilienhe_po_plo();
                    }   
                }
            });
        });



	});

</script>


@endsection