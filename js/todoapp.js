$( "tr" ).hover(
  function() {
    $(this).addClass("hovered");
    $(this).find("td:first img").attr("src","img/green_checkmark_hover.png");
    $(this).find("td:last img").attr("src","img/red_x_hover.png");

  }, function() {
    $(this).removeClass( "hovered" );
    $(this).find("td:first img").attr("src","img/green_checkmark.png");
    $(this).find("td:last img").attr("src","img/red_x.png");

  }
);

var mediaQuery = window.matchMedia( "(min-width: 992px)" );

if (mediaQuery.matches) {
  document.getElementById("new-task-field").size = "50";
}

if (matchMedia) {
    mediaQuery.addListener(TextFieldWidthChange);
    TextFieldWidthChange();
}

function TextFieldWidthChange() {

    if (mediaQuery.matches) {
        document.getElementById("new-task-field").size = "50";
    }
    else {
        document.getElementById("new-task-field").size = "30";
    }

}
