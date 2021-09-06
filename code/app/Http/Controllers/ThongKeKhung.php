<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ThongKeKhung extends Controller
{

    public function thongkekhung() {

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        // echo "<pre>";
        // print_r($all_khungchuongtrinh);
        // die();

        $all_decuong = DB::table('table_decuongchitiet')->get();

        foreach($all_khungchuongtrinh as $value) {

            $kct_hocphan = DB::table("table_khungchuongtrinh_hocphan")
                            ->where("id_khung", $value->id)
                            ->distinct()
                            ->count();
            $value->tongsohocphan = $kct_hocphan;


            $all_kct_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh_hocphan.id_khung', 'table_khungchuongtrinh.id')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->join('table_khoahoc', 'table_khungchuongtrinh.id_khoahoc', 'table_khoahoc.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $value->id)
                            ->orderBy('table_khungchuongtrinh_hocphan.hocky', "ASC")
                            ->orderBy('table_khungchuongtrinh_hocphan.stt', "ASC")
                            ->get();


            $all_decuong = DB::table('table_decuongchitiet')->get();

            $kct_dcct = 0;
            $kct_ltgd = 0;

            foreach($all_kct_hocphan as $value_kct_hocphan) {
                foreach($all_decuong as $value_decuong) {
                    if($value_kct_hocphan->id_khung == $value_decuong->khungchuongtrinh 
                        && $value_kct_hocphan->id_hocphan == $value_decuong->id_hocphan) {
                        $value_kct_hocphan->has_decuong = 1;  
                            $kct_dcct = $kct_dcct + 1;
                        }
                }

                $check_khgd = DB::table('table_kehoachgiangday')
                                ->where('id_hocphan', $value_kct_hocphan->id_hocphan)
                                ->where('khungchuongtrinh', $value_kct_hocphan->id_khung)
                                ->get();

                if ($check_khgd->count()) {
                    $value_kct_hocphan->has_khgd = 1;
                    $kct_ltgd = $kct_ltgd + 1;
                }

            }

            $value->hocphanthieudecuong = $kct_hocphan - $kct_dcct;
            $value->hocphanthieukhgd = $kct_hocphan - $kct_ltgd;
        }

        return view('admin.decuong.thongkekhung')
        ->with('all_khungchuongtrinh', $all_khungchuongtrinh);
    }

    public function thongkekhungchitiet($id_khungchuongtrinh) {

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $ten_khung = DB::table('table_khungchuongtrinh')->where('id', $id_khungchuongtrinh)->first()->tenkhungchuongtrinh;

        $info_kct = array();

        $kct_hocphan = DB::table("table_khungchuongtrinh_hocphan")->where("id_khung", $id_khungchuongtrinh)->distinct()->count();

        $all_kct_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh_hocphan.id_khung', 'table_khungchuongtrinh.id')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->join('table_khoahoc', 'table_khungchuongtrinh.id_khoahoc', 'table_khoahoc.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                            ->orderBy('table_khungchuongtrinh_hocphan.hocky', "ASC")
                            ->orderBy('table_khungchuongtrinh_hocphan.stt', "ASC")
                            ->get();


        $all_decuong = DB::table('table_decuongchitiet')->get();

        $kct_dcct = 0;
        $kct_ltgd = 0;

        foreach($all_kct_hocphan as $value_kct_hocphan) {
            foreach($all_decuong as $value_decuong) {
                if($value_kct_hocphan->id_khung == $value_decuong->khungchuongtrinh 
                    && $value_kct_hocphan->id_hocphan == $value_decuong->id_hocphan) {
                       $value_kct_hocphan->has_decuong = 1;  
                        $kct_dcct = $kct_dcct + 1;
                    }
            }

            $check_khgd = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $value_kct_hocphan->id_hocphan)
                            ->where('khungchuongtrinh', $value_kct_hocphan->id_khung)
                            ->get();

            if ($check_khgd->count()) {
                $value_kct_hocphan->has_khgd = 1;
                $kct_ltgd = $kct_ltgd + 1;
            }

        }

        $info_kct['tongsohocphan'] = $kct_hocphan;
        $info_kct['hocphanthieudecuong'] = $kct_hocphan - $kct_dcct;
        $info_kct['hocphanthieukhgd'] = $kct_hocphan - $kct_ltgd;

        // echo "<Pre>";
        // print_r($all_kct_hocphan);
        // die();

        return view('admin.decuong.thongkekhungchitiet')
        ->with('ten_khung', $ten_khung)
        ->with('info_kct', $info_kct)
        ->with('all_kct_hocphan', $all_kct_hocphan);


    }


    public function data_khungchuongtrinh($data, $parent_id = 0, $level = 0) {
        $result = [];

        foreach($data as $item) {
            if($item->isKhungnangcao == $parent_id) {
                $item->level = $level;
                $result[] = $item;
                $child = $this->data_khungchuongtrinh($data, $item->id, $level + 1);
                
                if($child) {
                    $item->hasChild = 1;
                    $result = array_merge($result, $child);
                }
            }
        }
        return $result;
    }

    public function test() {

        $all_hp_kct = DB::table('table_khungchuongtrinh_hocphan')
                        ->where('id_khung', 154)
                        ->get();

        // $all_hp = DB::table('table_khungchuongtrinh_hocphan')
        //                 ->where('id_khung', 155)
        //                 ->orwhere('id_khung', 156)
        //                 ->orwhere('id_khung', 157)
        //                 ->orwhere('id_khung', 158)
        //                 ->orwhere('id_khung', 159)
        //                 ->get();

        // foreach($all_hp as $value_all_hp) {

        //     foreach($all_hp_kct as $value) {
        //         if ($value_all_hp->id_hocphan == $value->id_hocphan) {
        //             $affected = DB::table('table_khungchuongtrinh_hocphan')
        //             ->where('id', $value_all_hp->id)
        //             ->update(['khoikienthuc' => $value->khoikienthuc]);
        //         }
        //     }

        // }

        

        echo "Successfull";

        // echo "<pre>";
        // print_r($all_hp);
        // die();
        
    }

}
