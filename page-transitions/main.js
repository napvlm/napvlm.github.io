'use strict'

function pageTransition() {

  var tl = gsap.timeline();

  tl.to('ul.transition li', { duration: .6, scaleY: 1, transformOrigin: 'bottom left', stagger: .2 });
  tl.to('ul.transition li', { duration: .6, scaleY: 0, transformOrigin: 'bottom left', stagger: .2 });
}

function contentAnimation() {

  var tl = gsap.timeline();

  tl.from('.right', { duration: 1.6, translateY: 50, opacity: 0 });
  tl.to('img', { clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)'}, "-=1.1");

}

function delay(n) {
  n = n || 2000;
  return new Promise(done => {
    setTimeout(() => {
      done();
    }, n);
  });
}

barba.init({
  sync: true,
  transitions: [{
    async leave(data) {
      const done = this.async();

      pageTransition();
      await delay(1500);
      done();
    },

    async enter(data) {
      contentAnimation();
    },

    async once(data) {
      contentAnimation();
    }
  }]
})

//scroll indicator
$(window).scroll(function(){
  var wintop = $(window).scrollTop(), 
      docheight = $(document).height(), 
      winheight = $(window).height();

  var scrolled = (wintop/(docheight-winheight))*100;
      
  $('.scrollbar').css('width', (scrolled + '%'));
});