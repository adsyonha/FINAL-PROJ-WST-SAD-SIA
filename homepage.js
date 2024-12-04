let slideIndex = 0;
const slides = document.getElementsByClassName("slide");
showSlide(slideIndex);
function showSlide(index) {
    if (index >= slides.length) { slideIndex = 0; }
    if (index < 0) { slideIndex = slides.length - 1; }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slides[slideIndex].style.display = "block"; 
}

function changeSlide(direction) {
    slideIndex += direction;
    showSlide(slideIndex);
}

setInterval(() => {
    slideIndex++;
    showSlide(slideIndex);
}, 3000); 
