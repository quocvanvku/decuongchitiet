<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'decuong'], function() {

        //Route::get('them-de-cuong/{id_khungchuongtrinh}', 'DeCuongController@danhsachdecuongthem');
        // Route::get('chinh-sua-them-moi-de-cuong/{id_decuong}/{id_khung}', 'DeCuongController@chinhsuathemmoi');
        // Route::post('insert-chinh-sua-them-moi-de-cuong', 'DeCuongController@insert_chinhsuathemmoi');

        // Route::get('them-moi-de-cuong-admin', 'DeCuongController@themdecuongadmin');
        // Route::get('them-moi-de-cuong/{id_hocphan}/{id_khung}', 'DeCuongController@themdecuong');
        // //Route::get('danh-sach-de-cuong/{id_khoa}/{khungchuongtrinh}', 'DeCuongController@danhsachdecuong');
 
        // //Ajax
        // Route::get('dc-ten-hoc-phan', 'DeCuongAjax@ajtenhocphan');
        // Route::get('dc-giang-vien-phu-trach', 'DeCuongAjax@ajgiangvienphutrach');
        // Route::get('dc-giang-vien-day-cung', 'DeCuongAjax@ajgiangviendaycung');
        // Route::get('select-nganh-aj', 'DeCuongAjax@ajselectnganh');
        // Route::get('tim-kiem-de-cuong', 'DeCuongAjax@timkiemdecuong');
        // Route::get('tim-kiem-de-cuong-them-moi', 'DeCuongAjax@timkiemdecuongthemmoi');

        // //CLO
        // Route::get('add-clo', 'DeCuongAjax@addclo');
        // Route::get('edit-clo', 'DeCuongAjax@editclo');
        // Route::get('delete-clo', 'DeCuongAjax@deleteclo');
        // Route::get('load-clo', 'DeCuongAjax@loadclo');
        // Route::get('add-moilienhe-clo-plo', 'DeCuongAjax@add_moilienhecloplo');
        // Route::get('edit-moilienhe-clo-plo-cdr', 'DeCuongAjax@edit_moilienhecloplo_cdr');
        // Route::get('edit-moilienhe-clo-plo-mucdo', 'DeCuongAjax@edit_moilienhecloplo_mucdo');
        // Route::get('delete-moilienhe-clo-plo', 'DeCuongAjax@delete_moilienhecloplo');

        // Route::post('them-moi-de-cuong', 'DeCuongController@tao_decuong');

        // Route::get('edit-de-cuong/{id_decuong}', 'DeCuongController@editdecuong');
        // Route::post('sua-de-cuong/{id_decuong}', 'DeCuongController@sua_decuong');

        // Route::get('delete-de-cuong/{id_decuong}', 'DeCuongController@xoa_decuong');

        // Route::get('danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@danh_gia_hoc_phan');
        // Route::post('danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@insert_danh_gia_hoc_phan');
        // Route::get('edit-danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@edit_danh_gia_hoc_phan');
        // Route::post('edit-danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@insert_edit_danh_gia_hoc_phan');

        // Route::get('ke-hoach-giang-day/{id_decuong}', 'DeCuongController@ke_hoach_giang_day');
        // Route::post('ke-hoach-giang-day/{id_decuong}', 'DeCuongController@insert_ke_hoach_giang_day');
        // Route::get('edit-ke-hoach-giang-day/{id_decuong}', 'DeCuongController@edit_ke_hoach_giang_day');
        // Route::post('edit-ke-hoach-giang-day/{id_decuong}', 'DeCuongController@insert_edit_ke_hoach_giang_day');

        // Route::get('xem-de-cuong/{id_decuong}', 'DeCuongController@xem_de_cuong');

        // #chuan dau ra chung
        // Route::get('danh-sach-chuan-dau-ra-chung/{id_nganh}', 'DeCuongController@chuan_dau_ra_chung');
        // Route::get('sua-chuan-dau-ra-chung', 'DeCuongAjax@sua_chuan_dau_ra_chung');
        // Route::get('xoa-chuan-dau-ra-chung', 'DeCuongAjax@xoa_chuan_dau_ra_chung');
        // Route::get('them-chuan-dau-ra-chung', 'DeCuongAjax@them_chuan_dau_ra_chung');

        // #Ke hoach giang day
        // Route::get('up-khgd', 'DeCuongAjax@up_khgd');
        // Route::get('down-khgd', 'DeCuongAjax@down_khgd');
        
        // #khung chuong trinh
        // Route::get('khung-chuong-trinh2/{id_khungchuongtrinh}', 'DeCuongController@khungchuongtrinh');
        // Route::get('de-cuong-khung-chuong-trinh', 'DeCuongAjax@decuong_khungchuongtrinh');
        // Route::get('nhan-ban-de-cuong-khung-chuong-trinh', 'DeCuongAjax@nhanban_decuong_khungchuongtrinh');
        // Route::get('tim-kiem-hoc-phan-khung-chuong-trinh', 'DeCuongAjax@timkiem_hocphan_khungchuongtrinh');
        // Route::get('them-ke-hoach-giang-day-thu-gon/{id_hocphan}/{id_khung}', 'DeCuongController@them_kehoachgiangday_thugon');
        // Route::post('them-ke-hoach-giang-day-thu-gon', 'DeCuongController@insert_them_kehoachgiangday_thugon');
        // Route::get('sua-ke-hoach-giang-day-thu-gon/{id_hocphan}/{id_khung}', 'DeCuongController@sua_kehoachgiangday_thugon');
        // Route::post('sua-ke-hoach-giang-day-thu-gon', 'DeCuongController@insert_sua_kehoachgiangday_thugon');
        // Route::get('khgd-khung-chuong-trinh/{id_khungchuongtrinh}', 'DeCuongController@khgd_khungchuongtrinh');

        // #khung chuong trinh hoc phan
        // Route::get('danh-sach-khung-chuong-trinh-hoc-phan/{id_khungchuongtrinh}', 'DeCuongController@khungchuongtrinhhocphan');
        // Route::get('them-hoc-phan-khung-chuong-trinh', 'DeCuongController@themhocphankhungchuongtrinh');

        // Route::post('them-hoc-phan-khung-chuong-trinh', 'DeCuongController@insert_themhocphankhungchuongtrinh');
        // Route::get('get-hoc-phan-kcthp', 'DeCuongAjax@get_hocphan_kcthp');
        // //Route::get('sua-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@suahocphankhungchuongtrinh');
        // //Route::post('sua-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@insert_suahocphankhungchuongtrinh');
        // Route::get('xoa-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@xoahocphankhungchuongtrinh');
        // Route::get('up-kct-hp', 'DeCuongAjax@up_kct_hp');
        // Route::get('down-kct-hp', 'DeCuongAjax@down_kct_hp'); 

        // //Khoi kien thuc
        // Route::get('khoi-kien-thuc/{id_khung}', 'DeCuongController@khoikienthuc');

        #ma tran chuan dau ra
        //Route::get('/ma-tran-chuan-dau-ra/{id_nganh}', 'DeCuongController@matran_chuandaura');

        // Route::get('/thong-ke-khung', 'ThongKeKhung@thongkekhung');
        // Route::get('/thong-ke-khung-chi-tiet/{id_khung}', 'ThongKeKhung@thongkekhungchitiet');

        //Thiet lap quan he hoc phan 
        Route::get('/thiet-lap-moi-quan-he-hoc-phan/{id_khung}/{id_hocphan}', 'ThietLapQuanHeHocPhan@getThietLapMoiQuanHe');
        Route::get('add-moi-quan-he-hoc-phan', 'DeCuongAjax@add_moiquanhe_hocphan');
        Route::get('delete-moi-quan-he-hoc-phan', 'DeCuongAjax@delete_moiquanhe_hocphan');
        Route::get('load-moi-quan-he-hoc-phan', 'DeCuongAjax@load_moiquanhe_hocphan');

        //new 

        //Quan ly chuong trinh dao tao
        Route::get('quan-ly-chuong-trinh-dao-tao/{id_khung}', 'KhungChuongTrinh@quanly_chuongtrinhdaotao');
        Route::get('load-hoc-phan-khung-chuong-trinh', 'DeCuongAjax@load_hocphan_khungchuongtrinh');
        Route::get('load-hoc-phan-khung-chuong-trinh-theo-nhom-hoc-phan', 'DeCuongAjax@load_hocphan_khungchuongtrinh_theonhomhocphan');
        

        //Sua hoc phan khung chuong trinh
        Route::get('sua-hoc-phan-khung-chuong-trinh/{id_hocphan}/{id_khung}', 'KhungChuongTrinh@getSuaHocPhanKhungChuongTrinh');
        Route::post('sua-hoc-phan-khung-chuong-trinh', 'KhungChuongTrinh@postSuaHocPhanKhungChuongTrinh');
        

        //Them khoi luong kien thuc khung chuong trinh
        Route::get('them-khoi-luong-kien-thuc-khung-chuong-trinh/{id_hocphan}', 'KhungChuongTrinh@getThemKhoiLuongKienThucKhungChuongTrinh');
        Route::get('load-list-khoi-luong-kien-thuc', 'DeCuongAjax@load_list_khoiluongkienthuc');
        Route::get('load-khoi-luong-kien-thuc-cua-khung', 'DeCuongAjax@load_khoiluongkienthuc_cuakhung');
        Route::get('add-khoi-luong-kien-thuc-cua-khung', 'DeCuongAjax@add_khoiluongkienthuc_cuakhung');
        Route::get('delete-khoi-luong-kien-thuc-cua-khung', 'DeCuongAjax@delete_khoiluongkienthuc_cuakhung');

        Route::get('load-danh-sach-hoc-phan-khoi-luong-kien-thuc', 'DeCuongAjax@load_danhsachhocphan_khoiluongkienthuc');
        Route::get('khoi-luong-kien-thuc-hoc-phan', 'DeCuongAjax@khoiluongkienthuc_hocphan');
        Route::get('sua-khoi-luong-kien-thuc-hoc-phan', 'DeCuongAjax@sua_khoiluongkienthuc_hocphan');
        Route::get('load-danh-sach-hoc-phan-chua-them-khoi-luong-kien-thuc', 'DeCuongAjax@load_danhsachhocphan_chuathem_khoiluongkienthuc');
        Route::get('load-them-khoi-luong-kien-thuc-hoc-phan', 'DeCuongAjax@load_them_khoiluongkienthuc_hocphan');
        Route::get('them-khoi-luong-kien-thuc-hoc-phan', 'DeCuongAjax@them_khoiluongkienthuc_hocphan');

        //Nghien cuu khoa hoc 
        Route::get('chon-nam-hoc-nckh', 'NghienCuuKhoaHoc@ChonNamHocNckh');
        Route::get('nghien-cuu-khoa-hoc/{id_namhoc}', 'NghienCuuKhoaHoc@index');
        Route::get('them-moi-nghien-cuu-khoa-hoc/load-view/{view}/{id_hoatdong}/{id_namhoc}', 'NghienCuuKhoaHoc@getThemDeTaiNghienCuuKhoaHoc');
        Route::post('them-moi-nghien-cuu-khoa-hoc-loai-1', 'NghienCuuKhoaHoc@postThemDeTaiNCKHLoai1');
        Route::post('them-moi-nghien-cuu-khoa-hoc-loai-2', 'NghienCuuKhoaHoc@postThemDeTaiNCKHLoai2');
        Route::post('them-moi-nghien-cuu-khoa-hoc-loai-3', 'NghienCuuKhoaHoc@postThemDeTaiNCKHLoai3');
        Route::get('get-list-giang-vien', 'NghienCuuKhoaHoc@getListGiangVien');
        Route::get('sua-nghien-cuu-khoa-hoc-loai-1/{id_hoatdong_loai1}/{id_namhoc}', 'NghienCuuKhoaHoc@getSuaDeTaiNCKHLoai1');
        Route::post('sua-nghien-cuu-khoa-hoc-loai-1', 'NghienCuuKhoaHoc@PostSuaDeTaiNCKHLoai1');
        Route::get('sua-nghien-cuu-khoa-hoc-loai-2/{id_hoatdong_loai2}/{id_namhoc}', 'NghienCuuKhoaHoc@getSuaDeTaiNCKHLoai2');
        Route::post('sua-nghien-cuu-khoa-hoc-loai-2', 'NghienCuuKhoaHoc@PostSuaDeTaiNCKHLoai2');
        Route::get('sua-nghien-cuu-khoa-hoc-loai-3/{id_hoatdong_loai3}/{id_namhoc}', 'NghienCuuKhoaHoc@getSuaDeTaiNCKHLoai3');
        Route::post('sua-nghien-cuu-khoa-hoc-loai-3', 'NghienCuuKhoaHoc@PostSuaDeTaiNCKHLoai3');

        Route::get('load-nckh-cuatoi', 'NghienCuuKhoaHoc@load_nckh_cuatoi');

        Route::get('chon-nam-hoc-quan-ly-hoat-dong-nckh', 'NghienCuuKhoaHoc@ChonNamHocQuanLyHoatDongNckh');
        Route::get('quan-ly-hoat-dong-nghien-cuu-khoa-hoc/{id_namhoc}', 'NghienCuuKhoaHoc@QuanLyHoatDongNghienCuuKhoaHoc');
        Route::get('load-hoat-dong-nghien-cuu-khoa-hoc', 'NghienCuuKhoaHoc@LoadHoatDongNghienCuuKhoaHoc');
        Route::get('sua-hoat-dong-nghien-cuu-khoa-hoc', 'NghienCuuKhoaHoc@getSuaHoatDongNghienCuuKhoaHoc');
        Route::get('insert-sua-hoat-dong-nghien-cuu-khoa-hoc', 'NghienCuuKhoaHoc@PostSuaHoatDongNghienCuuKhoaHoc');

        Route::get('insert-them-hoat-dong-nghien-cuu-khoa-hoc', 'NghienCuuKhoaHoc@PostThemHoatDongNghienCuuKhoaHoc');

        //Thong ke nghien cuu khoa hoc
        Route::get('chon-nam-hoc-thong-ke-nckh-cua-toi', 'NghienCuuKhoaHoc@ChonNamHocThongKeNCKHCuaToi');
        Route::get('thong-ke-nghien-cuu-khoa-hoc-cua-toi/{id_namhoc}', 'NghienCuuKhoaHoc@ThongKeNghienCuuKhoaHocCuaToi');
        

        //Khung chuong trinh
        Route::get('khung-chuong-trinh/{id_khung}', 'KhungChuongTrinh@QuanLyKhungChuongTrinh');
        Route::get('get-modal-sua-de-cuong', 'KhungChuongTrinh@getModalSuaDeCuong');
        Route::get('get-modal-nhan-ban-de-cuong', 'KhungChuongTrinh@getModalNhanBanDeCuong');

        //De cuong chi tiet
        Route::get('them-moi-de-cuong/{id_hocphan}/{id_khung}', 'DeCuongChiTiet@getThemMoiDeCuong');
        Route::get('get-ten-hoc-phan-de-cuong', 'DeCuongChiTiet@getTenHocPhanDeCuong');
        Route::get('get-giang-vien-phu-trach-de-cuong', 'DeCuongChiTiet@getGiangVienPhuTrachDeCuong');
        Route::get('get-giang-vien-day-cung-de-cuong', 'DeCuongChiTiet@getGiangVienDayCungDeCuong');
        Route::get('chon-nganh-de-cuong', 'DeCuongChiTiet@chonNganhDeCuong');
        Route::post('them-moi-de-cuong', 'DeCuongChiTiet@postThemMoiDeCuong');
        Route::get('sua-de-cuong/{id_decuong}', 'DeCuongChiTiet@getSuaDeCuong');
        Route::post('sua-de-cuong/{id_decuong}', 'DeCuongChiTiet@postSuaDeCuong');

        //CLO
        Route::get('add-clo', 'DeCuongChiTiet@addclo');
        Route::get('edit-clo', 'DeCuongChiTiet@editclo');
        Route::get('delete-clo', 'DeCuongChiTiet@deleteclo');
        Route::get('load-clo', 'DeCuongChiTiet@loadclo');
        Route::get('add-moilienhe-clo-plo', 'DeCuongChiTiet@add_moilienhecloplo');
        Route::get('edit-moilienhe-clo-plo-cdr', 'DeCuongChiTiet@edit_moilienhecloplo_cdr');
        Route::get('edit-moilienhe-clo-plo-mucdo', 'DeCuongChiTiet@edit_moilienhecloplo_mucdo');
        Route::get('delete-moilienhe-clo-plo', 'DeCuongChiTiet@delete_moilienhecloplo');

        //De cuong chi tiet moi
        Route::get('them-moi-de-cuong-moi/{id_hocphan}/{id_khung}', 'DeCuongChiTiet@getThemMoiDeCuongMoi');
        Route::get('chon-nganh-de-cuong-moi', 'DeCuongChiTiet@chonNganhDeCuongMoi');
        Route::get('add-moilienhe-clo-pi', 'DeCuongChiTiet@add_moilienheclopi');
        Route::get('delete-moilienhe-clo-pi', 'DeCuongChiTiet@delete_moilienheclopi');
        Route::get('edit-moilienhe-clo-pi-cdr', 'DeCuongChiTiet@edit_moilienheclopi_cdr');
        Route::get('edit-moilienhe-clo-pi-mucdo', 'DeCuongChiTiet@edit_moilienheclopi_mucdo');
        Route::get('sua-de-cuong-moi/{id_decuong}', 'DeCuongChiTiet@getSuaDeCuongMoi');

        Route::get('get-tai-lieu-tham-khao-giao-trinh', 'DeCuongChiTiet@getTaiLieuThamKhaoGiaoTrinh');
        Route::get('get-thong-tin-tai-lieu-tham-khao-giao-trinh', 'DeCuongChiTiet@getThongTinTaiLieuThamKhaoGiaoTrinh');
        
        //PO
        Route::get('quan-ly-po/{id_nganh}', 'DeCuongChiTiet@getQuanLyPO');
        Route::get('load-po', 'DeCuongChiTiet@getLoadPO');
        Route::get('them-po', 'DeCuongChiTiet@getThemPO');
        Route::get('load-sua-po', 'DeCuongChiTiet@getLoadSuaPO');
        Route::get('sua-po', 'DeCuongChiTiet@getSuaPO');
        Route::get('xoa-po', 'DeCuongChiTiet@getXoaPO');

        Route::get('load-moilienhe-po-plo', 'DeCuongChiTiet@getLoadMoiLienHePoPlo');
        Route::get('them-moilienhe-po-plo', 'DeCuongChiTiet@getThemMoiLienHePoPlo');
        Route::get('sua-moilienhe-po-plo', 'DeCuongChiTiet@getSuaMoiLienHePoPlo');
        Route::get('xoa-moilienhe-po-plo', 'DeCuongChiTiet@getXoaMoiLienHePoPlo');
        
        //PLO
        Route::get('quan-ly-plo/{id_nganh}', 'DeCuongChiTiet@getQuanLyPLO');
        Route::get('load-plo', 'DeCuongChiTiet@getLoadPLO');
        Route::get('them-plo', 'DeCuongChiTiet@getThemPLO');
        Route::get('load-sua-plo', 'DeCuongChiTiet@getLoadSuaPLO');
        Route::get('sua-plo', 'DeCuongChiTiet@getSuaPLO');
        Route::get('xoa-plo', 'DeCuongChiTiet@getXoaPLO');

        //PI
        Route::get('load-pi', 'DeCuongChiTiet@getLoadPI');
        Route::get('them-pi', 'DeCuongChiTiet@getThemPI');
        Route::get('load-sua-pi', 'DeCuongChiTiet@getLoadSuaPI');
        Route::get('sua-pi', 'DeCuongChiTiet@getSuaPI');
        Route::get('xoa-pi', 'DeCuongChiTiet@getXoaPI');

        //Danh gia hoc phan De cuong
        Route::get('them-danh-gia-hoc-phan/{id_decuong}', 'DeCuongChiTiet@getThemDanhGiaHocPhan');
        Route::post('them-danh-gia-hoc-phan/{id_decuong}', 'DeCuongChiTiet@postThemDanhGiaHocPhan');
        Route::get('sua-danh-gia-hoc-phan/{id_decuong}', 'DeCuongChiTiet@getSuaDanhGiaHocPhan');
        Route::post('sua-danh-gia-hoc-phan/{id_decuong}', 'DeCuongChiTiet@postSuaDanhGiaHocPhan');
        
        Route::get('them-ke-hoach-giang-day/{id_decuong}', 'DeCuongChiTiet@getThemKeHoachGiangDay');
        Route::post('them-ke-hoach-giang-day/{id_decuong}', 'DeCuongChiTiet@postThemKeHoachGiangDay');
        Route::get('sua-ke-hoach-giang-day/{id_decuong}', 'DeCuongChiTiet@getSuaKeHoachGiangDay');
        Route::post('sua-ke-hoach-giang-day/{id_decuong}', 'DeCuongChiTiet@postSuaKeHoachGiangDay');

        Route::get('up-stt-khgd', 'DeCuongChiTiet@getUpSttKhgd');
        Route::get('down-stt-khgd', 'DeCuongChiTiet@getDownSttKhgd');

        //Chinh sua nhan ban de cuong
        Route::get('nhan-ban-de-cuong/{id_decuong}/{id_khung}', 'DeCuongChiTiet@getNhanBanDeCuong');
        Route::post('nhan-ban-de-cuong', 'DeCuongChiTiet@postNhanBanDeCuong');

        //Chinh sua nhan ban de cuong moi
        Route::get('nhan-ban-de-cuong-moi/{id_decuong}/{id_khung}', 'DeCuongChiTiet@getNhanBanDeCuongMoi');

        //Xoa de cuong
        Route::get('xoa-de-cuong/{id_decuong}', 'DeCuongChiTiet@xoaDeCuong');

        //Xem de cuong
        Route::get('xem-de-cuong/{id_decuong}', 'DeCuongChiTiet@xemDeCuong');
        Route::get('xem-de-cuong-moi/{id_decuong}', 'DeCuongChiTiet@xemDeCuongMoi');

        Route::get('ma-tran-lien-ket-plo-pi-hp/{id_khung}', 'DeCuongChiTiet@getMaTranLienKetPloPiHp');

        Route::get('ma-tran-lien-ket-plo-pi-clo/{id_khung}/{id_hocphan}', 'DeCuongChiTiet@getMaTranLienKetPloPiClo');

        Route::get('ma-tran-lien-ket-po-plo/{id_khung}', 'DeCuongChiTiet@getMaTranLienKetPoPlo');

        //Khung chuong trinh
        Route::get('them-khung-chuong-trinh', 'DeCuongChiTiet@getThemKhungChuongTrinh');
        Route::post('them-khung-chuong-trinh', 'DeCuongChiTiet@postThemKhungChuongTrinh');

        Route::get('sua-khung-chuong-trinh/{id_khung}', 'DeCuongChiTiet@getSuaKhungChuongTrinh');
        Route::post('sua-khung-chuong-trinh/{id_khung}', 'DeCuongChiTiet@postSuaKhungChuongTrinh');

        Route::get('nhan-ban-khung-chuong-trinh/{id_khung}', 'DeCuongChiTiet@getNhanBanKhungChuongTrinh');


        Route::get('check-tiep-tuc-sao-chep-cac-hang-muc-khung-chuong-trinh', 'KhungChuongTrinh@getTiepTucSaoChepCacHangMucKhungChuongTrinh');
        Route::get('tien-hanh-sao-chep-cac-hang-muc-khung-chuong-trinh', 'KhungChuongTrinh@getTienHanhSaoChepCacHangMucKhungChuongTrinh');
        
        Route::get('xoa-noi-dung-ctdt', 'KhungChuongTrinh@getXoaNoiDungCTDT');

        Route::get('xoa-ctdt', 'KhungChuongTrinh@getXoaCTDT');


        Route::get('test', 'KhungChuongTrinh@test123');
    });

    Route::get('/', 'KhungChuongTrinh@chuongtrinhdaotao_layout');
    Route::get('/chuong-trinh-dao-tao', 'KhungChuongTrinh@chuongtrinhdaotao_layout');
    Route::get('/chuong-trinh-dao-tao/nganh/{id_khoa}', 'KhungChuongTrinh@nganh_chuongtrinhdaotao');

 });