// the following function make a confirmation pop up appear at any delete request
function confirmDelete() {
	var DeleteButtons = document.querySelectorAll('.deleteItem');
	console.log(DeleteButtons);

	DeleteButtons.forEach(function(DeleteButton){
		DeleteButton.addEventListener("click", function(event){

		    if (confirm('Are you sure you want to delete the item from the database?')) {
			    console.log('item gone');
			} else {
			    console.log('action cancelled');
			    event.preventDefault()
			}
		});

	})
}

window.onload = function () {
	confirmDelete();
};