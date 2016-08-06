<?php

namespace Louis\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'age'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sales()
    {
        return $this->hasMany(\Louis\Models\Sale::class);
    }
}
