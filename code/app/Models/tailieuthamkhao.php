<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tailieuthamkhao extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','tentacgia','namxuatban','tensach','noixuatban','nhaxuatban','url','loaitailieu','id_hocphan','khungchuongtrinh'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_tailieuthamkhao';
}
