window.addEventListener("load", function() {
	console.log('window loaded');
let form = document.getElementById('form2');
form.addEventListener("submit", function(event) {
console.log('submit pushed');
	 if (confirm("Are you sure you want this event data deleted?")) {
		alert("Deleting event data.");
		 console.log('True: will delete');
	 } else {
		alert("Event data preserved.");
		 console.log("False: won't delete");
		event.preventDefault();
	 }
});
});
