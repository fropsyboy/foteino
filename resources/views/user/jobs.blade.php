@extends('layouts.app')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Jobs
        @endslot
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Jobs</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
        </div>
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            @component('components.table')
                @slot('title')
                    Jobs
                @endslot
                @slot('subtitle')
                    Latest jobs posted by companies 
                @endslot
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Industry</th>
                                <th>No. Needed</th>
                                <th>Start Date</th>
                                <th>End date</th>
                                <th>Salary Range</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Applied</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       <tbody>
                            <tr>
                            </tr>
                       </tbody>
                    </table>
                </div>
            @endcomponent
        </div>
    </div>
@endsection