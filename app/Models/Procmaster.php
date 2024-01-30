<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procmaster extends Model
{
    protected $table = 'proc_master';
    protected $primarykey = 'prc_master_id';
    protected $fillable =[
        'sno',
        'centre_id',
        'proc',
        'type',
        'cost_price',
        'eff_date',
    ];
    use HasFactory;
}
