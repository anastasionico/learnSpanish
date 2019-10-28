@extends('layouts.master')

@section('contentOne')
    <form method='GET' action='/quiz'>
        @include('layouts.error')
        {{-- Tense's div --}}
        <div class="row pt-5 text-left bg-grayLight c-greenDark tenses">
            <div class="col-sm-12 col-lg-2"></div>
            <div class="col-sm-12 col-lg-8 bg-white rounded py-4">
                @foreach($tenses as $tense)
                    <div class="row py-1">
                        <div class="col-8 pl-5">
                            {{ strtolower($tense) }}
                        </div>
                        <div class="col-4">
                            <label class="switch">
                                @guest
                                    @if($tense !== 'present' && $tense !== 'preterite' && $tense !== 'imperfect' && $tense !== 'future')
                                        <input type="checkbox" name="{{ $tense }}" value="{{ $tense }}" disabled> 
                                        <span class="slider round"></span>
                                    @else
                                        <input type="checkbox" name="{{ $tense }}" value="{{ $tense }}"> 
                                        <span class="slider round"></span>                                    
                                    @endif
                                @else 
                                    <input type="checkbox" name="{{ $tense }}" value="{{ $tense }}"> 
                                    <span class="slider round"></span>
                                @endguest
                                
                            </label>
                        </div>        
                    </div>
                @endforeach
            </div>
            <div class="col-sm-12 col-lg-2">
            </div>
        </div>
        
        {{-- Start and Sign Up buttons --}}
        <div class="row pb-5 text-center bg-grayLight c-greenDark">
            <div class="col-sm-12 col-lg-2"></div>
            <div class="col-sm-12 col-lg-8">
                @guest
                    <p class="mt-2">Sign up to unlock more tenses and activate our bots</p>
                @endguest                
    
                <input type="submit" class="button button-orange-stripe border-orange c-orange bg-empty mx-1 mt-5 hover-orange" value="Start">
            
                @guest
                    <a href='/register' class="button bg-orange c-orange mx-1">
                        Sign Up
                    </a>
                @endguest                
            
            </div>
            <div class="col-sm-12 col-lg-2"></div>
        </div>
    </form>
@endsection

