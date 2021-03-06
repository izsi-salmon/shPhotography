console.log('scripts loaded!! :)');

var siteTitle = document.getElementById('site-title');
var burger = document.getElementById('burger');
var menuContent = document.getElementById('hamburger-content');
var menuContainer = document.getElementById('hamburger-container');
var dropshadow = document.getElementById('dropshadow');

function toggleBurger(){
  menuContainer.classList.toggle('open-burger');
    siteTitle.classList.toggle('open-burger');
  if(menuContent.style.maxHeight){
    menuContent.style.maxHeight = null;
    dropshadow.style.opacity = '0';
  } else {
    menuContent.style.maxHeight = menuContent.scrollHeight + 'px';
    dropshadow.style.opacity = '0.5';
  }
}

burger.addEventListener('click', toggleBurger, false);

function hideDropshadow(){
  dropshadow.style.display = 'none';
}

var swiper = new Swiper('.swiper-container', {
   spaceBetween: 30,
   centeredSlides: true,
   autoplay: {
     delay: 4000,
     disableOnInteraction: false,
   },
   pagination: {
     el: '.swiper-pagination',
     clickable: true,
   },
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
});
