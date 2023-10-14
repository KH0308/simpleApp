<?php

namespace App\Models;

use App\Models\ProductType;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'table_product';

    protected $fillable =
    [
        'prdName',
        'prdCtgy',
        'prdPrc',
        'prdRtg'
    ];

    public function productCtgy()
    {
        return $this->belongsTo(ProductType::class, 'prdCtgy');
    }

    public function productVrt()
    {
        return $this->hasMany(ProductVariant::class, 'productID');
    }

}
