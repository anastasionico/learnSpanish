@extends('layouts.master')

@section('contentOne')
    <div class="row bg-grayLight c-greenLight p-5">
        <div class="col-sm-12 text-center">
            <h1>Pricing</h1>
            <p>
                By creating an account, you will benefit from our Bots that used advanced spaced repetition
                algorithms, so that you revisit the relevant verb forms at appropriate intervals for the most
                efficient learning. Our Bots will also remember you from one visit to the next.
            </p>
            <p>
                We will not use your details for marketing purposes unless you opt-in, and we do not pass on
                your details to third parties. At EsPapaya.com we are fully GDPR compliant, and you can delete
                your account and personal details at any time.
            </p>
            <p>Choose from one of the following two account options:</p>
        </div>
    </div>
    <div class="row bg-grayLight p-5">
        <div class="col-sm-12 col-lg-4 p-4 bg-white rounded">
            <h6 class="c-greenLight">Option 1: Free Plan</h6>
            <h2 class="c-greenLight">No Fees</h2>
            
            <div class="py-4">
                <small>3 tenses</small><br>
                <small>Verb Practice Gameplay</small><br>
                <small>Efficient Learning</small><br>
                <small>Durable knowledge retentions</small><br>
                <small>Ad-free learning</small><br>
            </div>
            
            <p>Benefit from our spaced repetition Bots Unlocks all tenses and access to more verb forms.</p>
            <a href='/start-quiz' class="button bg-orange">
                Sign up
            </a>    
        </div>
        <div class="col-sm-12 col-lg-1"></div>
        <div class="col-sm-12 col-lg-7">
            <div class="bg-white p-4 rounded mb-5">
                <h6 class="c-greenLight">Option 2: Paid Account</h6>
                <h2 class="c-greenLight">$4.99/Year</h2>
                <p>Benefit from our spaced repetition Bots</p>
                <p>Unlock all tenses <b>and</b> all verb forms within our database</p>
                <p>Ad-free learning</p>
                <p>We will not automatically renew your subscription</p>
                <a href='/start-quiz' class="button bg-orange">
                    Sign Up
                </a>    
            </div>
            {{-- <div class="bg-white p-4 rounded">
                <strong class="c-greenLight">We’ve brought together over ????</strong>
                <p>Different Spanish verb forms all in one place. If you simply want to practice Spanish verbs, then espapaya.com is for you.</p>
                
            </div> --}}
            
        </div>
    </div>

    
@endsection