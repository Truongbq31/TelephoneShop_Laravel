<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProducts extends Model
{
    use HasFactory;
    protected $table = 'img_products';
    protected $fillable = [
        'id', 'id_products', 'images'
    ];
}
