@extends('admin_layout')
@section('admin_content') 

<div class="nghien-cuu-khoa-hoc">
    <div class="container">
        <div class="row">
            <div class="col-md-12 nopadding">
                <div class="top">
                    <span class="nam-hoc">2019-2020</span>   
                </div>

                <div class="tab">
                    <ul>
                        <li>
                            <a class="tablinks active" onclick="opentab(event, 'hoatdong-nckh')" >
                                <span>Hoạt động NCKH</span>
                            </a>
                        </li>
                        <li>
                            <a class="tablinks" onclick="opentab(event, 'thongke-nckh')" >
                                <span>Thống kê NCKH</span>
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
                        <a href="<?php echo url('admin/decuong/nghien-cuu-khoa-hoc'); ?>"><span class="tablinkshdnckh">NCKH của tôi</span></a>
                        <span>|</span>
                        <span class="tablinkshdnckh active">Thêm mới NCKH</span>
                    </div>

                    <div id="themmoi-nckh" class="tabhoatdongnckh active">

                        <form action="{{URL::to('admin/decuong/sua-nghien-cuu-khoa-hoc-loai-2')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="them-moi-nckh-view">
                                <input type="hidden" name="id_hoatdong_loai2" value="{{$id_hoatdong_loai2}}">
                                <input type="hidden" name="namhoc" value="{{$id_namhoc}}">
                                <input type="hidden" name="id_hoatdong" value="{{$id_hoatdong}}">
                                <fieldset>
                                    <legend>{{$tenhoatdong->tenhoatdongnghiencuu}}</legend>

                                    <table>
                                        <tr>
                                            <td>Tên sách :</td>
                                            <td>
                                                <input type="text" value="{{$hoatdong_loai2->tensach}}" name="tensach" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên (các) tác giả :</td>
                                            <td>
                                                <input type="text" id="ten-cac-tac-gia-sach">
                                                <div id="danhsachcactacgia-sach" class="show-danh-sach">

                                                </div>
                                            </td>
                                            <td>
                                                <p>Danh sách các tác giả</p>
                                                <ul id="list-danhsachcactacgia-sach" class="list-danh-sach">
                                                    @foreach ($hoatdong_loai2->id_cactacgia as $value_id_cactacgia)
                                                        <li>
                                                            <i class="fas fa-stream"></i>
                                                            <span>{{$value_id_cactacgia->chucdanh.'. '.$value_id_cactacgia->hodem." ".$value_id_cactacgia->ten}}</span>
                                                            <span id="delete-gv">Xoá</span>
                                                            <input type="hidden" name="list_id_cactacgia_sach[]" value="{{$value_id_cactacgia->id}}">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Có phải chủ biên :</td>
                                            <td>
                                                <input type="checkbox" <?php if($hoatdong_loai2->lachubien == 1) {echo "checked";} ?> name="lachubien" id="" value="1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Số chủ biên :</td>
                                            <td>
                                                <input type="number" value="{{$hoatdong_loai2->sochubien}}" name="sochubien" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Năm xuất bản :</td>
                                            <td>
                                                <input type="number" value="{{$hoatdong_loai2->namxuatban}}" name="namxuatban" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nhà xuất bản :</td>
                                            <td>
                                                <input type="text" value="{{$hoatdong_loai2->nhaxuatban}}" name="nhaxuatban" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hình minh chứng :</td>
                                            <td>
                                            <input style="width:100px;" type="file" class="filepond-sach" name="filepond_sach[]" multiple data-allow-reorder="true" data-max-file-size="8MB" data-max-files="10">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="btn btn-danger btn-sm" type="submit" value="Lưu lại">
                                            </td>
                                        </tr>
                                    </table>

                                </fieldset>

                            </div>
                        </form>


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

<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<script>
    // Register the plugin
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateType);
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    // Turn input element into a pond
    //$('.filepond-sach').filepond();
    $.fn.filepond.setDefaults({
        maxFileSize: '8MB',
        acceptedFileTypes: [
            'image/png',
            'image/jpg',
            'image/jpeg',
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
        ],
        storeAsFile: true,
        allowImagePreview: true
    });

    const inputElement = document.querySelector('input[type="file"]');

    const pond = FilePond.create(inputElement,{
        files: [
             <?php foreach ($hoatdong_loai2->show_hinhanhminhchung as $value_show_hinhanhminhchung) { ?>
            {           
                source: '<?php echo url('public/uploads/img/nghiencuukhoahoc/'.$value_show_hinhanhminhchung->link); ?>',
            },  
            <?php } ?>
        ]
    });

</script>

<script>

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

    $(document).ready(function() {

        $('#ten-cac-tac-gia-sach').keyup(function() {
			var name_gv = $(this).val();

			if (name_gv != '') {

				$.ajax({
                    url: "{{URL::to('admin/decuong/get-list-giang-vien')}}",
                    method: 'GET',
                    data:{name_gv:name_gv},
                    success: function(data) {
                        if (data != null) {
                            $('#danhsachcactacgia-sach').fadeIn();  
       						$('#danhsachcactacgia-sach').html(data);
                        }   
                    }
                });

			} else {
				$('#danhsachcactacgia-sach').fadeOut();   
			}

		});

        $('#danhsachcactacgia-sach').on('click', ' ul li', function() {
			$('#ten-cac-tac-gia-sach').val(""); 
			$('#danhsachcactacgia-sach').fadeOut(); 

			var id_gv = this.dataset.value;

			var p = document.createElement("li");

            var p0 = document.createElement("i");
            p0.setAttribute("class", "fas fa-stream");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_cactacgia_sach[]");
			p2.setAttribute("value", id_gv);

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-gv";

            p.appendChild(p0);
			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-danhsachcactacgia-sach");
			div.appendChild(p);

		});

        $('#list-danhsachcactacgia-sach').on('click', 'li span#delete-gv', function() {
			$(this).parent('li').remove();
		});

    });

       
</script>

@endsection