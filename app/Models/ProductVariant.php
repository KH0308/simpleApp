<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'table_product_variant';

    protected $fillable =
    [
        'productID',
        'size',
        'color',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class, 'color');
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class, 'size');
    }
}
