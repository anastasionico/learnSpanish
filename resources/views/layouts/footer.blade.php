<footer  class="container-fluid"  style="background-image: url({{asset('img/footer.jpg')}});">>
	<div class="row p-5 c-greenLight">
        <div class="col-sm-12 col-lg-4 text-left slogan">
        	<img src="{{asset('img/EspapyaLogo.png')}}" class="w-50 pb-4">
        	<p class="c-orange mb-0">Learn Spanish verbs.</p>
        	<p class="mb-0">More efficiently.</p>
        </div>
        <div class="col-sm-12 col-lg-4  text-left">
        	<h5 class="mb-3">Contact Us</h5>

        	<form action="/messages">
        		@csrf
			  	
			  	<div class="form-group m-0 mb-3">
			    	<input type="name" class="form-control p-0" id="name" placeholder="Name (required)">
			  	</div>
			  	<div class="form-group m-0 mb-3">
			    	<input type="email" class="form-control p-0" id="email"  placeholder="E-mail Address (required)">
			  	</div>
			  	

			  	<div class="form-group m-0 mb-3">
			      	<textarea name='message' class="form-control p-0" rows="1">Message
					</textarea>
			  	</div>
			  	<button type="submit" class="button border-greenLight c-greenLight bg-empty">
                    <b>GET IN TOUCH</b>
                </button>
			</form>
        </div>
        <div class="col-sm-12 col-lg-4 c-greenLight text-left"> 
        	<img src="{{asset('img/social/twitterLogo.svg')}}" class="mb-3 social">
            <p><a href="#">Terms & Conditions</a></p>
        	<p><a href="#">Privacy & Cookie Policy</a></p>
        </div>
    </div>
    <div class="row p-2 text-center c-greenLight copyright">
        <div class="col-sm-12 col-lg-4 text-left"></div>
        <div class="col-sm-12 col-lg-4 text-left c-greenLight">
                <small>Copyright &copy; 2019</small>
        </div>
        <div class="col-sm-12 col-lg-4 text-left"></div>
    </div>
</footer>