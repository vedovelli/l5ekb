<?php

namespace Louis\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function user()
    {
        return $this->belongsTo(\Louis\Models\User::class);
    }
}
