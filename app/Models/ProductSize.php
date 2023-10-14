<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'table_size';

    protected $fillable =
    [
        'id',
        'sizeName'
    ];

    public function product()
    {
        return $this->hasMany(ProductVariant::class, 'productID');
    }

}
