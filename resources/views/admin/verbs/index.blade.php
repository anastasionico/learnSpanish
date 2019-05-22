@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Users</h5>
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">English</th>
                      <th scope="col">Spanish</th>
                      <th scope="col">Importance</th>
                      <th scope="col">Active</th>
                      <th scope="col">Created</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($verbs as $verb) 
                      <tr>
                        <th scope="row">{{$verb->id}}</th>
                        <td>{{$verb->verb_eng}}</td>
                        <td>{{$verb->verb_spa}}</td>
                        <td>{{$verb->importance}}</td>
                        <td>
                          @if($verb->is_active == 1)
                            <i class="fas fa-check-square"></i>
                          @else
                            <i class="far fa-square"></i>
                          @endif
                        </td>
                        <td>{{$verb->created_at}}</td>
                        <td>
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