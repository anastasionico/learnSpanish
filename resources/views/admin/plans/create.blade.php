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
                        <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" name='name' placeholder="Insert the name of the plan/product " required>
                        <small>It must be equal to the one in product on the Stripe Dashboard, capital letter will be added automatically</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Identifier" class="col-sm-3 text-right control-label col-form-label">Identifier <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="identifier" name='identifier' placeholder="Insert the plan identifier of the plan (equal to Stripe Dashboard)" required>
                        <small>It must be equal to the one in plan details on the Stripe Dashboard, (example plan_FRl3T4FQhqRcdai</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cost" class="col-sm-3 text-right control-label col-form-label">Cost <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="number" name="cost" min="0" step='0.01' required>
                        <br>
                        <small>It must be equal to the one in product details on the Stripe Dashboard</small>
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