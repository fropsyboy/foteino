@extends('layouts.app')
@section('content')
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                     <!-- <img src="../assets/images/users/5.jpg" class="img-circle" width="150" /> -->
                                     @if($profile->gender == "Male")
                                    <img src="../assets/images/users/male.png" alt="user-img" class="img-circle" width="150" >
                                    @else
                                    <img src="../assets/images/users/female2.png" alt="user-img" class="img-circle" width="150" >
                                    @endif
                                    <h4 class="card-title m-t-10"> {{$profile->name}} {{$profile->m_name}} {{$profile->l_name}} </h4>
                                    <h6 class="card-subtitle"> {{$profile->username}} </h6>
                                    <h6 class="card-subtitle"> {{$profile->sector}} ({{$profile->industry}}) </h6>
                                    <h6 class="card-subtitle"> {{$profile->cac_number}} </h6>

                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-check"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fas fa-check-circle"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6> {{$profile->email}} </h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$profile->phone}}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$profile->state}}, {{$profile->country}}</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <a href="{{$profile->credentials?$profile->credentials->facebook:'N/A'}}" class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$profile->credentials?$profile->credentials->twitter:'N/A'}}" class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></a>
                                <a href="{{$profile->credentials?$profile->credentials->linkd:'N/A'}}" class="btn btn-circle btn-secondary"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"> {{$profile->name}} {{$profile->m_name}} {{$profile->l_name}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{$profile->phone}} {{$profile->phone2}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{$profile->email}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">{{$profile->state}} {{$profile->country}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">
                                            {{$profile->description?$profile->description:'N/A'}}
                                         </p>
                                        
                                         <hr>
                                        <div class="row">
                                            <p> <strong>Contact Person One</strong> </p>
                                            <div class="col-md-12 col-xs-6 b-r">
                                            <strong>
                                            @foreach(unserialize($profile->contact_person1) as $attached)
                                                {{ $attached}},
                                            @endforeach
                                                    </strong> 
                                                    <br>
                                                </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <p> <strong>Contact Person Two</strong> </p>
                                            <div class="col-md-12 col-xs-6 b-r">
                                            <strong>
                                            @foreach(unserialize($profile->contact_person2) as $attached)
                                                {{ $attached}},
                                            @endforeach
                                                    </strong> 
                                                    <br>
                                                </div>
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>Usa</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
 
@endsection