<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \stdClass;

class ThietLapQuanHeHocPhan extends Controller
{
    public function getThietLapMoiQuanHe($id_khung, $id_hocphan) {

        $hocphanthietlap = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->where('table_khungchuongtrinh_hocphan.id_hocphan', $id_hocphan)
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
                            ->first();

        $all_hocphan_cungctdaotao = DB::table('table_khungchuongtrinh_hocphan')
                                    ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                    ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
                                    ->where('table_khungchuongtrinh_hocphan.id_hocphan', '!=', $id_hocphan)
                                    ->orderBy('table_khungchuongtrinh_hocphan.hocky', 'ASC')
                                    ->get();

        // echo "<pre>";
        // print_r($all_hocphan_cungctdaotao);
        // die();

        

        return view('admin.decuong.quanlychuongtrinhdaotao.thietlapquanhehocphan')
                ->with('hocphanthietlap', $hocphanthietlap)
                ->with('all_hocphan_cungctdaotao', $all_hocphan_cungctdaotao);
    }
}
