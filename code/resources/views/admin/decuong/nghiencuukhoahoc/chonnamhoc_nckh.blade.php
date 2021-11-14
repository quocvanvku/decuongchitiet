@extends('admin_layout')
@section('admin_content')

<div class="chon-nam-hoc-nckh">
    <div class="container">
        <div class="row">
            <div class="col-md-12 nopadding">
                <div class="table-chon-nam-hoc-nckh">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td style="width:55%;">Năm học</td>
                                <td>Cấu hình</td>
                                <td>Tình trạng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @foreach ($all_namhoc as $value_all_namhoc)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    @if ($value_all_namhoc->hienhanh == 1)
                                        <td>
                                            <a href="<?php echo url('admin/decuong/nghien-cuu-khoa-hoc/'.$value_all_namhoc->id); ?>">{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
                                        </td>
                                    @else
                                        <td>
                                            <a>{{$value_all_namhoc->nambatdau.' - '.$value_all_namhoc->namketthuc}}</a>
                                        </td>
                                    @endif
                                    
                                    <td>Đã cấu hình</td>
                                    @if ($value_all_namhoc->hienhanh == 1)
                                        <td>Đang mở</td>
                                    @else
                                        <td style="color:#ea6153;">Đã đóng</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection