@extends('admin_layout')
@section('admin_content')

<div class="them-khoi-luong-kien-thuc-khung-chuong-trinh">
    <div class="container">
        <div class="row">
            <div class="col-md-12 nopadding">
                <div class="klkt-kct">
                    <h4 class="title">Thêm khối lượng kiến thức khung chương trình</h4>
                    <span id="add-khoi-luong-kien-thuc">Thêm khối lượng kiến thức</span>
                    <p class="ten-kct">Tên khung chương trình: <strong>{{$khungchuongtrinh->tenkhungchuongtrinh}}</strong> </p>
                    <div class="row">
                        <!-- <div class="col-md-6">
                                                 
                        </div> -->
                        <div class="col-md-12">
                            <div class="khoi-luong-kien-thuc-cua-khung">
                                <p>KLKT của {{$khungchuongtrinh->tenkhungchuongtrinh}}</p>
                                <table id="table-khoi-luong-kien-thuc-cua-khung">
                                    
                                </table>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div id="modal-list-khoi-luong-kien-thuc" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="list-khoi-luong-kien-thuc">
                            <p>Danh sách Khối lượng kiến thức</p>
                            <table id="table-list-khoi-luong-kien-thuc">
                                
                            </table>
                        </div> 
                    </div>
                </div>

                <div class="danh-sach-hoc-phan-khoi-luong-kien-thuc">
                    <span id="sua-khoi-luong-kien-thuc-kct">Sửa khối lượng kiến thức</span>
                    <p class="title">Danh sách học phần theo nhóm học phần</p> 
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td style="text-align: left;">Mã học phần</td>
                                <td style="text-align: left;width:60%;">Tên học phần</td>
                                <td>Số TC</td>
                                <td>Học kỳ</td>
                            </tr>
                        </thead>  
                        <tbody id="body-danh-sach-hoc-phan-khoi-luong-kien-thuc">

                        </tbody>
                    </table> 
                    <input type="hidden" name="" id="id-hp-dshp-klkt">                  
                </div>

                <div id="modal-danh-sach-hoc-phan-khoi-luong-kien-thuc" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="modal-dshp-klkt">
                            <p>Sửa Khối lượng kiến thức</p>
                            <div id="list-dshp-klkt">

                            </div>
                        </div> 
                    </div>
                </div>

                <div class="danh-sach-hoc-phan-chua-them-khoi-kien-thuc">
                    <span id="them-khoi-luong-kien-thuc-kct">Thêm khối lượng kiến thức</span>
                    <p class="title">Danh sách học phần chưa thêm khối lượng kiến thức</p> 
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td style="text-align: left;">Mã học phần</td>
                                <td style="text-align: left;width:60%;">Tên học phần</td>
                                <td>Số TC</td>
                                <td>Học kỳ</td>
                            </tr>
                        </thead>  
                        <tbody id="body-danh-sach-hoc-phan-chua-them-khoi-kien-thuc">

                        </tbody>
                    </table>   
                    <input type="hidden" name="" id="id-hp-dshp-chua-them-klkt">     
                </div>

                <div id="modal-danh-sach-hoc-phan-chua-them-khoi-kien-thuc" class="modal">
                    <div class="modal-content">
                        <span class="close-modal">&times;</span>
                        <div class="modal-dshp-chua-them-klkt">
                            <p>Thêm Khối lượng kiến thức</p>
                            <div id="list-dshp-chua-them-klkt">

                            </div>
                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

        load_list_khoiluongkienthuc();

        function load_list_khoiluongkienthuc() {

            let id_khung = {{$khungchuongtrinh->id}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-list-khoi-luong-kien-thuc')}}",
                method: 'GET',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#table-list-khoi-luong-kien-thuc').html(data);
                    }   
                }
            });
        }

        load_khoiluongkienthuc_cuakhung();

        function load_khoiluongkienthuc_cuakhung() {

            let id_khung = {{$khungchuongtrinh->id}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-khoi-luong-kien-thuc-cua-khung')}}",
                method: 'GET',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#table-khoi-luong-kien-thuc-cua-khung').html(data);
                    }   
                }
            });
        }

        $('#table-list-khoi-luong-kien-thuc').on('click', 'tr td span', function() {

            let id_klkt_kct_chitiet = $(this).attr('data-value');
            let id_khung = {{$khungchuongtrinh->id}};

            $.ajax({
                url: "{{URL::to('admin/decuong/add-khoi-luong-kien-thuc-cua-khung')}}",
                method: 'GET',
                data:{id_khung:id_khung,id_klkt_kct_chitiet:id_klkt_kct_chitiet},
                success: function(data) {
                    if (data != null) {
                        load_list_khoiluongkienthuc();
                        load_khoiluongkienthuc_cuakhung();
                        load_danhsachhocphan_khoiluongkienthuc();
                        alert("Thêm thành công khối lượng kiến thức khung chương trình");
                        document.getElementById("modal-list-khoi-luong-kien-thuc").style.display = "none";
                    }   
                }
            });

        });

        $('#table-khoi-luong-kien-thuc-cua-khung').on('click', 'tr td span', function() {

            let answer = window.confirm("Bạn có chắc chắn muốn xóa không?");

            if(answer) {
                let id_klkt_kct_chitiet = $(this).attr('data-value');
                let id_khung = {{$khungchuongtrinh->id}};

                $.ajax({
                    url: "{{URL::to('admin/decuong/delete-khoi-luong-kien-thuc-cua-khung')}}",
                    method: 'GET',
                    data:{id_khung:id_khung,id_klkt_kct_chitiet:id_klkt_kct_chitiet},
                    success: function(data) {
                        if (data != null) {
                            load_list_khoiluongkienthuc();
                            load_khoiluongkienthuc_cuakhung();
                            load_danhsachhocphan_khoiluongkienthuc();
                            alert("Xóa thành công khối lượng kiến thức khung chương trình");
                        }   
                    }
                });
            }

        });

        $('#add-khoi-luong-kien-thuc').click(function() {
            document.getElementById("modal-list-khoi-luong-kien-thuc").style.display = "block";
        });

        $('.close-modal').click(function() {
            document.getElementById("modal-list-khoi-luong-kien-thuc").style.display = "none";
            document.getElementById("modal-danh-sach-hoc-phan-khoi-luong-kien-thuc").style.display = "none";
        });

        window.onclick = function(event) {
            let modal = document.getElementById("modal-list-khoi-luong-kien-thuc");
            if (event.target == modal) {
                document.getElementById("modal-list-khoi-luong-kien-thuc").style.display = "none";
            }

            let modal2 = document.getElementById("modal-danh-sach-hoc-phan-khoi-luong-kien-thuc");
            if (event.target == modal2) {
                document.getElementById("modal-danh-sach-hoc-phan-khoi-luong-kien-thuc").style.display = "none";
            }

            let modal3= document.getElementById("modal-danh-sach-hoc-phan-chua-them-khoi-kien-thuc");
            if (event.target == modal3) {
                document.getElementById("modal-danh-sach-hoc-phan-chua-them-khoi-kien-thuc").style.display = "none";
            }
        }

        load_danhsachhocphan_khoiluongkienthuc();

        function load_danhsachhocphan_khoiluongkienthuc() {
            let id_khung = {{$khungchuongtrinh->id}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-danh-sach-hoc-phan-khoi-luong-kien-thuc')}}",
                method: 'GET',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-danh-sach-hoc-phan-khoi-luong-kien-thuc').html(data);
                    }   
                }
            });
        }

        $(".danh-sach-hoc-phan-khoi-luong-kien-thuc").on('click', 'table tbody tr.click-hocphan', function() {
            $(".click-hocphan").removeClass('active');
            $(this).addClass("active");
            $("#id-hp-dshp-klkt").val($(this).attr('data-value'));
        });

        $('#sua-khoi-luong-kien-thuc-kct').click(function() {

            let id_hocphan_clicked = $("#id-hp-dshp-klkt").val();
            let id_khung = {{$khungchuongtrinh->id}};

            if(id_hocphan_clicked.trim().length) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/khoi-luong-kien-thuc-hoc-phan')}}",
                    method: 'GET',
                    data:{id_hocphan_clicked:id_hocphan_clicked,id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {
                            $('#list-dshp-klkt').html(data);
                            document.getElementById("modal-danh-sach-hoc-phan-khoi-luong-kien-thuc").style.display = "block";
                            $("#list-dshp-klkt select").attr("size",$("#list-dshp-klkt select option").length);
                        }   
                    }
                });
            
            } else {
            alert("Vui lòng chọn học phần cần thiết lập mối quan hệ và tiếp tục !!!");
            }
        });

        $('#list-dshp-klkt').on('click', 'select option', function() {

            let id_klkt_sua = $(this).val();
            let id_hocphan = $(this).parent('select').attr('data-value');
            let id_khung = {{$khungchuongtrinh->id}};

            if(id_klkt_sua) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/sua-khoi-luong-kien-thuc-hoc-phan')}}",
                    method: 'GET',
                    data:{id_klkt_sua:id_klkt_sua,id_hocphan:id_hocphan,id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {
                            alert("Sửa khối lượng kiến thức học phần Thành Công !!!");
                            document.getElementById("modal-danh-sach-hoc-phan-khoi-luong-kien-thuc").style.display = "none";
                            load_danhsachhocphan_khoiluongkienthuc();
                        }   
                    }
                });
            }

        });

        load_danhsachhocphan_chuathem_khoiluongkienthuc();

        function load_danhsachhocphan_chuathem_khoiluongkienthuc() {
            let id_khung = {{$khungchuongtrinh->id}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-danh-sach-hoc-phan-chua-them-khoi-luong-kien-thuc')}}",
                method: 'GET',
                data:{id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-danh-sach-hoc-phan-chua-them-khoi-kien-thuc').html(data);
                    }   
                }
            });
        }

        $(".danh-sach-hoc-phan-chua-them-khoi-kien-thuc").on('click', 'table tbody tr.click-hocphan', function() {
            $(".click-hocphan").removeClass('active');
            $(this).addClass("active");
            $("#id-hp-dshp-chua-them-klkt").val($(this).attr('data-value'));
        });

        $('#them-khoi-luong-kien-thuc-kct').click(function() {

            let id_hocphan = $("#id-hp-dshp-chua-them-klkt").val();
            let id_khung = {{$khungchuongtrinh->id}};

            if(id_hocphan.trim().length) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/load-them-khoi-luong-kien-thuc-hoc-phan')}}",
                    method: 'GET',
                    data:{id_hocphan:id_hocphan,id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {
                            $('#list-dshp-chua-them-klkt').html(data);
                            document.getElementById("modal-danh-sach-hoc-phan-chua-them-khoi-kien-thuc").style.display = "block";
                            $("#list-dshp-chua-them-klkt select").attr("size",$("#list-dshp-chua-them-klkt select option").length);
                        }   
                    }
                });

            } else {
                alert("Vui lòng chọn học phần cần thiết lập mối quan hệ và tiếp tục !!!");
            }
        });

        $('#list-dshp-chua-them-klkt').on('click', 'select option', function() {

            let id_klkt_them = $(this).val();
            let id_hocphan = $(this).parent('select').attr('data-value');
            let id_khung = {{$khungchuongtrinh->id}};

            if(id_klkt_them) {

                $.ajax({
                    url: "{{URL::to('admin/decuong/them-khoi-luong-kien-thuc-hoc-phan')}}",
                    method: 'GET',
                    data:{id_klkt_them:id_klkt_them,id_hocphan:id_hocphan,id_khung:id_khung},
                    success: function(data) {
                        if (data != null) {
                            alert("Thêm khối lượng kiến thức học phần Thành Công !!!");
                            document.getElementById("modal-danh-sach-hoc-phan-chua-them-khoi-kien-thuc").style.display = "none";
                            load_danhsachhocphan_khoiluongkienthuc();
                            load_danhsachhocphan_chuathem_khoiluongkienthuc();
                        }   
                    }
                });
            }

        });

    

        
        
    

    });
</script>

@endsection