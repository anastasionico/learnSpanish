@extends('layouts.master')

@section('contentOne')
    <div class="row p-5 text-left bg-grayLight c-greenDark tenses">
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
                    <label class="switch" >
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
                      <input type="checkbox" >
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

    <div class="row p-5 text-left bg-grayLight c-greenDark tenses">
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
                      <input type="checkbox"  disabled>
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5">
                    Past Participle
                </div>
                <div class="col-4">
                    <label class="switch" >
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5 disabled">
                    Imperfect
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox"  disabled>
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5 disabled">
                    Subjuntive
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox" disabled>
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5 disabled">
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
                <div class="col-8 pl-5 disabled">
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
                <div class="col-8 pl-5 disabled">
                    Imperfect
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox" disabled>
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
            <div class="row py-1">
                <div class="col-8 pl-5 disabled">
                    Imperative
                </div>
                <div class="col-4">
                    <label class="switch">
                      <input type="checkbox" disabled>
                      <span class="slider round"></span>
                    </label>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 p-5 text-center bg-grayLight">
            <a href='/quiz' class="button border-orange c-orange bg-empty">
                Start
            </a>
            <a href='/pricing' class="button bg-orange c-orange mx-5">
                Register
            </a>
        </div>
    </div>
@endsection

