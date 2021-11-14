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

                        <form action="{{URL::to('admin/decuong/sua-nghien-cuu-khoa-hoc-loai-3')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="them-moi-nckh-view">
                                <input type="hidden" name="id_hoatdong_loai3" value="{{$id_hoatdong_loai3}}">
                                <input type="hidden" name="namhoc" value="{{$id_namhoc}}">
                                <input type="hidden" name="id_hoatdong" value="{{$id_hoatdong}}">
                                <fieldset>
                                    <legend>{{$tenhoatdong->tenhoatdongnghiencuu}}</legend>

                                    <table>
                                        
                                        <tr>
                                            <td>Minh chứng :</td>
                                            <td>
                                                <textarea name="minhchung" id="" cols="70" rows="7">{{$hoatdong_loai3->minhchung}}</textarea>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Hình minh chứng :</td>
                                            <td>
                                            <input style="width:100px;" type="file" class="filepond-3" name="filepond_3[]" multiple data-allow-reorder="true" data-max-file-size="8MB" data-max-files="10">
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
    //$('.filepond-3').filepond();
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
             <?php foreach ($hoatdong_loai3->show_hinhanhminhchung as $value_show_hinhanhminhchung) { ?>
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

       
</script>

@endsection