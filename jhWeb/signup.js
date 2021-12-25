
$('form').submit( function(e) {



 var user = $('#userField').val();
var pass = $('#passwordField').val();


 if(pass.length < 6 && pass.length !=0){
    e.preventDefault();
  $('span#displayer').text("Password too weak!");
  $('span#displayer').addClass('warnings');
  setTimeout(() => {
  $('span#displayer').text(" Must be 6-10 characters long.");
  $('span#displayer').removeClass('warnings');
 }, 5000);
  }
   if(pass.length > 10 ){
    e.preventDefault();
  $('span#displayer').text("Password exceeds limit!");
  $('span#displayer').addClass('warnings');
  setTimeout(() => {
  $('span#displayer').text(" Must be 6-10 characters long.");
  $('span#displayer').removeClass('warnings');
 }, 5000);
  }







});

