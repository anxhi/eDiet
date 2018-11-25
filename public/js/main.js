
  $(".menubutton").on("click",function(){
    $(this).find("#top").toggleClass("openedTop")
    $(this).find("#bottom").toggleClass("openedBottom")
    $("#main").toggleClass("opened")
  });

  // $(".menubutton").hover(function(){
  //   $(this).find("#hover").toggleClass("hovercircle")
  // });

 