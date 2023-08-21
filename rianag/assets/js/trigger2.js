
// gsap.registerPlugin(ScrollTrigger);

// gsap.to(".trigger1", {
//   x: -100,
//   duration: 4,
//   ScrollTrigger: {
//       trigger: ".trigger1",
//       start: "top 80%",
//       end: "top 30%",
//       scrub: true,
//       toggleActions: "restart none none none",
//       markers: true
//   }
// });

// gsap.to(".trigger2", {
//     x: "50%",
//     duration: 3,
//     ScrollTrigger: {
//         trigger: ".trigger2",
//         start: "top 80%",
//         end: "top 30%",
//     }
//   });
//   gsap.to(".trigger3", {
  
//     x: 100,
//     duration: 3,
//     ScrollTrigger: ".trigger3"
//   });



// gsap.set('.motion_text', {Width: '100%', maxWidth: '1024px', height: '100%'})
// gsap.set('.trigger', {Width: '100%'})
// gsap.timeline({ScrollTrigger:{trigger: '.trigger', start: () => '+=${document.querySelector(".trigger").offsetHeight}', end: 'bottom 20%', scrub:1}})
// .fromTo('.trigger1', {x:-1000},{x:0},0) 
// .fromTo('.trigger2', {x:2000},{x:0},0) 
// .fromTo('.trigger3', {x:-1000},{x:0},0) 

// let didScroll = false;
// let trigger = document.querySelectorAll('.trigger');


// const scrollInProgress = () => {
//   didScroll = true
// }

// const raf = () => {
//   if(didScroll) {
//     trigger.forEach((element, index) => {
//       element.style.transform = "translateX("+ window.scrollY / 50 + "%)"
//     })
    
//     didScroll = false;
//   }
//   requestAnimationFrame(raf);
// }


// requestAnimationFrame(raf);
// window.addEventListener('scroll', scrollInProgress)

let didScroll = false;
let trigger1 = document.querySelectorAll('.trigger1');
let trigger2 = document.querySelectorAll('.trigger2');
let trigger3 = document.querySelectorAll('.trigger3');


const scrollInProgress = () => {
  didScroll = true
}

const raf = () => {
  if(didScroll) {
    trigger1.forEach((element, index) => {
      element.style.transform = "translateX("+ window.scrollY / 50 + "%)"
    })
    trigger2.forEach((element, index) => {
        element.style.transform = "translateX("+ window.scrollY / 0 + "%)"
      })
    trigger3.forEach((element, index) => {
    element.style.transform = "translateX("+ window.scrollY / 50 + "%)"
    })
    didScroll = false;
  }
  requestAnimationFrame(raf);
}


requestAnimationFrame(raf);
window.addEventListener('scroll', scrollInProgress)

// $(function(){
//   var $motionText = $('.motion_text');
//   var $offset = 300;
//   var $motionTextOST = $motionText.offset().top - $offset 

//   $(window).scroll(function(){
//     if($(this).scrollTop() > $motionTextOST) {
//       $motionText.find('li.trigger01').css('opacity', '1');
//     }
//   });

// });





