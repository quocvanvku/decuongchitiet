<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nghiencuukhoahocloai2 extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_tacgia','tensach','id_cactacgia','lachubien','sochubien','namxuatban','nhaxuatban','hinhanhminhchung','trangthaiduyet','namhoc','id_hoatdong'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_nghiencuukhoahoc_loai2';
}
