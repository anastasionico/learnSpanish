@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Users</h5>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Admin</th>
                      <th scope="col">Marketing</th>
                      <th scope="col">Registered</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user) 
                      <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ ($user->is_admin == 1)? "yes": "no"}}</td>
                        <td>{{ ($user->is_marketable == 1)? "yes": "no"}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                          <a href="users/{{$user->id}}/edit" class="btn btn-info btn-sm">Edit</a>    
                          <button type="button" class="btn btn-danger btn-sm">Delete</button>
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