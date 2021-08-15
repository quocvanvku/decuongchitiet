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
        Route::get('chinh-sua-them-moi-de-cuong/{id_decuong}', 'DeCuongController@chinhsuathemmoi');
        Route::post('insert-chinh-sua-them-moi-de-cuong', 'DeCuongController@insert_chinhsuathemmoi');

        Route::get('them-moi-de-cuong', 'DeCuongController@themdecuong');
        //Route::get('danh-sach-de-cuong/{id_khoa}/{khungchuongtrinh}', 'DeCuongController@danhsachdecuong');
 
        //Ajax
        Route::get('dc-ten-hoc-phan', 'DeCuongAjax@ajtenhocphan');
        Route::get('dc-giang-vien-phu-trach', 'DeCuongAjax@ajgiangvienphutrach');
        Route::get('dc-giang-vien-day-cung', 'DeCuongAjax@ajgiangviendaycung');
        Route::get('select-nganh-aj', 'DeCuongAjax@ajselectnganh');
        Route::get('tim-kiem-de-cuong', 'DeCuongAjax@timkiemdecuong');
        Route::get('tim-kiem-de-cuong-them-moi', 'DeCuongAjax@timkiemdecuongthemmoi');

        Route::post('them-moi-de-cuong', 'DeCuongController@tao_decuong');

        Route::get('edit-de-cuong/{id_decuong}', 'DeCuongController@editdecuong');
        Route::post('sua-de-cuong/{id_decuong}', 'DeCuongController@sua_decuong');

        Route::get('delete-de-cuong/{id_decuong}', 'DeCuongController@xoa_decuong');

        Route::get('danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@danh_gia_hoc_phan');
        Route::post('danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@insert_danh_gia_hoc_phan');
        Route::get('edit-danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@edit_danh_gia_hoc_phan');
        Route::post('edit-danh-gia-hoc-phan/{id_decuong}', 'DeCuongController@insert_edit_danh_gia_hoc_phan');

        Route::get('ke-hoach-giang-day/{id_decuong}', 'DeCuongController@ke_hoach_giang_day');
        Route::post('ke-hoach-giang-day/{id_decuong}', 'DeCuongController@insert_ke_hoach_giang_day');
        Route::get('edit-ke-hoach-giang-day/{id_decuong}', 'DeCuongController@edit_ke_hoach_giang_day');
        Route::post('edit-ke-hoach-giang-day/{id_decuong}', 'DeCuongController@insert_edit_ke_hoach_giang_day');

        Route::get('xem-de-cuong/{id_decuong}', 'DeCuongController@xem_de_cuong');

        #chuan dau ra chung
        Route::get('danh-sach-chuan-dau-ra-chung/{id_nganh}', 'DeCuongController@chuan_dau_ra_chung');
        Route::get('sua-chuan-dau-ra-chung', 'DeCuongAjax@sua_chuan_dau_ra_chung');
        Route::get('xoa-chuan-dau-ra-chung', 'DeCuongAjax@xoa_chuan_dau_ra_chung');
        Route::get('them-chuan-dau-ra-chung', 'DeCuongAjax@them_chuan_dau_ra_chung');

        #Ke hoach giang day
        Route::get('up-khgd', 'DeCuongAjax@up_khgd');
        Route::get('down-khgd', 'DeCuongAjax@down_khgd');
        
        #khung chuong trinh
        Route::get('khung-chuong-trinh/{id_khungchuongtrinh}', 'DeCuongController@khungchuongtrinh');
        Route::get('de-cuong-khung-chuong-trinh', 'DeCuongAjax@decuong_khungchuongtrinh');
        Route::get('nhan-ban-de-cuong-khung-chuong-trinh', 'DeCuongAjax@nhanban_decuong_khungchuongtrinh');
        Route::get('tim-kiem-hoc-phan-khung-chuong-trinh', 'DeCuongAjax@timkiem_hocphan_khungchuongtrinh');
        Route::get('them-ke-hoach-giang-day-thu-gon/{id_hocphan}/{id_khung}', 'DeCuongController@them_kehoachgiangday_thugon');
        Route::post('them-ke-hoach-giang-day-thu-gon', 'DeCuongController@insert_them_kehoachgiangday_thugon');
        Route::get('sua-ke-hoach-giang-day-thu-gon/{id_hocphan}/{id_khung}', 'DeCuongController@sua_kehoachgiangday_thugon');
        Route::post('sua-ke-hoach-giang-day-thu-gon', 'DeCuongController@insert_sua_kehoachgiangday_thugon');
        Route::get('khgd-khung-chuong-trinh/{id_khungchuongtrinh}', 'DeCuongController@khgd_khungchuongtrinh');

        #khung chuong trinh hoc phan
        Route::get('danh-sach-khung-chuong-trinh-hoc-phan/{id_khungchuongtrinh}', 'DeCuongController@khungchuongtrinhhocphan');
        Route::get('them-hoc-phan-khung-chuong-trinh', 'DeCuongController@themhocphankhungchuongtrinh');
        Route::post('them-hoc-phan-khung-chuong-trinh', 'DeCuongController@insert_themhocphankhungchuongtrinh');
        Route::get('get-hoc-phan-kcthp', 'DeCuongAjax@get_hocphan_kcthp');
        Route::get('sua-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@suahocphankhungchuongtrinh');
        Route::post('sua-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@insert_suahocphankhungchuongtrinh');
        Route::get('xoa-hoc-phan-khung-chuong-trinh/{id_kct_hp}', 'DeCuongController@xoahocphankhungchuongtrinh');
        Route::get('up-kct-hp', 'DeCuongAjax@up_kct_hp');
        Route::get('down-kct-hp', 'DeCuongAjax@down_kct_hp'); 

        
    });

    Route::get('/', 'DeCuongController@admin_layout');

 });