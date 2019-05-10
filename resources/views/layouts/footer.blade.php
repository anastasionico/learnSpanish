@php
    $request_uri = "$_SERVER[REQUEST_URI]";
@endphp
@if($request_uri !== '/quiz')
    <footer  class="container-fluid"  style="background-image: url({{asset('img/footer.jpg')}});">
        <div class="row c-greenLight footer-upper">
            <div class="col-sm-12 col-lg-4 text-left slogan">
                <a href="{{ url('/') }}"><img src="{{asset('img/EspapayaLogo.png')}}" class="w-50 pb-4"></a>
                <p class="c-orange mb-0">Learn Spanish verbs.</p>
                <p class="mb-0">More efficiently.</p>
            </div>
            <div class="col-sm-12 col-lg-4  text-left">
                <h5 class="mb-3">Contact Us</h5>

                <form action="/messages">
                    @csrf
                    
                    <div class="form-group m-0 mb-3">
                        <input type="text" class="form-control p-0" id="name" placeholder="Name (required)">
                    </div>
                    <div class="form-group m-0 mb-3">
                        <input type="email" class="form-control p-0" id="email"  placeholder="E-mail Address (required)">
                    </div>
                    

                    <div class="form-group m-0 mb-3">
                        <textarea name='message' class="form-control p-0" rows="1">Message
                        </textarea>
                    </div>
                    <button type="submit" class="button border-greenLight c-greenLight bg-empty">
                        <b>Get In Touch</b>
                    </button>
                </form>
            </div>
            <div class="col-sm-12 col-lg-4 mb-3 c-greenLight text-left"> 
                <span class="social mb-3 d-inline-block">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </span>
                <p><a href="terms">Terms & Conditions</a></p>
                <p><a href="privacy">Privacy & Cookie Policy</a></p>
            </div>
        </div>
        
        <div class="row p-2 text-center footer-lower c-greenLight copyright">
            <div class="col-sm-12 col-lg-4 text-left"></div>
            <div class="col-sm-12 col-lg-4 text-left c-greenLight">
                <small>Copyright &copy; 2019</small>
            </div>
            <div class="col-sm-12 col-lg-4 text-left">
                <a href="http://anastasionico.uk">
                    <small style="font-size: 8px">
                        developed by <img src="{{asset('img/anastasionico.ico')}}" style="width: 10px">
                    </small>    
                </a>
                
            </div>
        </div>
    </footer>
@endif