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
                    <center><h3 style="padding-top:50px;">MA TRẬN LIÊN KẾT GIỮA CHUẨN ĐẦU RA CTĐT, CHỈ SỐ PI VÀ CÁC HỌC PHẦN</h3></center>

                    <table>
                        <tr>
                            <td><b>I. Thông tin chung về chương trình đào tạo (CTĐT)</b></td>
                        </tr>
                        <tr>
                            <td><b>1. Đơn vị đào tạo:</b></td>
                        </tr>
                        <tr>
                            <td><b>2. CTĐT:</b></td>
                        </tr>
                        <tr>
                            <td><b>3. Trình độ:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <b>II. Ma trận thể hiện sự đóng góp của các học phần vào việc đạt được các chuẩn đầu ra của CTĐT (PLO) và các chỉ số PI (Performance Indicator)</b>
                                <br> <i>(Điền một trong các mức I,  R, M hoặc chừa trống (nếu không có sự liên hệ) và điền A vào ô tương ứng)</i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b><u>Mức độ đóng góp, hỗ trợ của học phần đối với PLO/PI được xác định cụ thể như sau: </u></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i><b>I (Introduced)</b> - Học phần có hỗ trợ đạt được PLO và ở mức giới thiệu/bắt đầu.</i>
                                <br> <i><b>R (Reinforced)</b> - Học phần có hỗ trợ đạt được PLO và ở mức nâng cao hơn mức bắt đầu. Ở các học phần này, người học có nhiều cơ hội được thực hành, thí nghiệm, thực tế,…</i>
                                <br> <i><b>M (Mastery)</b> - Học phần hỗ trợ mạnh mẽ người học trong việc thuần thục/thành thạo hay đạt được PLO. Nếu người học hoàn thành tốt học phần này thì xem như người học đã ở mức thuần thục/thành thạo một nội hàm quan trọng của PLO (còn gọi là chỉ số PI - Performance Indicator) hoặc thậm chí thuần thục/thành thạo cả PLO đó.</i>
                                <br> <i><b>A (Assessed)</b> - Học phần quan trọng (hỗ trợ tối đa việc đạt được các PLO/PI) cần được thu thập dữ liệu/minh chứng để đo lường đánh giá mức độ người học đạt được PLO/PI.</i>
                            </td>
                        </tr>

                    </table>

                    <table class="table table-bordered table-ma-tran-plo-pi-hp">
                        <thead>
                            <tr>
                                <td rowspan="3">TT</td>
                                <td rowspan="3">Học kỳ</td>
                                <td rowspan="3">Khoa phụ trách</td>
                                <td rowspan="3">Mã học phần</td>
                                <td rowspan="3">Tên học phần</td>
                                <td rowspan="3">Số tín chỉ</td>

                                <td colspan="{{$tong_pi}}" class="align-middle">PLO và chỉ số PI</td>

                                <td rowspan="3">Nhóm</td> 
                                <td rowspan="3">Số lượng mức A/HP</td>
                                <td rowspan="3">Số lượng mức I/HP</td>
                                <td rowspan="3">Số lượng mức R/HP</td>
                                <td rowspan="3">Số lượng mức M/HP</td>

                            </tr>

                            <tr>
                            <?php $stt_plo = 1; ?>
                                @foreach($all_PLO as $value_all_PLO)
                                    <td colspan="{{$value_all_PLO->count_pli}}" class="align-middle">PLO {{$stt_plo++}}</td>
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
                            <?php $stt_hp=1; ?>
                            @foreach ($all_hocphan as $value_all_hocphan)
                                <tr>
                                    <td>{{$stt_hp++}}</td>
                                    <td>{{$value_all_hocphan->hocky}}</td>
                                    <td></td>
                                    <td>{{$value_all_hocphan->mahocphan}}</td>
                                    <td style="text-align: left;" >{{$value_all_hocphan->tenhocphan}}</td>
                                    <td>{{$value_all_hocphan->soTC}}</td>

                                    @foreach($all_PI as $value_all_PI)
                                    
                                        @if(isset($value_all_PI->noPI))
                                            <td></td>
                                        @else

                                            <?php $check = 0; ?>

                                            <?php $abc = ''; ?>

                                            @foreach ($all_moilienhe as $value_all_moilienhe)
                                                @if ($value_all_moilienhe->id_hocphan == $value_all_hocphan->id_hocphan
                                                && $value_all_moilienhe->id_chuandaura_chung_chitiet == $value_all_PI->id_cdr_chitiet)
                                                    <?php $check = 1; ?>
                                                    <?php $abc .= $value_all_moilienhe->ten_mucdo.' '; ?>
                                                @endif
                                            @endforeach

                                            @if ($check == 1)
                                                <td>
                                                    <?php echo $abc; ?>
                                                </td>
                                            @else
                                                <td></td>    
                                            @endif

                                        @endif

                                    @endforeach	


                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                </tr>
                            @endforeach


                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: left;"><b>Tổng số TC</b></td>
                                <td><b>{{$tongso_TC}}</b></td>

                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle"></td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td colspan="6">
                                    <b>Tổng hợp số lượng học phần theo các mức độ đóng góp</b> (không tính đến HP tự chọn)
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle"></td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: right;">
                                    <b>Mức I</b>
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle">0</td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: right;">
                                    <b>Mức R</b>
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle">0</td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: right;">
                                    <b>Mức M</b>
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle">0</td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: right;">
                                    <b>Học phần A</b>
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle">0</td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" style="text-align: right;">
                                    <b>Số lượng HP có hỗ trợ đạt được PLO/PI</b>
                                </td>
                                @foreach($all_PI as $value_all_PI)
                                    @if(isset($value_all_PI->noPI))
                                        <td></td>
                                    @else
                                        <td class="align-middle">0</td>
                                    @endif
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</body>
</html>