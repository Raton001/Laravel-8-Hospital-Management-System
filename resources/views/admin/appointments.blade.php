@extends('admin.home')

@section('content')

<div class="content-wrapper ">

   <div class="col-lg-12 stretch-card">
     <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">Appointments Table</h4>
         <div class="table-responsive">
            <table class="table table-bordered table-contextual">
            <thead class="text-center">
                <tr>
                <th> # </th>
                <th> User Name</th>
                <th> Email</th>
                <th> Date </th>
                <th> phone </th>
                <th> Message </th>
                <th> Doctor's Name</th>
                <th> Status </th>
                <th>Action</th>
                </tr>
            </thead>

            <tbody>

            <?php  $id=1; ?>
            @foreach ($data as $appoint )
                
                <tr class="table-info">
                    <td> {{$id++}}</td>
                    <td> {{$appoint->name}}</td>
                    <td> {{$appoint->email}}</td>
                    <td> {{$appoint->date}}</td>
                    <td> {{$appoint->phone}}</td>
                    <td> {{$appoint->message}}</td>
                    <td> {{$appoint->doctor}}</td>
                    <td> {{$appoint->status}} </td>
                
                    <td> 
                        <a href="{{route('approve', $appoint->id)}}" class="btn btn-success"> Approve </a> 
                        <a href="{{route('delete', $appoint->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')"> Cancel </a>
                        <a href="{{route('mail', $appoint->id)}}" class="btn btn-success"> Send Email </a>
                    </td>
                
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