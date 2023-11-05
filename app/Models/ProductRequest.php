<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;
    protected $table ='product_requests';
    protected $fillable =
    [
        'user_id',
        'product_id',
        'message',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
