<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docpayout extends Model
{
 
    protected $table = 'doc_payout_master';
    protected $primaryKey = 'doc_payout_id';
    protected $fillable =[ 
        'centre_id',
        'doc_id',
        'proc',
        'type',
        'con_price',
        'eff_date',
    ];
    use HasFactory;
}
