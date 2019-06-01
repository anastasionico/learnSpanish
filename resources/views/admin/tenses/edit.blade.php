@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/tenses/{{$tense->id}}" class="form-horizontal">
              @csrf
              @method('PATCH')
              
              <div class="card-body">
                <h4 class="card-title">Edit {{$tense->name}} </h4>
                
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
                
                <input type="hidden" name="verb_id" value="{{$verb->id}}">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('name')? 'is-invalid' : ''}}" id="name" name='name' value="{{$tense->name}}" ="Present" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_free" class="col-sm-3 text-right control-label col-form-label">Free to Play <sub>(Required)</sub></label>
                    <div class="col-sm-1">
                        <input 
                          type="checkbox" 
                          class="form-control {{$errors->has('is_free')? 'is-invalid' : ''}}" 
                          id="is_free"  
                          name='is_free' 
                          value="1"
                          {{ ($tense->is_free == 1)? 'checked' : ''}}
                        >
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