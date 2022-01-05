<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Ma trận liên kết giữa chuẩn đầu ra CTĐT, chỉ số PI và các Học phần</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/style.css')}}">
</head>
<body>
    
    <div class="mtlk-plo-pi-hp">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin:0;padding:0;">
                    <center><h3 style="padding-top:50px;">MA TRẬN LIÊN KẾT GIỮA CHUẨN ĐẦU RA CTĐT VÀ CHUẨN ĐẦU RA HỌC PHẦN</h3></center>

                    <table>
                        <tr>
                            <td><b>I. Thông tin chung về chương trình đào tạo (CTĐT)</b></td>
                        </tr>
                        <tr>
                            <td><b>1. Tên ngành/chương trình đào tạo (CTĐT):</b></td>
                        </tr>
                        <tr>
                            <td><b>2. Tên học phần:</b></td>
                        </tr>
                        <tr>
                            <td><b>3. Chuẩn đầu ra học phần (CLO):</b></td>
                        </tr>

                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Ký hiệu CLO</td>
                                <td>Nội dung CLO</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_clo as $value_all_clo)
                                <tr>
                                    <td>CLO {{$value_all_clo->stt}}</td>
                                    <td>{{$value_all_clo->noi_dung}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p>
                        <b>II. Ma trận thể hiện sự đóng góp của các chuẩn đầu ra học phần (CLO) vào việc đạt được các chuẩn đầu ra của CTĐT (PLO) và các chỉ số PI (Performance Indicator)</b>
                        <br> (Đánh dấu X vào ô có liên quan, riêng dòng tổng kết chung cho học phần ghi rõ mức hỗ trợ I, R, M và A)
                    </p>
                    
                    <table class="table table-bordered table-ma-tran-plo-pi-hp">
                    <thead>

                        <tr>
                            <td rowspan="4" class="align-middle">CLO</td>

                        </tr>

                        <tr>
                            <td colspan="{{$tong_pi}}" class="align-middle">PLO và chỉ số PI</td>
                        </tr>

                        <?php $stt_plo = 0; ?>
                        <tr>
                            @foreach($all_PLO as $value_all_PLO)
                                <?php $stt_plo++; ?>
                                <td colspan="{{$value_all_PLO->count_pli}}" class="align-middle">PLO {{$stt_plo}}</td>
                            @endforeach	 
                        </tr>

                        <tr>
                            @foreach($all_PI as $value_all_PI)
                                
                                @if(isset($value_all_PI->noPI))
                                    <td></td>
                                @else
                                    <td class="align-middle">PI {{$value_all_PI->sothutupi}}</td>
                                @endif

                            @endforeach	
                        </tr>

                    </thead>

                    <tbody>
                        @foreach($all_clo as $value_all_cdr)
                            <tr>
                                <td class="column-1 align-middle">CLO {{$value_all_cdr->stt}}</td>
                                @foreach($all_PI as $value_all_PI)
                                    <?php $check=0; ?>
                                    @if(isset($value_all_PI->moilienhe))

                                        @foreach($value_all_PI->moilienhe as $value1) 
                                            @if($value_all_cdr->id == $value1->id_chuandaura_monhoc) 
                                                <?php $check=1; ?>
                                                <td>{{$value1->ten_mucdo}}</td>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if($check == 0) 
                                        <td></td>
                                    @endif
                                @endforeach	
                            </tr>
                        @endforeach
                    </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</body>
</html>