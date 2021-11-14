<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nghiencuukhoahocloai1 extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','tenbaibao','id_tacgia','id_cactacgia','namxuatban','tentapchi','chiso_issn','loai','coquanxuatban','thuoctrang','hinhanhminhchung','trangthaiduyet','namhoc','id_hoatdong'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_nghiencuukhoahoc_loai1';
}
