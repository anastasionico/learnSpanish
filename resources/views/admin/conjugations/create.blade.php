@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/conjugation" class="form-horizontal">
              @csrf
              
              <div class="card-body">
                <h4 class="card-title">Create new conjugation for {{$verb->verb_spa}} on {{$tense->name}} tense</h4>
                
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

                <input type="hidden" name="verb_id" value='{{$verb->id}}'>
                <input type="hidden" name="tense_id" value='{{$tense->id}}'>

                <div class="form-group row">
                  <label for="pronoun" class="col-sm-3 text-right control-label col-form-label">Pronoun <sub>(Required)</sub></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control {{$errors->has('pronoun')? 'is-invalid' : ''}}" id="pronoun" name='pronoun' placeholder="Yo" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-3 text-right control-label col-form-label">name <sub>(Required)</sub></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" name='name' placeholder="Soy" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_active" class="col-sm-3 text-right control-label col-form-label">Active</label>
                  <div class="col-sm-1">
                      <input type="checkbox" class="form-control {{$errors->has('is_active')? 'is-invalid' : ''}}" id="is_active"  name='is_active' value="1" checked>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_free" class="col-sm-3 text-right control-label col-form-label">Free</label>
                  <div class="col-sm-1">
                      <input type="checkbox" class="form-control {{$errors->has('is_free')? 'is-invalid' : ''}}" id="is_free"  name='is_free' value="1" checked>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="is_irregular" class="col-sm-3 text-right control-label col-form-label">Irregular</label>
                  <div class="col-sm-1">
                      <input type="checkbox" class="form-control {{$errors->has('is_irregular')? 'is-invalid' : ''}}" id="is_irregular"  name='is_irregular' value="1">
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