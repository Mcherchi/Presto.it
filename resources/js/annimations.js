const iconMessage = document.querySelectorAll(".rubberBand");

iconMessage.forEach((icon) =>{
    icon.addEventListener("click", function () {
        icon.classList.remove("rubberBand");
    });
    
})

