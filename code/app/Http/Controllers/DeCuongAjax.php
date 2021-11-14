<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\categoryModels;
use App\Models\chuandaurachung;
use App\Models\kehoachgiangday;
use App\Models\chuandauramonhoc;
use App\Models\moilienhecloplo;
use App\Models\khungchuongtrinh_khoiluongkienthuc_chitiet;
use Request;
use DB;
use \stdClass;

class DeCuongAjax extends Controller
{
   
    public function ajtenhocphan() {
        if (Request::ajax()) {

            $query = (String)Request::get('query');

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

    public function ajgiangvienphutrach() {
        if (Request::ajax()) {

            $query = (String)Request::get('query');

            $data = DB::table('table_giangvien')->where('hodem', 'LIKE', "%{$query}%")->orwhere('ten', 'LIKE', "%{$query}%")->limit(7)->get();

            $temp = 0;

            $output = '<ul>';
            foreach($data as $row) {   
                if ($temp == 0) {
                    $output .= '<li data-value="'.$row->id.'" class="active" >'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
                } else {
                    $output .= '<li data-value="'.$row->id.'">'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
                }
                $temp++;
            }
            $output .= '</ul>';
            echo $output;

        }
    }

    public function ajgiangviendaycung() {
        if (Request::ajax()) {

            $query = (String)Request::get('query');

            $id_gvptc = (String)Request::get('id_gvptc');

            $id_gvdc1 = (String)Request::get('id_gvdc1');

            $data = DB::table('table_giangvien')
                    ->where('hodem', 'LIKE', "%{$query}%")
                    ->orwhere('ten', 'LIKE', "%{$query}%")
                    ->limit(7)->get();     
                    
            $temp = 0;

            $output = '<ul>';
            foreach($data as $row)
            {
                if($row->id != $id_gvptc) {

                    if ($temp == 0) {
                        $output .= '<li data-value="'.$row->id.'" class="active" >'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
                    } else {
                        $output .= '<li data-value="'.$row->id.'">'.$row->chucdanh.". ".$row->hodem." ".$row->ten.'</li>';
                    }

                    $temp++;
                    
                }
            }
            $output .= '</ul>';
            echo $output;

        }
    }

	public function ajselectnganh() {

		if(Request::ajax()) {

			$id_nganh = (String)Request::get('id_nganh');
            $id_hocphan = (String)Request::get('id_hocphan');
            $khungchuongtrinh = (String)Request::get('khungchuongtrinh');

            $data = [];

            $all_chuandaura_chung = DB::table('table_nganh')->where('id', $id_nganh)->first();

            if ($all_chuandaura_chung->id_chuyennganh == 0) {
                $data = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id)->get();
            } else {
                $data_1 = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id_chuyennganh)->get();
                $data_2 = DB::table('table_chuandaura_chung')->where('id_nganh', $all_chuandaura_chung->id)->get();

                foreach($data_1 as $value_data_1) {
                    $data[] = $value_data_1;
                }

                foreach($data_2 as $value_data_2) {
                    $data[] = $value_data_2;
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

			$stt_cdr_chung = 1; 
			foreach($data as $value_cdr_chung) {

                $output .= '<tr>';

                $output .= '<td class="stt-cdr">'.$stt_cdr_chung++.'</td>';
                $output .= '<td class="noi-cdr-chung">'.$value_cdr_chung->noidung_cdr_chung.'</td>';
                $output .= '<td class="list-cdr-hoc-phan" id="ds-cdr" >';
                //$output .= '<p id="add-cdr" data-value="'.$value_cdr_chung->id_cdr_chung.'">Thêm</p>';
                $output .= '<div id="add-parent-cdr-'.$value_cdr_chung->id_cdr_chung.'">';   

                foreach($all_moilienhe as $value_all_moilienhe) {
                    if($value_all_moilienhe->id_chuandaura_chung == $value_cdr_chung->id_cdr_chung) {
                        $output .= '<div class="line-add-cdr">';
                        $output .= '<input type="hidden" name="list_cdr[]" value="'.$value_cdr_chung->id_cdr_chung.'">';
                        $output .= '<select name="list_cdr[]" multiple="multiple" required size="4" id="select_chuandaura">';
                            foreach($all_chuandaura as $value_all_chuandaura) {
                                $output .= '<option value="'.$value_all_chuandaura->stt.'" ';
                                if ($value_all_chuandaura->stt == $value_all_moilienhe->id_chuandaura_monhoc) {
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
                        //$output .= '<h5 id="edit-moilienhe" data-value="'.$value_all_moilienhe->id.'" >Sửa</h5>';
                        $output .= '<span id="delete-moilienhe" data-value="'.$value_all_moilienhe->id.'" >Xóa</span>';
                        $output .= '</div>';
                    }
                }

                $output .= '<div class="line-add-cdr">';
                $output .= '<input type="hidden" name="list_cdr[]" value="'.$value_cdr_chung->id_cdr_chung.'">';
                $output .= '<select name="list_cdr[]" multiple="multiple" size="4" id="select_chuandaura">';

                foreach($all_chuandaura as $value_all_chuandaura) {
                    $output .= '<option value="'.$value_all_chuandaura->stt.'" >'.$value_all_chuandaura->noi_dung.'</option>';
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

	// public function data_chuyen_nganh($data, $parent_id = 0) {
    //     $result = [];
    //     $result_parent = [];
    //     $result_child = [];
    //     $id_chuyennganh = 0;
    //     foreach ($data as $value_child) {

    //         if ($value_child->id == $parent_id) {
    //             $result_child[] = $value_child;
    //             $id_chuyennganh = $value_child->id_chuyennganh;
    //         }    
    //     }

    //     foreach ($data as $value_parent) {

    //         if ($value_parent->id == $id_chuyennganh) {
    //             $result_parent[] = $value_parent;
    //         }    
    //     }

    //     $result = array_merge($result_parent, $result_child);
    //     return $result;
    // }

    public function timkiemdecuong() {
        if (Request::ajax()) {
            
            $query = (String)Request::get('query');
            $id_khoa = (String)Request::get('id_khoa');
            $namhoc = (String)Request::get('namhoc');


            $all_decuong = DB::table('table_decuongchitiet')
            ->select('id_decuong', 'namhoc')
            ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
            ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
            ->where('tenhocphan', 'LIKE', "%{$query}%")
            ->orwhere('hodem', 'LIKE', "%{$query}%")
            ->orwhere('ten', 'LIKE', "%{$query}%")
            ->get();

            if ($id_khoa == 0) {

                if ($query != '') {

                    $all_decuong1 = DB::table('table_decuongchitiet')
                    ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                    ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                    ->where('tenhocphan', 'LIKE', "%{$query}%")
                    ->orwhere('hodem', 'LIKE', "%{$query}%")
                    ->orwhere('ten', 'LIKE', "%{$query}%")
                    ->get();
                    $ten_khoa = '';

                    $all_decuong = [];

                    foreach($all_decuong1 as $value_all_decuong) {
                        if ($value_all_decuong->namhoc == $namhoc) {
                            $all_decuong[] = $value_all_decuong;
                        }
                    }


                } else {

                    $all_decuong1 = DB::table('table_decuongchitiet')
                    ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                    ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                    ->where('table_decuongchitiet.namhoc', $namhoc)
                    ->get();
                    $ten_khoa = '';

                    $all_decuong = [];

                    foreach($all_decuong1 as $value_all_decuong) {
                        if ($value_all_decuong->namhoc == $namhoc) {
                            $all_decuong[] = $value_all_decuong;
                        }
                    }

                }

                
            } else {

                if ($query != '') {
                    $all_decuong1 = DB::table('table_decuongchitiet')
                    ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                    ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                    ->where('tenhocphan', 'LIKE', "%{$query}%")
                    ->orwhere('hodem', 'LIKE', "%{$query}%")
                    ->orwhere('ten', 'LIKE', "%{$query}%")
                    ->get();

                    $list_ds_khoa = DB::table('table_khoa')->where('id', $id_khoa)->first();
                    $ten_khoa = $list_ds_khoa->tenKhoa;

                    $all_decuong = [];

                    foreach($all_decuong1 as $value_all_decuong) {
                        if ($value_all_decuong->namhoc == $namhoc) {
                            $all_decuong[] = $value_all_decuong;
                        }
                    }


                } else {
                    $all_decuong1 = DB::table('table_decuongchitiet')
                    ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                    ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                    ->where('khoaphutrach', $id_khoa)
                    ->get();
                    $list_ds_khoa = DB::table('table_khoa')->where('id', $id_khoa)->first();
                    $ten_khoa = $list_ds_khoa->tenKhoa;

                    $all_decuong = [];

                    foreach($all_decuong1 as $value_all_decuong) {
                        if ($value_all_decuong->namhoc == $namhoc) {
                            $all_decuong[] = $value_all_decuong;
                        }
                    }

                }

            }
    
            $danhsach_danhgiahocphan = DB::table('table_danhgiahocphan')->select('id_hocphan')->where('namhoc', $namhoc)->distinct()->get();
            $danhsach_kehoachgiangday = DB::table('table_kehoachgiangday')->select('id_hocphan')->where('namhoc', $namhoc)->distinct()->get();
    
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

            $output = "";
            $stt = 1;

            foreach($all_decuong as $value_decuong) {

                if ($id_khoa == 0) {
                    $output .= '<tr>';
                        $output .= '<td>'.$stt++.'</td>';
                        $output .= '<td>'.$value_decuong->tenhocphan.'</td>';
                        $output .= '<td>'.$value_decuong->hodem ;
                        $output .= $value_decuong->ten.'</td>';
                        
                        if($value_decuong->has_dghp == 0) {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/danh-gia-hoc-phan/{$value_decuong->id_decuong}") ."' class='add-dsdc'>Thêm đánh giá học phần</a>";
                            $output .= '</td>';
                        }
                        else {

                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/edit-danh-gia-hoc-phan/{$value_decuong->id_decuong}") ."' class='edit-dsdc'>Sửa đánh giá học phần</a>";
                            $output .= '</td>';

                        }

                        if($value_decuong->has_khgd == 0) {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/ke-hoach-giang-day/{$value_decuong->id_decuong}") ."' class='add-dsdc'>Thêm Kế hoạch giảng dạy và học</a>";
                            $output .= '</td>';
                        }
                        else {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/ke-hoach-giang-day/{$value_decuong->id_decuong}") ."' class='edit-dsdc'>Sửa Kế hoạch giảng dạy và học</a>";
                            $output .= '</td>';
                        }

                        $output .= '<td class="list-icon l-icon-views">';
                        $output .= "<a href='". url("admin/decuong/xem-de-cuong/{$value_decuong->id_decuong}") ."' >";
                        $output .= "<img src='". url("./public/Images/icons/views.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '<td class="list-icon">';
                        $output .=  "<a href='". url("admin/decuong/edit-de-cuong/{$value_decuong->id_decuong}") ."'>";
                        $output .= "<img src='". url("./public/Images/icons/edit.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '<td class="list-icon">';
                        $output .=  "<a href='". url("admin/decuong/delete-de-cuong/{$value_decuong->id_decuong}") ."'>";
                        $output .= "<img src='". url("./public/Images/icons/delete.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '</tr>';
                        
                } else {
                    if ($value_decuong->khoaphutrach == $id_khoa) {
                        $output .= '<tr>';
                        $output .= '<td>'.$stt++.'</td>';
                        $output .= '<td>'.$value_decuong->tenhocphan.'</td>';
                        $output .= '<td>'.$value_decuong->hodem ;
                        $output .= $value_decuong->ten.'</td>';
                        
                        if($value_decuong->has_dghp == 0) {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/danh-gia-hoc-phan/{$value_decuong->id_decuong}") ."' class='add-dsdc'>Thêm đánh giá học phần</a>";
                            $output .= '</td>';
                        }
                        else {

                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/edit-danh-gia-hoc-phan/{$value_decuong->id_decuong}") ."' class='edit-dsdc'>Sửa đánh giá học phần</a>";
                            $output .= '</td>';

                        }

                        if($value_decuong->has_khgd == 0) {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/ke-hoach-giang-day/{$value_decuong->id_decuong}") ."' class='add-dsdc'>Thêm Kế hoạch giảng dạy và học</a>";
                            $output .= '</td>';
                        }
                        else {
                            $output .= '<td>';
                            $output .= "<a href='". url("admin/decuong/ke-hoach-giang-day/{$value_decuong->id_decuong}") ."' class='edit-dsdc'>Sửa Kế hoạch giảng dạy và học</a>";
                            $output .= '</td>';
                        }

                        $output .= '<td class="list-icon l-icon-views">';
                        $output .= "<a href='". url("admin/decuong/xem-de-cuong/{$value_decuong->id_decuong}") ."' >";
                        $output .= "<img src='". url("./public/Images/icons/views.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '<td class="list-icon">';
                        $output .=  "<a href='". url("admin/decuong/edit-de-cuong/{$value_decuong->id_decuong}") ."'>";
                        $output .= "<img src='". url("./public/Images/icons/edit.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '<td class="list-icon">';
                        $output .=  "<a href='". url("admin/decuong/delete-de-cuong/{$value_decuong->id_decuong}") ."'>";
                        $output .= "<img src='". url("./public/Images/icons/delete.png") ."' >";	
                        $output .= '</a>';
                        $output .= '</td>';

                        $output .= '</tr>';
                    }
                }

            }

            echo $output;

        }
    }

    public function timkiemdecuongthemmoi() {

        if (Request::ajax()) {
            
            $query = (String)Request::get('query');
            $namhoc = (String)Request::get('namhoc');

            if ($query != '') {
                $all_decuong1 = DB::table('table_decuongchitiet')
                ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
                ->where('tenhocphan', 'LIKE', "%{$query}%")
                ->orwhere('hodem', 'LIKE', "%{$query}%")
                ->orwhere('ten', 'LIKE', "%{$query}%")
                ->get();

                $current_namhoc = DB::table('table_namhoc')->where('id', $namhoc)->first();
    
                $all_decuong = [];
    
                foreach($all_decuong1 as $value_all_decuong) {
                    if ($value_all_decuong->namhoc == $namhoc) {
                        $value_all_decuong->tennamhoc = $current_namhoc->namhoc;
                        $all_decuong[] = $value_all_decuong;
                    }
                }
    
    
            } else {
                $all_decuong1 = DB::table('table_decuongchitiet')
                ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
                ->get();

                $current_namhoc = DB::table('table_namhoc')->where('id', $namhoc)->first();
    
                $all_decuong = [];
    
                foreach($all_decuong1 as $value_all_decuong) {
                    if ($value_all_decuong->namhoc == $namhoc) {
                        $value_all_decuong->tennamhoc = $current_namhoc->namhoc;
                        $all_decuong[] = $value_all_decuong;
                    }
                }
    
            }

            $output = "";
            $stt = 1;

            foreach($all_decuong as $value_decuong) {

                $output .= '<tr>';
                $output .= '<td>'.$stt++.'</td>';
                $output .= '<td>'.$value_decuong->tenhocphan.'</td>';
                $output .= '<td>'.$value_decuong->hodem ;
                $output .= ' '.$value_decuong->ten.'</td>';
                $output .= '<td>'.$value_decuong->tenKhoa.'</td>';
                $output .= '<td>'.$value_decuong->tennamhoc.'</td>';

                $output .= '<td>';
                $output .=  "<a href='". url("admin/decuong/chinh-sua-them-moi-de-cuong/{$value_decuong->id_decuong}."/".{$value_decuong->id_decuong}") ."' style='color:#f64e60;' >";
                $output .= "Chỉnh sửa và nhân bản";
                $output .= '</a>';
                $output .= '</td>';

                $output .= '</tr>';

            }

            echo $output;

        } 
    }

    public function sua_chuan_dau_ra_chung() {
        if (Request::ajax()) {
            
            $id_cdr_chung = (String)Request::get('id_cdr_chung');
            $noidung = (String)Request::get('noidung');

            $chuandaurachung = chuandaurachung::find($id_cdr_chung);
            $chuandaurachung->noidung_cdr_chung = $noidung;
            $chuandaurachung->save();

            echo "Successfull";

        }
    }

    public function xoa_chuan_dau_ra_chung() {
        if (Request::ajax()) {
            
            $id_cdr_chung = (String)Request::get('id_cdr_chung');
            $noidung = (String)Request::get('noidung');

            $chuandaurachung = chuandaurachung::find($id_cdr_chung);
            $chuandaurachung->delete();

            echo "Successfull";

        }
    }

    public function them_chuan_dau_ra_chung() {
        if (Request::ajax()) {
            
            $id_nganh = (String)Request::get('id_nganh');
            $noidung = (String)Request::get('noidung');

            $chuandaurachung = new chuandaurachung;
            $chuandaurachung->noidung_cdr_chung = $noidung;
            $chuandaurachung->id_nganh = $id_nganh;
            $chuandaurachung->save();

            echo "Successfull";

        }
    }

    public function up_khgd() {
        if (Request::ajax()) {
            
            $id_khgd = (String)Request::get('id_khgd');
            $id_hocphan_khgd = (String)Request::get('id_hocphan_khgd');
            $thuochocphan_khgd = (String)Request::get('thuochocphan_khgd');
            $khungchuongtrinh_khgd = (String)Request::get('khungchuongtrinh_khgd');

            $allkhgd = DB::table('table_kehoachgiangday')->where('id', $id_khgd)->first();

            $buoi_ht = $allkhgd->buoi;

            $allkhgd_sua = DB::table('table_kehoachgiangday')
                            ->where('buoi', $buoi_ht-1)
                            ->where('id_hocphan', $id_hocphan_khgd)
                            ->where('thuochocphan', $thuochocphan_khgd)
                            ->where('khungchuongtrinh', $khungchuongtrinh_khgd)
                            ->first();

            $buoi_1 = $allkhgd->buoi-1;
            $buoi_2 = $allkhgd_sua->buoi+1;

            $cr_khgd = DB::table('table_kehoachgiangday')->where('id', $allkhgd->id)->update(['buoi' => $buoi_1]);
            $ed_khgd = DB::table('table_kehoachgiangday')->where('id', $allkhgd_sua->id)->update(['buoi' => $buoi_2]);

            echo "Successfull";

        }
    }

    public function down_khgd() {
        if (Request::ajax()) {
            
            $id_khgd = (String)Request::get('id_khgd');
            $id_hocphan_khgd = (String)Request::get('id_hocphan_khgd');
            $thuochocphan_khgd = (String)Request::get('thuochocphan_khgd');
            $khungchuongtrinh_khgd = (String)Request::get('khungchuongtrinh_khgd');

            $allkhgd = DB::table('table_kehoachgiangday')->where('id', $id_khgd)->first();

            $buoi_ht = $allkhgd->buoi;

            $allkhgd_sua = DB::table('table_kehoachgiangday')
                            ->where('buoi', $buoi_ht+1)
                            ->where('id_hocphan', $id_hocphan_khgd)
                            ->where('thuochocphan', $thuochocphan_khgd)
                            ->where('khungchuongtrinh', $khungchuongtrinh_khgd)
                            ->first();

            $buoi_1 = $allkhgd->buoi+1;
            $buoi_2 = $allkhgd_sua->buoi-1;

            $cr_khgd = DB::table('table_kehoachgiangday')->where('id', $allkhgd->id)->update(['buoi' => $buoi_1]);
            $ed_khgd = DB::table('table_kehoachgiangday')->where('id', $allkhgd_sua->id)->update(['buoi' => $buoi_2]);

            echo "Successfull";

        }
    }

    public function decuong_khungchuongtrinh() {
        if (Request::ajax()) {
            
            $id_decuong = (String)Request::get('id_decuong');

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

            $output = "";

            $output .= '<table class="table-danh-sach">';
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
            $output .=  "<a href='". url("admin/decuong/danh-gia-hoc-phan/{$all_decuong->id_decuong}") ."' class='add-dsdc' >";
            $output .= "Thêm đánh giá học phần";
            $output .= '</a>';
            $output .= '</td>';
            } else {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/edit-danh-gia-hoc-phan/{$all_decuong->id_decuong}") ."' class='edit-dsdc' >";
            $output .= "Sửa đánh giá học phần";
            $output .= '</a>';
            $output .= '</td>';
            }
            if($all_decuong->has_khgd == 0) {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/ke-hoach-giang-day/{$all_decuong->id_decuong}") ."' class='add-dsdc' >";
            $output .= "Thêm Kế hoạch giảng dạy và học";
            $output .= '</a>';
            $output .= '</td>'; 
            } else {
            $output .= '<td>';
            $output .=  "<a href='". url("admin/decuong/edit-ke-hoach-giang-day/{$all_decuong->id_decuong}") ."' class='edit-dsdc' >";
            $output .= "Sửa Kế hoạch giảng dạy và học";
            $output .= '</a>';
            $output .= '</td>';
            }

            $output .= '<td class="list-icon l-icon-views">';
            $output .=  "<a href='". url("admin/decuong/xem-de-cuong/{$all_decuong->id_decuong}") ."' target='_blank' >";       
            $output .= "<img src='". url("./public/Images/icons/views.png") ."' >";
            $output .= '</a>';
            $output .= '</td>';

            $output .= '<td class="list-icon">';
            $output .=  "<a href='". url("admin/decuong/edit-de-cuong/{$all_decuong->id_decuong}") ."'>";       
            $output .= "<img src='". url("./public/Images/icons/edit.png") ."' >";
            $output .= '</a>';
            $output .= '</td>';

            $output .= '<td class="list-icon">';
            $output .=  "<a href='". url("admin/decuong/delete-de-cuong/{$all_decuong->id_decuong}") ."'>";       
            $output .= "<img src='". url("./public/Images/icons/delete.png") ."' >";
            $output .= '</a>';
            $output .= '</td>';

            $output .= '</tr>';
            $output .= '</tbody>';
            $output .= '</table>';

            echo $output;

        }
    }

    public function nhanban_decuong_khungchuongtrinh() {

        if (Request::ajax()) {
            
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');

            $decuong = DB::table('table_decuongchitiet')
                        ->join('table_hocphan', 'table_hocphan.id', 'table_decuongchitiet.id_hocphan')
                        ->join('table_giangvien', 'table_giangvien.id', 'table_decuongchitiet.giangvienphutrach_id')
                        ->join('table_khoa', 'table_khoa.id', 'table_decuongchitiet.khoaphutrach')
                        ->join('table_khungchuongtrinh', 'table_khungchuongtrinh.id', 'table_decuongchitiet.khungchuongtrinh')
                        ->where('table_decuongchitiet.id_hocphan', $id_hocphan)
                        ->get();

            $output = "";

            $output .= '<p style="text-align:center;">';
            $output .= "<a href='". url("admin/decuong/them-moi-de-cuong/{$id_hocphan}/{$id_khung}") ."' style='color:#f64e60;' >";
            $output .= "Thêm mới đề cương ";
            $output .= '</a>';
            $output .= 'hoặc chọn đề cương để nhân bản</p>';

            if($decuong->count()) {
                
                $output .= '<table class="table-danh-sach dsdc-them">';
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
                    $output .= '<tr>';
                    $output .= '<td>'.$stt_dsdc++.'</td>';
                    $output .= '<td>'.$value_decuong->mahocphan.'</td>';
                    $output .= '<td>'.$value_decuong->tenhocphan.'</td>';
                    $output .= '<td>'.$value_decuong->hodem.' '.$value_decuong->ten.'</td>';
                    $output .= '<td>'.$value_decuong->tenKhoa.'</td>';
                    $output .= '<td>'.$value_decuong->tenkhungchuongtrinh.'</td>';
                    $output .= '<td>';
                    $output .=  "<a href='". url("admin/decuong/chinh-sua-them-moi-de-cuong/{$value_decuong->id_decuong}/{$id_khung}") ."' style='color:#f64e60;' >";
                    $output .= "Chỉnh sửa và nhân bản";
                    $output .= '</a>';
                    $output .= '</td>';
                    $output .= '</tr>';
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

    public function get_hocphan_kcthp() {
        if (Request::ajax()) {

            $query = (String)Request::get('query');

            $data = DB::table('table_hocphan')->where('tenhocphan', 'LIKE', "%{$query}%")->limit(7)->get();

            $output = '<ul>';
            foreach($data as $row)
            {
               $output .= '<li data-value="'.$row->id.'">'.$row->tenhocphan.'</li>';
            }
            $output .= '</ul>';
            
            echo $output;

        }
    }

    public function up_kct_hp() {
        if (Request::ajax()) {

            $id_kct_hp = (String)Request::get('id_kct_hp');
            $id_khung = (String)Request::get('id_khung');

            $allkct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $id_kct_hp)->first();

            $stt_ht = $allkct->stt;
            $hocky_ht = $allkct->hocky;

            $allkct_sua = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('hocky', $hocky_ht)
                            ->where('id_khung', $id_khung)
                            ->where('stt', $stt_ht-1)
                            ->first();

            $stt_1 = $allkct->stt-1;
            $stt_2 = $allkct_sua->stt+1;

            $cr_kct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $allkct->id)->update(['stt' => $stt_1]);
            $ed_kct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $allkct_sua->id)->update(['stt' => $stt_2]);

            echo "Successfull";
        }
    }

    public function down_kct_hp() {
        if (Request::ajax()) {

            $id_kct_hp = (String)Request::get('id_kct_hp');
            $id_khung = (String)Request::get('id_khung');

            $allkct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $id_kct_hp)->first();

            $stt_ht = $allkct->stt;
            $hocky_ht = $allkct->hocky;

            $allkct_sua = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('hocky', $hocky_ht)
                            ->where('id_khung', $id_khung)
                            ->where('stt', $stt_ht+1)
                            ->first();

            $stt_1 = $allkct->stt+1;
            $stt_2 = $allkct_sua->stt-1;

            $cr_kct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $allkct->id)->update(['stt' => $stt_1]);
            $ed_kct = DB::table('table_khungchuongtrinh_hocphan')->where('id', $allkct_sua->id)->update(['stt' => $stt_2]);

            echo "Successfull";
        }
    }

    public function addclo() {
        
        if (Request::ajax()) {

            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $noidung_clo = (String)Request::get('noidung_clo');

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

    public function loadclo() {
        if (Request::ajax()) {

            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');

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

    public function editclo() {
        if (Request::ajax()) {

            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $noidung_clo = (String)Request::get('noidung_clo');
            $id_clo = (String)Request::get('id_clo');

            $all_clo = DB::table('table_chuandaura_monhoc')
                        ->where('id_hocphan', $id_hocphan)
                        ->where('khungchuongtrinh', $id_khung)
                        ->where('id', $id_clo)
                        ->update(['noi_dung' => $noidung_clo]);

            echo "Sucessfully";

        }
    }

    public function deleteclo() {
        if (Request::ajax()) {

            $id_clo = (String)Request::get('id_clo');

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

    public function add_moilienhecloplo() {
        if (Request::ajax()) {

            $id_chuandaura_chung = (String)Request::get('id_chuandaura_chung');
            $id_chuandaura = (String)Request::get('id_chuandaura');
            $mucdo = (String)Request::get('mucdo');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_nganh = (String)Request::get('id_nganh');

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

    public function edit_moilienhecloplo_cdr() {
        if (Request::ajax()) {

            $id_moilienhe = (String)Request::get('id_moilienhe');
            $id_chuandaura = (String)Request::get('id_chuandaura');
            //$mucdo = (String)Request::get('mucdo');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_nganh = (String)Request::get('id_nganh');

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe)
                        ->update(['id_chuandaura_monhoc' => $id_chuandaura]);

            echo "Successfull";

        }
    }

    public function edit_moilienhecloplo_mucdo() {
        if (Request::ajax()) {

            $id_moilienhe = (String)Request::get('id_moilienhe');
            $mucdo = (String)Request::get('mucdo');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_nganh = (String)Request::get('id_nganh');

            $edit_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe)
                        ->update(['mucdo' => $mucdo]);

            echo "Successfull";

        }
    }

    public function delete_moilienhecloplo() {
        if (Request::ajax()) {

            $id_moilienhe = (String)Request::get('id_moilienhe');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_nganh = (String)Request::get('id_nganh');

            $delete_moilienhe = DB::table('table_decuongchitiet_moilienhe_clo_plo')
                        ->where('id', $id_moilienhe);

            if (isset($delete_moilienhe)) {
                $delete_moilienhe->delete();
            }

            echo "Successfull";

        }
    }

    public function add_moiquanhe_hocphan() {
        if (Request::ajax()) {
            
            $tenmoiquanhe = (String)Request::get('tenmoiquanhe');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_hocphan_add = (String)Request::get('id_hocphan_add');

           
            if($tenmoiquanhe == "tienquyet") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->tienquyet;

                $check_tienquyet = explode("_", $currenthp);

                foreach($check_tienquyet as $value_check_tienquyet) {
                    if($value_check_tienquyet == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $tienquyet = "";

                if ($currenthp == null) {
                    $tienquyet = $id_hocphan_add;
                } else {
                    $tienquyet = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['tienquyet' => $tienquyet]);
            }

            if($tenmoiquanhe == "hoctruoc") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->hoctruoc;

                $check_hoctruoc = explode("_", $currenthp);

                foreach($check_hoctruoc as $value_check_hoctruoc) {
                    if($value_check_hoctruoc == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $hoctruoc = "";

                if ($currenthp == null) {
                    $hoctruoc = $id_hocphan_add;
                } else {
                    $hoctruoc = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['hoctruoc' => $hoctruoc]);
            }

            if($tenmoiquanhe == "tuongduong") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->tuongduong;

                $check_tuongduong = explode("_", $currenthp);

                foreach($check_tuongduong as $value_check_tuongduong) {
                    if($value_check_tuongduong == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $tuongduong = "";

                if ($currenthp == null) {
                    $tuongduong = $id_hocphan_add;
                } else {
                    $tuongduong = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['tuongduong' => $tuongduong]);
            }

            if($tenmoiquanhe == "songhanh") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->songhanh;

                $check_songhanh = explode("_", $currenthp);

                foreach($check_songhanh as $value_check_songhanh) {
                    if($value_check_songhanh == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $songhanh = "";

                if ($currenthp == null) {
                    $songhanh = $id_hocphan_add;
                } else {
                    $songhanh = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['songhanh' => $songhanh]);
            }

            if($tenmoiquanhe == "thaythe") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->id_hocphan_thaythe;

                $check_thaythe = explode("_", $currenthp);

                foreach($check_thaythe as $value_check_thaythe) {
                    if($value_check_thaythe == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $thaythe = "";

                if ($currenthp == null) {
                    $thaythe = $id_hocphan_add;
                } else {
                    $thaythe = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['id_hocphan_thaythe' => $thaythe]);
            }

            if($tenmoiquanhe == "hocghep") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->hocghep;

                $check_hocghep = explode("_", $currenthp);

                foreach($check_hocghep as $value_check_hocghep) {
                    if($value_check_hocghep == $id_hocphan_add) {
                        echo "Thêm mối quan hệ thất bại!!! Mối quan hệ với học phần này đã tồn tại";
                        die();
                    }
                }

                $hocghep = "";

                if ($currenthp == null) {
                    $hocghep = $id_hocphan_add;
                } else {
                    $hocghep = $currenthp."_".$id_hocphan_add;
                }
                
                $add_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['hocghep' => $hocghep]);
            }

            

            echo "Thêm mối quan hệ thành công !!!";

        }
    }

    public function load_moiquanhe_hocphan() {
        if (Request::ajax()) {
            
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');

            $listquanhe =  DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first();

            $output = '';

            if(!empty($listquanhe->tienquyet)) {

                $moiquanhe_tienquyet = explode("_", $listquanhe->tienquyet);
                $listquanhe_tienquyet = [];

                foreach($moiquanhe_tienquyet as $value_moiquanhe_tienquyet) {
                    $hp_tq = DB::table('table_hocphan')->where('id', $value_moiquanhe_tienquyet)->first();
                    $listquanhe_tienquyet[] = $hp_tq;
                }

                foreach($listquanhe_tienquyet as $value_listquanhe_tienquyet) {
                    $output .= '<tr class="clicked-remove" data-value="tienquyet_'.$value_listquanhe_tienquyet->id.'" >';

                    $output .= "<td>".$value_listquanhe_tienquyet->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_tienquyet->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_tienquyet->soTC."</td>";
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';

                    $output .= "</tr>";
                }
            }

            if(!empty($listquanhe->hoctruoc)) {

                $moiquanhe_hoctruoc = explode("_", $listquanhe->hoctruoc);
                $listquanhe_hoctruoc = [];

                foreach($moiquanhe_hoctruoc as $value_moiquanhe_hoctruoc) {
                    $hp_ht = DB::table('table_hocphan')->where('id', $value_moiquanhe_hoctruoc)->first();
                    $listquanhe_hoctruoc[] = $hp_ht;
                }

                foreach($listquanhe_hoctruoc as $value_listquanhe_hoctruoc) {
                    $output .= '<tr class="clicked-remove" data-value="hoctruoc_'.$value_listquanhe_hoctruoc->id.'" >';

                    $output .= "<td>".$value_listquanhe_hoctruoc->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_hoctruoc->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_hoctruoc->soTC."</td>";
                    $output .= '<td></td>';
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';

                    $output .= "</tr>";
                }
            }

            if(!empty($listquanhe->tuongduong)) {

                $moiquanhe_tuongduong = explode("_", $listquanhe->tuongduong);
                $listquanhe_tuongduong = [];

                foreach($moiquanhe_tuongduong as $value_moiquanhe_tuongduong) {
                    $hp_td = DB::table('table_hocphan')->where('id', $value_moiquanhe_tuongduong)->first();
                    $listquanhe_tuongduong[] = $hp_td;
                }

                foreach($listquanhe_tuongduong as $value_listquanhe_tuongduong) {
                    $output .= '<tr class="clicked-remove" data-value="tuongduong_'.$value_listquanhe_tuongduong->id.'" >';

                    $output .= "<td>".$value_listquanhe_tuongduong->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_tuongduong->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_tuongduong->soTC."</td>";
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';

                    $output .= "</tr>";
                }
            }

            if(!empty($listquanhe->songhanh)) {

                $moiquanhe_songhanh = explode("_", $listquanhe->songhanh);
                $listquanhe_songhanh = [];

                foreach($moiquanhe_songhanh as $value_moiquanhe_songhanh) {
                    $hp_sh = DB::table('table_hocphan')->where('id', $value_moiquanhe_songhanh)->first();
                    $listquanhe_songhanh[] = $hp_sh;
                }

                foreach($listquanhe_songhanh as $value_listquanhe_songhanh) {
                    $output .= '<tr class="clicked-remove" data-value="songhanh_'.$value_listquanhe_songhanh->id.'" >';

                    $output .= "<td>".$value_listquanhe_songhanh->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_songhanh->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_songhanh->soTC."</td>";
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';

                    $output .= "</tr>";
                }
            }

            if(!empty($listquanhe->id_hocphan_thaythe)) {

                $moiquanhe_thaythe = explode("_", $listquanhe->id_hocphan_thaythe);
                $listquanhe_thaythe = [];

                foreach($moiquanhe_thaythe as $value_moiquanhe_thaythe) {
                    $hp_tt = DB::table('table_hocphan')->where('id', $value_moiquanhe_thaythe)->first();
                    $listquanhe_thaythe[] = $hp_tt;
                }

                foreach($listquanhe_thaythe as $value_listquanhe_thaythe) {
                    $output .= '<tr class="clicked-remove" data-value="thaythe_'.$value_listquanhe_thaythe->id.'" >';

                    $output .= "<td>".$value_listquanhe_thaythe->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_thaythe->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_thaythe->soTC."</td>";
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';
                    $output .= '<td></td>';

                    $output .= "</tr>";
                }
            }

            if(!empty($listquanhe->hocghep)) {

                $moiquanhe_hocghep = explode("_", $listquanhe->hocghep);
                $listquanhe_hocghep = [];

                foreach($moiquanhe_hocghep as $value_moiquanhe_hocghep) {
                    $hp_hg = DB::table('table_hocphan')->where('id', $value_moiquanhe_hocghep)->first();
                    $listquanhe_hocghep[] = $hp_hg;
                }

                foreach($listquanhe_hocghep as $value_listquanhe_hocghep) {
                    $output .= '<tr class="clicked-remove" data-value="hocghep_'.$value_listquanhe_hocghep->id.'" >';

                    $output .= "<td>".$value_listquanhe_hocghep->mahocphan."</td>";
                    $output .= "<td>".$value_listquanhe_hocghep->tenhocphan."</td>";
                    $output .= "<td>".$value_listquanhe_hocghep->soTC."</td>";
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td></td>';
                    $output .= '<td> <i class="fas fa-check-circle"></i> </td>';

                    $output .= "</tr>";
                }
            }

            

            echo $output;

        }
    }

    public function delete_moiquanhe_hocphan() {
        if (Request::ajax()) {
            
            $tenmoiquanhe = (String)Request::get('tenmoiquanhe');
            $id_hocphan = (String)Request::get('id_hocphan');
            $id_khung = (String)Request::get('id_khung');
            $id_hocphan_delete = (String)Request::get('id_hocphan_delete');

            if($tenmoiquanhe == "tienquyet") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->tienquyet;

                $delete_hp_tienquyet = explode("_", $currenthp);

                $new_tienquyet = '';

                foreach($delete_hp_tienquyet as $value_delete_hp_tienquyet) {
                    if($value_delete_hp_tienquyet != $id_hocphan_delete) {
                        $new_tienquyet .= $value_delete_hp_tienquyet.'_';
                    }   
                }

                $new_tienquyet = rtrim($new_tienquyet, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['tienquyet' => $new_tienquyet]);

            }

            if($tenmoiquanhe == "hoctruoc") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->hoctruoc;

                $delete_hp_hoctruoc = explode("_", $currenthp);

                $new_hoctruoc = '';

                foreach($delete_hp_hoctruoc as $value_delete_hp_hoctruoc) {
                    if($value_delete_hp_hoctruoc != $id_hocphan_delete) {
                        $new_hoctruoc .= $value_delete_hp_hoctruoc.'_';
                    }   
                }

                $new_hoctruoc = rtrim($new_hoctruoc, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['hoctruoc' => $new_hoctruoc]);

            }

            if($tenmoiquanhe == "tuongduong") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->tuongduong;

                $delete_hp_tuongduong = explode("_", $currenthp);

                $new_tuongduong = '';

                foreach($delete_hp_tuongduong as $value_delete_hp_tuongduong) {
                    if($value_delete_hp_tuongduong != $id_hocphan_delete) {
                        $new_tuongduong .= $value_delete_hp_tuongduong.'_';
                    }   
                }

                $new_tuongduong = rtrim($new_tuongduong, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['tuongduong' => $new_tuongduong]);

            }

            if($tenmoiquanhe == "songhanh") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->songhanh;

                $delete_hp_songhanh = explode("_", $currenthp);

                $new_songhanh = '';

                foreach($delete_hp_songhanh as $value_delete_hp_songhanh) {
                    if($value_delete_hp_songhanh != $id_hocphan_delete) {
                        $new_songhanh .= $value_delete_hp_songhanh.'_';
                    }   
                }

                $new_songhanh = rtrim($new_songhanh, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['songhanh' => $new_songhanh]);

            }

            if($tenmoiquanhe == "thaythe") {
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->id_hocphan_thaythe;

                $delete_hp_thaythe = explode("_", $currenthp);

                $new_thaythe = '';

                foreach($delete_hp_thaythe as $value_delete_hp_thaythe) {
                    if($value_delete_hp_thaythe != $id_hocphan_delete) {
                        $new_thaythe .= $value_delete_hp_thaythe.'_';
                    }   
                }

                $new_thaythe = rtrim($new_thaythe, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['id_hocphan_thaythe' => $new_thaythe]);

            }

            if($tenmoiquanhe == "hocghep") {

                
                $currenthp = DB::table('table_khungchuongtrinh_hocphan')
                            ->where('id_khung', $id_khung)
                            ->where('id_hocphan', $id_hocphan)
                            ->first()
                            ->hocghep;

                $delete_hp_hocghep = explode("_", $currenthp);

                $new_hocghep = '';

                foreach($delete_hp_hocghep as $value_delete_hp_hocghep) {
                    if($value_delete_hp_hocghep != $id_hocphan_delete) {
                        $new_hocghep .= $value_delete_hp_hocghep.'_';
                    }   
                }

                $new_hocghep = rtrim($new_hocghep, '_');

                $delete_moiquanhehocphan = DB::table('table_khungchuongtrinh_hocphan')
                                        ->where('id_khung', $id_khung)
                                        ->where('id_hocphan', $id_hocphan)
                                        ->update(['hocghep' => $new_hocghep]);

            }

            echo "Xóa mối quan hệ thành công!!!";

        }
    }

    public function load_hocphan_khungchuongtrinh() {
        if (Request::ajax()) {

            $hocky = (String)Request::get('hocky');
            $id_khung = (String)Request::get('id_khung');

            $all_hocphan_khungchuongtrinh = '';

            $output = '';

            if($hocky == 0) {
                $all_hocphan_khungchuongtrinh = DB::table('table_khungchuongtrinh_hocphan')
                                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                                ->where('id_khung', $id_khung)
                                                ->get();
            } else {
                $all_hocphan_khungchuongtrinh = DB::table('table_khungchuongtrinh_hocphan')
                                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                                ->where('hocky', $hocky)
                                                ->where('id_khung', $id_khung)
                                                ->get();
            }

            $stt = 1;

            foreach($all_hocphan_khungchuongtrinh as $value_all_hocphan_khungchuongtrinh) {
                $output .= '<tr class="click-hocphan" data-value="'.$value_all_hocphan_khungchuongtrinh->id_hocphan.'">';
                $output .= '<td>'.$stt++.'</td>';
                $output .= '<td style="text-align: left;" >'.$value_all_hocphan_khungchuongtrinh->mahocphan.'</td>';
                $output .= '<td style="text-align: left;" >'.$value_all_hocphan_khungchuongtrinh->tenhocphan.'</td>';
                $output .= '<td>'.$value_all_hocphan_khungchuongtrinh->soTC.'</td>';
                $output .= '<td>'.$value_all_hocphan_khungchuongtrinh->hocky.'</td>';
                $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                $output .= '</tr>';
            }

            echo $output;
        }
    }

    public function load_hocphan_khungchuongtrinh_theonhomhocphan() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');

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

            foreach($all_khoiluongkienthuc as $value_all_klkt) {

                $all_hp_klkt = DB::table('table_khungchuongtrinh_hocphan')
                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
                                ->where('table_khungchuongtrinh_hocphan.khoikienthuc', $value_all_klkt->id)
                                ->get();

                foreach($all_hp_klkt as $value_all_hp_klkt) {
                    $value_all_klkt->hp_klkt[] = $value_all_hp_klkt;
                }

            }

            $output = '';

            $stt_parent = 0; $array = array('I', 'II', 'III', 'IV', 'V'); 
            $stt = 1; 
            foreach($all_khoiluongkienthuc as $value_all_klkt) {
                if(isset($value_all_klkt->hasChild)) {
                    $l2=1;
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$stt_l2 = $array[$stt_parent++].'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                } else if($value_all_klkt->level == 0) {
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$array[$stt_parent++].'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                    if(isset($value_all_klkt->hp_klkt)) {
                        foreach($value_all_klkt->hp_klkt as $value_hp_klkt) {
                            $output .= '<tr class="click-hocphan" data-value="'.$value_hp_klkt->id_hocphan.'" >';
                            $output .= '<td>'.$stt++.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->mahocphan.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->tenhocphan.'</td>';
                            $output .= '<td>'.$value_hp_klkt->soTC.'</td>';
                            $output .= '<td>'.$value_hp_klkt->hocky.'</td>';
                            $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                            $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                            $output .= '</tr>';
                        }
                    }

                } else if($value_all_klkt->level == 1) {
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$stt_l2.'.'.$l2++.'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >|____'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                    if(isset($value_all_klkt->hp_klkt)) {
                        foreach($value_all_klkt->hp_klkt as $value_hp_klkt) {
                            $output .= '<tr class="click-hocphan" data-value="'.$value_hp_klkt->id_hocphan.'" >';
                            $output .= '<td>'.$stt++.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->mahocphan.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->tenhocphan.'</td>';
                            $output .= '<td>'.$value_hp_klkt->soTC.'</td>';
                            $output .= '<td>'.$value_hp_klkt->hocky.'</td>';
                            $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                            $output .= '<td> <input type="checkbox" name="" id=""> </td>';
                            $output .= '</tr>';
                        }
                    }
                }

            }

            echo $output;

        }
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

    public function load_list_khoiluongkienthuc() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');

            $all_khoiluongkienthuc = DB::table('table_khungchuongtrinh_khoiluongkienthuc')->get();
            $all_khoiluongkienthuc = $this->data_khoiluongkienthuc($all_khoiluongkienthuc, 0);

            $all_kct_klkt_chitiet = DB::table('table_khungchuongtrinh_khoiluongkienthuc_chitiet')
                                    ->join('table_khungchuongtrinh_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc.id')
                                    ->where('table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khung', $id_khung)
                                    ->get();

            foreach($all_khoiluongkienthuc as $value) {
                $value->show = 1;
                foreach($all_kct_klkt_chitiet as $value_chitiet) {
                    if($value->id == $value_chitiet->id) {
                        $value->show = 0;
                    }
                }
            }

            $output = '';

            foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc) {
                $output .= '<tr>';
                if(isset($value_all_khoiluongkienthuc->hasChild)) {
                    $output .= '<td><i class="fas fa-stream"></i>'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc.'</td>';
                }
                else if($value_all_khoiluongkienthuc->level == 0) {
                    $output .=  '<td><i class="fas fa-stream"></i>'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc;
                    if($value_all_khoiluongkienthuc->show == 1) {
                        $output .= '<span data-value="'.$value_all_khoiluongkienthuc->id.'" >Thêm</span>';
                    }       
                    $output .= '</td>';
                }
                else if($value_all_khoiluongkienthuc->level == 1) {
                    $output .= '<td><i class="fas fa-stream"></i>|____'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc;
                    if($value_all_khoiluongkienthuc->show == 1) {
                        $output .= '<span data-value="'.$value_all_khoiluongkienthuc->id.'" >Thêm</span>';
                    }      
                    $output .= '</td>';			
                } 
                $output .= '</tr>';
            }

            echo $output;
                
        }
    }

    public function load_khoiluongkienthuc_cuakhung() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');

            $all_kct_klkt_chitiet = DB::table('table_khungchuongtrinh_khoiluongkienthuc_chitiet')
                                    ->join('table_khungchuongtrinh_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khoiluongkienthuc', 'table_khungchuongtrinh_khoiluongkienthuc.id')
                                    ->where('table_khungchuongtrinh_khoiluongkienthuc_chitiet.id_khung', $id_khung)
                                    ->get();

            foreach($all_kct_klkt_chitiet as $value_kct_ct) {
                if($value_kct_ct->isKhoiluongkienthuc != 0) {
                    $khkt_parent = DB::table('table_khungchuongtrinh_khoiluongkienthuc')
                            ->where('id', $value_kct_ct->isKhoiluongkienthuc)
                            ->first();
    
                    $check = true;
    
                    foreach($all_kct_klkt_chitiet as $value) {
                        if($value->id == $khkt_parent->id) {
                            $check = false;
                            break;
                        }
                    }
    
                    if($check == true) {
                        $all_kct_klkt_chitiet[] = $khkt_parent;
                    }
                    
                }
            }

            $all_kct_klkt_chitiet = collect($all_kct_klkt_chitiet);
            $all_kct_klkt_chitiet = $all_kct_klkt_chitiet->sortBy('id');
            $all_kct_klkt_chitiet = $this->data_khoiluongkienthuc($all_kct_klkt_chitiet, 0);

            $output = '';

            foreach($all_kct_klkt_chitiet as $value_all_kct_klkt_chitiet) {
                $output .= '<tr>';
                if(isset($value_all_kct_klkt_chitiet->hasChild)) {
                    $output .= '<td><i class="fas fa-stream"></i>'.$value_all_kct_klkt_chitiet->tenkhoiluongkienthuc.'</td>';
                }
                else if($value_all_kct_klkt_chitiet->level == 0) {
                    $output .=  '<td><i class="fas fa-stream"></i>'.$value_all_kct_klkt_chitiet->tenkhoiluongkienthuc.' <span data-value="'.$value_all_kct_klkt_chitiet->id.'" >Xóa</span></td>';
                }
                else if($value_all_kct_klkt_chitiet->level == 1) {
                    $output .= '<td><i class="fas fa-stream"></i>|____'.$value_all_kct_klkt_chitiet->tenkhoiluongkienthuc.' <span data-value="'.$value_all_kct_klkt_chitiet->id.'" >Xóa</span></td>';			
                } 
                $output .= '</tr>';
            }

            echo $output;

        }
    }

    public function add_khoiluongkienthuc_cuakhung() {

        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');
            $id_klkt_kct_chitiet = (String)Request::get('id_klkt_kct_chitiet');

            $add_klkt_chitiet = new khungchuongtrinh_khoiluongkienthuc_chitiet; 
            $add_klkt_chitiet->id_khoiluongkienthuc = $id_klkt_kct_chitiet;
            $add_klkt_chitiet->id_khung = $id_khung;
            $add_klkt_chitiet->save();

            echo "Successfull";

        }

    }

    public function delete_khoiluongkienthuc_cuakhung() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');
            $id_klkt_kct_chitiet = (String)Request::get('id_klkt_kct_chitiet');

            $delete_klkt_chitiet = khungchuongtrinh_khoiluongkienthuc_chitiet::where('id_khoiluongkienthuc', $id_klkt_kct_chitiet)
                                ->where('id_khung', $id_khung); 
            $delete_klkt_chitiet->delete();

            echo "Successfull";

        }
    }

    public function load_danhsachhocphan_khoiluongkienthuc() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');

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

            foreach($all_khoiluongkienthuc as $value_all_klkt) {

                $all_hp_klkt = DB::table('table_khungchuongtrinh_hocphan')
                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                ->where('table_khungchuongtrinh_hocphan.id_khung', $id_khung)
                                ->where('table_khungchuongtrinh_hocphan.khoikienthuc', $value_all_klkt->id)
                                ->get();

                foreach($all_hp_klkt as $value_all_hp_klkt) {
                    $value_all_klkt->hp_klkt[] = $value_all_hp_klkt;
                }
            }

            $output = '';

            $stt_parent = 0; $array = array('I', 'II', 'III', 'IV', 'V'); 
            $stt = 1; 
            foreach($all_khoiluongkienthuc as $value_all_klkt) {
                if(isset($value_all_klkt->hasChild)) {
                    $l2=1;
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$stt_l2 = $array[$stt_parent++].'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                } else if($value_all_klkt->level == 0) {
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$array[$stt_parent++].'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                    if(isset($value_all_klkt->hp_klkt)) {
                        foreach($value_all_klkt->hp_klkt as $value_hp_klkt) {
                            $output .= '<tr class="click-hocphan" data-value="'.$value_hp_klkt->id_hocphan.'" >';
                            $output .= '<td>'.$stt++.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->mahocphan.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->tenhocphan.'</td>';
                            $output .= '<td>'.$value_hp_klkt->soTC.'</td>';
                            $output .= '<td>'.$value_hp_klkt->hocky.'</td>';
                            $output .= '</tr>';
                        }
                    }

                } else if($value_all_klkt->level == 1) {
                    $output .= '<tr style="background:#f6caad; font-weight: 600;">';
                    $output .= '<td>'.$stt_l2.'.'.$l2++.'</td>';
                    $output .= '<td colspan="6" style="text-align: left;" >|____'.$value_all_klkt->tenkhoiluongkienthuc.'</td>';
                    $output .= '</tr>';
                    if(isset($value_all_klkt->hp_klkt)) {
                        foreach($value_all_klkt->hp_klkt as $value_hp_klkt) {
                            $output .= '<tr class="click-hocphan" data-value="'.$value_hp_klkt->id_hocphan.'" >';
                            $output .= '<td>'.$stt++.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->mahocphan.'</td>';
                            $output .= '<td style="text-align: left;">'.$value_hp_klkt->tenhocphan.'</td>';
                            $output .= '<td>'.$value_hp_klkt->soTC.'</td>';
                            $output .= '<td>'.$value_hp_klkt->hocky.'</td>';
                            $output .= '</tr>';
                        }
                    }
                }

            }

            echo $output;

        }
    }

    public function khoiluongkienthuc_hocphan() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');
            $id_hocphan_clicked = (String)Request::get('id_hocphan_clicked');

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

            $get_khoikienthuc = DB::table('table_khungchuongtrinh_hocphan')
                                ->where('id_khung', $id_khung)
                                ->where('id_hocphan', $id_hocphan_clicked)
                                ->first()->khoikienthuc;

            $output = '';

            $output .= '<select multiple data-value="'.$id_hocphan_clicked.'">';

            foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc) {
                if(isset($value_all_khoiluongkienthuc->hasChild)) {
                    $output .= '<option disabled >'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc.'</option>';
                }else if($value_all_khoiluongkienthuc->level == 0) {

                    $select = '';
                    if($value_all_khoiluongkienthuc->id == $get_khoikienthuc) {
                        $select = 'selected';
                    }

                    $output .= '<option '.$select.' value="'.$value_all_khoiluongkienthuc->id.'"> '.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc .'</option>';
                }else if($value_all_khoiluongkienthuc->level == 1) {
                    
                    $select = '';
                    if($value_all_khoiluongkienthuc->id == $get_khoikienthuc) {
                        $select = 'selected';
                    }
                    
                    $output .= '<option '.$select.' value="'.$value_all_khoiluongkienthuc->id.'" >|____'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc.'</option>';			
                }
            }


            $output .= '</select>';

            echo $output;
            
        }
    }

    public function sua_khoiluongkienthuc_hocphan() {
        if (Request::ajax()) {

            $id_klkt_sua = (String)Request::get('id_klkt_sua');
            $id_khung = (String)Request::get('id_khung');
            $id_hocphan = (String)Request::get('id_hocphan');

            $sua_klkt = DB::table('table_khungchuongtrinh_hocphan')
                        ->where('id_khung', $id_khung)
                        ->where('id_hocphan', $id_hocphan)
                        ->update(['khoikienthuc' => $id_klkt_sua]);

            echo "Successfull";
            
        }
    }

    public function load_danhsachhocphan_chuathem_khoiluongkienthuc() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');

            $all_hp_chuathem = DB::table('table_khungchuongtrinh_hocphan')
                                ->join('table_hocphan', 'table_khungchuongtrinh_hocphan.id_hocphan', 'table_hocphan.id')
                                ->where('table_khungchuongtrinh_hocphan.khoikienthuc', null)
                                ->get();

            $output = '';

            if(count($all_hp_chuathem)) {
                $stt = 1;
                foreach($all_hp_chuathem as $value_all_hp_chuathem) {
                    $output .= '<tr class="click-hocphan" data-value="'.$value_all_hp_chuathem->id_hocphan.'" >';
                    $output .= '<td>'.$stt++.'</td>';
                    $output .= '<td>'.$value_all_hp_chuathem->mahocphan.'</td>';
                    $output .= '<td>'.$value_all_hp_chuathem->tenhocphan.'</td>';
                    $output .= '<td>'.$value_all_hp_chuathem->soTC.'</td>';
                    $output .= '<td>'.$value_all_hp_chuathem->hocky.'</td>';
                    $output .= '</tr>';
                }
            } else {
                $output .= '<tr>';
                $output .= '<td colspan="5">Không có học phần nào chưa thêm Khối lượng kiến thức</td>';
                $output .= '</tr>';
            }

            echo $output;

        }
    }

    public function load_them_khoiluongkienthuc_hocphan() {
        if (Request::ajax()) {

            $id_khung = (String)Request::get('id_khung');
            $id_hocphan = (String)Request::get('id_hocphan');

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

            
            $output = '';

            $output .= '<select multiple data-value="'.$id_hocphan.'">';
            foreach($all_khoiluongkienthuc as $value_all_khoiluongkienthuc) {
                if(isset($value_all_khoiluongkienthuc->hasChild)) {
                    $output .= '<option disabled >'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc.'</option>';
                }else if($value_all_khoiluongkienthuc->level == 0) {
                    $output .= '<option value="'.$value_all_khoiluongkienthuc->id.'"> '.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc .'</option>';
                }else if($value_all_khoiluongkienthuc->level == 1) {
                    $output .= '<option value="'.$value_all_khoiluongkienthuc->id.'" >|____'.$value_all_khoiluongkienthuc->tenkhoiluongkienthuc.'</option>';			
                }
            }

            $output .= '</select>';

            echo $output;
            
        }
    }

    public function them_khoiluongkienthuc_hocphan() {
        if (Request::ajax()) {

            $id_klkt_them = (String)Request::get('id_klkt_them');
            $id_khung = (String)Request::get('id_khung');
            $id_hocphan = (String)Request::get('id_hocphan');

            $sua_klkt = DB::table('table_khungchuongtrinh_hocphan')
                        ->where('id_khung', $id_khung)
                        ->where('id_hocphan', $id_hocphan)
                        ->update(['khoikienthuc' => $id_klkt_them]);

            echo "Successfull";
            
        }
    }

    

    public function converto($string) {
        $_convertTable = array(
            '&amp;' => 'and',   '@' => 'at',    '©' => 'c', '®' => 'r', 'À' => 'a',
            'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'Å' => 'a', 'Æ' => 'ae','Ç' => 'c',
            'È' => 'e', 'É' => 'e', 'Ë' => 'e', 'Ì' => 'i', 'Í' => 'i', 'Î' => 'i',
            'Ï' => 'i', 'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o',
            'Ø' => 'o', 'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'Ý' => 'y',
            'ß' => 'ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'å' => 'a',
            'æ' => 'ae','ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u',
            'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'þ' => 'p', 'ÿ' => 'y', 'Ā' => 'a',
            'ā' => 'a', 'Ă' => 'a', 'ă' => 'a', 'Ą' => 'a', 'ą' => 'a', 'Ć' => 'c',
            'ć' => 'c', 'Ĉ' => 'c', 'ĉ' => 'c', 'Ċ' => 'c', 'ċ' => 'c', 'Č' => 'c',
            'č' => 'c', 'Ď' => 'd', 'ď' => 'd', 'Đ' => 'd', 'đ' => 'd', 'Ē' => 'e',
            'ē' => 'e', 'Ĕ' => 'e', 'ĕ' => 'e', 'Ė' => 'e', 'ė' => 'e', 'Ę' => 'e',
            'ę' => 'e', 'Ě' => 'e', 'ě' => 'e', 'Ĝ' => 'g', 'ĝ' => 'g', 'Ğ' => 'g',
            'ğ' => 'g', 'Ġ' => 'g', 'ġ' => 'g', 'Ģ' => 'g', 'ģ' => 'g', 'Ĥ' => 'h',
            'ĥ' => 'h', 'Ħ' => 'h', 'ħ' => 'h', 'Ĩ' => 'i', 'ĩ' => 'i', 'Ī' => 'i',
            'ī' => 'i', 'Ĭ' => 'i', 'ĭ' => 'i', 'Į' => 'i', 'į' => 'i', 'İ' => 'i',
            'ı' => 'i', 'Ĳ' => 'ij','ĳ' => 'ij','Ĵ' => 'j', 'ĵ' => 'j', 'Ķ' => 'k',
            'ķ' => 'k', 'ĸ' => 'k', 'Ĺ' => 'l', 'ĺ' => 'l', 'Ļ' => 'l', 'ļ' => 'l',
            'Ľ' => 'l', 'ľ' => 'l', 'Ŀ' => 'l', 'ŀ' => 'l', 'Ł' => 'l', 'ł' => 'l',
            'Ń' => 'n', 'ń' => 'n', 'Ņ' => 'n', 'ņ' => 'n', 'Ň' => 'n', 'ň' => 'n',
            'ŉ' => 'n', 'Ŋ' => 'n', 'ŋ' => 'n', 'Ō' => 'o', 'ō' => 'o', 'Ŏ' => 'o',
            'ŏ' => 'o', 'Ő' => 'o', 'ő' => 'o', 'Œ' => 'oe','œ' => 'oe','Ŕ' => 'r',
            'ŕ' => 'r', 'Ŗ' => 'r', 'ŗ' => 'r', 'Ř' => 'r', 'ř' => 'r', 'Ś' => 's',
            'ś' => 's', 'Ŝ' => 's', 'ŝ' => 's', 'Ş' => 's', 'ş' => 's', 'Š' => 's',
            'š' => 's', 'Ţ' => 't', 'ţ' => 't', 'Ť' => 't', 'ť' => 't', 'Ŧ' => 't',
            'ŧ' => 't', 'Ũ' => 'u', 'ũ' => 'u', 'Ū' => 'u', 'ū' => 'u', 'Ŭ' => 'u',
            'ŭ' => 'u', 'Ů' => 'u', 'ů' => 'u', 'Ű' => 'u', 'ű' => 'u', 'Ų' => 'u',
            'ų' => 'u', 'Ŵ' => 'w', 'ŵ' => 'w', 'Ŷ' => 'y', 'ŷ' => 'y', 'Ÿ' => 'y',
            'Ź' => 'z', 'ź' => 'z', 'Ż' => 'z', 'ż' => 'z', 'Ž' => 'z', 'ž' => 'z',
            'ſ' => 'z', 'Ə' => 'e', 'ƒ' => 'f', 'Ơ' => 'o', 'ơ' => 'o', 'Ư' => 'u',
            'ư' => 'u', 'Ǎ' => 'a', 'ǎ' => 'a', 'Ǐ' => 'i', 'ǐ' => 'i', 'Ǒ' => 'o',
            'ǒ' => 'o', 'Ǔ' => 'u', 'ǔ' => 'u', 'Ǖ' => 'u', 'ǖ' => 'u', 'Ǘ' => 'u',
            'ǘ' => 'u', 'Ǚ' => 'u', 'ǚ' => 'u', 'Ǜ' => 'u', 'ǜ' => 'u', 'Ǻ' => 'a',
            'ǻ' => 'a', 'Ǽ' => 'ae','ǽ' => 'ae','Ǿ' => 'o', 'ǿ' => 'o', 'ə' => 'e',
            'Ё' => 'jo','Є' => 'e', 'І' => 'i', 'Ї' => 'i', 'А' => 'a', 'Б' => 'b',
            'В' => 'v', 'Г' => 'g', 'Д' => 'd', 'Е' => 'e', 'Ж' => 'zh','З' => 'z',
            'И' => 'i', 'Й' => 'j', 'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n',
            'О' => 'o', 'П' => 'p', 'Р' => 'r', 'С' => 's', 'Т' => 't', 'У' => 'u',
            'Ф' => 'f', 'Х' => 'h', 'Ц' => 'c', 'Ч' => 'ch','Ш' => 'sh','Щ' => 'sch',
            'Ъ' => '-', 'Ы' => 'y', 'Ь' => '-', 'Э' => 'je','Ю' => 'ju','Я' => 'ja',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ж' => 'zh','з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l',
            'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
            'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh','щ' => 'sch','ъ' => '-','ы' => 'y', 'ь' => '-', 'э' => 'je',
            'ю' => 'ju','я' => 'ja','ё' => 'jo','є' => 'e', 'і' => 'i', 'ї' => 'i',
            'Ґ' => 'g', 'ґ' => 'g', 'א' => 'a', 'ב' => 'b', 'ג' => 'g', 'ד' => 'd',
            'ה' => 'h', 'ו' => 'v', 'ז' => 'z', 'ח' => 'h', 'ט' => 't', 'י' => 'i',
            'ך' => 'k', 'כ' => 'k', 'ל' => 'l', 'ם' => 'm', 'מ' => 'm', 'ן' => 'n',
            'נ' => 'n', 'ס' => 's', 'ע' => 'e', 'ף' => 'p', 'פ' => 'p', 'ץ' => 'C',
            'צ' => 'c', 'ק' => 'q', 'ר' => 'r', 'ש' => 'w', 'ת' => 't', '™' => 'tm',
            'Ṭ' => 't', 'ṭ' => 't', ':' => ' ', '\'' => ' ', '"' => ' ', '-' => ' ',
        );

        $str = strtr(trim($string), $_convertTable);

        $xstring = $this->stripVN(trim($str));

        $newstring = preg_replace('([\s]+)', ' ', $xstring);

        $output = str_replace(' ', '-', $newstring);  

        $outputString = strtolower($output);

        return $outputString;
    }

    function stripVN($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);

        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }

   


}
