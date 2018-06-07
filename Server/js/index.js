const PHPROOT="http://asia-pearl-express.com/php/";
$('document').ready(function () {

    $(".mdl-navigation__link").click(function (event) {
        $(".mdl-layout__tab-panel").removeClass("is-active");
        $("#"+event.target.href.split("#")[1]).addClass(" is-active");
    });


    refreshTable();

});
function refreshTable() {
    $("#table").empty();
    $.ajax({
        url:"http://asia-pearl-express.com/php/DataBaseJ.php?q=getAllData",
        data:{
            table:"u809451557_order.Orders",
        },
        success:function (res) {
            let info = JSON.parse(res);
            console.log(info);
            let total=0;
            let table=document.getElementById("table");
            let r=document.createElement("tr");
            r.innerHTML="  <th class=\"un\" width=\"300px\">Address</th>\n" +
                "                           <th>确认收单</th>\n" +
                "                           <th>订单状态</th>\n" +
                "                           <th class=\"un\">OrderID</th>\n" +
                "                           <th class=\"un\">UserID</th><th class=\"un\">Amount</th><th class=\"un\">Time</th>\n";

                table.appendChild(r);
            for(let i in info){
                total+=parseFloat(  newRow(info[i]));
            }

            let totas= document.createElement("td");
            totas.setAttribute("colspan","5");
            totas.setAttribute("style","text-align:center");
            totas.innerHTML="共计"+total.toFixed(2);
            table.appendChild( document.createElement("tr").appendChild(totas))
        }

    });
}
function newCard(item) {
    let div =document.createElement("div");
}

function confirmOrder(t) {
    console.log(t.dataset);
    $.ajax({
        url:"http://asia-pearl-express.com/php/DataBaseJ.php?q=finishOrder",
        data:{
            OrderID:t.dataset.id,
            recieved:1
        },
        method:"POST",
        success:function (res) {
          console.log(res);
          refreshTable();
        }
    })
}

function resendOrder(info) {
    let data=info.dataset.info;


   // console.log(data);
    $.ajax({
        url:PHPROOT+"orders.php",
        method:"POST",
        data:({
            order:data,
            resend:true
        }),
        success:function (res) {
            console.log(res);
            refreshTable();
        }
    });
}
function newRow(item) {

    let table=document.getElementById("table");
    let r=document.createElement("tr");
    let ta=document.createElement("td");
    ta.innerHTML=item.OrderID;

    let tb=document.createElement("td");
    tb.innerHTML=item.UserID;

    let tc=document.createElement("td");
    tc.innerHTML=item.Amount;

    let td=document.createElement("td");
    td.innerHTML=item.TimeStamp;

    let te=document.createElement("td");
    te.innerHTML=item.Address;
    let tf=document.createElement("td");
    let resend=document.createElement("td");

    if(item.recieved==="0"){
        tf.innerHTML="<button onclick='confirmOrder(this)' data-id='"+item.OrderID+"' class=\"mdl-chip \">\n" +
            "    <span class=\"mdl-chip__text\">确认订单</span>\n" +
            "</button>";
    }else{
        tf.innerHTML= "<i class='material-icons'>" +
                "done_outline</i> </span>";
    }

    if(!item.IsSend){
        r.setAttribute("class","warning");
        resend.innerHTML="<button onclick='resendOrder(this)' data-info='"+item.detail+"' class=\"mdl-chip \">\n" +
            "    <span class=\"mdl-chip__text\">重发订单</span>\n" +
            "</button>";
    }else {
        resend.innerHTML= "<i class='material-icons'>" +
            "done_outline</i> </span>";
    }
    r.appendChild(te);
    r.appendChild(tf);
    r.appendChild(resend);
    r.appendChild(ta);
    r.appendChild(tb);
    r.appendChild(tc);
    r.appendChild(td);

    table.appendChild(r);
    return item.Amount;
}
