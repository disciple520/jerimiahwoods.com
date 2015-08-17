//$( "td" ).hover(
//  function() {
//    $( this ).addClass( "hover" );
//  }, function() {
//    $( this ).removeClass( "hover" );
//  }
//);

$( "tr" ).hover(
  function() {
    $(this).addClass("hovered");
    $(this).find("td:first img").attr("src","img/green_checkmark_hover.png");
    $(this).find("td:last img").attr("src","img/red_x_hover.png");

  }, function() {
    $( this ).removeClass( "hovered" );
    $(this).find("td:first img").attr("src","img/green_checkmark.png");
    $(this).find("td:last img").attr("src","img/red_x.png");


  }
);
