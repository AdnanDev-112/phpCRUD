

$('form').submit( function(e) {
   var user = $('#userField').val();
    var pass = $('#passwordField').val();


    if(user.length == 0 || pass.length == 0){
        e.preventDefault();
       
        alert("Fill the Required fields");
    }

  });