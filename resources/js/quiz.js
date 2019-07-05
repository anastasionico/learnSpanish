window.onload = function () {

	const quizForm = document.getElementById("quizForm");
	const name = document.getElementById("name");
	const correctAlert = document.getElementById("correctAlert");
	const incorrectAlert = document.getElementById("incorrectAlert");
	const incorrectAlertAnswer = document.getElementsByClassName("answer-outcome-bottom-english");
	const incorrectAlertAnswerFirst = incorrectAlertAnswer[0];
	const letterá = document.getElementById("letterá");
	const letteré = document.getElementById("letteré");
	const letterí = document.getElementById("letterí");
	const letteró = document.getElementById("letteró");
	const letterú = document.getElementById("letterú");
	const letterü = document.getElementById("letterü");
	const letterñ = document.getElementById("letterñ");
	

	
	quizForm.addEventListener("submit", function(event){
	  event.preventDefault();
	  
	  // get the right anwer 
	  let conjugationName = document.forms["quizForm"]["conjugationName"].value;
	  // get the answer from the player
	  let answer = document.forms["quizForm"]["answer"].value;

	  if (answer.trim().toLowerCase() === conjugationName.toLowerCase()) {
	    
	    correctAlert.style.opacity = 1;
	    incorrectAlert.style.display = 'none';
		// alert("correct answer");
	    // return false;

	  } else {
	    
	    incorrectAlert.style.opacity = 1;
	    correctAlert.style.display = 'none';
	    incorrectAlertAnswerFirst.innerHTML = conjugationName;
	  	// alert("wrong");
	  	// return true;

	  }
	});

	const continueButton = document.getElementsByClassName("answer-outcome-bottom-continue_a");
	$.ajaxSetup({
		headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	for (var i = 0; i < continueButton.length; i++) {
	    continueButton[i].addEventListener('click', function(event){
    	
			event.preventDefault();
			// var data = $('quizForm').serialize();
			// $.post('/valuateAnswer', data);
			var _token = $("input[name=_token]").val();
			var tenses = $("input[name='tenses\\[\\]']")
							.map(function(){return $(this).val();}).get();
			
			var conjugationId = $("input[name=conjugationId]").val();
			var conjugationName = $("input[name=conjugationName]").val();
			var answer = $("input[name=answer]").val();

			$.ajax({
	        	url: '/valuateAnswer',
	          	
	          	type: 'POST',
	          	data:{token:_token,tenses:tenses,conjugationId:conjugationId,conjugationName:conjugationName,answer:answer},
	          	
	          	success:function(data){
	          		location.href = window.location.href;
			  	},
	          	error: function(errorThrown){
			    	console.log(errorThrown);
			    }       
	     	});
		}, false);
	}

	letterá.onclick = function(){
		name.value += 'á';
	};
	letteré.onclick = function(){
		name.value += 'é';
	};
	letterí.onclick = function(){
		name.value += 'í';
	};
	letteró.onclick = function(){
		name.value += 'ó';
	};
	letterú.onclick = function(){
		name.value += 'ú';
	};
	letterü.onclick = function(){
		name.value += 'ü';
	};
	letterñ.onclick = function(){
		name.value += 'ñ';
	};
	
}

