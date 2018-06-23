@extends('layouts.main')

@section('page-title')
    Loans
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker3.min.css') }}">
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
        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <span>From</span><br><br>
                                    <strong>Seafarers Mighty Credit Cooperative</strong><br>
                                    <span class="small">2nd Floor, Hotel de Mercedes, Pelaez Street, Cebu City</span><br>
                                    <span class="small">Contact Nos: 09282683776 / 413 2230</span><br>
                                    <span class="small">Email: info@seamco.org</span>

                                </div>
                                <div class="col-4">
                                    <span>To</span><br><br>
                                    <strong>{{ $loan->member->fullName() }}</strong><br>
                                    <span class="small">{{ $loan->member->present_address }}</span><br>
                                    <span class="small">Contact Number: {{ $loan->member->mobile_number }}</span><br>
                                    <span class="small">Job Position: {{ $loan->member->position }}</span>
                                </div>
                                <div class="col-4">
                                    <span>Co Maker</span><br><br>
                                    <strong>{{ $loan->coMaker->fullName() }}</strong><br>
                                    <span class="small">{{ $loan->coMaker->present_address }}</span><br>
                                    <span class="small">Contact Number: {{ $loan->coMaker->mobile_number }}</span><br>
                                    <span class="small">Job Position: {{ $loan->coMaker->position }}</span>
                                </div>
                            </div>

                            <hr class="mb-4">

                            <div class="row">

                                <div class="col-12 my-4">
                                    <h5 class="text-center text-primary">{{ $loan->code }}</h5>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-6 mt-4">
                                    <strong>Payment Terms: </strong>6 months <br>
                                    <strong>Payment Due Date: </strong>Dec 24, 2018 <br>
                                    <strong>Company Contact Number: </strong>{{ $loan->company_contact_number }}<br>
                                    <strong>Monthly Income: </strong>{{ $loan->monthly_income }}<br>
                                    <strong>Take Home Pay: </strong>{{ $loan->take_home_pay }}<br>
                                    <strong>SSS / GSIS: </strong>{{ $loan->sss_gsis }}<br>
                                    <strong>Residence Telephone Number: </strong>{{ $loan->residence_telephone_number }}<br>
                                    <strong>Status : </strong><span class="text-uppercase">@component('components.loan-status'){{ $loan->status }}@endcomponent</span> <br>

                                </div>
                                <div class="col-6 mt-4">

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Regular
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->regular, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Short Term
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->short_term, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Pre Joining
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->pre_joining, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Productive
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->productive, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Special
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->special, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Appliance
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->appliance, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Petty Cash
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->petty_cash, 2) }}
                                                </td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <td class="align-middle text-left">
                                                    Total Requested Amount
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->total_requested_amount, 2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Approved Amount
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->total_amount_due, 2) }}<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-left">
                                                    Interest
                                                </td>
                                                <td class="align-middle text-right">
                                                    {{ number_format($loan->total_amount_due, 2) }}<br>
                                                </td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <td class="align-middle text-left">
                                                    Total Amount Due
                                                </td>
                                                <td class="align-middle text-right">
                                                    <strong> {{ number_format($loan->total_amount_due, 2) }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <hr class="mb-4">

                            <div class="row">

                                <div class="col-12 my-4">
                                    <h5 class="text-center">PAYMENT SCHEDULE</h5>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 my-4">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Term</th>
                                                <th class="text-center">Due Date</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($loan->paymentSchedule)
                                                @foreach ($loan->paymentSchedule->paymentDueDates as $key => $paymentDueDate)
                                                    <tr>
                                                        <td class="align-middle text-center">1</td>
                                                        <td class="align-middle text-center">{{ $paymentDueDate->due_date->toFormattedDateString() }}</td>
                                                        <td class="align-middle text-right">4,000.00</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- END PAGE CONTENT BODY -->
    </main>



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
