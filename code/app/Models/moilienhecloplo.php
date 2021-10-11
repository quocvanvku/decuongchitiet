<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moilienhecloplo extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_chuandaura_chung','id_chuandaura_monhoc','mucdo','id_hocphan','khungchuongtrinh'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_decuongchitiet_moilienhe_clo_plo';
}
