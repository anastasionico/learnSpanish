@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <div class="card-body">
                    <h1 class="card-title m-b-0">Verbs</h1>
                    <a href="/admin/verbs/create" class="btn btn-primary btn-sm">Create</a>
                    <a href="/admin/verb/exportcsv" class="btn btn-info btn-sm">Download Template</a>
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Spanish</th>
                      <th scope="col">English</th>
                      <th scope="col">Importance</th>
                      <th scope="col">Active</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($verbs as $verb) 
                      <tr>
                        <td>{{$verb->verb_spa}}</td>
                        <td>{{$verb->verb_eng}}</td>
                        <td>
                          @switch($verb->importance)
                            @case('1')
                                <i class="fas fa-thermometer-quarter" style="color: #24412A">
                                  <small>({{ $verb->importance }}) Not Important</small>
                                </i>
                                @break

                            @case('2')
                                <i class="fas fa-thermometer-half" style="color: #a42">
                                  <small>({{ $verb->importance }}) Fairly Important</small>
                                </i>
                                @break

                            @case('3')
                                <i class="fas fa-thermometer-full" style="color: #f00">
                                  <small>({{ $verb->importance }}) Very Important</small>
                                </i>
                                @break
                            
                          @endswitch
                          
                        </td>
                        <td>
                          @if($verb->is_active == 1)
                            <i class="fas fa-lightbulb" style="color: #f00">
                                  <small>Active</small>
                                </i>
                          @else
                            <i class="far fa-lightbulb" style="color: #24412A">
                                  <small>Inactive</small>
                                </i>
                          @endif
                        </td>
                        <td>
                          <a href="/admin/verbs/{{$verb->id}}" class="btn btn-primary btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
                            <i class="fas fa-angle-right"></i>
                          </a>    


                          <a href="/admin/verbs/{{$verb->id}}/edit" class="btn btn-info btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
                            <i class="fas fa-pencil-alt"></i>
                          </a>    

                          <form method="POST" action="/admin/verbs/{{$verb->id}}" class="d-inline">
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