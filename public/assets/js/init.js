jQuery(document).ready(function () {
  "use strict";
  hero_image();
  cursor();
  data_images();
  jarallax();
  jQuery(window).load("body", function () {
    my_load();
  });
});

// -----------------------------------------------------
// ---------------   FUNCTIONS    ----------------------
// -----------------------------------------------------

// ------------------------------------------------
// -------------------  ANCHOR --------------------
// ------------------------------------------------

jQuery(".anchor_nav").onePageNav();

// -----------------------------------------------------
// ---------------   HERO IMAGE  -----------------------
// -----------------------------------------------------

function hero_image() {
  "use strict";

  var FixedImage = jQuery(".hero .right .image .main").data("img-url");
  var wrapper = jQuery(".hero .services ul");
  var list = wrapper.find("li a");
  list.on("mouseenter", function () {
    var element = jQuery(this);
    var image = element.find(".image").attr("src");
    element
      .closest(".hero")
      .find(".right .image .main")
      .css({ backgroundImage: "url(" + image + ")" });
    console.log(image);
  });
  wrapper.on("mouseleave", function () {
    jQuery(".hero .right .image .main").css({
      backgroundImage: "url(" + FixedImage + ")",
    });
  });
}

// -----------------------------------------------------
// ---------------   PRELOADER   -----------------------
// -----------------------------------------------------

function preloader() {
  "use strict";

  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
    navigator.userAgent
  )
    ? true
    : false;
  var preloader = $("#preloader");

  if (!isMobile) {
    setTimeout(function () {
      preloader.addClass("preloaded");
    }, 800);
    setTimeout(function () {
      preloader.remove();
    }, 2000);
  } else {
    preloader.remove();
  }
}

// -----------------------------------------------------
// -----------------   MY LOAD    ----------------------
// -----------------------------------------------------

function my_load() {
  "use strict";

  var speed = 500;
  setTimeout(function () {
    preloader();
  }, speed);
  setTimeout(function () {
    jQuery("body").addClass("opened");
  }, speed + 2000);
}

// -----------------------------------------------------
// ------------------   CURSOR    ----------------------
// -----------------------------------------------------

function cursor() {
  "use strict";

  var myCursor = jQuery(".mouse-cursor");

  if (myCursor.length) {
    if ($("body")) {
      const e = document.querySelector(".cursor-inner"),
        t = document.querySelector(".cursor-outer");
      let n,
        i = 0,
        o = !1;
      (window.onmousemove = function (s) {
        o ||
          (t.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (e.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (n = s.clientY),
          (i = s.clientX);
      }),
        $("body").on(
          "mouseenter",
          "a,.topbar .trigger, .cursor-pointer",
          function () {
            e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
          }
        ),
        $("body").on(
          "mouseleave",
          "a,.topbar .trigger, .cursor-pointer",
          function () {
            ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
              (e.classList.remove("cursor-hover"),
              t.classList.remove("cursor-hover"));
          }
        ),
        (e.style.visibility = "visible"),
        (t.style.visibility = "visible");
    }
  }
}

// -----------------------------------------------------
// ---------------   DATA IMAGES    --------------------
// -----------------------------------------------------

function data_images() {
  "use strict";

  var data = jQuery("*[data-img-url]");

  data.each(function () {
    var element = jQuery(this);
    var url = element.data("img-url");
    element.css({ backgroundImage: "url(" + url + ")" });
  });
}

// -----------------------------------------------------
// --------------------    JARALLAX    -----------------
// -----------------------------------------------------

function jarallax() {
  "use strict";

  jQuery(".jarallax").each(function () {
    var element = jQuery(this);
    var customSpeed = element.data("speed");

    if (customSpeed !== "undefined" && customSpeed !== "") {
      customSpeed = customSpeed;
    } else {
      customSpeed = 0.5;
    }

    element.jarallax({
      speed: customSpeed,
      automaticResize: true,
      videoVolume: 0,
    });
  });
}

// -----------------------------------------------------
// --------------------    WOW JS    -------------------
// -----------------------------------------------------

new WOW().init();
