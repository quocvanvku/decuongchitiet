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
                                                        <a href="<?php echo url('admin/decuong/nghien-cuu-khoa-hoc/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
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
                            <a class="tablinks active" onclick="opentab(event, 'hoatdong-nckh')" >
                                <span>Hoạt động NCKH</span>
                            </a>
                        </li>
                        <li>
                            <a class="tablinks" href="<?php echo url('admin/decuong/thong-ke-nghien-cuu-khoa-hoc-cua-toi/'.$namhoc_dangchon->id); ?>" >
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

                
                <div id="hoatdong-nckh" class="tabcontent active">
                    
                    <div class="list-choice">
                        <span class="tablinkshdnckh active" onclick="openHdNckh(event, 'nckh-cuatoi')" >NCKH của tôi</span>
                        <span>|</span>
                        <span class="tablinkshdnckh" onclick="openHdNckh(event, 'themmoi-nckh')" >Thêm mới NCKH</span>
                    </div>
                    
                    <div id="nckh-cuatoi" class="tabhoatdongnckh active">

                        <div class="list-nghien-cuu-khoa-hoc">
                            <div class="list-action">
                                <span id="them-moi-nckh" onclick="openHdNckh(event, 'themmoi-nckh')" >Thêm mới NCKH</span>
                                <span id="sua-nckh">Sửa hoạt động NCKH</span>
                                <span id="xoa-nckh">Xóa hoạt động NCKH</span>
                                <a href="<?php echo url('admin/decuong/duyet-nghien-cuu-khoa-hoc/'.$id_namhoc); ?>"><span id="xet-duyet">Xét duyệt</span></a>

                                <div class="list-duyet" style="float: right;">
                                    <span><i style="color:#64c4ed;padding-right:3px" class="fas fa-hourglass-half"></i> Đang chờ duyệt</span>
                                    <span><i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i>   Không duyệt</span>
                                    <span><i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i> Đã duyệt</span>
                                    <span style="padding-left:35px; cursor: pointer;" id="gui-duyet-tat-ca" ><i style="color:#1FD537;padding-right:3px" class="fas fa-file-import"></i> Gửi duyệt hết</span>
                                </div>
                            </div>
                            
                            <div class="table-nghien-cuu-khoa-hoc">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="align-middle" style="width:40px;">#</td>
                                            <td class="align-middle"  style="text-align: left;width:22%;">Tên hoạt động nghiên cứu</td>
                                            <td class="align-middle" style="text-align: left;width:50%;">Liệt kê minh chứng</td>
                                            <td class="align-middle">Số lượng</td>
                                            <td class="align-middle">Định mức</td>
                                            <td class="align-middle">Tính thành giờ NCKH</td>
                                            <td class="align-middle">Duyệt</td>
                                        </tr>
                                    </thead>
                                    <tbody id="body-table-nghien-cuu-khoa-hoc">
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
                                                        <tr class="click-hoat-dong-cua-toi" data-link="<?php echo url('admin/decuong/xoa-nghien-cuu-khoa-hoc-loai-1/'.$value_all_hdct_view1->id.'/'.$id_namhoc); ?>" data-value="<?php echo url('admin/decuong/sua-nghien-cuu-khoa-hoc-loai-1/'.$value_all_hdct_view1->id.'/'.$id_namhoc); ?>">
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
                                                                @if ($value_all_hdct_view1->trangthaiduyet==0)
                                                                    
                                                                @elseif ($value_all_hdct_view1->trangthaiduyet==1)
                                                                    <i style="color:#64c4ed;padding-right:3px" class="fas fa-hourglass-half"></i>
                                                                @elseif ($value_all_hdct_view1->trangthaiduyet==2)
                                                                    <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                                @elseif ($value_all_hdct_view1->trangthaiduyet==3)
                                                                    <i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i>
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
                                                        <tr class="click-hoat-dong-cua-toi" data-link="<?php echo url('admin/decuong/xoa-nghien-cuu-khoa-hoc-loai-2/'.$value_all_hdct_view2->id.'/'.$id_namhoc); ?>" data-value="<?php echo url('admin/decuong/sua-nghien-cuu-khoa-hoc-loai-2/'.$value_all_hdct_view2->id.'/'.$id_namhoc); ?>">
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
                                                                @if($value_all_hdct_view2->trangthaiduyet==0)
                                                                    
                                                                @elseif ($value_all_hdct_view2->trangthaiduyet==1)
                                                                    <i style="color:#64c4ed;padding-right:3px" class="fas fa-hourglass-half"></i>
                                                                @elseif ($value_all_hdct_view2->trangthaiduyet==2)
                                                                    <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                                @elseif ($value_all_hdct_view2->trangthaiduyet==3)
                                                                    <i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i>
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
                                                        <tr class="click-hoat-dong-cua-toi" data-link="<?php echo url('admin/decuong/xoa-nghien-cuu-khoa-hoc-loai-3/'.$value_all_hdct_view3->id.'/'.$id_namhoc); ?>" data-value="<?php echo url('admin/decuong/sua-nghien-cuu-khoa-hoc-loai-3/'.$value_all_hdct_view3->id.'/'.$id_namhoc); ?>">
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
                                                                @if($value_all_hdct_view3->trangthaiduyet==0)
                                                                
                                                                @elseif ($value_all_hdct_view3->trangthaiduyet==1)
                                                                    <i style="color:#64c4ed;padding-right:3px" class="fas fa-hourglass-half"></i>
                                                                @elseif ($value_all_hdct_view3->trangthaiduyet==2)
                                                                    <i style="color:#1FD537;padding-right:3px" class="fas fa-check"></i>
                                                                @elseif ($value_all_hdct_view3->trangthaiduyet==3)
                                                                    <i style="color:#f0134d;padding-right:3px" class="fas fa-ban"></i>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @else
                                                <tr>
                                                    <td class="align-middle">{{$stt++}}</td>
                                                    <td class="align-middle" style="text-align: left;text-align: justify;">{{$value_all_hoatdong_nckh->tenhoatdongnghiencuu}}</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <input type="hidden" name="" id="link-sua-hoatdong-clicked">

                                        <input type="hidden" name="" id="link-xoa-hoatdong-clicked">

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

                                    <input type="hidden" name="" id="id-nckh-clicked">
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="themmoi-nckh" class="tabhoatdongnckh">
                        <div class="table-them-moi-nghien-cuu-khoa-hoc">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td style="width:85%;">Chọn hoạt động nghiên cứu</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; ?>
                                    @foreach($all_hoatdong_nckh as $value_all_hoatdong_nckh)
                                    <tr>
                                        <td class="align-middle">{{$stt++}}</td>
                                        <td class="align-middle ten-hd">
                                            <a href="<?php echo url('admin/decuong/them-moi-nghien-cuu-khoa-hoc/load-view/'.$value_all_hoatdong_nckh->loai_hoatdong.'/'.$value_all_hoatdong_nckh->id.'/'.$id_namhoc); ?>">{{$value_all_hoatdong_nckh->tenhoatdongnghiencuu}}</a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?php echo url('admin/decuong/them-moi-nghien-cuu-khoa-hoc/load-view/'.$value_all_hoatdong_nckh->loai_hoatdong.'/'.$value_all_hoatdong_nckh->id.'/'.$id_namhoc); ?>"><i style="color:#1FD537;" class="fas fa-plus-circle"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div> 

                </div>

                <div id="thongke-nckh" class="tabcontent">
                    <h3>Paris</h3>
                    <p>Paris is the capital of France.</p> 
                </div>

                <div id="trogiup" class="tabcontent">
                    <h3>Tokyo</h3>
                    <p>Tokyo is the capital of Japan.</p>
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
        });

        window.onclick = function(event) {
            let modal = document.getElementById("modal-nam-hoc-nckh");
            if (event.target == modal) {
                document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            }
        }

        $('.table-nghien-cuu-khoa-hoc').on('click', 'table tbody tr.click-hoat-dong-cua-toi', function() {
            $(".click-hoat-dong-cua-toi").removeClass('active');
            $(this).addClass("active");
            $("#link-sua-hoatdong-clicked").val($(this).attr('data-value'));
            $("#link-xoa-hoatdong-clicked").val($(this).attr('data-link'));
        });

        $('#sua-nckh').click(function() {

            let data_link = $("#link-sua-hoatdong-clicked").val();

            if(data_link.trim().length) {

                window.location.href = data_link;

            } else {
                alert("Vui lòng chọn hoạt động cần sửa và tiếp tục !!!");
            }

        });

        $('#xoa-nckh').click(function() {

            let link_href = $("#link-xoa-hoatdong-clicked").val();

            if(link_href.trim().length) {
                
                window.location.href = link_href;

            } else {
                alert("Vui lòng chọn hoạt động cần sửa và tiếp tục !!!");
            }

        });

        $('#gui-duyet-tat-ca').click(function() {

            let id_namhoc = {{$id_namhoc}};
            let id_tacgia = {{$id_tacgia}}
           
            var answer = window.confirm("Bạn muốn gửi yêu cầu duyệt tất cả các mục?");
            if (answer) {
                $.ajax({
                    url: "{{URL::to('admin/decuong/gui-xet-duyet-nckh')}}",
                    method: 'get',
                    data:{id_namhoc:id_namhoc, id_tacgia:id_tacgia},
                    success: function(data) {
                        if (data != null) {
                            if(data == 'Successfull') {
                                location.reload();
                            }
                        }   
                    }
                });
            }

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