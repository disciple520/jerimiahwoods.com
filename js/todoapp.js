
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

var mq = window.matchMedia( "(min-width: 992px)" );

if (mq.matches) {
  document.getElementById("newTaskField").size = "50";
}

if (matchMedia) {
	mq.addListener(WidthChange);
	WidthChange(mq);
}

function WidthChange(mq) {

	if (mq.matches) {
            document.getElementById("newTaskField").size = "50";
	}
	else {
            document.getElementById("newTaskField").size = "30";
	}

}
