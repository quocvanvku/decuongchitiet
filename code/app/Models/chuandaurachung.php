<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuandaurachung extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_cdr_chung','ten_plo','noidung_cdr_chung','id_khungchuongtrinh'
    ];
    protected $primaryKey = 'id_cdr_chung';
 	protected $table = 'table_chuandaura_chung';
}
