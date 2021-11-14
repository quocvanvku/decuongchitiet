@extends('admin_layout')
@section('admin_content')

<div class="thiet-lap-quan-he-hoc-phan">
	<div class="container">

        <div class="row">
			<div class="col-md-12 nopadding body-thiet-lap-quan-he-hoc-phan">
                <div class="hoc-phan-thiet-lap">
                    <h4>Học phần cần thiết lập quan hệ</h4>
                    <table>
                        <tr>
                            <td>Mã học phần:</td>
                            <td><strong>{{$hocphanthietlap->mahocphan}}</strong></td>
                            <td style="text-align: right;">Tên học phần:</td>
                            <td><strong style="font-size:22px;line-height: 20px;">{{$hocphanthietlap->tenhocphan}}</strong></td>
                            <td>Số tín chỉ:</td>
                            <td><strong>{{$hocphanthietlap->soTC}}</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Học kỳ:</td>
                            <td><strong>{{$hocphanthietlap->hocky}}</strong></td>
                            <td>Học phần bắt buộc</td>
                            <td>
                                <input type="checkbox" name="" id="">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="hoc-phan-cung-chuong-trinh-dao-tao">
                    <h4>Các học phần trong cùng chương trình đào tạo</h4>
                    <div class="table-thiet-lap-quan-he">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="text-align: left;">Mã HP</td>
                                    <td style="text-align: left;">Tên học phần</td>
                                    <td>Số TC</td>
                                    <td>Học kỳ</td>
                                    <td>Bắt buộc</td>
                                    <td>Tích lũy</td>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach($all_hocphan_cungctdaotao as $value_all_hocphan_cungctdaotao)
                                <tr class="clicked" data-value="{{$value_all_hocphan_cungctdaotao->id_hocphan}}">
                                    <td style="text-align: left;">{{$value_all_hocphan_cungctdaotao->mahocphan}}</td>
                                    <td style="text-align: left;">{{$value_all_hocphan_cungctdaotao->tenhocphan}}</td>
                                    <td>{{$value_all_hocphan_cungctdaotao->soTC}}</td>
                                    <td>{{$value_all_hocphan_cungctdaotao->hocky}}</td>
                                    <td>
                                        <input type="checkbox" disabled name="" id="" <?php if($value_all_hocphan_cungctdaotao->tuchon == 0) {echo "checked";} ?> >
                                    </td>
                                    <td>
                                        <input type="checkbox" disabled checked name="" id="">
                                    </td> 
                                </tr>
                                @endforeach
                                <input type="hidden" name="" id="add-quan-he">
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="list-quan-he">
                    <div class="list-action-quan-he">
                        <span id="tien-quyet">Tiên quyết</span>
                        <span id="hoc-truoc">Học trước</span>
                        <span id="tuong-duong">Tương đương</span>
                        <span id="song-hanh">Song hành</span>
                        <span id="thay-the">Thay thế</span>
                        <span id="hoc-ghep">Học ghép</span>
                        <span id="huy-bo-quan-he">Hủy bỏ quan hệ</span>
                    </div>
                    
                    <h4>Các học phần có quan hệ với học phần: {{$hocphanthietlap->tenhocphan}}</h4>
                    <table class="table table-bordered table-hover table-thiet-lap-quan-he">
                        <thead>
                            <tr>
                                <td>Mã HP</td>
                                <td>Tên học phần</td>
                                <td>Số TC</td>
                                <td>Tiên quyết</td>
                                <td>Học trước</td>
                                <td>Tương đương</td>
                                <td>Song hành</td>
                                <td>Thay thế</td>
                                <td>HP ghép</td> 
                            </tr>
                        </thead> 
                        <tbody id="body-table-list-quan-he">
                            
                        </tbody>
                    </table>
                    <input type="hidden" name="" id="delete-quan-he">
                </div>
				
			</div>
		</div>

    </div>
</div>

<script>
	$(document).ready(function() {
        
        $(".clicked").click(function() {
            $(".clicked").removeClass('active');
            $(this).addClass("active");
            $("#add-quan-he").val($(this).attr('data-value'));
        });

        $("#tien-quyet").click(function() {

            let tenmoiquanhe = "tienquyet";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        $("#hoc-truoc").click(function() {

            let tenmoiquanhe = "hoctruoc";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        $("#tuong-duong").click(function() {

            let tenmoiquanhe = "tuongduong";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        $("#song-hanh").click(function() {

            let tenmoiquanhe = "songhanh";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        $("#thay-the").click(function() {

            let tenmoiquanhe = "thaythe";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        $("#hoc-ghep").click(function() {

            let tenmoiquanhe = "hocghep";
            let id_hocphan_add = $("#add-quan-he").val();

            if(id_hocphan_add.trim().length) {
                add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add)
            } else {
                alert("Vui lòng chọn học phần cần thêm mối quan hệ và tiếp tục !!!");
            }

        });

        function add_moiquanhe_hocphan(tenmoiquanhe, id_hocphan_add) {

            let id_hocphan = {{$hocphanthietlap->id_hocphan}}
            let id_khung = {{$hocphanthietlap->id_khung}}

            $.ajax({
                url: "{{URL::to('admin/decuong/add-moi-quan-he-hoc-phan')}}",
                method: 'GET',
                data:{tenmoiquanhe:tenmoiquanhe,id_hocphan:id_hocphan,id_khung:id_khung,id_hocphan_add:id_hocphan_add},
                success: function(data) {
                    if (data != null) {
                        alert(data);
                        $(".clicked").removeClass('active');
                        $("#add-quan-he").val("");
                        load_moiquanhe_hocphan();
                    }   
                }
            });
        }

        load_moiquanhe_hocphan();

        function load_moiquanhe_hocphan() {

            let id_hocphan = {{$hocphanthietlap->id_hocphan}}
            let id_khung = {{$hocphanthietlap->id_khung}}

            $.ajax({
                url: "{{URL::to('admin/decuong/load-moi-quan-he-hoc-phan')}}",
                method: 'GET',
                data:{id_hocphan:id_hocphan,id_khung:id_khung},
                success: function(data) {
                    if (data != null) {
                        $('#body-table-list-quan-he').html(data);
                    }   
                }
            });
        }

        $('#body-table-list-quan-he').on('click', 'tr', function(){
            $(".clicked-remove").removeClass('active');
            $(this).addClass("active");
            $("#delete-quan-he").val($(this).attr('data-value'));
        });

        $('#huy-bo-quan-he').click(function() {

            let chuoi_hocphan_delete = $("#delete-quan-he").val();

            let id_hocphan = {{$hocphanthietlap->id_hocphan}}
            let id_khung = {{$hocphanthietlap->id_khung}}

            if(chuoi_hocphan_delete.trim().length) {

                let xuli_chuoi = chuoi_hocphan_delete.split("_");

                let tenmoiquanhe = xuli_chuoi[0];
                let id_hocphan_delete = xuli_chuoi[1];

                $.ajax({
					url: "{{URL::to('admin/decuong/delete-moi-quan-he-hoc-phan')}}",
					method: 'GET',
					data:{tenmoiquanhe:tenmoiquanhe,id_hocphan:id_hocphan,id_khung:id_khung,id_hocphan_delete:id_hocphan_delete},
					success: function(data) {
						if (data != null) {
                            alert(data);
                            $(".clicked-remove").removeClass('active');
                            $("#delete-quan-he").val("");
                            load_moiquanhe_hocphan();
						}   
					}
				});

            } else {
                alert("Vui lòng chọn học phần cần xóa mối quan hệ và tiếp tục !!!");
            }
        });

    });
</script>


@endsection