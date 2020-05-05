@extends('layouts.app')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Dashboard 
        @endslot
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
            </ol>
            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
        </div>
    @endcomponent
    <div class="card-group">
        @component('components.card')
            @slot('title')
                <h3><i class="icon-screen-desktop"></i></h3>
                <p class="text-muted">Applications</p>
            @endslot
            @slot('count')
                <h2 class="counter text-primary">{{$applicationsCount}}</h2>
            @endslot
            <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        @endcomponent   
        @component('components.card')
            @slot('title')
                <h3><i class="icon-note"></i></h3>
                <p class="text-muted">Applicants</p>
            @endslot
            @slot('count')
                <h2 class="counter text-cyan">{{$applicantsCount}}</h2>
            @endslot
            <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        @endcomponent
        @component('components.card')
            @slot('title')
                <h3><i class="icon-doc"></i></h3>
                <p class="text-muted">COMPANIES</p>
            @endslot
            @slot('count')
                <h2 class="counter text-purple">{{$companies}}</h2>
            @endslot
            <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        @endcomponent
        @component('components.card')
            @slot('title')
                <h3><i class="icon-bag"></i></h3>
                <p class="text-muted">USERS</p>
            @endslot
            @slot('count')
                <h2 class="counter text-success">{{$user}}</h2>
            @endslot
            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        @endcomponent
    </div>
                
    <div class="row">
        <!-- <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-40 align-items-center no-block">
                        <h5 class="card-title ">MONTHLY ANALYSIS</h5>
                        <div class="ml-auto">
                            <ul class="list-inline font-12">
                                <li><i class="fa fa-circle text-cyan"></i> APPLICANTS</li>
                                <li><i class="fa fa-circle text-primary"></i> COMPANIES</li>
                                <li><i class="fa fa-circle text-purple"></i> APPLICATIONS</li>
                            </ul>
                        </div>
                    </div>
                    <div id="morris-area-chart" style="height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-cyan text-white">
                        <div class="card-body ">
                            <div class="row weather">
                                <div class="col-6 m-t-40">
                                    <h3>&nbsp;</h3>
                                    <div class="display-4">73<sup>°F</sup></div>
                                    <p class="text-white">AHMEDABAD, INDIA</p>
                                </div>
                                <div class="col-6 text-right">
                                    <h1 class="m-b-"><i class="wi wi-day-cloudy-high"></i></h1>
                                    <b class="text-white">SUNNEY DAY</b>
                                    <p class="op-5">April 14</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="../assets/images/users/1.jpg" alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">Govinda</h4>
                                                <p class="text-white">Actor</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="../assets/images/users/2.jpg" alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">Govinda</h4>
                                                <p class="text-white">Actor</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="../assets/images/users/3.jpg" alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">Govinda</h4>
                                                <p class="text-white">Actor</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
                                <th>Job Title</th>
                                <th>Company</th>
                                <!-- <th>No. Needed</th> -->
                                <th>Start Date</th>
                                <th>End date</th>
                                <th>Salary Range</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($applications as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('job_profile',['id' => $item->id, 'company' => $item->company])}}" >
                                    {{$item->title}}
                                </a>
                            </td>
                            <td> 
                            <a href="{{route('profiles',['id' => $item->cleanCompany->id])}}">
                            {{$item->cleanCompany->name}}
                            </a>
                            </td>
                            <!-- <td>{{$item->needed}}</td> -->
                            <td>{{$item->start}}</td>
                            <td>{{$item->end}}</td>
                            <td>{{$item->salary}}</td>
                            <td>{{$item->company->name}}</td>
                            <td>{{$item->location}}</td>
                            <td>
                            <a href="{{route('job_status',['id' => $item->id, 'status' => $item->status])}}" >
                                    @if($item->status == 'active')
                                    <span class="btn btn-success btn-sm">Active</span>
                                    @else
                                    <span class="btn btn-danger btn-sm">{{$item->status}}</span>
                                    @endif
                                </a>
                            </td>
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                        
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                        <h5 class="card-title">Latest Applications </h5>
                            <h6 class="card-subtitle">Check the latest applications in the system </h6>
                        </div>
                        
                    </div>
                </div>
                
                <div class="table-responsive">
                <table id="example" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                            <th>S/N</th>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Gender</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($applicants as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('profiles',['id' => $item->id])}}" >
                                    {{$item->user->name}}
                                </a>
                            </td>
                            <td> 
                            {{$item->job->title}}
                            </td>
                            <td> 
                            {{$item->user->gender}}
                            </td>
                            <td> 
                            {{$item->user->state}}
                            </td>
                            <td> 
                            {{$item->user->phone}}
                            </td>

                            <td> 
                            {{$item->user->email}}
                            </td>
                            
                            
                            <td>
                            <a href="{{route('job_status',['id' => $item->id, 'status' => $item->status])}}" >
                                    @if($item->status == 'active')
                                    <span class="btn btn-success btn-sm">Active</span>
                                    @else
                                    <span class="btn btn-danger btn-sm">{{$item->status}}</span>
                                    @endif
                                </a>
                            </td>
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>
    
    


    </div>

    
   
    <!-- ============================================================== -->
    <!-- End Comment - chats -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Todo, chat, notification -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
  
@endsection