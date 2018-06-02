@extends('layouts.main')

@section('page-title')
    Members
@endsection

@section('nav-item-members')
    active
@endsection


@section('page-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <!-- START PAGE CONTENT HEADER -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Members</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        <!-- END PAGE CONTENT HEADER -->

        <!-- START PAGE CONTENT BODY -->
        <div class="card mb-3">
            <h5 class="card-header" style="background: none">All Members</h5>
            <div class="card-body">
                <p class="card-text">New, Unapproved and Approved Members</p>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Employer</th>
                            <th class="text-center">Application Status</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $member)
                            <tr>
                                <td class="align-middle">
                                    {{ $member->id }}
                                </td>
                                <td class="align-middle text-uppercase">
                                    <a href="{{ route('admin.members.show', $member->id) }}">{{ $member->fullName() }}</a>
                                </td>
                                <td class="align-middle">
                                    {{ $member->mobile_number }}
                                </td>
                                <td class="align-middle">
                                    {{ $member->employer }}
                                </td>
                                <td class="align-middle text-center text-uppercase">
                                    @component('components.membership-status')
                                        {{ $member->membershipApplication->status() }}
                                    @endcomponent
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" onclick="redirect('{{ route('admin.members.show', $member->id) }}')" class="btn btn-sm btn-outline-secondary my-2" data-toggle="tooltip" data-placement="top" title="Show">
                                        <span data-feather="eye"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary my-2" data-toggle="tooltip" data-placement="top" title="Update">
                                        <span data-feather="edit"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary my-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <span data-feather="trash-2"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $members->links('vendor.pagination.bootstrap-4', ['alignment' => 'justify-content-end']) }}

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
