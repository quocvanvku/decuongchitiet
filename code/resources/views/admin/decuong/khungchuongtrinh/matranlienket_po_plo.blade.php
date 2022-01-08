<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Ma trận liên kết giữa mục tiêu và chuẩn đầu ra CTĐT</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('./public/Css/style.css')}}">
</head>
<body>
    
    <div class="mtlk-plo-pi-hp">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin:0;padding:0;">
                    <center><h3 style="padding-top:50px;">MA TRẬN LIÊN KẾT GIỮA MỤC TIÊU VÀ CHUẨN ĐẦU RA CTĐT</h3></center>

                    
                    <table class="table table-bordered table-ma-tran-plo-pi-hp">
                    <thead>

                        <tr>
                            <td rowspan="4" class="align-middle">Mục tiêu của CTĐT (POs)</td>

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

                        @foreach($all_po as $value_all_po)
                            <tr>
                                <td class="column-1 align-middle">PO {{$value_all_po->ten_po}}</td>
                                @foreach($all_PI as $value_all_PI)
                                    
                                    @if(!isset($value_all_PI->noPI))

                                        <?php $check=0; ?>

                                        @if(isset($value_all_po->list_moilienhe))

                                            @foreach($value_all_po->list_moilienhe as $value1) 
                                                @if($value_all_PI->id_cdr_chung == $value1->id_plo) 
                                                    <?php $check=1; ?>
                                                    <td>x</td>
                                                @endif
                                            @endforeach

                                        @endif

                                        @if($check == 0) 
                                            <td></td>
                                        @endif

                                    @else
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