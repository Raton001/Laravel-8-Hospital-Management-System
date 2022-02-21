@extends('admin.home')

@section('content')
<div class="content-wrapper ">


  <div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title text-center">Doctor's Table</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-contextual">
            <thead class="text-center">
                <tr>
                <th> # </th>
                <th> Name</th>
                <th> Phone</th>
                <th> Speacality </th>
                <th> Room Number </th>
                <th> Image</th>
                <th> Action</th>
                </tr>
            </thead>
            
            <tbody>

            <?php  $id=1; ?>
            @foreach ($data as $doctor )
                
                <tr class="table-info">
                <td> {{$id++}}</td>
                <td> {{$doctor->name}}</td>
                <td> {{$doctor->phone}}</td>
                <td> {{$doctor->speacality}}</td>
                <td> {{$doctor->room}}</td>
                <td> <img src="doctorImage/{{$doctor->image}}"></td>
                <td><a href="{{route('update', $doctor->id)}}" class="btn btn-warning"> Update </a> <a href="{{route('doctor-delete', $doctor->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')">Delete</a></td>
                
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</div>

@endsection