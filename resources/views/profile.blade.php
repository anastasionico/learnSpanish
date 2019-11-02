@extends('layouts.master')

@section('contentOne')
    <div class="row  p-5 text-left bg-grayLight">
        <div class="col-sm-12 col-lg-2"></div>    
    
        <div class="col-sm-12 col-lg-8 rounded bg-white regulation-section">
            <form method="POST" action="profile/{{Auth::user()->id}}" class="form-horizontal">
                @method('PATCH')
                @csrf
              
                
                <h4 class="c-greenLight">User Info</h4>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name='name' value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name='email'   value="{{Auth::user()->email}}">
                    </div>
                </div>
                
                <input type="hidden" name='is_admin' value="{{Auth::user()->is_admin}}">
                
                
                {{-- <div class="form-group row">
                    <label for="marketable" class="col-sm-3 text-right control-label col-form-label">Subscribe</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control" id="marketable"  name='is_marketable' value="1" {{(Auth::user()->is_marketable)? "checked":""}}>
                    </div>
                </div> --}}
            
                <div class="form-group row">
                    <label for="dob" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                    <div class="col-sm-1">
                        <input type="date" name="dob" value="{{ Auth::user()->dob }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sex" class="col-sm-3 text-right control-label col-form-label">Sex</label>
                    <div class="col-sm-4">
                        <select name="sex" class="form-control">
                            <option value="male" {{(Auth::user()->sex == 'male') ? "selected" : ""}}>male</option>
                            <option value="female" {{(Auth::user()->sex == 'female') ? "selected" : ""}}>female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-sm-3 text-right control-label col-form-label">Country</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="country" name='country' value="{{Auth::user()->country}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="first_language" class="col-sm-3 text-right control-label col-form-label">First Language</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="first_language" name='first_language' value="{{Auth::user()->first_language}}">
                  </div>
                </div>

               {{--  <div class="form-group row">
                      <label for="stripe_id" class="col-sm-3 text-right control-label col-form-label">Stripe ID</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="stripe_id" name='stripe_id' value="{{Auth::user()->stripe_id}}" readonly>
                      </div>
                </div>
                <div class="form-group row">
                      <label for="card_brand" class="col-sm-3 text-right control-label col-form-label">Card Brand</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="card_brand" name='card_brand' value="{{Auth::user()->card_brand}}" readonly>
                      </div>
                </div>
                <div class="form-group row">
                      <label for="card_last_four" class="col-sm-3 text-right control-label col-form-label">Card Last Four</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="card_last_four" name='card_last_four' value="{{Auth::user()->card_last_four}}" readonly>
                      </div>
                </div>
                <div class="form-group row">
                      <label for="trial_ends_at" class="col-sm-3 text-right control-label col-form-label">Subscription End Date</label>
                      <div class="col-sm-4">
                          @php
                            if(!is_null(Auth::user()->trial_ends_at)) {
                              $trial_ends_at = new DateTime(Auth::user()->trial_ends_at);
                              $trial_ends_at = $trial_ends_at->format('Y-m-d\TH:i');
                            } else {
                              $trial_ends_at = '';
                            }
                          @endphp

                          <input type="datetime-local" class="form-control" id="trial_ends_at" name='trial_ends_at' value="{{$trial_ends_at}}" readonly>
                      </div>
                </div> --}}
          
                <input type="submit" class="button border-greenLight c-greenLight bg-empty" name="Submit" value="Submit">
                <a href="editpassword" class="c-greenLight float-right">
                    <small>Update Password</small>
                </a>
            </form>
          
            
        </div>

        <div class="col-sm-12 col-lg-2"></div>    
    </div>
    

    
@endsection