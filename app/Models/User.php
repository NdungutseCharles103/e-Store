<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $fillable = [
        'u_name',
        'u_email',
        'u_phone',
        'u_address',
        'u_password',
    ];
    
}