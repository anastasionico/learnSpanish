@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/verbs" class="form-horizontal">
              
              @csrf
              
              <div class="card-body">
                <h4 class="card-title">Create new verb</h4>
                
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
                    <label for="verb_spa" class="col-sm-3 text-right control-label col-form-label">Spanish Definition <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('verb_spa')? 'is-invalid' : ''}}" id="verb_spa" name='verb_spa' placeholder="Ser" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="verb_eng" class="col-sm-3 text-right control-label col-form-label">English Definition <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('verb_eng')? 'is-invalid' : ''}}" id="verb_eng" name='verb_eng' placeholder="Be" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="importance" class="col-sm-3 text-right control-label col-form-label">Importance grade <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <select id="importance" name="importance" required>
                          <option value="1">Rarely Used</option>
                          <option value="2" selected>Basic</option>
                          <option value="3">Very Important</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_active" class="col-sm-3 text-right control-label col-form-label">Active</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control {{$errors->has('is_active')? 'is-invalid' : ''}}" id="is_active"  name='is_active' value="1" checked>
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