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
                                                        <a href="<?php echo url('admin/decuong/thong-ke-nghien-cuu-khoa-hoc-cua-toi/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
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
                            <a class="tablinks" onclick="opentab(event, 'hoatdong-nckh')" >
                                <span>Hoạt động NCKH</span>
                            </a>
                        </li>
                        <li>
                            <a class="tablinks active" onclick="opentab(event, 'thongke-nckh')" >
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

                
                <div id="hoatdong-nckh" class="tabcontent">

                </div>

                <div id="thongke-nckh" class="tabcontent active">
                    <fieldset>
                        <legend>Thống kê NCKH - Thống kê cá nhân</legend>

                        <div class="thong-ke-nckh-ca-nhan">
                            <table>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <table class="table table-bordered table-left">
                                                <tbody>
                                                    <tr>
                                                        <td>Năm học</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Họ tên</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Đơn vị</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chức năng</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chức vụ</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ghi chú</td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td width="50%">
                                            <table class="table table-bordered table-right">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"><strong>Giờ chuẩn cần nghiên cứu</strong> (a)</td>
                                                        <td colspan="2">nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong>Giờ cần nghiên cứu</strong> (b) <br> (Sau khi áp dụng ưu tiên)
                                                        </td>
                                                        <td colspan="2">nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="4">
                                                            <strong>Giờ NCKH</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Trong năm (c)
                                                        </td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Năm trước (d)
                                                        </td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Tổng cộng</strong> (e)
                                                        </td>
                                                        <td>nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>Giờ còn thiếu</strong> (f=b-e)</td>
                                                        <td colspan="2">nam hoc</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong>Giờ chuyển năm sau</strong> (g=c-b) <br> (Chỉ tính cho 1 năm liền kề)
                                                        </td>
                                                        <td colspan="2">nam hoc</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Chi tiết nghiên cứu khoa học</legend>

                        <div class="chi-tiet-nckh-cua-toi">
                            
                        </div>

                    </fieldset>
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