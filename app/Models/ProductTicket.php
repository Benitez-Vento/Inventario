<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'precio_compra',
        'product_id'
    ];
}
