

$('form').submit( function(e) {
   var user = $('#userField').val();
    var pass = $('#passwordField').val();
  var emptySpaces =  new RegExp(/^$|\s+/);

    if(user.length == 0 || pass.length == 0){
        e.preventDefault();
        alert("Fill the Required fields");
      }else
      if(emptySpaces.test(user) || emptySpaces.test(pass)){
      e.preventDefault();
     $('span#displayer').text("Name or Password Cannot Contain Whitespaces!!");
     $('span#displayer').addClass('warnings');
     setTimeout(() => {
      $('span#displayer').text(" Must be 8-12 characters long.");
      $('span#displayer').removeClass('warnings');
     }, 5000);

    }

  });