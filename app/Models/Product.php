<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';

    protected $fillable =
    [
        'cat_id',
        'product_name',
        'product_description',
        'product_img',
        'buying_date',
        'buying_price',
        'status',
    ];


    public function Category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function stock()
    {
        return $this->hasMany(Stock::class,'product_id','id');
    }
}
