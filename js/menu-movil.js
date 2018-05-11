// function toggleMenu(ref) {
//     ref.classList.toggle('active');
//     document.getElementById('menu').classList.toggle('active');
//   }


$("nav div").click(function() {
    $("ul").slideToggle();
    $("ul ul").css("display", "none");
});

$("ul li").click(function() {
    $("ul ul").slideUp();
    $(this).find('ul').slideToggle();
});

$(window).resize(function() {
    if($(window).width() > 768) {
          $("ul").removeAttr('style');
    }
});