<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function products () {
        return $this->hasMany('App\Models\Product');
        # hasOne
    }
    public function purchase_transactions () {
        return $this->hasMany('App\Models\PurchaseTransaction');
    }
}
