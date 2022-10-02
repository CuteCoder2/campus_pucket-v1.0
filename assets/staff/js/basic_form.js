
// Image preview
var img_viewer =  document.getElementById("img-viewer");
var img_uploader =  document.getElementById("img-uploader");
var txt =  document.getElementById("txt");
var cancel_btn =  document.getElementById("cancel_btn");

img_uploader.onchange = function (){
    
    let reader = new FileReader();

    reader.onload = ()=>{
        var dataURL = reader.result;
        img_viewer.style.backgroundImage = 'url("'+dataURL+'")'
        txt.innerHTML = img_uploader.value.substring(12) ;
    };
    reader.readAsDataURL(img_uploader.files[0]);
    

};


cancel_btn.addEventListener("click",()=>{
    img_uploader.value = "";

    img_viewer.style.backgroundImage = 'url(" ")' ;

    txt.innerHTML = "click in the box to add or change image";
})

// en Image preview

