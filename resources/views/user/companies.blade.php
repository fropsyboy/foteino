@extends('layouts.app')
@section('content')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Companies</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Companies</li>
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
                <!-- .row -->
                <div class="row">
                    <!-- .col -->
                    @foreach($companies as $items)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <a href="{{route('profiles',['id' => $items->id])}}"><img src="assets/images/users/company.png" alt="user" class="img-circle img-responsive" style="max-height: 210px;"></a>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="card-title m-b-0"> {{$items->name}} </h5> <small>{{$items->industry}}, {{$items->sector}}, <p>{{$items->email}}</p></small>
                                        <p>
                                            <address>
                                            {{$items->state}}, {{$items->country}}
                                                <br/>
                                                <br/>
                                                <abbr title="Phone">P:</abbr> {{$items->phone}}
                                            </address>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{$companies->previousPageUrl()}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo; PREV</span>
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="{{$companies->nextPageUrl()}}" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
 
@endsection