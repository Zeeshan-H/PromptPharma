<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'desc', 'quantity', 'discount', 'tax', 'category_id', 'brand_id'];

    protected $primaryKey = 'id';

    public function categories() 
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brands() {

        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function images() {

        return $this->hasMany('App\Models\ProductImage');
    }
}
