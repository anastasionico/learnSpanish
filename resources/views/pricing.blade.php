@extends('layouts.master')

@section('contentOne')
    
    <div class="row bg-grayLight c-greenLight section-pricing-description">
        <div class="col-sm-12">
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
    
    <div class="row bg-grayLight p-4 section-pricing">
        <div class="col-sm-12 col-lg-12 p-3 mb-5 bg-white rounded section-pricing-div">
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
                Start Now
            </a>    
        </div>
        
        @php
            $i=1;
        @endphp
        @foreach($plans as $plan)
            <div class="col-sm-12 col-lg-5 p-3 mb-5 bg-white rounded section-pricing-div">
                <h6 class="c-greenLight">Option {{++$i}}: {{$plan->name}}</h6>
                <h2 class="c-greenLight">£ {{$plan->cost}}/Month</h2>
                <p>{{$plan->description}}</p>



                @if($user->subscribed($plan->name))
                    <span class="button bg-grayLight" disabled="disabled">
                        Plan in Use
                    </span>    
                    {{-- <form method="post" action='subscriptionCancel'>
                        <button type="submit" value="Cancel" class="button bg-grayLight no-border">Cancel</button>
                        
                    </form> --}}

                @else
                    @if(!$userSubscribed)
                        <a href='showplan/{{$plan->name}}' class="button bg-orange">
                            Sign Up
                        </a>    
                    @else
                        <a href='swapplan/{{$plan->name}}' class="button bg-orange">
                            Swap 
                        </a>    
                    @endif
                @endif


{{-- 

                @if(!$user->subscribed($plan->name))
                    <a href='showplan/{{$plan->name}}' class="button bg-orange">
                        Sign Up
                    </a>    
                @else
                    <span class="button bg-grayLight" disabled="disabled">
                        Plan in Use
                    </span>    
                @endif --}}
            </div>    

            <div class="col-sm-12 col-lg-2"></div>
        @endforeach


        {{-- @if(isset($plans[0]))
        <div class="col-sm-12 col-lg-5 p-2 bg-white rounded section-pricing-div">
                <h6 class="c-greenLight">Option 2: {{$plans[0]->name}}</h6>
                <h2 class="c-greenLight">£ {{$plans[0]->cost}}/Month</h2>
                <p>{{$plans[0]->description}}</p>
                <a href='showplan/{{$plans[0]->name}}' class="button bg-orange">
                    Sign Up
                </a>    
            </div>    
        @endif --}}
    </div>

    {{-- <div class="row bg-grayLight p-4 section-pricing">
        @if(isset($plans[1]))
            <div class="col-sm-12 col-lg-7 bg-white p-2 rounded section-pricing-div">
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
        @endif

        <div class="col-sm-12 col-lg-1"></div>
        
        @if(isset($plans[0]))
            <div class="col-sm-12 col-lg-4 p-2 bg-white rounded section-pricing-div">
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
        @endif
    </div>

    @if(count($plans) > 3)
        @foreach($plans as $plan)
            <div class="col-sm-12 col-lg-6 p-2 bg-white rounded section-pricing-div">
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
        
        @endforeach

    @endif
 --}}


@endsection