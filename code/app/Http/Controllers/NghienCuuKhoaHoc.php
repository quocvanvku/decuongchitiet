<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\nghiencuukhoahocloai1;
use App\Models\nghiencuukhoahocloai2;
use App\Models\nghiencuukhoahocloai3;
use DB;
use Redirect;
use \stdClass;


class NghienCuuKhoaHoc extends Controller
{
    public function index($id_namhoc) {

        $id_tacgia = 23;                                                    

        $all_hoatdong_nckh = DB::table('table_nghiencuukhoahoc_hoatdong')
                                ->where('namhoc', $id_namhoc)
                                ->get();

        $namhoc_dangchon = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->where('id', $id_namhoc)
                        ->DISTINCT()
                        ->first();

        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();

        foreach($all_hoatdong_nckh as $value_all_hoatdong_nckh) {

            $all_ht_cuatoi_loai1 = DB::table('table_nghiencuukhoahoc_loai1')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai1 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai1;
            }

            $all_ht_cuatoi_loai2 = DB::table('table_nghiencuukhoahoc_loai2')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai2 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai2;
            }

            $all_ht_cuatoi_loai3 = DB::table('table_nghiencuukhoahoc_loai3')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai3 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai3;
            }

        }

        $all_hoatdong_cuatoi_view1 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai1', 'table_nghiencuukhoahoc_loai1.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai1.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai1.id_tacgia', $id_tacgia)
                                    ->get();

        $all_hoatdong_cuatoi_view2 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai2', 'table_nghiencuukhoahoc_loai2.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai2.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai2.id_tacgia', $id_tacgia)
                                    ->get();


        $all_hoatdong_cuatoi_view3 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai3', 'table_nghiencuukhoahoc_loai3.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai3.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai3.id_tacgia', $id_tacgia)
                                    ->get();

        foreach($all_hoatdong_cuatoi_view1 as $value_all_hoatdong_cuatoi_view1) {
            $list_cactacgia = [];
            $sotacgia = 0;

            $tacgia_chinh = DB::table('table_giangvien')->where('id', $value_all_hoatdong_cuatoi_view1->id_tacgia)->first();
            $list_cactacgia[] = $tacgia_chinh;
            $sotacgia += 1;

            if(isset($value_all_hoatdong_cuatoi_view1->id_cactacgia) && $value_all_hoatdong_cuatoi_view1->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view1->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }

            }
            
            $value_all_hoatdong_cuatoi_view1->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view1->sotacgia = $sotacgia;

            // $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view1->hinhanhminhchung);   
            // $value_all_hoatdong_cuatoi_view1->hinhanhminhchung = $list_hinhanhminhchung;

            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view1->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view1->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view1->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view1->giokhoahoc*($value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia);
            $value_all_hoatdong_cuatoi_view1->thanhgionckh = $thanhgionckh;

        }

        foreach($all_hoatdong_cuatoi_view2 as $value_all_hoatdong_cuatoi_view2) {

            $list_cactacgia = [];
            $sotacgia = 0;

            $tacgia_chinh = DB::table('table_giangvien')->where('id', $value_all_hoatdong_cuatoi_view2->id_tacgia)->first();
            $list_cactacgia[] = $tacgia_chinh;
            $sotacgia += 1;

            if(isset($value_all_hoatdong_cuatoi_view2->id_cactacgia) && $value_all_hoatdong_cuatoi_view2->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view2->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }
            }
            $value_all_hoatdong_cuatoi_view2->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view2->sotacgia = $sotacgia;

            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view2->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view2->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view2->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view2->giokhoahoc*($value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia);
            $value_all_hoatdong_cuatoi_view2->thanhgionckh = $thanhgionckh;
                   
        }

        foreach($all_hoatdong_cuatoi_view3 as $value_all_hoatdong_cuatoi_view3) {
            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view3->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view3->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $thanhgionckh = $value_all_hoatdong_cuatoi_view3->giokhoahoc*$value_all_hoatdong_cuatoi_view3->diemcongtrinh;
            $value_all_hoatdong_cuatoi_view3->thanhgionckh = $thanhgionckh;
                   
        }

        $counttongsogio = 0;

        foreach($all_hoatdong_nckh as $value_them_tongsogio) {

            if(isset($value_them_tongsogio->count_sub)) {

                if($value_them_tongsogio->loai_hoatdong == 1) {

                    $tongsogio_view1 = 0;
                    $tongsodiem_view1 = 0;

                    foreach($all_hoatdong_cuatoi_view1 as $value_view1_them_tongsogio) {
                        if($value_view1_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view1 += $value_view1_them_tongsogio->thanhgionckh;
                            $tongsodiem_view1 += $value_view1_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view1;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view1;

                    $counttongsogio += $tongsogio_view1;

                }

                if($value_them_tongsogio->loai_hoatdong == 2) {

                    $tongsogio_view2 = 0;
                    $tongsodiem_view2 = 0;

                    foreach($all_hoatdong_cuatoi_view2 as $value_view2_them_tongsogio) {
                        if($value_view2_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view2 += $value_view2_them_tongsogio->thanhgionckh;
                            $tongsodiem_view2 += $value_view2_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view2;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view2;

                    $counttongsogio += $tongsogio_view2;

                }

                if($value_them_tongsogio->loai_hoatdong == 3) {

                    $tongsogio_view3 = 0;
                    $tongsodiem_view3 = 0;

                    foreach($all_hoatdong_cuatoi_view3 as $value_view3_them_tongsogio) {
                        if($value_view3_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view3 += $value_view3_them_tongsogio->thanhgionckh;
                            $tongsodiem_view3 += $value_view3_them_tongsogio->diemcongtrinh;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view3;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view3;

                    $counttongsogio += $tongsogio_view3;

                }

            }
        }

        // echo "<pre>";
        // print_r($all_hoatdong_nckh);
        // die();

        return view('admin.decuong.nghiencuukhoahoc.danhmuc_nckh')
                ->with('all_hoatdong_nckh', $all_hoatdong_nckh)
                ->with('namhoc_dangchon', $namhoc_dangchon)
                ->with('all_namhoc', $all_namhoc)
                ->with('id_namhoc', $id_namhoc)
                ->with('id_tacgia', $id_tacgia)
                ->with('all_hoatdong_cuatoi_view1', $all_hoatdong_cuatoi_view1)
                ->with('all_hoatdong_cuatoi_view2', $all_hoatdong_cuatoi_view2)
                ->with('all_hoatdong_cuatoi_view3', $all_hoatdong_cuatoi_view3)
                ->with('counttongsogio', $counttongsogio);
    
    }

    public function ChonNamHocNckh() {

        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();
        
        return view('admin.decuong.nghiencuukhoahoc.chonnamhoc_nckh')
                ->with('all_namhoc', $all_namhoc);
    }

    public function getListGiangVien(Request $request) {
        if ($request->ajax()) {

            $giangvien = $request->name_gv;

            $all_gv = DB::table('table_giangvien')
                    ->where('hodem', 'LIKE', "%{$giangvien}%")
                    ->orwhere('ten', 'LIKE', "%{$giangvien}%")
                    ->limit(7)->get();

            $output = '<ul>';
            foreach($all_gv as $value_all_gv) {   
                $output .= '<li data-value="'.$value_all_gv->id.'">'.$value_all_gv->chucdanh.". ".$value_all_gv->hodem." ".$value_all_gv->ten.'</li>';
            }
            $output .= '</ul>';
            echo $output;

        }
       
    }

    public function getThemDeTaiNghienCuuKhoaHoc($view, $id_hoatdong, $id_namhoc) {

        $tenhoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->where('id', $id_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->first();
        
        if($view == 1) {
            return view('admin.decuong.nghiencuukhoahoc.them_nckh_view_1')
                    ->with('tenhoatdong', $tenhoatdong)
                    ->with('id_hoatdong', $id_hoatdong)
                    ->with('id_namhoc', $id_namhoc);
        } elseif($view == 2) {
            return view('admin.decuong.nghiencuukhoahoc.them_nckh_view_2')
                    ->with('tenhoatdong', $tenhoatdong)
                    ->with('id_hoatdong', $id_hoatdong)
                    ->with('id_namhoc', $id_namhoc);
        } elseif($view == 3) {
            return view('admin.decuong.nghiencuukhoahoc.them_nckh_view_3')
                    ->with('tenhoatdong', $tenhoatdong)
                    ->with('id_hoatdong', $id_hoatdong)
                    ->with('id_namhoc', $id_namhoc);
        }
        elseif($view == 4) {
            return view('admin.decuong.nghiencuukhoahoc.them_nckh_view_4')
                    ->with('tenhoatdong', $tenhoatdong)
                    ->with('id_hoatdong', $id_hoatdong)
                    ->with('id_namhoc', $id_namhoc);
        }

    }

    public function postThemDeTaiNCKHLoai1(Request $request) {

        $tenbaibao = $request->tenbaibao;
        $namxuatban = $request->namxuatban;
        $tentapchi = $request->tentapchi;
        $chisoissn = $request->chisoissn;
        $loai = $request->loai;
        $coquanxuatban = $request->coquanxuatban;
        $thuoctrang = $request->thuoctrang;
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;

        $id_cactacgia = '';
        $list_tacgia = $request->list_id_cactacgia;

        if(isset($list_tacgia) && $list_tacgia != null) {
            foreach ($list_tacgia as $value_list_tacgia) {
                $id_cactacgia .= $value_list_tacgia."_";
            }
            $id_cactacgia = rtrim($id_cactacgia, '_');
        }

        $hinhanhminhchung = '';

        $files = $request->file('filepond');

        if($request->hasFile('filepond')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }
 
        $detai_nckh_loai1 = new nghiencuukhoahocloai1;
        $detai_nckh_loai1->tenbaibao = $tenbaibao;
        $detai_nckh_loai1->id_cactacgia = $id_cactacgia;
        $detai_nckh_loai1->namxuatban = $namxuatban;
        $detai_nckh_loai1->tentapchi = $tentapchi;
        $detai_nckh_loai1->chiso_issn = $chisoissn;
        $detai_nckh_loai1->loai = $loai;
        $detai_nckh_loai1->coquanxuatban = $coquanxuatban;
        $detai_nckh_loai1->thuoctrang = $thuoctrang;
        $detai_nckh_loai1->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai1->trangthaiduyet = 0;
        $detai_nckh_loai1->namhoc = $namhoc;
        $detai_nckh_loai1->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai1->id_tacgia = 0;

        $detai_nckh_loai1->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
        
    }

    public function postThemDeTaiNCKHLoai2(Request $request) {
        $tensach = $request->tensach;
        $sochubien = $request->sochubien;
        $namxuatban = $request->namxuatban;
        $nhaxuatban = $request->nhaxuatban;
       
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;

        $lachubien = 0;
        if(isset($request->lachubien)) {
            if($request->lachubien == 1) {
                $lachubien = 1;
            }
        }

        $id_cactacgia = '';
        $list_tacgia = $request->list_id_cactacgia_sach;

        if(isset($list_tacgia) && $list_tacgia != null) {
            foreach ($list_tacgia as $value_list_tacgia) {
                $id_cactacgia .= $value_list_tacgia."_";
            }
            $id_cactacgia = rtrim($id_cactacgia, '_');
        }

        $hinhanhminhchung = '';

        $files = $request->file('filepond_sach');

        if($request->hasFile('filepond_sach')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }

        $detai_nckh_loai2 = new nghiencuukhoahocloai2;
        $detai_nckh_loai2->tensach = $tensach;
        $detai_nckh_loai2->id_cactacgia = $id_cactacgia;
        $detai_nckh_loai2->lachubien = $lachubien;
        $detai_nckh_loai2->sochubien = $sochubien;
        $detai_nckh_loai2->namxuatban = $namxuatban;
        $detai_nckh_loai2->nhaxuatban = $nhaxuatban;
        $detai_nckh_loai2->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai2->trangthaiduyet = 0;
        $detai_nckh_loai2->namhoc = $namhoc;
        $detai_nckh_loai2->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai2->id_tacgia = 0;

        $detai_nckh_loai2->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
    }

    public function postThemDeTaiNCKHLoai3(Request $request) {
        $minhchung = $request->minhchung;
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;
        
        $hinhanhminhchung = '';
        $files = $request->file('filepond_3');

        if($request->hasFile('filepond_3')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }

        $detai_nckh_loai3 = new nghiencuukhoahocloai3;
        $detai_nckh_loai3->minhchung = $minhchung;
        $detai_nckh_loai3->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai3->trangthaiduyet = 0;
        $detai_nckh_loai3->namhoc = $namhoc;
        $detai_nckh_loai3->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai3->id_tacgia = 0;

        $detai_nckh_loai3->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
    }

    public function getSuaDeTaiNCKHLoai1($id_hoatdong_loai1, $id_namhoc) {

        $hoatdong_loai1 = DB::table('table_nghiencuukhoahoc_loai1')
                            ->where('id', $id_hoatdong_loai1)
                            ->first();

        $tenhoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->where('id', $hoatdong_loai1->id_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->first();

        $list_cactacgia = [];
        if(isset($hoatdong_loai1->id_cactacgia) && $hoatdong_loai1->id_cactacgia != null) {
            $id_ctg = explode("_", $hoatdong_loai1->id_cactacgia);            
            foreach ($id_ctg as $value) {
                $tg = DB::table('table_giangvien')->where('id', $value)->first();
                $list_cactacgia[] = $tg;
            }
        }
        $hoatdong_loai1->id_cactacgia = $list_cactacgia;

        $list_hinhanhminhchung = explode("|", $hoatdong_loai1->hinhanhminhchung);  
        foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
            if(!empty($value_list_hinhanhminhchung)) {
                $hinhanhminhchung = new stdClass;
                $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                $xuly = explode('.', $value_list_hinhanhminhchung);
                $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                $hoatdong_loai1->show_hinhanhminhchung[] = $hinhanhminhchung;
            }
        }
        

        // echo "<pre>";
        // print_r($hoatdong_loai1);
        // die();
        
        return view('admin.decuong.nghiencuukhoahoc.sua_nckh_view_1')
                ->with('tenhoatdong', $tenhoatdong)
                ->with('id_hoatdong', $hoatdong_loai1->id_hoatdong)
                ->with('id_namhoc', $id_namhoc)
                ->with('hoatdong_loai1', $hoatdong_loai1)
                ->with('id_hoatdong_loai1', $id_hoatdong_loai1);

    }

    public function PostSuaDeTaiNCKHLoai1(Request $request) {
        $tenbaibao = $request->tenbaibao;
        $namxuatban = $request->namxuatban;
        $tentapchi = $request->tentapchi;
        $chisoissn = $request->chisoissn;
        $loai = $request->loai;
        $coquanxuatban = $request->coquanxuatban;
        $thuoctrang = $request->thuoctrang;
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;

        $id_cactacgia = '';
        $list_tacgia = $request->list_id_cactacgia;

        if(isset($list_tacgia) && $list_tacgia != null) {
            foreach ($list_tacgia as $value_list_tacgia) {
                $id_cactacgia .= $value_list_tacgia."_";
            }
            $id_cactacgia = rtrim($id_cactacgia, '_');
        }

        $hinhanhminhchung = '';

        $files = $request->file('filepond');

        if($request->hasFile('filepond')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }

        $detai_nckh_loai1 = nghiencuukhoahocloai1::find($request->id_hoatdong_loai1);
        $detai_nckh_loai1->tenbaibao = $tenbaibao;
        $detai_nckh_loai1->id_cactacgia = $id_cactacgia;
        $detai_nckh_loai1->namxuatban = $namxuatban;
        $detai_nckh_loai1->tentapchi = $tentapchi;
        $detai_nckh_loai1->chiso_issn = $chisoissn;
        $detai_nckh_loai1->loai = $loai;
        $detai_nckh_loai1->coquanxuatban = $coquanxuatban;
        $detai_nckh_loai1->thuoctrang = $thuoctrang;
        $detai_nckh_loai1->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai1->trangthaiduyet = 0;
        $detai_nckh_loai1->namhoc = $namhoc;
        $detai_nckh_loai1->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai1->id_tacgia = 0;

        $detai_nckh_loai1->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
    }

    public function getSuaDeTaiNCKHLoai2($id_hoatdong_loai2, $id_namhoc) {

        $hoatdong_loai2 = DB::table('table_nghiencuukhoahoc_loai2')
                            ->where('id', $id_hoatdong_loai2)
                            ->first();

        $tenhoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->where('id', $hoatdong_loai2->id_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->first();

        $list_cactacgia = [];
        if(isset($hoatdong_loai2->id_cactacgia) && $hoatdong_loai2->id_cactacgia != null) {
            $id_ctg = explode("_", $hoatdong_loai2->id_cactacgia);            
            foreach ($id_ctg as $value) {
                $tg = DB::table('table_giangvien')->where('id', $value)->first();
                $list_cactacgia[] = $tg;
            }
        }
        $hoatdong_loai2->id_cactacgia = $list_cactacgia;

        $list_hinhanhminhchung = explode("|", $hoatdong_loai2->hinhanhminhchung);  
        foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
            if(!empty($value_list_hinhanhminhchung)) {
                $hinhanhminhchung = new stdClass;
                $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                $xuly = explode('.', $value_list_hinhanhminhchung);
                $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                $hoatdong_loai2->show_hinhanhminhchung[] = $hinhanhminhchung;
            }
        }
        

        // echo "<pre>";
        // print_r($hoatdong_loai2);
        // die();
        
        return view('admin.decuong.nghiencuukhoahoc.sua_nckh_view_2')
                ->with('tenhoatdong', $tenhoatdong)
                ->with('id_hoatdong', $hoatdong_loai2->id_hoatdong)
                ->with('id_namhoc', $id_namhoc)
                ->with('hoatdong_loai2', $hoatdong_loai2)
                ->with('id_hoatdong_loai2', $id_hoatdong_loai2);
    }

    public function PostSuaDeTaiNCKHLoai2(Request $request) {
        $tensach = $request->tensach;
        $sochubien = $request->sochubien;
        $namxuatban = $request->namxuatban;
        $nhaxuatban = $request->nhaxuatban;
       
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;

        $lachubien = 0;
        if(isset($request->lachubien)) {
            if($request->lachubien == 1) {
                $lachubien = 1;
            }
        }

        $id_cactacgia = '';
        $list_tacgia = $request->list_id_cactacgia_sach;

        if(isset($list_tacgia) && $list_tacgia != null) {
            foreach ($list_tacgia as $value_list_tacgia) {
                $id_cactacgia .= $value_list_tacgia."_";
            }
            $id_cactacgia = rtrim($id_cactacgia, '_');
        }

        $hinhanhminhchung = '';

        $files = $request->file('filepond_sach');

        if($request->hasFile('filepond_sach')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }

        $detai_nckh_loai2 = nghiencuukhoahocloai2::find($request->id_hoatdong_loai2);
        $detai_nckh_loai2->tensach = $tensach;
        $detai_nckh_loai2->id_cactacgia = $id_cactacgia;
        $detai_nckh_loai2->lachubien = $lachubien;
        $detai_nckh_loai2->sochubien = $sochubien;
        $detai_nckh_loai2->namxuatban = $namxuatban;
        $detai_nckh_loai2->nhaxuatban = $nhaxuatban;
        $detai_nckh_loai2->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai2->trangthaiduyet = 0;
        $detai_nckh_loai2->namhoc = $namhoc;
        $detai_nckh_loai2->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai2->id_tacgia = 0;

        $detai_nckh_loai2->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
    }

    public function getSuaDeTaiNCKHLoai3($id_hoatdong_loai3, $id_namhoc) {

        $hoatdong_loai3 = DB::table('table_nghiencuukhoahoc_loai3')
                            ->where('id', $id_hoatdong_loai3)
                            ->first();

        $tenhoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->where('id', $hoatdong_loai3->id_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->first();

        $list_hinhanhminhchung = explode("|", $hoatdong_loai3->hinhanhminhchung);  
        foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
            if(!empty($value_list_hinhanhminhchung)) {
                $hinhanhminhchung = new stdClass;
                $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                $xuly = explode('.', $value_list_hinhanhminhchung);
                $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                $hoatdong_loai3->show_hinhanhminhchung[] = $hinhanhminhchung;
            }
        }

        // echo "<pre>";
        // print_r($hoatdong_loai3);
        // die();
        
        return view('admin.decuong.nghiencuukhoahoc.sua_nckh_view_3')
                ->with('tenhoatdong', $tenhoatdong)
                ->with('id_hoatdong', $hoatdong_loai3->id_hoatdong)
                ->with('id_namhoc', $id_namhoc)
                ->with('hoatdong_loai3', $hoatdong_loai3)
                ->with('id_hoatdong_loai3', $id_hoatdong_loai3);

    }

    public function PostSuaDeTaiNCKHLoai3(Request $request) {
        $minhchung = $request->minhchung;
        $namhoc = $request->namhoc;
        $id_hoatdong = $request->id_hoatdong;
        
        $hinhanhminhchung = '';
        $files = $request->file('filepond_3');

        if($request->hasFile('filepond_3')) {
            foreach ($files as $file) {
                $timestamp = time();
                $name = date('d', $timestamp).'_'.date('m', $timestamp).'_'.date('y', $timestamp).'_'.rand(0,99).'_'.$file->getClientOriginalName();
                $file->move('./public/uploads/img/nghiencuukhoahoc', $name);

                $hinhanhminhchung .= $name.'|';
            }
            $hinhanhminhchung = rtrim($hinhanhminhchung, '|');
        }

        $detai_nckh_loai3 = nghiencuukhoahocloai3::find($request->id_hoatdong_loai3);
        $detai_nckh_loai3->minhchung = $minhchung;
        $detai_nckh_loai3->hinhanhminhchung = $hinhanhminhchung;
        $detai_nckh_loai3->trangthaiduyet = 0;
        $detai_nckh_loai3->namhoc = $namhoc;
        $detai_nckh_loai3->id_hoatdong = $id_hoatdong;

        $detai_nckh_loai3->id_tacgia = 0;

        $detai_nckh_loai3->save();

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$namhoc);
    }

    public function getXoaDeTaiNCKH($loai_hoatdong, $id_hoatdong, $id_namhoc) {

        if($loai_hoatdong == 1) {
            $nckh_loai1 = DB::table('table_nghiencuukhoahoc_loai1')
                            ->where('id', $id_hoatdong)
                            ->where('namhoc', $id_namhoc)
                            ->delete();
        }

        if($loai_hoatdong == 2) {
            $nckh_loai2 = DB::table('table_nghiencuukhoahoc_loai2')
                            ->where('id', $id_hoatdong)
                            ->where('namhoc', $id_namhoc)
                            ->delete();
        }

        if($loai_hoatdong == 3) {
            $nckh_loai3 = DB::table('table_nghiencuukhoahoc_loai3')
                            ->where('id', $id_hoatdong)
                            ->where('namhoc', $id_namhoc)
                            ->delete();
        }

        return Redirect::to('/admin/decuong/nghien-cuu-khoa-hoc/'.$id_namhoc);

    }

    public function ChonNamHocQuanLyHoatDongNckh() {
        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();
        
        return view('admin.decuong.nghiencuukhoahoc.chonnamhoc_quanlyhoatdong_nckh')
                ->with('all_namhoc', $all_namhoc);
    }

    public function QuanLyHoatDongNghienCuuKhoaHoc($id_namhoc) {

        $namhoc_dangchon = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->where('id', $id_namhoc)
                        ->DISTINCT()
                        ->first();

        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();

        return view('admin.decuong.nghiencuukhoahoc.quanlyhoatdong_nckh')
                ->with('namhoc_dangchon', $namhoc_dangchon)
                ->with('all_namhoc', $all_namhoc)
                ->with('id_namhoc', $id_namhoc);
    }

    public function LoadHoatDongNghienCuuKhoaHoc(Request $request) {
        if ($request->ajax()) {

            $id_namhoc = $request->id_namhoc;

            $all_hoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                            ->where('namhoc', $id_namhoc)
                            ->get();

            $output = '';
            
            $stt = 1;
            foreach($all_hoatdong as $value_all_hoatdong) {
                $output .= '<tr class="click-hoatdong" data-value="'.$value_all_hoatdong->id.'">';
                $output .= '<td>'.$stt++.'</td>';
                $output .= '<td style="text-align: left;width: 60%;" >'.$value_all_hoatdong->tenhoatdongnghiencuu.'</td>';
                $output .= '<td>'.$value_all_hoatdong->diemcongtrinh.'</td>';
                $output .= '<td>'.$value_all_hoatdong->giokhoahoc.'</td>';
                $output .= '<td>'.$value_all_hoatdong->loai_hoatdong.'</td>';
                $output .= '</tr>';
            }

            echo $output;

        }
    }

    public function getSuaHoatDongNghienCuuKhoaHoc(Request $request) {
        if ($request->ajax()) {

            // $output = '';

            // $output .= '<tr>';
            //     $output .= '<td>Tên hoạt động: </td>';
            //     $output .= '<td>';
            //         $output .= '<input type="text">';
            //     $output .= '</td>';
            // $output .= '</tr>';
            // $output .= '<tr>';
            //     $output .= '<td>Điểm công trình: </td>';
            //     $output .= '<td>';
            //         $output .= '<input type="number" name="" id="">';
            //     $output .= '</td>';
            // $output .= '</tr>';
            // $output .= '<tr>';
            //     $output .= '<td>Giờ khoa học</td>';
            //     $output .= '<td><input type="number" name="" id=""></td>';
            // $output .= '</tr>';
            // $output .= '<tr>';
            //     $output .= '<td>Loại</td>';
            //     $output .= <td>
            //         $output .= <select name="" id="select-sua-chon-loai-hoat-dong" multiple>
            //             $output .= <option value="1">Loại 1</option>
            //             $output .= <option value="2">Loại 2</option>
            //             $output .= <option value="3">Loại 3</option>
            //         $output .= </select>
            //     $output .= </td>
            // $output .= </tr>
            // $output .= <tr>
            //     $output .= <td style="padding-top:50px"></td>
            //     $output .= <td>
            //         $output .= <span id="insert-sua-hoat-dong">Sửa hoạt động</span>
            //     $output .= </td>
            // $output .= </tr> 
            
            $id_hoatdong = $request->id_hoatdong;
            $id_namhoc = $request->id_namhoc;

            $hoatdong_nckh = DB::table('table_nghiencuukhoahoc_hoatdong')
                            ->where('namhoc', $id_namhoc)
                            ->where('id', $id_hoatdong)
                            ->first();

            echo json_encode($hoatdong_nckh);
        }
    }

    public function PostSuaHoatDongNghienCuuKhoaHoc(Request $request) {
        if ($request->ajax()) {

            $id_hoatdong = (int)$request->id_hoatdong;
            $id_namhoc = (int)$request->id_namhoc;

            $tenhoatdong_sua = (String)$request->tenhoatdong_sua;
            $diemcongtrinh_sua = (float)$request->diemcongtrinh_sua;
            $giokhoahoc_sua = (int)$request->giokhoahoc_sua;
            $loai_sua = (int)$request->loai_sua;

            $sua_klkt = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->where('namhoc', $id_namhoc)
                        ->where('id', $id_hoatdong)
                        ->update(['tenhoatdongnghiencuu' => $tenhoatdong_sua, 
                                'diemcongtrinh' => $diemcongtrinh_sua, 
                                'giokhoahoc' => $giokhoahoc_sua, 
                                'loai_hoatdong' => $loai_sua]);

            //echo $id_hoatdong.$id_namhoc.$tenhoatdong_sua.$diemcongtrinh_sua.$giokhoahoc_sua.$loai_sua;
            echo "Successfull";
        }
    }

    public function PostThemHoatDongNghienCuuKhoaHoc(Request $request) {
        if ($request->ajax()) {

            $id_namhoc = (int)$request->id_namhoc;

            $tenhoatdong_them = (String)$request->tenhoatdong_them;
            $diemcongtrinh_them = (float)$request->diemcongtrinh_them;
            $giokhoahoc_them = (int)$request->giokhoahoc_them;
            $loai_them = (int)$request->loai_them;

            $them_hoatdong = DB::table('table_nghiencuukhoahoc_hoatdong')
                        ->insert(['tenhoatdongnghiencuu' => $tenhoatdong_them, 
                                'diemcongtrinh' => $diemcongtrinh_them, 
                                'giokhoahoc' => $giokhoahoc_them, 
                                'loai_hoatdong' => $loai_them,
                                'namhoc' => $id_namhoc]);

            //echo $id_hoatdong.$id_namhoc.$tenhoatdong_sua.$diemcongtrinh_sua.$giokhoahoc_sua.$loai_sua;
            echo "Successfull";
        }
    }

    public function ChonNamHocThongKeNCKHCuaToi() {
        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();
        
        return view('admin.decuong.nghiencuukhoahoc.chonnamhoc_thongke_nckhcuatoi')
                ->with('all_namhoc', $all_namhoc);
    }

    public function ThongKeNghienCuuKhoaHocCuaToi($id_namhoc) {

        $id_gv = 23;

        $namhoc_dangchon = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->where('id', $id_namhoc)
                        ->DISTINCT()
                        ->first();

        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();

        $gionghiencuu = DB::table('table_nghiencuukhoahoc_gionghiencuu')
                        ->join('table_nghiencuukhoahoc_giochuan', 'table_nghiencuukhoahoc_gionghiencuu.id_chucdanh', 'table_nghiencuukhoahoc_giochuan.id')
                        ->join('table_nghiencuukhoahoc_tyledinhmuc', 'table_nghiencuukhoahoc_gionghiencuu.id_dinhmuc', 'table_nghiencuukhoahoc_tyledinhmuc.id')
                        ->where('table_nghiencuukhoahoc_gionghiencuu.id_gv', $id_gv)
                        ->where('table_nghiencuukhoahoc_gionghiencuu.id_namhoc', $id_namhoc)
                        ->first();

        if($gionghiencuu->tyle == 0) {
            $giocannghiencuu = $gionghiencuu->gioNghienCuuChuan;
        } else {
            $giocannghiencuu = $gionghiencuu->gioNghienCuuChuan*($gionghiencuu->tyle/100);
        }        

        

        $all_hoatdong_nckh = DB::table('table_nghiencuukhoahoc_hoatdong')
                                ->where('namhoc', $id_namhoc)
                                ->get();

        foreach($all_hoatdong_nckh as $value_all_hoatdong_nckh) {

            $all_ht_cuatoi_loai1 = DB::table('table_nghiencuukhoahoc_loai1')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->count();
            if($all_ht_cuatoi_loai1 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai1;
            }

            $all_ht_cuatoi_loai2 = DB::table('table_nghiencuukhoahoc_loai2')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->count();
            if($all_ht_cuatoi_loai2 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai2;
            }

            $all_ht_cuatoi_loai3 = DB::table('table_nghiencuukhoahoc_loai3')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->count();
            if($all_ht_cuatoi_loai3 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai3;
            }

        }

        $all_hoatdong_cuatoi_view1 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai1', 'table_nghiencuukhoahoc_loai1.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai1.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai1.id_tacgia', $id_gv)
                                    ->get();

        $all_hoatdong_cuatoi_view2 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai2', 'table_nghiencuukhoahoc_loai2.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai2.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai2.id_tacgia', $id_gv)
                                    ->get();


        $all_hoatdong_cuatoi_view3 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai3', 'table_nghiencuukhoahoc_loai3.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->where('table_nghiencuukhoahoc_loai3.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai3.id_tacgia', $id_gv)
                                    ->get();

        foreach($all_hoatdong_cuatoi_view1 as $value_all_hoatdong_cuatoi_view1) {
            $list_cactacgia = [];
            $sotacgia = 0;
            if(isset($value_all_hoatdong_cuatoi_view1->id_cactacgia) && $value_all_hoatdong_cuatoi_view1->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view1->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }
            }
            $value_all_hoatdong_cuatoi_view1->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view1->sotacgia = $sotacgia+1;


            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view1->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view1->giokhoahoc*($value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia);
            $value_all_hoatdong_cuatoi_view1->thanhgionckh = $thanhgionckh;

        }

        foreach($all_hoatdong_cuatoi_view2 as $value_all_hoatdong_cuatoi_view2) {

            $list_cactacgia = [];
            $sotacgia = 0;
            if(isset($value_all_hoatdong_cuatoi_view2->id_cactacgia) && $value_all_hoatdong_cuatoi_view2->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view2->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }
            }
            $value_all_hoatdong_cuatoi_view2->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view2->sotacgia = $sotacgia+1;

            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view2->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view2->giokhoahoc*($value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia);
            $value_all_hoatdong_cuatoi_view2->thanhgionckh = $thanhgionckh;
                   
        }

        foreach($all_hoatdong_cuatoi_view3 as $value_all_hoatdong_cuatoi_view3) {

            $thanhgionckh = $value_all_hoatdong_cuatoi_view3->giokhoahoc*$value_all_hoatdong_cuatoi_view3->diemcongtrinh;
            $value_all_hoatdong_cuatoi_view3->thanhgionckh = $thanhgionckh;
                   
        }

        $counttongsogio = 0;

        foreach($all_hoatdong_nckh as $value_them_tongsogio) {

            if(isset($value_them_tongsogio->count_sub)) {

                if($value_them_tongsogio->loai_hoatdong == 1) {

                    $tongsogio_view1 = 0;
                    $tongsodiem_view1 = 0;

                    foreach($all_hoatdong_cuatoi_view1 as $value_view1_them_tongsogio) {
                        if($value_view1_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view1 += $value_view1_them_tongsogio->thanhgionckh;
                            $tongsodiem_view1 += $value_view1_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view1;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view1;

                    $counttongsogio += $tongsogio_view1;

                }

                if($value_them_tongsogio->loai_hoatdong == 2) {

                    $tongsogio_view2 = 0;
                    $tongsodiem_view2 = 0;

                    foreach($all_hoatdong_cuatoi_view2 as $value_view2_them_tongsogio) {
                        if($value_view2_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view2 += $value_view2_them_tongsogio->thanhgionckh;
                            $tongsodiem_view2 += $value_view2_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view2;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view2;

                    $counttongsogio += $tongsogio_view2;

                }

                if($value_them_tongsogio->loai_hoatdong == 3) {

                    $tongsogio_view3 = 0;
                    $tongsodiem_view3 = 0;

                    foreach($all_hoatdong_cuatoi_view3 as $value_view3_them_tongsogio) {
                        if($value_view3_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view3 += $value_view3_them_tongsogio->thanhgionckh;
                            $tongsodiem_view3 += $value_view3_them_tongsogio->diemcongtrinh;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view3;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view3;

                    $counttongsogio += $tongsogio_view3;

                }
            }
        }


        $namtruoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->where('nambatdau', $namhoc_dangchon->nambatdau-1)
                        ->DISTINCT()
                        ->first();

        $giodunamtruoc = DB::table('table_nghiencuukhoahoc_giochuyensangnamsau')
                        ->where('id_gv', $id_gv)
                        ->where('id_namhoc', $namtruoc->id)
                        ->first(); 

        if(!$giodunamtruoc) {
            $giodunamtruoc=0;
        }

        $trongnam = $counttongsogio;

        $tongcong = $trongnam+$giodunamtruoc->gioChuyenSangNamSau;

        $gioconthieu = $giocannghiencuu-$tongcong;

        if($gioconthieu < 0) {
            $gioconthieu = 0;
        }

        $update_giochuyensangnamsau = DB::table('table_nghiencuukhoahoc_giochuyensangnamsau')
                        ->where('id_gv', $id_gv)
                        ->where('id_namhoc', $id_namhoc)
                        ->update(['gioChuyenSangNamSau' => $tongcong-$giocannghiencuu]);
                        

        $giochuyensangnamsau = DB::table('table_nghiencuukhoahoc_giochuyensangnamsau')
                        ->where('id_gv', $id_gv)
                        ->where('id_namhoc', $id_namhoc)
                        ->first();

        // echo "<pre>";
        // print_r($id_namhoc);
        // die();

        return view('admin.decuong.nghiencuukhoahoc.thongke_nckhcuatoi')
                    ->with('namhoc_dangchon', $namhoc_dangchon)
                    ->with('all_namhoc', $all_namhoc)
                    ->with('id_namhoc', $id_namhoc)
                    ->with('gionghiencuu', $gionghiencuu)
                    ->with('giocannghiencuu', $giocannghiencuu)
                    ->with('giochuyensangnamsau', $giochuyensangnamsau)
                    ->with('giodunamtruoc', $giodunamtruoc)
                    ->with('trongnam', $trongnam)
                    ->with('tongcong', $tongcong)
                    ->with('gioconthieu', $gioconthieu);
    }

    public function getDuyetNghienCuuKhoaHoc($id_namhoc) {

        $namhoc_dangchon = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->where('id', $id_namhoc)
                        ->DISTINCT()
                        ->first();

        $all_namhoc = DB::table('table_namhoc_hocky')
                        ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                        ->where('nambatdau', '>', 0)
                        ->DISTINCT()
                        ->get();

        $ds_tacgia_duyet = [];

        $ds_tacgia_view1 = DB::table('table_nghiencuukhoahoc_loai1')
                            ->select('id_tacgia', 'trangthaiduyet')
                            ->where('namhoc', $id_namhoc)
                            ->DISTINCT()
                            ->get();

        foreach($ds_tacgia_view1 as $value_ds_tacgia_view1) {
            $ds_tacgia_duyet[] = $value_ds_tacgia_view1->id_tacgia;
        }

        $ds_tacgia_view2 = DB::table('table_nghiencuukhoahoc_loai2')
                            ->select('id_tacgia')
                            ->where('namhoc', $id_namhoc)
                            ->DISTINCT()
                            ->get();

        foreach($ds_tacgia_view2 as $value_ds_tacgia_view2) {
            $ds_tacgia_duyet[] = $value_ds_tacgia_view2->id_tacgia;
        }

        $ds_tacgia_view3 = DB::table('table_nghiencuukhoahoc_loai3')
                            ->select('id_tacgia')
                            ->where('namhoc', $id_namhoc)
                            ->DISTINCT()
                            ->get();

       foreach($ds_tacgia_view3 as $value_ds_tacgia_view3) {
            $ds_tacgia_duyet[] = $value_ds_tacgia_view3->id_tacgia;
        }


        $ds_tacgia_duyet = array_unique($ds_tacgia_duyet);

        $danhsach_duyet = [];

        foreach($ds_tacgia_duyet as $value_ds_tacgia_duyet) {

            //$thongtinduyet = 

            $tacgia = DB::table('table_giangvien')
                        ->select('table_giangvien.id', 'table_giangvien.hodem', 'table_giangvien.ten')
                        ->where('table_giangvien.id', $value_ds_tacgia_duyet)
                        ->first();

            $thongtinduyet = $tacgia;
            $diemkhoahoc = 0;

            $view1 = DB::table('table_nghiencuukhoahoc_loai1')
                    ->join('table_nghiencuukhoahoc_hoatdong', 'table_nghiencuukhoahoc_loai1.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                    ->select('table_nghiencuukhoahoc_loai1.id_tacgia', 'table_nghiencuukhoahoc_loai1.id_cactacgia', 'table_nghiencuukhoahoc_hoatdong.giokhoahoc', 'table_nghiencuukhoahoc_hoatdong.diemcongtrinh')
                    ->where('table_nghiencuukhoahoc_loai1.id_tacgia', $value_ds_tacgia_duyet)
                    ->where('table_nghiencuukhoahoc_loai1.trangthaiduyet', 1)
                    ->where('table_nghiencuukhoahoc_loai1.namhoc', $id_namhoc)
                    ->get();

            foreach($view1 as $value_view1) {

                if ($value_view1->id_cactacgia) {
                    $id_ctg = explode("_", $value_view1->id_cactacgia);
                    $c_sotacgia = count($id_ctg)+1;
                } else {
                    $c_sotacgia = 1;
                }
  
                $diemkhoahoc = $diemkhoahoc+$value_view1->giokhoahoc*(($value_view1->diemcongtrinh/$c_sotacgia));
            }

            $view2 = DB::table('table_nghiencuukhoahoc_loai2')
                        ->join('table_nghiencuukhoahoc_hoatdong', 'table_nghiencuukhoahoc_loai2.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                        ->select('table_nghiencuukhoahoc_loai2.id_tacgia', 'table_nghiencuukhoahoc_loai2.id_cactacgia', 'table_nghiencuukhoahoc_hoatdong.giokhoahoc', 'table_nghiencuukhoahoc_hoatdong.diemcongtrinh')
                        ->where('table_nghiencuukhoahoc_loai2.id_tacgia', $value_ds_tacgia_duyet)
                        ->where('table_nghiencuukhoahoc_loai2.trangthaiduyet', 1)
                        ->where('table_nghiencuukhoahoc_loai2.namhoc', $id_namhoc)
                        ->get();

            foreach($view2 as $value_view2) {

                    if ($value_view2->id_cactacgia) {
                        $id_ctg = explode("_", $value_view2->id_cactacgia);
                        $c_sotacgia = count($id_ctg)+1;
                    } else {
                        $c_sotacgia = 1;
                    }
                    
                    $diemkhoahoc = $diemkhoahoc+$value_view2->giokhoahoc*($value_view2->diemcongtrinh/$c_sotacgia);
            }

            $view3 = DB::table('table_nghiencuukhoahoc_loai3')
                        ->join('table_nghiencuukhoahoc_hoatdong', 'table_nghiencuukhoahoc_loai3.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                        ->select('table_nghiencuukhoahoc_loai3.id_tacgia', 'table_nghiencuukhoahoc_hoatdong.giokhoahoc', 'table_nghiencuukhoahoc_hoatdong.diemcongtrinh')
                        ->where('table_nghiencuukhoahoc_loai3.id_tacgia', $value_ds_tacgia_duyet)
                        ->where('table_nghiencuukhoahoc_loai3.trangthaiduyet', 1)
                        ->where('table_nghiencuukhoahoc_loai3.namhoc', $id_namhoc)
                        ->get();

            foreach($view3 as $value_view3) { 
                $diemkhoahoc = $diemkhoahoc+($value_view3->giokhoahoc*$value_view3->diemcongtrinh);
            }

            $tinhtrang = DB::table('table_nghiencuukhoahoc_duyet')
                        ->where('id_tacgia', $value_ds_tacgia_duyet)
                        ->where('namhoc', $id_namhoc)
                        ->get();

            $tinhtrangduyet = 0;
            $ngayguiduyet = 0;

            foreach($tinhtrang as $value_tinhtrang) {

                if($value_tinhtrang->tinhtrangduyet == 1) {
                    $tinhtrangduyet = 1;
                    $ngayguiduyet = $value_tinhtrang->ngayguiduyet;
                } else if($value_tinhtrang->tinhtrangduyet == 0) {
                    $tinhtrangduyet = 0;
                    $ngayguiduyet = $value_tinhtrang->ngayguiduyet;
                    break;
                } else if($value_tinhtrang->tinhtrangduyet == 2) {
                    $tinhtrangduyet = 2;
                    $ngayguiduyet = $value_tinhtrang->ngayguiduyet;
                }

            }

            $thongtinduyet->diemkhoahoc = $diemkhoahoc;
            $thongtinduyet->ngayguiduyet = $ngayguiduyet;
            $thongtinduyet->tinhtrangduyet = $tinhtrangduyet;
            $danhsach_duyet[] = $thongtinduyet;

        }

        // echo "<pre>";
        // print_r($danhsach_duyet);
        // die();

        return view('admin.decuong.nghiencuukhoahoc.duyet_nckh')
                    ->with('namhoc_dangchon', $namhoc_dangchon)
                    ->with('all_namhoc', $all_namhoc)
                    ->with('id_namhoc', $id_namhoc)
                    ->with('danhsach_duyet', $danhsach_duyet);
    }

    public function getGuiXetDuyetNCKH(Request $request) {
        if ($request->ajax()) {

            $id_namhoc = $request->id_namhoc;
            $id_tacgia = $request->id_tacgia;

            $ds_gui_duyet = [];

            $view1 = DB::table('table_nghiencuukhoahoc_loai1')
                    ->select('id')
                    ->where('namhoc', $id_namhoc)
                    ->where('id_tacgia', $id_tacgia)
                    ->where('trangthaiduyet', 0)
                    ->get();

            foreach($view1 as $value_view1) {
                $update = DB::table('table_nghiencuukhoahoc_loai1')
                        ->where('id', $value_view1->id)
                        ->update(['trangthaiduyet' => 1]);

                $insert = DB::table('table_nghiencuukhoahoc_duyet')
                            ->insert([
                                'id_tacgia' => $id_tacgia,
                                'id_nckh' => $value_view1->id, 
                                'loai_hoatdong' => 'loai1', 
                                'tinhtrangduyet' => 0, 
                                'ngayguiduyet' => strtotime(date('d-m-Y')),
                                'namhoc' => $id_namhoc
                            ]);
            }

            $view2 = DB::table('table_nghiencuukhoahoc_loai2')
                    ->select('id')
                    ->where('namhoc', $id_namhoc)
                    ->where('id_tacgia', $id_tacgia)
                    ->where('trangthaiduyet', 0)
                    ->get();

            foreach($view2 as $value_view2) {
                $update = DB::table('table_nghiencuukhoahoc_loai2')
                        ->where('id', $value_view2->id)
                        ->update(['trangthaiduyet' => 1]);

                $insert = DB::table('table_nghiencuukhoahoc_duyet')
                            ->insert([
                                'id_tacgia' => $id_tacgia,
                                'id_nckh' => $value_view2->id, 
                                'loai_hoatdong' => 'loai2', 
                                'tinhtrangduyet' => 0, 
                                'ngayguiduyet' => strtotime(date('d-m-Y')),
                                'namhoc' => $id_namhoc
                            ]);
            }

            $view3 = DB::table('table_nghiencuukhoahoc_loai3')
                    ->select('id')
                    ->where('namhoc', $id_namhoc)
                    ->where('id_tacgia', $id_tacgia)
                    ->where('trangthaiduyet', 0)
                    ->get();

            foreach($view3 as $value_view3) {
                $update = DB::table('table_nghiencuukhoahoc_loai3')
                        ->where('id', $value_view3->id)
                        ->update(['trangthaiduyet' => 1]);

                $insert = DB::table('table_nghiencuukhoahoc_duyet')
                            ->insert([
                                'id_tacgia' => $id_tacgia,
                                'id_nckh' => $value_view3->id, 
                                'loai_hoatdong' => 'loai3', 
                                'tinhtrangduyet' => 0, 
                                'ngayguiduyet' => strtotime(date('d-m-Y')),
                                'namhoc' => $id_namhoc
                            ]);
            }

            echo "Successfull";

        }
    }

    public function getDuyetNCKHChiTiet($id_tacgia, $id_namhoc) {

        $namhoc_dangchon = DB::table('table_namhoc_hocky')
                            ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                            ->where('nambatdau', '>', 0)
                            ->where('id', $id_namhoc)
                            ->DISTINCT()
                            ->first();

        $all_namhoc = DB::table('table_namhoc_hocky')
                ->select('id', 'nambatdau', 'namketthuc', 'hienhanh')
                ->where('nambatdau', '>', 0)
                ->DISTINCT()
                ->get();

        $all_hoatdong_nckh = DB::table('table_nghiencuukhoahoc_hoatdong')
        ->where('namhoc', $id_namhoc)
        ->get();


        foreach($all_hoatdong_nckh as $value_all_hoatdong_nckh) {

            $all_ht_cuatoi_loai1 = DB::table('table_nghiencuukhoahoc_loai1')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai1 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai1;
            }

            $all_ht_cuatoi_loai2 = DB::table('table_nghiencuukhoahoc_loai2')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai2 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai2;
            }

            $all_ht_cuatoi_loai3 = DB::table('table_nghiencuukhoahoc_loai3')
                        ->where('id_hoatdong', $value_all_hoatdong_nckh->id)
                        ->where('id_tacgia', $id_tacgia)
                        ->count();
            if($all_ht_cuatoi_loai3 > 0) {
                $value_all_hoatdong_nckh->count_sub = $all_ht_cuatoi_loai3;
            }

        }

        $all_hoatdong_cuatoi_view1 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai1', 'table_nghiencuukhoahoc_loai1.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->join('table_nghiencuukhoahoc_duyet', 'table_nghiencuukhoahoc_duyet.id_nckh', 'table_nghiencuukhoahoc_loai1.id')
                                    ->where('table_nghiencuukhoahoc_duyet.loai_hoatdong', 'loai1')
                                    ->where('table_nghiencuukhoahoc_loai1.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai1.id_tacgia', $id_tacgia)
                                    ->get();

        $all_hoatdong_cuatoi_view2 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai2', 'table_nghiencuukhoahoc_loai2.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->join('table_nghiencuukhoahoc_duyet', 'table_nghiencuukhoahoc_duyet.id_nckh', 'table_nghiencuukhoahoc_loai2.id')
                                    ->where('table_nghiencuukhoahoc_duyet.loai_hoatdong', 'loai2')
                                    ->where('table_nghiencuukhoahoc_loai2.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai2.id_tacgia', $id_tacgia)
                                    ->get();


        $all_hoatdong_cuatoi_view3 = DB::table('table_nghiencuukhoahoc_hoatdong')
                                    ->join('table_nghiencuukhoahoc_loai3', 'table_nghiencuukhoahoc_loai3.id_hoatdong', 'table_nghiencuukhoahoc_hoatdong.id')
                                    ->join('table_nghiencuukhoahoc_duyet', 'table_nghiencuukhoahoc_duyet.id_nckh', 'table_nghiencuukhoahoc_loai3.id')
                                    ->where('table_nghiencuukhoahoc_duyet.loai_hoatdong', 'loai3')
                                    ->where('table_nghiencuukhoahoc_loai3.namhoc', $id_namhoc)
                                    ->where('table_nghiencuukhoahoc_loai3.id_tacgia', $id_tacgia)
                                    ->get();

        foreach($all_hoatdong_cuatoi_view1 as $value_all_hoatdong_cuatoi_view1) {
            $list_cactacgia = [];
            $sotacgia = 0;

            $tacgia_chinh = DB::table('table_giangvien')->where('id', $value_all_hoatdong_cuatoi_view1->id_tacgia)->first();
            $list_cactacgia[] = $tacgia_chinh;
            $sotacgia += 1;

            if(isset($value_all_hoatdong_cuatoi_view1->id_cactacgia) && $value_all_hoatdong_cuatoi_view1->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view1->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }

            }
            
            $value_all_hoatdong_cuatoi_view1->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view1->sotacgia = $sotacgia;

            // $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view1->hinhanhminhchung);   
            // $value_all_hoatdong_cuatoi_view1->hinhanhminhchung = $list_hinhanhminhchung;

            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view1->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view1->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view1->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view1->giokhoahoc*($value_all_hoatdong_cuatoi_view1->diemcongtrinh/$value_all_hoatdong_cuatoi_view1->sotacgia);
            $value_all_hoatdong_cuatoi_view1->thanhgionckh = $thanhgionckh;

        }

        foreach($all_hoatdong_cuatoi_view2 as $value_all_hoatdong_cuatoi_view2) {

            $list_cactacgia = [];
            $sotacgia = 0;

            $tacgia_chinh = DB::table('table_giangvien')->where('id', $value_all_hoatdong_cuatoi_view2->id_tacgia)->first();
            $list_cactacgia[] = $tacgia_chinh;
            $sotacgia += 1;

            if(isset($value_all_hoatdong_cuatoi_view2->id_cactacgia) && $value_all_hoatdong_cuatoi_view2->id_cactacgia != null) {
                $id_ctg = explode("_", $value_all_hoatdong_cuatoi_view2->id_cactacgia);            
                foreach ($id_ctg as $value) {
                    $tg = DB::table('table_giangvien')->where('id', $value)->first();
                    $list_cactacgia[] = $tg;
                    $sotacgia = $sotacgia+1;
                }
            }
            $value_all_hoatdong_cuatoi_view2->id_cactacgia = $list_cactacgia;
            $value_all_hoatdong_cuatoi_view2->sotacgia = $sotacgia;

            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view2->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view2->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $diemcuatoi = number_format((float)$value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia, 2, '.', '');
            $value_all_hoatdong_cuatoi_view2->diemcuatoi = $diemcuatoi;

            $thanhgionckh = $value_all_hoatdong_cuatoi_view2->giokhoahoc*($value_all_hoatdong_cuatoi_view2->diemcongtrinh/$value_all_hoatdong_cuatoi_view2->sotacgia);
            $value_all_hoatdong_cuatoi_view2->thanhgionckh = $thanhgionckh;
                   
        }

        foreach($all_hoatdong_cuatoi_view3 as $value_all_hoatdong_cuatoi_view3) {
            
            $list_hinhanhminhchung = explode("|", $value_all_hoatdong_cuatoi_view3->hinhanhminhchung);  
            foreach($list_hinhanhminhchung as $value_list_hinhanhminhchung) {
                if(!empty($value_list_hinhanhminhchung)) {
                    $hinhanhminhchung = new stdClass;
                    $hinhanhminhchung->link = $value_list_hinhanhminhchung;

                    $xuly = explode('.', $value_list_hinhanhminhchung);
                    $hinhanhminhchung->duoi = $xuly[count($xuly)-1];

                    $value_all_hoatdong_cuatoi_view3->show_hinhanhminhchung[] = $hinhanhminhchung;
                }
            }

            $thanhgionckh = $value_all_hoatdong_cuatoi_view3->giokhoahoc*$value_all_hoatdong_cuatoi_view3->diemcongtrinh;
            $value_all_hoatdong_cuatoi_view3->thanhgionckh = $thanhgionckh;
                   
        }

        $counttongsogio = 0;

        foreach($all_hoatdong_nckh as $value_them_tongsogio) {

            if(isset($value_them_tongsogio->count_sub)) {

                if($value_them_tongsogio->loai_hoatdong == 1) {

                    $tongsogio_view1 = 0;
                    $tongsodiem_view1 = 0;

                    foreach($all_hoatdong_cuatoi_view1 as $value_view1_them_tongsogio) {
                        if($value_view1_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view1 += $value_view1_them_tongsogio->thanhgionckh;
                            $tongsodiem_view1 += $value_view1_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view1;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view1;

                    $counttongsogio += $tongsogio_view1;

                }

                if($value_them_tongsogio->loai_hoatdong == 2) {

                    $tongsogio_view2 = 0;
                    $tongsodiem_view2 = 0;

                    foreach($all_hoatdong_cuatoi_view2 as $value_view2_them_tongsogio) {
                        if($value_view2_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view2 += $value_view2_them_tongsogio->thanhgionckh;
                            $tongsodiem_view2 += $value_view2_them_tongsogio->diemcuatoi;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view2;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view2;

                    $counttongsogio += $tongsogio_view2;

                }

                if($value_them_tongsogio->loai_hoatdong == 3) {

                    $tongsogio_view3 = 0;
                    $tongsodiem_view3 = 0;

                    foreach($all_hoatdong_cuatoi_view3 as $value_view3_them_tongsogio) {
                        if($value_view3_them_tongsogio->id_hoatdong == $value_them_tongsogio->id) {
                            $tongsogio_view3 += $value_view3_them_tongsogio->thanhgionckh;
                            $tongsodiem_view3 += $value_view3_them_tongsogio->diemcongtrinh;
                        }
                    }

                    $value_them_tongsogio->tongsogio = $tongsogio_view3;
                    $value_them_tongsogio->tongsodiem = $tongsodiem_view3;

                    $counttongsogio += $tongsogio_view3;

                }

            }
        }


        // echo "<pre>";
        // print_r($all_hoatdong_cuatoi_view1);
        // die();
        
        return view('admin.decuong.nghiencuukhoahoc.duyet_nckh_chitiet')
                ->with('namhoc_dangchon', $namhoc_dangchon)
                ->with('all_namhoc', $all_namhoc)
                ->with('all_hoatdong_nckh', $all_hoatdong_nckh)
                ->with('id_namhoc', $id_namhoc)
                ->with('id_tacgia', $id_tacgia)
                ->with('all_hoatdong_cuatoi_view1', $all_hoatdong_cuatoi_view1)
                ->with('all_hoatdong_cuatoi_view2', $all_hoatdong_cuatoi_view2)
                ->with('all_hoatdong_cuatoi_view3', $all_hoatdong_cuatoi_view3)
                ->with('counttongsogio', $counttongsogio);

    }

    public function getXetDuyetNCKH($id_nckh, $loai_hoatdong, $id_tacgia, $id_namhoc) {

        if($loai_hoatdong == "loai1") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai1')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 2]);
                
        }      
        
        if($loai_hoatdong == "loai2") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai2')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 2]);
                
        }

        if($loai_hoatdong == "loai3") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai3')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 2]);
                
        }

        $update_duyet = DB::table('table_nghiencuukhoahoc_duyet')
                        ->where('id_tacgia', $id_tacgia)
                        ->where('id_nckh', $id_nckh)
                        ->where('loai_hoatdong', $loai_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->update([
                            'tinhtrangduyet' => 1,
                            'ngayduyet' => strtotime(date('d-m-Y'))
                        ]);

        return Redirect::to('/admin/decuong/duyet-nckh-chi-tiet/'.$id_tacgia.'/'.$id_namhoc);

    }

    public function getChoDuyetNCKH($id_nckh, $loai_hoatdong, $id_tacgia, $id_namhoc) {

        if($loai_hoatdong == "loai1") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai1')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 1]);
                
        }      
        
        if($loai_hoatdong == "loai2") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai2')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 1]);
                
        }

        if($loai_hoatdong == "loai3") {

            $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai3')
                ->where('id', $id_nckh)
                ->update(['trangthaiduyet' => 1]);
                
        }

        $update_duyet = DB::table('table_nghiencuukhoahoc_duyet')
                        ->where('id_tacgia', $id_tacgia)
                        ->where('id_nckh', $id_nckh)
                        ->where('loai_hoatdong', $loai_hoatdong)
                        ->where('namhoc', $id_namhoc)
                        ->update([
                            'tinhtrangduyet' => 0,
                            'ngayduyet' => strtotime(date('d-m-Y'))
                        ]);


        return Redirect::to('/admin/decuong/duyet-nckh-chi-tiet/'.$id_tacgia.'/'.$id_namhoc);
        
    }

    public function getSuaDuyetNCKH(Request $request) {

        if($request->ajax()) {

            $id_nckh = $request->id_nckh;
            $loai_hoatdong = $request->loai_hoatdong;
            $id_tacgia = $request->id_tacgia;
            $id_namhoc = $request->id_namhoc;
            $noi_dung_sua = $request->noi_dung_sua;

            if($loai_hoatdong == "loai1") {

                $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai1')
                    ->where('id', $id_nckh)
                    ->update(['trangthaiduyet' => 3]);
                    
            }      
            
            if($loai_hoatdong == "loai2") {

                $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai2')
                    ->where('id', $id_nckh)
                    ->update(['trangthaiduyet' => 3]);
                    
            }

            if($loai_hoatdong == "loai3") {

                $update_hoatdong = DB::table('table_nghiencuukhoahoc_loai3')
                    ->where('id', $id_nckh)
                    ->update(['trangthaiduyet' => 3]);
                    
            }

            $update_duyet = DB::table('table_nghiencuukhoahoc_duyet')
                            ->where('id_tacgia', $id_tacgia)
                            ->where('id_nckh', $id_nckh)
                            ->where('loai_hoatdong', $loai_hoatdong)
                            ->where('namhoc', $id_namhoc)
                            ->update([
                                'tinhtrangduyet' => 2,
                                'ngayduyet' => strtotime(date('d-m-Y'))
                            ]);

            $sua_duyet_nckh = DB::table('table_nghiencuukhoahoc_sua')
                            ->insert([
                                    'id_tacgia' => $id_tacgia, 
                                    'id_nckh' => $id_nckh, 
                                    'loai_hoatdong' => $loai_hoatdong, 
                                    'noidung_sua' => $noi_dung_sua,
                                    'namhoc' => $id_namhoc
                                ]);

            echo "Successfull";

        }
    }


    public function getXemNoiDungSuaDuyetNCKH(Request $request) {

        if($request->ajax()) {

            $id_nckh = $request->id_nckh;
            $loai_hoatdong = $request->loai_hoatdong;
            $id_tacgia = $request->id_tacgia;
            $id_namhoc = $request->id_namhoc;

            $all_noidung_sua = DB::table('table_nghiencuukhoahoc_sua')
                                ->where('id_tacgia', $id_tacgia)
                                ->where('id_nckh', $id_nckh)
                                ->where('loai_hoatdong', $loai_hoatdong)
                                ->where('namhoc', $id_namhoc)
                                ->get();

            $output = '';
            $stt = 1;
            foreach($all_noidung_sua as $value_all_noidung_sua) {
                $output .='<p> Nội dung cần sửa '.$stt++.'</p>';
                $output .= '<textarea disabled="true">';
                $output .= $value_all_noidung_sua->noidung_sua;
                $output .= '</textarea>';
            }

            echo $output;

        }
    }
    



  



}
