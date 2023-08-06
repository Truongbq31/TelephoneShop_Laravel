<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    protected $fillable = [
        'id', 'products_id','order_id','total_price','quantity','status'
    ];
}
