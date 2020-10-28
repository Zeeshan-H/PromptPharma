<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    use HasFactory;

    protected $table = 'brand_images';

    protected $primaryKey = 'image_id';

    protected $fillable = ['image_path', 'brand_id'];

    public function brands() {
        
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
}
