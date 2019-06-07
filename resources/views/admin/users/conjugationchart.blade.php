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
                      <th scope="col">Name</th>
                      <th scope="col">Conjugation</th>
                      <th scope="col">Frequecy</th>
                      <th scope="col">First seen</th>
                      <th scope="col">Last seen</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($conjugations as $conjugation) 
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $conjugation->id }}</td>
                        <td>
                          {{ $conjugation->frequency }}
                        </td>
                          
                        <td>{{ $conjugation->created_at }}</td>
                        <td>{{ $conjugation->updated_at }}</td>
                        
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