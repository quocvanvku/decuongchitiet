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

        $id_tacgia = 0;

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

        // echo "<pre>";
        // print_r($all_hoatdong_cuatoi_view1);
        // die();

        return view('admin.decuong.nghiencuukhoahoc.danhmuc_nckh')
                ->with('all_hoatdong_nckh', $all_hoatdong_nckh)
                ->with('namhoc_dangchon', $namhoc_dangchon)
                ->with('all_namhoc', $all_namhoc)
                ->with('id_namhoc', $id_namhoc)
                ->with('all_hoatdong_cuatoi_view1', $all_hoatdong_cuatoi_view1)
                ->with('all_hoatdong_cuatoi_view2', $all_hoatdong_cuatoi_view2)
                ->with('all_hoatdong_cuatoi_view3', $all_hoatdong_cuatoi_view3);
    
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

        return view('admin.decuong.nghiencuukhoahoc.thongke_nckhcuatoi')
                    ->with('namhoc_dangchon', $namhoc_dangchon)
                    ->with('all_namhoc', $all_namhoc)
                    ->with('id_namhoc', $id_namhoc);
    }

    


}
