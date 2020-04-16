'use strict'

const SWIPER = document.getElementsByClassName('swiper')
  , SWIPER_CONTENT = document.getElementsByClassName('swiper-content')
  , SWIPER_ITEM = document.querySelectorAll('.swiper-content .item')
  , ARROW_PREV = document.querySelector('.arrow-prev')
  , ARROW_NEXT = document.querySelector('.arrow-next');

function SlideNext() {
    let currentActiveItem = document.querySelector('.swiper-content .item.active')

    if (typeof(currentActiveItem.nextElementSibling) != 'undefined' && currentActiveItem.nextElementSibling != null) {
        currentActiveItem.classList.remove('active');
        currentActiveItem.nextElementSibling.classList.add('active');
    } else {
        currentActiveItem.classList.remove('active');
        SWIPER_ITEM[0].classList.add('active');
    }
}

function SlidePrevious() {
    let currentActiveItem = document.querySelector('.swiper-content .item.active')

    if (typeof(currentActiveItem.previousElementSibling) != 'undefined' && currentActiveItem.previousElementSibling != null) {
        currentActiveItem.classList.remove('active');
        currentActiveItem.previousElementSibling.classList.add('active');
    } else {
        currentActiveItem.classList.remove('active');
        SWIPER_ITEM[SWIPER_ITEM.length -1].classList.add('active');
    }
}

ARROW_NEXT.addEventListener('click', SlideNext);
ARROW_PREV.addEventListener('click', SlidePrevious);