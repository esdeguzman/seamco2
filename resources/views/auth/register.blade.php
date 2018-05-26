<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('css/bootstrap-4.1.0.css') }}"crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker3.min.css') }}">

        <style>
            body {
                font-size: .875rem;
            }

            .feather {
                width: 16px;
                height: 16px;
                vertical-align: text-bottom;
            }

            /*
            * Sidebar
            */

            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100; /* Behind the navbar */
                padding: 72px 0 0; /* Height of navbar */
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            }

            .sidebar-sticky {
                position: relative;
                top: 0;
                height: calc(100vh - 48px);
                padding-top: .5rem;
                overflow-x: hidden;
                overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
            }

            @supports ((position: -webkit-sticky) or (position: sticky)) {
                .sidebar-sticky {
                    position: -webkit-sticky;
                    position: sticky;
                }
            }

            .sidebar .nav-link {
                font-weight: 500;
                color: #333;
            }

            .sidebar .nav-link .feather {
                margin-right: 4px;
                color: #999;
            }

            .sidebar .nav-link.active {
                color: #007bff;
            }

            .sidebar .nav-link:hover .feather,
            .sidebar .nav-link.active .feather {
                color: inherit;
            }

            .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
            }

            /*
            * Content
            */

            [role="main"] {
                padding-top: 72px; /* Space for fixed navbar */
            }

            /*
            * Navbar
            */

            .navbar-brand {
                padding-top: .75rem;
                padding-bottom: .75rem;
                font-size: 1rem;
                background-color: rgba(0, 0, 0, .25);
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
            }

            .navbar .form-control {
                padding: .75rem 1rem;
                border-width: 0;
                border-radius: 0;
            }

            .form-control-dark {
                color: #fff;
                background-color: rgba(255, 255, 255, .1);
                border-color: rgba(255, 255, 255, .1);
            }

            .form-control-dark:focus {
                border-color: transparent;
                box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
            }

            /*
            * Utilities
            */

            .border-top { border-top: 1px solid #e5e5e5; }
            .border-bottom { border-bottom: 1px solid #e5e5e5; }

        </style>


        <title>Register</title>
    </head>
    <body class="bg-light ">

        <div class="container">
            <div class="py-5 text-center">
                <h2>Seafarers Mighty Credit Cooperative</h2>
                <p class="lead">Your Trusted Partner in Advancing Economic & Quality of Life</p>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 pr-4">
                    <h1 class="mb-3">Terms and Condition</h1>

                    <p class="lead text-secondary text-justify">
                        I hereby apply for membership in <span class="text-primary">SEAFARERS MIGHTY CREDIT COOPERATIVE (<strong>SEAMCO</strong>)</span>
                        and agree to faithfully obey its rules and regulation as set down in its by-laws and
                        amendments thereof and the decision of the general membership as well as those of the
                        directors.
                    </p>
                    <p class="lead text-secondary text-justify">
                        I hereby pledge to subscribe <strong class="text-dark">TWO HUNDRED FIFTY (250) SHARES</strong> with a total value of
                        <strong class="text-dark">TWENTY-FIVE THOUSAND PESOS (25,000.00)</strong>. I also pledge to pay <i class="text-danger">at least twenty-five percent (25%)</i>
                         of my subscription and <strong class="text-dark">ONE THOUSAND PESOS (1,000.00)</strong> membership fee upon this application.
                    </p>
                    <p class="lead text-secondary text-justify">
                        I agree that the <i class="text-danger">minimum monthly contribution</i> to the share capital is <strong class="text-dark">FIVE HUNDRED PESOS (500.00)</strong>
                        and I will continue to pay this amount until I have paid <strong class="text-dark">TWENTY-FIVE THOUSAND PESOS (25,000.00)</strong>.
                        Payments made by me in excess of my share capital of P25, 000.00 will be considered as my savings
                        deposits.
                    </p>
                    <p class="lead text-secondary text-justify">
                        It is understood that <i class="text-danger">I cannot withdraw</i> my share capital during my membership. In case of withdrawal
                        of membership the <i class="text-danger">amount of P1000.00 shall be retained</i> from my share capital and will be credited to
                        withdrawal income of <strong class="text-dark">SEAMCO</strong> should I fail to revive my membership within 12 months by putting up a
                        fresh share capital.
                    </p>
                    <p class="lead text-secondary text-justify">
                        It is finally understood that withdrawal of membership is subject for the approval of the
                        <strong class="text-dark">Board of Directors</strong> prior release of my share capital.
                    </p>
                </div>

                <div class="col-md-6">
                    <h4 class="mb-3">Applicant Information</h4>
                    <form class="needs-validation" action="{{ route('register') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full Name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
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
                                <label for="gender">Gender *</label>
                                <select class="custom-select d-block w-100" name="gender" id="gender">
                                    <option value="">Choose...</option>
                                    <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                    <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <small class="text-danger">* {{ $errors->first('gender') }}</small><br>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="civil-status">Civil Status *</label>
                                <select class="custom-select d-block w-100" name="civil_status" id="civil-status">
                                    <option value="">Choose...</option>
                                    <option value="single" @if(old('civil_status') == 'single') selected @endif>Single</option>
                                    <option value="married" @if(old('civil_status') == 'married') selected @endif>Married</option>
                                    <option value="widow" @if(old('civil_status') == 'widow') selected @endif>Widow</option>
                                    <option value="widower" @if(old('civil_status') == 'widower') selected @endif>Widower</option>
                                </select>
                                @if ($errors->has('civil_status'))
                                    <small class="text-danger">* {{ $errors->first('civil_status') }}</small><br>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="birthday">Birthday *</label>
                            <input type="text" class="form-control datepicker" name="birthday" id="birthday" placeholder="YYYY-MM-DD" value="{{ old('birthday') }}">
                            @if ($errors->has('birthday'))
                                <small class="text-danger">* {{ $errors->first('birthday') }}</small><br>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mobile-no">Mobile #</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile-no" value="{{ old('mobile_number') }}" placeholder="09XXXXXXXXX">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tin">TIN</label>
                                <input type="text" class="form-control" name="tax_identification_number" id="tin" value="{{ old('tax_identification_number') }}">
                                <small class="text-muted">12-digit tin (for 9-digit, add '000' at the end)</small><br>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="present-address">Present Address *</label>
                            <textarea class="form-control" name="present_address" id="present-address" rows="3">{{ old('present_address') }}</textarea>
                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                        </div>

                        <div class="mb-3">
                            <label for="permanent-address">Permanent Address</label>
                            <textarea class="form-control" name="permanent_address" id="permanent-address" rows="3">{{ old('permanent_address') }}</textarea>
                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                        </div>

                        <hr class="mb-4">

                        <h4 class="mb-3">Employment</h4>
                        <div class="mb-3">
                            <label for="employer">Employer</label>
                            <input type="text" class="form-control" name="employer" id="employer" value="{{ old('employer') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" name="department" id="department" value="{{ old('department') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="employer-address">Address of Employer</label>
                            <textarea class="form-control" name="employer_address" id="employer-address" rows="3">{{ old('employer_address') }}</textarea>
                            <small class="text-muted">Unit/Street/Village/Baranggay/City</small><br>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="employment-date">Date of Employment</label>
                                <input type="text" class="form-control datepicker" name="employment_date" id="employment-date" placeholder="YYYY-MM-DD" value="{{ old('employment_date') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="salary">Salary</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="source-of-income">Other Source of Income</label>
                                <input type="text" class="form-control" name="other_source_of_income" id="source-of-income">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="salary"># of Dependents</label>
                                <input type="text" class="form-control " name="number_of_dependents" id="employment-date">
                            </div>
                        </div>

                        <hr class="mb-4">

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="terms" name="terms_and_condition" @if(old('terms_and_condition')) checked @endif>
                            <label class="custom-control-label" for="terms">
                                I hereby state that I have read, understand and accept the terms and conditions above.
                            </label>
                            @if ($errors->has('terms_and_condition'))
                                <small class="text-danger">* You must accept the Terms and Condition}</small><br>
                            @endif
                        </div>

                        <hr class="mb-4">

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue Application</button>
                    </form>
                </div>

            </div>
            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2018 SEAMCO</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Thrift</a></li>
                    <li class="list-inline-item"><a href="#">Respect</a></li>
                    <li class="list-inline-item"><a href="#">Unity</a></li>
                    <li class="list-inline-item"><a href="#">Service</a></li>
                    <li class="list-inline-item"><a href="#">Transparency</a></li>
                </ul>
            </footer>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ url('js/jquery-3.3.1.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('js/popper.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('js/bootstrap-4.1.0.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('js/feather.js') }}"></script>
        <script src="{{ url('js/bootstrap-datepicker.min.js') }}">

        </script>

        <script>
            $(function() {
                feather.replace()
                $('.datepicker').datepicker({
                    format: "yyyy-mm-dd"
                });
            });
        </script>

    </body>
</html>
