@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form method="POST" action="/admin/csv/importverb" class="form-horizontal" enctype="multipart/form-data">
              
              @csrf
              <div class="card-body">              
                <h4 class="card-title">Import new verb</h4>

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
                    <label for="verb_spa" class="col-sm-3 text-right control-label col-form-label">CSV <sub>(Required)</sub></label>
                    <div class="col-sm-9">
                        <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                        @if ($errors->has('csv_file'))
                          <span class="help-block">
                            <strong>{{ $errors->first('csv_file') }}</strong>
                          </span>
                        @endif
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