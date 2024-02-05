<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'reciept';
    protected $primarykey = 'id';
    protected $fillable =[
        'reciept_date',
        'getbalance_amt',
        'getbill_id',
        'getappo_id',
        'getbranch',
        'choose_doctor',
        'paymethod',
        'created_at',
        'updated_at',
    ];
    use HasFactory;
}
