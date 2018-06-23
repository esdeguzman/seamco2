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
            <div class="btn-toolbar mb-2 mb-md-0">
                <button class="btn btn-sm btn-outline-secondary" onclick="redirect('{{ route('member.loans.create') }}')">
                    <span data-feather="credit-card" class="mr-2"></span>
                    Apply for Loan
                </button>
            </div>
        </div>
        <!-- END PAGE CONTENT HEADER -->

        <!-- START PAGE CONTENT BODY -->
        <div class="card mb-3">
            <h5 class="card-header" style="background: none">My Loans</h5>
            <div class="card-body">
                <p class="card-text">New, Approved and Paid Loans</p>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Loan #</th>
                            <th>Co-Maker</th>
                            <th class="text-right">Loan Amount</th>
                            <th class="text-right">Interest</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $key => $loan)
                            <tr>
                                <td class="align-middle">
                                    <a href="{{ route('member.loans.show', $loan->id) }}">{{ $loan->code }}</a>
                                </td>
                                <td class="align-middle">
                                    {{ $loan->coMaker->fullName() }}
                                </td>
                                <td class="align-middle text-right">
                                    {{ number_format($loan->creditEvaluation->approved_amount, 2) }}
                                </td>
                                <td class="align-middle text-right">
                                    {{ number_format($loan->creditEvaluation->interest, 2) }}
                                </td>
                                <td class="align-middle text-center text-uppercase">
                                    @component('components.loan-status')
                                        {{ $loan->status }}
                                    @endcomponent
                                </td>
                                <td class="align-middle text-center">
                                    {{ $loan->creditEvaluation->estimated_release_date ? $loan->creditEvaluation->estimated_release_date->toFormattedDateString() : "" }}
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" class="btn btn-sm btn-outline-secondary my-2" data-toggle="tooltip" data-placement="top" title="Show">
                                        <span data-feather="eye"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary my-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <span data-feather="trash-2"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $loans->links('vendor.pagination.bootstrap-4', ['alignment' => 'justify-content-end']) }}

            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->

    </main>
@endsection

@section('scripts')
    <script>
        function redirect(url) {
            window.location = url;
        }
    </script>
@endsection
