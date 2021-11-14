<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuandaurachungchitiet extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_cdr_chitiet','noidung_cdr_chitiet','id_cdr_chung'
    ];
    protected $primaryKey = 'id_cdr_chitiet';
 	protected $table = 'table_chuandaura_chung_chitiet';
}
