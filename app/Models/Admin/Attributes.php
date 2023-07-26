<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attributes extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "attributes";
    protected $fillable = [
        'id', 'name', 'value'
    ];
    public function products(){
        return $this->belongsToMany(Products::class,'products_attributes');
    }
}
