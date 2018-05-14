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