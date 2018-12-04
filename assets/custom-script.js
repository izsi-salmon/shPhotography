console.log('scripts loaded!! :)');

var burger = document.getElementById('burger');
var menuContent = document.getElementById('hamburger-content');
var menuContainer = document.getElementById('hamburger-container');
var dropshadow = document.getElementById('dropshadow');

// function toggleBurger(){
//   if(menuContent.style.maxHeight == '50vh'){
//     menuContent.style.maxHeight = '0';
//     dropshadow.style.opacity = '0';
//     setTimeout(hideDropshadow, 1000);
//   } else{
//     menuContent.style.maxHeight = '50vh';
//     dropshadow.style.display = 'block';
//     dropshadow.style.opacity = '0.5';
//
//   }
// }

function toggleBurger(){
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
