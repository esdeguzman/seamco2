@extends('layouts.main')

@section('page-title')
    Members
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('nav-item-members')
    active
@endsection


@section('page-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <!-- START PAGE CONTENT HEADER -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Members</h1>
        </div>
        <!-- END PAGE CONTENT HEADER -->

        <!-- START PAGE CONTENT BODY -->
        <div class="container">

            <div class="row mb-4">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Member Details</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Membership Application</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Loans</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Shares</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                            <div class="card mb-3">
                                <h6 class="card-header" style="background: none">Member Details</h6>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('register') }}" method="POST">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="firstName">Full Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') ?: $member->first_name }}">
                                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') ?: $member->middle_name }}">
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') ?: $member->last_name }}">
                                                </div>
                                                @if ($errors->has('first_name'))
                                                    <small class="text-danger">* {{ $errors->first('first_name') }}</small><br>
                                                @endif
                                                @if ($errors->has('last_name'))
                                                    <small class="text-danger">* {{ $errors->first('last_name') }}</small><br>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="gender">Gender</label>
                                                <select class="custom-select d-block w-100" name="gender" id="gender">
                                                    @if ($errors->any())
                                                        <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                                        <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                                    @else
                                                        <option value="male" @if($member->gender == 'male') selected @endif>Male</option>
                                                        <option value="female" @if($member->gender == 'female') selected @endif>Female</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <small class="text-danger">* {{ $errors->first('gender') }}</small><br>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="civil-status">Civil Status</label>
                                                <select class="custom-select d-block w-100" name="civil_status" id="civil-status">
                                                    @if ($errors->any())
                                                        <option value="single" @if(old('civil_status') == 'single') selected @endif>Single</option>
                                                        <option value="married" @if(old('civil_status') == 'married') selected @endif>Married</option>
                                                        <option value="widow" @if(old('civil_status') == 'widow') selected @endif>Widow</option>
                                                        <option value="widower" @if(old('civil_status') == 'widower') selected @endif>Widower</option>
                                                    @else
                                                        <option value="single" @if($member->civil_status == 'single') selected @endif>Single</option>
                                                        <option value="married" @if($member->civil_status == 'married') selected @endif>Married</option>
                                                        <option value="widow" @if($member->civil_status == 'widow') selected @endif>Widow</option>
                                                        <option value="widower" @if($member->civil_status == 'widower') selected @endif>Widower</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('civil_status'))
                                                    <small class="text-danger">* {{ $errors->first('civil_status') }}</small><br>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="birthday">Birthday *</label>
                                            <input type="text" class="form-control datepicker" name="birthday" id="birthday" placeholder="YYYY-MM-DD" value="{{ old('birthday') ?: $member->birthday }}">
                                            @if ($errors->has('birthday'))
                                                <small class="text-danger">* {{ $errors->first('birthday') }}</small><br>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="mobile-no">Mobile #</label>
                                                <input type="text" class="form-control" name="mobile_number" id="mobile-no" value="{{ old('mobile_number') ?: $member->mobile_number }}" placeholder="09XXXXXXXXX">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="tin">TIN</label>
                                                <input type="text" class="form-control" name="tax_identification_number" id="tin" value="{{ old('tax_identification_number') ?: $member->tax_identification_number }}">
                                                <small class="text-muted">12-digit tin (for 9-digit, add '000' at the end)</small><br>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="present-address">Present Address *</label>
                                            <textarea class="form-control" name="present_address" id="present-address" rows="3">{{ old('present_address') ?: $member->present_address }}</textarea>
                                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                                        </div>

                                        <div class="mb-3">
                                            <label for="permanent-address">Permanent Address</label>
                                            <textarea class="form-control" name="permanent_address" id="permanent-address" rows="3">{{ old('permanent_address') ?: $member->permanent_address }}</textarea>
                                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                                        </div>

                                        <hr class="mb-4">

                                        <div class="mb-3">
                                            <label for="employer">Employer</label>
                                            <input type="text" class="form-control" name="employer" id="employer" value="{{ old('employer') ?: $member->employer }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" name="position" id="position" value="{{ old('position') ?: $member->position }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="department">Department</label>
                                                <input type="text" class="form-control" name="department" id="department" value="{{ old('department') ?: $member->department }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="employer-address">Address of Employer</label>
                                            <textarea class="form-control" name="employer_address" id="employer-address" rows="3">{{ old('employer_address') ?: $member->employer_address }}</textarea>
                                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="employment-date">Date of Employment</label>
                                                <input type="text" class="form-control datepicker" name="employment_date" id="employment-date" placeholder="YYYY-MM-DD" value="{{ old('employment_date') ?: $member->employment_date }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="salary">Salary</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary') ?: $member->salary }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="source-of-income">Other Source of Income</label>
                                                <input type="text" class="form-control" name="other_source_of_income" id="source-of-income" value="{{ old('other_source_of_income') ?: $member->other_source_of_income }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="number-of-dependents"># of Dependents</label>
                                                <input type="text" class="form-control " name="number_of_dependents" id="number-of-dependents" value="{{ old('number_of_dependents') ?: $member->number_of_dependents }}">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

                            <ul class="list-group">
                                <li class="list-group-item pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline ">Application Status</h5>
                                        @if ($member->membershipApplication->status() == 'approved')
                                            <button type="button" class="btn btn-sm btn-success" disabled>APPROVED</button>
                                        @elseif($member->membershipApplication->status() == 'disapproved')
                                            <button type="button" class="btn btn-sm btn-danger" disabled>DISAPPROVED</button>
                                        @else
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal-application-status-approve">Approve</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal-application-status-disapprove">Disapprove</button>
                                            </div>
                                        @endif
                                    </div>

                                    <p>
                                        @if ($member->membershipApplication->status() == 'approved')
                                            <span class="text-muted">Approved By: </span>{{ $member->membershipApplication->approvedBy->fullName() }}<br>
                                            <span class="text-muted">On: </span>{{ $member->membershipApplication->approved_at->toFormattedDateString() }}
                                        @elseif ($member->membershipApplication->status() == 'disapproved')
                                            <span class="text-muted">Disapproved By: </span>{{ $member->membershipApplication->disapprovedBy->fullName() }}<br>
                                            <span class="text-muted">On: </span>{{ $member->membershipApplication->disapproved_at->toFormattedDateString() }}<br>
                                            <span class="text-muted">Reason for disapproval: </span>{{ $member->membershipApplication->disapproval_reason }}
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline">PMES Attendance</h5>
                                        @if ($member->membershipApplication->attended_pmes_at)
                                            <button type="button" class="btn btn-sm btn-success" disabled>VERIFIED</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-secondary" {{ $member->membershipApplication->status() != 'approved' ? 'disabled' : '' }}
                                                data-toggle="modal" data-target="#modal-verify-pmes-attendance">Verify</button>
                                        @endif
                                    </div>
                                    <p>
                                        @if ($member->membershipApplication->attended_pmes_at)
                                            <span class="text-muted">Verified By: </span>{{ $member->membershipApplication->attendanceVerifiedBy->fullName() }}<br>
                                            <span class="text-muted">On: </span>{{ $member->membershipApplication->attended_pmes_at->toFormattedDateString() }}
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline">Inform About Fees</h5>
                                        @if ($member->membershipApplication->fees_informed_at)
                                            <button type="button" class="btn btn-sm btn-success" disabled>VERIFIED</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-secondary" {{ is_null($member->membershipApplication->attended_pmes_at) ? 'disabled' : '' }}
                                                data-toggle="modal" data-target="#modal-verify-inform-fees">Verify</button>
                                        @endif
                                    </div>
                                    <p>
                                        @if ($member->membershipApplication->fees_informed_at)
                                            <span class="text-muted">Verified By: </span>{{ $member->membershipApplication->feesInformedBy->fullName() }}<br>
                                            <span class="text-muted">On: </span>{{ $member->membershipApplication->fees_informed_at->toFormattedDateString() }}
                                        @endif
                                    </p>
                                </li>
                                <li class="list-group-item pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline">Release ID</h5>
                                        @if ($member->membershipApplication->id_released_at)
                                            <button type="button" class="btn btn-sm btn-success" disabled>VERIFIED</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-secondary" {{ is_null($member->membershipApplication->fees_informed_at) ? 'disabled' : '' }}
                                                data-toggle="modal" data-target="#modal-verify-id-release">Verify</button>
                                        @endif
                                    </div>
                                    @if ($member->membershipApplication->id_released_at)
                                        <span class="text-muted">Verified By: </span>{{ $member->membershipApplication->idReleasedBy->fullName() }}<br>
                                        <span class="text-muted">On: </span>{{ $member->membershipApplication->id_released_at->toFormattedDateString() }}
                                    @endif
                                </li>
                                <li class="list-group-item pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline">Give Share Certificate</h5>
                                        @if ($member->membershipApplication->share_certificate_given_at)
                                            <button type="button" class="btn btn-sm btn-success" disabled>VERIFIED</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-secondary" {{ is_null($member->membershipApplication->fees_informed_at) ? 'disabled' : '' }}
                                                data-toggle="modal" data-target="#modal-verify-give-share-certificate">Verify</button>
                                        @endif
                                    </div>
                                    @if ($member->membershipApplication->share_certificate_given_at)
                                        <span class="text-muted">Verified By: </span>{{ $member->membershipApplication->shareCertificateGivenBy->fullName() }}<br>
                                        <span class="text-muted">On: </span>{{ $member->membershipApplication->share_certificate_given_at->toFormattedDateString() }}
                                    @endif
                                </li>
                            </ul>

                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"></div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->
    </main>

    <!-- START APPLICATION STATUS APPROVE MODAL -->
    <div class="modal fade" id="modal-application-status-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.approve', $member->id) }}" method="post">
                    {{ csrf_field() }}


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve Membership Application from <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Approve</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END APPLICATION STATUS APPROVE MODAL -->

    <!-- START APPLICATION STATUS DISAPPROVE MODAL -->
    <div class="modal fade" id="modal-application-status-disapprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.disapprove', $member->id) }}" method="post">
                    {{ csrf_field() }}


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="disapproval-reason">Reason for disapproval *</label>
                        <textarea class="form-control" name="disapproval_reason" id="disapproval-reason" rows="3" required></textarea>
                        <small class="text-muted"></small><br>
                    </div>
                    <p>Are you sure you want to disapprove Membership Application from <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Disapprove</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END APPLICATION STATUS DISAPPROVE MODAL -->

    <!-- START PMES ATTENDANCE MODAL -->
    <div class="modal fade" id="modal-verify-pmes-attendance" tabindex="-1" role="dialog" aria-labelledby="modal-verify-pmes-attendance" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.verify-pmes-attendance', $member->id) }}" method="post">
                    {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to verify PMES Attendance from <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END PMES ATTENDANCE MODAL -->

    <!-- START INFORM FEES MODAL -->
    <div class="modal fade" id="modal-verify-inform-fees" tabindex="-1" role="dialog" aria-labelledby="modal-verify-inform-fees" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.verify-fees-inform', $member->id) }}" method="post">
                    {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to verify that the fees has been informed to <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END INFORM FEES MODAL -->

    <!-- START ID RELEASE MODAL -->
    <div class="modal fade" id="modal-verify-id-release" tabindex="-1" role="dialog" aria-labelledby="modal-verify-id-release" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.verify-id-release', $member->id) }}" method="post">
                    {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to verify that the ID has been released to <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END ID RELEASE MODAL -->

    <!-- START GIVE SHARE CERTIFICATE MODAL -->
    <div class="modal fade" id="modal-verify-give-share-certificate" tabindex="-1" role="dialog" aria-labelledby="modal-verify-give-share-certificate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.members.verify-give-share-certificate', $member->id) }}" method="post">
                    {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to verify that the Share Certificate has been given to <b>{{ $member->fullName() }}</b>?</p>
                    <p>You cannot undo this action.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END GIVE SHARE CERTIFICATE MODAL -->

@endsection

@section('scripts')
    <script src="{{ url('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function() {
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd"
            });
        });
    </script>
@endsection
