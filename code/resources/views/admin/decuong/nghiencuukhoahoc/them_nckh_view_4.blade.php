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

                        <form action="">
                            <div class="them-moi-nckh-view">

                            <fieldset>
                                    <legend>{{$tenhoatdong->tenhoatdongnghiencuu}}</legend>

                                    <table>

                                        <tr>
                                            <td>Giá trị hợp đồng :</td>
                                            <td>
                                                <input style="width:200px;" type="number" name="" id=""> <b> (Triệu đồng)</b>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Minh chứng :</td>
                                            <td>
                                                <textarea name="" id="" cols="70" rows="7"></textarea>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Hình minh chứng :</td>
                                            <td>
                                                Đính kèm file
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