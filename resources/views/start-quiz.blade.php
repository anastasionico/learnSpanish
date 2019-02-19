@extends('layouts.master')

@section('contentOne')
    <div class="row p-5 text-left bg-grayLight c-greenDark">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded py-4">
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Present
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Preterite
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Past Participle
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Imperfect
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Subjuntive
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Conditional
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Future
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Imperfect
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Imperative
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 p-5 text-center bg-grayLight">
            <a href='/quiz' class="button bg-orange c-orange">
                Start
            </a>
        </div>
    </div>
@endsection

