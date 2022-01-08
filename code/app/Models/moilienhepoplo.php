<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moilienhepoplo extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id','id_po','id_plo','id_khung'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'table_moilienhe_po_plo';
}
