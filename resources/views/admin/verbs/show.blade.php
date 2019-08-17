@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div id="accordian-4">
            <h1 style="display: inline-block;margin-right:1rem;">
              {{ $verb->verb_spa}}
            </h1> 
            
            <h3 style="display: inline-block;margin-right:1rem;">
              to {{ $verb->verb_eng}} 
            </h3>
            
            <h5>
              
              <div style="display: inline-block;margin-right:1rem;">
                @switch($verb->importance)
                  @case('1')
                      <i class="fas fa-thermometer-quarter"></i>  
                      Rarely used
                      @break

                  @case('2')
                      <i class="fas fa-thermometer-half"></i>
                      Basic Verb
                      @break

                  @case('3')
                      <i class="fas fa-thermometer-full"></i>
                      Very Important
                      @break
                @endswitch  
              </div>
              <div style="display: inline-block;margin:0 1rem;">
                @if($verb->is_active == 1)
                    <i class="fas fa-lightbulb"></i>
                    Active
                @else
                    <i class="far fa-lightbulb"></i>
                    Not Active
                @endif  
              </div>
              
            </h5>
            
            <a href="/admin/verbs/{{$verb->id}}/edit" class="btn btn-info btn-sm d-inline" style="cursor:pointer;">
              Edit Verb   <i class="fas fa-pencil-alt" style="margin-left: 1rem;"></i>
            </a>    

            <hr>              
            <br><br><br>
            
            <div class="row">
              <a href="/admin/verbs/{{ $verb->id}}/tenses/create" class="btn btn-primary btn-sm">Add New Tense to {{ $verb->verb_spa }}</a>  
            </div>
            

            <div class="card m-t-30">
              @php
               $toggleIncrement = 1;
              @endphp
              
              @foreach ($verb->tenses as $tense)           
              
                <a class="card-header link" data-toggle="collapse" data-parent="#accordian-4" href="#Toggle-{{$toggleIncrement}}" aria-expanded="false" aria-controls="Toggle-{{$toggleIncrement}}">
                  <i class="seticon fa fa-arrow-right" aria-hidden="true"></i>
                  <span>{{$tense->name}}</span>
                  @if($tense->is_free == 0)
                    <i class="fas fa-money-bill"></i>
                  @else
                    <i class="far fa-smile"></i>
                  @endif
                </a>  
                <div>
                  <a href="/admin/verbs/{{$verb->id}}/tenses/{{$tense->id}}/edit" class="float-right btn btn-info btn-sm d-inline" style="margin:-2rem 4.5rem 0 0; cursor:pointer;">
                    <i class="fas fa-pencil-alt"></i>
                  </a>    
                  <form method="POST" action="/admin/tenses/{{$tense->id}}" class="d-inline">
                    @method('DELETE')
                    <input type="hidden" name="verb" value="{{$verb->id}}">
                    <input type="hidden" name="tense" value="{{$tense->id}}">
                    @csrf
                    <button type="submit" class="float-right btn btn-danger btn-sm d-inline deleteItem" style="margin:-2rem 2rem 0 0; cursor:pointer;">
                      <i class="fas fa-trash"></i>
                    </button>    
                  </form>  
                </div>
                
                <div id="Toggle-{{$toggleIncrement}}" class="collapse show multi-collapse">
                  <div class="card-body widget-content table-responsive">
                    <a href="/admin/verbs/{{ $verb->id}}/tenses/{{ $tense->id }}/conjugation/create" class="btn btn-primary btn-sm">
                      Add New Conjugation to {{ $verb->verb_spa }} on {{ $tense->name }}
                    </a>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Pronoun</th>
                          <th scope="col">Conjugation</th>
                          <th scope="col">
                            Irregular
                            <a href="/admin/conjugation/setRegularityAll/{{ $tense->id }}/1">
                              <i class="fas fa-exclamation-triangle"></i>
                            </a>
                            <a href="/admin/conjugation/setRegularityAll/{{ $tense->id }}/0">
                              <i class="fas fa-check"></i>
                            </a>
                          </th>
                          <th scope="col">
                            Active
                            <a href="/admin/conjugation/setAvailabilityAll/{{ $tense->id }}/1">
                              <i class="fas fa-lightbulb"></i>
                            </a>
                            <a href="/admin/conjugation/setAvailabilityAll/{{ $tense->id }}/0">
                              <i class="far fa-lightbulb"></i>
                            </a>
                          </th>
                          <th scope="col">
                            Format
                            <a href="/admin/conjugation/setFormatAll/{{ $tense->id }}/0">
                              <i class="far fa-smile"></i>
                            </a>
                            <a href="/admin/conjugation/setFormatAll/{{ $tense->id }}/1">
                              <i class="fas fa-user"></i>
                            </a>
                            <a href="/admin/conjugation/setFormatAll/{{ $tense->id }}/2">
                              <i class="fas fa-money-bill"></i>
                            </a>
                          </th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tense->conjugations as $conjugation)
                          <tr>
                            <td>{{$conjugation->pronoun}}</td>
                            <td>{{$conjugation->name}}</td>
                            <td>
                              <a href="/admin/conjugation/setRegularity/{{$conjugation->id}}">
                                @if($conjugation->is_irregular == 1)
                                  <i class="fas fa-exclamation-triangle" style="color: #f00">
                                    <small>Irregular</small>
                                  </i>
                                @else
                                  <i class="fas fa-check" style="color: #24412A">
                                    <small>Regular</small>
                                  </i>
                                @endif
                              </a>
                              
                            </td>
                            <td>
                              <a href="/admin/conjugation/setAvailability/{{$conjugation->id}}">
                                @if($conjugation->is_active == 1)
                                  <i class="fas fa-lightbulb" style="color: #24412A">
                                        <small>Active</small>
                                      </i>
                                @else
                                  <i class="far fa-lightbulb" style="color: #f00">
                                        <small>Inactive</small>
                                      </i>
                                @endif
                              </a>
                              
                            </td>
                            
                            <td>
                              <a href="/admin/conjugation/setFormat/{{$conjugation->id}}/0">
                                <i class="far fa-smile" 
                                  style='color:{{
                                    ($conjugation->is_free == 0)? "red" : "#24412A"}}'>
                                  </i>
                              </a>
                              <a href="/admin/conjugation/setFormat/{{$conjugation->id}}/1">
                                <i class="fas fa-user"
                                  style='color:{{
                                    ($conjugation->is_free == 1)? "red" : "#24412A"}}'>
                                  </i>
                              </a>
                              <a href="/admin/conjugation/setFormat/{{$conjugation->id}}/2">
                                <i class="fas fa-money-bill"
                                  style='color:{{
                                    ($conjugation->is_free == 2)? "red" : "#24412A"}}'>
                                  </i>
                              </a>
                              @switch($conjugation->is_free)
                                @case(0)
                                  <small style="font-size: 60%">Everyone can play with this sentence</small>
                                  @break
                                @case(1)
                                  <small style="font-size: 60%">Only users with an account can play with this sentence</small>
                                  @break
                                @case(2)
                                  <small style="font-size: 60%">Only paying users can play with this sentence</small>
                                  @break
                              @endswitch




                              {{-- <a href="/admin/conjugation/setFormat/{{$conjugation->id}}/0">
                                @if($conjugation->is_free == 0)
                                  <i class="far fa-smile" style="color: #24412A">
                                    <small>Free</small>
                                  </i>
                                @elseif($conjugation->is_free == 1)
                                  <i class="fas fa-user" style="color: #a42">
                                    <small>Free Account</small>
                                  </i>
                                @elseif($conjugation->is_free == 2)
                                  <i class="fas fa-money-bill" style="color: #f00">
                                    <small>Paying Account</small>
                                  </i>
                                @endif
                              </a> --}}
                              
                            </td>

                          
                            
                            <td>
                              <form method="POST" action="/admin/conjugation/{{$conjugation->id}}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="verb" value="{{$verb->id}}">
                                
                                <button type="submit" class="float-right btn btn-danger btn-sm d-inline deleteItem" style="cursor:pointer;">
                                  <i class="fas fa-trash"></i>
                                </button>    
                              </form>  
                              <a href="/admin/conjugation/{{$conjugation->id}}/edit" class="float-right btn btn-info btn-sm d-inline" style="margin:0 0.5rem 0 0; cursor:pointer;">
                                <i class="fas fa-pencil-alt"></i>
                              </a>    
                            </td>
                          </tr>  
                        @endforeach    
                      </tbody>
                    </table>
                  </div>
                </div>
                
                @php
                  $toggleIncrement++              
                @endphp
              
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection