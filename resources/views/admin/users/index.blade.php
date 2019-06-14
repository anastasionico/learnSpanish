@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Users</h5>
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Admin</th>
                      <th scope="col">Marketing</th>
                      <th scope="col">Sex</th>
                      <th scope="col">Country</th>
                      <th scope="col">Paid</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user) 
                      <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          @if($user->is_admin == 1)
                            <i class="fas fa-check-square"></i>
                          @else
                            <i class="far fa-square"></i>
                          @endif
                        </td>
                        <td>
                          @if($user->is_marketable == 1)
                            <i class="fas fa-check-square"></i>
                          @else
                            <i class="far fa-square"></i>
                          @endif
                        </td>
                        <td>{{$user->sex}}</td>
                        <td>{{$user->country}}</td>
                        <td>
                          
                          @if(isset($user->trial_ends_at) && $user->trial_ends_at > date('Y-m-d h:i:s') )
                            <i class="fas fa-check-square"></i>
                          @else
                            <i class="far fa-square"></i>
                          @endif
                        </td>
                        <td>

                          <a href="users/{{$user->id}}/edit" class="btn btn-info btn-sm d-inline" style="margin:0.4rem;cursor:pointer;">
                            <i class="fas fa-pencil-alt"></i>
                          </a>    
                          <a href="users/{{$user->id}}/conjugationchart" class="btn btn-primary btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
                            <i class="fas fa-chart-line"></i>
                          </a>    

                          <form method="POST" action="users/{{$user->id}}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm d-inline deleteItem" style="margin:0.2rem;cursor:pointer;">
                              <i class="fas fa-trash"></i>
                            </button>    
                          </form>
                          
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