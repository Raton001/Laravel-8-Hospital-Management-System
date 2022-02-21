 @extends('admin.home')

@section('dashboard')

<div class="content-wrapper ">
 <div class="col-xl-4 col-sm-6 grid-margin stretch-card">

              <div class="card">
                <a href="{{route('alldoctors')}}"> 
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{$doctors->count()}}</h3>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal"> All Doctor </h6> 
                  </div>
                </a>  
                </div>
            
                <div class="card">
                 <a href="{{route('allusers')}}">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{Auth::user()->count()}}</h3>
                         
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All User</h6>
                  </div>
                </a>
                </div>

                <div class="card">
               <a href="{{route('allAppointment')}}"> 
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">{{$appoint->count()}}</h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">All Appointments</h6>
                  </div>
                </a>  
                </div>

              </div>
  </div>            
 @endsection             