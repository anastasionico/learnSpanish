@extends('layouts.master')

@section('contentOne')
    <form method='GET' action='/quiz'>
        @include('layouts.error')
        {{-- @method('POST') --}}
        {{-- @csrf --}}

        
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
                                <input type="checkbox" name="{{ $tense }}" value="{{ $tense }}"> 
                                <span class="slider round"></span>
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
            <div class="col-sm-12 col-lg-4"></div>
            <div class="col-sm-12 col-lg-4">
                <p class="mb-5"><small>Create an account to unlock tenses</small></p>
                <input type="submit" class="button button-orange-stripe border-orange c-orange bg-empty mx-1 hover-orange" value="Start">
                {{-- <a href='/quiz' class="">
                    Start
                </a> --}}



                {{-- This page has been temporarily hidden until Ian wants to unlock it --}}
                {{-- <a href='/pricing' class="button bg-orange c-orange mx-1">
                    Sign Up
                </a> --}}
            </div>
            <div class="col-sm-12 col-lg-4"></div>
        </div>
    </form>
@endsection

