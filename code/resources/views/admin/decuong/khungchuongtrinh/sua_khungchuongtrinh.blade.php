@extends('admin_layout')
@section('admin_content')

<div class="sua-khung-chuong-trinh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 nopadding">

                <form action="<?php echo url('admin/decuong/sua-khung-chuong-trinh/'.$id_khung); ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="field-sua-khung-chuong-trinh">
                        <fieldset>
                            <legend>Sửa Khung chương trình</legend>

                            <table>
                                <tr>
                                    <td>Tên khung chương trình:</td>
                                    <td>
                                        <input type="text" name="input_tenkhungchuongtrinh" id="tenkhungchuongtrinh" value="{{$getkhungchuongtrinh->tenkhungchuongtrinh}}" required="" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thuộc Khoa:</td>
                                    <td>
                                        <select name="select_khoa" id="thuoc_khoa" multiple >
                                            @foreach ($all_khoa as $value_all_khoa)
                                            <option value="{{$value_all_khoa->id}}" {{ ($getkhungchuongtrinh->id_khoa == $value_all_khoa->id) ? 'selected' : '' }} >{{$value_all_khoa->tenKhoa}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thuộc Ngành:</td>
                                    <td>
                                        <select name="select_nganh" id="thuoc_nganh" multiple >
                                            @foreach ($all_nganh as $value_all_nganh)
                                            <option value="{{$value_all_nganh->id}}" {{ ($getkhungchuongtrinh->id_nganh == $value_all_nganh->id) ? 'selected' : '' }} >{{$value_all_nganh->tennganh}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trình độ đào tạo:</td>
                                    <td>
                                        <select name="select_trinhdodaotao" id="tddaotao" multiple >
                                            @foreach ($all_trinhdo as $value_all_trinhdo)
                                            <option value="{{$value_all_trinhdo->id}}" {{ ($getkhungchuongtrinh->id_trinhdo == $value_all_trinhdo->id) ? 'selected' : '' }} >{{$value_all_trinhdo->trinhdo}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hình thức đào tạo:</td>
                                    <td>
                                        <select name="select_hinhthucdaotao" id="htdaotao" multiple >
                                            @foreach ($all_hinhthuc as $value_all_hinhthuc)
                                            <option value="{{$value_all_hinhthuc->id}}" {{ ($getkhungchuongtrinh->id_htdaotao == $value_all_hinhthuc->id) ? 'selected' : '' }} >{{$value_all_hinhthuc->tenHinhThuc}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Khóa học:</td>
                                    <td>
                                        <select name="select_khoahoc" id="khoa_hoc" multiple>
                                            @foreach ($all_khoahoc as $value_all_khoahoc)
                                            <option value="{{$value_all_khoahoc->id}}" {{ ($getkhungchuongtrinh->id_khoahoc == $value_all_khoahoc->id) ? 'selected' : '' }} >{{$value_all_khoahoc->khoahoc}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thuộc CTĐT:</td>
                                    <td>
                                        <select name="select_thuocctdt" id="thuoc_ctdt" multiple>
                                            <option value="0" {{ ($getkhungchuongtrinh->isKhungnangcao == 0) ? 'selected' : '' }} >None</option>
                                            @foreach ($all_khungchuongtrinh as $value_all_khungchuongtrinh)
                                            <option value="{{$value_all_khungchuongtrinh->id}}" {{ ($getkhungchuongtrinh->isKhungnangcao == $value_all_khungchuongtrinh->id) ? 'selected' : '' }} >{{$value_all_khungchuongtrinh->tenkhungchuongtrinh}}</option>
                                            @endforeach
                                        </select> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số TC bắt buộc:</td>
                                    <td>
                                        <input type="number" name="input_sotcbatbuoc" id="sotcbatbuoc" value="{{$getkhungchuongtrinh->soTCTCbatbuoc}}" required="" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số TC tối thiểu:</td>
                                    <td>
                                        <input type="number" name="input_sotctoithieu" id="sotctoithieu" value="{{$getkhungchuongtrinh->sotctoithieu}}" required="" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Thời gian đào tạo:</td>
                                    <td>
                                        <input type="number" name="input_thoigiandaotao" id="thoigiandaotao" value="{{$getkhungchuongtrinh->thoigian}}" required="" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Năm áp dụng:</td>
                                    <td>
                                        <select name="select_namapdung" id="namapdung" multiple>
                                            @foreach ($all_namhoc_hocky as $value_all_namhoc_hocky)
                                            <option value="{{$value_all_namhoc_hocky->id}}" {{ ($getkhungchuongtrinh->id_namapdung == $value_all_namhoc_hocky->id) ? 'selected' : '' }} >{{$value_all_namhoc_hocky->nambatdau .' - '. $value_all_namhoc_hocky->namketthuc}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <center><button class="btn btn-success" type="submit" >Sửa</button></center>

                        </fieldset>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("#thuoc_khoa").attr("size",$("#thuoc_khoa option").length);
        $("#thuoc_nganh").attr("size",$("#thuoc_nganh option").length);
        $("#tddaotao").attr("size",$("#tddaotao option").length);
        $("#htdaotao").attr("size",$("#htdaotao option").length);
        $("#khoa_hoc").attr("size",$("#khoa_hoc option").length);
        $("#thuoc_ctdt").attr("size",$("#thuoc_ctdt option").length);
        $("#namapdung").attr("size",$("#namapdung option").length);
    });
</script>


@endsection