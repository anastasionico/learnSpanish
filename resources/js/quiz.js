window.onload = function () {

	const quizForm = document.getElementById("quizForm");
	const correctAlert = document.getElementById("correctAlert");
	const incorrectAlert = document.getElementById("incorrectAlert");
	const incorrectAlertAnswer = document.getElementsByClassName("answer-outcome-bottom-english");
	const incorrectAlertAnswerFirst = incorrectAlertAnswer[0];
	
	quizForm.addEventListener("submit", function(event){
	  event.preventDefault();
	  
	  // get the right anwer 
	  let conjugationName = document.forms["quizForm"]["conjugationName"].value;
	  // get the answer from the player
	  let answer = document.forms["quizForm"]["answer"].value;

	  if (answer.toLowerCase() === conjugationName.toLowerCase()) {
	    
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
			var data = $('quizForm').serialize();
			// $.post('/valuateAnswer', data);
			var _token = $("input[name=_token]").val();
			var tenses = $("input[name='tenses\\[\\]']")
							.map(function(){return $(this).val();}).get();
			
			var conjugationId = $("input[name=conjugationId]").val();
			var conjugationName = $("input[name=conjugationName]").val();
			
			// 	console.log(conjugationName);
			$.ajax({
	        	url: '/valuateAnswer',
	          	// dataType : 'string',
	          	type: 'POST',
	          	data:{token:_token,tenses:tenses,conjugationId:conjugationId,conjugationName:conjugationName},
	          	
	           	
	          	// contentType: false,
	          	// processData: false,
	          	success:function(data){
				  	location.href = window.location.href;
			  	},
	     //      	error: function(errorThrown){
			   //  	console.log(errorThrown);
			   //  }       
	     	});
		}, false);
	}

	    
	




 //    $(".answer-outcome-bottom-continue_a").click(function(e){
 //        e.preventDefault();

		
	// 	let answers = document.forms["quizForm"].getElementsByTagName("input");
 //        console.log(answers);
 //        debugger;
   
 //        // $.ajax({
 //        //    type:'POST',
 //        //    url:'/valuateAnswer',
 //        //    data:{data:answers},
 //        //    success:function(data){
 //        //       alert(data.success);
 //        //    }
 //        // });
	// });



}


// GET THE ANSWER INTO DIFFERENT VARIABLES 
// GET THEM INTO DATA IN AJAX AND SEND THEM TO THE /valuateAnswer AND GET THE ALGORITH TO WORK