@extends('layouts.main')

@section('page-title')
    Dashboard
@endsection

@section('nav-item-dashboard')
    active
@endsection

@section('page-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <!-- START PAGE CONTENT HEADER -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        <!-- END PAGE CONTENT HEADER -->

        <!-- START PAGE CONTENT BODY -->
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="display-4">34</h1>
                            <span class="text-secondary">
                                <span data-feather="users" style="color: black"></span>
                                <strong>MEMBERS</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="display-4">6</h2>
                            <span class="text-secondary">
                                <span data-feather="credit-card" style="color: black"></span>
                                <strong>LOAN APPLICATION</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="display-4">142,920</h1>
                            <span class="text-secondary">
                                <span data-feather="file-text" style="color: black"></span>
                                <strong>SHARES</strong>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END PAGE CONTENT BODY -->

    </main>
@endsection
