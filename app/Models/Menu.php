<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'restaurant_id',
        'menu_name',
        'menu_img',
        'menu_price',
        'menu_detail',
        'menu_status'
    ];
}
