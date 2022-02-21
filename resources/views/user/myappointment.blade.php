@extends('master')

@section('content')

 <div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title text-center">My Appointment Table</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-contextual">
            <thead>
                <tr>
                <th> # </th>
                <th> Doctor Name</th>
                <th> Date </th>
                <th> Message </th>
                <th> Status </th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php  $id=1; ?>
            @foreach ($data as $appoint )
                
                <tr class="table-info">
                <td> {{$id++}}</td>
                <td> {{$appoint->doctor}}</td>
                <td> {{$appoint->date}}</td>
                <td> {{$appoint->message}}</td>
                <td> {{$appoint->status}} </td>
                <td><a href="{{route('cancel',$appoint->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')"> Cancel </a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
   
@endsection  