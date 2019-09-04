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
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($messages as $message) 
                      <tr>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td style="max-width: 380px">{{$message->message}}</td>
                        <td>
                          <a href="mailto:{{$message->email}}?subject=From Espapaya" target="_top" class="btn btn-info btn-sm d-block">
                            <i class="fas fa-share"> Answer {{ucfirst($message->name)}}</i>
                          </a>

                          <a href="mailto:i_wall@hotmail.co.uk?subject=From Espapaya&body={{$message->message}}" class="btn btn-warning btn-sm d-block">
                            <i class="fas fa-envelope"> Send to my Inbox</i>
                          </a>

                          
                          <form method="POST" action="messages/{{$message->id}}" class="">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm deleteItem d-block" style="margin:0.2rem;cursor:pointer;">
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