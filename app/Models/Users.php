<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable =[
        'name',
        'email',
        'password',
        'type',
        'branch',
        'status',
    ];
    use HasFactory;
}
