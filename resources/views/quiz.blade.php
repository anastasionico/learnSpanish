@extends('layouts.master')

@section('contentOne')
    <div class="row text-left bg-grayLight c-greenLight quiz">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <a href="/" class="quiz-exit"><i class="fas fa-times fa-2x m-2"></i></a>
            <div class="row">
                <div class="col-12 p-3 rounded">
                    <h4>Present</h4>
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <h1>Mentir</h1>
                        </div>
                        <div class="col-sm-12 col-lg-4 text-right pt-5">
                            <h3><i>To lie</i></h3>
                        </div>
                    </div>
                    
                    <h5>Yo</h5>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-8">
                                <div class="form-group m-0 mb-3">
                                    <input type="text" 
                                        class="form-control border-greenLight c-greenLight" 
                                        style="
                                            padding: 1.25rem 3rem;
                                            border:2px solid #92bf2a;
                                            border-radius: 30px;

                                        " 
                                        id="name" 
                                        placeholder="Your Answer ..." >
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <button type="submit" class="button button-greenLight-stripe border-greenLight c-greenLight bg-empty  float-right">
                                    <b>Check</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                    <div class="py-3">
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">á</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">é</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">í</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">ó</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">ú</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">ü</em>    
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer">ñ</em>
                    </div>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection

@section('contentTwo')
    <div>
        <div class="row bg-orange-opaque c-orange">
            <div class="col-sm-12 col-lg-2 pt-3">
            </div>
            <div class="col-sm-12 col-lg-8 pt-2">
                <h3>Incorrect</h3>
            </div>
            <div class="col-sm-12 col-lg-2">
            </div>
        </div>
        <div class="row answer-outcome-bottom bg-orange-opaque c-orange">
            <div class="col-sm-12 col-lg-2 text-center">
                <i class="fas fa-times-circle fa-4x"></i>
            </div>
            <div class="col-sm-12 col-lg-8">
                <small>Correct answer:</small>
                <p class="mb-0">Yo miento</p>
                <a href="#" class="button button-small border-orange c-orange bg-empty button-orange">
                    <i class="fas fa-flag"></i> Report
                </a>
            </div>
            <div class="col-sm-12 col-lg-2 mt-3">
                <a href="#" class="button border-orange c-orange bg-empty button-orange">Continue</a>
                
            </div>
        </div>
    </div>

    <div>
        <div class="row bg-greenLight-opaque c-greenLight">
            <div class="col-sm-12 col-lg-2 pt-3">
            </div>
            <div class="col-sm-12 col-lg-8 pt-2">
                <h3>Correct</h3>
            </div>
            <div class="col-sm-12 col-lg-2">
            </div>
        </div>
        <div class="row answer-outcome-bottom bg-greenLight-opaque c-greenLight">
            <div class="col-sm-12 col-lg-2 text-center">
                <i class="fas fa-check-circle fa-4x"></i>
            </div>
            <div class="col-sm-12 col-lg-8 mb-3">
                <a href="#" class="button button-small border-greenLight c-greenLight bg-empty button-greenLight">
                    <i class="fas fa-flag"></i> Report
                </a>
            </div>
            <div class="col-sm-12 col-lg-2 mt-3">
                <a href="#" class="button border-greenLight c-greenLight bg-empty button-greenLight">Continue</a>
            </div>
        </div>
    </div>
@endsection

{{-- @section('contentThree')
    <div class="row text-left bg-grayLight c-gray quiz">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <a href="/" class="quiz-exit"><i class="fas fa-times fa-2x m-2"></i></a>
            <div class="row">
                <div class="col-12 p-3 rounded">
                    <h4>Present</h4>
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <h1>Mentir</h1>
                        </div>
                        <div class="col-sm-12 col-lg-4 text-right pt-5">
                            <h3><i>To lie</i></h3>
                        </div>
                    </div>
                    
                    <h5>Yo</h5>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-8">
                                <div class="form-group m-0 mb-3">
                                    <input type="text" 
                                        class="form-control border-gray c-gray disabled" 
                                        id="name" 
                                        placeholder="Your Answer ..." >
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <button type="submit" class="button border-gray c-gray bg-empty  float-right">
                                    <b>Check</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                    <div class="py-3">
                        <em class="bg-gray c-white rounded p-2 pointer">á</em>
                        <em class="bg-gray c-white rounded p-2 pointer">é</em>
                        <em class="bg-gray c-white rounded p-2 pointer">í</em>
                        <em class="bg-gray c-white rounded p-2 pointer">ó</em>
                        <em class="bg-gray c-white rounded p-2 pointer">ú</em>
                        <em class="bg-gray c-white rounded p-2 pointer">ñ</em>
                        <em class="bg-gray c-white rounded p-2 pointer">ü</em>    
                    </div>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection --}}