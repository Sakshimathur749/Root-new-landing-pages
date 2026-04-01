$(document).ready(function () {
  $(".readBtn").click(function () {
    let e = $(this).parent().find("#more"),
      s = $(this).parent().parent();
    "none" === e.css("display").toLowerCase()
      ? (e.css({ display: "block" }),
        $(this).text("Read less <<"),
        s.addClass("scroller"))
      : (e.css({ display: "none" }),
        $(this).text("Read more >>"),
        s.removeClass("scroller"));
  });
}),
$(function () {
  new WOW().init();
});
// $(window).on('scroll load', function() {
//     var scroll = $(window).scrollTop();
//     if (scroll >= 50) {
//         $("header").addClass("sticky");
//     } else {
//         $("header").removeClass("sticky");
//     }
// });
function readMoreFunc() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("readBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more >>";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less <<";
    moreText.style.display = "inline";
  }
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};


