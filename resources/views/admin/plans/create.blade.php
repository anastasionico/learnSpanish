@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/plans" class="form-horizontal">
              @csrf
              
              <div class="card-body">
                <h4 class="card-title">Create new Stripe Plan</h4>
                
                @if ($errors->any()) 
                  <h5>Error</h5>
                  <div class="btn btn-lg btn-block btn-outline-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <br>
                
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" name='name' placeholder="Insert the name of the plan" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cost" class="col-sm-3 text-right control-label col-form-label">Cost <sub>(Required)</sub></label>
                    <div class="col-sm-1">
                        <input type="number" name="cost" min="0" step='0.01' required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="description" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="description" name='description' placeholder="Insert the description of the plan">
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