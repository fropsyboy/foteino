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
                <div class="col-md-12">
                    <div class="row el-element-overlay">
                        @foreach($applicants as $items)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1">
                                        @if($items->gender =="Male")
                                         <img src="assets/images/users/male.png" alt="user" height="512" width="512"/>
                                         @else
                                         <img src="assets/images/users/female2.png" alt="user" height="512" width="512" />
                                         @endif
                                        <div class="el-overlay">
                                            <ul class="el-info">
                                                <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{route('profiles',['id' => $items->id])}}"><i class="icon-magnifier"></i></a></li>
                                                <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h5 class="card-title text-uppercase">{{ $items->name }} ( {{ $items->username }} )</h5> <small> {{ $items->email }}, {{ $items->phone }} </small>
                                        <br/>
                                        <small>Location: {{$items->state}}, {{$items->country}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                  </div>
                    <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{$applicants->previousPageUrl()}}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; PREV</span>
                                    </a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="{{$applicants->nextPageUrl()}}" aria-label="Next">
                                        <span aria-hidden="true">Next &raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
    
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