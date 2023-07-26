<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $fillable = [
        "id", "name", "image", "price", "description", "category_id"
    ];
    public function attributes(){
        return $this->belongsToMany(Attributes::class,'products_attributes');
    }
}
