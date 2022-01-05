<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\chuandauramonhoc;
use App\Models\moilienhecloplo;
use App\Models\moilienheclopi;
use App\Models\modeldecuongchitiet;
use App\Models\tailieuthamkhao;
use App\Models\chuandaurachung;
use App\Models\chuandaurachungchitiet;
use App\Models\trongsohocphan;
use App\Models\danhgiahocphan;
use App\Models\kehoachgiangday;
use DB;
use Redirect;
use stdClass;



class DeCuongChiTiet extends Controller
{
    public function getThemMoiDeCuong($id_hocphan, $id_khung) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

        $ten_hocphan = DB::table('table_hocphan')->where('id', $id_hocphan)->first()->tenhocphan;

    	return view('admin.decuong.khungchuongtrinh.them_decuongchitiet')
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung);
    }

    public function data_khungchuongtrinh($data, $parent_id = 0, $level = 0) {
        $result = [];

        foreach($data as $item) {
            if($item->isKhungnangcao == $parent_id) {
                $item->level = $level;
                $item->hasChild = 0;
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

    public function getThemMoiDeCuongMoi($id_hocphan, $id_khung) {
        $all_cdr_chung = DB::table('table_chuandaura_chung')->limit(3)->get();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

        $ten_hocphan = DB::table('table_hocphan')->where('id', $id_hocphan)->first()->tenhocphan;

    	return view('admin.decuong.khungchuongtrinh.them_decuongchitiet_moi')
                ->with('all_cdr_chung', $all_cdr_chung)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung);
    }

    public function postThemMoiDeCuong(Request $request) {
        $data = $request->all();

        $decuong_check = DB::table('table_decuongchitiet')
                            ->where('id_hocphan', $data['id_ten_hoc_phan'])
                            ->where('khungchuongtrinh', $data['khungchuongtrinh'])
                            ->first();

        if ($decuong_check) {
            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);
        } else {

            $de_cuong = new modeldecuongchitiet;
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
            //$de_cuong->id_nganh = $data['nganh'];
            $de_cuong->loaihocphan = $data['loai_hoc_phan'];
            $de_cuong->khoikienthuc = $data['khoi_kien_thuc'];
            $de_cuong->mota_tomtat = $data['mota_tomtat'];
            $de_cuong->muctieu_kienthuc = $data['muctieu_kienthuc'];
            $de_cuong->muctieu_kynang = $data['muctiey_kynang'];
            $de_cuong->muctieu_thaido = $data['muctieu_thaido'];
            $de_cuong->nhiemvu = $data['nhiemvu'];
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

    public function getSuaDeCuong($id_decuong) {
        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_decuong', $id_decuong)->first();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

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

        return view('admin.decuong.khungchuongtrinh.sua_decuong')
                ->with('all_decuong', $all_decuong)
                ->with('list_gvdc', $list_gvdc)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
                ->with('all_tltk_sach', $all_tltk_sach)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung);
    }

    public function getSuaDeCuongMoi($id_decuong) {
        $all_decuong = DB::table('table_decuongchitiet')
        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
        ->where('table_decuongchitiet.id_decuong', $id_decuong)->first();

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

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

        return view('admin.decuong.khungchuongtrinh.sua_decuong_moi')
                ->with('all_decuong', $all_decuong)
                ->with('list_gvdc', $list_gvdc)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
                ->with('all_tltk_sach', $all_tltk_sach)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung);
    }

    public function postSuaDeCuong($id_decuong, Request $request) {
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
            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);
        } else {

            $de_cuong = modeldecuongchitiet::find($id_decuong);
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
            //$de_cuong->id_nganh = $data['nganh'];
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

            return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);

        }
    }

    public function getTenHocPhanDeCuong(Request $request) {
        if ($request->ajax()) {

            $query = (String)$request->query;

            $data = DB::table('table_hocphan')->where('tenhocphan', 'LIKE', "%{$query}%")->limit(7)->get();

            $output = '<ul>';

            $temp = 0;

            foreach($data as $row) {   
                if ($temp == 0) {
                    $output .= '<li data-value="'.$row->id.'" class="active" >'.$row->tenhocphan.'</li>';
                } else {
                    $output .= '<li data-value="'.$row->id.'">'.$row->tenhocphan.'</li>';
                }
               
               $temp++;
            }
            $output .= '</ul>';
            echo $output;

        }
    }

    public function getGiangVienPhuTrachDeCuong(Request $request) {
        if ($request->ajax()) {

            $query = (String)$request->tengiangvien;

            $data = DB::table('table_giangvien')->where('hodem', 'LIKE', "%{$query}%")->orwhere('ten', 'LIKE', "%{$query}%")->limit(7)->get();

            $output = '<ul>';
            foreach($data as $row) {   
                $output .= '<li data-value="'.$row->id.'">'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
            }
            $output .= '</ul>';

            echo $output;

        }
    }

    public function getGiangVienDayCungDeCuong(Request $request) {
        if ($request->ajax()) {

            $query = (String)$request->tengiangvien;

            $id_gvptc = (String)$request->id_gvptc;

            $id_gvdc1 = (String)$request->id_gvdc1;

            $data = DB::table('table_giangvien')
                    ->where('hodem', 'LIKE', "%{$query}%")
                    ->orwhere('ten', 'LIKE', "%{$query}%")
                    ->limit(7)->get();     

            $output = '<ul>';
            foreach($data as $row) {
                if($row->id != $id_gvptc) {
                    $output .= '<li data-value="'.$row->id.'">'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
                }
            }
            $output .= '</ul>';

            echo $output;

        }
    }

    public function test() {

        $khungchuongtrinh = 154;

        $khunghientai = DB::table('table_khungchuongtrinh')
                        ->where('id', $khungchuongtrinh)
                        ->first();

        if($khunghientai->isKhungnangcao == 0) {
            $data = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                            ->get();
        } else {
            $chuandaura_parent = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                            ->get();

            $chuandaura_child = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                            ->get();

            foreach($chuandaura_parent as $value_parent) {
                $data[] = $value_parent;
            }

            foreach($chuandaura_child as $value_child) {
                $data[] = $value_child;
            }

        }

        
        

        echo "<pre>";
        print_r($data);
    }

    public function chonNganhDeCuong(Request $request) {

		if($request->ajax()) {

            $id_hocphan = (String)$request->id_hocphan;
            $khungchuongtrinh = (String)$request->khungchuongtrinh;

            $data = [];

            $khunghientai = DB::table('table_khungchuongtrinh')
                        ->where('id', $khungchuongtrinh)
                        ->first();

            if($khunghientai->isKhungnangcao == 0) {
                $data = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                                ->get();
            } else {
                $chuandaura_parent = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                                ->get();

                $chuandaura_child = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                                ->get();

                foreach($chuandaura_parent as $value_parent) {
                    $data[] = $value_parent;
                }

                foreach($chuandaura_child as $value_child) {
                    $data[] = $value_child;
                }

            }

            $all_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                            ->where('id_hocphan', $id_hocphan)
                            ->where('khungchuongtrinh', $khungchuongtrinh)
                            ->get();

            $all_chuandaura = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $khungchuongtrinh)  
                        ->get();

            $output = '';

			$stt_cdr_chung = 0; 
			foreach($data as $value_cdr_chung) {

                $stt_cdr_chung++;

                $output .= '<tr>';
                $output .= '<td class="stt-cdr">'.$stt_cdr_chung.'</td>';
                $output .= '<td class="noi-cdr-chung">PLO'.$stt_cdr_chung.' '.$value_cdr_chung->noidung_cdr_chung.'</td>';
                $output .= '<td class="list-cdr-hoc-phan" id="ds-cdr" >';
                $output .= '<div id="add-parent-cdr-'.$value_cdr_chung->id_cdr_chung.'">';   

                foreach($all_moilienhe as $value_all_moilienhe) {
                    if($value_all_moilienhe->id_chuandaura_chung == $value_cdr_chung->id_cdr_chung) {
                        $output .= '<div class="line-add-cdr">';
                        $output .= '<input type="hidden" name="list_cdr[]" value="'.$value_cdr_chung->id_cdr_chung.'">';
                        $output .= '<select name="list_cdr[]" multiple="multiple" required size="4" id="select_chuandaura">';
                            foreach($all_chuandaura as $value_all_chuandaura) {
                                $output .= '<option value="'.$value_all_chuandaura->id.'" ';
                                if ($value_all_chuandaura->id == $value_all_moilienhe->id_chuandaura_monhoc) {
                                    $output .=  'selected';
                                }
                                $output .= '>'.$value_all_chuandaura->noi_dung.'</option>';
                            }
  
                        $output .= '</select>';
                        $output .= '<select name="list_cdr[]" multiple="multiple" required id="select_mucdo">';
                        $output .= '<option value="0" '; 

                        if($value_all_moilienhe->mucdo == 0) {
                            $output .=  'selected'; 
                        }
                        $output .= '>I</option>';

                        $output .= '<option value="1" '; 
                        if($value_all_moilienhe->mucdo == 1) {
                            $output .=  'selected'; 
                        }
                        $output .= '>R</option>';

                        $output .= '<option value="2" '; 
                        if($value_all_moilienhe->mucdo == 2) {
                            $output .=  'selected'; 
                        }
                        $output .= '>M</option>';

                        $output .=' </select>';
                        $output .= '<span id="delete-moilienhe" data-value="'.$value_all_moilienhe->id.'" >Xóa</span>';
                        $output .= '</div>';
                    }
                }

                $output .= '<div class="line-add-cdr">';
                $output .= '<input type="hidden" name="list_cdr[]" value="'.$value_cdr_chung->id_cdr_chung.'">';
                $output .= '<select name="list_cdr[]" multiple="multiple" size="4" id="select_chuandaura">';

                foreach($all_chuandaura as $value_all_chuandaura) {
                    $output .= '<option value="'.$value_all_chuandaura->id.'" >'.$value_all_chuandaura->noi_dung.'</option>';
                }
                    
                $output .= '</select>';
                $output .= '<select name="list_cdr[]" multiple="multiple" id="select_mucdo">';
                $output .= '<option value="0" selected>I</option>';
                $output .= '<option value="1">R</option>';
                $output .= '<option value="2">M</option>';
                $output .=' </select>';
                $output .= '<h5 id="add-moilienhe" data-value="'.$value_cdr_chung->id_cdr_chung.'" >Thêm</h5>';
                $output .= '</div>';
                    
                $output .= '</div>';
                $output .= '</td>';

			    $output .= '</tr>';
			}

			echo $output;

		}

	}

    public function addclo(Request $request) {
        
        if ($request->ajax()) {

            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;
            $noidung_clo = (String)$request->noidung_clo;

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->orderBy('stt', 'desc')
                        ->first();

            if($all_clo) {
                $stt_clo = $all_clo->stt;
            } else {
                $stt_clo = 0;
            }

            $save_clo = new chuandauramonhoc;
            $save_clo->stt = $stt_clo + 1;
            $save_clo->noi_dung = $noidung_clo;
            $save_clo->id_hocphan = $id_hocphan;
            $save_clo->khungchuongtrinh = $id_khung;
            $save_clo->save();

            echo "Sucessfully";

        }
    }

    public function loadclo(Request $request) {
        if ($request->ajax()) {

            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->orderBy('stt', 'ASC')
                        ->get();

            $output = '';

            foreach($all_clo as $value_all_clo) {
                $output .= '<tr>';
                $output .= '<td class="align-middle">'.$value_all_clo->stt.'</td>';
                $output .= '<td class="align-middle">';
                $output .= '<textarea name="" id="noidung_clo" cols="70" rows="2" placeholder="Nhập chuẩn đầu ra học phần">'.$value_all_clo->noi_dung.'</textarea>';
                $output .= '</td>';
                $output .= '<td class="align-middle">';
                $output .= '<p id="edit-clo" data-value="'.$value_all_clo->id.'" >Sửa</p>';
                $output .= '<p id="delete-clo" data-value="'.$value_all_clo->id.'" >Xóa</p>';
                $output .= '</td>';
                $output .= '</tr>';
            }

            echo $output;

        }
    }

    public function editclo(Request $request) {
        if ($request->ajax()) {

            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;
            $noidung_clo = (String)$request->noidung_clo;
            $id_clo = (String)$request->id_clo;

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->where('id', $id_clo)
                        ->update(['noi_dung' => $noidung_clo]);

            echo "Sucessfully";

        }
    }

    public function deleteclo(Request $request) {
        if ($request->ajax()) {

            $id_clo = (String)$request->id_clo;

            $current_clo = DB::table('table_chuandaura_monhoc')->where('id', $id_clo)->first();

            $update_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $current_clo->id_hocphan)
                        ->where('khungchuongtrinh', $current_clo->khungchuongtrinh)
                        ->where('stt', '>', $current_clo->stt)
                        ->get();
            
            if (!empty($update_clo)) {
                foreach($update_clo as $value_update_clo) {
                    $ud_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id', $value_update_clo->id)
                        ->update(['stt' => $value_update_clo->stt - 1]);
                }
            }

            $delete_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id', $id_clo);

            if (isset($delete_clo)) {
                $delete_clo->delete();
            }

            echo "Sucessfully";

        }
    }

    public function add_moilienhecloplo(Request $request) {
        if ($request->ajax()) {

            $id_chuandaura_chung = (String)$request->id_chuandaura_chung;
            $id_chuandaura = (String)$request->id_chuandaura;
            $mucdo = (String)$request->mucdo;
            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;

            $check = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                    ->where('id_chuandaura_chung', $id_chuandaura_chung)
                    ->where('id_chuandaura_monhoc', $id_chuandaura)
                    ->where('id_hocphan', $id_hocphan)
                    ->where('khungchuongtrinh', $id_khung)
                    ->first();

            if($check) {
                return "Chuẩn đầu ra học phần này đã thêm rồi !!!";
            }

            $moilienhe = new moilienhecloplo;
            $moilienhe->id_chuandaura_chung = $id_chuandaura_chung;
            $moilienhe->id_chuandaura_monhoc = $id_chuandaura;
            $moilienhe->mucdo = $mucdo;
            $moilienhe->id_hocphan = $id_hocphan;
            $moilienhe->khungchuongtrinh = $id_khung;
            $moilienhe->save();

            echo "Successfull";

        }
    }

    public function edit_moilienhecloplo_cdr(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
            $id_chuandaura = $request->id_chuandaura;

            $mlh = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                    ->where('id', $id_moilienhe)
                    ->first();

            $check = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                    ->where('id_chuandaura_chung', $mlh->id_chuandaura_chung)
                    ->where('id_chuandaura_monhoc', $id_chuandaura)
                    ->where('id_hocphan', $mlh->id_hocphan)
                    ->where('khungchuongtrinh', $mlh->khungchuongtrinh)
                    ->first();

            if($check) {
                return "Chuẩn đầu ra học phần này đã thêm rồi !!!";
            }

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe)
                        ->update(['id_chuandaura_monhoc' => $id_chuandaura]);

            echo "Successfull";

        }
    }

    public function edit_moilienhecloplo_mucdo(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
            $mucdo = $request->mucdo;

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe)
                        ->update(['mucdo' => $mucdo]);

            echo "Successfull";

        }
    }

    public function delete_moilienhecloplo(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
 
            $delete_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe);

            if (isset($delete_moilienhe)) {
                $delete_moilienhe->delete();
            }
            echo "Successfull";
        }
    }

    public function chonNganhDeCuongMoi(Request $request) {
        if($request->ajax()) {

            $id_hocphan = (String)$request->id_hocphan;
            $khungchuongtrinh = (String)$request->khungchuongtrinh;

            $data = [];

            $khunghientai = DB::table('table_khungchuongtrinh')
                        ->where('id', $khungchuongtrinh)
                        ->first();

            if($khunghientai->isKhungnangcao == 0) {
                $data = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                                ->get();
            } else {
                $chuandaura_parent = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                                ->get();

                $chuandaura_child = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                                ->get();

                foreach($chuandaura_parent as $value_parent) {
                    $data[] = $value_parent;
                }

                foreach($chuandaura_child as $value_child) {
                    $data[] = $value_child;
                }

            }

            foreach($data as $value_data) {
                $all_chuandaura_chung_chitiet = DB::table('table_chuandaura_chung_chitiet')
                                                ->where('id_cdr_chung', $value_data->id_cdr_chung)
                                                ->get();                 
                $value_data->pli = $all_chuandaura_chung_chitiet;
                $value_data->count_pli = count($all_chuandaura_chung_chitiet);
            }

            $all_moilienhe_clo_pi = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                            ->where('id_hocphan', $id_hocphan)
                            ->where('khungchuongtrinh', $khungchuongtrinh)
                            ->get();

            $all_chuandaura = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $khungchuongtrinh)  
                        ->get();

            $output = '';

			$stt_cdr_chung = 0; 
			foreach($data as $value_cdr_chung) {

                $stt_cdr_chung ++;

                $output .= '<tr>';
                $output .= '<td rowspan="'.($value_cdr_chung->count_pli+1).'" class="stt-cdr">'.$stt_cdr_chung.'</td>';
                $output .= '<td rowspan="'.($value_cdr_chung->count_pli+1).'" class="noi-cdr-chung">PLO'.$stt_cdr_chung.' '.$value_cdr_chung->noidung_cdr_chung.'</td>';
			    $output .= '</tr>';

                $stt_pi = 0;

                foreach($value_cdr_chung->pli as $value_pli) {

                    $stt_pi++;

                    $output .= '<tr>';
                    $output .= '<td>PI'.$stt_cdr_chung.'.'.$stt_pi.' '.$value_pli->noidung_cdr_chitiet.'</td>';
                    $output .= '<td>';

                    $output .= '<div id="add-parent-cdr-'.$value_pli->id_cdr_chitiet.'">';   

                    foreach($all_moilienhe_clo_pi as $value_all_moilienhe) {
                        if($value_all_moilienhe->id_chuandaura_chung_chitiet == $value_pli->id_cdr_chitiet) {
                            $output .= '<div class="line-add-cdr">';
                            $output .= '<select multiple="multiple" required size="4" id="select_chuandaura">';
                                foreach($all_chuandaura as $value_all_chuandaura) {
                                    $output .= '<option value="'.$value_all_chuandaura->id.'" ';
                                    if ($value_all_chuandaura->id == $value_all_moilienhe->id_chuandaura_monhoc) {
                                        $output .=  'selected';
                                    }
                                    $output .= '>CLO'.$value_all_chuandaura->stt.' '.$value_all_chuandaura->noi_dung.'</option>';
                                }
    
                            $output .= '</select>';
                            $output .= '<select multiple="multiple" required id="select_mucdo">';
                            $output .= '<option value="0" '; 

                            if($value_all_moilienhe->mucdo == 0) {
                                $output .=  'selected'; 
                            }
                            $output .= '>I</option>';

                            $output .= '<option value="1" '; 
                            if($value_all_moilienhe->mucdo == 1) {
                                $output .=  'selected'; 
                            }
                            $output .= '>R</option>';

                            $output .= '<option value="2" '; 
                            if($value_all_moilienhe->mucdo == 2) {
                                $output .=  'selected'; 
                            }
                            $output .= '>M</option>';

                            $output .=' </select>';
                            $output .= '<span id="delete-moilienhe" data-value="'.$value_all_moilienhe->id.'" >Xóa</span>';
                            $output .= '</div>';
                        }
                    }

                    $output .= '<div class="line-add-cdr">';
                    $output .= '<input type="hidden" name="list_cdr[]" value="'.$value_cdr_chung->id_cdr_chung.'">';
                    $output .= '<select name="list_cdr[]" multiple="multiple" size="4" id="select_chuandaura">';

                    foreach($all_chuandaura as $value_all_chuandaura) {
                        $output .= '<option value="'.$value_all_chuandaura->id.'" >CLO'.$value_all_chuandaura->stt.' '.$value_all_chuandaura->noi_dung.'</option>';
                    }
                        
                    $output .= '</select>';
                    $output .= '<select name="list_cdr[]" multiple="multiple" id="select_mucdo">';
                    $output .= '<option value="0" selected>I</option>';
                    $output .= '<option value="1">R</option>';
                    $output .= '<option value="2">M</option>';
                    $output .=' </select>';
                    $output .= '<h5 id="add-moilienhe" data-value="'.$value_pli->id_cdr_chitiet.'" >Thêm</h5>';
                    $output .= '</div>';
                        
                    $output .= '</div>';

                    $output .= '</td>';
                    $output .= '</tr>';
                }


			}

			echo $output;

		}
    }

    public function add_moilienheclopi(Request $request) {
        if ($request->ajax()) {

            $id_chuandaura_chung_chitiet = (String)$request->id_chuandaura_chung_chitiet;
            $id_chuandaura = (String)$request->id_chuandaura;
            $mucdo = (String)$request->mucdo;
            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;
            $id_nganh = (String)$request->id_nganh;

            $check = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                    ->where('id_chuandaura_chung_chitiet', $id_chuandaura_chung_chitiet)
                    ->where('id_chuandaura_monhoc', $id_chuandaura)
                    ->where('id_hocphan', $id_hocphan)
                    ->where('khungchuongtrinh', $id_khung)
                    ->first();

            if($check) {
                return "Chuẩn đầu ra học phần này đã thêm rồi !!!";
            }

            $moilienhe = new moilienheclopi;
            $moilienhe->id_chuandaura_chung_chitiet = $id_chuandaura_chung_chitiet;
            $moilienhe->id_chuandaura_monhoc = $id_chuandaura;
            $moilienhe->mucdo = $mucdo;
            $moilienhe->id_hocphan = $id_hocphan;
            $moilienhe->khungchuongtrinh = $id_khung;
            $moilienhe->save();

            echo "Successfull";

        }
    }

    public function delete_moilienheclopi(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
            $id_hocphan = $request->id_hocphan;
            $id_khung = $request->id_khung;
            $id_nganh = $request->id_nganh;

            $delete_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                        ->where('id', $id_moilienhe);

            if (isset($delete_moilienhe)) {
                $delete_moilienhe->delete();
            }

            echo "Successfull";

        }
    }

    public function edit_moilienheclopi_cdr(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
            $id_chuandaura = $request->id_chuandaura;

            $id_hocphan = $request->id_hocphan;
            $id_khung = $request->id_khung;
            $id_nganh = $request->id_nganh;

            $mlh = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                    ->where('id', $id_moilienhe)
                    ->first();

            $check = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                    ->where('id_chuandaura_chung_chitiet', $mlh->id_chuandaura_chung_chitiet)
                    ->where('id_chuandaura_monhoc', $id_chuandaura)
                    ->where('id_hocphan', $mlh->id_hocphan)
                    ->where('khungchuongtrinh', $mlh->khungchuongtrinh)
                    ->first();

            if($check) {
                return "Chuẩn đầu ra học phần này đã thêm rồi !!!";
            }

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                        ->where('id', $id_moilienhe)
                        ->update(['id_chuandaura_monhoc' => $id_chuandaura]);

            echo "Successfull";

        }
    }

    public function edit_moilienheclopi_mucdo(Request $request) {
        if ($request->ajax()) {

            $id_moilienhe = $request->id_moilienhe;
            $mucdo = $request->mucdo;
            $id_hocphan = $request->id_id_hocphannganh;
            $id_khung = $request->id_khung;
            $id_nganh = $request->id_nganh;

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                        ->where('id', $id_moilienhe)
                        ->update(['mucdo' => $mucdo]);

            echo "Successfull";

        }
    }

    public function getQuanLyPLO($id_khung) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')
                            ->join('table_nganh', 'table_khungchuongtrinh.id_nganh', 'table_nganh.id')
                            ->where('table_khungchuongtrinh.id', $id_khung)
                            ->first(); 

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $getnamhoc_hientai = DB::table('table_khungchuongtrinh')
                            ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                            ->where('table_khungchuongtrinh.id', $id_khung)
                            ->first()->nambatdau;

        return view('admin.decuong.khungchuongtrinh.quanly_plo')
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('id_khung', $id_khung)
                ->with('getnamhoc_hientai', $getnamhoc_hientai);
    }

    public function getLoadPLO(Request $request) {
        if ($request->ajax()) {
            
            $id_khung = (String)$request->id_khung;

            $khunghientai = DB::table('table_khungchuongtrinh')
                        ->where('id', $id_khung)
                        ->first();

            if($khunghientai->isKhungnangcao == 0) {
                $data = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                                ->get();
            } else {
                $chuandaura_parent = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                                ->get();

                $chuandaura_child = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                                ->get();

                foreach($chuandaura_parent as $value_parent) {
                    $value_parent->isParent = 1;
                    $data[] = $value_parent;
                }

                foreach($chuandaura_child as $value_child) {
                    $data[] = $value_child;
                }

            }

            $output = '';

			$stt_cdr_chung = 1; 
			foreach($data as $value_cdr_chung) {

                if(isset($value_cdr_chung->isParent)){
                    $output .= '<tr class="click-plo disabled" data-value="'.$value_cdr_chung->id_cdr_chung.'">';
                } else {
                    $output .= '<tr class="click-plo" data-value="'.$value_cdr_chung->id_cdr_chung.'">';
                }
                
                $output .= '<td style="width:5%;" class="align-middle" >'.$stt_cdr_chung++.'</td>';
                $output .= '<td style="width:10%;" class="align-middle" >PLO '.$value_cdr_chung->ten_plo.'</td>';
                $output .= '<td style="text-align: left;" class="align-middle" >'.$value_cdr_chung->noidung_cdr_chung.'</td>';
                $output .= '</td>';
			    $output .= '</tr>';
            }

            echo $output;   
        }
    }

    public function getThemPLO(Request $request) {
        if ($request->ajax()) {
            
            $id_khung = (String)$request->id_khung;
            $noidung = (String)$request->noidung;

            $max_plo = DB::table('table_chuandaura_chung')
                        ->where('id_khungchuongtrinh', $id_khung)
                        ->max('ten_plo');

            if($max_plo) {
                $stt_ten_plo = $max_plo+1;
            } else {
                $stt_ten_plo = 1;
            }

            $chuandaurachung = new chuandaurachung;
            $chuandaurachung->ten_plo = $stt_ten_plo;
            $chuandaurachung->noidung_cdr_chung = $noidung;
            $chuandaurachung->id_khungchuongtrinh = $id_khung;
            $chuandaurachung->save();

            echo "Successfull ";

        }
    }

    public function getLoadSuaPLO(Request $request) {
        if ($request->ajax()) {
            
            $id_chuandaurachung = (String)$request->id_chuandaurachung;
            
            $chuandaurachung_sua = DB::table('table_chuandaura_chung')
                                    ->where('id_cdr_chung', $id_chuandaurachung)   
                                    ->first();

            echo json_encode($chuandaurachung_sua);
        }
    }

    public function getSuaPLO(Request $request) {
        if ($request->ajax()) {
            
            $id_chuandaurachung = (String)$request->id_chuandaurachung;
            $noidung = (String)$request->noidung;

            $chuandaurachung = chuandaurachung::find($id_chuandaurachung);
            $chuandaurachung->noidung_cdr_chung = $noidung;
            $chuandaurachung->save();

            echo "Successfull";
        }
    }

    public function getXoaPLO(Request $request) {
        if ($request->ajax()) {
            
            $id_cdr_chung = (String)$request->id_cdr_chung;

            $chuandaurachung = chuandaurachung::find($id_cdr_chung);
            $chuandaurachung->delete();

            echo "Successfull";

        }
    }

    public function getLoadPI(Request $request) {
        
        if ($request->ajax()) {
            
            $id_khung = (String)$request->id_khung;

            $data = [];

            $khunghientai = DB::table('table_khungchuongtrinh')
                        ->where('id', $id_khung)
                        ->first();

            if($khunghientai->isKhungnangcao == 0) {
                $data = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                                ->get();
            } else {
                $chuandaura_parent = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                                ->get();

                $chuandaura_child = DB::table('table_chuandaura_chung')
                                ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                                ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                                ->get();

                foreach($chuandaura_parent as $value_parent) {
                    $value_parent->isParent = 1;
                    $data[] = $value_parent;
                }

                foreach($chuandaura_child as $value_child) {
                    $data[] = $value_child;
                }

            }



            foreach($data as $value_data) {
                $all_chuandaura_chung_chitiet = DB::table('table_chuandaura_chung_chitiet')
                                                ->where('id_cdr_chung', $value_data->id_cdr_chung)
                                                ->get();      
                
                $value_data->pi = $all_chuandaura_chung_chitiet;
                $value_data->count_pi = count($all_chuandaura_chung_chitiet);
            }

            $output = '';

			$stt_cdr_chung = 1; 
			foreach($data as $value_cdr_chung) {

                if(isset($value_cdr_chung->isParent)) {
                    $output .= '<tr class="disabled" >';
                } else {
                    $output .= '<tr class="click-plo" data-value="'.$value_cdr_chung->id_cdr_chung.'" >';
                }

                $output .= '<td style="width:2%;" class="align-middle" rowspan="'.($value_cdr_chung->count_pi+1).'" >'.$stt_cdr_chung++.'</td>';
                $output .= '<td style="width:30%;" class="align-middle" rowspan="'.($value_cdr_chung->count_pi+1).'" >'.$value_cdr_chung->noidung_cdr_chung.'</td>';
			    $output .= '</tr>';

                if(isset($value_cdr_chung->pi)) {
                    foreach($value_cdr_chung->pi as $value_pi) {

                        if(isset($value_cdr_chung->isParent)) {
                            $output .= '<tr class="disabled">';
                        } else {
                            $output .= '<tr class="click-pi" data-value="'.$value_pi->id_cdr_chitiet.'" >';
                        }
                            $output .= '<td class="align-middle" style="text-align:left;">';
                            $output .= '<p>'.$value_pi->noidung_cdr_chitiet.'</p>';
                            $output .= '<div class="action-pi">';
                            $output .= '</div>';
                            $output .= '</td>';
                        $output .= '</tr>';
                    }
                }
            }

            echo $output;

        }
    }

    public function getThemPI(Request $request) {
        if($request->ajax()) {
            $noidung_pi = (String)$request->noidung_pi;
            $id_cdr_chung = (String)$request->id_cdr_chung;

            $chuandaurachungchitiet = new chuandaurachungchitiet;
            $chuandaurachungchitiet->noidung_cdr_chitiet = $noidung_pi;
            $chuandaurachungchitiet->id_cdr_chung = $id_cdr_chung;
            $chuandaurachungchitiet->save();

            echo "Successfull";
        }
    }

    public function getLoadSuaPI(Request $request) {
        if ($request->ajax()) {
            
            $id_chuandaurachung_chitiet = (String)$request->id_chuandaurachung_chitiet;
            
            $chuandaurachung_chitiet_sua = DB::table('table_chuandaura_chung_chitiet')
                                            ->where('id_cdr_chitiet', $id_chuandaurachung_chitiet)   
                                            ->first();

            echo json_encode($chuandaurachung_chitiet_sua);
        }
    }

    public function getSuaPI(Request $request) {
        if($request->ajax()) {
            $noidung_pi = (String)$request->noidung_pi;
            $id_cdr_chitiet = (String)$request->id_cdr_chitiet;

            $chuandaurachungchitiet = chuandaurachungchitiet::find($id_cdr_chitiet);
            $chuandaurachungchitiet->noidung_cdr_chitiet = $noidung_pi;
            $chuandaurachungchitiet->save();

            echo "Successfull";
        }
    }

    public function getXoaPI(Request $request) {
        if($request->ajax()) {

            $id_cdr_chitiet = (String)$request->id_cdr_chitiet;

            $chuandaurachungchitiet = chuandaurachungchitiet::find($id_cdr_chitiet);
            $chuandaurachungchitiet->delete();

            echo "Successfull";
        }
    }

    public function getThemDanhGiaHocPhan($id_decuong) {

        $decuong = DB::table('table_decuongchitiet')
                    ->where('id_decuong', $id_decuong)
                    ->first();

        $tenhocphan = DB::table('table_hocphan')
                        ->where('id', $decuong->id_hocphan)
                        ->first();


        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $decuong->id_hocphan)
                    ->where('khungchuongtrinh', $decuong->khungchuongtrinh)
                    ->get();

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
 
        return view('admin.decuong.khungchuongtrinh.them_danhgiahocphan')
                ->with('all_cdr', $all_cdr)
                ->with('all_tpdg', $all_tpdg)
                ->with('all_tpdg_child', $all_tpdg_child)
                ->with('id_decuong', $id_decuong)
                ->with('tenhocphan', $tenhocphan);
    }

    public function postThemDanhGiaHocPhan($id_decuong, Request $request) {
        $trong_so_thanh_phan = $request->trong_so_thanh_phan;
        $data_dghp = $this->array_2d($request->bai_danh_gia, 4);

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)
                        ->first();

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

    public function getSuaDanhGiaHocPhan($id_decuong) {

        $decuong = DB::table('table_decuongchitiet')
                    ->where('id_decuong', $id_decuong)
                    ->first();

        $tenhocphan = DB::table('table_hocphan')
                    ->where('id', $decuong->id_hocphan)
                    ->first();

        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $decuong->id_hocphan)
                    ->where('khungchuongtrinh', $decuong->khungchuongtrinh)
                    ->get();

        $all_tpdg = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', 0)->get();
        $all_tpdg_child = DB::table('table_thanhphandanhgia')->where('id_baidanhgia', '!=', 0)->get();

        $id_hocphan = $decuong->id_hocphan;
        $khungchuongtrinh = $decuong->khungchuongtrinh;

        $all_danhgiahocphan = DB::table('table_danhgiahocphan')
                                ->where('id_hocphan', $id_hocphan)
                                ->where('khungchuongtrinh', $khungchuongtrinh)
                                ->get();

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

        $all_trongsothanhphan = DB::table('table_trongso_hp')
                                ->where('id_hp', $id_hocphan)
                                ->where('khungchuongtrinh', $khungchuongtrinh)
                                ->get();

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

        return view('admin.decuong.khungchuongtrinh.sua_danhgiahocphan')
                ->with('all_cdr', $all_cdr)
                ->with('all_tpdg', $all_tpdg)
                ->with('all_tpdg_child', $all_tpdg_child)
                ->with('id_decuong', $id_decuong)
                ->with('all_danhgiahocphan', $all_danhgiahocphan)
                ->with('all_trongsothanhphan', $all_trongsothanhphan)
                ->with('array_chuandaura', $array_chuandaura)
                ->with('tenhocphan', $tenhocphan);
    }

    public function postSuaDanhGiaHocPhan($id_decuong, Request $request) {
        $trong_so_thanh_phan = $request->trong_so_thanh_phan;
        $data_dghp = $this->array_2d($request->bai_danh_gia, 4);

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)
                        ->first();

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

    public function getThemKeHoachGiangDay($id_decuong) {
        $decuong = DB::table('table_decuongchitiet')
                    ->where('id_decuong', $id_decuong)
                    ->first();

        $tenhocphan = DB::table('table_hocphan')
                    ->where('id', $decuong->id_hocphan)
                    ->first();

        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $decuong->id_hocphan)
                    ->where('khungchuongtrinh', $decuong->khungchuongtrinh)
                    ->get();

        $id_hocphan = $decuong->id_hocphan;
        $khungchuongtrinh = $decuong->khungchuongtrinh;

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

        $dghp_parent = DB::table('table_thanhphandanhgia')
                        ->where('id_baidanhgia', 0)
                        ->get();


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

        return view('admin.decuong.khungchuongtrinh.them_kehoachgiangday')
                ->with('all_cdr', $all_cdr)
                ->with('all_dghp', $all_dghp)
                ->with('baidanhgia', $baidanhgia)
                ->with('id_decuong', $id_decuong)
                ->with('all_trongso', $all_trongso)
                ->with('tenhocphan', $tenhocphan);
    }

    public function postThemKeHoachGiangDay($id_decuong, Request $request) {

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

    public function getSuaKeHoachGiangDay($id_decuong) {

        $decuong_dghp = DB::table('table_decuongchitiet')
                    ->where('id_decuong', $id_decuong)
                    ->first();

        $tenhocphan = DB::table('table_hocphan')
                    ->where('id', $decuong_dghp->id_hocphan)
                    ->first();

        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $decuong_dghp->id_hocphan)
                    ->where('khungchuongtrinh', $decuong_dghp->khungchuongtrinh)
                    ->get();

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

        return view('admin.decuong.khungchuongtrinh.sua_kehoachgiangday')
        ->with('all_cdr', $all_cdr)
        ->with('all_dghp', $all_dghp)
        ->with('baidanhgia', $baidanhgia)
        ->with('id_decuong', $id_decuong)
        ->with('all_edit_khgd', $all_edit_khgd)
        ->with('all_edit_khgd_thuchanh', $all_edit_khgd_thuchanh)
        ->with('all_trongso', $all_trongso)
        ->with('tenhocphan', $tenhocphan);
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

    public function postSuaKeHoachGiangDay($id_decuong, Request $request) {

        $decuong_dghp = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)
                        ->first();

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

    public function getNhanBanDeCuong($id_decuong, $id_khung) {

        $all_decuong = DB::table('table_decuongchitiet')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->where('table_decuongchitiet.id_decuong', $id_decuong)
                        ->first();

        $khungchuongtrinh_cu = $all_decuong->khungchuongtrinh;

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

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

        $ten_hocphan = DB::table('table_hocphan')->where('id', $all_decuong->id_hocphan)->first()->tenhocphan;


        $all_chuandaura_cu = DB::table('table_chuandaura_monhoc')
                            ->where('id_hocphan', $all_decuong->id_hocphan)
                            ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                            ->get();

        $all_chuandaura_hientai = DB::table('table_chuandaura_monhoc')
                            ->where('id_hocphan', $all_decuong->id_hocphan)
                            ->where('khungchuongtrinh', $id_khung)
                            ->get();

        foreach($all_chuandaura_cu as $value_all_chuandaura_cu) {

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $all_decuong->id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->orderBy('stt', 'desc')
                        ->first();

            if($all_clo) {
                $stt_clo = $all_clo->stt;
            } else {
                $stt_clo = 0;
            }

            if(count($all_chuandaura_hientai)) {
                
                foreach($all_chuandaura_hientai as $value_all_chuandaura_hientai) {
                    if($value_all_chuandaura_cu->noi_dung != $value_all_chuandaura_hientai->noi_dung &&
                        $value_all_chuandaura_cu->id_hocphan != $value_all_chuandaura_hientai->id_hocphan &&
                        $value_all_chuandaura_cu->khungchuongtrinh != $value_all_chuandaura_hientai->khungchuongtrinh) {

                            $save_clo = new chuandauramonhoc;
                            $save_clo->stt = $stt_clo + 1;
                            $save_clo->noi_dung = $value_all_chuandaura_cu->noi_dung;
                            $save_clo->id_hocphan = $all_decuong->id_hocphan;
                            $save_clo->khungchuongtrinh = $id_khung;
                            $save_clo->save();

                        }
                }

            } else {

                $save_clo = new chuandauramonhoc;
                $save_clo->stt = $stt_clo + 1;
                $save_clo->noi_dung = $value_all_chuandaura_cu->noi_dung;
                $save_clo->id_hocphan = $all_decuong->id_hocphan;
                $save_clo->khungchuongtrinh = $id_khung;
                $save_clo->save();
                
            }
        }

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

        return view('admin.decuong.khungchuongtrinh.nhanban_decuong')
                ->with('all_decuong', $all_decuong)
                ->with('list_gvdc', $list_gvdc)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
                ->with('all_tltk_sach', $all_tltk_sach)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung)
                ->with('khungchuongtrinh_cu', $khungchuongtrinh_cu);
    }

    public function getNhanBanDeCuongMoi($id_decuong, $id_khung) {

        $all_decuong = DB::table('table_decuongchitiet')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->where('table_decuongchitiet.id_decuong', $id_decuong)
                        ->first();

        $khungchuongtrinh_cu = $all_decuong->khungchuongtrinh;

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $khungchuongtrinh = $this->data_khungchuongtrinh($khungchuongtrinh, 0);

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

        $ten_hocphan = DB::table('table_hocphan')->where('id', $all_decuong->id_hocphan)->first()->tenhocphan;


        $all_chuandaura_cu = DB::table('table_chuandaura_monhoc')
                            ->where('id_hocphan', $all_decuong->id_hocphan)
                            ->where('khungchuongtrinh', $all_decuong->khungchuongtrinh)
                            ->get();

        $all_chuandaura_hientai = DB::table('table_chuandaura_monhoc')
                            ->where('id_hocphan', $all_decuong->id_hocphan)
                            ->where('khungchuongtrinh', $id_khung)
                            ->get();

        foreach($all_chuandaura_cu as $value_all_chuandaura_cu) {

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $all_decuong->id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->orderBy('stt', 'desc')
                        ->first();

            if($all_clo) {
                $stt_clo = $all_clo->stt;
            } else {
                $stt_clo = 0;
            }

            if(count($all_chuandaura_hientai)) {
                
                foreach($all_chuandaura_hientai as $value_all_chuandaura_hientai) {
                    if($value_all_chuandaura_cu->noi_dung != $value_all_chuandaura_hientai->noi_dung &&
                        $value_all_chuandaura_cu->id_hocphan != $value_all_chuandaura_hientai->id_hocphan &&
                        $value_all_chuandaura_cu->khungchuongtrinh != $value_all_chuandaura_hientai->khungchuongtrinh) {

                            $save_clo = new chuandauramonhoc;
                            $save_clo->stt = $stt_clo + 1;
                            $save_clo->noi_dung = $value_all_chuandaura_cu->noi_dung;
                            $save_clo->id_hocphan = $all_decuong->id_hocphan;
                            $save_clo->khungchuongtrinh = $id_khung;
                            $save_clo->save();

                        }
                }

            } else {

                $save_clo = new chuandauramonhoc;
                $save_clo->stt = $stt_clo + 1;
                $save_clo->noi_dung = $value_all_chuandaura_cu->noi_dung;
                $save_clo->id_hocphan = $all_decuong->id_hocphan;
                $save_clo->khungchuongtrinh = $id_khung;
                $save_clo->save();
                
            }
        }

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

        return view('admin.decuong.khungchuongtrinh.nhanban_decuong_moi')
                ->with('all_decuong', $all_decuong)
                ->with('list_gvdc', $list_gvdc)
                ->with('ten_hocphan', $ten_hocphan)
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('all_tltk_giaotrinh', $all_tltk_giaotrinh)
                ->with('all_tltk_sach', $all_tltk_sach)
                ->with('id_hocphan', $id_hocphan)
                ->with('id_khung', $id_khung)
                ->with('khungchuongtrinh_cu', $khungchuongtrinh_cu);
    }

    public function postNhanBanDeCuong(Request $request) {

        $data = $request->all();

        $de_cuong = new modeldecuongchitiet;
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
        //$de_cuong->id_nganh = $data['nganh'];
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

        $all_danhgiahocphan = DB::table('table_danhgiahocphan')
                                ->where('id_hocphan', $data['id_ten_hoc_phan'])
                                ->where('khungchuongtrinh', $data['khungchuongtrinh_cu'])
                                ->get(); 

        foreach($all_danhgiahocphan as $value_all_danhgiahocphan) {
            $danh_gia_hoc_phan = new danhgiahocphan;
            $danh_gia_hoc_phan->phuongphapdanhgia = $value_all_danhgiahocphan->phuongphapdanhgia;
            $danh_gia_hoc_phan->trongsobaidanhgia = $value_all_danhgiahocphan->trongsobaidanhgia;
            $danh_gia_hoc_phan->id_baidanhgia = $value_all_danhgiahocphan->id_baidanhgia;
            $danh_gia_hoc_phan->id_baidanhgia_parent = $value_all_danhgiahocphan->id_baidanhgia_parent;
            $danh_gia_hoc_phan->id_hocphan = $value_all_danhgiahocphan->id_hocphan;
            $danh_gia_hoc_phan->khungchuongtrinh = $data['khungchuongtrinh'];
            $danh_gia_hoc_phan->cdr_hocphan = $value_all_danhgiahocphan->cdr_hocphan;
            $danh_gia_hoc_phan->save();
        }

        $all_kehoachgiangday = DB::table('table_kehoachgiangday')
                                ->where('id_hocphan', $data['id_ten_hoc_phan'])
                                ->where('khungchuongtrinh', $data['khungchuongtrinh_cu'])
                                ->get(); 
        
        foreach($all_kehoachgiangday as $value_all_kehoachgiangday) {
            $kehoachgiangday = new kehoachgiangday;
            $kehoachgiangday->buoi = $value_all_kehoachgiangday->buoi;
            $kehoachgiangday->noidung = $value_all_kehoachgiangday->noidung;
            $kehoachgiangday->hoatdongdayhoc = $value_all_kehoachgiangday->hoatdongdayhoc;
            $kehoachgiangday->baidanhgia = $value_all_kehoachgiangday->baidanhgia;
            $kehoachgiangday->cdrhocphan = $value_all_kehoachgiangday->cdrhocphan;
            $kehoachgiangday->id_hocphan = $value_all_kehoachgiangday->id_hocphan;
            $kehoachgiangday->thuochocphan = $value_all_kehoachgiangday->thuochocphan;
            $kehoachgiangday->khungchuongtrinh = $data['khungchuongtrinh'];
            $kehoachgiangday->save();
        }

        $all_trongsohocphan = DB::table('table_trongso_hp')
                                ->where('id_hp', $data['id_ten_hoc_phan'])
                                ->where('khungchuongtrinh', $data['khungchuongtrinh_cu'])
                                ->get(); 
        
        foreach($all_trongsohocphan as $value_all_trongsohocphan) {
            $trong_so = new trongsohocphan;
            $trong_so->id_hp = $value_all_trongsohocphan->id_hp;
            $trong_so->id_trongso = $value_all_trongsohocphan->id_trongso;
            $trong_so->trongso = $value_all_trongsohocphan->trongso;
            $trong_so->trangthai = 0;
            $trong_so->khungchuongtrinh = $data['khungchuongtrinh'];
            $trong_so->save();
        }

        return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$data['khungchuongtrinh']);

    }

    public function xoaDeCuong($id_decuong) {

        $xoadecuong = DB::table('table_decuongchitiet')
                        ->select('id_hocphan', 'khungchuongtrinh')
                        ->where('id_decuong', $id_decuong)
                        ->first();

        $id_hocphan = $xoadecuong->id_hocphan;
        $khungchuongtrinh = $xoadecuong->khungchuongtrinh;

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

        $deletemlhpi = moilienheclopi::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletemlhpi)) {
            $deletemlhpi->delete();
        }

        $deletetltk = tailieuthamkhao::where('id_hocphan', $id_hocphan)->where('khungchuongtrinh', $khungchuongtrinh);
        if (isset($deletetltk)) {
            $deletetltk->delete();
        }

        $delete_dc = modeldecuongchitiet::find($id_decuong);
        $delete_dc->delete();

        return Redirect::to('/admin/decuong/khung-chuong-trinh/'.$khungchuongtrinh);

    }

    public function xemDeCuong($id_decuong) {

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

        $id_hocphan = $all_decuong->id_hocphan;
        $khungchuongtrinh = $all_decuong->khungchuongtrinh;

        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $id_hocphan)
                    ->where('khungchuongtrinh', $khungchuongtrinh)
                    ->get();

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

        return view('admin.decuong.khungchuongtrinh.xem_decuong')
                ->with('all_decuong', $all_decuong)->with('list_gvdc', $list_gvdc)
                ->with('all_cdr', $all_cdr)->with('all_dghp', $all_dghp)->with('baidanhgia', $baidanhgia)->with('id_decuong', $id_decuong)
                ->with('all_kehoachgiangday_lt', $all_kehoachgiangday_lt)->with('all_kehoachgiangday_th', $all_kehoachgiangday_th)
                ->with('all_trongso', $all_trongso)
                ->with('all_tailieuthamkhao_giaotrinh', $all_tailieuthamkhao_giaotrinh)
                ->with('all_tailieuthamkhao_sach', $all_tailieuthamkhao_sach);

    }

    public function xemDeCuongMoi($id_decuong) {
        
        $all_decuong = DB::table('table_decuongchitiet')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->where('table_decuongchitiet.id_decuong', $id_decuong)
                        ->first();

        // echo "<pre>";
        // print_r($all_decuong);
        // die();

        $list_gvdc = [];

        if($all_decuong->gv_daycung != null) {
            $id_gvdc1 = explode("_", $all_decuong->gv_daycung);
            foreach ($id_gvdc1 as $value) {
                $gv = DB::table('table_giangvien')->where('id', $value)->first();
                $list_gvdc[] = $gv->chucdanh.' '.$gv->hodem.' '.$gv->ten;
            }
        }

        $id_hocphan = $all_decuong->id_hocphan;
        $khungchuongtrinh = $all_decuong->khungchuongtrinh;

        $all_cdr = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $id_hocphan)
                    ->where('khungchuongtrinh', $khungchuongtrinh)
                    ->get();

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

        $khunghientai = DB::table('table_khungchuongtrinh')
        ->where('id', $khungchuongtrinh)
        ->first();

        if($khunghientai->isKhungnangcao == 0) {
            $data = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                            ->get();
        } else {
            $chuandaura_parent = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                            ->get();

            $chuandaura_child = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khungchuongtrinh)
                            ->get();

            foreach($chuandaura_parent as $value_parent) {
                $all_PLO[] = $value_parent;
            }

            foreach($chuandaura_child as $value_child) {
                $all_PLO[] = $value_child;
            }

        }

        $tong_pi = 0;

        $all_PI = array();

        foreach($all_PLO as $value_all_PLO) {

            $all_chuandaura_chung_chitiet = DB::table('table_chuandaura_chung_chitiet')
                                            ->where('id_cdr_chung', $value_all_PLO->id_cdr_chung)
                                            ->get();  

            $value_all_PLO->count_pli = count($all_chuandaura_chung_chitiet);  

            $stt_pi = 1;

            if(count($all_chuandaura_chung_chitiet) > 0) {

                foreach($all_chuandaura_chung_chitiet as $value_all_chuandaura_chung_chitiet) {
                    $tong_pi++;
                    $value_all_chuandaura_chung_chitiet->stt_pi = $stt_pi++;
                    $all_PI[] = $value_all_chuandaura_chung_chitiet;
                }

            } else {

                $tong_pi++;

                $object = new stdClass();
                $object->noPI = 'no pi';

                $all_PI[] = $object;
            }
        }

        $list_moilienhe = array();

        foreach($all_PI as $value_all_PI) {

            if(!isset($value_all_PI->noPI)) {

                $moilienhe_clo_pi = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.id_hocphan', $id_hocphan)
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.khungchuongtrinh', $khungchuongtrinh)
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.id_chuandaura_chung_chitiet', $value_all_PI->id_cdr_chitiet)
                                    ->get();

                if(count($moilienhe_clo_pi) > 0) {

                    foreach($moilienhe_clo_pi as $value_moilienhe_clo_pi) {
                        $list_moilienhe[] = $value_moilienhe_clo_pi;
                    }

                }

            } 
        }

        usort($list_moilienhe, function($a, $b) { return $a->id_chuandaura_monhoc - $b->id_chuandaura_monhoc; });


        foreach($all_PI as $value_all_PI) {
            
            foreach($list_moilienhe as $value_list_moilienhe) {
                if($value_all_PI->id_cdr_chitiet == $value_list_moilienhe->id_chuandaura_chung_chitiet) {

                    if($value_list_moilienhe->mucdo == 0) {
                        $value_list_moilienhe->ten_mucdo = 'I';
                    } elseif($value_list_moilienhe->mucdo == 1) {
                        $value_list_moilienhe->ten_mucdo = 'R';
                    } elseif($value_list_moilienhe->mucdo == 2) {
                        $value_list_moilienhe->ten_mucdo = 'M';
                    }

                    $value_all_PI->moilienhe[] = $value_list_moilienhe;
                }
            }

        }
  
        // echo "<pre>";
        // print_r($all_PI);

        // echo "<pre>";
        // print_r($abc);

        // die();
            

        return view('admin.decuong.khungchuongtrinh.xem_decuong_moi')
                ->with('all_decuong', $all_decuong)
                ->with('list_gvdc', $list_gvdc)
                ->with('all_cdr', $all_cdr)
                ->with('all_PLO', $all_PLO)
                ->with('all_PI', $all_PI)
                ->with('tong_pi', $tong_pi)
                ->with('all_dghp', $all_dghp)
                ->with('baidanhgia', $baidanhgia)
                ->with('id_decuong', $id_decuong)
                ->with('all_kehoachgiangday_lt', $all_kehoachgiangday_lt)
                ->with('all_kehoachgiangday_th', $all_kehoachgiangday_th)
                ->with('all_trongso', $all_trongso)
                ->with('all_tailieuthamkhao_giaotrinh', $all_tailieuthamkhao_giaotrinh)
                ->with('all_tailieuthamkhao_sach', $all_tailieuthamkhao_sach);


    }

    public function xem_decuong_khgd($string) {
        $tach = explode("_", $string);
        return $tach;
    }

    public function getTaiLieuThamKhaoGiaoTrinh(Request $request) {
        if ($request->ajax()) {

            $tentailieu = (String)$request->tentailieu;

            $data = DB::table('table_tailieuthamkhao')
                    ->where('tentacgia', 'LIKE', "%{$tentailieu}%")
                    ->Orwhere('tensach', 'LIKE', "%{$tentailieu}%")
                    ->Orwhere('noixuatban', 'LIKE', "%{$tentailieu}%")
                    ->Orwhere('nhaxuatban', 'LIKE', "%{$tentailieu}%")
                    ->limit(7)
                    ->get();

            $output = '<ul>';
            foreach($data as $row) {   
                $output .= '<li data-value="'.$row->id.'" >'.$row->tensach.'</li>';
            }
            $output .= '</ul>';

            echo $output;

        }
    }

    public function getThongTinTaiLieuThamKhaoGiaoTrinh(Request $request) {

        if ($request->ajax()) {
            $id_tltk_gt = (String)$request->id_tltk_gt;
            
            $thongtin = DB::table('table_tailieuthamkhao')
                        ->where('id', $id_tltk_gt)   
                        ->first();

            echo json_encode($thongtin);

        }

    }

    public function getMaTranLienKetPloPiHp($id_khung) {

        $data = [];

        $khunghientai = DB::table('table_khungchuongtrinh')
                    ->where('id', $id_khung)
                    ->first();

        if($khunghientai->isKhungnangcao == 0) {
            $all_PLO = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                            ->get();
        } else {
            $chuandaura_parent = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                            ->get();

            $chuandaura_child = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                            ->get();

            foreach($chuandaura_parent as $value_parent) {
                $all_PLO[] = $value_parent;
            }

            foreach($chuandaura_child as $value_child) {
                $all_PLO[] = $value_child;
            }

        }

        $tong_pi = 0;

        $all_PI = array();

        foreach($all_PLO as $value_all_PLO) {

            $all_chuandaura_chung_chitiet = DB::table('table_chuandaura_chung_chitiet')
                                            ->where('id_cdr_chung', $value_all_PLO->id_cdr_chung)
                                            ->orderBy('id_cdr_chung', 'DES')
                                            ->get();  

            $value_all_PLO->count_pli = count($all_chuandaura_chung_chitiet);  

            $stt_pi = 1;

            if(count($all_chuandaura_chung_chitiet) > 0) {

                foreach($all_chuandaura_chung_chitiet as $value_all_chuandaura_chung_chitiet) {
                    $tong_pi++;
                    $value_all_chuandaura_chung_chitiet->stt_pi = $stt_pi++;
                    $all_PI[] = $value_all_chuandaura_chung_chitiet;
                }

            } else {

                $tong_pi++;

                $object = new stdClass();
                $object->noPI = 'no pi';

                $all_PI[] = $object;
            }
        }

        $all_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                        ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                        ->where('id_khung', $id_khung)
                        ->get();

        $tongso_TC = 0;

        foreach($all_hocphan as $value_all_hocphan) {
            $tongso_TC = $tongso_TC+$value_all_hocphan->soTC;
        }


        $stt_PI = 1;
        foreach($all_PI as $value_all_PI) {

            if(isset($check_stt_pi)) {
                if($check_stt_pi != $value_all_PI->id_cdr_chung) {
                    $stt_PI++;
                }
            }
            
            $check_stt_pi = $value_all_PI->id_cdr_chung;

            $value_all_PI->sothutupi = $stt_PI.'.'.$value_all_PI->stt_pi;
        }

        $all_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                        ->where('khungchuongtrinh', $id_khung)
                        ->get();

        foreach($all_moilienhe as $value_list_moilienhe) {
            if($value_list_moilienhe->mucdo == 0) {
                $value_list_moilienhe->ten_mucdo = 'I';
            } elseif($value_list_moilienhe->mucdo == 1) {
                $value_list_moilienhe->ten_mucdo = 'R';
            } elseif($value_list_moilienhe->mucdo == 2) {
                $value_list_moilienhe->ten_mucdo = 'M';
            }
        }

        return view('admin.decuong.khungchuongtrinh.matranlienket_plo_pi_hp')
                ->with('tong_pi', $tong_pi)
                ->with('all_PLO', $all_PLO)
                ->with('all_PI', $all_PI)
                ->with('all_hocphan', $all_hocphan)
                ->with('all_moilienhe', $all_moilienhe)
                ->with('tongso_TC', $tongso_TC);

    }

    public function getMaTranLienKetPloPiClo($id_khung, $id_hocphan) {

        $all_clo = DB::table('table_chuandaura_monhoc')
                    ->where('id_hocphan', $id_hocphan)
                    ->where('khungchuongtrinh', $id_khung)
                    ->get();



        $khunghientai = DB::table('table_khungchuongtrinh')
        ->where('id', $id_khung)
        ->first();

        if($khunghientai->isKhungnangcao == 0) {
            $data = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                            ->get();
        } else {
            $chuandaura_parent = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $khunghientai->isKhungnangcao)
                            ->get();

            $chuandaura_child = DB::table('table_chuandaura_chung')
                            ->join('table_khungchuongtrinh', 'table_chuandaura_chung.id_khungchuongtrinh', 'table_khungchuongtrinh.id')
                            ->where('table_chuandaura_chung.id_khungchuongtrinh', $id_khung)
                            ->get();

            foreach($chuandaura_parent as $value_parent) {
                $all_PLO[] = $value_parent;
            }

            foreach($chuandaura_child as $value_child) {
                $all_PLO[] = $value_child;
            }

        }

        $tong_pi = 0;

        $all_PI = array();

        foreach($all_PLO as $value_all_PLO) {

            $all_chuandaura_chung_chitiet = DB::table('table_chuandaura_chung_chitiet')
                                            ->where('id_cdr_chung', $value_all_PLO->id_cdr_chung)
                                            ->orderBy('id_cdr_chung', 'DES')
                                            ->get();  

            $value_all_PLO->count_pli = count($all_chuandaura_chung_chitiet);  

            $stt_pi = 1;

            if(count($all_chuandaura_chung_chitiet) > 0) {

                foreach($all_chuandaura_chung_chitiet as $value_all_chuandaura_chung_chitiet) {
                    $tong_pi++;
                    $value_all_chuandaura_chung_chitiet->stt_pi = $stt_pi++;
                    $all_PI[] = $value_all_chuandaura_chung_chitiet;
                }

            } else {

                $tong_pi++;

                $object = new stdClass();
                $object->noPI = 'no pi';

                $all_PI[] = $object;
            }
        }

        $stt_PI = 1;
        foreach($all_PI as $value_all_PI) {

            if(isset($check_stt_pi)) {
                if($check_stt_pi != $value_all_PI->id_cdr_chung) {
                    $stt_PI++;
                }
            }
            
            $check_stt_pi = $value_all_PI->id_cdr_chung;

            $value_all_PI->sothutupi = $stt_PI.'.'.$value_all_PI->stt_pi;
        }

        $list_moilienhe = array();

        foreach($all_PI as $value_all_PI) {

            if(!isset($value_all_PI->noPI)) {

                $moilienhe_clo_pi = DB::table('table_decuongchitiet_moilienhe_clo_pi')
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.id_hocphan', $id_hocphan)
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.khungchuongtrinh', $id_khung)
                                    ->where('table_decuongchitiet_moilienhe_clo_pi.id_chuandaura_chung_chitiet', $value_all_PI->id_cdr_chitiet)
                                    ->get();

                if(count($moilienhe_clo_pi) > 0) {

                    foreach($moilienhe_clo_pi as $value_moilienhe_clo_pi) {
                        $list_moilienhe[] = $value_moilienhe_clo_pi;
                    }

                }

            } 
        }

        usort($list_moilienhe, function($a, $b) { return $a->id_chuandaura_monhoc - $b->id_chuandaura_monhoc; });


        foreach($all_PI as $value_all_PI) {
            
            foreach($list_moilienhe as $value_list_moilienhe) {
                if($value_all_PI->id_cdr_chitiet == $value_list_moilienhe->id_chuandaura_chung_chitiet) {

                    if($value_list_moilienhe->mucdo == 0) {
                        $value_list_moilienhe->ten_mucdo = 'I';
                    } elseif($value_list_moilienhe->mucdo == 1) {
                        $value_list_moilienhe->ten_mucdo = 'R';
                    } elseif($value_list_moilienhe->mucdo == 2) {
                        $value_list_moilienhe->ten_mucdo = 'M';
                    }

                    $value_all_PI->moilienhe[] = $value_list_moilienhe;
                }
            }

        }

        return view('admin.decuong.khungchuongtrinh.matranlienket_plo_pi_clo')
                ->with('all_clo', $all_clo)
                ->with('all_PLO', $all_PLO)
                ->with('all_PI', $all_PI)
                ->with('tong_pi', $tong_pi); 

    }

    













}
