@extends('layouts.main')

@section('page-title')
    Loans
@endsection

@section('nav-item-member-loans')
    active
@endsection

@section('page-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <!-- START PAGE CONTENT HEADER -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Loans</h1>
        </div>
        <!-- END PAGE CONTENT HEADER -->

        <!-- START PAGE CONTENT BODY -->
        <div class="card mb-3">
            <h5 class="card-header" style="background: none">New Loan Application</h5>
            <div class="card-body">
                <p class="card-text">New, Approved and Paid Loans</p>
            </div>
            <div class="card-body">

                <form class="needs-validation" action="{{ route('member.loans.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="col-md-12 mb-3">
                        <h4 class="mb-3">Requested Amount <span class="text-muted"><small>A minimum of one (1) loan request amount is required</small> </span> </h4>
                        <input type="text" class="form-control" name="regular" placeholder="Regular" value="{{ old('regular') }}">
                        <input type="text" class="form-control mt-3" name="short_term" placeholder="Short Term" value="{{ old('short_term') }}">
                        <input type="text" class="form-control mt-3" name="pre_joining" placeholder="Pre-Joining" value="{{ old('pre_joining') }}">
                        <input type="text" class="form-control mt-3" name="productive" placeholder="Productive" value="{{ old('productive') }}">
                        <input type="text" class="form-control mt-3" name="special" placeholder="Special" value="{{ old('special') }}">
                        <input type="text" class="form-control mt-3" name="appliance" placeholder="Appliance" value="{{ old('appliance') }}">
                        <input type="text" class="form-control mt-3" name="petty_cash" placeholder="Appliance" value="{{ old('petty_cash') }}">
                        @if ($errors->has('regular'))
                            <small class="text-danger">* {{ $errors->first('regular') }}</small><br>
                        @endif
                        <hr class="mb-4">
                    </div>

                    <div class="col-md-12 mb-3">
                        <h4 class="mb-3">Payment Terms</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                            <input id="month-6" name="payment_terms" type="radio" class="custom-control-input" value="6" checked required>
                            <label class="custom-control-label" for="month-6">6 Months</label>
                            </div>
                            <div class="custom-control custom-radio">
                            <input id="month-12" name="payment_terms" type="radio" class="custom-control-input" value="12" required>
                            <label class="custom-control-label" for="month-12">12 Months</label>
                            </div>
                            @if ($errors->has('payment_terms'))
                                <small class="text-danger">* {{ $errors->first('payment_terms') }}</small><br>
                            @endif
                        </div>

                        <hr class="mb-4">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Co-maker *</label>
                        <select class="custom-select d-block w-100" name="co_maker_id" id="co_maker_id">
                            <option value="">Choose...</option>
                            @foreach ($members as $key => $member)
                                <option value="{{ $member->id }}" @if(old('co_maker_id') == $member->id) selected @endif>{{ $member->fullName() }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('co_maker_id'))
                            <small class="text-danger">* {{ $errors->first('co_maker_id') }}</small><br>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Company Contact Number *</label>
                        <input type="text" class="form-control" name="company_contact_number" value="{{ old('company_contact_number') }}">
                        @if ($errors->has('company_contact_number'))
                            <small class="text-danger">* {{ $errors->first('company_contact_number') }}</small><br>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Monthly Income *</label>
                        <input type="text" class="form-control" name="monthly_income" value="{{ old('monthly_income') }}">
                        @if ($errors->has('monthly_income'))
                            <small class="text-danger">* {{ $errors->first('monthly_income') }}</small><br>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Take Home Pay *</label>
                        <input type="text" class="form-control" name="take_home_pay" value="{{ old('take_home_pay') }}">
                        @if ($errors->has('take_home_pay'))
                            <small class="text-danger">* {{ $errors->first('take_home_pay') }}</small><br>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>SSS / GSIS *</label>
                        <input type="text" class="form-control" name="sss_gsis" value="{{ old('sss_gsis') }}">
                        @if ($errors->has('sss_gsis'))
                            <small class="text-danger">* {{ $errors->first('sss_gsis') }}</small><br>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Residence Telephone Number *</label>
                        <input type="text" class="form-control" name="residence_telephone_number" value="{{ old('residence_telephone_number') }}">
                        @if ($errors->has('residence_telephone_number'))
                            <small class="text-danger">* {{ $errors->first('residence_telephone_number') }}</small><br>
                        @endif
                        <hr class="mb-4">
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-primary btn-block" type="submit">Submit Application</button>
                    </div>

                </form>

            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->

    </main>
@endsection
