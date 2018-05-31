$(".mdl-navigation__link").click(function (event) {
    $(".mdl-layout__tab-panel").removeClass("is-active");
    console.log($("#"+event.target.href.split("#")[1]));
    $("#"+event.target.href.split("#")[1]).addClass(" is-active");
});