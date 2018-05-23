<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Admin;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    /**
     * Returns the full name of the user depending of its type
     *
     * @return string
     */
    public function fullName()
    {
        if ($this->isAdmin()) {
            return $this->admin->first_name . ' ' . $this->admin->last_name;
        } else {
            return 'Member Name';
        }
    }

    /**
     * Determines wether the user is Admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->type == 'admin';
    }
}
