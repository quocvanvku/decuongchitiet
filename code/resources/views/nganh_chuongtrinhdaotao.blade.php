@extends('admin_layout')
@section('admin_content')

<div class="chuong-trinh-dao-tao">
    <div class="container-fliud">

        <div class="row">
            <div class="col-md-12 nopadding">

                <p class="title-cdtdt">Chương trình đào tạo thuộc: {{$name_khoa}}</p>

                <table class="table-danh-sach">
                    <thead> 
                        <tr>
                            <td>STT</td>
                            <td>Mã ngành</td>
                            <td>Tên ngành</td>
                            <td></td>
                        </tr>
                    </thead>
                        <?php $stt=1; ?>
                        @foreach($all_nganh as $value_all_nganh)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td></td>
                            <td>{{$value_all_nganh->tenkhungchuongtrinh}}</td>
                            <td>
                                <a href="<?php echo url('admin/decuong/khung-chuong-trinh/'.$value_all_nganh->id); ?>" style="color:#009879;"><i class="fas fa-chevron-circle-right"></i> Xem chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    <tbody>
                        
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

@endsection