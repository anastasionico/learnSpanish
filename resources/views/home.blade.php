@extends('layouts.master')

@section('hero')
    <div class="row text-center hero position-relative"  style="background-image: url({{asset('img/home/hero.jpg')}});">
        <div class="col-sm-12 text-center">
            <span class="fa-stack speechBobble"> 
                <i class="fas fa-comments fa-stack-2x c-white">
                    <h6 class="fas fa-stack-1x c-orange position-absolute speechText">
                        ¡HOLA!
                    </h6>
                </i>
                
            </span>
            <div class="position-absolute text-center pb-4 salesPitch"  style="bottom: 0; left: 0; right: 0;">
                <p class="c-white">
                    Learn Spanish verbs. <b>More Efficiently.</b>
                </p  class="c-white bg-orange">
                <a href='/start-quiz' class="button bg-orange">
                    Start Today
                </a>    
            </div>    
        </div>
    </div>
    {{-- <div class="row hero" style="background-image: url({{asset('img/home/hero.jpg')}});">

    </div>
    <div class="row pb-5 text-center hero-sub">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8">
            <p class="c-white">
                Learn Spanish Verbs. <b>More Efficiently.</b>
            </p  class="c-white bg-orange">
            <a href='/start-quiz' class="button bg-orange">
                Start Today
            </a>
        </div>
        <div class="col-sm-12 col-lg-2"></div>

    </div> --}}
@endsection

@section('contentOne')
    <div class="row bg-white c-greenLight description">
        <div class="col-sm-12 col-lg-1"></div>
        <div class="col-sm-12 col-lg-10">
            We’ve brought together thousands of different Spanish verb forms all in one place. If you simply want to practise Spanish verbs, then <b>espapaya.com</b> is for you.
        </div>
        <div class="col-sm-12 col-lg-1"></div>
    </div>
@endsection

@section('contentTwo')
    <div class="row text-left bg-grayLight usp">
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-orange">Verb practice gameplay</h2>
            <p>Our verb practice gameplay brings together key Spanish verb conjugations over the most important tenses: present, preterite, imperfect, future, conditional, present subjunctive, both imperfect subjunctives, affirmative and negative imperatives, as well as the present and past participles. </p>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/target.png')}}" class="w-50">
        </div>
        
    </div>
@endsection
@section('contentThree')
    <div class="row text-left bg-white warning usp">
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/userIcon.png')}}" class="w-50">
        </div>
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-warning">Efficient learning</h2>
            <p>Make your learning more efficient by creating an account; account–holders can select any combination of tenses to learn, and our bots will track your learning from one session to the next.
            </p>
            <p>
                <b>Click <a href="pricing">here</a> to create an account</b>we won’t use your details for our marketing unless you opt in and you can completely delete your personal details at any time.
            </p>
        </div>
    </div>
@endsection
@section('contentFour')
    <div class="row text-left bg-grayLight usp">
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-info">Durable knowledge retentions</h2>
            <p>Our bots use spaced repetition, revisiting information at increasing intervals of time to produce long-term durable retention of knowledge. Our advanced systems also group together identical and similar verb forms, so that you don’t waste time learning the same verb forms.</p>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/brain.png')}}" class="w-50">
        </div>
        
    </div>
@endsection
@section('contentFive')
    <div class="row text-left bg-white danger usp">
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/adFree.png')}}" class="w-50">
        </div>
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-alert">Ad-free learning</h2>
            <p>Create a paid account for ad-free learning and access to our entire database of verb forms. <b>Click <a href="/">here</a> to create a paid account.</b>
            </p>
        </div>
    </div>
@endsection
@section('contentSix')
    <div class="row text-left bg-greenLight description">
        <div class="col-sm-12 col-lg-8 c-white">
            Work smart, not hard, with <b>espapaya.com</b>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <a href='/start-quiz' class="button bg-orange d-block">
                Start Today
            </a>
        </div>
        
    </div>
@endsection