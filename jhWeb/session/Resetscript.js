

$('form').submit( function(e) {
    var pass = $('#passwordField').val();
    var pass2 = $('#cPasswordField').val();
    var emptySpaces =  new RegExp(/^$|\s+/);

    if(emptySpaces.test(pass) || emptySpaces.test(pass2)){
        e.preventDefault();
       $('span#displayer').text("Password Cannot Contain Whitespaces!!");
       $('span#displayer').addClass('warnings');
       setTimeout(() => {
        $('span#displayer').text(" Must be 6-10 characters long.");
        $('span#displayer').removeClass('warnings');
       }, 5000);
      }  

    if(pass != pass2){
        e.preventDefault();
     $('span#displayer').text("Password Don't Match");
      $('span#displayer').addClass('warnings');
      setTimeout(() => {
      $('span#displayer').text(" Must be 6-10 characters long.");
      $('span#displayer').removeClass('warnings');
     }, 5000);
    }
    
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
    