<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Categorie;
use App\Models\Brand;

class Product extends Model
{
    protected $with = ['categorie','brand'];

    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'precio_venta',
        'stock',
        'categorie_id',
        'brand_id'
    ];

    public function categorie(): BelongsTo
    {
        return $this->BelongsTo(Categorie::class);
    }

    public function brand(): BelongsTo
    {
        return $this->BelongsTo(Brand::class);
    }
}
