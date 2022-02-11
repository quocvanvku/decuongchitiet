<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\khungchuongtrinhhocphan;

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
use App\Models\khungchuongtrinh_muctieu;
use App\Models\moilienhepoplo;

use DB;
use Redirect;

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

    public function quanly_chuongtrinhdaotao($id_khung) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')
                            ->join('table_nganh', 'table_khungchuongtrinh.id_nganh', 'table_nganh.id')
                            ->where('table_khungchuongtrinh.id', $id_khung)
                            ->first();

        $list_hocky = DB::table('table_khungchuongtrinh_hocphan')
                    ->select('hocky')
                    ->where('id_khung', $id_khung)
                    ->DISTINCT()
                    ->get();

        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $cackhungkhac = DB::table('table_khungchuongtrinh')
                        ->where('id', '!=',$id_khung)
                        ->get();

        $khunghientai = DB::table('table_khungchuongtrinh')
                        ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                        ->where('table_khungchuongtrinh.id', $id_khung)
                        ->first();

        $nambatdau = $khunghientai->nambatdau;

        return view('admin.decuong.quanlychuongtrinhdaotao.quanlychuongtrinhdaotao')
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('id_khung', $id_khung)
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('list_hocky', $list_hocky)
                ->with('cackhungkhac', $cackhungkhac)
                ->with('nambatdau', $nambatdau);
    }

    public function getSuaHocPhanKhungChuongTrinh($id_hocphan, $id_khung) {
        
        $all_kct = DB::table('table_hocphan')
        ->Join('table_khungchuongtrinh_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', '=', 'table_hocphan.id')
        ->where('table_khungchuongtrinh_hocphan.id_hocphan', $id_hocphan)
        ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
        ->first();
        
        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $list_hptt = [];
        if(isset($all_kct->id_hocphan_thaythe) && $all_kct->id_hocphan_thaythe != null) {
            $id_hptt = explode("_", $all_kct->id_hocphan_thaythe);            
            foreach ($id_hptt as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hptt[] = $hp;
            }
        }

        $list_hptq = [];
        if(isset($all_kct->tienquyet) && $all_kct->tienquyet != null) {
            $id_hptq = explode("_", $all_kct->tienquyet);
            foreach ($id_hptq as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hptq[] = $hp;
            }
        }

        $list_hpht = [];
        if(isset($all_kct->hoctruoc) && $all_kct->hoctruoc != null) {
            $id_hpht = explode("_", $all_kct->hoctruoc);
            foreach ($id_hpht as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hpht[] = $hp;
            }
        }

        $list_hptd = [];
        if(isset($all_kct->tuongduong) && $all_kct->tuongduong != null) {
            $id_hptd = explode("_", $all_kct->tuongduong);
            foreach ($id_hptd as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hptd[] = $hp;
            }
        }

        $list_hpsh = [];
        if(isset($all_kct->songhanh) && $all_kct->songhanh != null) {
            $id_hpsh = explode("_", $all_kct->songhanh);
            foreach ($id_hpsh as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hpsh[] = $hp;
            }
        }

        $list_hphg = [];
        if(isset($all_kct->hocghep) && $all_kct->hocghep != null) {
            $id_hphg = explode("_", $all_kct->hocghep);
            foreach ($id_hphg as $value) {
                $hp = DB::table('table_hocphan')->where('id', $value)->first();
                $list_hphg[] = $hp;
            }
        }

        $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc_chitiet')
                                ->join('table_khungchuongtrinh_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc.id')
                                ->where('table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khung', $id_khung)
                                ->get();

        foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc) {
            if($value_all_khoiluongkienthuc->isKhoiluongkienthuc != 0) {
                $khkt_parent = DB::table('table_khungchuongtrinh_khoiluongkienthuc')
                        ->where('id', $value_all_khoiluongkienthuc->isKhoiluongkienthuc)
                        ->first();
                $check = true;
                foreach($all_khoiluongkienthuc as $value) {
                    if($value->id == $khkt_parent->id) {
                        $check = false;
                        break;
                    }
                }
                if($check == true) {
                    $all_khoiluongkienthuc[] = $khkt_parent;
                } 
            }
        }

        $all_khoiluongkienthuc = collect($all_khoiluongkienthuc);
        $all_khoiluongkienthuc = $all_khoiluongkienthuc->sortBy('id');
        $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

        return view('admin.decuong.quanlychuongtrinhdaotao.sua_hocphan_khungchuongtrinh')
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('all_khoiluongkienthuc', $all_khoiluongkienthuc)
                ->with('all_kct', $all_kct)
                ->with('list_hptt', $list_hptt)
                ->with('list_hptq', $list_hptq)
                ->with('list_hptd', $list_hptd)
                ->with('list_hpht', $list_hpht)
                ->with('list_hpsh', $list_hpsh)
                ->with('list_hphg', $list_hphg);

    }

    public function postSuaHocPhanKhungChuongTrinh(Request $request) {

        $data = $request->all();

        $hocky = $data['hocky'];
        $id_khung = $data['khungchuongtrinh'];
        $id_hocphan = $data['id_ten_hoc_phan'];

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

        $list_hptd = "";
        $rs_list_hptd = null;
        if(isset($request->list_id_hptd) && $request->list_id_hptd != null) {
            foreach ($request->list_id_hptd as $value_listhptd) {
                $list_hptd .= $value_listhptd."_";
            }
            $rs_list_hptd = rtrim($list_hptd, '_');
        }

        $list_hpsh = "";
        $rs_list_hpsh = null;
        if(isset($request->list_id_hpsh) && $request->list_id_hpsh != null) {
            foreach ($request->list_id_hpsh as $value_listhpsh) {
                $list_hpsh .= $value_listhpsh."_";
            }
            $rs_list_hpsh = rtrim($list_hpsh, '_');
        }

        $list_hphg = "";
        $rs_list_hphg = null;
        if(isset($request->list_id_hphg) && $request->list_id_hphg != null) {
            foreach ($request->list_id_hphg as $value_listhphg) {
                $list_hphg .= $value_listhphg."_";
            }
            $rs_list_hphg = rtrim($list_hphg, '_');
        }

        $khungchuongtrinh_hocphan = khungchuongtrinhhocphan::where('id_khung', $id_khung)->where('id_hocphan', $id_hocphan)->first();
        $khungchuongtrinh_hocphan->hocky = $hocky;
        $khungchuongtrinh_hocphan->id_khung = $id_khung;
        $khungchuongtrinh_hocphan->id_hocphan = $id_hocphan;
        $khungchuongtrinh_hocphan->id_hocphan_thaythe = $rs_list_hptt;
        $khungchuongtrinh_hocphan->tienquyet = $rs_list_hptq;
        $khungchuongtrinh_hocphan->hoctruoc = $rs_list_hpht;
        $khungchuongtrinh_hocphan->songhanh = $rs_list_hpsh;
        $khungchuongtrinh_hocphan->tuongduong = $rs_list_hptd;
        $khungchuongtrinh_hocphan->hocghep = $rs_list_hphg;
        $khungchuongtrinh_hocphan->tuchon = (int)$data['tuchon'];
        $khungchuongtrinh_hocphan->khoikienthuc = $data['khoiluongkienthuc'];

        $khungchuongtrinh_hocphan->save();

        return Redirect::to('/admin/decuong/quan-ly-chuong-trinh-dao-tao/'.$id_khung);

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

    public function getThemKhoiLuongKienThucKhungChuongTrinh($id_khung) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')
                            ->where('id', $id_khung)
                            ->first();

        // $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc_chitiet')
        // ->join('table_khungchuongtrinh_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc.id')
        // ->where('table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khung', 142)
        // //->orderBy('table_khungchuongtrinh_khoiluongkienthuc.id', "ASC")
        // ->get();

        // foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc) {
        //     if($value_all_khoiluongkienthuc->isKhoiluongkienthuc != 0) {
        //         $khkt_parent = DB::table('table_khungchuongtrinh_khoiluongkienthuc')
        //                 ->where('id', $value_all_khoiluongkienthuc->isKhoiluongkienthuc)
        //                 ->first();

        //         $check = true;

        //         foreach($all_khoiluongkienthuc as $value) {
        //             if($value->id == $khkt_parent->id) {
        //                 $check = false;
        //                 break;
        //             }
        //         }

        //         if($check == true) {
        //             $all_khoiluongkienthuc[] = $khkt_parent;
        //         }
                
        //     }
        // }

        // $all_khoiluongkienthuc = collect($all_khoiluongkienthuc);

        // $all_khoiluongkienthuc = $all_khoiluongkienthuc->sortBy('id');

        // echo "<pre>";
        // print_r($all_khoiluongkienthuc);
        // die();

        

        // $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

        

        return view('admin.decuong.quanlychuongtrinhdaotao.them_khoiluongkienthuc_khungchuongtrinh')
                ->with('khungchuongtrinh', $khungchuongtrinh);
    }

    public function QuanLyKhungChuongTrinh($id_khung) {

        $khungchuongtrinh = DB::table('table_khungchuongtrinh')
                            ->join('table_nganh', 'table_khungchuongtrinh.id_nganh', 'table_nganh.id')
                            ->where('table_khungchuongtrinh.id', $id_khung)
                            ->first(); 


        $all_khungchuongtrinh = DB::table('table_khungchuongtrinh')->get();
        $all_khungchuongtrinh = $this->data_khungchuongtrinh($all_khungchuongtrinh, 0);

        $all_kct_hocphan = DB::table('table_khungchuongtrinh_hocphan')
                            ->join('table_khungchuongtrinh', 'table_khungchuongtrinh_hocphan.id_khung', 'table_khungchuongtrinh.id')
                            ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                            ->join('table_khoahoc', 'table_khungchuongtrinh.id_khoahoc', 'table_khoahoc.id')
                            ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
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
                        $ds_hocphan_lienquan .= $hp->mahocphan.'<span style="color:#3e64ff;">(a)</span>, ';
                    }  
                }
            }

            if($value_all_kct_hocphan->hoctruoc != null) {
                $id_hpht = explode("_", $value_all_kct_hocphan->hoctruoc); 
                foreach ($id_hpht as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= $hp->mahocphan.'<span style="color:#ffc000;">(b)</span>, ';
                    }                    
                }
            }

            if($value_all_kct_hocphan->songhanh != null) {
                $id_hpsh = explode("_", $value_all_kct_hocphan->songhanh); 
                foreach ($id_hpsh as $value) {
                    $hp = DB::table('table_hocphan')->where('id', $value)->first();
                    if($hp->mahocphan != null) {
                        $ds_hocphan_lienquan .= $hp->mahocphan.'<span style="color:red;">(c)</span>, ';
                    }                 
                }
            }

            //$value_all_kct_hocphan->ds_hocphan_lienquan = $ds_hocphan_lienquan;
            $value_all_kct_hocphan->ds_hocphan_lienquan = rtrim($ds_hocphan_lienquan, ', ');
            

        }

        $all_hocphan_thaythe = DB::table('table_khungchuongtrinh_hocphan')
                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
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

        // echo "<pre>";
        // print_r($all_khungchuongtrinh);
        // die();

        return view('admin.decuong.khungchuongtrinh.quanlykhungchuongtrinh')
                ->with('khungchuongtrinh', $khungchuongtrinh)
                ->with('id_khung', $id_khung)
                ->with('all_khungchuongtrinh', $all_khungchuongtrinh)
                ->with('all_kct_hocphan', $all_kct_hocphan)
                ->with('all_hocphan_thaythe', $all_hocphan_thaythe);
    }

    public function getModalSuaDeCuong(Request $request) {
        if($request->ajax()) {

            $id_decuong = (String)$request->id_decuong;

            $all_decuong = DB::table('table_decuongchitiet')
                    ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                    ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                    ->where('id_decuong', $id_decuong)
                    ->first();

            $id_khungchuongtrinh = $all_decuong->khungchuongtrinh;

            $danhsach_danhgiahocphan = DB::table('table_danhgiahocphan')
                                        ->select('id_hocphan', 'khungchuongtrinh')
                                        ->where('khungchuongtrinh', $id_khungchuongtrinh)
                                        ->distinct()->get();

            $danhsach_kehoachgiangday = DB::table('table_kehoachgiangday')
                                        ->select('id_hocphan', 'khungchuongtrinh')
                                        ->where('khungchuongtrinh', $id_khungchuongtrinh)
                                        ->distinct()->get();

            $all_decuong->has_dghp = 0;
    
            foreach($danhsach_danhgiahocphan as $value_ds_dghp) {
                if ($value_ds_dghp->id_hocphan == $all_decuong->id_hocphan
                    && $value_ds_dghp->khungchuongtrinh == $id_khungchuongtrinh) {
                    $all_decuong->has_dghp = 1;
                    break;
                } else {
                    $all_decuong->has_dghp = 0;
                }
            }

            $all_decuong->has_khgd = 0;

            foreach($danhsach_kehoachgiangday as $value_ds_khgd) {
                if ($value_ds_khgd->id_hocphan == $all_decuong->id_hocphan
                    && $value_ds_dghp->khungchuongtrinh == $id_khungchuongtrinh) {
                    $all_decuong->has_khgd = 1;
                    break;
                } else {
                    $all_decuong->has_khgd = 0;
                }
            }

            $getnamhoc_hientai = DB::table('table_khungchuongtrinh')
                        ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                        ->where('table_khungchuongtrinh.id', $id_khungchuongtrinh)
                        ->first()->nambatdau;

            $output = "";

            $output .= '<table class="table table-bordered table-sua-de-cuong">';
            $output .= '<thead>';
            $output .= '<tr>';
            $output .= '<td>#</td>';
            $output .= '<td>Tên đề cương</td>';
            $output .= '<td>Giảng viên phụ trách</td>';
            $output .= '<td></td>';
            $output .= '<td></td>';
            $output .= '<td>Xem</td>';
            $output .= '<td>Sửa</td>';
            $output .= '<td>Xoá</td>';
            $output .= '</tr>';
            $output .= '</thead>';

            $output .= '<tbody >';
            $output .= '<tr>';
            $output .= '<td>1</td>';
            $output .= '<td>'.$all_decuong->tenhocphan.'</td>';
            $output .= '<td>'.$all_decuong->hodem.' '.$all_decuong->ten.'</td>';

            if($all_decuong->has_dghp == 0) {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/them-danh-gia-hoc-phan/{$all_decuong->id_decuong}") ."' class='add-dsdc' >";
            $output .= "Thêm đánh giá học phần";
            $output .= '</a>';
            $output .= '</td>';
            } else {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/sua-danh-gia-hoc-phan/{$all_decuong->id_decuong}") ."' class='edit-dsdc' >";
            $output .= "Sửa đánh giá học phần";
            $output .= '</a>';
            $output .= '</td>';
            }
            if($all_decuong->has_khgd == 0) {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/them-ke-hoach-giang-day/{$all_decuong->id_decuong}") ."' class='add-dsdc' >";
            $output .= "Thêm Kế hoạch giảng dạy và học";
            $output .= '</a>';
            $output .= '</td>'; 
            } else {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/sua-ke-hoach-giang-day/{$all_decuong->id_decuong}") ."' class='edit-dsdc' >";
            $output .= "Sửa Kế hoạch giảng dạy và học";
            $output .= '</a>';
            $output .= '</td>';
            }

            $output .= '<td class="list-icon l-icon-views">';

            if((int)$getnamhoc_hientai < 2020) {
                $output .=  "<a href='". url("admin/decuong/xem-de-cuong/{$all_decuong->id_decuong}") ."' target='_blank' >";
            } else {
                $output .=  "<a href='". url("admin/decuong/xem-de-cuong-moi/{$all_decuong->id_decuong}") ."' target='_blank' >";
            }

            $output .= "<img src='". url("./public/Images/icons/views.png") ."' >";
            $output .= '</a>';
            $output .= '</td>';

            $output .= '<td class="list-icon">';

            if((int)$getnamhoc_hientai < 2020) {
                $output .=  "<a href='". url("admin/decuong/sua-de-cuong/{$all_decuong->id_decuong}") ."'>";
            } else {
                $output .=  "<a href='". url("admin/decuong/sua-de-cuong-moi/{$all_decuong->id_decuong}") ."'>";
            }
                
            $output .= "<img src='". url("./public/Images/icons/edit.png") ."' >";
            $output .= '</a>';
            $output .= '</td>';

            $output .= '<td class="list-icon" id="xoa-de-cuong-chi-tiet" data-value="'. url('admin/decuong/xoa-de-cuong/'.$all_decuong->id_decuong) .'" >';
            $output .= "<img src='". url("./public/Images/icons/delete.png") ."' >";
            $output .= '</td>';

            $output .= '</tr>';
            $output .= '</tbody>';
            $output .= '</table>';

            echo $output;
        }
    }

    public function test() {

        $decuong = DB::table('table_decuongchitiet')
                        ->select('mahocphan', 'tenhocphan', 'hodem', 'ten', 'tenKhoa', 'tenkhungchuongtrinh', 'id_decuong', 'nambatdau')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
                        ->join('table_khungchuongtrinh', 'table_khungchuongtrinh.id', 'table_decuongchitiet.khungchuongtrinh')
                        ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                        ->where('table_decuongchitiet.id_hocphan', 7)
                        ->DISTINCT()
                        ->get();

        foreach($decuong as $value_decuong) {
            if($value_decuong->nambatdau < 2020) {
                $value_decuong->version = "cu";
            } else {
                $value_decuong->version = "moi"; 
            }
        }

        echo "<pre>";
        print_r($decuong);
    }

    public function getModalNhanBanDeCuong(Request $request) {
        if($request->ajax()) {
            
            $id_hocphan = (String)$request->id_hocphan;
            $id_khung = (String)$request->id_khung;

            $decuong = DB::table('table_decuongchitiet')
                        ->select('mahocphan', 'tenhocphan', 'hodem', 'ten', 'tenKhoa', 'tenkhungchuongtrinh', 'id_decuong', 'nambatdau')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
                        ->join('table_khungchuongtrinh', 'table_khungchuongtrinh.id', 'table_decuongchitiet.khungchuongtrinh')
                        ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                        ->where('table_decuongchitiet.id_hocphan', $id_hocphan)
                        ->DISTINCT()
                        ->get();

            $getnamhoc_hientai = DB::table('table_khungchuongtrinh')
                        ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                        ->where('table_khungchuongtrinh.id', $id_khung)
                        ->first()->nambatdau;

            if($getnamhoc_hientai < 2020) {
                $version_hientai = "cu";
            } else {
                $version_hientai = "moi";
            }

            $output = "";

            $output .= '<p style="text-align:center;">';

            if((int)$getnamhoc_hientai < 2020) {
                $output .= "<a href='". url("admin/decuong/them-moi-de-cuong/".$id_hocphan."/".$id_khung."") ."' style='color:#f64e60;' >";
            } else {
                $output .= "<a href='". url("admin/decuong/them-moi-de-cuong-moi/".$id_hocphan."/".$id_khung."") ."' style='color:#f64e60;' >";
            }

            $output .= "Thêm mới đề cương ";
            $output .= '</a>';
            $output .= 'hoặc chọn đề cương để nhân bản</p>';


            foreach($decuong as $value_version) {
                if($value_version->nambatdau < 2020) {
                    $value_version->version = "cu";
                } else {
                    $value_version->version = "moi"; 
                }
            }


            if($decuong->count()) {
                
                $output .= '<table class="table table-bordered">';
                $output .= '<thead>';
                $output .= '<tr>';
                $output .= '<td>#</td>';
                $output .= '<td>Mã học phần</td>';
                $output .= '<td>Tên học phần</td>';
                $output .= '<td>Giảng viên phụ trách</td>';
                $output .= '<td>Khoa</td>';
                $output .= '<td>Khung chương trình</td>';
                $output .= '<td></td>';
                $output .=  '</tr>';
                $output .= '</thead>;';
                $output .= '<tbody>';

                $stt_dsdc = 1;

                foreach($decuong as $value_decuong) {

                    if($value_decuong->version == $version_hientai) {
                        $output .= '<tr>';
                        $output .= '<td>'.$stt_dsdc++.'</td>';
                        $output .= '<td>'.$value_decuong->mahocphan.'</td>';
                        $output .= '<td>'.$value_decuong->tenhocphan.'</td>';
                        $output .= '<td>'.$value_decuong->hodem.' '.$value_decuong->ten.'</td>';
                        $output .= '<td>'.$value_decuong->tenKhoa.'</td>';
                        $output .= '<td>'.$value_decuong->tenkhungchuongtrinh.'</td>';
                        $output .= '<td>';

                        if((int)$getnamhoc_hientai < 2020) {
                            $output .=  "<a href='". url("admin/decuong/nhan-ban-de-cuong/{$value_decuong->id_decuong}/{$id_khung}") ."' style='color:#f64e60;' >";
                        } else {
                            $output .=  "<a href='". url("admin/decuong/nhan-ban-de-cuong-moi/{$value_decuong->id_decuong}/{$id_khung}") ."' style='color:#f64e60;' >";
                        }

                        $output .= "Chỉnh sửa và nhân bản";
                        $output .= '</a>';
                        $output .= '</td>';
                        $output .= '</tr>';
                    }
                    
                }

                $output .= '</tbody>';
                        
                $output .= '</table>';

            } 
            // else {
            //     $output .= "<p style='text-align:center;padding-top:15px' > Không có đề cương nào tồn tại </p>";
            //     $output .= "<p style='text-align:center;padding-top:5px'>";
            //     $output .= "<a href='". url("admin/decuong/them-moi-de-cuong") ."' style='color:#f64e60;' >";
            //     $output .= "Thêm mới đề cương";
            //     $output .= '</a>';
            //     $output .= "</p>";
            // }

            echo $output;
        }
    }


    public function getTiepTucSaoChepCacHangMucKhungChuongTrinh(Request $request) {

        if($request->ajax()) {

            $id_khung_hien_tai = (String)$request->id_khung_hien_tai; 

            $nambatdau = (String)$request->nambatdau; 

            $id_khung_sao_chep = (String)$request->id_khung_sao_chep; 

            $sao_chep_po = (String)$request->sao_chep_po;
            $sao_chep_plo = (String)$request->sao_chep_plo; 
            $sao_chep_hocphan = (String)$request->sao_chep_hocphan; 
            $sao_chep_decuong = (String)$request->sao_chep_decuong; 

            $output = "Hiện truy vấn có: ";

            if($sao_chep_po == 'true') {
                
                $count_po = DB::table('table_khungchuongtrinh_muctieu')
                            ->where('id_khung', $id_khung_sao_chep)
                            ->get();

                $output .= count($count_po)." PO, ";
                
            } else if($sao_chep_po == 'false') {
                $output .= "0 PO, ";
            }

            if($sao_chep_plo == 'true') {
                
                $count_plo = DB::table('table_chuandaura_chung')
                            ->where('id_khungchuongtrinh', $id_khung_sao_chep)
                            ->count();

                $output .= $count_plo." PLO, ";
            } else if($sao_chep_plo == 'false') {
                $output .= "0 PLO, ";
            }

            $hocphan_saochep = [];

            if($sao_chep_hocphan == 'true') {

                $all_hocphan_hientai = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_hien_tai)
                                        ->get();

                $all_hocphan_saochep = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_sao_chep)
                                        ->get();  

                foreach($all_hocphan_saochep as $value_all_hocphan_saochep) {

                    $check = FALSE;

                    foreach($all_hocphan_hientai as $value_all_hocphan_hientai) {
                        if($value_all_hocphan_saochep->id_hocphan == $value_all_hocphan_hientai->id_hocphan) {
                            $check = TRUE;
                            break;
                        }
                    }

                    if($check == FALSE) {
                        $hocphan_saochep[] = $value_all_hocphan_saochep;
                    }

                }

                $output .= count($hocphan_saochep)." học phần, ";

            } else if($sao_chep_hocphan == 'false') {
                $output .= "0 học phần, ";
            }

            if($sao_chep_decuong == 'true') {
                
                $khungdangchon = DB::table('table_khungchuongtrinh')
                                ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                                ->where('table_khungchuongtrinh.id', $id_khung_sao_chep)
                                ->first();

                if($nambatdau < 2020 && $khungdangchon->nambatdau < 2020 || $nambatdau >= 2020 && $khungdangchon->nambatdau >= 2020) {
                    
                    $all_hocphan_hientai = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_hien_tai)
                                        ->get();

                    if(count($hocphan_saochep) > 0) {
                        foreach($hocphan_saochep as $value_hocphan_saochep) {
                            $all_hocphan_hientai[] = $value_hocphan_saochep;
                        }
                    }
                    
                    $all_decuong_saochep = DB::table('table_decuongchitiet')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    $cac_decuong_saochep = [];

                    foreach($all_decuong_saochep as $value_all_decuong_saochep) {
                        
                        foreach($all_hocphan_hientai as $value_all_hocphan_hientai) {
                            if($value_all_hocphan_hientai->id_hocphan == $value_all_decuong_saochep->id_hocphan) {
                                $cac_decuong_saochep[] = $value_all_decuong_saochep;
                                break;
                            }
                        }
                    }

                    $all_decuong_hientai = DB::table('table_decuongchitiet')
                                        ->where('khungchuongtrinh', $id_khung_hien_tai)
                                        ->get();

                    $all_decuong_saochep = [];

                    foreach($cac_decuong_saochep as $value_cac_decuong_saochep) {

                        $check = FALSE;

                        foreach($all_decuong_hientai as $value_all_decuong_hientai) {
                            if($value_cac_decuong_saochep->id_hocphan == $value_all_decuong_hientai->id_hocphan) {
                                $check = TRUE;
                                break;
                            }
                        }

                        if($check == FALSE) {
                            $all_decuong_saochep[] = $value_cac_decuong_saochep;
                        }

                    }

                    $output .= count($all_decuong_saochep)." Đề cương.";

                } else {
                    $output .= "0 Đề cương.";
                }
                

            } else if($sao_chep_decuong == 'false') {
                $output .= "0 Đề cương.";
            }

            echo $output;

        }
    }


    public function getTienHanhSaoChepCacHangMucKhungChuongTrinh(Request $request) {

        if($request->ajax()) {

            $id_khung_hien_tai = (String)$request->id_khung_hien_tai; 

            $nambatdau = (String)$request->nambatdau; 

            $id_khung_sao_chep = (String)$request->id_khung_sao_chep; 

            $sao_chep_po = (String)$request->sao_chep_po;
            $sao_chep_plo = (String)$request->sao_chep_plo; 
            $sao_chep_hocphan = (String)$request->sao_chep_hocphan; 
            $sao_chep_decuong = (String)$request->sao_chep_decuong; 


            if($sao_chep_po == 'true') {
                
                $count_po = DB::table('table_khungchuongtrinh_muctieu')
                            ->where('id_khung', $id_khung_sao_chep)
                            ->get();

                foreach($count_po as $value_count_po) {

                    DB::table('table_khungchuongtrinh_muctieu')->insert([
                        "ten_po" => $value_count_po->ten_po,
                        "noidung_po" => $value_count_po->noidung_po,
                        "id_khung" => $id_khung_hien_tai
                    ]);

                }
                
            } 

            if($sao_chep_plo == 'true') {
                
                $count_plo = DB::table('table_chuandaura_chung')
                            ->where('id_khungchuongtrinh', $id_khung_sao_chep)
                            ->get();


                foreach($count_plo as $value_count_plo) {

                    DB::table('table_chuandaura_chung')->insert([
                        "ten_plo" => $value_count_plo->ten_plo,
                        "noidung_cdr_chung" => $value_count_plo->noidung_cdr_chung,
                        "id_khungchuongtrinh" => $id_khung_hien_tai
                    ]);

                }

            } 

            $hocphan_saochep = [];

            if($sao_chep_hocphan == 'true') {

                $all_hocphan_hientai = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_hien_tai)
                                        ->get();

                $all_hocphan_saochep = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_sao_chep)
                                        ->get();  

                foreach($all_hocphan_saochep as $value_all_hocphan_saochep) {

                    $check = FALSE;

                    foreach($all_hocphan_hientai as $value_all_hocphan_hientai) {
                        if($value_all_hocphan_saochep->id_hocphan == $value_all_hocphan_hientai->id_hocphan) {
                            $check = TRUE;
                            break;
                        }
                    }

                    if($check == FALSE) {
                        $hocphan_saochep[] = $value_all_hocphan_saochep;
                    }

                }

                foreach($hocphan_saochep as $value_hocphan_saochep) {

                    DB::table('table_khungchuongtrinh_hocphan')->insert([
                        "stt" => $value_hocphan_saochep->stt,
                        "hocky" => $value_hocphan_saochep->hocky,
                        "id_khung" => $id_khung_hien_tai,
                        "id_hocphan" => $value_hocphan_saochep->id_hocphan,
                        "id_hocphan_thaythe" => $value_hocphan_saochep->id_hocphan_thaythe,
                        "tienquyet" => $value_hocphan_saochep->tienquyet,
                        "hoctruoc" => $value_hocphan_saochep->hoctruoc,
                        "songhanh" => $value_hocphan_saochep->songhanh,
                        "tuongduong" => $value_hocphan_saochep->tuongduong,
                        "hocghep" => $value_hocphan_saochep->hocghep,
                        "tuchon" => $value_hocphan_saochep->tuchon,
                        "da_chuyennganh" => $value_hocphan_saochep->da_chuyennganh,
                        "da_totnghiep" => $value_hocphan_saochep->da_totnghiep,
                        "khoikienthuc" => $value_hocphan_saochep->khoikienthuc
                    ]);

                }

            } 

            if($sao_chep_decuong == 'true') {
                
                $khungdangchon = DB::table('table_khungchuongtrinh')
                                ->join('table_namhoc_hocky', 'table_khungchuongtrinh.id_namapdung', 'table_namhoc_hocky.id')
                                ->where('table_khungchuongtrinh.id', $id_khung_sao_chep)
                                ->first();

                if($nambatdau < 2020 && $khungdangchon->nambatdau < 2020 || $nambatdau >= 2020 && $khungdangchon->nambatdau >= 2020) {
                    
                    $all_hocphan_hientai = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung_hien_tai)
                                        ->get();

                    if(count($hocphan_saochep) > 0) {
                        foreach($hocphan_saochep as $value_hocphan_saochep) {
                            $all_hocphan_hientai[] = $value_hocphan_saochep;
                        }
                    }
                    
                    $all_decuong_saochep = DB::table('table_decuongchitiet')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    $cac_decuong_saochep = [];

                    foreach($all_decuong_saochep as $value_all_decuong_saochep) {
                        
                        foreach($all_hocphan_hientai as $value_all_hocphan_hientai) {
                            if($value_all_hocphan_hientai->id_hocphan == $value_all_decuong_saochep->id_hocphan) {
                                $cac_decuong_saochep[] = $value_all_decuong_saochep;
                                break;
                            }
                        }
                    }

                    $all_decuong_hientai = DB::table('table_decuongchitiet')
                                        ->where('khungchuongtrinh', $id_khung_hien_tai)
                                        ->get();

                    $all_decuong_saochep = [];

                    foreach($cac_decuong_saochep as $value_cac_decuong_saochep) {

                        $check = FALSE;

                        foreach($all_decuong_hientai as $value_all_decuong_hientai) {
                            if($value_cac_decuong_saochep->id_hocphan == $value_all_decuong_hientai->id_hocphan) {
                                $check = TRUE;
                                break;
                            }
                        }

                        if($check == FALSE) {
                            $all_decuong_saochep[] = $value_cac_decuong_saochep;
                        }

                    }


                    foreach($all_decuong_saochep as $value_all_decuong_saochep) {

                        DB::table('table_decuongchitiet')->insert([
                            "id_hocphan" => $value_all_decuong_saochep->id_hocphan,
                            "phanbo_lythuyet" => $value_all_decuong_saochep->phanbo_lythuyet,
                            "phanbo_baitap" => $value_all_decuong_saochep->phanbo_baitap,
                            "phanbo_thuchanh" => $value_all_decuong_saochep->phanbo_thuchanh,
                            "phanbo_tuhoc" => $value_all_decuong_saochep->phanbo_tuhoc,
                            "giangvienphutrach_id" => $value_all_decuong_saochep->giangvienphutrach_id,
                            "gv_daycung" => $value_all_decuong_saochep->gv_daycung,
                            "khoaphutrach" => $value_all_decuong_saochep->khoaphutrach,
                            "id_nganh" => $value_all_decuong_saochep->id_nganh,
                            "loaihocphan" => $value_all_decuong_saochep->loaihocphan,
                            "khoikienthuc" => $value_all_decuong_saochep->khoikienthuc,
                            "mota_tomtat" => $value_all_decuong_saochep->mota_tomtat,
                            "muctieu_kienthuc" => $value_all_decuong_saochep->muctieu_kienthuc,
                            "muctieu_kynang" => $value_all_decuong_saochep->muctieu_kynang,
                            "muctieu_thaido" => $value_all_decuong_saochep->muctieu_thaido,
                            "nhiemvu" => $value_all_decuong_saochep->nhiemvu,
                            "tailieuthamkhao_giaotrinh" => $value_all_decuong_saochep->tailieuthamkhao_giaotrinh,
                            "tailieuthamkhao_sach" => $value_all_decuong_saochep->tailieuthamkhao_sach,
                            "ngaypheduyet" => $value_all_decuong_saochep->ngaypheduyet,
                            "khungchuongtrinh" => $id_khung_hien_tai

                        ]);
                    }

                    $all_danhgiahocphan = DB::table('table_danhgiahocphan')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    foreach($all_danhgiahocphan as $value_all_danhgiahocphan) {

                        DB::table('table_danhgiahocphan')->insert([
                            "phuongphapdanhgia" => $value_all_danhgiahocphan->phuongphapdanhgia,
                            "trongsobaidanhgia" => $value_all_danhgiahocphan->trongsobaidanhgia,
                            "cdr_hocphan" => $value_all_danhgiahocphan->cdr_hocphan,
                            "id_baidanhgia" => $value_all_danhgiahocphan->id_baidanhgia,
                            "id_baidanhgia_parent" => $value_all_danhgiahocphan->id_baidanhgia_parent,
                            "id_hocphan" => $value_all_danhgiahocphan->id_hocphan,
                            "khungchuongtrinh" => $id_khung_hien_tai
                        ]);
                    }


                    $all_trongsohocphan = DB::table('table_trongso_hp')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    foreach($all_trongsohocphan as $value_all_trongsohocphan) {

                        DB::table('table_trongso_hp')->insert([
                            "id_hp" => $value_all_trongsohocphan->id_hp,
                            "id_trongso" => $value_all_trongsohocphan->id_trongso,
                            "trongso" => $value_all_trongsohocphan->trongso,
                            "trangthai" => $value_all_trongsohocphan->trangthai,
                            "khungchuongtrinh" => $id_khung_hien_tai
                        ]);
                    }


                    $all_kehoachgiangday = DB::table('table_kehoachgiangday')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    foreach($all_kehoachgiangday as $value_all_kehoachgiangday) {

                        DB::table('table_kehoachgiangday')->insert([
                            "buoi" => $value_all_kehoachgiangday->buoi,
                            "noidung" => $value_all_kehoachgiangday->noidung,
                            "hoatdongdayhoc" => $value_all_kehoachgiangday->hoatdongdayhoc,
                            "baidanhgia" => $value_all_kehoachgiangday->baidanhgia,
                            "cdrhocphan" => $value_all_kehoachgiangday->cdrhocphan,
                            "id_hocphan" => $value_all_kehoachgiangday->id_hocphan,
                            "thuochocphan" => $value_all_kehoachgiangday->thuochocphan,
                            "khungchuongtrinh" => $id_khung_hien_tai
                        ]);
                    }


                    $all_chuandauramonhoc = DB::table('table_chuandaura_monhoc')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    foreach($all_chuandauramonhoc as $value_all_chuandauramonhoc) {

                        DB::table('table_chuandaura_monhoc')->insert([
                            "stt" => $value_all_chuandauramonhoc->stt,
                            "noi_dung" => $value_all_chuandauramonhoc->noi_dung,
                            "id_hocphan" => $value_all_chuandauramonhoc->id_hocphan,
                            "khungchuongtrinh" => $id_khung_hien_tai
                        ]);
                    }


                    $all_tailieuthamkhao = DB::table('table_tailieuthamkhao')
                                        ->where('khungchuongtrinh', $id_khung_sao_chep)
                                        ->get();

                    foreach($all_tailieuthamkhao as $value_all_tailieuthamkhao) {

                        DB::table('table_tailieuthamkhao')->insert([
                            "tentacgia" => $value_all_tailieuthamkhao->tentacgia,
                            "namxuatban" => $value_all_tailieuthamkhao->namxuatban,
                            "tensach" => $value_all_tailieuthamkhao->tensach,
                            "noixuatban" => $value_all_tailieuthamkhao->noixuatban,
                            "nhaxuatban" => $value_all_tailieuthamkhao->nhaxuatban,
                            "url" => $value_all_tailieuthamkhao->url,
                            "loaitailieu" => $value_all_tailieuthamkhao->loaitailieu,
                            "id_hocphan" => $value_all_tailieuthamkhao->id_hocphan,
                            "khungchuongtrinh" => $id_khung_hien_tai
                        ]);
                    }

                } 
                
            }

            echo "Sao chép Thành Công";

        }

    }

    public function getXoaNoiDungCTDT(Request $request) {
        if($request->ajax()) {

            $id_khung_hien_tai = $request->id_khung_hien_tai;

            $all_plo = DB::table('table_chuandaura_chung')
                        ->where('id_khungchuongtrinh', $id_khung_hien_tai)
                        ->get();

            if(count($all_plo) > 0) {
                foreach($all_plo as $value_all_plo) {

                    $delete_pi = DB::table('table_chuandaura_chung_chitiet')
                                ->where('id_cdr_chung', $value_all_plo->id_cdr_chung)
                                ->first();

                    if (isset($delete_pi)) {
                        $delete_pi->delete();
                    }
     
                }
            }
            
            $delete_po = DB::table('table_khungchuongtrinh_muctieu')->where('id_khung', $id_khung_hien_tai)->delete();

            $delete_plo = DB::table('table_chuandaura_chung')->where('id_khungchuongtrinh', $id_khung_hien_tai)->delete();

            $delete_moilienhe_po_plo = DB::table('table_moilienhe_po_plo')->where('id_khung', $id_khung_hien_tai)->delete();


            $deletedghp = danhgiahocphan::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletedghp)) {
                $deletedghp->delete();
            }
            
            $deletetslhp = trongsohocphan::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletetslhp)) {
                $deletetslhp->delete();
            }

            $deletekhgd = kehoachgiangday::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletekhgd)) {
                $deletekhgd->delete();
            }

            $deletecdrmh = chuandauramonhoc::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletecdrmh)) {
                $deletecdrmh->delete();
            }

            $deletemlh = moilienhecloplo::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletemlh)) {
                $deletemlh->delete();
            }

            $deletemlhpi = moilienheclopi::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletemlhpi)) {
                $deletemlhpi->delete();
            }

            $deletetltk = tailieuthamkhao::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletetltk)) {
                $deletetltk->delete();
            }

            $delete_dc = modeldecuongchitiet::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($delete_dc)) {
                $delete_dc->delete();
            }

            $delete_khungchuongtrinh = DB::table('table_khungchuongtrinh_hocphan')->where('id_khung', $id_khung_hien_tai)->delete();

            echo 'Xóa Thành Công';
            
        }
    }

    public function getXoaCTDT(Request $request) {

        if($request->ajax()) {

            $id_khung_hien_tai = $request->id_khung_hien_tai;

            $all_plo = DB::table('table_chuandaura_chung')
                        ->where('id_khungchuongtrinh', $id_khung_hien_tai)
                        ->get();

            if(count($all_plo) > 0) {
                foreach($all_plo as $value_all_plo) {

                    $delete_pi = DB::table('table_chuandaura_chung_chitiet')
                                ->where('id_cdr_chung', $value_all_plo->id_cdr_chung)
                                ->first();

                    if (isset($delete_pi)) {
                        $delete_pi->delete();
                    }
     
                }
            }
            
            $delete_po = DB::table('table_khungchuongtrinh_muctieu')->where('id_khung', $id_khung_hien_tai)->delete();

            $delete_plo = DB::table('table_chuandaura_chung')->where('id_khungchuongtrinh', $id_khung_hien_tai)->delete();

            $delete_moilienhe_po_plo = DB::table('table_moilienhe_po_plo')->where('id_khung', $id_khung_hien_tai)->delete();


            $deletedghp = danhgiahocphan::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletedghp)) {
                $deletedghp->delete();
            }
            
            $deletetslhp = trongsohocphan::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletetslhp)) {
                $deletetslhp->delete();
            }

            $deletekhgd = kehoachgiangday::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletekhgd)) {
                $deletekhgd->delete();
            }

            $deletecdrmh = chuandauramonhoc::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletecdrmh)) {
                $deletecdrmh->delete();
            }

            $deletemlh = moilienhecloplo::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletemlh)) {
                $deletemlh->delete();
            }

            $deletemlhpi = moilienheclopi::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletemlhpi)) {
                $deletemlhpi->delete();
            }

            $deletetltk = tailieuthamkhao::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($deletetltk)) {
                $deletetltk->delete();
            }

            $delete_dc = modeldecuongchitiet::where('khungchuongtrinh', $id_khung_hien_tai);
            if (isset($delete_dc)) {
                $delete_dc->delete();
            }

            $delete_khungchuongtrinh = DB::table('table_khungchuongtrinh_hocphan')->where('id_khung', $id_khung_hien_tai)->delete();

            $delete_khungchuongtrinh = DB::table('table_khungchuongtrinh')->where('id', $id_khung_hien_tai)->delete();

            echo "Xóa Thành Công";

        }

    }

    


    public function test123() {

        
        

    }

    




}
