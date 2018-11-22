
  $(".menubutton").on("click",function(){
    $(this).find("#top").toggleClass("openedTop")
    $(this).find("#bottom").toggleClass("openedBottom") 
  });

  $(".menubutton").on("hover",function(){
    $(this).assClass("hovercircle")
  });
