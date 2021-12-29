const maxlength = 500 ;

$('textarea').on("input", function() {
    var currentLength = $(this).val().length;
    if (currentLength > maxlength) {
        $("span#characterCount").text("Max Words Reached");
        var tempText = $(this).val().slice(0,500);
        $(this).val(tempText);
        $("span#characterCount").addClass('warnings');
        setTimeout(() => {
            $("span#characterCount").removeClass('warnings');
            
        }, 4000);

    }
  $("span#characterCount").text((maxlength - currentLength < 0  || maxlength - currentLength == 0  ? "Max Words Reached" : maxlength - currentLength + " / 500") );
  });