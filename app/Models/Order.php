<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'id';

    protected $fillable = [

        'customer_id', 
        'order_number', 
        'reference',
        'shipping_fname',
        'shipping_lname',
        'shipping_address',
        'city',
        'zipcode',
        'shipping_email',
        'phone',
        'status',
        'total_qty',
        'total_price',
        'shipping_fee'
    ];

    public function users() {

        return $this->belongsTo('App\Models\User', 'id');
    }
}
