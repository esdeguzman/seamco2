<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Admin extends Model
{
    protected $table = 'admins';
    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
