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
                        <a href="<?php echo url('admin/decuong/nghien-cuu-khoa-hoc/'.$id_namhoc); ?>"><span class="tablinkshdnckh">NCKH của tôi</span></a>
                        <span>|</span>
                        <span class="tablinkshdnckh active">Thêm mới NCKH</span>
                    </div>

                    <div id="themmoi-nckh" class="tabhoatdongnckh active">

                        <form action="{{URL::to('admin/decuong/them-moi-nghien-cuu-khoa-hoc-loai-1')}}" method="post" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="them-moi-nckh-view">
                                <input type="hidden" name="namhoc" value="{{$id_namhoc}}">
                                <input type="hidden" name="id_hoatdong" value="{{$id_hoatdong}}">
                                <fieldset>
                                    <legend>{{$tenhoatdong->tenhoatdongnghiencuu}}</legend>

                                    <table>
                                        <tr>
                                            <td>Tên bài báo :</td>
                                            <td>
                                                <input type="text" class="hastip" name="tenbaibao" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: Tổng quan dự án xây dựng hệ thống quy đổi điểm</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên các tác giả (nếu có) :</td>
                                            <td>
                                                <input type="text" id="ten-cac-tac-gia" class="hastip" name="tencactacgia" >
                                                <div class="vtip" style="left: 465px;">Ví dụ: Trần Nguyễn Việt Hùng; Lương Hoài Cảnh</div>
                                                <div id="danhsachcactacgia" class="show-danh-sach">

                                                </div>
                                            </td>
                                            <td>
                                                <p>Danh sách các tác giả</p>
                                                <ul id="list-danhsachcactacgia" class="list-danh-sach">

                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Năm xuất bản :</td>
                                            <td>
                                                <input type="number" class="hastip" name="namxuatban" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: 2020</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên tạp chí :</td>
                                            <td>
                                                <input type="text" class="hastip" name="tentapchi" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: Kỳ yếu Hội nghị Khoa học quốc tế</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Chỉ số ISSN :</td>
                                            <td>
                                                <input type="text" class="hastip" name="chisoissn" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: 1859-221X</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Loại :</td>
                                            <td>
                                                <input type="text" class="hastip" name="loai" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: T/C</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cơ quan xuất bản :</td>
                                            <td>
                                                <input type="text" class="hastip" name="coquanxuatban" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: Viện Hàn lâm KH và CN Việt Nam số 87</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thuộc trang :</td>
                                            <td>
                                                <input type="text" class="hastip" name="thuoctrang" required="">
                                                <div class="vtip" style="left: 465px;">Ví dụ: Trang 13-14</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hình minh chứng :</td>
                                            <td>
                                                <input style="width:100px;" type="file" class="filepond" name="filepond[]" multiple data-allow-reorder="true" data-max-file-size="8MB" data-max-files="10">
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
    $('.filepond').filepond();
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
</script>

<script>

    $('.vtip').hide();
    // $(".hastip").focus(function () {
    //     $('.vtip').hide();   
    //     $(this).next().show();
    // });

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

        $('#ten-cac-tac-gia').keyup(function() {
			var name_gv = $(this).val();

			if (name_gv != '') {

				$.ajax({
                    url: "{{URL::to('admin/decuong/get-list-giang-vien')}}",
                    method: 'GET',
                    data:{name_gv:name_gv},
                    success: function(data) {
                        if (data != null) {
                            $('#danhsachcactacgia').fadeIn();  
       						$('#danhsachcactacgia').html(data);
                        }   
                    }
                });

			} else {
				$('#danhsachcactacgia').fadeOut();   
			}
		});

        $('#danhsachcactacgia').on('click', ' ul li', function() {
			$('#ten-cac-tac-gia').val(""); 
			$('#danhsachcactacgia').fadeOut(); 

			var id_gv = this.dataset.value;

			var p = document.createElement("li");

            var p0 = document.createElement("i");
            p0.setAttribute("class", "fas fa-stream");

			var p1 = document.createElement("span");
			var node = document.createTextNode($(this).text());
			p1.appendChild(node);

			p2 = document.createElement("input");
			p2.setAttribute("type", "hidden");
			p2.setAttribute("name", "list_id_cactacgia[]");
			p2.setAttribute("value", id_gv);

			var p3 = document.createElement("span")
			var node1 = document.createTextNode("Xoá");
			p3.appendChild(node1);
			p3.id = "delete-gv";

            p.appendChild(p0);
			p.appendChild(p1);
			p.appendChild(p3);
			p.appendChild(p2);

			var div = document.getElementById("list-danhsachcactacgia");
			div.appendChild(p);

		});

        $('#list-danhsachcactacgia').on('click', 'li span#delete-gv', function() {
			$(this).parent('li').remove();
		});

    });

    

       


</script>

@endsection