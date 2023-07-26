<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends Model
{
    use HasFactory;
    protected $table = 'products_attributes';
    protected $fillable = [
        'products_id',
        'attributes_id',
    ];

}
