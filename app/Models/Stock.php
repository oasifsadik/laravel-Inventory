<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table ='stocks';

    protected $fillable=
    [
        'product_id',
        'stock_date',
        'qty',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
