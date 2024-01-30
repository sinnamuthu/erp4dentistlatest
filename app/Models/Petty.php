<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petty extends Model
{
   
    protected $table = 'petty';
    protected $primarykey = 'id';
    protected $fillable =[
        'branch',
        'credit',
        'debit',
        'petty_date',
        'particulars',
        'reamrks',
        'balance',
        'created_at',
        'updated_at',
    ];
    use HasFactory;
}
