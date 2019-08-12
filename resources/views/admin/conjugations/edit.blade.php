@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/conjugation/{{$conjugation->id}}" class="form-horizontal">
              @csrf
              @method('PATCH')
              <div class="card-body">
                <h4 class="card-title">Edit conjugation {{$conjugation->pronoun}} {{$conjugation->name}}</h4>
                
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
                  <label for="pronoun" class="col-sm-3 text-right control-label col-form-label">Pronoun <sub>(Required)</sub></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control {{$errors->has('pronoun')? 'is-invalid' : ''}}" id="pronoun" name='pronoun' value="{{$conjugation->pronoun}}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-3 text-right control-label col-form-label">Conjugation <sub>(Required)</sub></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" name='name' value='{{$conjugation->name}}' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_active" class="col-sm-3 text-right control-label col-form-label">Active</label>
                  <div class="col-sm-1">
                      <input type="checkbox" class="form-control {{$errors->has('is_active')? 'is-invalid' : ''}}" id="is_active"  name='is_active' value="1" {{($conjugation->is_active)? 'checked' : '' }}>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_free" class="col-sm-3 text-right control-label col-form-label">Free</label>

                  <div class="col-sm-5">
                    <select id="is_free"  name='is_free' class="form-control">
                      @switch($conjugation->is_free)
                        @case(0)
                            <option value="0" selected>Free</option>
                            <option value="1">Free Account</option>
                            <option value="2">Paid Account</option>
                            @break

                        @case(1)
                            <option value="0">Free</option>
                            <option value="1" selected>Free Account</option>
                            <option value="2">Paid Account</option>
                            @break

                        @case(2)
                            <option value="0">Free</option>
                            <option value="1">Free Account</option>
                            <option value="2" selected>Paid Account</option>
                            @break
                      @endswitch
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_irregular" class="col-sm-3 text-right control-label col-form-label">Irregular</label>
                  <div class="col-sm-1">
                      <input type="checkbox" class="form-control {{$errors->has('is_irregular')? 'is-invalid' : ''}}" id="is_irregular"  name='is_irregular' value="1"  {{($conjugation->is_irregular)? 'checked' : '' }}>
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