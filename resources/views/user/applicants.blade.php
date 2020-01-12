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
                <li class="breadcrumb-item active">{{$job->title}}</li>
                <li class="breadcrumb-item active">Applicants</li>

            </ol>
        </div>
    @endcomponent
    <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Applicant</th>
                                <th>Designation</th>
                                <th>Skills</th>
                                <th>Location</th>
                                <th>Degree</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       <tbody>
                       <?php $i = 1; ?>
                        @foreach($applicant as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <!-- <td>
                                <a href="{{route('job_profile',['id' => $item->id, 'company' => $item->company])}}" >
                                    {{$item->title}}
                                </a>
                            </td>
                            <td>{{$item->needed}}</td>
                            <td>{{$item->start}}</td>
                            <td>{{$item->end}}</td>
                            <td>{{$item->location}}</td>
                            <td>
                            <a href="{{route('job_status',['id' => $item->id, 'status' => $item->status])}}" >
                                    @if($item->status == 'active')
                                    <span class="btn btn-success btn-sm">Active</span>
                                    @else
                                    <span class="btn btn-danger btn-sm">{{$item->status}}</span>
                                    @endif
                                </a>
                            </td> -->
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                       </tbody>
                    </table>
                </div>
    @endsection