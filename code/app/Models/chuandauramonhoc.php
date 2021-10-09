<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuandauramonhoc extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','stt','noi_dung','id_hocphan','khungchuongtrinh'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_chuandaura_monhoc';
}
