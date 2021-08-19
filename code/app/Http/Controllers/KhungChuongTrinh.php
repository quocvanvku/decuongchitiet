<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KhungChuongTrinh extends Controller
{
    public function chuongtrinhdaotao_layout() {

        $all_khoa = DB::table("table_khoa")->get();

        return view('chuongtrinhdaotao')->with('all_khoa', $all_khoa);
    }

    public function nganh_chuongtrinhdaotao($id_khoa) {

        $khoa = DB::table("table_khoa")->where('id', $id_khoa)->first();

        if ($khoa) {
            $name_khoa = $khoa->tenKhoa;
        }

        $all_nganh = DB::table('table_khungchuongtrinh')->where('id_khoa', $id_khoa)->get();

        return view('nganh_chuongtrinhdaotao')
                ->with('name_khoa', $name_khoa)
                ->with('all_nganh', $all_nganh);
    }
}
