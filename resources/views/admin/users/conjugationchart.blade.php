@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card table-responsive">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Space Repetition of {{ $user->name }}</h5>
                </div>
                <div class="">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Conjugation</th>
                      <th scope="col">Frequecy</th>
                      <th scope="col">First seen</th>
                      <th scope="col">Last seen</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($conjugations as $conjugation) 
                      <tr>
                        <td>
                          {{ $conjugation->conjugation->pronoun }}
                          {{ $conjugation->conjugation->name }}
                        </td>
                        <td>
                          @switch($conjugation->frequency)
                            @case(1)
                                <i class="fas fa-thermometer-empty" style="color: #24412A"></i>
                                @break

                            @case(2)
                                <i class="fas fa-thermometer-quarter" style="color: #642"></i>
                                @break

                            @case(3)
                                <i class="fas fa-thermometer-half" style="color: #a42"></i>
                                @break

                            @case(4)
                                <i class="fas fa-thermometer-three-quarters" style="color: #a00"></i>
                                @break

                            @case(5)
                                <i class="fas fa-thermometer-full" style="color: #f00"></i>
                                @break    
                          @endswitch
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