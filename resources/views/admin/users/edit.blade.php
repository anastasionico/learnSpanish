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
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name='name' value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name='email'   value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name='password'>
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
              <div class="form-group row">
                  <label for="dob" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                  <div class="col-sm-1">
                      <input type="date" name="dob" value="{{ $user->dob }}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="sex" class="col-sm-3 text-right control-label col-form-label">Sex</label>
                  <div class="col-sm-4">
                      <select name="sex" class="form-control">
                        <option value="male" {{($user->sex == 'male') ? "selected" : ""}}>male</option>
                        <option value="female" {{($user->sex == 'female') ? "selected" : ""}}>female</option>
                      </select>
                  </div>
              </div>
                <div class="form-group row">
                  <label for="country" class="col-sm-3 text-right control-label col-form-label">Country</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="country" name='country' value="{{$user->country}}">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="first_language" class="col-sm-3 text-right control-label col-form-label">First Language</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="first_language" name='first_language' value="{{$user->first_language}}">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="stripe_id" class="col-sm-3 text-right control-label col-form-label">Stripe ID</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="stripe_id" name='stripe_id' value="{{$user->stripe_id}}" readonly>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="card_brand" class="col-sm-3 text-right control-label col-form-label">Card Brand</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="card_brand" name='card_brand' value="{{$user->card_brand}}" readonly>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="card_last_four" class="col-sm-3 text-right control-label col-form-label">Card Last Four</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control" id="card_last_four" name='card_last_four' value="{{$user->card_last_four}}" readonly>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="trial_ends_at" class="col-sm-3 text-right control-label col-form-label">Subscription End Date</label>
                  <div class="col-sm-4">
                      @php
                        if(!is_null($user->trial_ends_at)) {
                          $trial_ends_at = new DateTime($user->trial_ends_at);
                          $trial_ends_at = $trial_ends_at->format('Y-m-d\TH:i');
                        } else {
                          $trial_ends_at = '';
                        }
                      @endphp

                      <input type="datetime-local" class="form-control" id="trial_ends_at" name='trial_ends_at' value="{{$trial_ends_at}}" readonly>
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