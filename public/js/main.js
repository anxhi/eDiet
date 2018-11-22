
  $(".menubutton").on("click",function(){
    $(this).find("#top").toggleClass("openedTop")
    $(this).find("#bottom").toggleClass("openedBottom")
    $(".menu").toggleClass("openedMenu")
     
  });

  $(".menubutton").hover(function(){
    $(this).find("#hover").toggleClass("hovercircle")
  });

 