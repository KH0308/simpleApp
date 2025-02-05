<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'table_category';

    protected $fillable =
    [
        'ctgyName',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

}
