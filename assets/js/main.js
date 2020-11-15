document.addEventListener("DOMContentLoaded", function(event) {

const Page = {
  template: document.querySelector('body').getAttribute('data-template')
}

const Overlay = {
  el: document.querySelector('.js-box-overlay'),

  init: function() {
    Overlay.bindEvents();
  },

  bindEvents: function() {
    Overlay.el.addEventListener('click', Overlay.hideTheOverlay);
  },

  hideTheOverlay: function() {
    Overlay.el.classList.add('is-hidden');
  }
}


// // Flower
// var flower=document.querySelector('.js-iris-home');
//
// console.log(flower);
//
// function makeItCrisp() {
//   console.log('make it crisp');
//   flower.classList.add('is-crisp');
// }
//
// flower.addEventListener('click', makeItCrisp);

// Gallery Images
const Gallery = {
  images: document.querySelectorAll('.js-gallery-image'),
  selectedImage: document.querySelector('.js-gallery-image.is-active'),
  previousSelectedImage: document.querySelector('.js-gallery-image.is-active'),

  init: function() {
    Gallery.bindEvents();
  },

  bindEvents: function() {
    for (i = 0; i < Gallery.images.length; i++) {
      Gallery.images[i].addEventListener('click', Gallery.makeItActive);
    }
  },

  makeItActive: function() {
    Gallery.selectedImage = this;
    Gallery.previousSelectedImage = document.querySelector('.js-gallery-image.is-active');
    Gallery.selectedImage.classList.add('is-active');
    Gallery.previousSelectedImage.classList.remove('is-active');
  }
}

const Product = {
  body: document.querySelector('body'),
  images: document.querySelectorAll('.js-banner-image'),
  view: 'default',

  init: function() {
    Product.bindEvents();
    console.log('init product');
  },

  bindEvents: function() {
    for (i = 0; i < Product.images.length; i++) {
      Product.images[i].addEventListener('click', Product.toggleView);
    }
  },

  toggleView: function() {
    if (Product.view == 'default') {
      Product.detailView();
    } else {
      Product.defaultView();
    }
  },

  defaultView: function() {
    Product.body.setAttribute('data-view', 'default');
    Product.view = 'default';
  },

  detailView: function() {
    Product.body.setAttribute('data-view', 'detail');
    Product.view = 'detail';
  }
};

const ShopItem = {
  purchaseButton: document.querySelector('.js-product-purchase-button'),
  sizeButtons: document.querySelectorAll('.js-size-button'),
  selectedSize: document.querySelector('.js-size-button.is-selected'),
  selectedSizeID: null,
  selctedButtonClass: 'is-selected',
  quantity: 1,
  quantityEl: document.querySelector('.js-product-amount'),
  quantityDecreaseButton: document.querySelector('.js-qty-decrease'),
  quantityIncreaseButton: document.querySelector('.js-qty-increase'),
  shopifyCheckoutURLroot: 'https://shop.gloriagloria.com/cart/',

  init: function() {
    ShopItem.bindEvents();
    console.log('Shop Item init');
  },

  bindEvents: function() {
    for (i = 0; i < ShopItem.sizeButtons.length; i++) {
      ShopItem.sizeButtons[i].addEventListener('click', ShopItem.selectSize);
      console.log(ShopItem.sizeButtons[i]);
    }
    ShopItem.quantityDecreaseButton.addEventListener('click', ShopItem.quantityDecrease);
    ShopItem.quantityIncreaseButton.addEventListener('click', ShopItem.quantityIncrease);
    ShopItem.quantityEl.addEventListener('change', ShopItem.quantityEdit);

    ShopItem.selectedSizeID = ShopItem.selectedSize.getAttribute('data-variant-id');
  },

  clearSize: function() {
    for (i = 0; i < ShopItem.sizeButtons.length; i++) {
      ShopItem.sizeButtons[i].classList.remove(ShopItem.selctedButtonClass);
    }
  },

  selectSize: function() {
    ShopItem.clearSize();
    ShopItem.selectedSize = this;
    ShopItem.selectedSizeID = ShopItem.selectedSize.getAttribute('data-variant-id');
    ShopItem.selectedSize.classList.add(ShopItem.selctedButtonClass);
    ShopItem.createCheckoutURL();
  },

  createCheckoutURL: function() {
    ShopItem.shopifyCheckoutURL = ShopItem.shopifyCheckoutURLroot + ShopItem.selectedSizeID + ':' + ShopItem.quantity;
    ShopItem.purchaseButton.setAttribute('href', ShopItem.shopifyCheckoutURL);
  },

  quantityDecrease: function() {
    console.log('quantityDecrease');
    ShopItem.quantity--;
    ShopItem.updateQuantityValue();
  },

  quantityIncrease: function() {
    console.log('quantityIncrease');
    ShopItem.quantity++;
    ShopItem.updateQuantityValue();
  },

  quantityEdit: function() {
    console.log('quantityEdit');
    ShopItem.quantity = ShopItem.quantityEl.value;
    ShopItem.updateQuantityValue();
  },

  updateQuantityValue: function() {
    console.log('updateQuantityValue');
    if (ShopItem.quantity < 1) {
      ShopItem.quantity = 1;
    }
    ShopItem.quantityEl.value = ShopItem.quantity;
    ShopItem.createCheckoutURL();
  }

}

Gallery.init();

if (Page.template == 'home') {
  Overlay.init();
}

if (Page.template == 'product') {
  Product.init();
  ShopItem.init();
}

});
