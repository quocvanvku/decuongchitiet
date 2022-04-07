@extends('admin_layout')
@section('admin_content') 

<div class="nghien-cuu-khoa-hoc">
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
                                                        <a href="<?php echo url('admin/decuong/duyet-nckh-chi-tiet/'.$id_tacgia.'/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
                                                    </td>
                                                    <td><i style="color:#3d9af9;" class="fas fa-check-circle"></i></td>
                                                @else
                                                    <td>
                                                        <a>{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
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

                <div class="tab">
                    <ul>
                        <li>
                            <a class="tablinks active" >
                                <span>Hoạt động NCKH</span>
                            </a>
                        </li>
                        <li>
                            <a class="tablinks" href="<?php echo url('admin/decuong/thong-ke-nghien-cuu-khoa-hoc-cua-toi/'.$namhoc_dangchon->id); ?>" onclick="opentab(event, 'thongke-nckh')" >
                                <span id="thong-ke-nckh">Thống kê NCKH</span>
                            </a>
                        </li> 
                        <li> 
                            <a class="tablinks" onclick="opentab(event, 'trogiup')" >
                                <span>Trợ giúp</span>
                            </a>
                        </li>
                    </ul>
                </div>

                
                <div id="hoatdong-nckh" class="tabcontent active" >

                    <div class="duyet-nckh">
                        <fieldset>
                            <legend>Chi tiết duyệt NCKH</legend>

                            <div class="list-option-duyet">
                                <span class="btn btn-success" id="duyet-de-tai-nckh" >Duyệt</span>
                                <span class="btn btn-info" id="cho-duyet-de-tai-nckh" >Chờ duyệt</span>
                                <span class="btn btn-danger" id="khong-duyet-de-tai-nckh" >Không duyệt</span>
                                <div class="option-duyet">
                                    <span><i class="fa fa-clock"></i> Đang chờ duyệt</span>
                                    <span><i class="fa fa-ban"></i>Không duyệt</span>
                                    <span><i class="fa fa-check"></i> Đã duyệt</span>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>STT</td>
                                        <td>Tên hoạt động nghiên cứu</td>
                                        <td>Liệt kê minh chứng</td>
                                        <td>Số lượng</td>
                                        <td>Định mức</td>
                                        <td>Tính thành giờ NCKH</td>
                                        <td>Duyệt</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; ?>
                                    @foreach($all_hoatdong_nckh as $value_all_hoatdong_nckh)

                                        @if (isset($value_all_hoatdong_nckh->count_sub))
                                            <tr>
                                                <td class="align-middle" rowspan="{{$value_all_hoatdong_nckh->count_sub+1}}">{{$stt++}}</td>
                                                <td class="align-middle" style="text-align: left;text-align: justify;" rowspan="{{$value_all_hoatdong_nckh->count_sub+1}}">{{$value_all_hoatdong_nckh->tenhoatdongnghiencuu}}</td>
                                                <td style="background: none repeat scroll 0 0 #ffeca9;"></td>
                                                <td style="background: none repeat scroll 0 0 #ffeca9;">{{$value_all_hoatdong_nckh->tongsodiem}} Điểm</td>
                                                <td style="background: none repeat scroll 0 0 #ffeca9;"></td>
                                                <td style="background: none repeat scroll 0 0 #ffeca9;">{{$value_all_hoatdong_nckh->tongsogio}}</td>
                                                <td style="background: none repeat scroll 0 0 #ffeca9;"></td>
                                            </tr>
                                            @if ($value_all_hoatdong_nckh->loai_hoatdong == 1)
                                                <?php $stt_l1 = 1; ?>
                                                @foreach ($all_hoatdong_cuatoi_view1 as $value_all_hdct_view1)
                                                    @if ($value_all_hdct_view1->id_hoatdong == $value_all_hoatdong_nckh->id)
                                                    <tr class="click-hoat-dong-cua-toi" data-value="{{$value_all_hdct_view1->id_nckh}}_{{$value_all_hdct_view1->loai_hoatdong}}_{{$value_all_hdct_view1->tinhtrangduyet}}" >
                                                        <td class="align-middle" style="text-align: left;">
                                                            <b>{{$stt_l1++.'. '.$value_all_hdct_view1->tenbaibao}}</b> <br>
                                                            Tác giả: 
                                                            @foreach ($value_all_hdct_view1->id_cactacgia as $value)
                                                                <?php echo $value->hodem.' '.$value->ten.'; '; ?>
                                                            @endforeach
                                                            Tạp chí: <?php echo $value_all_hdct_view1->tentapchi.', '; ?>
                                                            năm: <?php echo $value_all_hdct_view1->namxuatban.'. '; ?>
                                                            Chỉ số ISSN: <?php echo $value_all_hdct_view1->chiso_issn.'; '; ?>
                                                            Loại: <?php echo $value_all_hdct_view1->loai.'.'; ?> <br>
                                                            <b>({{$value_all_hoatdong_nckh->diemcongtrinh}} điểm Chia cho {{$value_all_hdct_view1->sotacgia}} tác giả)</b>
                                                            <div>
                                                                <i>Minh chứng:</i> <br>
                                                                @if (isset($value_all_hdct_view1->show_hinhanhminhchung))
                                                                    @foreach ($value_all_hdct_view1->show_hinhanhminhchung as $value_minhchung )
                                                                        <a href="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" target="_blank">
                                                                            @if ($value_minhchung->duoi == "pdf")
                                                                                <i style="margin-left:2px;font-size:25px;color:#dc3545;" class="fas fa-file-pdf"></i>
                                                                            @else
                                                                                <img style="margin-left:2px;border:1px solid #a7a7a7;" width="40" height="25" src="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" alt="">
                                                                            @endif
                                                                        </a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{$value_all_hdct_view1->diemcuatoi}} Điểm</td>
                                                        <td class="align-middle">{{$value_all_hoatdong_nckh->giokhoahoc}} Giờ/Điểm</td>
                                                        <td class="align-middle">{{$value_all_hdct_view1->thanhgionckh}} Giờ</td>
                                                        <td class="align-middle">
                                                            @if ($value_all_hdct_view1->tinhtrangduyet==0)
                                                                <i style="color:#64c4ed;padding-right:3px" class="fas fa-clock"></i>
                                                            @elseif ($value_all_hdct_view1->tinhtrangduyet==1)
                                                                <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                            @elseif ($value_all_hdct_view1->tinhtrangduyet==2)
                                                                <i style="color:#f0134d;padding-right:3px" class="fas fa-ban" id="xem-noi-dung-sua" data-value="{{$value_all_hdct_view1->id_nckh}}_{{$value_all_hdct_view1->loai_hoatdong}}_{{$value_all_hdct_view1->tinhtrangduyet}}" >Xem</i> 
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if ($value_all_hoatdong_nckh->loai_hoatdong == 2)
                                                <?php $stt_l2 = 1; ?>
                                                @foreach ($all_hoatdong_cuatoi_view2 as $value_all_hdct_view2)
                                                    @if ($value_all_hdct_view2->id_hoatdong == $value_all_hoatdong_nckh->id)
                                                    <tr class="click-hoat-dong-cua-toi" data-value="{{$value_all_hdct_view2->id_nckh}}_{{$value_all_hdct_view2->loai_hoatdong}}" >
                                                        <td class="align-middle" style="text-align: left;">
                                                            <b>{{$stt_l2++.'. '.$value_all_hdct_view2->tensach}}</b> <br>
                                                            Tác giả: 
                                                            @foreach ($value_all_hdct_view2->id_cactacgia as $value)
                                                                <?php echo $value->hodem.' '.$value->ten.'; '; ?>
                                                            @endforeach 
                                                            Tên nhà xuất bản: <?php echo $value_all_hdct_view2->nhaxuatban.', '; ?>
                                                            năm: <?php echo $value_all_hdct_view2->namxuatban.'. '; ?> <br>
                                                            <b>({{$value_all_hoatdong_nckh->diemcongtrinh}} điểm Chia cho {{$value_all_hdct_view2->sotacgia}} tác giả)</b>
                                                            <div>
                                                                <i>Minh chứng:</i> <br>
                                                                @if (isset($value_all_hdct_view2->show_hinhanhminhchung))
                                                                    @foreach ($value_all_hdct_view2->show_hinhanhminhchung as $value_minhchung )
                                                                        <a href="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" target="_blank">
                                                                            @if ($value_minhchung->duoi == "pdf")
                                                                                <i style="margin-left:2px;font-size:25px;color:#dc3545;" class="fas fa-file-pdf"></i>
                                                                            @else
                                                                                <img style="margin-left:2px;border:1px solid #a7a7a7;" width="40" height="25" src="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" alt="">
                                                                            @endif
                                                                        </a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{$value_all_hdct_view2->diemcuatoi}} Điểm</td>
                                                        <td class="align-middle">{{$value_all_hoatdong_nckh->giokhoahoc}} Giờ/Điểm</td>
                                                        <td class="align-middle">{{$value_all_hdct_view2->thanhgionckh}} Giờ</td>
                                                        <td class="align-middle">
                                                            @if ($value_all_hdct_view2->tinhtrangduyet==0)
                                                                <i style="color:#64c4ed;padding-right:3px" class="fas fa-clock"></i>
                                                            @elseif ($value_all_hdct_view2->tinhtrangduyet==1)
                                                                <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                            @elseif ($value_all_hdct_view2->tinhtrangduyet==2)
                                                                <i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i> Xem
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if ($value_all_hoatdong_nckh->loai_hoatdong == 3)
                                                <?php $stt_l3 = 1; ?>
                                                @foreach ($all_hoatdong_cuatoi_view3 as $value_all_hdct_view3)
                                                    @if ($value_all_hdct_view3->id_hoatdong == $value_all_hoatdong_nckh->id)
                                                    <tr class="click-hoat-dong-cua-toi" data-value="{{$value_all_hdct_view3->id_nckh}}_{{$value_all_hdct_view3->loai_hoatdong}}" >
                                                        <td class="align-middle" style="text-align: left;">
                                                            {{$stt_l3++.'. '.$value_all_hdct_view3->minhchung}} <br>
                                            
                                                            <div>
                                                                <i>Minh chứng:</i> <br>
                                                                @if (isset($value_all_hdct_view3->show_hinhanhminhchung))
                                                                    @foreach ($value_all_hdct_view3->show_hinhanhminhchung as $value_minhchung )
                                                                        <a href="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" target="_blank">
                                                                            @if ($value_minhchung->duoi == "pdf")
                                                                                <i style="margin-left:2px;font-size:25px;color:#dc3545;" class="fas fa-file-pdf"></i>
                                                                            @else
                                                                                <img style="margin-left:2px;border:1px solid #a7a7a7;" width="40" height="25" src="{{ asset('./public/uploads/img/nghiencuukhoahoc/'.$value_minhchung->link)}}" alt="">
                                                                            @endif
                                                                        </a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">{{$value_all_hoatdong_nckh->diemcongtrinh}} Điểm</td>
                                                        <td class="align-middle">{{$value_all_hoatdong_nckh->giokhoahoc}} Giờ/Điểm</td>
                                                        <td class="align-middle">{{$value_all_hdct_view3->thanhgionckh}} Giờ</td>
                                                        <td class="align-middle">
                                                            @if ($value_all_hdct_view3->tinhtrangduyet==0)
                                                                <i style="color:#64c4ed;padding-right:3px" class="fas fa-clock"></i>
                                                            @elseif ($value_all_hdct_view3->tinhtrangduyet==1)
                                                                <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                            @elseif ($value_all_hdct_view3->tinhtrangduyet==2)
                                                                <i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i> Xem
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
   
                                        @endif
                                    @endforeach

                                    <tr>
                                        <td class="align-middle"></td>
                                        <td style="color:blue;" class="align-middle">TỔNG KHỐI LƯỢNG GIỜ NCKH 0 (tạm tính)</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td style="color:blue;" class="align-middle">{{$counttongsogio}}</td>
                                        <td class="align-middle"></td>
                                    </tr>
                                </tbody>

                                <input type="hidden" name="" id="nckh-clicked" >

                            </table>

                            <div id="modal-khong-duyet-nckh" class="modal">
                                <div class="modal-content">
                                    <span class="close-modal">&times;</span>
                                    <div class="content-modal-khong-duyet-nckh">
                                        <h4>Sửa đề tài NCKH</h4>
                                        <hr>
                                        <textarea name="" id="noi-dung-sua-nckh" placeholder="Nhập nội dung cần sửa"></textarea>
                                        <center>
                                            <button id="sua-de-tai-nckh" class="btn btn-success">Lưu lại</button>
                                        </center>
                                    </div> 
                                </div>
                            </div>

                            <div id="modal-xem-noi-dung-sua" class="modal">
                                <div class="modal-content">
                                    <span class="close-modal">&times;</span>
                                    <div class="content-modal-xem-noi-dung-sua">
                                        <h4>Các nội dung cần sửa</h4>
                                        <hr>
                                        <div id="all-noi-dung-sua">

                                        </div>
                                    </div> 
                                </div>
                            </div>

                        </fieldset>
                    </div>

                </div>

                <div id="thongke-nckh" class="tabcontent">

                    
                </div>

                <div id="trogiup" class="tabcontent">
                    
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        $('#click-nam-hoc-nckh').click(function() {
            document.getElementById("modal-nam-hoc-nckh").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            document.getElementById("modal-khong-duyet-nckh").style.display = "none";
            document.getElementById("modal-xem-noi-dung-sua").style.display = "none";
        });

        window.onclick = function(event) {
            let modal = document.getElementById("modal-nam-hoc-nckh");
            if (event.target == modal) {
                document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            }

            let modal1 = document.getElementById("modal-khong-duyet-nckh");
            if (event.target == modal1) {
                document.getElementById("modal-khong-duyet-nckh").style.display = "none";
            }

            let modal2 = document.getElementById("modal-xem-noi-dung-sua");
            if (event.target == modal2) {
                document.getElementById("modal-xem-noi-dung-sua").style.display = "none";
            }

        }

        $('.duyet-nckh').on('click', 'table tbody tr.click-hoat-dong-cua-toi', function() {
            $(".click-hoat-dong-cua-toi").removeClass('active');
            $(this).addClass("active");
            $("#nckh-clicked").val($(this).attr('data-value'));

            let trangthaiduyet = $(this).attr('data-value').split('_');

            if(trangthaiduyet[2] == 0) {
                document.getElementById("cho-duyet-de-tai-nckh").disabled = true;
            }

            if(trangthaiduyet[2] == 1) {
                document.getElementById("duyet-de-tai-nckh").disabled = true;
            }

            if(trangthaiduyet[2] == 2) {
                document.getElementById("khong-duyet-de-tai-nckh").disabled = true;
            }

        });

        $('.list-option-duyet').on('click', '#duyet-de-tai-nckh', function() {

            let value_nckh_clicked = $("#nckh-clicked").val();

            if(value_nckh_clicked.trim().length) {

                let list_value = value_nckh_clicked.split('_');

                let id_nckh = list_value[0];
                let loai_hoatdong = list_value[1];
                let id_tacgia = {{$id_tacgia}};
                let id_namhoc = {{$id_namhoc}};

                var answer = window.confirm("Bạn có chắc chắn muốn duyệt đề tài này không?");
                if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/xet-duyet-nckh')}}",
                        method: 'get',
                        data:{id_nckh:id_nckh, loai_hoatdong:loai_hoatdong, id_tacgia:id_tacgia, id_namhoc:id_namhoc},
                        success: function(data) {
                            if (data != null) {
                                if(data == 'Successfull') {
                                    location.reload();
                                }
                            }   
                        }
                    });
                }

            } else {
                alert("Vui lòng chọn đề tài cần duyệt và tiếp tục !!!");
            }

        }); 

        $('.list-option-duyet').on('click', '#cho-duyet-de-tai-nckh', function() {

            let value_nckh_clicked = $("#nckh-clicked").val();

            if(value_nckh_clicked.trim().length) {

                let list_value = value_nckh_clicked.split('_');

                let id_nckh = list_value[0];
                let loai_hoatdong = list_value[1];
                let id_tacgia = {{$id_tacgia}};
                let id_namhoc = {{$id_namhoc}};

                var answer = window.confirm("Bạn có chắc chắn muốn chờ duyệt đề tài này không?");
                if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/cho-duyet-nckh')}}",
                        method: 'get',
                        data:{id_nckh:id_nckh, loai_hoatdong:loai_hoatdong, id_tacgia:id_tacgia, id_namhoc:id_namhoc},
                        success: function(data) {
                            if (data != null) {
                                if(data == 'Successfull') {
                                    location.reload();
                                }
                            }   
                        }
                    });
                }

            } else {
                alert("Vui lòng chọn đề tài cần chờ duyệt và tiếp tục !!!");
            }

        }); 

        $('.list-option-duyet').on('click', '#khong-duyet-de-tai-nckh', function() {

            let value_nckh_clicked = $("#nckh-clicked").val();

            if(value_nckh_clicked.trim().length) {

                let list_value = value_nckh_clicked.split('_');

                let id_nckh = list_value[0];
                let loai_hoatdong = list_value[1];
                let id_tacgia = {{$id_tacgia}};
                let id_namhoc = {{$id_namhoc}};

                document.getElementById("modal-khong-duyet-nckh").style.display = "block";   

                
            } else {
                alert("Vui lòng chọn đề tài không duyệt và tiếp tục !!!");
            }

        }); 

        $('.content-modal-khong-duyet-nckh').on('click', '#sua-de-tai-nckh', function() {

            let noi_dung_sua = $("#noi-dung-sua-nckh").val();

            if(noi_dung_sua.trim().length) {

                let value_nckh_clicked = $("#nckh-clicked").val();
                let list_value = value_nckh_clicked.split('_');

                let id_nckh = list_value[0];
                let loai_hoatdong = list_value[1];
                let id_tacgia = {{$id_tacgia}};
                let id_namhoc = {{$id_namhoc}};

                var answer = window.confirm("Bạn có chắc chắn muốn gửi nội dung sửa này không?");
                if (answer) {
                    $.ajax({
                        url: "{{URL::to('admin/decuong/sua-duyet-nckh')}}",
                        method: 'get',
                        data:{id_nckh:id_nckh, loai_hoatdong:loai_hoatdong, id_tacgia:id_tacgia, id_namhoc:id_namhoc, noi_dung_sua:noi_dung_sua},
                        success: function(data) {
                            if (data != null) {
                                if(data == 'Successfull') {
                                    location.reload();
                                }
                            }   
                        }
                    });
                }

                
            } else {
                alert("Vui lòng nhập nội dung và tiếp tục !!!");
            }

        }); 
        
        $('.click-hoat-dong-cua-toi').on('click', '#xem-noi-dung-sua', function() {

            document.getElementById("modal-xem-noi-dung-sua").style.display = "block"; 

            let value_nckh_clicked = $(this).attr('data-value');
            let list_value = value_nckh_clicked.split('_');

            let id_nckh = list_value[0];
            let loai_hoatdong = list_value[1];
            let id_tacgia = {{$id_tacgia}};
            let id_namhoc = {{$id_namhoc}};

            $.ajax({
                url: "{{URL::to('admin/decuong/xem-noi-dung-sua-duyet-nckh')}}",
                method: 'get',
                data:{id_nckh:id_nckh, loai_hoatdong:loai_hoatdong, id_tacgia:id_tacgia, id_namhoc:id_namhoc},
                success: function(data) {
                    if (data != null) {
                        $('#all-noi-dung-sua').html(data);
                    }   
                }
            });

        }); 
        
        
        

    });

    function opentab(evt, tabName) {

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function openHdNckh(evt, tabName) {

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabhoatdongnckh");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinkshdnckh");

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    

</script>

@endsection