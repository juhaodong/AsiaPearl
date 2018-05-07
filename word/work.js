function showItems(wagens) {
    var wagen=document.getElementById(wagens);
    $("#wagen").empty();
    wagen.innerHTML=" <tr>\n"
    if(detail){ wagen.innerHTML+="  <th style='width:200px'>BESTELLT FÜR</th>\n" +}
    wagen.innerHTML=" <tr>\n" +
        "                <th>Artikel</th>\n" +
        "                <th>Menge</th>\n" +
        "                <th>Preis</th>\n" +
        "            </tr>";
    wagen.style.display="";
    if(detail){var end=document.getElementById("ends");
        end.style.display="flex";}
    var priceAll=0;
    var first=true;
    for(var i=0;i<orderInfo.orders.length;i++){
        var row=document.createElement("tr");
        if(detail){ var bf=document.createElement("td");
            bf.innerText=orderInfo.orders[i].gastName;}
        var name=document.createElement("td");
        name.innerText=orderInfo.orders[i].name;
        var amount=document.createElement("td");
        amount.innerText=orderInfo.orders[i].amount;
        var preis=document.createElement("td");
        preis.innerText="‎€"+orderInfo.orders[i].price;
        priceAll+=orderInfo.orders[i].price*orderInfo.orders[i].amount;
        if(detail){ row.appendChild(bf);}
        row.appendChild(name);
        row.appendChild(amount);
        row.appendChild(preis);
        wagen.appendChild(row);
        for(var t=0;t<orderInfo.orders[i].info.length;t++){
            var row1=document.createElement("tr");
            var name1=document.createElement("td");
            name1.innerText=orderInfo.orders[i].info[t].name;
            var amount1=document.createElement("td");
            var preis1=document.createElement("td");
            preis1.innerText="";
            if(detail){ name1.innerText=orderInfo.orders[i].info[t].name;
                var amount1=document.createElement("td");}
            if(orderInfo.orders[i].info[t].amount==1){
                amount1.innerText="half";
            }else if(orderInfo.orders[i].info[t].step=="addOn"){
                if(first){
                    name1.innerText="AddOn";
                    t--;
                    first=false;
                }
                else{
                    amount1.innerHTML=orderInfo.orders[i].info[t].amount;
                    preis1.innerText="‎€"+orderInfo.orders[i].info[t].price;
                    priceAll+=orderInfo.orders[i].info[t].price;
                }
            }
            else{
                amount1.innerText="";
            }


            if(detail){row1.appendChild(tmp);}
            row1.appendChild(name1);
            row1.appendChild(amount1);
            row1.appendChild(preis1);
            wagen.appendChild(row1);
        }
    }
    var subTotal=document.createElement("tr");
    var col1=document.createElement("td");
    col1.setAttribute("class","title");
    col1.innerText="Zusammen:";
    priceAll=priceAll.toFixed(2);
    if(priceAll>15){
        var end=document.getElementById("ends");
        end.style.display="flex";
    }

    var col2=document.createElement("td");
    var col3=document.createElement("td");
    col3.innerText="‎€"+priceAll;
    subTotal.appendChild(col1);
    subTotal.appendChild(col2);
    subTotal.appendChild(col3);
    wagen.appendChild(subTotal);
    console.log("showitems");
}//账单中生成订单详情
