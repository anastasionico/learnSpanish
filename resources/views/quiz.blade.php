@extends('layouts.master')

{{-- @section('contentOne')
    <div class="row text-left bg-grayLight c-greenLight" style="padding: 10rem 0">
        <h1>1</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-4 rounded" style="
                    background-image: url({{asset('img/footer.jpg')}}); 
                    background-position: right;
                    background-repeat: no-repeat;
                    background-size: auto;  ">
                </div>
                <div class="col-8 p-5 rounded">
                    <b>Present</b>
                    <h1>Mentir</h1>
                    <p class="mt-5">Yo</p>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" class="form-control p-0 c-greenLight" id="name" placeholder="">
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty float-right">
                            <b>Check Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>

    <div class="row text-left bg-grayLight c-greenLight" style="padding: 10rem 0">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-4 rounded" style="
                    background-image: url({{asset('img/footer.jpg')}}); 
                    background-position: right;
                    background-repeat: no-repeat;
                    background-size: auto;  
                    background-color: #92bf2a;
                    background-blend-mode: hard-light;

                    ">
                </div>
                <div class="col-8 p-5 rounded">
                    <b>Present</b>
                    <h1>Mentir</h1>
                    <p class="mt-5">Yo</p>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" class="form-control p-0 c-greenLight" id="name" value="Miento">
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty float-right">
                            <b>Right!</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>

    <div class="row text-left bg-grayLight c-greenLight" style="padding: 10rem 0">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-4 rounded" style="
                    background-image: url({{asset('img/footer.jpg')}}); 
                    background-position: right;
                    background-repeat: no-repeat;
                    background-size: auto;  
                    background-color: red;
                    background-blend-mode: hard-light;

                    ">
                </div>
                <div class="col-8 p-5 rounded">
                    <b>Present</b>
                    <h1>Mentir</h1>
                    <p class="mt-5">Yo</p>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" class="form-control p-0 c-danger" id="name" value="Mientes">
                        </div>
                        <button type="submit" class="button border-danger c-danger bg-empty float-right">
                            <b>Wrong!</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection

@section('contentTwo')
    
    <div class="row p-5 text-center bg-grayLight c-greenLight"  style="padding: 10rem 0">
        <h1>2a</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
                    <p class="mt-5">Yo</p>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" 
                                class="form-control border-greenLight c-greenLight" 
                                style="
                                    padding: 1.5rem 3rem;
                                    border:2px solid #92bf2a;
                                    border-radius: 30px;

                                " 
                                id="name" 
                                placeholder="Your Answer ..." >
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty">
                            <b>Check Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
    
    <div class="row p-5 text-center bg-grayLight c-greenLight" style="padding: 10rem 0">
        <h1>2b</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" 
                                class="form-control border-greenLight c-greenLight" 
                                style="
                                    padding: 1.5rem 3rem;
                                    border:2px solid #92bf2a;
                                    border-radius: 30px;

                                " 
                                id="name" 
                                placeholder="Yo" >
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                            <b>Check Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection

@section('contentThree')
    
    <div class="row text-center c-greenLight" style="background-color: #92bf2a; padding: 10rem 0;">
        <h1 style="color: #ea6837">3a</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded"  style="box-shadow: 0px 20px 20px #4d6516;">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" 
                                class="form-control border-greenLight c-greenLight" 
                                style="
                                    padding: 1.5rem 3rem;
                                    border:2px solid #92bf2a;
                                    border-radius: 30px;

                                " 
                                id="name" 
                                placeholder="Yo" >
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                            <b>Check Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>

    
    <div class="row text-center c-greenLight" style="background-color: #92bf2a; padding: 10rem 0;">
        <h1 style="color: #ea6837">3b</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded"  style="box-shadow: 0px 20px 20px #4d6516;">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
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
                                        placeholder="Yo" >
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                                    <b>Answer</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>

    
    <div class="row text-left c-greenLight" style="background-color: #92bf2a; padding: 10rem 0;">
        <h1 style="color: #ea6837">3c</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded"  style="box-shadow: 0px 20px 20px #4d6516;">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
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
                                        placeholder="Yo" >
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                                    <b>Answer</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection


@section('contentFour')
    
    <div class="row text-center c-greenLight" 
        style="
            padding: 10rem 0;
            background-image: url({{asset('img/footer.jpg')}}); 
            /*background-position: right;*/
            background-repeat: no-repeat;
            background-size: auto;  
            background-color: #92bf2a;
            background-blend-mode: hard-light;
        ">
        <h1>4a</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded"  style="box-shadow: 0px 20px 20px rgba(0,0,0,0.5);">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" 
                                class="form-control border-greenLight c-greenLight" 
                                style="
                                    padding: 1.5rem 3rem;
                                    border:2px solid #92bf2a;
                                    border-radius: 30px;

                                " 
                                id="name" 
                                placeholder="Yo" >
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                            <b>Check Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>

    
    <div class="row text-center c-greenLight" 
        style="
            padding: 10rem 0;
            background-image: url({{asset('img/footer.jpg')}}); 
            /*background-position: right;*/
            background-repeat: no-repeat;
            background-size: auto;  
            background-color: #92bf2a;
            background-blend-mode: hard-light;
        ">
        <h1>4b</h1>
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded"  style="box-shadow: 0px 20px 20px rgba(0,0,0,0.5);">
            <div class="row">
                <div class="col-12 p-5 rounded ">
                    <b>Present</b>
                    <h1 style="font-size: 5rem">Mentir</h1>
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
                                        placeholder="Yo" >
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="button border-greenLight c-greenLight bg-empty  float-right">
                                    <b>Answer</b>
                                </button>    
                            </div>    
                        </div>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection --}}

@section('contentFive')
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
                    </div>        
                </div>
            </div>
            <div class="col-sm-12 col-lg-2"></div>
        </div>

    </div>
    <div class="row text-left bg-danger c-white px-5 py-3">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h1>Wrong</h1>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h4>Yo miento</h4>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-danger">Continue</a>
                </div>    
            </div>
        </div>
    </div>
    <div class="row text-left bg-orange c-white px-5 py-3">
        <div class="col-sm-12 col-lg-1">    
        </div>
        <div class="col-sm-12 col-lg-5">
            <h1>Wrong</h1>
        </div>
        <div class="col-sm-12 col-lg-6">
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-1">    
                </div>
                <div class="col-sm-12 col-lg-5">
                    <h4>Yo miento</h4>
                </div>
                <div class="col-sm-12 col-lg-6 text-right">
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Report</a>
                    <a href="#" class="button border-white c-white bg-empty mx-1 button-orange">Continue</a>
                </div>    
            </div>
        </div>
    </div>
@endsection

@section('contentSix')
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
@endsection