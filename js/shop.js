shopResize();
outOfStockButton();

//display functions
function filterProducts(type) {
  let products = document.getElementsByClassName('product');
  let productsLength = products.length;
  let i;
  let productsContainer = document.querySelector('.products-container');

  for (i = 0; i < productsLength; i++) {

    //check for previously hidden products
    if (products[i].style.display == 'none') {
      products[i].style.display = 'flex';
    }

    //remove to-be-filtered products
    if (products[i].id != type) {
      products[i].style.display = 'none';
    }
  }

  document.body.scrollTop = 0;
}


//displays all products when 'Show All' is clicked in filter
function showAllProducts() {
  let products = document.getElementsByClassName('product');
  let productsLength = products.length;
  let i;

  for (i = 0; i < productsLength; i++) {
    products[i].style.display = 'flex';
  }

  document.body.scrollTop = 0;
}


//handle out of stock button functionality
function outOfStockButton() {
  let buyButton = document.getElementsByClassName('buy-button');
  let buyButtons = buyButton.length;
  let i;

  for (i = 0; i < buyButtons; i++) {
    if (buyButton[i].innerText == 'Out of Stock') {
      buyButton[i].classList.add('out-of-stock');
    }
  }
}


function filterMenu() {
  let filterButton = document.querySelector('.fa-filter');
  let filterMenu = document.querySelector('.filter-container');

  //add transition
  filterMenu.style.transition = 'left 200ms ease-out';

  if (window.matchMedia("max-width: 991px")) {
    if (!filterButton.classList.contains('close-filter')) {
      filterButton.classList.add('close-filter');
      filterMenu.style.left = '0';
    } else {
      filterButton.classList.remove('close-filter');
      filterMenu.style.left = '-100%';
    }
  }
}

//closes filter menu when filter option is selected
function closeFilterMenu() {
  let filterMenu = document.querySelector('.filter-container');
  let filterButton = document.querySelector('.fa-filter');

  if (window.matchMedia("max-width: 991px")) {
    filterMenu.style.left = '-100%';
    filterButton.classList.remove('close-filter');
  }
}


//makes sure filter menu behaves upon window resizing
function shopResize() {
  window.onresize = function() {
    if (window.innerWidth >= 992) {
      document.querySelector('.filter-container').style.left = 0;
    } else {
      document.querySelector('.filter-container').style.left = '-100%';
    }
  }
}
