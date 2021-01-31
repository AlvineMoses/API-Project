<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    protected $table = 'orders';
    protected $fillable = ['id', 'user_id', 'address', 'name', 'payment_id'];
}
