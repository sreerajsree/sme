import './bootstrap';
import { createApp } from 'vue'
import comments from './components/comments.vue'
import likes from './components/likes.vue'


const app = createApp({});
app.component('comments', comments);
app.component('likes', likes);
app.mount('#app');


//Fullscreen search menu
$("#search").click(function () {
  $(".search-overlay").css("display", "block");
});
$(".close-search").click(function () {
  $(".search-overlay").css("display", "none");
});


// TAB
$(".tab-nav li").on("click", function (e) {
  $(".tab-item").hide();
  $(".tab-nav li").removeClass("active");
  $(this).addClass("active");
  var selected_tab = $(this).find("a").attr("href");
  $(selected_tab).stop().show();
  return false;
});

/* Mobile Navigation
          -------------------------------------------------------*/
var $sidenav = $("#sidenav"),
  $mainContainer = $("#main-container"),
  $navIconToggle = $(".nav-icon-toggle"),
  $navHolder = $(".nav__holder"),
  $contentOverlay = $(".content-overlay"),
  $htmlContainer = $("html"),
  $sidenavCloseButton = $("#sidenav__close-button");

$navIconToggle.on("click", function (e) {
  e.stopPropagation();
  $(this).toggleClass("nav-icon-toggle--is-open");
  $sidenav.toggleClass("sidenav--is-open");
  $contentOverlay.toggleClass("content-overlay--is-visible");
  // $htmlContainer.toggleClass('oh');
});

function resetNav() {
  $navIconToggle.removeClass("nav-icon-toggle--is-open");
  $sidenav.removeClass("sidenav--is-open");
  $contentOverlay.removeClass("content-overlay--is-visible");
  // $htmlContainer.removeClass('oh');
}

function hideSidenav() {
  if (minWidth(992)) {
    resetNav();
    setTimeout(megaMenu, 500);
  }
}

$contentOverlay.on("click", function () {
  resetNav();
});

$sidenavCloseButton.on("click", function () {
  resetNav();
});

var $dropdownTrigger = $(".nav__dropdown-trigger"),
  $navDropdownMenu = $(".nav__dropdown-menu"),
  $navDropdown = $(".nav__dropdown");

if ($("html").hasClass("mobile")) {
  $("body").on("click", function () {
    $navDropdownMenu.addClass("hide-dropdown");
  });

  $navDropdown.on("click", "> a", function (e) {
    e.preventDefault();
  });

  $navDropdown.on("click", function (e) {
    e.stopPropagation();
    $navDropdownMenu.removeClass("hide-dropdown");
  });
}


/* Sidenav Menu
-------------------------------------------------------*/
$(".sidenav__menu-toggle").on("click", function (e) {
  e.preventDefault();

  var $this = $(this);

  $this.parent().siblings().removeClass("sidenav__menu--is-open");
  $this.parent().siblings().find("li").removeClass("sidenav__menu--is-open");
  $this.parent().find("li").removeClass("sidenav__menu--is-open");
  $this.parent().toggleClass("sidenav__menu--is-open");

  if ($this.next().hasClass("show")) {
    $this.next().removeClass("show").slideUp(350);
  } else {
    $this.parent().parent().find("li .sidenav__menu-dropdown").removeClass("show").slideUp(350);
    $this.next().toggleClass("show").slideToggle(350);
  }
});
