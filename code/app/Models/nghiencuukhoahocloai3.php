<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nghiencuukhoahocloai3 extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_tacgia','minhchung','hinhanhminhchung','trangthaiduyet','namhoc','id_hoatdong'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_nghiencuukhoahoc_loai3';
}
