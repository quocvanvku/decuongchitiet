<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khungchuongtrinh_khoiluongkienthuc_chitiet extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_khoiluongkienthuc','id_khung'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_khungchuongtrinh_khoiluongkienthuc_chitiet';
}
