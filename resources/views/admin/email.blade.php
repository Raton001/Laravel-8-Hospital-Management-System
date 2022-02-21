@extends('admin.home')

<base href="/public">

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

    <div class="col-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Send Mail</h4>
              <form class="forms-sample" action="{{route('mailnotification', $mail->id)}}" method="post" >
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Greeting</label>
                  <input type="text" class="form-control" name="greetings" id="exampleInputName1" placeholder="greeting">
                </div>

                <div class="form-group">
                  <label for="exampleInputPhone">Body</label>
                  <input type="text" class="form-control" name="body" placeholder="body">
                </div>

                <div class="form-group">
                  <label >Action text</label>
                  <input type="text" class="form-control" name="action" placeholder="Action text">
                </div>

                 <div class="form-group">
                  <label >Doctor Name</label>
                  <input type="name" class="form-control" name="name" value="{{$data->name}}" placeholder="Doctor name">
                </div>

                <button type="submit" class="btn btn-primary me-2">Send Mail</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>

</div>

@endsection