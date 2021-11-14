@extends('admin_layout')
@section('admin_content')

<div class="quan-ly-khung-chuong-trinh">
    <div class="container">
        <div class="row">
            <div class="col-md-12 nopadding">
                <div class="top">
                    <div class="title">
                        <span class="quanlykhungchuongtrinh">Quản lý Khung chương trình</span>
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
                                                            <a href="<?php echo url('admin/decuong/khung-chuong-trinh/'.$value_all_khungchuongtrinh->id); ?>">{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</a>
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
                    
                    <div class="table-khung-chuong-trinh">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td style="text-align: left;">Mã học phần</td>
                                    <td style="text-align: left;">Tên học phần</td>
                                    <td>Học kỳ</td>
                                    <td>Học phần: tiên quyết (a), học trước (b), song hành (c)</td>
                                    <td>HP tự chọn</td>
                                    <td>Khóa học</td>
                                    <td>Chức năng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt_kct=1; ?>
                                @foreach($all_kct_hocphan as $value_all_kct_hocphan)
                                <tr>
                                    <td>{{$stt_kct++}}</td>
                                    <td style="text-align: left;">{{$value_all_kct_hocphan->mahocphan}}</td>
                                    <td style="text-align: left;">{{$value_all_kct_hocphan->tenhocphan}}</td>
                                    <td>{{$value_all_kct_hocphan->hocky}}</td>
                                    <td id="dshplq-{{$value_all_kct_hocphan->id_hocphan}}" class="ds-hp-lq"></td>
                                    <script type="text/javascript">
                                        var dataenc = <?php echo json_encode(html_entity_decode($value_all_kct_hocphan->ds_hocphan_lienquan, ENT_QUOTES, "utf-8")); ?>;
                                        $('#dshplq-{{$value_all_kct_hocphan->id_hocphan}}').html(dataenc);
                                    </script>
                                    @if($value_all_kct_hocphan->tuchon == 1)
                                    <td><img style="width:24px" src="{{ asset('./public/Images/icons/check-yes.png')}}"></td>
                                    @else
                                    <td><img style="width:24px" src="{{ asset('./public/Images/icons/check-no.png')}}"></td>
                                    @endif
                                    <td>{{$value_all_kct_hocphan->nambatdau.' - '.$value_all_kct_hocphan->namketthuc}}</td>
                                    
                                    @if(isset($value_all_kct_hocphan->has_decuong))
                                    <td id="sua-de-cuong" data-value="{{$value_all_kct_hocphan->id_decuong}}">
                                        <span>Sửa đề cương</span>
                                    </td>
                                    @else
                                    <td style="color: #f64e60;cursor: pointer;" id="nhan-ban-de-cuong" data-value="{{$value_all_kct_hocphan->id_hocphan}}" >
                                        <span>Nhân bản đề cương</span>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="modal-sua-de-cuong" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <h4>Chọn danh mục cần sửa <hr></h4>       
                            <div id="content-modal-sua-de-cuong">
                                
                            </div> 
                        </div>
                    </div>

                    <div id="modal-nhan-ban-de-cuong" class="modal">
                        <div class="modal-content">
                            <span class="close-modal">&times;</span>
                            <h4>Thêm mới đề cương <hr></h4>  
                            <div id="content-modal-nhan-ban-de-cuong">
                                
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

        $('.table-khung-chuong-trinh').on('click', 'tbody tr td#sua-de-cuong', function() {
            document.getElementById("modal-sua-de-cuong").style.display = "block";

            var id_decuong = this.dataset.value;

            $.ajax({
                url: "{{URL::to('admin/decuong/get-modal-sua-de-cuong')}}",
                method: 'GET',
                data:{id_decuong:id_decuong},
                success: function(data) {
                    if (data != null) {
						$('#content-modal-sua-de-cuong').html(data);
                    }   
                }
            });


        });

        $('.table-khung-chuong-trinh').on('click', 'tbody tr td#nhan-ban-de-cuong', function() {
            document.getElementById("modal-nhan-ban-de-cuong").style.display = "block";

            var id_hocphan = this.dataset.value;
            var id_khung = {{$id_khung}};

            $.ajax({
                url: "{{URL::to('admin/decuong/get-modal-nhan-ban-de-cuong')}}",
                method: 'GET',
                data:{id_hocphan:id_hocphan, id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
						$('#content-modal-nhan-ban-de-cuong').html(data);
                    }   
                }
            });
        });

        $('#doi-khung-chuong-trinh').click(function() {
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-sua-de-cuong").style.display = "none";
            document.getElementById("modal-nhan-ban-de-cuong").style.display = "none";
            document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
        });

        window.onclick = function(event) {

            let modal1 = document.getElementById("modal-sua-de-cuong");
            if (event.target == modal1) {
                document.getElementById("modal-sua-de-cuong").style.display = "none";
            }

            let modal2 = document.getElementById("modal-nhan-ban-de-cuong");
            if (event.target == modal2) {
                document.getElementById("modal-nhan-ban-de-cuong").style.display = "none";
            }

            let modal3 = document.getElementById("modal-doi-khung-chuong-trinh");
            if (event.target == modal3) {
                document.getElementById("modal-doi-khung-chuong-trinh").style.display = "none";
            }

        }



    });
</script>


@endsection