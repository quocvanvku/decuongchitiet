@extends('admin_layout')
@section('admin_content')

<div class="chuong-trinh-dao-tao">
    <div class="container-fliud">

        <div class="row">
            <div class="col-md-12 nopadding">

                <p class="title-cdtdt">Chương trình đào tạo</p>

                <table class="table-danh-sach">
                    <thead> 
                        <tr>
                            <td>STT</td>
                            <td>Mã Khoa</td>
                            <td>Khoa</td>
                            <td></td>
                        </tr>
                    </thead>
                    <!-- href="URL::to('admin/chuong-trinh-dao-tao/nganh/'.$value_all_khoa->id)" -->
                    <tbody>
                        @foreach($all_khoa as $value_all_khoa)
                        <tr>
                            <td>{{$value_all_khoa->id}}</td>
                            <td></td>
                            <td>{{$value_all_khoa->tenKhoa}}</td>
                            <td>
                                <a href="<?php echo 'admin/chuong-trinh-dao-tao/nganh/'.$value_all_khoa->id; ?>" style="color:#009879;"><i class="fas fa-chevron-circle-right"></i> Xem danh sách CTĐT</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

@endsection