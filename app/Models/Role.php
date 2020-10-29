<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $dates = ['deleted_at'];

    protected $table = 'roles';

    protected $primaryKey = 'id';

    public function users() {

        return $this->hasMany('App\Models\User');
    }
}
