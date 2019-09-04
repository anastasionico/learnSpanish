@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Messages</h5>
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($messages as $message) 
                      <tr>
                        <th scope="row">{{$message->id}}</th>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td style="max-width: 380px">{{$message->message}}</td>
                        <td>
                          <a href="mailto:{{$message->email}}?Subject=From Espapaya" target="_top" class="btn btn-info btn-sm d-inline">
                                <i class="fas fa-envelope"></i>
                          </a>
                          
                          <form method="POST" action="messages/{{$message->id}}" class="d-inline">
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