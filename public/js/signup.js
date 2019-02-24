var picture = $("#picture");

$("#profile-picture").on("click",function(){
    picture.click();
})

picture.on("change",function(){
    const selectedFile = this.files[0];
    const objectURL = window.URL.createObjectURL(selectedFile);
    $("#profile-picture").attr("src",objectURL);
    console.log(selectedFile,objectURL)
})
