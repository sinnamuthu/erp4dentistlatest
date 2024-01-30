<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    protected $table = 'procedures';
    protected $primarykey = 'proc_id';
    protected $fillable =[
        'proc',
    ];
    use HasFactory;
}
