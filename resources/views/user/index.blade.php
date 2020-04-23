@extends('layouts.app')
@section('content')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Applicants</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Applicants</li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
              
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            
                            <h5 class="card-title">Latest Jobs </h5>
                            <h6 class="card-subtitle">Check the latest jobs in the system </h6>
                        </div>
                       
                    </div>
                </div>
               
                <div class="table-responsive">
                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                            <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>DOB</th>
                                <th>Qualification</th>
                                <th>Skills</th>
                                <th>Registerd On</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        @foreach($applicants as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <td>
                            <a  href="{{route('profiles',['id' => $item->id])}}" target='_blank'>
                            {{$item->name}}
                            </a>
                            </td>
                            <td>
                            {{$item->email}}
                            </td>
                            <td>
                            {{$item->phone}}
                            </td>
                            <td>
                            {{$item->state}}
                            </td>
                            <td>
                            {{$item->country}}
                            </td>
                            <td>
                            {{$item->dob}}
                            </td>
                            <td>
                            {{$item->credentials ? $item->credentials->qualification : 'N/A'}}
                            </td>
                            <td>
                            {{$item->credentials ? $item->credentials->skilss : 'N/A'}}
                            </td>
                            <td>
                            {{$item->created_at}}
                            </td>
                            
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                        <tbody>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
 
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
 
@endsection