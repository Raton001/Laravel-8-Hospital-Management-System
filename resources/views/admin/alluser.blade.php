@extends('admin.home')

@section('content')

<div class="content-wrapper ">
  <div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title text-center">User's Table</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-contextual">
            <thead class="text-center">
                <tr>
                <th> # </th>
                <th> User Name</th>
                <th> Email</th>
                <th> phone </th>
                <th> Address </th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php  $id=1; ?>
            @foreach ($data as $user )
                
                <tr class="table-info">
                <td> {{$id++}}</td>
                <td> {{$user->name}}</td>
                <td> {{$user->email}}</td>
                <td> {{$user->phone}}</td>
                <td> {{$user->address}}</td>
                
                <td><a href="{{route('user-delete', $user->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete?')"> Delete</a></td>
                
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