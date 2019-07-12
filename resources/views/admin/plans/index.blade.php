@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <div class="card-body">
              <h1 class="card-title m-b-0">Plans</h1>
              <a href="/admin/plans/create" class="btn btn-primary btn-sm">Create</a>
            </div>

            <div class="card-body">
              <ul class="list-group">
                @foreach($plans as $plan)
                  <li class="list-group-item clearfix">
                    <div class="pull-left">
                      <h5>{{ $plan->name }}</h5>
                      <b>${{ number_format($plan->cost, 2) }} monthly</b>
                      <p>{{ $plan->description }}</p>
                      <a href="/admin/plans/{{$plan->slug}}/edit" class="btn btn-info btn-sm">Edit</a>
                      <form method="POST" action="/admin/plans/{{$plan->slug}}" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm d-inline deleteItem" style="margin:0.2rem;cursor:pointer;">
                          <i class="fas fa-trash"></i>
                        </button>    
                      </form>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection