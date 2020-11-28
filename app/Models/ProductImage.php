<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $primaryKey = 'image_id';

    protected $fillable = ['image_path', 'product_id'];

    public function products() {

        return $this->belongsTo('App\Models\Product', 'product_id');
    }


}
