<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = ['title', 'desc', 'map_link', 'address'];

    public function images() {
        return $this->hasMany('App\Models\BrandImage');
    }

    public function products() {

        return $this->hasMany('App\Models\Product');
    }


}
