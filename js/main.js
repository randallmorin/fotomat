openMobileMenu();
handleResize();


//smooth scrolling
$(document).ready(function() {
  $('.mobile-nav-link, .nav-link').on('click', function(event) {
    event.preventDefault();
    closeMobileMenu();
    $('html, body').animate({
      scrollTop: $(this.hash).offset().top - $('nav').height()
    }, 400);
  });
});


//opening and closing menu
function openMobileMenu() {
  let links = document.querySelectorAll('.mobile-nav-link, .mobile-shop'); //get link elements
  let linkHeight = links[0].offsetHeight; //calculate link height
  let mobileMenu = document.querySelector('.mobile-links-container'); //get container
  let menuButton = document.querySelector('.fa-times');

  menuButton.onclick = function() {
    if (menuButton.classList.contains('expanded')) {
      menuButton.style.transform = 'rotate(45deg)';
      menuButton.classList.remove('expanded');
      mobileMenu.style.height = 0;
    } else {
      menuButton.classList.add('expanded');
      menuButton.style.transform = 'rotate(0deg)';
      mobileMenu.style.height = linkHeight * links.length + 'px';
    }
  }
}

function closeMobileMenu() {
  let mobileMenu = document.querySelector('.mobile-links-container');
  let menuButton = document.querySelector('.fa-times');

  menuButton.classList.remove('expanded');
  menuButton.style.transform = 'rotate(45deg)';
  mobileMenu.style.height = 0;
}


//function handles making sure that the mobile menu appears properly on resize of the browser window
function handleResize() {
  window.onresize = function() {
    openMobileMenu();
  }
}




























//
