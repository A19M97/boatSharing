$("#hp-first-arrow").click(function(e){
    alert("ciao");
    var $target = $('html,body');
    $target.animate({scrollTop: $target.height()}, 500);
});