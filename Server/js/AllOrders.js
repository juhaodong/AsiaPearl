$('document').ready(function () {
   $.ajax({
       url:"http://asia-pearl-express.com/php/DataBaseJ.php?q=getAllData",
       data:{
           table:"u809451557_order.Orders",
       },
       success:function (res) {
           let info = JSON.parse(res);
           console.log(info);
           let total=0;
           for(var i in info){
              total+=parseFloat(  newRow(info[i]));
           }
           let table=document.getElementById("table");
          let totas= document.createElement("td");
          totas.setAttribute("colspan","5");
          totas.setAttribute("style","text-align:center");
          totas.innerHTML="共计"+total.toFixed(2);
          table.appendChild( document.createElement("tr").appendChild(totas))
       }

   })

});
function newRow(item) {
let table=document.getElementById("table");
let r=document.createElement("tr");
let ta=document.createElement("td");
ta.innerHTML=item.OrderID;
r.appendChild(ta);
    let tb=document.createElement("td");
    tb.innerHTML=item.UserID;
    r.appendChild(tb);
    let tc=document.createElement("td");
    tc.innerHTML=item.Amount;
    r.appendChild(tc);
    let td=document.createElement("td");
    td.innerHTML=item.TimeStamp;
    r.appendChild(td);
    let te=document.createElement("td");
    te.innerHTML=item.Address;
    r.appendChild(te);
    table.appendChild(r);
    return item.Amount;
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