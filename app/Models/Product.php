<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'precio_venta',
        'stock',
        'categorie_id',
        'brand_id'
    ];
}
