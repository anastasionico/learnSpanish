@extends('layouts.master')

@section('contentOne')
    <div class="row text-left bg-grayLight c-greenLight quiz">
        <div class="col-sm-12 col-lg-2 text-right">
            <a href="/" class="quiz-exit"><i class="fas fa-times fa-2x"></i></a>
            <br>
            @if($text == 'Free Mode')
                <div class="quiz-ad">
                    <h3>{{$text}}</h3>    
                    <a href='/pricing' class="button bg-orange">
                        Sign Up
                    </a>    
                </div>
            @endif
        </div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-12 p-3 rounded">
                    <h4>{{ strtolower($conjugation->tense) }}</h4>
                    <div class="row">
                        <div class="col-sm-12 col-lg-8">
                            <h1>{{ strtolower($conjugation->verb_spa) }}</h1>
                        </div>
                        <div class="col-sm-12 col-lg-4 text-right verb-eng">
                            <h3><i>to {{ strtolower($conjugation->verb_eng) }}</i></h3>
                        </div>
                    </div>
                    
                    <h5>
                        @if(isset($conjugation->pronoun))
                            {{ strtolower($conjugation->pronoun) }}
                        @endif
                    </h5>

                    <form action="" method="POST" class="clearfix" id="quizForm">
                    {{-- <form action="/valuateAnswer" method="POST" class="clearfix"> --}}
                        @csrf

                        @foreach($tensesRequestedByUser as $tenseRequestedByUser)
                            {{-- <input type="hidden" name="{{$tenseRequestedByUser}}" value="{{$tenseRequestedByUser}}"> --}}
                            <input type="hidden" name="tenses[]" value="{{$tenseRequestedByUser}}">
                        @endforeach

                        <input type="hidden" name="conjugationId" value="{{ $conjugation->id }}">
                        <input type="hidden" name="conjugationName" value="{{ $conjugation->name }}">

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
                                        placeholder="insert your answer ..." 
                                        {{-- placeholder="{{ $conjugation->name }}"  --}}
                                        name='answer' autofocus autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <input type="submit" class="button button-greenLight-stripe border-greenLight c-greenLight bg-empty  float-right" value="Check">
                            </div>    
                        </div>
                    </form>
                    <div class="py-3">
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letterá">á</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letteré">é</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letterí">í</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letteró">ó</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letterú">ú</em>
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letterü">ü</em>    
                        <em class="bg-greenLight c-white rounded p-2 mr-1 pointer" id="letterñ">ñ</em>
                    </div>
                </div>        
            </div>
        </div>

        <div class="col-sm-12 col-lg-2">
            <br>
            <br>
                @if($text == 'Free Mode')
                <div class="quiz-ad">
                    <h3>{{$text}}</h3>    
                    <a href='/pricing' class="button bg-orange">
                        Sign Up
                    </a>    
                </div>
            @endif
        </div>
    </div>
@endsection

@section('contentTwo')
    <div id="incorrectAlert">
        <div class="row bg-orange-opaque c-orange answer-outcome-top">
            <div class="col-sm-12 col-lg-2 pt-3">
            </div>
            <div class="col-sm-12 col-lg-8">
                <h3>Incorrect</h3>
            </div>
            <div class="col-sm-12 col-lg-2">
            </div>
        </div>
        <div class="row bg-orange-opaque c-orange answer-outcome-bottom pb-3">
            <div class="col-sm-12 col-lg-2 answer-outcome-bottom-icon">
                <i class="fas fa-times fa-4x "></i>
            </div>
            <div class="col-sm-12 col-lg-8 answer-outcome-bottom-info">
                <small>Correct answer:</small>
                <b class="mb-0 answer-outcome-bottom-english">&nbsp;</b>

                <form method="POST" action="/messages/add">
                    @csrf
                    
                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    

                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="message" name="message" value="user {{ Auth::user()->name }} ({{ Auth::user()->email }}) reported error with {{ strtolower($conjugation->verb_spa) }} of {{ strtolower($conjugation->verb_spa) }} on {{ $conjugation->name }}">
                    </div>
                    <button type="submit" class="button button-small border-orange c-orange bg-empty button-orange answer-outcome-bottom-report position-absolute">
                        <i class="fas fa-flag"></i> Report
                    </button>
                </form>
            
            </div>
            <div class="col-sm-12 col-lg-2 answer-outcome-bottom-continue">
                <a class="button border-orange c-orange bg-empty button-orange answer-outcome-bottom-continue_a">Continue</a>
            </div>
        </div>
    </div>
    <div id="correctAlert">
        <div class="row bg-greenLight-opaque c-greenLight answer-outcome-top">
            <div class="col-sm-12 col-lg-2 pt-3">
            </div>
            <div class="col-sm-12 col-lg-8">
                <h3>Correct</h3>
            </div>
            <div class="col-sm-12 col-lg-2">
            </div>
        </div>
        <div class="row bg-greenLight-opaque c-greenLight answer-outcome-bottom pb-3">
            <div class="col-sm-12 col-lg-2 answer-outcome-bottom-icon">
                <i class="fas fa-check fa-4x"></i>
            </div>
            <div class="col-sm-12 col-lg-8 answer-outcome-bottom-info ">
                <small>&nbsp;</small>
                <b class="mb-0 answer-outcome-bottom-english">&nbsp;</b>
                
                <form method="POST" action="/messages/add">
                    @csrf
                    
                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="email" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    

                    <div class="form-group m-0 mb-3">
                        <input type="hidden" class="form-control p-0" id="message" name="message" value="user {{ Auth::user()->name }} ({{ Auth::user()->email }}) reported error with {{ strtolower($conjugation->verb_spa) }} of {{ strtolower($conjugation->verb_spa) }} on {{ $conjugation->name }}">
                    </div>
                    <button type="submit" class="button button-small border-greenLight c-greenLight bg-empty button-greenLight answer-outcome-bottom-report position-absolute">
                        <i class="fas fa-flag"></i> Report
                    </button>
                </form>

            </div>
            <div class="col-sm-12 col-lg-2 answer-outcome-bottom-continue">
                <a class="button border-greenLight c-greenLight bg-empty button-greenLight answer-outcome-bottom-continue_a">Continue</a>
            </div>
        </div>
    </div>
    <script type="application/javascript" src="{{ asset('js/quiz.js') }}"></script>


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