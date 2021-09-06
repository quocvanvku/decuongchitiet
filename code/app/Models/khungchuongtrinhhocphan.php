<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khungchuongtrinhhocphan extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','stt','hocky','id_khung','id_hocphan','id_hocphan_thaythe','tienquyet', 'hoctruoc','songhanh','tuchon','da_chuyennganh','da_totnghiep','khoikienthuc'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_khungchuongtrinh_hocphan';

}
