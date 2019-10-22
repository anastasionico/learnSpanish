@extends('layouts.master')

@section('contentOne')
    <div class="row  p-5 text-left bg-grayLight">
        <div class="col-sm-12 col-lg-2"></div>    
    
        <div class="col-sm-12 col-lg-8 rounded bg-white regulation-section">
            <form method="POST" action="updatepassword" class="form-horizontal">
                @method('PATCH')
                @csrf
                
                <h4 class="c-greenLight">Update Password</h4>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Type new password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name='password' value="{{Auth::user()->password}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Confirm new password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password_confirmation" name='password_confirmation' required>
                    </div>
                </div>
                
                <input type="submit" class="button border-greenLight c-greenLight bg-empty" name="Submit" value="Submit">
            </form>
            
        </div>

        <div class="col-sm-12 col-lg-2"></div>    
    </div>
@endsection