<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\MembershipApplication;

class Member extends Model
{
    protected $table = 'members';
    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeOnlyApprovedMembershipApplication($query)
    {
        // Filter the members table with only approved membership application
        return $query->whereHas('membershipApplication', function ($query) {
            $query->where('approved_at', '!=', null);
        });
    }

    public function scopeOnlyUnapprovedMembershipApplication($query)
    {
        // Filter the members table with only unapproved membership application
        return $query->whereHas('membershipApplication', function ($query) {
            $query->where('approved_at', '=', null);
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function membershipApplication()
    {
        return $this->hasOne(MembershipApplication::class, 'member_id');
    }


    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */
    public function fullName()
    {
        // We just call fullName method from the user model.
        return $this->user->fullName();
    }
}
