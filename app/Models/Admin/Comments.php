<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'comments';
    protected $fillable = [
        'id', 'products_id', 'users_id', 'content'
    ];
}
