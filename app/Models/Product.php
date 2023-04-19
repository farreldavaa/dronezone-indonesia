<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['created_at', 'updated_at'];

    protected $appends = ['product_image'];

    //define accessor
    public function getProductImageAttribute()
    {
        return json_decode($this->image)->data->url;
    }
}
