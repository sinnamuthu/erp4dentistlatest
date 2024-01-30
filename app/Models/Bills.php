<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';
    protected $primarykey = 'bill_id';
    protected $fillable =[
        'record_id',
        'bill_no',
        'bill_date',
        'treatment_cost',
        'discount',
        'tot_additional_cost',
        'other_charges_reason',
        'other_charges',
        'bill_amount',
        'advance_amount',
        'balance_amt',
        'appo_id',
        'branch',

    ];
    use HasFactory;
}
