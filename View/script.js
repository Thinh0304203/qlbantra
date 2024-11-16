const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll',window.scrollX > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');
menu.addEventListener('click',function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})
userBtn.addEventListener('click',function(){
    let userBox =document.querySelector('.user-box');
    userBox.classList.toggle('active');
})
"user strict"
const leftArrow = document.querySelector('.left-arrow .bx-left-arrow');
      rightArrow = document.querySelector('.right-arrow .bx-right-arrow');
      slider = document.querySelector('.slider');

function scrollRight(){
    if(slider.scrollWidth - slider.clientWidth === slider.scrollLeft){
        slider.scrollTo({
            left : 0,
            behavior : "smooth"
        })
    }
        else{
            slider.scrollBy({
                left : window.innerWidth,
                behavior : "smooth"
            })
        }
    
    }
    function scrollLeft(){
                slider.scrollBy({
                    left : -window.innerWidth,
                    behavior : "smooth"
                })
            }
let timerID = setInterval(scrollRight,7000);    
//  reset time
function resetTimer(){
    clearInterval(timerID);
    timerID=setInterval(scrollRight,7000);
}
slider.addEventListener('click',function(ev){
    if(visualViewport.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
})
slider.addEventListener('click',function(ev){
    if(visualViewport.target === rightArrow){
        scrollRight();
        resetTimer();
    }
});
// testimonial
let slides = document.querySelectorAll('.testimonial-item');
let index = 0;

// Kiểm tra nếu slides có phần tử nào
if (slides.length > 0) {
    slides[index].classList.add('active'); // Đảm bảo slide đầu tiên bắt đầu là "active"
}

function nextSlide() {
    if (slides.length > 0) {
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }
}

function prevSlide() {
    if (slides.length > 0) {
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }
}



    
