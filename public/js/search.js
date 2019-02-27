$('.search-btn').on('click',function(){
    var inputs = $('#search-form :input');
    var uri = window.location.origin+"/search-results";
    console.log(uri);
    for(var i = 0; i < inputs.length; i++){
        var val = $(inputs[i]).val();
        var name = $(inputs[i]).attr('name');
        if(name){
            if(i==0){
                uri+=("?"+name+"="+val)
            }else{
                uri+=("&"+name+"="+val)
            }
        }
    }

    window.location = uri;
    // console.log(uri);
})
