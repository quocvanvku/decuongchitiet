@extends('admin_layout')
@section('admin_content') 

<div class="chuan-dau-ra-chung">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nopadding title">
                <span class="quanlyplo">Quản lý PLO</span>
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
                                                    <a href="<?php echo url('admin/decuong/quan-ly-plo/'.$value_all_khungchuongtrinh->id); ?>">{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</a>
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
                    <legend>Quản lý chuẩn đầu ra chung</legend>
                    <h4><strong>Danh sách chuẩn đầu ra chung của {{$khungchuongtrinh->tenkhungchuongtrinh}}</strong></h4>
                    <div class="list-action">
                        <span id="show-them-chuan-dau-ra-chung">Thêm PLO</span>
                        <span id="show-sua-chuan-dau-ra-chung">Sửa PLO</span>
                        <span id="xoa-chuan-dau-ra-chung">Xóa PLO</span>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Tên PLO</td>
                                <td>Nội dung</td>
                            </tr>
                        </thead>
                        
                        <tbody id="body-chuan-dau-ra-chung">
                            
                            <!-- foreach($data_chuandau_chung as $value_data) -->
                            <!-- <tr>
                                <td class="align-middle"</td>
                                <td>
                                    <textarea name="" rows="4" cols="145" id="noidung-cdr-$value_data->id_cdr_chung" >$value_data->noidung_cdr_chung</textarea>        
                                </td>
                                <td> -->
                                    <!-- if($value_data->change == 1) -->
                                    <!-- <p id="edit-cdr" data-value="$value_data->id_cdr_chung" >Sửa</p>
                                    <p id="delete-cdr" data-value="$value_data->id_cdr_chung" >Xóa</p>    -->
                                    <!-- endif -->
                                <!-- </td>      
                            </tr> -->
                            <!-- endforeach -->
                            <!-- <tr>
                                <td></td>
                                <td>
                                    <textarea name="" rows="4" cols="145" id="noidung-cdr" ></textarea>        
                                </td>
                                <td class="align-middle">
                                    <p id="add-cdr" data-value="$id_nganh" >Thêm</p>  
                                </td>      
                            </tr> -->
                        </tbody>

                        <input type="hidden" name="" id="id-chuan-dau-ra-chung">

                    </table>
                </fieldset>

                <div id="modal-them-plo" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="content-modal-them-plo">
                            <h4>Thêm chuẩn đầu ra chung</h4>
                            <hr>

                            <div class="">
                                <textarea name="" id="noi-dung-chuan-dau-ra-chung-them" rows="3"></textarea>
                                <center><button type="button" data-value="{{$id_khung}}" id="them-chuan-dau-ra-chung" class="btn btn-success">Thêm PLO</button></center>
                            </div>
                        
                        </div> 
                    </div>
                </div>

                <div id="modal-sua-plo" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="content-modal-them-plo">
                            <h4>Sửa chuẩn đầu ra chung</h4>
                            <hr>

                            <div class="">
                                <textarea name="" id="noi-dung-chuan-dau-ra-chung-sua" rows="3"></textarea>
                                <center><button type="button" id="sua-chuan-dau-ra-chung" class="btn btn-success">Lưu lại</button></center>
                            </div>
                        
                        </div> 
                    </div>
                </div>

                @if((int)$getnamhoc_hientai >= 2020)

                    <fieldset>
                        <legend>Quản lý PI</legend>
                        <h4><strong>Danh sách PI của {{$khungchuongtrinh->tenkhungchuongtrinh}}</strong></h4>
                        <div class="list-action">
                            <span id="show-them-pi">Thêm PI</span>
                            <span id="show-sua-pi">Sửa PI</span>
                            <span id="xoa-pi">Xóa PI</span>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Tên PLO</td>
                                    <td>Nội dung PI</td>
                                </tr>
                            </thead>
                            
                            <tbody id="body-pi">
                                
                            </tbody>

                            <input type="hidden" name="" id="id-plo">
                            <input type="hidden" name="" id="id-pi">

                        </table>
                    </fieldset>

                    <div id="modal-them-pi" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <div class="content-modal-them-pi">
                                <h4>Thêm PI</h4>
                                <hr>

                                <div class="">
                                    <textarea name="" id="noi-dung-pi-them" rows="3"></textarea>
                                    <center><button type="button" id="them-pi" class="btn btn-success">Thêm PI</button></center>
                                </div>
                            
                            </div> 
                        </div>
                    </div>

                    <div id="modal-sua-pi" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <div class="content-modal-them-pi">
                                <h4>Sửa PI</h4>
                                <hr>

                                <div class="">
                                    <textarea name="" id="noi-dung-pi-sua" rows="3"></textarea>
                                    <center><button type="button" id="sua-pi" class="btn btn-success">Lưu lại</button></center>
                                </div>
                            
                            </div> 
                        </div>
                    </div>

                @endif

                

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
            document.getElementById("modal-them-plo").style.display = "none";
            document.getElementById("modal-sua-plo").style.display = "none";
            document.getElementById("modal-them-pi").style.display = "none";
            document.getElementById("modal-sua-pi").style.display = "none";
        });

        window.onclick = function(event) {
            let modal1 = document.getElementById("modal-doi-khung-chuong-trinh");
            if (event.target == modal1) {
                document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
            }

            let modal2 = document.getElementById("modal-them-plo");
            if (event.target == modal2) {
                document.getElementById("modal-them-plo").style.display = "none";
            }

            let modal3 = document.getElementById("modal-sua-plo");
            if (event.target == modal3) {
                document.getElementById("modal-sua-plo").style.display = "none";
            }

            let modal4 = document.getElementById("modal-them-pi");
            if (event.target == modal4) {
                document.getElementById("modal-them-pi").style.display = "none";
            }

            let modal5 = document.getElementById("modal-sua-pi");
            if (event.target == modal5) {
                document.getElementById("modal-sua-pi").style.display = "none";
            }
        }

        $('.list-action').on('click', 'span#show-them-chuan-dau-ra-chung', function() {
            document.getElementById("modal-them-plo").style.display = "block";
        });

        load_plo();

        function load_plo() {

            let id_khung = {{$id_khung}};

            $.ajax({
                url: "{{URL::to('admin/decuong/load-plo')}}",
                method: 'get',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-chuan-dau-ra-chung').html(data);
                    }   
                }
            });
        }

        $('.content-modal-them-plo').on('click', 'button#them-chuan-dau-ra-chung', function() {

            var id_khung = this.dataset.value;
            var noidung = document.getElementById("noi-dung-chuan-dau-ra-chung-them").value;

            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
        
                $.ajax({
                    url: "{{URL::to('admin/decuong/them-plo')}}",
                    method: 'get',
                    data:{id_khung:id_khung, noidung:noidung},
                    success: function(data) {
                        if (data != null) {
                            load_plo();
                            document.getElementById("modal-them-plo").style.display = "none";
                            document.getElementById("noi-dung-chuan-dau-ra-chung-them").value = '';
                            load_pi();
                        }   
                    }
                });

            }
        });

        $('#body-chuan-dau-ra-chung').on('click', 'tr', function() {
            $(".click-plo").removeClass('active');
            $(this).addClass("active");
            $("#id-chuan-dau-ra-chung").val($(this).attr('data-value'));
        });

        $('.list-action').on('click', 'span#show-sua-chuan-dau-ra-chung', function() {

            let id_chuandaurachung = $("#id-chuan-dau-ra-chung").val();

            if(id_chuandaurachung.trim().length) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/load-sua-plo')}}",
                    method: 'GET',
                    data:{id_chuandaurachung:id_chuandaurachung},
                    success: function(data) {
                        if (data != null) {
                            //console.log(data);
                            document.getElementById("modal-sua-plo").style.display = "block";

                            $('#noi-dung-chuan-dau-ra-chung-sua').val(data['noidung_cdr_chung']);
                            $('#sua-chuan-dau-ra-chung').attr("data-value", data['id_cdr_chung'])

                        }   
                    },
                    dataType:"json"
                });
            
            } else {
                alert("Vui lòng chọn PLO cần sửa và tiếp tục !!!");
            }
        });


        $('.content-modal-them-plo').on('click', 'button#sua-chuan-dau-ra-chung', function() {

            var id_chuandaurachung = this.dataset.value;
            var noidung = document.getElementById("noi-dung-chuan-dau-ra-chung-sua").value;

            if (noidung.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung để tiếp tục");
            } else {
                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-plo')}}",
                    method: 'get',
                    data:{id_chuandaurachung:id_chuandaurachung, noidung:noidung},
                    success: function(data) {
                        if (data != null) {
                            load_plo();
                            document.getElementById("modal-sua-plo").style.display = "none";
                            $("#id-chuan-dau-ra-chung").val('');
                            load_pi();
                        }   
                    }
                });
            }
        });

        $('.list-action').on('click', 'span#xoa-chuan-dau-ra-chung', function() {

            let id_cdr_chung = $("#id-chuan-dau-ra-chung").val();

            if(id_cdr_chung.trim().length) {

                var answer = window.confirm("Bạn có chắc chắn muốn xóa không?");
            	if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/xoa-plo')}}",
                        method: 'get',
                        data:{id_cdr_chung:id_cdr_chung},
                        success: function(data) {
                            if (data != null) {
                                alert(data);
                                load_plo();
                                $("#id-chuan-dau-ra-chung").val('');
                                load_pi();
                            }   
                        }
                    });
                }

            } else {
                alert("Vui lòng chọn PLO cần Xóa và tiếp tục !!!");
            }
        });

        load_pi();

        function load_pi() {

            let id_khung = {{$id_khung}};

            $.ajax({
                url: "{{URL::to('admin/decuong/load-pi')}}",
                method: 'get',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-pi').html(data);
                    }   
                }
            });
        }

        $('#body-pi').on('click', 'tr.click-plo', function() {
            $(".click-plo").removeClass('active');
            $(this).addClass("active");
            $("#id-plo").val($(this).attr('data-value'));

            $(".click-pi").removeClass('active');
            $("#id-pi").val('');

        });

        $('#body-pi').on('click', 'tr.click-pi', function() {
            $(".click-pi").removeClass('active');
            $(this).addClass("active");
            $("#id-pi").val($(this).attr('data-value'));

            $(".click-plo").removeClass('active');
            $("#id-plo").val('');

        });

        $('.list-action').on('click', 'span#show-them-pi', function() {
            var id_khung = {{$id_khung}};
            let id_chuandaurachung = $("#id-plo").val();

            if(id_chuandaurachung.trim().length) {
                document.getElementById("modal-them-pi").style.display = "block";
            } else {
                alert("Vui lòng chọn PLO cần thêm PI và tiếp tục !!!");
            }
        });

        $('.content-modal-them-pi').on('click', 'button#them-pi',function() {

            let noidung_pi = document.getElementById("noi-dung-pi-them").value;
            let id_cdr_chung = $("#id-plo").val();
 
            if (noidung_pi.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung của PI để tiếp tục");
            } else {

                $.ajax({
                    url: "{{URL::to('admin/decuong/them-pi')}}",
                    method: 'get',
                    data:{noidung_pi:noidung_pi, id_cdr_chung:id_cdr_chung},
                    success: function(data) {
                        if (data != null) {
                            alert(data);
                            load_pi();
                            document.getElementById("noi-dung-pi-them").value = '';
                            $("#id-plo").val('');
                            document.getElementById("modal-them-pi").style.display = "none";
                        }   
                    }
                });
            }
        });

        $('.list-action').on('click', 'span#show-sua-pi', function() {
            
            let id_chuandaurachung_chitiet = $("#id-pi").val();

            if(id_chuandaurachung_chitiet.trim().length) {
                
                $.ajax({
                    url: "{{URL::to('admin/decuong/load-sua-pi')}}",
                    method: 'GET',
                    data:{id_chuandaurachung_chitiet:id_chuandaurachung_chitiet},
                    success: function(data) {
                        if (data != null) {
                            //console.log(data);
                            document.getElementById("modal-sua-pi").style.display = "block";

                            $('#noi-dung-pi-sua').val(data['noidung_cdr_chitiet']);
                            $('#sua-pi').attr("data-value", data['id_cdr_chitiet']);

                        }   
                    },
                    dataType:"json"
                });

            } else {
                alert("Vui lòng chọn PI cần sửa và tiếp tục !!!");
            }
        });

        $('.content-modal-them-pi').on('click', 'button#sua-pi',function() {

            let noidung_pi = document.getElementById("noi-dung-pi-sua").value;
            let id_cdr_chitiet = $("#id-pi").val();

            if (noidung_pi.trim() == '') {
                alert("Nội dung trống !!! Vui lòng nhập nội dung của PI để tiếp tục");
            } else {

                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-pi')}}",
                    method: 'get',
                    data:{noidung_pi:noidung_pi, id_cdr_chitiet:id_cdr_chitiet},
                    success: function(data) {
                        if (data != null) {
                            alert(data);
                            load_pi();
                            document.getElementById("noi-dung-pi-sua").value = '';
                            $("#id-pi").val('');
                            document.getElementById("modal-sua-pi").style.display = "none";
                        }   
                    }
                });
            }
        });

        $('.list-action').on('click', 'span#xoa-pi', function() {
            
            let id_cdr_chitiet = $("#id-pi").val();

            if(id_cdr_chitiet.trim().length) {

                var answer = window.confirm("Bạn có chắc chắn muốn xóa không?");
            	if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/xoa-pi')}}",
                        method: 'get',
                        data:{id_cdr_chitiet:id_cdr_chitiet},
                        success: function(data) {
                            if (data != null) {
                                $("#id-pi").val('');
                                alert(data);
                                load_pi();
                            }   
                        }
                    });
                }
 
            } else {
                alert("Vui lòng chọn PI cần Xóa và tiếp tục !!!");
            }
        });

      


	});
</script>


@endsection