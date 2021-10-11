<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Redirect;
use App\Http\Controllers\Controller;
use App\Models\decuongchitiet;
use App\Models\chuandauramonhoc;
use App\Models\danhgiahocphan;
use App\Models\thanhphandanhgia;
use App\Models\kehoachgiangday;
use App\Models\trongsohocphan;
use App\Models\khungchuongtrinhhocphan;
use App\Models\tailieuthamkhao;
use App\Models\moilienhecloplo;
use DB;
use Redirect;
use Session;
use \stdClass;
 
class DeCuongController extends Controller
{

    public function danhsachdecuongthem($id_khungchuongtrinh) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $khungchuongtrinh_select = DB::table('table_khungchuongtrinh')->where('id', $id_khungchuongtrinh)->first();
        $ten_khungchuongtrinh = $khungchuongtrinh_select->tenkhungchuongtrinh;

        $all_decuong = DB::table('table_decuongchitiet')
            ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
            ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
            ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh.id', 'table_decuongchitiet.khungchuongtrinh')
            ->where('table_decuongchitiet.khungchuongtrinh', $id_khungchuongtrinh)
            ->get();

        return view('admin.decuong.danhsach_decuong_them')
            ->with('khungchuongtrinh', $khungchuongtrinh)
            ->with('id_khungchuongtrinh', $id_khungchuongtrinh)
            ->with('ten_khungchuongtrinh', $ten_khungchuongtrinh)
            ->with('all_decuong', $all_decuong);
    }

    public function chinhsuathemmoi($id_decuong, $id_khung) {
        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_decuong', $id_decuong)->first();

        $khungchuongtrinhhientai = $all_decuong->khungchuongtrinh;

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

        $all_nganh = DB::table('table_nganh')->get();

        $list_gvdc = [];

        if(!empty($all_decuong->gv_daycung)) {

            $id_gvdc1 = explode("_", $all_decuong->gv_daycung);

            if(!empty($id_gvdc1)) {
                foreach ($id_gvdc1 as $value) {
                    $gv = DB::table('table_giangvien')->where('id', $value)->first();
                    $child = [];
                    $child["id_gv"] = $gv->id;
                    $child["ten_gv"] = $gv->hodem." ".$gv->ten;
                    $list_gvdc[] = $child;
                }
            }
        }

        $all_cdr_nganh = DB::table('table_chuandaura_chung')->where('id_nganh', $all_decuong->id_nganh)->get();

        $all_clo = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $all_decuong->id_hocphan)
                    ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                    ->get();

        $all_clo_moi = DB::table('table_chuandaura_monhoc')
                                ->where('id_hocphan', $all_decuong->id_hocphan)
                                ->where('khungchuongtrinh', $id_khung)
                                ->get();

        if(!empty($all_clo)) {
            foreach($all_clo as $value_all_clo) {

                $check = 0;

                if(!empty($all_clo_moi)) {
                    foreach($all_clo_moi as $value_all_clo_moi) {
                        if($value_all_clo->stt == $value_all_clo_moi->stt && $value_all_clo->noi_dung == $value_all_clo_moi->noi_dung) {
                            $check = 1;
                            break;
                        } else {
                            $check = 0;
                        }
                    }
                }

                if ($check == 0) {
                    $save_clo = new chuandauramonhoc;
                    $save_clo->stt = $value_all_clo->stt;
                    $save_clo->noi_dung = $value_all_clo->noi_dung;
                    $save_clo->id_hocphan = $value_all_clo->id_hocphan;
                    $save_clo->khungchuongtrinh = $id_khung;
                    $save_clo->save();
                }

            }
        }

        $all_moilienhe_cloplo = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                    ->where('id_hocphan', $all_decuong->id_hocphan)
                    ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                    ->get();

        $all_moilienhe_cloplo_moi = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                                    ->where('id_hocphan', $all_decuong->id_hocphan)
                                    ->where('khungchuongtrinh', $id_khung)
                                    ->get();

        if(!empty($all_moilienhe_cloplo)) {
            foreach($all_moilienhe_cloplo as $value_all_moilienhe_cloplo) {

                $check = 0;

                if(!empty($all_moilienhe_cloplo_moi)) {
                    foreach($all_moilienhe_cloplo_moi as $value_all_moilienhe_cloplo_moi) {
                        if($value_all_moilienhe_cloplo->id_chuandaura_chung == $value_all_moilienhe_cloplo_moi->id_chuandaura_chung 
                        && $value_all_moilienhe_cloplo->id_chuandaura_monhoc == $value_all_moilienhe_cloplo_moi->id_chuandaura_monhoc
                        && $value_all_moilienhe_cloplo->mucdo == $value_all_moilienhe_cloplo_moi->mucdo) {
                            $check = 1;
                            break;
                        } else {
                            $check = 0;
                        }
                    }
                }

                if ($check == 0) {
                    $moilienhe = new moilienhecloplo;
                    $moilienhe->id_chuandaura_chung = $value_all_moilienhe_cloplo->id_chuandaura_chung;
                    $moilienhe->id_chuandaura_monhoc = $value_all_moilienhe_cloplo->id_chuandaura_monhoc;
                    $moilienhe->mucdo = $value_all_moilienhe_cloplo->mucdo;
                    $moilienhe->id_hocphan = $value_all_moilienhe_cloplo->id_hocphan;
                    $moilienhe->khungchuongtrinh = $id_khung;
                    $moilienhe->save();
                }

            }
        }

        $ten_hocphan = DB::table('table_hocphan')->where('id', $all_decuong->id_hocphan)->first()->tenhocphan;

        $all_tltk_giaotrinh = DB::table('table_tailieuthamkhao')
                ->where('loaitailieu', 0)
                ->where('id_hocphan', $all_decuong->id_hocphan)
                ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                ->get();

        $all_tltk_sach = DB::table('table_tailieuthamkhao')
                ->where('loaitailieu', 1)
                ->where('id_hocphan', $all_decuong->id_hocphan)
                ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                ->get();

        return view('admin.decuong.chinhsua_themmoi')
            ->with('all_decuong', $all_decuong)
            ->with('list_gvdc', $list_gvdc)
            ->with('all_nganh', $all_nganh)
            ->with('all_cdr_nganh', $all_cdr_nganh)
            ->with('khungchuongtrinh', $khungchuongtrinh)
            ->with('khungchuongtrinhhientai', $khungchuongtrinhhientai)
            ->with('id_decuong_hientai', $id_decuong)
            ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
            ->with('all_tltk_sach', $all_tltk_sach)
            ->with('ten_hocphan', $ten_hocphan)
            ->with('id_hocphan', $all_decuong->id_hocphan)
            ->with('id_khung', $id_khung);
    }

    public function insert_chinhsuathemmoi(Request $request) {
        $data = $request->all();

        $decuong_check = DB::table('table_decuongchitiet')
                            ->where('id_hocphan', $data['id_ten_hoc_phan'])
                            ->where('khungchuongtrinh', $data['khungchuongtrinh'])
                            ->first();

        if ($decuong_check) {
            return Redirect::to('/admin/decuong/danh-sach-de-cuong/0/146');
        } else {

            $de_cuong = new decuongchitiet;
            $de_cuong->id_hocphan = $data['id_ten_hoc_phan'];
            $de_cuong->phanbo_lythuyet = $data['so_tiet_ly_thuyet'];
            $de_cuong->phanbo_baitap = $data['so_tiet_bai_tap'];
            $de_cuong->phanbo_thuchanh = $data['so_tiet_thuc_hanh'];
            $de_cuong->phanbo_tuhoc = $data['so_tiet_tu_hoc'];
            $de_cuong->giangvienphutrach_id = $data['id_giang_vien_phu_trach'];
            $de_cuong->khungchuongtrinh = $data['khungchuongtrinh'];

            $list_gvdc = "";
            $rs_list_gvdc = "";

            if(isset($request->list_id_gvdc) && $request->list_id_gvdc != null) {
                foreach ($request->list_id_gvdc as $value_listgvdc) {
                    $list_gvdc .= $value_listgvdc."_";
                }
                $rs_list_gvdc = rtrim($list_gvdc, '_');
            }
            
            $de_cuong->gv_daycung = $rs_list_gvdc;
            $de_cuong->khoaphutrach = $data['khoa_phu_trach'];
            $de_cuong->id_nganh = $data['nganh'];
            $de_cuong->loaihocphan = $data['loai_hoc_phan'];
            $de_cuong->khoikienthuc = $data['khoi_kien_thuc'];
            $de_cuong->mota_tomtat = $data['mota_tomtat'];
            $de_cuong->muctieu_kienthuc = $data['muctieu_kienthuc'];
            $de_cuong->muctieu_kynang = $data['muctiey_kynang'];
            $de_cuong->muctieu_thaido = $data['muctieu_thaido'];
            $de_cuong->nhiemvu = $data['nhiemvu'];
            //$de_cuong->tailieuthamkhao_giaotrinh = $data['tltk_giaotrinh'];
            //$de_cuong->tailieuthamkhao_sach = $data['tltk_sach'];
            $de_cuong->ngaypheduyet = strtotime($data['ngay_phe_duyet']);

            $de_cuong->save();

            $tltk_giaotrinh = $this->array_2d($request->tai_lieu_tham_khao_giao_trinh, 6);

            if(!empty($tltk_giaotrinh)) {
                foreach($tltk_giaotrinh as $value_tltk_giaotrinh) {
                    $tailieuthamkhao_giaotrinh = new tailieuthamkhao;
                    $tailieuthamkhao_giaotrinh->tentacgia = $value_tltk_giaotrinh[0];
                    $tailieuthamkhao_giaotrinh->namxuatban = $value_tltk_giaotrinh[1];
                    $tailieuthamkhao_giaotrinh->tensach = $value_tltk_giaotrinh[2];
                    $tailieuthamkhao_giaotrinh->noixuatban = $value_tltk_giaotrinh[3];
                    $tailieuthamkhao_giaotrinh->nhaxuatban = $value_tltk_giaotrinh[4];
                    $tailieuthamkhao_giaotrinh->url = $value_tltk_giaotrinh[5];
                    $tailieuthamkhao_giaotrinh->loaitailieu = 0;
                    $tailieuthamkhao_giaotrinh->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_giaotrinh->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_giaotrinh->save();
                }
            }

            $tltk_sach = $this->array_2d($request->tai_lieu_tham_khao_sach, 6);

            if(!empty($tltk_sach)) {
                foreach($tltk_sach as $value_tltk_sach) {
                    $tailieuthamkhao_sach = new tailieuthamkhao;
                    $tailieuthamkhao_sach->tentacgia = $value_tltk_sach[0];
                    $tailieuthamkhao_sach->namxuatban = $value_tltk_sach[1];
                    $tailieuthamkhao_sach->tensach = $value_tltk_sach[2];
                    $tailieuthamkhao_sach->noixuatban = $value_tltk_sach[3];
                    $tailieuthamkhao_sach->nhaxuatban = $value_tltk_sach[4];
                    $tailieuthamkhao_sach->url = $value_tltk_sach[5];
                    $tailieuthamkhao_sach->loaitailieu = 1;
                    $tailieuthamkhao_sach->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_sach->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_sach->save();
                }
            }
            
            $khungchuongtrinh = $data['khungchuongtrinh'];

            $khungchuongtrinh_hientai = $data['khungchuongtrinh_hientai'];
            $id_hocphan_hientai = $data['id_ten_hoc_phan'];

            $all_danhgiahocphan = DB::table('table_danhgiahocphan')->where('id_hocphan', $id_hocphan_hientai)->where('khungchuongtrinh', $khungchuongtrinh_hientai)->get(); 

            foreach($all_danhgiahocphan as $value_all_danhgiahocphan) {
                $danh_gia_hoc_phan = new danhgiahocphan;
                $danh_gia_hoc_phan->phuongphapdanhgia = $value_all_danhgiahocphan->phuongphapdanhgia;
                $danh_gia_hoc_phan->trongsobaidanhgia = $value_all_danhgiahocphan->trongsobaidanhgia;
                $danh_gia_hoc_phan->id_baidanhgia = $value_all_danhgiahocphan->id_baidanhgia;
                $danh_gia_hoc_phan->id_baidanhgia_parent = $value_all_danhgiahocphan->id_baidanhgia_parent;
                $danh_gia_hoc_phan->id_hocphan = $id_hocphan_hientai;
                $danh_gia_hoc_phan->khungchuongtrinh = $khungchuongtrinh;
                $danh_gia_hoc_phan->cdr_hocphan = $value_all_danhgiahocphan->cdr_hocphan;
                $danh_gia_hoc_phan->save();
            }

            $all_danhgiahocphan = DB::table('table_kehoachgiangday')->where('id_hocphan', $id_hocphan_hientai)->where('khungchuongtrinh', $khungchuongtrinh_hientai)->get(); 
            
            foreach($all_danhgiahocphan as $value_all_danhgiahocphan) {
                $kehoachgiangdaythuchanh = new kehoachgiangday;
                $kehoachgiangdaythuchanh->buoi = $value_all_danhgiahocphan->buoi;
                $kehoachgiangdaythuchanh->noidung = $value_all_danhgiahocphan->noidung;
                $kehoachgiangdaythuchanh->hoatdongdayhoc = $value_all_danhgiahocphan->hoatdongdayhoc;
                $kehoachgiangdaythuchanh->baidanhgia = $value_all_danhgiahocphan->baidanhgia;
                $kehoachgiangdaythuchanh->cdrhocphan = $value_all_danhgiahocphan->cdrhocphan;
                $kehoachgiangdaythuchanh->id_hocphan = $id_hocphan_hientai;
                $kehoachgiangdaythuchanh->thuochocphan = $value_all_danhgiahocphan->thuochocphan;
                $kehoachgiangdaythuchanh->khungchuongtrinh = $khungchuongtrinh;
                $kehoachgiangdaythuchanh->save();
            }

            $all_trongsohocphan = DB::table('table_trongso_hp')->where('id_hp', $id_hocphan_hientai)->where('khungchuongtrinh', $khungchuongtrinh_hientai)->get(); 
            
            foreach($all_trongsohocphan as $value_all_trongsohocphan) {
                $trong_so = new trongsohocphan;
                $trong_so->id_hp = $value_all_trongsohocphan->id_hp;
                $trong_so->id_trongso = $value_all_trongsohocphan->id_trongso;
                $trong_so->trongso = $value_all_trongsohocphan->trongso;
                $trong_so->trangthai = 0;
                $trong_so->khungchuongtrinh = $khungchuongtrinh;
                $trong_so->save();
            }

            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);

        }

    }

    public function themdecuongadmin() {
    	
    	$all_cdr_chung = DB::table('table_chuandaura_chung')->limit(3)->get();

        $all_nganh = DB::table('table_nganh')->get();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

    	return view('admin.decuong.them_decuong_admin')
                ->with('all_cdr_chung', $all_cdr_chung)
                ->with('all_nganh', $all_nganh)
                ->with('khungchuongtrinh', $khungchuongtrinh);
    }

    public function themdecuong($id_hocphan, $id_khung) {
        $all_cdr_chung = DB::table('table_chuandaura_chung')->limit(3)->get();

        $all_nganh = DB::table('table_nganh')->get();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

        $ten_hocphan = DB::table('table_hocphan')->where('id', $id_hocphan)->first()->tenhocphan;

    	return view('admin.decuong.them_decuong')
                ->with('all_cdr_chung', $all_cdr_chung)
                ->with('all_nganh', $all_nganh)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung);
    }

    public function data_chuyen_nganh($data, $parent_id = 0) {
        $result = [];
        $result_parent = [];
        $result_child = [];
        $id_chuyennganh = 0;
        foreach ($data as $value_child) {

            if ($value_child->id == $parent_id) {
                $result_child[] = $value_child;
                $id_chuyennganh = $value_child->id_chuyennganh;
            }    
        }

        foreach ($data as $value_parent) {

            if ($value_parent->id == $id_chuyennganh) {
                $result_parent[] = $value_parent;
            }    
        }

        $result = array_merge($result_parent, $result_child);
        return $result;
    }

    public function editdecuong($id_decuong) {

        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_decuong', $id_decuong)->first();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

        $all_nganh = DB::table('table_nganh')->get();

        $list_gvdc = [];

        if($all_decuong->gv_daycung != null) {
            $id_gvdc1 = explode("_", $all_decuong->gv_daycung);

            foreach ($id_gvdc1 as $value) {
                $gv = DB::table('table_giangvien')->where('id', $value)->first();
                $child = [];
                $child["id_gv"] = $gv->id;
                $child["ten_gv"] = $gv->hodem." ".$gv->ten;
                $list_gvdc[] = $child;
            }
        }

        $id_hocphan = $all_decuong->id_hocphan;
        $id_khung = $all_decuong->khungchuongtrinh;

        $ten_hocphan = DB::table('table_hocphan')->where('id', $all_decuong->id_hocphan)->first()->tenhocphan;

        $all_cdr_nganh = DB::table('table_chuandaura_chung')->where('id_nganh', $all_decuong->id_nganh)->get();

        // $all_chuandaura = DB::table('table_chuandaura_monhoc')->where('id_decuong', $id_decuong)
        // ->distinct()->get();

        $all_cdr_chung = DB::table('table_chuandaura_chung')->get();

        $all_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id_hocphan', $all_decuong->id_hocphan)
                        ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                        ->get();

        $all_chuandaura = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $all_decuong->id_hocphan)
                        ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)  
                        ->get();

        $all_tltk_giaotrinh = DB::table('table_tailieuthamkhao')
                                ->where('loaitailieu', 0)
                                ->where('id_hocphan', $all_decuong->id_hocphan)
                                ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                                ->get();

        $all_tltk_sach = DB::table('table_tailieuthamkhao')
                                ->where('loaitailieu', 1)
                                ->where('id_hocphan', $all_decuong->id_hocphan)
                                ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                                ->get();

        return view('admin.decuong.sua_decuong')->with('all_cdr_chung', $all_cdr_chung)
        ->with('all_decuong', $all_decuong)->with('list_gvdc', $list_gvdc)
        ->with('ten_hocphan', $ten_hocphan)
        ->with('all_nganh', $all_nganh)
        ->with('all_cdr_nganh', $all_cdr_nganh)
        ->with('khungchuongtrinh', $khungchuongtrinh)
        ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
        ->with('all_tltk_sach', $all_tltk_sach)
        ->with('id_hocphan', $id_hocphan)
        ->with('id_khung', $id_khung)
        ->with('all_moilienhe', $all_moilienhe)
        ->with('all_chuandaura', $all_chuandaura);
    }

    public function danhsachdecuong($id_khoa, $khungchuongtrinh) {
        

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $ten_khungchuongtrinh = DB::table('table_khungchuongtrinh')->where('id', $khungchuongtrinh)->first()->tenkhungchuongtrinh;

        if ($id_khoa == 0) {
            $all_decuong = DB::table('table_decuongchitiet')
            ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
            ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
            ->where('table_decuongchitiet.khungchuongtrinh', $khungchuongtrinh)
            ->get();
            $ten_khoa = '';
        } else {
            $all_decuong = DB::table('table_decuongchitiet')
            ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
            ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
            ->where('khoaphutrach', $id_khoa)
            ->where('table_decuongchitiet.khungchuongtrinh', $khungchuongtrinh)
            ->get();
            $list_ds_khoa = DB::table('table_khoa')->where('id', $id_khoa)->first();
            $ten_khoa = $list_ds_khoa->tenKhoa;
        }

        $danhsach_danhgiahocphan = DB::table('table_danhgiahocphan')->select('id_hocphan')->where('khungchuongtrinh', $khungchuongtrinh)->distinct()->get();
        $danhsach_kehoachgiangday = DB::table('table_kehoachgiangday')->select('id_hocphan')->where('khungchuongtrinh', $khungchuongtrinh)->distinct()->get();

        foreach($all_decuong as $value_all_decuong) {

            $value_all_decuong->has_dghp = 0;

            foreach($danhsach_danhgiahocphan as $value_ds_dghp) {
                if ($value_ds_dghp->id_hocphan == $value_all_decuong->id_hocphan) {
                    $value_all_decuong->has_dghp = 1;
                    break;
                } else {
                    $value_all_decuong->has_dghp = 0;
                }
            }

            $value_all_decuong->has_khgd = 0;

            foreach($danhsach_kehoachgiangday as $value_ds_khgd) {
                if ($value_ds_khgd->id_hocphan == $value_all_decuong->id_hocphan) {
                    $value_all_decuong->has_khgd = 1;
                    break;
                } else {
                    $value_all_decuong->has_khgd = 0;
                }
            }

        }

        return view('admin.decuong.danhsach_decuong')
        ->with('all_decuong', $all_decuong)
        ->with('ten_khoa', $ten_khoa)
        ->with('id_khoa', $id_khoa)
        ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
        ->with('khungchuongtrinh', $khungchuongtrinh)
        ->with('ten_khungchuongtrinh', $ten_khungchuongtrinh);
    }

    public function tao_decuong(Request $request) {

        $data = $request->all();

        $decuong_check = DB::table('table_decuongchitiet')
                            ->where('id_hocphan', $data['id_ten_hoc_phan'])
                            ->where('khungchuongtrinh', $data['khungchuongtrinh'])
                            ->first();

        if ($decuong_check) {
            return Redirect::to('/admin/decuong/danh-sach-de-cuong/0/146');
        } else {

            $de_cuong = new decuongchitiet;
            $de_cuong->id_hocphan = $data['id_ten_hoc_phan'];
            $de_cuong->phanbo_lythuyet = $data['so_tiet_ly_thuyet'];
            $de_cuong->phanbo_baitap = $data['so_tiet_bai_tap'];
            $de_cuong->phanbo_thuchanh = $data['so_tiet_thuc_hanh'];
            $de_cuong->phanbo_tuhoc = $data['so_tiet_tu_hoc'];
            $de_cuong->giangvienphutrach_id = $data['id_giang_vien_phu_trach'];
            $de_cuong->khungchuongtrinh = $data['khungchuongtrinh'];

            $list_gvdc = "";
            $rs_list_gvdc = "";

            if(isset($request->list_id_gvdc) && $request->list_id_gvdc != null) {
                foreach ($request->list_id_gvdc as $value_listgvdc) {
                    $list_gvdc .= $value_listgvdc."_";
                }
                $rs_list_gvdc = rtrim($list_gvdc, '_');
            }
            
            $de_cuong->gv_daycung = $rs_list_gvdc;
            $de_cuong->khoaphutrach = $data['khoa_phu_trach'];
            $de_cuong->id_nganh = $data['nganh'];
            $de_cuong->loaihocphan = $data['loai_hoc_phan'];
            $de_cuong->khoikienthuc = $data['khoi_kien_thuc'];
            $de_cuong->mota_tomtat = $data['mota_tomtat'];
            $de_cuong->muctieu_kienthuc = $data['muctieu_kienthuc'];
            $de_cuong->muctieu_kynang = $data['muctiey_kynang'];
            $de_cuong->muctieu_thaido = $data['muctieu_thaido'];
            $de_cuong->nhiemvu = $data['nhiemvu'];
            //$de_cuong->tailieuthamkhao_giaotrinh = $data['tltk_giaotrinh'];
            //$de_cuong->tailieuthamkhao_sach = $data['tltk_sach'];
            $de_cuong->ngaypheduyet = strtotime($data['ngay_phe_duyet']);

            $de_cuong->save();

            $tltk_giaotrinh = $this->array_2d($request->tai_lieu_tham_khao_giao_trinh, 6);

            if(!empty($tltk_giaotrinh)) {
                foreach($tltk_giaotrinh as $value_tltk_giaotrinh) {
                    $tailieuthamkhao_giaotrinh = new tailieuthamkhao;
                    $tailieuthamkhao_giaotrinh->tentacgia = $value_tltk_giaotrinh[0];
                    $tailieuthamkhao_giaotrinh->namxuatban = $value_tltk_giaotrinh[1];
                    $tailieuthamkhao_giaotrinh->tensach = $value_tltk_giaotrinh[2];
                    $tailieuthamkhao_giaotrinh->noixuatban = $value_tltk_giaotrinh[3];
                    $tailieuthamkhao_giaotrinh->nhaxuatban = $value_tltk_giaotrinh[4];
                    $tailieuthamkhao_giaotrinh->url = $value_tltk_giaotrinh[5];
                    $tailieuthamkhao_giaotrinh->loaitailieu = 0;
                    $tailieuthamkhao_giaotrinh->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_giaotrinh->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_giaotrinh->save();
                }
            }

            $tltk_sach = $this->array_2d($request->tai_lieu_tham_khao_sach, 6);

            if(!empty($tltk_sach)) {
                foreach($tltk_sach as $value_tltk_sach) {
                    $tailieuthamkhao_sach = new tailieuthamkhao;
                    $tailieuthamkhao_sach->tentacgia = $value_tltk_sach[0];
                    $tailieuthamkhao_sach->namxuatban = $value_tltk_sach[1];
                    $tailieuthamkhao_sach->tensach = $value_tltk_sach[2];
                    $tailieuthamkhao_sach->noixuatban = $value_tltk_sach[3];
                    $tailieuthamkhao_sach->nhaxuatban = $value_tltk_sach[4];
                    $tailieuthamkhao_sach->url = $value_tltk_sach[5];
                    $tailieuthamkhao_sach->loaitailieu = 1;
                    $tailieuthamkhao_sach->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_sach->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_sach->save();
                }
            }

            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);

        }

    }

    public function sua_decuong($id_decuong, Request $request) {
        $data = $request->all();

        $check = TRUE;

        $decuong_check = DB::table('table_decuongchitiet')->get();

        foreach($decuong_check as $value_decuong_check) {

            if ($value_decuong_check->id_hocphan == $data['id_ten_hoc_phan'] 
                && $value_decuong_check->khungchuongtrinh == $data['khungchuongtrinh']
                && $value_decuong_check->id_decuong != $id_decuong) {
                    $check = FALSE;
                    break;
                }
        }

        if ($check == FALSE) {
            Session::put('response_faild', 'Chỉnh sửa thất bại !!! Đề cương chỉnh sửa đã tồn tại');
            return Redirect::to('/admin/decuong/danh-sach-de-cuong/0/146');
        } else {

            $de_cuong = decuongchitiet::find($id_decuong);
            $de_cuong->id_hocphan = $data['id_ten_hoc_phan'];
            $de_cuong->phanbo_lythuyet = $data['so_tiet_ly_thuyet'];
            $de_cuong->phanbo_baitap = $data['so_tiet_bai_tap'];
            $de_cuong->phanbo_thuchanh = $data['so_tiet_thuc_hanh'];
            $de_cuong->phanbo_tuhoc = $data['so_tiet_tu_hoc'];
            $de_cuong->giangvienphutrach_id = $data['id_giang_vien_phu_trach'];
            $de_cuong->khungchuongtrinh = $data['khungchuongtrinh'];

            $list_gvdc = "";
            $rs_list_gvdc = "";
            
            if(isset($request->list_id_gvdc) && $request->list_id_gvdc != null) {
                foreach ($request->list_id_gvdc as $value_listgvdc) {
                    $list_gvdc .= $value_listgvdc."_";
                }
                $rs_list_gvdc = rtrim($list_gvdc, '_');
            }
            
            $de_cuong->gv_daycung = $rs_list_gvdc;
            $de_cuong->khoaphutrach = $data['khoa_phu_trach'];
            $de_cuong->id_nganh = $data['nganh'];
            $de_cuong->loaihocphan = $data['loai_hoc_phan'];
            $de_cuong->khoikienthuc = $data['khoi_kien_thuc'];
            $de_cuong->mota_tomtat = $data['mota_tomtat'];
            $de_cuong->muctieu_kienthuc = $data['muctieu_kienthuc'];
            $de_cuong->muctieu_kynang = $data['muctiey_kynang'];
            $de_cuong->muctieu_thaido = $data['muctieu_thaido'];
            $de_cuong->nhiemvu = $data['nhiemvu'];
            //$de_cuong->tailieuthamkhao_giaotrinh = $data['tltk_giaotrinh'];
            //$de_cuong->tailieuthamkhao_sach = $data['tltk_sach'];
            $de_cuong->ngaypheduyet = strtotime($data['ngay_phe_duyet']);

            $de_cuong->save();

            $deletetltk = tailieuthamkhao::where('id_hocphan', $data['id_ten_hoc_phan'])->where('khungchuongtrinh', $data['khungchuongtrinh']);
            if (isset($deletetltk)) {
                $deletetltk->delete();
            }

            $tltk_giaotrinh = $this->array_2d($request->tai_lieu_tham_khao_giao_trinh, 6);

            if(!empty($tltk_giaotrinh)) {
                foreach($tltk_giaotrinh as $value_tltk_giaotrinh) {
                    $tailieuthamkhao_giaotrinh = new tailieuthamkhao;
                    $tailieuthamkhao_giaotrinh->tentacgia = $value_tltk_giaotrinh[0];
                    $tailieuthamkhao_giaotrinh->namxuatban = $value_tltk_giaotrinh[1];
                    $tailieuthamkhao_giaotrinh->tensach = $value_tltk_giaotrinh[2];
                    $tailieuthamkhao_giaotrinh->noixuatban = $value_tltk_giaotrinh[3];
                    $tailieuthamkhao_giaotrinh->nhaxuatban = $value_tltk_giaotrinh[4];
                    $tailieuthamkhao_giaotrinh->url = $value_tltk_giaotrinh[5];
                    $tailieuthamkhao_giaotrinh->loaitailieu = 0;
                    $tailieuthamkhao_giaotrinh->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_giaotrinh->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_giaotrinh->save();
                }
            }

            $tltk_sach = $this->array_2d($request->tai_lieu_tham_khao_sach, 6);

            if(!empty($tltk_sach)) {
                foreach($tltk_sach as $value_tltk_sach) {
                    $tailieuthamkhao_sach = new tailieuthamkhao;
                    $tailieuthamkhao_sach->tentacgia = $value_tltk_sach[0];
                    $tailieuthamkhao_sach->namxuatban = $value_tltk_sach[1];
                    $tailieuthamkhao_sach->tensach = $value_tltk_sach[2];
                    $tailieuthamkhao_sach->noixuatban = $value_tltk_sach[3];
                    $tailieuthamkhao_sach->nhaxuatban = $value_tltk_sach[4];
                    $tailieuthamkhao_sach->url = $value_tltk_sach[5];
                    $tailieuthamkhao_sach->loaitailieu = 1;
                    $tailieuthamkhao_sach->id_hocphan = $data['id_ten_hoc_phan'];
                    $tailieuthamkhao_sach->khungchuongtrinh = $data['khungchuongtrinh'];
                    $tailieuthamkhao_sach->save();
                }
            }

            Session::put('response_succ', 'Chỉnh sửa thành công');

            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);

        }
 
    }

    public function array_2d($array, $col_count=2){
    	$result = false;
    	if(!empty($array) && is_array($array)){
    		$row_count = ceil( count($array) / $col_count);
    		$pointer = 0;
    		for($row=0; $row < $row_count; $row++) {
    			for($col=0; $col < $col_count; ++$col){
    				$result[$row][$col] = $array[$pointer];
    				$pointer++;
    			}
    		}
    	}
    	return $result;
    }

    public function xoa_decuong($id_decuong) {

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();

        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $deletedghp = danhgiahocphan::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletedghp)) {
            $deletedghp->delete();
        }
        
        $deletetslhp = trongsohocphan::where('id_hp', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletetslhp)) {
            $deletetslhp->delete();
        }

        $deletekhgd = kehoachgiangday::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletekhgd)) {
            $deletekhgd->delete();
        }

        $deletecdrmh = chuandauramonhoc::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletecdrmh)) {
            $deletecdrmh->delete();
        }

        $deletemlh = moilienhecloplo::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletemlh)) {
            $deletemlh->delete();
        }

        $deletetltk = tailieuthamkhao::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletetltk)) {
            $deletetltk->delete();
        }

        $delete_dc = decuongchitiet::find($id_decuong);
        $delete_dc->delete();

        return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);

    }

    public function xem_de_cuong($id_decuong) {

        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->join('table_khoa', 'table_decuongchitiet.khoaphutrach', 'table_khoa.id')
        ->join('table_nganh', 'table_decuongchitiet.id_nganh', 'table_nganh.id')
        ->where('table_decuongchitiet.id_decuong', $id_decuong)->first();

        $list_gvdc = [];

        if($all_decuong->gv_daycung != null) {
            $id_gvdc1 = explode("_", $all_decuong->gv_daycung);
            foreach ($id_gvdc1 as $value) {
                $gv = DB::table('table_giangvien')->where('id', $value)->first();
                $list_gvdc[] = $gv->hodem." ".$gv->ten;
            }
        }

        $all_cdr = 0;

        // $all_cdr = DB::table('table_chuandaura_monhoc')
        //             ->where('id_decuong', $id_decuong)
        //             ->get();

        $decuong_dghp = DB::table('table_decuongchitiet')->select('id_hocphan', 'khungchuongtrinh')->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $all_dghp = DB::table('table_danhgiahocphan')
                    ->join('table_thanhphandanhgia', 'table_danhgiahocphan.id_baidanhgia','table_thanhphandanhgia.id')
                    ->where('table_danhgiahocphan.id_hocphan', $id_hocphan)
                    ->where('table_danhgiahocphan.khungchuongtrinh', $khungchuongtrinh)
                    ->get();

        $all_trongso = DB::table('table_trongso_hp')
                        ->where('id_hp', $id_hocphan)
                        ->where('khungchuongtrinh', $khungchuongtrinh)
                        ->get();

        $all_baidanhgia = array();

        foreach($all_dghp as $vl_dghp_bdg) {
            $all_baidanhgia[] = $vl_dghp_bdg->id_baidanhgia_parent;
            $vl_dghp_bdg->cdr_hocphan = explode("_", $vl_dghp_bdg->cdr_hocphan);
        }

        $dghp_parent = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();

        foreach($all_dghp as $value_child) {
            foreach($dghp_parent as $value_parent) {
                if ($value_child->id_baidanhgia_parent == $value_parent->id) {
                    $value_child->ten_thanhphandanhgia_parent = $value_parent->ten_thanhphandanhgia;
                }
            }   
        }
 
        $len = count($all_dghp);

        for ($i = 0; $i < $len; $i++) {
            $temp = $all_dghp[$i];
            $j = $i;
            for ($k = 0; $k < $len; $k++) {
                if ($k != $j) {
                    if ($temp->id_baidanhgia_parent == $all_dghp[$k]->id_baidanhgia_parent) {
                        $all_dghp[$k-1]->id_baidanhgia_parent=100;
                        $all_dghp[$k-1]->Level = 0;
                        $all_dghp[$k]->id_baidanhgia_parent=111;
                        $all_dghp[$k]->Level = 1;
                    } 
                }
            }
        }

        $baidanhgia = array();
        $i = 1;
        foreach($all_dghp as $vl_bdg) {

            if (isset($vl_bdg->Level)) {
                if ($vl_bdg->Level == 1) {
                    $baidanhgia[] = "A".$i.".2";
                    $i++;
                } else {
                    $baidanhgia[] = "A".$i.".1";
                    
                }
            } else {
                $baidanhgia[] = "A".$i.".1";
                $i++;
            }
        }

        $all_kehoachgiangday_lt = DB::table('table_kehoachgiangday')
                                    ->where('thuochocphan', '0')
                                    ->where('id_hocphan', $id_hocphan)
                                    ->where('khungchuongtrinh', $khungchuongtrinh)
                                    ->get();

        $all_kehoachgiangday_th = DB::table('table_kehoachgiangday')
                                    ->where('thuochocphan', '1')
                                    ->where('id_hocphan', $id_hocphan)
                                    ->where('khungchuongtrinh', $khungchuongtrinh)
                                    ->get();
        
        foreach($all_kehoachgiangday_lt as $vl_kehoachgiangday_lt) {
            $vl_kehoachgiangday_lt->noidung = $this->xem_decuong_khgd($vl_kehoachgiangday_lt->noidung);
            $vl_kehoachgiangday_lt->hoatdongdayhoc = $this->xem_decuong_khgd($vl_kehoachgiangday_lt->hoatdongdayhoc);
            $vl_kehoachgiangday_lt->cdrhocphan = explode("_", $vl_kehoachgiangday_lt->cdrhocphan);
            $vl_kehoachgiangday_lt->baidanhgia = explode("_", $vl_kehoachgiangday_lt->baidanhgia);
        }

        foreach($all_kehoachgiangday_th as $vl_kehoachgiangday_th) {
            $vl_kehoachgiangday_th->noidung = $this->xem_decuong_khgd($vl_kehoachgiangday_th->noidung);
            $vl_kehoachgiangday_th->hoatdongdayhoc = $this->xem_decuong_khgd($vl_kehoachgiangday_th->hoatdongdayhoc);
            $vl_kehoachgiangday_th->cdrhocphan = explode("_", $vl_kehoachgiangday_th->cdrhocphan);
            $vl_kehoachgiangday_th->baidanhgia = explode("_", $vl_kehoachgiangday_th->baidanhgia);
        }

        $all_tailieuthamkhao_giaotrinh = DB::table('table_tailieuthamkhao')
                                        ->where('id_hocphan', $all_decuong->id_hocphan)
                                        ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                                        ->where('loaitailieu', 0)
                                        ->get();

        $all_tailieuthamkhao_sach = DB::table('table_tailieuthamkhao')
                                    ->where('id_hocphan', $all_decuong->id_hocphan)
                                    ->where('loaitailieu', 1)
                                    ->get();

        return view('xem_de_cuong')->with('all_decuong', $all_decuong)->with('list_gvdc', $list_gvdc)
        ->with('all_cdr', $all_cdr)->with('all_dghp', $all_dghp)->with('baidanhgia', $baidanhgia)->with('id_decuong', $id_decuong)
        ->with('all_kehoachgiangday_lt', $all_kehoachgiangday_lt)->with('all_kehoachgiangday_th', $all_kehoachgiangday_th)
        ->with('all_trongso', $all_trongso)
        ->with('all_tailieuthamkhao_giaotrinh', $all_tailieuthamkhao_giaotrinh)
        ->with('all_tailieuthamkhao_sach', $all_tailieuthamkhao_sach);
    }

    public function xem_decuong_khgd($string) {

        $tach = explode("_", $string);
    
        return $tach;

    }

    public function cau_truc_ct_dt() {
        return view('pages_2.cau_truc_chuong_trinh_dt');
    }

    public function danh_gia_hoc_phan($id_decuong) {

        $all_cdr = DB::table('table_chuandaura_monhoc')->where('id_decuong', $id_decuong)->get();

        $all_tpdg = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();

        $all_tpdg_child = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', '!=', 0)->get();

        foreach($all_tpdg_child as $value) {
            foreach($all_tpdg as $value2) {
                if($value2->id == $value->id_baidanhgia) {
                    $value->parent = $value2->ten_thanhphandanhgia;
                }
            }
        }

        $lenght = count($all_tpdg_child);

        for ($i = 0; $i < $lenght; $i ++) {
            $temp = $all_tpdg_child[$i];

            for ($k = $i + 1; $k < $lenght; $k ++) {
                if($all_tpdg_child[$k]->id_baidanhgia == $temp->id_baidanhgia) {
                    $temp->has_child = 1;
                    $all_tpdg_child[$i+1]->child = 1;
                    break;
                } 
            }
        }
 
        return view('admin.decuong.danh_gia_hoc_phan')->with('all_cdr', $all_cdr)->with('all_tpdg', $all_tpdg)->with('all_tpdg_child', $all_tpdg_child)->with('id_decuong', $id_decuong);

    }

    public function insert_danh_gia_hoc_phan($id_decuong, Request $request) {

        $trong_so_thanh_phan = $request->trong_so_thanh_phan;
        $data_dghp = $this->array_2d($request->bai_danh_gia, 4);

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $chuandaura = $request->chuan_dau_ra;

        $trongsothanhphan1 = $request->trong_so_thanh_phan_1;
        $trongsothanhphan2 = $request->trong_so_thanh_phan_2;
        $trongsothanhphan3 = $request->trong_so_thanh_phan_3;
        $trongsothanhphan4 = $request->trong_so_thanh_phan_4;

        $trong_so_1 = new trongsohocphan;
        $trong_so_1->id_hp = $id_hocphan;
        $trong_so_1->id_trongso = 1;
        $trong_so_1->trongso = $trongsothanhphan1/100;
        $trong_so_1->trangthai = 0;
        $trong_so_1->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_1->save();

        $trong_so_2 = new trongsohocphan;
        $trong_so_2->id_hp = $id_hocphan;
        $trong_so_2->id_trongso = 2;
        $trong_so_2->trongso = $trongsothanhphan2/100;
        $trong_so_2->trangthai = 0;
        $trong_so_2->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_2->save();

        $trong_so_3 = new trongsohocphan;
        $trong_so_3->id_hp = $id_hocphan;
        $trong_so_3->id_trongso = 3;
        $trong_so_3->trongso = $trongsothanhphan3/100;
        $trong_so_3->trangthai = 0;
        $trong_so_3->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_3->save();

        $trong_so_4 = new trongsohocphan;
        $trong_so_4->id_hp = $id_hocphan;
        $trong_so_4->id_trongso = 4;
        $trong_so_4->trongso = $trongsothanhphan4/100;
        $trong_so_4->trangthai = 0;
        $trong_so_4->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_4->save();

 
        if($data_dghp != null) {
            foreach ($data_dghp as $value_data_dghp) {
                $danh_gia_hoc_phan = new danhgiahocphan;
                $danh_gia_hoc_phan->phuongphapdanhgia = $value_data_dghp[0];
                $danh_gia_hoc_phan->trongsobaidanhgia = $value_data_dghp[1];
                $danh_gia_hoc_phan->id_baidanhgia = $value_data_dghp[3];
                $danh_gia_hoc_phan->id_baidanhgia_parent = $value_data_dghp[2];
                $danh_gia_hoc_phan->id_hocphan = $id_hocphan;
                $danh_gia_hoc_phan->khungchuongtrinh = $khungchuongtrinh;
    
                $cdr_hocphan = "";
    
                if(isset($chuandaura) && $chuandaura != null) {
                    foreach($chuandaura as $value_chuandaura) {
                        $value_chuandaura = explode("_", $value_chuandaura);
                     
                        if((integer)$value_chuandaura[0] == $value_data_dghp[3]) {
                            $cdr_hocphan .= $value_chuandaura[1]."_";
                        }
                    }
        
                    $cdr_hocphan = rtrim($cdr_hocphan, '_');
                }
    
                $danh_gia_hoc_phan->cdr_hocphan = $cdr_hocphan;
    
                $danh_gia_hoc_phan->save();
            }
        }

        return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);
    }

    public function edit_danh_gia_hoc_phan($id_decuong) {

        $all_cdr = DB::table('table_chuandaura_monhoc')->where('id_decuong', $id_decuong)->get();

        $all_tpdg = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();
        $all_tpdg_child = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', '!=', 0)->get();

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $all_danhgiahocphan = DB::table('table_danhgiahocphan')
                                ->where('id_hocphan', $id_hocphan)
                                ->where('khungchuongtrinh', $khungchuongtrinh)->get();

        foreach($all_tpdg_child as $value) {
            foreach($all_tpdg as $value2) {
                if($value2->id == $value->id_baidanhgia) {
                    $value->parent = $value2->ten_thanhphandanhgia;
                }
            }
        }
        $lenght = count($all_tpdg_child);
        for ($i = 0; $i < $lenght; $i ++) {
            $temp = $all_tpdg_child[$i];
            for ($k = $i + 1; $k < $lenght; $k ++) {
                if($all_tpdg_child[$k]->id_baidanhgia == $temp->id_baidanhgia) {
                    $temp->has_child = 1;
                    $all_tpdg_child[$i+1]->child = 1;
                    $temp->has_child_exits=1;
                    $all_tpdg_child[$i+1]->has_child_exits = 1;
                    break;
                } 
            }

            if(!isset($temp->has_child_exits)) {
                $temp->has_child_exits=0;
            }
        }

        $all_trongsothanhphan = DB::table('table_trongso_hp')->where('id_hp', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh)->get();

        foreach($all_tpdg as $vl_all_tpdg) {
            $vl_all_tpdg->has_id_tstp = 0;
            foreach($all_trongsothanhphan as $vl_all_trongsothanhphan) {
                if($vl_all_tpdg->id == $vl_all_trongsothanhphan->id_trongso) {
                    $vl_all_tpdg->has_id_tstp = 1;
                    $vl_all_tpdg->trongso = $vl_all_trongsothanhphan->trongso;
                    break;
                } else {
                    $vl_all_tpdg->has_id_tstp = 0;
                }
            }
        }

        foreach($all_danhgiahocphan as $vl_dghp_cdr) {
            $vl_dghp_cdr->cdr_hocphan = explode("_", $vl_dghp_cdr->cdr_hocphan);
        }

        $array_chuandaura = array();

        foreach($vl_dghp_cdr->cdr_hocphan as $value) {
            $array_chuandaura[] = $value;
        }

        $stt_cdr = 1;
        foreach($all_cdr as $vl) {
            $vl->has_cdr = 0;
            $vl->stt = $stt_cdr;
            for($i = 0; $i < count($array_chuandaura); $i++) {
                if($array_chuandaura[$i] == $stt_cdr) {
                    $vl->has_cdr = 1;
                }
            }
            $stt_cdr++;
        }

        foreach($all_tpdg_child as $value_result ) {
            $value_result->has_exits = 0;
            foreach($all_danhgiahocphan as $value_result2) {
                if($value_result->id == $value_result2->id_baidanhgia) {
                    $value_result->phuongphapdanhgia = $value_result2->phuongphapdanhgia;
                    $value_result->trongsobaidanhgia = $value_result2->trongsobaidanhgia;
                    $value_result->cdr_hocphan = $value_result2->cdr_hocphan;
                    $value_result->has_exits = 1;
                }
            }
        }

        foreach($all_tpdg_child as $value ) {
            foreach($all_tpdg as $value2) {
                if($value->parent == $value2->ten_thanhphandanhgia) {
                    if(isset($value2->trongso)) {
                        $value->trongso = $value2->trongso;    
                    }  
                } 
            }
        }

        return view('admin.decuong.sua_danh_gia_hoc_phan')->with('all_cdr', $all_cdr)->with('all_tpdg', $all_tpdg)
        ->with('all_tpdg_child', $all_tpdg_child)->with('id_decuong', $id_decuong)
        ->with('all_danhgiahocphan', $all_danhgiahocphan)->with('all_trongsothanhphan', $all_trongsothanhphan)
        ->with('array_chuandaura', $array_chuandaura);

    }

    public function insert_edit_danh_gia_hoc_phan($id_decuong, Request $request) {

        $trong_so_thanh_phan = $request->trong_so_thanh_phan;
        $data_dghp = $this->array_2d($request->bai_danh_gia, 4);

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $deletedghp = danhgiahocphan::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        $deletedghp->delete();

        $deletetslhp = trongsohocphan::where('id_hp', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        $deletetslhp->delete();

        $chuandaura = $request->chuan_dau_ra;
        
        $trongsothanhphan1 = $request->trong_so_thanh_phan_1;
        $trongsothanhphan2 = $request->trong_so_thanh_phan_2;
        $trongsothanhphan3 = $request->trong_so_thanh_phan_3;
        $trongsothanhphan4 = $request->trong_so_thanh_phan_4;

        $trong_so_1 = new trongsohocphan;
        $trong_so_1->id_hp = $id_hocphan;
        $trong_so_1->id_trongso = 1;
        $trong_so_1->trongso = $trongsothanhphan1/100;
        $trong_so_1->trangthai = 0;
        $trong_so_1->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_1->save();

        $trong_so_2 = new trongsohocphan;
        $trong_so_2->id_hp = $id_hocphan;
        $trong_so_2->id_trongso = 2;
        $trong_so_2->trongso = $trongsothanhphan2/100;
        $trong_so_2->trangthai = 0;
        $trong_so_2->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_2->save();

        $trong_so_3 = new trongsohocphan;
        $trong_so_3->id_hp = $id_hocphan;
        $trong_so_3->id_trongso = 3;
        $trong_so_3->trongso = $trongsothanhphan3/100;
        $trong_so_3->trangthai = 0;
        $trong_so_3->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_3->save();

        $trong_so_4 = new trongsohocphan;
        $trong_so_4->id_hp = $id_hocphan;
        $trong_so_4->id_trongso = 4;
        $trong_so_4->trongso = $trongsothanhphan4/100;
        $trong_so_4->trangthai = 0;
        $trong_so_4->khungchuongtrinh = $khungchuongtrinh;
        $trong_so_4->save();

        if($data_dghp != null) {
            foreach ($data_dghp as $value_data_dghp) {
                $danh_gia_hoc_phan = new danhgiahocphan;
                $danh_gia_hoc_phan->phuongphapdanhgia = $value_data_dghp[0];
                $danh_gia_hoc_phan->trongsobaidanhgia = $value_data_dghp[1];
                $danh_gia_hoc_phan->id_baidanhgia = $value_data_dghp[3];
                $danh_gia_hoc_phan->id_baidanhgia_parent = $value_data_dghp[2];
                $danh_gia_hoc_phan->id_hocphan = $id_hocphan;
                $danh_gia_hoc_phan->khungchuongtrinh = $khungchuongtrinh;
    
                $cdr_hocphan = "";
    
                if(isset($chuandaura) && $chuandaura != null) {
                    foreach($chuandaura as $value_chuandaura) {
                        $value_chuandaura = explode("_", $value_chuandaura);                    
                        if((integer)$value_chuandaura[0] == $value_data_dghp[3]) {
                            $cdr_hocphan .= $value_chuandaura[1]."_";
                        }
                    }
                    $cdr_hocphan = rtrim($cdr_hocphan, '_');
                }
    
                $danh_gia_hoc_phan->cdr_hocphan = $cdr_hocphan;    
                $danh_gia_hoc_phan->save();
            }
        }

        return Redirect::to('admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);

    }

    public function ke_hoach_giang_day($id_decuong) {

        $all_cdr = DB::table('table_chuandaura_monhoc')->where('id_decuong', $id_decuong)->get();

        $decuong_dghp = DB::table('table_decuongchitiet')->select('id_hocphan')->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;

        $all_dghp = DB::table('table_danhgiahocphan')->join('table_thanhphandanhgia', 'table_danhgiahocphan.id_baidanhgia'
        ,'table_thanhphandanhgia.id')->where('table_danhgiahocphan.id_hocphan', $id_hocphan)->get();

        $all_trongso = DB::table('table_trongso_hp')->where('id_hp', $id_hocphan)->get();

        $all_baidanhgia = array();

        foreach($all_dghp as $vl_dghp_bdg) {
            $all_baidanhgia[] = $vl_dghp_bdg->id_baidanhgia_parent;
            $vl_dghp_bdg->cdr_hocphan = explode("_", $vl_dghp_bdg->cdr_hocphan);
        }

        $dghp_parent = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();


        foreach($all_dghp as $value_child) {
            foreach($dghp_parent as $value_parent) {
                if ($value_child->id_baidanhgia_parent == $value_parent->id) {
                    $value_child->ten_thanhphandanhgia_parent = $value_parent->ten_thanhphandanhgia;
                }
            }   
        }
 
        $len = count($all_dghp);

        for ($i = 0; $i < $len; $i++) {
            $temp = $all_dghp[$i];
            $j = $i;
            for ($k = 0; $k < $len; $k++) {
                if ($k != $j) {
                    if ($temp->id_baidanhgia_parent == $all_dghp[$k]->id_baidanhgia_parent) {
                        $all_dghp[$k-1]->id_baidanhgia_parent=100;
                        $all_dghp[$k-1]->Level = 0;
                        $all_dghp[$k]->id_baidanhgia_parent=111;
                        $all_dghp[$k]->Level = 1;
                    } 
                }
            }
        }

        $baidanhgia = array();
        $i = 1;
        foreach($all_dghp as $vl_bdg) {

            if (isset($vl_bdg->Level)) {
                if ($vl_bdg->Level == 1) {
                    $baidanhgia[] = "A".$i.".2";
                    $i++;
                } else {
                    $baidanhgia[] = "A".$i.".1";
                    
                }
            } else {
                $baidanhgia[] = "A".$i.".1";
                $i++;
            }
        }

        return view('admin.decuong.ke_hoach_giang_day')->with('all_cdr', $all_cdr)->with('all_dghp', $all_dghp)
        ->with('baidanhgia', $baidanhgia)->with('id_decuong', $id_decuong)
        ->with('all_trongso', $all_trongso);
    }

    public function data_tree_dghp($data, $parent_id = 0, $level = 0, $hasChild = 0) {
        $result = [];
        foreach ($data as $value) {
            if($value->id_baidanhgia_parent == $parent_id) {
                $value->level = $level;
                $value->hasChild = 0;
                $result[] = $value;
                $child = $this->data_tree_dghp($data, $value->id_baidanhgia_parent, $level + 1);
                if($child) {
                    $value->hasChild = 1;
                    //$result = array_merge($result, $child);
                }
                
            }     
        }
        return $result;
    }

    public function insert_ke_hoach_giang_day($id_decuong, Request $request) {
        
        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $ke_hoach_giang_day = $request->ke_hoach_giang_day;
        $data_khgd = $this->array_2d($request->ke_hoach_giang_day, 3);

        $data_khgd_thuchanh = $this->array_2d($request->ke_hoach_giang_day_thuchanh, 3);

        $bai_danh_gia = $request->bai_danh_gia;
        $chuan_dau_ra = $request->chuan_dau_ra;

        $bai_danh_gia_thuchanh = $request->bai_danh_gia_thuchanh;
        $chuan_dau_ra_thuchanh = $request->chuan_dau_ra_thuchanh;

        if (isset($data_khgd) && $data_khgd != null) {

            $buoi_lt = 1;

            foreach($data_khgd as $value_data_khgd) {

                $vl_khgd_0 = $this->tach_hop_khgd($value_data_khgd[0]);
                $vl_khgd_1 = $this->tach_hop_khgd($value_data_khgd[1]);

                $kehoachgiangday = new kehoachgiangday;
                $kehoachgiangday->buoi = $buoi_lt;
                $kehoachgiangday->noidung = $vl_khgd_0;
                $kehoachgiangday->hoatdongdayhoc = $vl_khgd_1;

                $bdg = "";
                if(isset($bai_danh_gia) && $bai_danh_gia != null) {
                    foreach($bai_danh_gia as $value_bdg) {
                        $value_bdg = explode("_", $value_bdg);
                       
                        if($value_bdg[0] == $value_data_khgd[2]) {
                            $bdg .= $value_bdg[1]."_";
                        }
                    }
                    $bdg = rtrim($bdg, '_');
                }

                $cdr = "";
                if(isset($chuan_dau_ra) && $chuan_dau_ra != null) {
                    foreach($chuan_dau_ra as $value_cdr) {
                        $value_cdr = explode("_", $value_cdr);
                       
                        if($value_cdr[0] == $value_data_khgd[2]) {
                            $cdr .= $value_cdr[1]."_";
                        }
                    }
                    $cdr = rtrim($cdr, '_');
                }

                $kehoachgiangday->baidanhgia = $bdg;
                $kehoachgiangday->cdrhocphan = $cdr;

                $kehoachgiangday->id_hocphan = $id_hocphan;
                $kehoachgiangday->thuochocphan = "0";
                $kehoachgiangday->khungchuongtrinh = $khungchuongtrinh;

                $kehoachgiangday->save();

                $buoi_lt++;
                
            }
        }

        if (isset($data_khgd_thuchanh) && $data_khgd_thuchanh != null) {

            $buoi_th = 1;

            foreach($data_khgd_thuchanh as $value_data_khgd_thuchanh) {

                $vl_khgd_thuchanh_0 = $this->tach_hop_khgd($value_data_khgd_thuchanh[0]);
                $vl_khgd_thuchanh_1 = $this->tach_hop_khgd($value_data_khgd_thuchanh[1]);

                $kehoachgiangdaythuchanh = new kehoachgiangday;
                $kehoachgiangdaythuchanh->buoi = $buoi_th;
                $kehoachgiangdaythuchanh->noidung = $vl_khgd_thuchanh_0;
                $kehoachgiangdaythuchanh->hoatdongdayhoc = $vl_khgd_thuchanh_1;

                $bdg_thuchanh = "";
                if(isset($bai_danh_gia_thuchanh) && $bai_danh_gia_thuchanh != null) {
                    foreach($bai_danh_gia_thuchanh as $value_bdg_thuchanh) {
                        $value_bdg_thuchanh = explode("_", $value_bdg_thuchanh);
                       
                        if($value_bdg_thuchanh[0] == $value_data_khgd_thuchanh[2]) {
                            $bdg_thuchanh .= $value_bdg_thuchanh[1]."_";
                        }
                    }
                    $bdg_thuchanh = rtrim($bdg_thuchanh, '_');
                }

                $cdr_thuchanh = "";
                if(isset($chuan_dau_ra_thuchanh) && $chuan_dau_ra_thuchanh != null) {
                    foreach($chuan_dau_ra_thuchanh as $value_cdr_thuchanh) {
                        $value_cdr_thuchanh = explode("_", $value_cdr_thuchanh);
                       
                        if($value_cdr_thuchanh[0] == $value_data_khgd_thuchanh[2]) {
                            $cdr_thuchanh .= $value_cdr_thuchanh[1]."_";
                        }
                    }
                    $cdr_thuchanh = rtrim($cdr_thuchanh, '_');
                }

                $kehoachgiangdaythuchanh->baidanhgia = $bdg_thuchanh;
                $kehoachgiangdaythuchanh->cdrhocphan = $cdr_thuchanh;

                $kehoachgiangdaythuchanh->id_hocphan = $id_hocphan;
                $kehoachgiangdaythuchanh->thuochocphan = "1";
                $kehoachgiangdaythuchanh->khungchuongtrinh = $khungchuongtrinh;

                $kehoachgiangdaythuchanh->save();

                $buoi_th++;
                
            }
        }

        return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);
    }

    public function tach_hop_khgd($string) {

        $tach = explode("\n", $string);
        $gop = "";

        for ($i = 0; $i < count($tach); $i++) {
            $gop .= trim($tach[$i])."_";
        }

        $result = rtrim($gop, '_');
        return $result;


    }

    public function edit_ke_hoach_giang_day($id_decuong) {

        $all_cdr = DB::table('table_chuandaura_monhoc')->where('id_decuong', $id_decuong)->get();

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $all_dghp = DB::table('table_danhgiahocphan')->join('table_thanhphandanhgia', 'table_danhgiahocphan.id_baidanhgia'
        ,'table_thanhphandanhgia.id')->where('table_danhgiahocphan.id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh)->get();

        $all_trongso = DB::table('table_trongso_hp')->where('id_hp', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh)->get();

        $all_baidanhgia = array();

        foreach($all_dghp as $vl_dghp_bdg) {
            $all_baidanhgia[] = $vl_dghp_bdg->id_baidanhgia_parent;
            $vl_dghp_bdg->cdr_hocphan = explode("_", $vl_dghp_bdg->cdr_hocphan);
        }

        $dghp_parent = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();

        foreach($all_dghp as $value_child) {
            foreach($dghp_parent as $value_parent) {
                if ($value_child->id_baidanhgia_parent == $value_parent->id) {
                    $value_child->ten_thanhphandanhgia_parent = $value_parent->ten_thanhphandanhgia;
                }
            }   
        }
 
        $len = count($all_dghp);

        for ($i = 0; $i < $len; $i++) {
            $temp = $all_dghp[$i];
            $j = $i;
            for ($k = 0; $k < $len; $k++) {
                if ($k != $j) {
                    if ($temp->id_baidanhgia_parent == $all_dghp[$k]->id_baidanhgia_parent) {
                        $all_dghp[$k-1]->id_baidanhgia_parent=100;
                        $all_dghp[$k-1]->Level = 0;
                        $all_dghp[$k]->id_baidanhgia_parent=111;
                        $all_dghp[$k]->Level = 1;
                    } 
                }
            }
        }

        $baidanhgia = array();
        $i = 1;
        foreach($all_dghp as $vl_bdg) {

            if (isset($vl_bdg->Level)) {
                if ($vl_bdg->Level == 1) {
                    $baidanhgia[] = "A".$i.".2";
                    $i++;
                } else {
                    $baidanhgia[] = "A".$i.".1";
                    
                }
            } else {
                $baidanhgia[] = "A".$i.".1";
                $i++;
            }
        }

        $all_edit_khgd = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $id_hocphan)
                            ->where('thuochocphan', "0")
                            ->where('khungchuongtrinh', $khungchuongtrinh)
                            ->orderBy('buoi', 'ASC')
                            ->get();

        $all_edit_khgd_thuchanh = DB::table('table_kehoachgiangday')
                                    ->where('id_hocphan', $id_hocphan)
                                    ->where('thuochocphan', "1")
                                    ->where('khungchuongtrinh', $khungchuongtrinh)
                                    ->orderBy('buoi', 'ASC')
                                    ->get();

        foreach($all_edit_khgd as $value_all_edit_khgd) {
            $value_all_edit_khgd->noidung = $this->tach_khgd($value_all_edit_khgd->noidung);
            $value_all_edit_khgd->hoatdongdayhoc = $this->tach_khgd($value_all_edit_khgd->hoatdongdayhoc);
            $value_all_edit_khgd->baidanhgia = explode("_", $value_all_edit_khgd->baidanhgia);
            $value_all_edit_khgd->cdrhocphan = explode("_", $value_all_edit_khgd->cdrhocphan);
        }

        foreach($all_edit_khgd_thuchanh as $value_all_edit_khgd_thuchanh) {
            $value_all_edit_khgd_thuchanh->noidung = $this->tach_khgd($value_all_edit_khgd_thuchanh->noidung);
            $value_all_edit_khgd_thuchanh->hoatdongdayhoc = $this->tach_khgd($value_all_edit_khgd_thuchanh->hoatdongdayhoc);
            $value_all_edit_khgd_thuchanh->baidanhgia = explode("_", $value_all_edit_khgd_thuchanh->baidanhgia);
            $value_all_edit_khgd_thuchanh->cdrhocphan = explode("_", $value_all_edit_khgd_thuchanh->cdrhocphan);
        }

        return view('admin.decuong.sua_ke_hoach_giang_day')
        ->with('all_cdr', $all_cdr)
        ->with('all_dghp', $all_dghp)
        ->with('baidanhgia', $baidanhgia)
        ->with('id_decuong', $id_decuong)
        ->with('all_edit_khgd', $all_edit_khgd)
        ->with('all_edit_khgd_thuchanh', $all_edit_khgd_thuchanh)
        ->with('all_trongso', $all_trongso);
    }

    public function tach_khgd($string) {

        $tach = explode("_", $string);
        $gop = "";

        for ($i = 0; $i < count($tach); $i++) {
            $gop .= trim($tach[$i])."\n";
        }

        $result = rtrim($gop, '\n');

        return $result;

    }

    public function insert_edit_ke_hoach_giang_day($id_decuong, Request $request) {
        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)->first();
        $id_hocphan = $decuong_dghp->id_hocphan;
        $khungchuongtrinh = $decuong_dghp->khungchuongtrinh;

        $ke_hoach_giang_day = $request->ke_hoach_giang_day;
        $data_khgd = $this->array_2d($request->ke_hoach_giang_day, 3);

        $data_khgd_thuchanh = $this->array_2d($request->ke_hoach_giang_day_thuchanh, 3);

        $bai_danh_gia = $request->bai_danh_gia;
        $chuan_dau_ra = $request->chuan_dau_ra;

        $bai_danh_gia_thuchanh = $request->bai_danh_gia_thuchanh;
        $chuan_dau_ra_thuchanh = $request->chuan_dau_ra_thuchanh;

        $deletekhgd = kehoachgiangday::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        $deletekhgd->delete();

        if (isset($data_khgd) && $data_khgd != null) {

            $buoi_lt = 1;

            foreach($data_khgd as $value_data_khgd) {

                $vl_khgd_0 = $this->tach_hop_khgd($value_data_khgd[0]);
                $vl_khgd_1 = $this->tach_hop_khgd($value_data_khgd[1]);

                $kehoachgiangday = new kehoachgiangday;
                $kehoachgiangday->buoi = $buoi_lt;
                $kehoachgiangday->noidung = $vl_khgd_0;
                $kehoachgiangday->hoatdongdayhoc = $vl_khgd_1;

                $bdg = "";
                if(isset($bai_danh_gia) && $bai_danh_gia != null) {
                    foreach($bai_danh_gia as $value_bdg) {
                        $value_bdg = explode("_", $value_bdg);
                       
                        if($value_bdg[0] == $value_data_khgd[2]) {
                            $bdg .= $value_bdg[1]."_";
                        }
                    }
                    $bdg = rtrim($bdg, '_');
                }

                $cdr = "";
                if(isset($chuan_dau_ra) && $chuan_dau_ra != null) {
                    foreach($chuan_dau_ra as $value_cdr) {
                        $value_cdr = explode("_", $value_cdr);
                       
                        if($value_cdr[0] == $value_data_khgd[2]) {
                            $cdr .= $value_cdr[1]."_";
                        }
                    }
                    $cdr = rtrim($cdr, '_');
                }

                $kehoachgiangday->baidanhgia = $bdg;
                $kehoachgiangday->cdrhocphan = $cdr;

                $kehoachgiangday->id_hocphan = $id_hocphan;
                $kehoachgiangday->thuochocphan = "0";
                $kehoachgiangday->khungchuongtrinh = $khungchuongtrinh;

                $kehoachgiangday->save();

                $buoi_lt++;
                
            }
        }

        if (isset($data_khgd_thuchanh) && $data_khgd_thuchanh != null) {

            $buoi_th = 1;

            foreach($data_khgd_thuchanh as $value_data_khgd_thuchanh) {

                $vl_khgd_thuchanh_0 = $this->tach_hop_khgd($value_data_khgd_thuchanh[0]);
                $vl_khgd_thuchanh_1 = $this->tach_hop_khgd($value_data_khgd_thuchanh[1]);

                $kehoachgiangdaythuchanh = new kehoachgiangday;
                $kehoachgiangdaythuchanh->buoi = $buoi_th;
                $kehoachgiangdaythuchanh->noidung = $vl_khgd_thuchanh_0;
                $kehoachgiangdaythuchanh->hoatdongdayhoc = $vl_khgd_thuchanh_1;

                $bdg_thuchanh = "";
                if(isset($bai_danh_gia_thuchanh) && $bai_danh_gia_thuchanh != null) {
                    foreach($bai_danh_gia_thuchanh as $value_bdg_thuchanh) {
                        $value_bdg_thuchanh = explode("_", $value_bdg_thuchanh);
                       
                        if($value_bdg_thuchanh[0] == $value_data_khgd_thuchanh[2]) {
                            $bdg_thuchanh .= $value_bdg_thuchanh[1]."_";
                        }
                    }
                    $bdg_thuchanh = rtrim($bdg_thuchanh, '_');
                }

                $cdr_thuchanh = "";
                if(isset($chuan_dau_ra_thuchanh) && $chuan_dau_ra_thuchanh != null) {
                    foreach($chuan_dau_ra_thuchanh as $value_cdr_thuchanh) {
                        $value_cdr_thuchanh = explode("_", $value_cdr_thuchanh);
                       
                        if($value_cdr_thuchanh[0] == $value_data_khgd_thuchanh[2]) {
                            $cdr_thuchanh .= $value_cdr_thuchanh[1]."_";
                        }
                    }
                    $cdr_thuchanh = rtrim($cdr_thuchanh, '_');
                }

                $kehoachgiangdaythuchanh->baidanhgia = $bdg_thuchanh;
                $kehoachgiangdaythuchanh->cdrhocphan = $cdr_thuchanh;

                $kehoachgiangdaythuchanh->id_hocphan = $id_hocphan;
                $kehoachgiangdaythuchanh->thuochocphan = "1";
                $kehoachgiangdaythuchanh->khungchuongtrinh = $khungchuongtrinh;

                $kehoachgiangdaythuchanh->save();

                $buoi_th++;
                
            }
        }

        return Redirect::to('admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);
    }

    public function mo_ta_ct_dt() {

        $id_nganh = 1;

        $chuandaura = DB::table('table_chuandaura_chung')->where('id_nganh', $id_nganh)->get();

        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_nganh', $id_nganh)
        ->get(); 

        //$all_cdr_child = DB::table('table_chuandaura_monhoc')->where('id_decuong', '17')->get();

        // $all_cdr_child = DB::table('table_chuandaura_monhoc')
        // ->where('id_decuong', '17')
        // ->select('id_cdr_chung', DB::raw('count(*) as tong'))
        // ->groupBy('id_cdr_chung')
        // ->get();

        foreach($all_decuong as $vl_all_decuong) {

            $all_cdr_child = DB::table('table_chuandaura_monhoc')
            ->where('id_decuong', $vl_all_decuong->id_decuong)
            ->select('id_cdr_chung', DB::raw('count(*) as tong'))
            ->groupBy('id_cdr_chung')
            ->get();

            //echo "<pre>";
            //print_r($all_cdr_child);
            foreach($all_cdr_child as $vl) {
                $vl_all_decuong->PLO[] = $vl->id_cdr_chung."_".$this->Tunhien2Lama($vl->tong);
            }
            
        }

        return view('pages_2.mo_ta_chuong_trinh_dao_tao')->with('chuandaura', $chuandaura)->with('all_decuong', $all_decuong);
    }

    public function chuan_dau_ra_chung($id_nganh) {

        $all_nganh = DB::table('table_nganh')->get();

        $data_chuandau_chung = [];
        $ten_nganh = "";

        $all_chuandaura_chung = DB::table('table_nganh')->where('id', $id_nganh)->first();

        if ($all_chuandaura_chung->id_chuyennganh == 0) {

            $ten_nganh = "Ngành ".$all_chuandaura_chung->tennganh;

            $data_0 = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id)->get();

            foreach($data_0 as $value_data_0) {
                $value_data_0->change = 1;
                $data_chuandau_chung[] = $value_data_0;
            }

        } else {

            $ten_nganh = $all_chuandaura_chung->tennganh;

            $data_1 = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id_chuyennganh)->get();
            $data_2 = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id)->get();

            foreach($data_1 as $value_data_1) {
                $value_data_1->change = 0;
                $data_chuandau_chung[] = $value_data_1;
            }

            foreach($data_2 as $value_data_2) {
                $value_data_2->change = 1;
                $data_chuandau_chung[] = $value_data_2;
            }
            
        }

        return view('admin.decuong.chuan_dau_ra_chung')
                ->with('all_nganh', $all_nganh)
                ->with('data_chuandau_chung', $data_chuandau_chung)
                ->with('id_nganh', $id_nganh)
                ->with('ten_nganh', $ten_nganh);
    }

    public function khungchuongtrinh($id_khungchuongtrinh) {

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $all_kct_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh_hocphan.id_khung', 'table_khungchuongtrinh.id')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->join('table_khoahoc', 'table_khungchuongtrinh.id_khoahoc', 'table_khoahoc.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                            ->orderBy('table_khungchuongtrinh_hocphan.hocky', "ASC")
                            ->orderBy('table_khungchuongtrinh_hocphan.stt', "ASC")
                            ->get();


        $all_decuong = DB::table('table_decuongchitiet')->get();

        foreach($all_kct_hocphan as $value_kct_hocphan) {
            foreach($all_decuong as $value_decuong) {
                if($value_kct_hocphan->id_khung == $value_decuong->khungchuongtrinh 
                    && $value_kct_hocphan->id_hocphan == $value_decuong->id_hocphan) {
                       $value_kct_hocphan->has_decuong = 1; 
                       $value_kct_hocphan->id_decuong = $value_decuong->id_decuong; 
                    }
            }

            $check_khgd = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $value_kct_hocphan->id_hocphan)
                            ->where('khungchuongtrinh', $value_kct_hocphan->id_khung)
                            ->get();

            if ($check_khgd->count()) {
                $value_kct_hocphan->has_khgd = 1;
            }

        }

        foreach($all_kct_hocphan as $value_all_kct_hocphan) {

            $ds_hocphan_lienquan = "";

            if($value_all_kct_hocphan->tienquyet != null) {
                $id_hptq = explode("_", $value_all_kct_hocphan->tienquyet); 
                foreach ($id_hptq as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-tq">(a), </p>';
                    }  
                }
            }

            if($value_all_kct_hocphan->hoctruoc != null) {
                $id_hpht = explode("_", $value_all_kct_hocphan->hoctruoc); 
                foreach ($id_hpht as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-ht">(b), </p>';
                    }                    
                }
            }

            if($value_all_kct_hocphan->songhanh != null) {
                $id_hpsh = explode("_", $value_all_kct_hocphan->songhanh); 
                foreach ($id_hpsh as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-sh">(c), </p>';
                    }                 
                }
            }

            $value_all_kct_hocphan->ds_hocphan_lienquan = $ds_hocphan_lienquan;

        }

        $all_hocphan_thaythe = DB::table('table_khungchuongtrinh_hocphan')
                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                                ->where('table_khungchuongtrinh_hocphan.id_hocphan_thaythe', '!=', '')
                                ->orderBy('table_khungchuongtrinh_hocphan.hocky', "ASC")
                                ->get();

        foreach($all_hocphan_thaythe as $value_all_hocphan_thaythe) {

            $hocphanthaythe = DB::table('table_hocphan')
                                ->where('id', $value_all_hocphan_thaythe->id_hocphan_thaythe)
                                ->first();

            if ($hocphanthaythe) {
                $value_all_hocphan_thaythe->mahocphan_thaythe = $hocphanthaythe->mahocphan;
                $value_all_hocphan_thaythe->tenhocphan_thaythe = $hocphanthaythe->tenhocphan;
                $value_all_hocphan_thaythe->soTC_thaythe = $hocphanthaythe->soTC;
            }

        }

        return view('admin.decuong.khung_chuong_trinh')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('id_khungchuongtrinh', $id_khungchuongtrinh)
                ->with('all_kct_hocphan', $all_kct_hocphan)
                ->with('all_hocphan_thaythe', $all_hocphan_thaythe);
    }

    public function khgd_khungchuongtrinh($id_khungchuongtrinh) {
        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $all_kct_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh_hocphan.id_khung', 'table_khungchuongtrinh.id')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->join('table_khoahoc', 'table_khungchuongtrinh.id_khoahoc', 'table_khoahoc.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                            ->orderBy('table_khungchuongtrinh_hocphan.hocky', "ASC")
                            ->orderBy('table_khungchuongtrinh_hocphan.stt', "ASC")
                            ->get();
   
        $all_decuong = DB::table('table_decuongchitiet')->get();

        foreach($all_kct_hocphan as $value_kct_hocphan) {
            foreach($all_decuong as $value_decuong) {
                if($value_kct_hocphan->id_khung == $value_decuong->khungchuongtrinh 
                    && $value_kct_hocphan->id_hocphan == $value_decuong->id_hocphan) {
                       $value_kct_hocphan->has_decuong = 1; 
                       $value_kct_hocphan->id_decuong = $value_decuong->id_decuong; 
                    }
            }

            $check_khgd = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $value_kct_hocphan->id_hocphan)
                            ->where('khungchuongtrinh', $value_kct_hocphan->id_khung)
                            ->get();

            if ($check_khgd->count()) {
                $value_kct_hocphan->has_khgd = 1;
            }

        }

        return view('admin.decuong.khgd_khungchuongtrinh')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('id_khungchuongtrinh', $id_khungchuongtrinh)
                ->with('all_kct_hocphan', $all_kct_hocphan);

    }

    public function khungchuongtrinhhocphan($id_khungchuongtrinh) {

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $all_kct_hocphan = DB::table('table_hocphan')
                            ->Join('table_khungchuongtrinh_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', '=', 'table_hocphan.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                            ->orderBy('hocky', 'ASC')
                            ->orderBy('stt', 'ASC')
                            ->get();

        $all_kct_hocphan2 = DB::table('table_hocphan')
                            ->Join('table_khungchuongtrinh_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', '=', 'table_hocphan.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khungchuongtrinh)
                            ->select('hocky', DB::raw('count(*) as total'))
                            ->groupBy('hocky')
                            ->get();

        
        foreach($all_kct_hocphan as $value_all_kct_hocphan) {


            foreach($all_kct_hocphan2 as $value) {
                if ($value_all_kct_hocphan->hocky == $value->hocky) {
                    $value_all_kct_hocphan->totalhocky = $value->total;
                }
            }


            $ds_hocphan_lienquan = "";

            if($value_all_kct_hocphan->tienquyet != null) {
                $id_hptq = explode("_", $value_all_kct_hocphan->tienquyet); 
                foreach ($id_hptq as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-tq">(a), </p>';
                    }  
                }
            }

            if($value_all_kct_hocphan->hoctruoc != null) {
                $id_hpht = explode("_", $value_all_kct_hocphan->hoctruoc); 
                foreach ($id_hpht as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-ht">(b), </p>';
                    }                    
                }
            }

            if($value_all_kct_hocphan->songhanh != null) {
                $id_hpsh = explode("_", $value_all_kct_hocphan->songhanh); 
                foreach ($id_hpsh as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= '<p>'.$hp->mahocphan.'</p> <p class="dshp dshp-sh">(c), </p>';
                    }                 
                }
            }

            $value_all_kct_hocphan->ds_hocphan_lienquan = $ds_hocphan_lienquan;

        }

        // echo "<pre>";
        // print_r($all_kct_hocphan);
        // die();

        return view('admin.decuong.khung_chuong_trinh_hoc_phan')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('id_khungchuongtrinh', $id_khungchuongtrinh)
                ->with('all_kct_hocphan', $all_kct_hocphan);

    }

    public function data_khungchuongtrinh($data, $parent_id = 0, $level = 0) {
        $result = [];

        foreach($data as $item) {
            if($item->isKhungnangcao == $parent_id) {
                $item->level = $level;
                $result[] = $item;
                $child = $this->data_khungchuongtrinh($data, $item->id, $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function themhocphankhungchuongtrinh() {
        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc')->get();
        $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

        return view('admin.decuong.them_hocphan_khungchuongtrinh')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('all_khoiluongkienthuc', $all_khoiluongkienthuc);
    }

    public function data_khoiluongkienthuc($data, $parent_id = 0, $level = 0) {
        $result = [];
        foreach($data as $item) {
            if($item->isKhoiluongkienthuc == $parent_id) {
                $item->level = $level;
                $result[] = $item;
                $child = $this->data_khoiluongkienthuc($data, $item->id, $level + 1);                
                if($child) {
                    $item->hasChild = 1;
                    $result = array_merge($result, $child);
                }
            }
        }
        return $result;
    }


    public function insert_themhocphankhungchuongtrinh(Request $request) {
        $data = $request->all();

        $kct_check = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_hocphan', $data['id_ten_hoc_phan'])
                            ->where('id_khung', $data['khungchuongtrinh'])
                            ->first();

        if ($kct_check) {
            return Redirect::to('/admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/142');
        } else {

            $all_kct = DB::table('table_khungchuongtrinh_hocphan')
                        ->where('id_khung', $data['khungchuongtrinh'])
                        ->where('hocky', $data['hocky'])
                        ->orderBy('stt', 'DESC')
                        ->first();

            if ($all_kct) {
                $old_stt = $all_kct->stt;
            } else {
                $old_stt = 0;
            }

            $list_hptt = "";
            $rs_list_hptt = null;
            if(isset($request->list_id_hptt) && $request->list_id_hptt != null) {
                foreach ($request->list_id_hptt as $value_listhptt) {
                    $list_hptt .= $value_listhptt."_";
                }
                $rs_list_hptt = rtrim($list_hptt, '_');
            }

            $list_hptq = "";
            $rs_list_hptq = null;
            if(isset($request->list_id_hptq) && $request->list_id_hptq != null) {
                foreach ($request->list_id_hptq as $value_listhptq) {
                    $list_hptq .= $value_listhptq."_";
                }
                $rs_list_hptq = rtrim($list_hptq, '_');
            }

            $list_hpht = "";
            $rs_list_hpht = null;
            if(isset($request->list_id_hpht) && $request->list_id_hpht != null) {
                foreach ($request->list_id_hpht as $value_listhpht) {
                    $list_hpht .= $value_listhpht."_";
                }
                $rs_list_hpht = rtrim($list_hpht, '_');
            }

            $list_hpsh = "";
            $rs_list_hpsh = null;
            if(isset($request->list_id_hpsh) && $request->list_id_hpsh != null) {
                foreach ($request->list_id_hpsh as $value_listhpsh) {
                    $list_hpsh .= $value_listhpsh."_";
                }
                $rs_list_hpsh = rtrim($list_hpsh, '_');
            }

            $khungchuongtrinh_hocphan = new khungchuongtrinhhocphan;
            $khungchuongtrinh_hocphan->stt = $old_stt + 1;
            $khungchuongtrinh_hocphan->hocky = $data['hocky'];
            $khungchuongtrinh_hocphan->id_khung = $data['khungchuongtrinh'];
            $khungchuongtrinh_hocphan->id_hocphan = $data['id_ten_hoc_phan'];
            $khungchuongtrinh_hocphan->id_hocphan_thaythe = $rs_list_hptt;
            $khungchuongtrinh_hocphan->tienquyet = $rs_list_hptq;
            $khungchuongtrinh_hocphan->hoctruoc = $rs_list_hpht;
            $khungchuongtrinh_hocphan->songhanh = $rs_list_hpsh;
            $khungchuongtrinh_hocphan->tuchon = (int)$data['tuchon'];
            $khungchuongtrinh_hocphan->khoikienthuc = $data['khoiluongkienthuc'];

            $khungchuongtrinh_hocphan->save();

            return Redirect::to('/admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/'.$data['khungchuongtrinh']);

        }
    }

    public function suahocphankhungchuongtrinh($id_kct_hp) {

        $all_kct = DB::table('table_hocphan')
        ->Join('table_khungchuongtrinh_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', '=', 'table_hocphan.id')
        ->where('table_khungchuongtrinh_hocphan.id', $id_kct_hp)
        ->first();
        
        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();

        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $list_hptt = [];

        if(isset($all_kct->id_hocphan_thaythe) && $all_kct->id_hocphan_thaythe != null) {
            $id_hptt = explode("_", $all_kct->id_hocphan_thaythe);            
            foreach ($id_hptt as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $child = [];
                $child["id_hp"] = $hp->id;
                $child["ten_hp"] = $hp->tenhocphan;
                $list_hptt[] = $child;
            }
        }

        $list_hptq = [];

        if(isset($all_kct->tienquyet) && $all_kct->tienquyet != null) {
            $id_hptq = explode("_", $all_kct->tienquyet);
            foreach ($id_hptq as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $child = [];
                $child["id_hp"] = $hp->id;
                $child["ten_hp"] = $hp->tenhocphan;
                $list_hptq[] = $child;
            }
        }

        $list_hpht = [];

        if(isset($all_kct->hoctruoc) && $all_kct->hoctruoc != null) {
            $id_hpht = explode("_", $all_kct->hoctruoc);
            foreach ($id_hpht as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $child = [];
                $child["id_hp"] = $hp->id;
                $child["ten_hp"] = $hp->tenhocphan;
                $list_hpht[] = $child;
            }
        }

        $list_hpsh = [];

        if(isset($all_kct->songhanh) && $all_kct->songhanh != null) {
            $id_hpsh = explode("_", $all_kct->songhanh);
            foreach ($id_hpsh as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $child = [];
                $child["id_hp"] = $hp->id;
                $child["ten_hp"] = $hp->tenhocphan;
                $list_hpsh[] = $child;
            }
        }

        $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc')->get();
        $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

        return view('admin.decuong.sua_hocphan_khungchuongtrinh')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('all_khoiluongkienthuc', $all_khoiluongkienthuc)
                ->with('all_kct', $all_kct)
                ->with('list_hptt', $list_hptt)
                ->with('list_hptq', $list_hptq)
                ->with('list_hpht', $list_hpht)
                ->with('list_hpsh', $list_hpsh);
    }

    public function insert_suahocphankhungchuongtrinh($id_kct_hp, Request $request) {
        $data = $request->all();

        $list_hptt = "";
        $rs_list_hptt = null;
        if(isset($request->list_id_hptt) && $request->list_id_hptt != null) {
            foreach ($request->list_id_hptt as $value_listhptt) {
                $list_hptt .= $value_listhptt."_";
            }
            $rs_list_hptt = rtrim($list_hptt, '_');
        }

        $list_hptq = "";
        $rs_list_hptq = null;
        if(isset($request->list_id_hptq) && $request->list_id_hptq != null) {
            foreach ($request->list_id_hptq as $value_listhptq) {
                $list_hptq .= $value_listhptq."_";
            }
            $rs_list_hptq = rtrim($list_hptq, '_');
        }

        $list_hpht = "";
        $rs_list_hpht = null;
        if(isset($request->list_id_hpht) && $request->list_id_hpht != null) {
            foreach ($request->list_id_hpht as $value_listhpht) {
                $list_hpht .= $value_listhpht."_";
            }
            $rs_list_hpht = rtrim($list_hpht, '_');
        }

        $list_hpsh = "";
        $rs_list_hpsh = null;
        if(isset($request->list_id_hpsh) && $request->list_id_hpsh != null) {
            foreach ($request->list_id_hpsh as $value_listhpsh) {
                $list_hpsh .= $value_listhpsh."_";
            }
            $rs_list_hpsh = rtrim($list_hpsh, '_');
        }

        $khungchuongtrinh_hocphan = khungchuongtrinhhocphan::find($id_kct_hp);
        $khungchuongtrinh_hocphan->hocky = $data['hocky'];
        $khungchuongtrinh_hocphan->id_khung = $data['khungchuongtrinh'];
        $khungchuongtrinh_hocphan->id_hocphan = $data['id_ten_hoc_phan'];
        $khungchuongtrinh_hocphan->id_hocphan_thaythe = $rs_list_hptt;
        $khungchuongtrinh_hocphan->tienquyet = $rs_list_hptq;
        $khungchuongtrinh_hocphan->hoctruoc = $rs_list_hpht;
        $khungchuongtrinh_hocphan->songhanh = $rs_list_hpsh;
        $khungchuongtrinh_hocphan->tuchon = (int)$data['tuchon'];
        $khungchuongtrinh_hocphan->khoikienthuc = $data['khoiluongkienthuc'];

        $khungchuongtrinh_hocphan->save();

        return Redirect::to('/admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/'.$data['khungchuongtrinh']);

    }

    public function xoahocphankhungchuongtrinh($id_kct_hp) {
        $khungchuongtrinh_hocphan = khungchuongtrinhhocphan::find($id_kct_hp);
        $id_khung = $khungchuongtrinh_hocphan->id_khung;
        $khungchuongtrinh_hocphan->delete();

        return Redirect::to('/admin/decuong/danh-sach-khung-chuong-trinh-hoc-phan/'.$id_khung);
    }

    public function them_kehoachgiangday_thugon($id_hocphan, $id_khung) {
        
        $ten_hocphan = DB::table('table_hocphan')->where('id', $id_hocphan)->first()->tenhocphan;

        $ten_khungchuongtrinh = DB::table('table_khungchuongtrinh')->where('id', $id_khung)->first()->tenkhungchuongtrinh;

        return view('admin.decuong.them_kehoachgiangday_thugon')
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('ten_khungchuongtrinh', $ten_khungchuongtrinh);
    }

    public function insert_them_kehoachgiangday_thugon(Request $request) {

        $data_khgd = $this->array_2d($request->ke_hoach_giang_day, 2);
        $data_khgd_thuchanh = $this->array_2d($request->ke_hoach_giang_day_thuchanh, 2);

        if (isset($data_khgd) && $data_khgd != null) {

            $buoi_lt = 1;

            foreach($data_khgd as $value_data_khgd) {

                $vl_khgd_0 = $this->tach_hop_khgd($value_data_khgd[0]);

                $kehoachgiangday = new kehoachgiangday;
                $kehoachgiangday->buoi = $buoi_lt;
                $kehoachgiangday->noidung = $vl_khgd_0;
                
                $kehoachgiangday->id_hocphan = $request->id_hocphan;
                $kehoachgiangday->thuochocphan = "0";
                $kehoachgiangday->khungchuongtrinh = $request->id_khung;

                $kehoachgiangday->save();

                $buoi_lt++;
                
            }
        }

        if (isset($data_khgd_thuchanh) && $data_khgd_thuchanh != null) {

            $buoi_th = 1;

            foreach($data_khgd_thuchanh as $value_data_khgd_thuchanh) {

                $vl_khgd_thuchanh_0 = $this->tach_hop_khgd($value_data_khgd_thuchanh[0]);

                $kehoachgiangdaythuchanh = new kehoachgiangday;
                $kehoachgiangdaythuchanh->buoi = $buoi_th;
                $kehoachgiangdaythuchanh->noidung = $vl_khgd_thuchanh_0;

                $kehoachgiangdaythuchanh->id_hocphan = $request->id_hocphan;
                $kehoachgiangdaythuchanh->thuochocphan = "1";
                $kehoachgiangdaythuchanh->khungchuongtrinh = $request->id_khung;

                $kehoachgiangdaythuchanh->save();

                $buoi_th++;
                
            }
        }

        return Redirect::to('admin/decuong/khung-chuong-trinh/'.$request->id_khung);
    }

    public function sua_kehoachgiangday_thugon($id_hocphan, $id_khung) {

        $ten_hocphan = DB::table('table_hocphan')->where('id', $id_hocphan)->first()->tenhocphan;

        $ten_khungchuongtrinh = DB::table('table_khungchuongtrinh')->where('id', $id_khung)->first()->tenkhungchuongtrinh;

        $all_edit_khgd = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $id_hocphan)
                            ->where('khungchuongtrinh', $id_khung)
                            ->where('thuochocphan', 0)
                            ->orderBy('buoi', 'ASC')
                            ->get();

        $all_edit_khgd_thuchanh = DB::table('table_kehoachgiangday')
                            ->where('id_hocphan', $id_hocphan)
                            ->where('khungchuongtrinh', $id_khung)
                            ->where('thuochocphan', 1)
                            ->orderBy('buoi', 'ASC')
                            ->get();
                            
        foreach($all_edit_khgd as $value_all_edit_khgd) {
            $value_all_edit_khgd->noidung = $this->tach_khgd($value_all_edit_khgd->noidung);
        }

        foreach($all_edit_khgd_thuchanh as $value_all_edit_khgd_thuchanh) {
            $value_all_edit_khgd_thuchanh->noidung = $this->tach_khgd($value_all_edit_khgd_thuchanh->noidung);
        }

        return view('admin.decuong.sua_kehoachgiangday_thugon')
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('ten_khungchuongtrinh', $ten_khungchuongtrinh)
                ->with('all_edit_khgd', $all_edit_khgd)
                ->with('all_edit_khgd_thuchanh', $all_edit_khgd_thuchanh);  
    }

    public function insert_sua_kehoachgiangday_thugon(Request $request) {

        $deletekhgd = kehoachgiangday::where('id_hocphan', $request->id_hocphan)->where('khungchuongtrinh', $request->id_khung);
        if (isset($deletekhgd)) {
            $deletekhgd->delete();
        }

        $data_khgd = $request->ke_hoach_giang_day;
        $data_khgd_thuchanh = $request->ke_hoach_giang_day_thuchanh;

        if (isset($data_khgd) && $data_khgd != null) {

            $buoi_lt = 1;

            foreach($data_khgd as $value_data_khgd) {

                $kehoachgiangday = new kehoachgiangday;
                $kehoachgiangday->buoi = $buoi_lt;
                $kehoachgiangday->noidung = $this->tach_hop_khgd($value_data_khgd);
                
                $kehoachgiangday->id_hocphan = $request->id_hocphan;
                $kehoachgiangday->thuochocphan = "0";
                $kehoachgiangday->khungchuongtrinh = $request->id_khung;

                $kehoachgiangday->save();

                $buoi_lt++;
                
            }
        }

        if (isset($data_khgd_thuchanh) && $data_khgd_thuchanh != null) {

            $buoi_th = 1;

            foreach($data_khgd_thuchanh as $value_data_khgd_thuchanh) {

                $kehoachgiangdaythuchanh = new kehoachgiangday;
                $kehoachgiangdaythuchanh->buoi = $buoi_th;
                $kehoachgiangdaythuchanh->noidung = $this->tach_hop_khgd($value_data_khgd_thuchanh);

                $kehoachgiangdaythuchanh->id_hocphan = $request->id_hocphan;
                $kehoachgiangdaythuchanh->thuochocphan = "1";
                $kehoachgiangdaythuchanh->khungchuongtrinh = $request->id_khung;

                $kehoachgiangdaythuchanh->save();

                $buoi_th++;
                
            }
        }

        return Redirect::to('admin/decuong/khung-chuong-trinh/'.$request->id_khung);

    }

    public function matran_chuandaura($id_nganh) {

        $chuandaura = DB::table('table_chuandaura_chung')->where('id_nganh', $id_nganh)->get();

        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_nganh', $id_nganh)
        ->get(); 

        $nganh = DB::table('table_nganh')->where('id', $id_nganh)->first();

        foreach($all_decuong as $vl_all_decuong) {

            $all_cdr_child = DB::table('table_chuandaura_monhoc')
            ->where('id_decuong', $vl_all_decuong->id_decuong)
            ->select('id_cdr_chung', DB::raw('count(*) as tong'))
            ->groupBy('id_cdr_chung')
            ->get();

            foreach($all_cdr_child as $vl) {
                $vl_all_decuong->PLO[] = $vl->id_cdr_chung."_".$this->Tunhien2Lama($vl->tong);
            }
            
        }

        return view("matran_chuandaura")
                ->with('chuandaura', $chuandaura)
                ->with('all_decuong', $all_decuong)
                ->with('nganh', $nganh);
    }

    public function khoikienthuc($id_khung) {

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc')->get();
        $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

        foreach($all_khoiluongkienthuc as $value_all_klkt) {

            $all_hp_klkt = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
                            ->where('table_khungchuongtrinh_hocphan.khoikienthuc', $value_all_klkt->id)
                            ->get();

            foreach($all_hp_klkt as $value_all_hp_klkt) {
                $hp_klkt = new stdClass;
                $hp_klkt->id_hocphan = $value_all_hp_klkt->id_hocphan;
                $hp_klkt->hocky = $value_all_hp_klkt->hocky;
                $hp_klkt->tenhocphan = $value_all_hp_klkt->tenhocphan;
                $hp_klkt->soTC = $value_all_hp_klkt->soTC;

                $value_all_klkt->hp_klkt[] = $hp_klkt;
            }

        }

        return view('admin.decuong.khoikienthuc')
                    ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                    ->with('id_khung', $id_khung)
                    ->with('all_khoiluongkienthuc', $all_khoiluongkienthuc);
    }


    function Tunhien2Lama($number)
    {
        switch($number)
        {
            case 1: return 'I';
            case 2: return 'II'; 
            case 3: return 'III';
            case 4: return 'IV';
            case 5: return 'V';
            case 6: return 'VI';
            case 7: return 'VII';
            case 8: return 'VIII';
            case 9: return 'IX';
            case 10: return 'X';
            case 11: return 'XI';
            case 12: return 'XII'; 
            case 13: return 'XIII'; 
            case 14: return 'XIV';
            case 15: return 'XV';
            case 16: return 'XVI';
            case 17: return 'XVII';
            case 18: return 'XVIII';
            case 19: return 'XIX';
            case 20: return 'XX';
            case 21: return 'XXI';
            case 22: return 'XXII';
            case 23: return 'XXIII';
            case 24: return 'XXIV';
            case 25: return 'XXV';
            case 26: return 'XXVI';
            case 27: return 'XXVII';
            case 28: return 'XXVIII';
            case 29: return 'XXIX';
            case 30: return 'XXX';
            default: return $number;
        }
    }



}
