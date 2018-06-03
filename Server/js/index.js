$('document').ready(function () {
    $.ajax({
        url:"http://asia-pearl-express.com/php/DataBaseJ.php?q=getAllData",
        data:{
            table:"u809451557_order.Orders",
        },
        success:function (res) {
            let orderInfo=JSON.parse(res);
            console.log(orderInfo);
        }

    })

});
function newCard(item) {

    let div =document.createElement("div");



}
$(".mdl-navigation__link").click(function (event) {
    $(".mdl-layout__tab-panel").removeClass("is-active");
    console.log($("#"+event.target.href.split("#")[1]));
    $("#"+event.target.href.split("#")[1]).addClass(" is-active");
});
$(document).ready(function () {
    let colors=[
        "#E74C3C  ",
        "#8E44AD  ",
        "#2E86C1  ",
        "#1ABC9C  ",
        "#28B463  ",
        "#D4AC0D  ",
        "#CA6F1E",
        "#839192  ",
        "#283747  ",
    ];
    for(let value of $(".demo-card-event")){
        value.style.background= colors[Math.floor(Math.random() * colors.length)];
    }
});