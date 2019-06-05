@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div id="accordian-4">
            <h1>{{ $verb->verb_spa}}</h1>
            <h4>
              to {{ $verb->verb_eng}} 
            </h4>

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
            @if($verb->is_active == 1)
                <i class="fas fa-lightbulb fa-2x"></i>
            @else
                <i class="far fa-lightbulb fa-2x"></i>
            @endif
  
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
                    <button type="submit" class="float-right btn btn-danger btn-sm d-inline" style="margin:-2rem 2rem 0 0; cursor:pointer;">
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
                          <th scope="col">Name</th>
                          <th scope="col">Active</th>
                          <th scope="col">Free</th>
                          <th scope="col">Irregular</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tense->conjugations as $conjugation)
                          <tr>
                            <td>{{$conjugation->pronoun}}</td>
                            <td>{{$conjugation->name}}</td>
                            <td>{{$conjugation->is_active}}</td>
                            <td>{{$conjugation->is_free}}</td>
                            <td>{{$conjugation->is_irregular}}</td>
                            <td>
                              <form method="POST" action="/admin/conjugation/{{$conjugation->id}}" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="verb" value="{{$verb->id}}">
                                
                                <button type="submit" class="float-right btn btn-danger btn-sm d-inline" style="cursor:pointer;">
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