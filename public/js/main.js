$(".menubutton").on("click", function() {
  $(this)
    .find("#top")
    .toggleClass("openedTop")
  $(this)
    .find("#bottom")
    .toggleClass("openedBottom")
  $("#main").toggleClass("opened")
})

$("#duration").on("change",function(){
  $("#days").html("Duration (days: "+$(this).val()+")")
 })


$("#login-button").click(function(event){
    // event.preventDefault();
    // event.stopPropagation();
    $('.form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});
