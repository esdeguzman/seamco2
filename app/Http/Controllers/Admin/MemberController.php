<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display all Members
     *
     * @return Response
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show specific Member details
     *
     * @return Response
     */
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Approve the MembershipApplication of the Member
     *
     * @param  Member $member
     * @return Response
     */
    public function approve(Request $request, Member $member)
    {
        $member->membershipApplication->approve();

        session()->flash('notify', [
            'message' => 'Membership Application for ' . $member->fullName() . ' has been approved.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }

    /**
     * Disapprove the MembershipApplication of the Member
     *
     * @param Request $request
     * @param  Member $member
     * @return Response
     */
    public function disapprove(Request $request, Member $member)
    {
        $this->validate($request, ['disapproval_reason' => 'required']);

        $member->membershipApplication->disapprove($request->disapproval_reason);

        session()->flash('notify', [
            'message' => 'Membership Application for ' . $member->fullName() . ' has been disapproved.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }

    /**
     * Verify PMES Attendance of the Member
     *
     * @param  Member $member
     * @return Response
     */
    public function verifyPMESAttendance(Member $member)
    {
        $member->membershipApplication->markAttendanceAsVerified();

        session()->flash('notify', [
            'message' => 'PMES Attendance for ' . $member->fullName() . ' has been verified.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }

    /**
     * Verify that Fees has been informed to Member
     *
     * @param  Member $member
     * @return Response
     */
    public function verifyFeesInform(Member $member)
    {
        $member->membershipApplication->markFeesAsInformed();

        session()->flash('notify', [
            'message' => 'Information about fees for ' . $member->fullName() . ' has been verified.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }

    /**
     * Verify that ID has been released to Member
     *
     * @param  Member $member
     * @return Response
     */
    public function verifyIDRelease(Member $member)
    {
        $member->membershipApplication->markIDAsReleased();

        session()->flash('notify', [
            'message' => 'Release of ID for ' . $member->fullName() . ' has been verified.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }

    /**
     * Verify that Share certificate has been given to Member
     *
     * @param  Member $member
     * @return Response
     */
    public function verifyGiveShareCertificate(Member $member)
    {
        $member->membershipApplication->markShareCertificateAsGiven();

        session()->flash('notify', [
            'message' => 'Share Certificate for ' . $member->fullName() . ' has been verified.',
            'type' => 'success'
        ]);

        return redirect()->route('admin.members.show', $member->id);
    }
}
