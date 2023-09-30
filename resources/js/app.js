import './bootstrap';
import {createApp} from 'vue'
import comments from './components/comments.vue'
import likes from './components/likes.vue'


const vueapp = createApp({});
vueapp.component('comments', comments);
vueapp.component('likes', likes);
vueapp.mount('#vueapp');


$(document).ready(function () {
  //Navigation
  $(".menu-toggle").click(function () {
    $("nav").toggleClass("active");
  });
  $("ul li").click(function () {
    $(this)
      .siblings()
      .removeClass("active");
    $(this).toggleClass("active");
  });
  $(document).mouseup(function (e) {
    var div = $("ul li");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
      div.removeClass("active");
    }
  });

  // Hamburger icon animation
  $(".menu-toggle").on("click", function () {
    $(".hamburger-menu").toggleClass("animate");
  });

  //Fullscreen search menu
  $("#search").click(function () {
    $(".search-overlay").css("display", "block");
  });
  $(".close-search").click(function () {
    $(".search-overlay").css("display", "none");
  });

  //Parallax
  $(window).scroll(function () {
    var st = $(this).scrollTop();
    $(".parallax-text").css({
      transform: "translate(0%, " + st + "%"
    });
  });
});

//Sticky Navigation
$(window).scroll(function (event) {
  if ($(this).scrollTop() > 300) {
    $("header").addClass("fixed");
  } else {
    $("header").removeClass("fixed");
  }
});

//Fullscreen search underline animation
const wrapper = document.querySelector(".input-wrapper"),
  textInput = document.querySelector("input#search");
textInput.addEventListener("keyup", event => {
  wrapper.setAttribute("data-text", event.target.value);
});