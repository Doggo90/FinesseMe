<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'amount', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
