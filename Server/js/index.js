const PHPROOT="https://asia-pearl-express.com/php/";
let position="";
$('document').ready(function () {

    $(".mdl-navigation__link").click(function (event) {
        $(".mdl-layout__tab-panel").removeClass("is-active");
        $("#"+event.target.href.split("#")[1]).addClass(" is-active");
    });
    Pos=getQueryString("password");

    if(Pos=="0501"){
        position="all";
    }
    else if(Pos=="0002"){
        position="haodong.ju@asiagourment.de";
    }
    else if(Pos=="1111"){
        position="gelsenkirchen@asiagourment.de";
    }
    else{
        position="none";
    }
    refreshTable(position);

});
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = location.search.substr(1).match(reg);
    if (r != null) return unescape(decodeURI(r[2])); return null;
}
function fliterData(item,target,value) {
    return (item[target]==value);
}
function refreshTable(position) {
    $("#table").empty();
    $.ajax({
        url:"https://asia-pearl-express.com/php/DataBaseJ.php?q=getAllData",
        data:{
            table:"u809451557_order.Orders",
        },
        success:function (res) {
            let info = (JSON.parse(res)).reverse();

            let total=0;
            let table=document.getElementById("table");
            let r=document.createElement("tr");
            r.innerHTML="  <th class=\"un\" width=\"300px\">Address</th>\n" +
                "                           <th>确认收单</th>\n" +
                "                           <th>订单状态</th>\n" +
                "                           <th>结算方式</th>\n" +
                "                           <th class=\"un\">OrderID</th>\n" +
                "                           <th class=\"un\">UserID</th><th class=\"un\">Amount</th><th class=\"un\">Time</th>\n";

            table.appendChild(r);



          //  console.log(position);
            if(position!="all"){
                let tmp=[];
                for(let item of info){
                    if(fliterData(item,"goto",position)){
                        //console.log(item);
                        tmp.push(item);
                    }
                }
                info=tmp;
            }

            console.log(info);
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
function ChangePayment(t,m) {
    $.ajax({
        url:"https://asia-pearl-express.com/php/DataBaseJ.php?q=updatePayment",
        data:{
            OrderID:t.dataset.id,
            Payment:m
        },
        method:"POST",
        success:function (res) {
            console.log(res);
            refreshTable(position);
        }
    })

}
function confirmOrder(t) {
    console.log(t.dataset);
    $.ajax({
        url:"https://asia-pearl-express.com/php/DataBaseJ.php?q=finishOrder",
        data:{
            OrderID:t.dataset.id,
            recieved:1
        },
        method:"POST",
        success:function (res) {
          console.log(res);
          refreshTable(position);
        }
    })
}

function resendOrder(info) {
    let data=info.dataset.info;
    console.log(data);

   // console.log(data);
    $.ajax({
        url:PHPROOT+"orders.php",
        method:"POST",
        data:({
            order:data,
            id:info.dataset.id,
            resend:true
        }),
        success:function (res) {
            console.log(res);
            refreshTable(position);
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
    let pay=document.createElement("td");
    if(item.Payment==="EC"){
        pay.innerHTML="<button onclick='ChangePayment(this,\"Bar\")' data-id='"+item.OrderID+"' class=\"mdl-chip \">\n" +
            "    <span class=\"mdl-chip__text\">用卡结算</span>\n" +
            "</button>";
    }else{
        pay.innerHTML="<button style='background-color: #0c5460' onclick='ChangePayment(this,\"EC\")' data-id='"+item.OrderID+"' class=\"mdl-chip \">\n" +
            "    <span class=\"mdl-chip__text\">普通结算</span>\n" +
            "</button>";
    }
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
        resend.innerHTML="<button onclick='resendOrder(this)'data-id='"+item.OrderID+"' data-info='"+item.detail+"' class=\"mdl-chip \">\n" +
            "    <span class=\"mdl-chip__text\">重发订单</span>\n" +
            "</button>";
    }else {
        resend.innerHTML= "<i class='material-icons'>" +
            "done_outline</i> </span>";
    }
    r.appendChild(te);
    r.appendChild(tf);
    r.appendChild(resend);
    r.appendChild(pay);
    r.appendChild(ta);
    r.appendChild(tb);
    r.appendChild(tc);
    r.appendChild(td);

    table.appendChild(r);
    return item.Amount;
}
