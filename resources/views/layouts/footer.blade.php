<footer>
	<div class="row p-3 text-center c-greenLight" style='background: black'>
        <div class="col-sm-12 col-lg-4">
        	<p>Logo espapaya.com</p>
        	<p class="c-orange">Learn Spanish verbs</p>
        	<p class="">More efficiently</p>
        </div>
        <div class="col-sm-12 col-lg-4">
        	<p>Contact Us</p>

        	<form action="/messages">
        		@csrf
			  	
			  	<div class="form-group">
			    	<input type="name" class="form-control" id="name">
			  	</div>
			  	<div class="form-group">
			    	<input type="email" class="form-control" id="email">
			  	</div>
			  	

			  	<div class="form-group">
			      	<textarea name='message' class="form-control">
						Insert message
					</textarea>
			  	</div>
			  	<button type="submit" class="button border-greenLight c-greenLight bg-transparent">GET IN TOUCH</button>
			</form>
        </div>
        <div class="col-sm-12 col-lg-4  c-greenLight">
        	<p>insta logo</p>
        	<p>insta logo</p>
        	<p>insta logo</p>
        </div>
    </div>
</footer>