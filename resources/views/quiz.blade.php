@extends('layouts.master')

@section('contentOne')
    <div class="row text-left bg-grayLight c-greenLight quiz">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-12 p-5 rounded">
                    <div class="row">
                        <div class="col-6">
                            <h4>Present</h4>
                        </div>
                        <div class="col-6 text-right">
                            <h4><i>To lie</i></h4>
                        </div>
                    </div>
                    <h1>Mentir</h1>
                    <h5>Yo</h5>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="row">
                            <div class="col-8">
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
                            <div class="col-4">
                                <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                                    <b>Check</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                    <em class="bg-greenLight c-white rounded p-2 pointer">á</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">é</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">í</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">ó</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">ú</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">ñ</em>
                    <em class="bg-greenLight c-white rounded p-2 pointer">ü</em>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
    <div class="row text-left bg-danger c-white px-5 py-2 opacity-25">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Wrong</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h6>Yo miento</h6>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-danger c-white px-5 py-2">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Wrong</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h6>Yo miento</h6>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-orange c-white px-5 py-2 opacity-25">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Wrong</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h6>Yo miento</h6>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-orange c-white px-5 py-2">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Wrong</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h6>Yo miento</h6>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-success c-white px-5 py-2 opacity-25">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Correct</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-success c-white px-5 py-2">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Correct</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-greenLight c-white px-5 py-2 opacity-25">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Correct</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-greenLight c-white px-5 py-2">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h3>Correct</h3>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Continue</a>
                </div>    
            </div>
        </div>
    </div>
@endsection

{{-- @section('contentTwo')
    <div class="row text-left bg-grayLight c-greenLight quiz">
        <div class="col-sm-12 col-lg-2"></div>
            <div class="col-sm-12 col-lg-8 bg-white rounded">
                <div class="row">
                    <div class="col-12 p-5 rounded ">
                        <div class="row">
                            <div class="col-6">
                                <h4>Present</h4>
                            </div>
                            <div class="col-6 text-right">
                                <h4><i>To lie</i></h4>
                            </div>
                        </div>
                        <h1>Mentir</h1>
                        <h5>Yo</h5>
                        <form action="/quiz" class="clearfix">
                            @csrf
                            <div class="row">
                                <div class="col-8">
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
                                <div class="col-4">
                                    <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                                        <b>Check</b>
                                    </button>    
                                </div>    
                            </div>
                        </form>
                        <em class="bg-greenLight c-white rounded p-2 pointer">ü</em>
                    </div>        
                </div>
            </div>
            <div class="col-sm-12 col-lg-2"></div>
        </div>

    </div>
    <div class="row text-left bg-success c-white px-5 py-3">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h1>Correct</h1>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-success">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-greenLight c-white px-5 py-3">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h1>Correct</h1>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-greenLight">Continue</a>
                </div>    
            </div>
        </div>
    </div>
@endsection --}}