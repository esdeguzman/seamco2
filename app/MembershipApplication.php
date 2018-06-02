<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Admin;

class MembershipApplication extends Model
{
    protected $table = 'membership_applications';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'approved_at' => 'date',
        'disapproved_at' => 'date',
        'attended_pmes_at' => 'date',
        'id_released_at' => 'date',
        'fees_informed_at' => 'date',
        'share_certificate_given_at' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function disapprovedBy()
    {
        return $this->belongsTo(Admin::class, 'disapproved_by');
    }

    public function attendanceVerifiedBy()
    {
        return $this->belongsTo(Admin::class, 'attendance_verified_by');
    }

    public function idReleasedBy()
    {
        return $this->belongsTo(Admin::class, 'id_released_by');
    }

    public function feesInformedBy()
    {
        return $this->belongsTo(Admin::class, 'fees_informed_by');
    }

    public function shareCertificateGivenBy()
    {
        return $this->belongsTo(Admin::class, 'share_certificate_given_by');
    }


    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Return membership application status depending on 'disapproved_at' and
     * 'approved_at' property
     *
     * @return string
     */
    public function status()
    {
        // if 'disapproved_at' has value means the application has been disapproved
        if (! is_null($this->disapproved_at)) {
            return 'disapproved';
        }

        if (! is_null($this->approved_at)) {
            return 'approved';
        } else {
            return 'unapproved';
        }
    }

    /**
     * Approve the membership application. Returns false if the user is not admin.
     *
     * @return boolean
     */
    public function approve()
    {
        // Veriy that the authenticated user is admin
        if (auth()->user()->isAdmin()) {
            $this->update([
                'approved_at' => \Carbon\Carbon::now(),
                'approved_by' => auth()->user()->id
            ]);

            return true;
        }

        return false;
    }

    /**
     * Disapprove the membership application. Returns false if the user is not admin.
     *
     * @param string
     * @return boolean
     */
    public function disapprove($reason)
    {
        if (auth()->user()->isAdmin()) {
            $this->update([
                'disapproved_at' => \Carbon\Carbon::now(),
                'disapproved_by' => auth()->user()->id,
                'disapproval_reason' => $reason
            ]);

            return true;
        }

        return false;
    }

    /**
     * Mark attended_pmes_at property. Returns false if the user is
     * not admin.
     *
     * @return boolean
     */
    public function markAttendanceAsVerified()
    {
        if (auth()->user()->isAdmin()) {
            $this->update([
                'attended_pmes_at' => \Carbon\Carbon::now(),
                'attendance_verified_by' => auth()->user()->id
            ]);

            return true;
        }
        return false;
    }

    /**
     * Mark fees_informed_at property. Returns false if the user is not admin.
     *
     * @return boolean
     */
    public function markFeesAsInformed()
    {
        if (auth()->user()->isAdmin()) {
            $this->update([
                'fees_informed_at' => \Carbon\Carbon::now(),
                'fees_informed_by' => auth()->user()->id
            ]);

            return true;
        }
        return false;
    }

    /**
     * Mark id_released_at property. Returns false if the user is not admin.
     *
     * @return boolean
     */
    public function markIDAsReleased()
    {
        if (auth()->user()->isAdmin()) {
            $this->update([
                'id_released_at' => \Carbon\Carbon::now(),
                'id_released_by' => auth()->user()->id
            ]);

            return true;
        }
        return false;
    }

    /**
     * Mark share_certificate_given_at property. Returns false if the user is
     * not admin.
     *
     * @return boolean
     */
    public function markShareCertificateAsGiven()
    {
        if (auth()->user()->isAdmin()) {
            $this->update([
                'share_certificate_given_at' => \Carbon\Carbon::now(),
                'share_certificate_given_by' => auth()->user()->id
            ]);

            return true;
        }
        return false;
    }


}
