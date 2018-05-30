@extends('layouts.main')

@section('page-title')
    Profile
@endsection

@section('page-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">

        <div class="container">
            <div class="row justify-center text-center mb-4" style="background: #eee;">
                <div class="col-12">
                    <img src="{{ auth()->user()->admin->photo_url }}" width="80" height="80" class="d-inline-block rounded-circle mt-4" alt="profile image">
                    <p class="h4 mt-3">{{ auth()->user()->fullName() }}</p>
                    <p class="text-muted">
                        {{ auth()->user()->admin->position }} @SEAMCO
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent">Account Details</h5>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <form>
                                        <div class="form-group">
                                            <label for="firstName">Full Name *</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') ?: auth()->user()->admin->first_name }}">
                                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') ?: auth()->user()->admin->middle_name }}">
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') ?: auth()->user()->admin->last_name }}">
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <small class="text-danger">* {{ $errors->first('first_name') }}</small><br>
                                            @endif
                                            @if ($errors->has('last_name'))
                                                <small class="text-danger">* {{ $errors->first('last_name') }}</small><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="civil-status">Position *</label>
                                            <select class="custom-select d-block w-100" name="position" id="civil-status">
                                                <option value="">Choose...</option>
                                                <option value="General Manager" @if(old('position') == 'General Manager') selected @endif>General Manager</option>
                                                <option value="Credit Committee" @if(old('position') == 'Credit Committee') selected @endif>Credit Committee</option>
                                                <option value="Chariman of the Board" @if(old('position') == 'Chariman of the Board') selected @endif>Chairman of the Board</option>
                                            </select>
                                            @if ($errors->has('position'))
                                                <small class="text-danger">* {{ $errors->first('position') }}</small><br>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="contact-number">Contact Number</label>
                                            <input type="text" class="form-control" id="contact-number" placeholder="09XXXXXXXXX" value="{{ old('contact_number') ?: auth()->user()->admin->contact_number }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="present-address">Address *</label>
                                            <textarea class="form-control" name="present_address" id="present-address" rows="3">{{ old('present_address') ?: auth()->user()->admin->address }}</textarea>
                                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
