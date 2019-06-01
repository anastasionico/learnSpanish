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
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">English</th>
                      <th scope="col">Spanish</th>
                      <th scope="col">Importance</th>
                      <th scope="col">Active</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($verbs as $verb) 
                      <tr>
                        <td>{{$verb->verb_eng}}</td>
                        <td>{{$verb->verb_spa}}</td>
                        <td>
                          @switch($verb->importance)
                            @case('1')
                                <i class="fas fa-thermometer-quarter fa-2x"></i>
                                @break

                            @case('2')
                                <i class="fas fa-thermometer-half fa-2x"></i>
                                @break

                            @case('3')
                                <i class="fas fa-thermometer-full fa-2x"></i>
                                @break
                            
                          @endswitch
                          
                        </td>
                        <td>
                          @if($verb->is_active == 1)
                            <i class="fas fa-lightbulb"></i>
                          @else
                            <i class="far fa-lightbulb"></i>
                          @endif
                        </td>
                        <td>
                          <a href="verbs/{{$verb->id}}" class="btn btn-primary btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
                            <i class="fas fa-angle-right"></i>
                          </a>    


                          <a href="verbs/{{$verb->id}}/edit" class="btn btn-info btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
                            <i class="fas fa-pencil-alt"></i>
                          </a>    

                          <form method="POST" action="verbs/{{$verb->id}}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm d-inline" style="margin:0.2rem;cursor:pointer;">
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