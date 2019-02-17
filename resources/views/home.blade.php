@extends('layouts.master')

@section('hero')
    <div class="row hero" style="background-image: url({{asset('img/home/hero.jpg')}});">
    </div>
    <div class="row pb-5 text-center hero-sub">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8">
            <p class="c-white">
                Learn Spanish Verbs. <b>More Efficiently.</b>
            </p  class="c-white bg-orange">
            <a href='#' class="button bg-orange">
                Start Today
            </a>
        </div>
        <div class="col-sm-12 col-lg-2"></div>

    </div>
@endsection

@section('contentOne')
    <div class="row  p-5 text-center bg-white c-greenDark description">
        <div class="col-sm-12 col-lg-1"></div>
        <div class="col-sm-12 col-lg-10">
            We’ve brought together over ???? different Spanish verb forms all in one place. If you simply want to practice Spanish verbs, then <b>espapaya.com</b> is for you.
        </div>
        <div class="col-sm-12 col-lg-1"></div>
    </div>
@endsection

@section('contentTwo')
    <div class="row p-5 text-left bg-grayLight">
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-orange">Verb Practice Gameplay</h2>
            <p>Our verb practice gamelplay brings together the most important Spanish verb conjugations over all tenses. present, preterite, imperfect, conditional,future,present subjunctive, imperfect subjunctive, affirmative and negative iperatives.</p>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/target.png')}}" class="w-50">
        </div>
        
    </div>
@endsection
@section('contentThree')
    <div class="row p-5 text-left bg-white warning">
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/userIcon.png')}}" class="w-50">
        </div>
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-warning">Efficient Learning</h2>
            <p>
                Make your learning more efficient by creating an account. account holders can select any combination of tenses to leanr, and our bots will track your learning from one session to the next.
            </p>
            <p>
                <b>Click <a href="#">here</a> to create an account</b> - we won't use your details for our marketing unless you opt in and you can completely delete your personal details at any time.
            </p>
        </div>
    </div>
@endsection
@section('contentFour')
    <div class="row p-5 text-left bg-grayLight">
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-info">Durable knowledge retentions</h2>
            <p>
                Our bots use spaced repetition, revisiting information at increasing intervals of time to produce long-term durable retention of knowledge.
                Our advanced system also group together identica and similar verb form. so that you don't waste time learning the same verb forms.
            </p>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/brain.png')}}" class="w-50">
        </div>
        
    </div>
@endsection
@section('contentFive')
    <div class="row p-5 text-left bg-white danger">
        <div class="col-sm-12 col-lg-4 text-center">
            <img src="{{asset('img/home/adFree.png')}}" class="w-50">
        </div>
        <div class="col-sm-12 col-lg-8">
            <h2 class="c-alert">Ad-free learning</h2>
            <p>
                create a paid account for ad-free learning and access to our entire database of verb forms.
                <b>Click <a href="#">here</a> to create a paid account</b>
            </p>
        </div>
    </div>
@endsection
@section('contentSix')
    <div class="row p-5 text-left bg-greenLight section-cta">
        <div class="col-sm-12 col-lg-8 c-white">
            Work smart, not hard, with <b>espapaya.com</b>
        </div>
        <div class="col-sm-12 col-lg-4 text-center">
            <a href='#' class="button bg-orange">
                Start Today
            </a>
        </div>
        
    </div>
@endsection