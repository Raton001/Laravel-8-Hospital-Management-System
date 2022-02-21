@extends('admin.home')

@section('content')  


<div class="content-wrapper ">


    @if(session()->has('message'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session()->get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>

    @endif

    <div class=" col-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Doctors</h4>
              <form class="forms-sample" action="{{route('addDoctor')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPhone">Phone</label>
                  <input type="phone" class="form-control" name="phone" id="exampleInputPhone" placeholder="phone">
                </div>
              
                <div class="form-group text-white">
                  <label>Speacality</label>
                      <select class="form-control bg-white" name="speacality"  class="custom-select">
                      <option selected>--Select--</option>
                      <option>Skin</option>
                      <option>Cardiology</option>
                      <option>Kidney</option>
                      <option>Medicine</option>
                      </select>
                </div>

                <div class="form-group">
                  <label >Room Number</label>
                  <input type="text" class="form-control" name="room" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail3">Image</label>
                  <input type="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>
        </div>
   
  </div>
   
@endsection    