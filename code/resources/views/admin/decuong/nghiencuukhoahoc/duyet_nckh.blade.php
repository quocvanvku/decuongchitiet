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
                                                        <a href="<?php echo url('admin/decuong/duyet-nghien-cuu-khoa-hoc/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
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
                            <a class="tablinks active">
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

                
                <div id="hoatdong-nckh" class="tabcontent active" >
                    
                    <div class="duyet-nckh">
                        <fieldset>
                            <legend>Danh sách duyệt NCKH</legend>

                            <div class="list-option-duyet">
                                <span><i class="fa fa-clock"></i> Chưa duyệt xong</span>
                                <span><i class="fa fa-check"></i>Đã duyệt xong</span>
                                <span><i class="fa fa-wrench"></i>Chờ sửa lại</span>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>STT</td>
                                        <td>Họ tên</td>
                                        <td>Đơn vị</td>
                                        <td>Giờ yêu cầu duyệt</td>
                                        <td>Giờ đã duyệt</td>
                                        <td>Ngày gửi</td>
                                        <td>Tình trạng</td>
                                        <td>Chức năng</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; ?>
                                    @foreach ($danhsach_duyet as $value_danhsach_duyet)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$value_danhsach_duyet->hodem.' '.$value_danhsach_duyet->ten}}</td>
                                            <td></td>
                                            <td>{{$value_danhsach_duyet->diemkhoahoc}}</td>
                                            <td></td>
                                            <td>{{date("d/m/Y",$value_danhsach_duyet->ngayguiduyet)}}</td>
                                            <td>
                                                @if ($value_danhsach_duyet->tinhtrangduyet == 0)
                                                    <i class="fa fa-clock"></i>
                                                @elseif ($value_danhsach_duyet->tinhtrangduyet == 1)
                                                    <i class="fa fa-check"></i>
                                                @elseif ($value_danhsach_duyet->tinhtrangduyet == 2)
                                                    <i class="fa fa-wrench"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="<?php echo url('admin/decuong/duyet-nckh-chi-tiet/'.$value_danhsach_duyet->id.'/'.$id_namhoc); ?>">Chi tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
        });

        window.onclick = function(event) {
            let modal = document.getElementById("modal-nam-hoc-nckh");
            if (event.target == modal) {
                document.getElementById("modal-nam-hoc-nckh").style.display = "none";
            }
        }

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