@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/users/{{$user->id}}" class="form-horizontal">
              @method('PATCH')
              @csrf
              
              <div class="card-body">
                <h4 class="card-title">User Info</h4>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name='name' value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name='email'   value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name='password'  value="{{$user->password}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="admin" class="col-sm-3 text-right control-label col-form-label">Admin</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control" id="admin"  name='is_admin' value="1" {{($user->is_admin)? "checked":""}}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="marketable" class="col-sm-3 text-right control-label col-form-label">Marketable</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control" id="marketable"  name='is_marketable' value="1" {{($user->is_marketable)? "checked":""}}>
                    </div>
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" name="Submit" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection