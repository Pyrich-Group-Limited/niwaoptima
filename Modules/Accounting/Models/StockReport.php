<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'type',
        'type_id',
        'description',
    ];



    public function product()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductService', 'id', 'product_id');
    }

    //for export
    public static function products($product)
    {
        $categoryArr  = explode(',', $product);

        foreach ($categoryArr as $product)
        {
            $product    = ProductService::find($product);
            $categoryArr = isset($product) ? $product->name : "";
        }
        return $categoryArr;
    }



}
