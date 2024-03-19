window.addEventListener("load", function() {
	console.log('checkEdit.js loaded');
let form = document.getElementById('eventForm');
let host = document.getElementById('host');
let hostErr = document.getElementById('hostErr');
form.onsubmit=function(event){
    console.log('form submitted.');
    if(host.value==""){
        //alert('All Fields Required');
        hostErr.innerHTML='Event Host is required';
        event.preventDefault();

    }
}

});

