@extends('layouts.master')

@section('contentOne')
    <div class="row p-5 text-left bg-grayLight c-greenDark">
        <div class="col-sm-12 col-lg-2"></div>
        <div class="col-sm-12 col-lg-8 bg-white rounded">
            <div class="row">
                <div class="col-4" style="background: blue">
                    Present
                </div>
                <div class="col-8 p-5">
                    <b>Present</b>
                    <h1>Mentir</h1>
                    <p class="mt-5">Yo</p>
                    <form action="/quiz" class="clearfix">
                        @csrf
                        <div class="form-group m-0 mb-3">
                            <input type="text" class="form-control p-0 c-greenLight" id="name" placeholder="">
                        </div>
                        <button type="submit" class="button border-greenLight c-greenLight bg-empty float-right">
                            <b>Answer</b>
                        </button>
                    </form>
                </div>        
            </div>
        </div>
        <div class="col-sm-12 col-lg-2"></div>
    </div>
@endsection

