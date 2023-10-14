<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'table_color';

    protected $fillable =
    [
        'id',
        'colorName'
    ];

    public function product()
    {
        return $this->hasMany(ProductVariant::class, 'productID');
    }

}
