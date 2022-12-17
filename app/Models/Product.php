<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'p_name',
        'p_qoh',
        'price',
        'p_type',
        'u_id',
    ];
    
}
?>