const maxlength = 500 ;

$("document").ready(function () {
    var tempVal = $('textarea').val().length;
    $("span#characterCount").text( (maxlength - tempVal) + " / 500");

    
    
});


$('textarea').on("input", function() {
    // var maxlength = 500;
    var currentLength = $(this).val().length;
  
    if (currentLength > maxlength) {
        $("span#characterCount").text("Max Words Reached");
        var tempText = $(this).val().slice(0,500);
        // console.log(tempText);
        $(this).val(tempText);
        // return console.log("You have reached the maximum number of characters.");

    }
  $("span#characterCount").text((maxlength - currentLength < 0 ? 0 : maxlength - currentLength) + " / 500");
  });