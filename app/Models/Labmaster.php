<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labmaster extends Model
{
   
    protected $table = 'lab_master';
    protected $primaryKey = 'lab_id';
    protected $fillable =[ 
        'lab_name',
        'branch',
     
    ];
    use HasFactory;
}
