<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khungchuongtrinh_muctieu extends Model
{ 
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','ten_po','noidung_po','id_khung'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_khungchuongtrinh_muctieu';
}
