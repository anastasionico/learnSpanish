@extends('layouts.master')

@section('contentOne')
    <div class="row bg-grayLight c-greenLight p-5">
        <div class="col-sm-12 text-center">
            <h1>Pricing</h1>
            <p>Use our Free plan or enroll to our our paid plan to unlock all the features with no ads</p>
        </div>
    </div>
    <div class="row bg-grayLight p-5">
        <div class="col-sm-12 col-lg-4 p-4 bg-white rounded">
            <h6 class="c-greenLight">Free Plan</h6>
            <h2 class="c-greenLight">$0/Month</h2>
            
            <div class="py-4">
                <small>3 tenses</small><br>
                <small>Verb Practice Gameplay</small><br>
                <small>Efficient Learning</small><br>
                <small>Durable knowledge retentions</small><br>
                <small>Ad-free learning</small><br>
            </div>
            
            <p>Press the button below and play Espapaya for free</p>
            <a href='/start-quiz' class="button bg-orange">
                Start Today
            </a>    
        </div>
        <div class="col-sm-12 col-lg-1"></div>
        <div class="col-sm-12 col-lg-7">
            <div class="bg-white p-4 rounded mb-5">
                <p>Unlock all tenses and learn like a pro</p>
                <h2 class="c-greenLight">$9.99/Month</h2>
                <a href='/start-quiz' class="button bg-orange">
                Register
            </a>    
            </div>
            <div class="bg-white p-4 rounded">
                <strong class="c-greenLight">We’ve brought together over ????</strong>
                <p>Different Spanish verb forms all in one place. If you simply want to practice Spanish verbs, then espapaya.com is for you.</p>
                
            </div>
            
        </div>
    </div>

    
@endsection