







/************全局变量****************/
var orderInfo=new Object();//记录全部Order信息，即购物车
const PHPROOT="../../../../../../../php/";
var UserID="";
orderInfo.orders=new Array();
orderInfo.time="";
orderInfo.address="";
var menuName="";
var order=new Object();
var orderMenu=new Array();
var orderItem=new Object();
var totalAmount=0;
var stepIndex=1;
var finishStep=0;
var menuPrice=0;
var menuData;
var username="";
var ordertime=new Object();
var logged=false;
var OrderType="";
var Username="";
var hauptGericht_Nr=0;
var Deal_Nr=0;
var DealM_Nr=0;
var main_Nr=0
var pages=Array();
var finalPrice=0;

/************通用库函数***************/
function findDataByName(name,type) {

    for(var k in menuData){
        if(menuData[k].name==name){
            if(type){
                if(menuData[k].type=="carte"){
                    return menuData[k];
                }
            }else {
                return menuData[k];
            }

        }
    }
}//通过菜名查询菜的信息
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}


function timeNow(){
    var years,months,days,hours, minutes, seconds;
    var intYears,intMonths,intDays,intHours, intMinutes, intSeconds;
    var today;
    today = new Date(); //系统当前时间
    intYears = today.getFullYear(); //得到年份,getFullYear()比getYear()更普适
    intMonths = today.getMonth() + 1; //得到月份，要加1
    intDays = today.getDate(); //得到日期
    intHours = today.getHours(); //得到小时
    intMinutes = today.getMinutes(); //得到分钟
    intSeconds = today.getSeconds(); //得到秒钟
    years = intYears ;

    if(intMonths < 10 ){
        months = "0" + intMonths +".";
    } else {
        months = intMonths +".";
    }
    if(intDays < 10 ){
        days = "0" + intDays +".";
    } else {
        days = intDays + ".";
    }
    if (intHours == 0) {
        hours = "00:";
    } else if (intHours < 10) {
        hours = "0" + intHours+":";
    } else {
        hours = intHours + ":";
    }
    if (intMinutes < 10) {
        minutes = "0"+intMinutes;
    } else {
        minutes = intMinutes;
    }
    if (intSeconds < 10) {
        seconds = "0"+intSeconds+" ";
    } else {
        seconds = intSeconds+" ";
    }
    return "("+ hours+minutes+" Uhr am " +days+months+years+")";
    //years+months+days+hours+minutes;
}//获取现在的时间

function insert(item,parent,end) {
    parent.insertBefore(item,end);
}//将物品插入到特定位置。

function showPages(index) {

    for(x in pages){
        if(x!="remove"){
            pages[x].style.display="none";
        }


    }
    if(index=="f1"){
        if(logged){
            showItems("wagen");
        }
    }
    document.getElementById(index).style.display="flex";
}//显示X页面

/****************生成和其他*******************/

/******************界面控制器*************************/
function popLogin() {
    document.getElementById("choiceBlock").style.display="none";
    document.getElementById("log").style.display="block";
}

function popReg() {
    document.getElementById("choiceBlock").style.display="none";
    document.getElementById("regs").style.display="block";
}//弹出注册页面
function popMainmenu(event) {
    event.preventDefault();
    document.getElementById("log").style.display="none";
    document.getElementById("choiceBlock").style.display="flex";
    document.getElementById("regs").style.display="none";
}//返回选择页面

function tick() {
    document.getElementById("timeNow").innerText = timeNow();
    window.setTimeout("tick();", 1000);
}//持续显示时间

function showRecip(t) {
    //console.log("Showing Recip with ARGS:"+t);
    document.getElementById('cart').style.display=t;

}//显示账单

/*********************服务器通讯*****************************/

function getMenuData() {
    $.ajax({
        type: "POST",
        url: "../../../../../../../php/menuData.php",
        success: function(msg) {
          //  console.log(msg);
            menuData=msg.data;

        }

    });
}//获取菜单数据并赋值给menuData
function gast() {
    username="Gast";
    UserID="Gast";
    login();
}
function sendUserinfo() {
    jQuery.ajax({
        type: "POST",
        url: "https://asia-pearl-express.com/php/DataBaseJ?q=getUser",
        data : {q:0,Username:userInfo.Username.value},
        success: function(msg) {
            info=JSON.parse(msg);
            console.log(info);


            if(info){
                if(info.UserName=="Gast"){
                    alert("bitte Email Eingabe.");
                }
                if(info.Password==userInfo.Password.value){
                    username=info.Name;
                    UserID=info.UserID;
                    login();
                }else{
                    
                    alert("Falsch Passwort");
                }
            }else{
                if(userInfo.Username.value.indexOf("@")==-1){
                    jQuery.ajax({
                        type: "POST",
                        url: "https://asia-pearl-express.com/php/DataBaseJ.php?q=saveUser",
                        data : {
                            Password:"",
                            EmailAddress:userInfo.Username.value
                        },
                        success: function(msg) {
                            let a = JSON.parse(msg);
                            console.log(a);
                            if(a[0]=='good'){
                                username="";
                                UserID=a[1];
                                alert("Deine Account wurde erstellt. ");
                                window.scrollTo(0,0);
                                login();
                                return false;

                            }
                            else{
                                alert("E-mail ist besetzt.");
                                return false;
                            }
                        }
                    });

                }else{
                    alert("User Nicht Exist.");
                }

            }

            /*  var a=msg.toString();
              a.replace(/[\r\n]/g,"");
              console.log(a);

              if(a=='loginok'){


              }
              else{
                  alert('Falsch Passwort');
              }*/
        }
    });

    return false;


}//登陆
function sendUserAddress(event) {
    event.preventDefault();
    console.log(reg);
    if(!(reg.Password.value===reg.Password2.value)){

            alert('two Password not same');
            return false;

    }
    jQuery.ajax({
        type: "POST",
        url: "https://asia-pearl-express.com/php/DataBaseJ.php?q=saveUser",
        data : {
            Password:reg.Password.value,
            EmailAddress:reg.Emailaddress.value
        },
        success: function(msg) {
            let a = JSON.parse(msg);
            console.log(a);
            if(a[0]=='good'){
                username="";
                UserID=a[1];
                alert("Deine Account wurde erstellt. ");
                window.scrollTo(0,0);
                login();
                return false;

            }
            else{
                alert("E-mail ist besetzt.");
                return false;
            }
        }
    });
    return false;
}//注册

function getUserAddress() {
    jQuery.ajax({
        type: "POST",
        url: "https://asia-pearl-express.com/php/DataBaseJ.php?q=getUserByID",
        data : {
            UserID:UserID},
        success: function(msg) {

           // console.log(msg);
            msg=JSON.parse(msg);




            if(msg.Name){
                if(UserID!="Gast") {
                    document.getElementsByName("Name")[0].value=msg.Name;
                    document.getElementsByName("famileName")[0].value=msg.FamileName;
                    document.getElementsByName("Email")[0].value=msg.EmailAddress;
                    document.getElementsByName("MobiNr")[0].value=msg.MobiNr;
                    document.getElementsByName("StrasseName")[0].value=msg.Strasse;
                    document.getElementsByName("HausNr")[0].value=msg.HausNr;
                    document.getElementsByName("Etage")[0].value=msg.Etage;
                    document.getElementsByName("Plz")[0].value=msg.Plz;
                    document.getElementsByName("Stadt")[0].value=msg.Stadt;
                    newRow("Daten:", msg.Name + "<br>" + msg.Strasse + msg.HausNr + " Etage: " + msg.Etage + "<br>" + msg.Plz + " \t" + msg.Stadt + "<br>" + msg.MobiNr);
                    orderInfo.address = "\\b" + msg.Name + "   \\b" + msg.FamileName + "\n" + msg.Strasse + msg.HausNr + "Etage: " + msg.Etage + "\n" + msg.Plz + " \t" + msg.Stadt + "\n" + msg.MobiNr + "\n";
                }
            }
        }
    });

    return false;
}

/**********************各页面控制**********************************/

function newRow(title,word) {
    if(document.getElementById(title)!=undefined){
        document.getElementById(title).remove();
    }
    var $listrow=document.createElement("div");
    $listrow.setAttribute("id",title);
    $listrow.setAttribute("class","listRow");
    var $listtitle=document.createElement("div");
    $listtitle.setAttribute("class","listTitle");
    $listtitle.innerHTML=title;
    var $listcontext=document.createElement("div");
    $listcontext.setAttribute("class","listContext");
    $listcontext.innerHTML=word;
    $listrow.appendChild($listtitle);
    $listrow.appendChild($listcontext);

    document.getElementsByClassName("OrderDetailContainer")[0].insertBefore($listrow,document.getElementById("ends"));
}//账单中生成新行
function detialShowItems(target) {
    var wagen=document.getElementById(target);
    $("#wagen").empty();
    wagen.innerHTML=" <tr>\n" +
        "                <th style='width:200px'>BESTELLT FÜR</th>\n" +
        "                <th>Artikel</th>\n" +
        "                 <th>Menge  </th>\n" +
        "                <th>Preis</th>\n" +
        "            </tr>";
    wagen.style.display="";
    var end=document.getElementById("ends");
    end.style.display="flex";
    var priceAll=0;
    var first=true;
    for(var i=0;i<orderInfo.orders.length;i++){
        var row=document.createElement("tr");
        var bf=document.createElement("td");
        bf.innerText=orderInfo.orders[i].gastName;
        var name=document.createElement("td");
        name.innerHTML=orderInfo.orders[i].name+
            "<button menuIndex='"+i+"' class='smallButton2' onclick='editItem(event)'></button>";;
        var amount=document.createElement("td");
        amount.innerText=orderInfo.orders[i].amount;
        var preis=document.createElement("td");
        preis.innerHTML="‎€"+orderInfo.orders[i].price.toFixed(2)+
            "<button menuIndex='"+i+"' class='smallButton' onclick='removeItem(event)'></button>";;
        priceAll+=orderInfo.orders[i].price*orderInfo.orders[i].amount;
        row.appendChild(bf);
        row.appendChild(name);
        row.appendChild(amount);
        row.appendChild(preis);
        wagen.appendChild(row);

        for(var t=0;t<orderInfo.orders[i].info.length;t++){
            var row1=document.createElement("tr");
            var tmp=document.createElement("td");
            var name1=document.createElement("td");
            var preis1=document.createElement("td");
            preis1.innerText="";
            name1.innerText=orderInfo.orders[i].info[t].name;
            var amount1=document.createElement("td");
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
            }else if (orderInfo.orders[i].info[t].amount!=2){
                amount1.innerHTML=orderInfo.orders[i].info[t].amount;

            }
            else{
                amount1.innerText="";
            }


            row1.appendChild(tmp);
            row1.appendChild(name1);
            row1.appendChild(amount1);
            row1.appendChild(preis1);
            wagen.appendChild(row1);
        }
    }
    return priceAll;
}


function removeItem(event) {

    removeItemAt(event.target.attributes[0].nodeValue);

    showItems('wagen');
}
function removeItemAt(i) {
    //  console.log(orderInfo.orders.length);
    // console.log("Ready "+"and removeIndex="+i);
    orderInfo.orders.splice(i,1);

}

function showItems(wagens) {
    // console.log(orderInfo.orders.length);
    var wagen=document.getElementById(wagens);
    $("#"+wagens).empty();
    wagen.innerHTML=" <tr>\n" +
        "                <th>Artikel</th>\n" +
        "                <th>Menge</th>\n" +
        "                <th>Preis</th>\n" +
        "            </tr>";
    wagen.style.display="";
    var priceAll=0;

    for(var i=0;i<orderInfo.orders.length;i++){
        var row=document.createElement("tr");
        var name=document.createElement("td");
        name.innerHTML=orderInfo.orders[i].name+
            "<button menuIndex='"+i+"' class='smallButton2' onclick='editItem(event)'></button>";;
        var amount=document.createElement("td");
        amount.innerText=orderInfo.orders[i].amount;
        var preis=document.createElement("td");
        preis.innerHTML="‎€"+orderInfo.orders[i].price.toFixed(2)+
            "<button menuIndex='"+i+"' class='smallButton' onclick='removeItem(event)'></button>";
        priceAll+=orderInfo.orders[i].price*orderInfo.orders[i].amount;
        row.appendChild(name);
        row.appendChild(amount);
        row.appendChild(preis);
        wagen.appendChild(row);
        var first=true;
        for(var t=0;t<orderInfo.orders[i].info.length;t++){
            var row1=document.createElement("tr");
            var name1=document.createElement("td");
            name1.innerText=orderInfo.orders[i].info[t].name;
            var amount1=document.createElement("td");
            var preis1=document.createElement("td");
            preis1.innerText="";

            if(orderInfo.orders[i].info[t].amount==1){
                amount1.innerText="half";
            }else if(orderInfo.orders[i].info[t].step=="addOn"){
                if(first){
                    name1.innerText="Zusatzt Speisen";
                    t--;
                    first=false;
                }
                else{
                    amount1.innerHTML=orderInfo.orders[i].info[t].amount;
                    preis1.innerHTML="‎€"+orderInfo.orders[i].info[t].price+"";
                    priceAll+=orderInfo.orders[i].info[t].price;
                }
            }else if (orderInfo.orders[i].info[t].amount!=2){
                amount1.innerHTML=orderInfo.orders[i].info[t].amount;

            }
            else{
                amount1.innerText="";
            }



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
    var end=document.getElementById("kasseButton");
    if(priceAll>=15){

        var r=document.getElementById("rest");
        end.style.background="blue";
        end.removeAttribute("disabled");
        r.style.display="none";
        var x=document.getElementById("hint");
        console.log(x);
        x.innerHTML="Du hast den Mindesbestellwert von 15,00€ " +
            "erreicht und kannst jetzt fortfahren."
    }else{
        var r=document.getElementById("rest");

        r.style.color="green";
        rest.innerHTML=" Benötigter Betrag, um den Mindestbestellwert zu erreichen <span style='font-size: medium;font-style: oblique'>€"+(15-priceAll).toFixed(2)+"</span>";
        r.style.display="";
        var x=document.getElementById("hint");
        x.innerHTML="Wir liefert erst ab einem Mindestbestellwert von 15.00€(exkl. Lieferkosten)";

    }

    var col2=document.createElement("td");
    var col3=document.createElement("td");
    col3.innerText="‎€"+priceAll;
    subTotal.appendChild(col1);
    subTotal.appendChild(col2);
    subTotal.appendChild(col3);
    wagen.appendChild(subTotal);
    // console.log("showitems");
}//账单中生成订单详情
var beilageNo;

var familyFest=false;
function processMenu(menuType) {
    $('#addonVorspeise').empty();
    $('#addOngetranke').empty();
    $('#addonSauce').empty();
    showRecip('none');
    var b=1;
    var h=0;
    menuName=menuType;
    document.getElementById("resultPage").style.display="none";
    document.getElementById("addOns").style.display="none";
    document.getElementById("currentType").style.display="";



    orderMenu=new Array();
    orderItem=new Object();
    totalAmount=0;
    stepIndex=0;
    finishStep=0;

    switch (menuType){
        case "MENÜ 1":h=1;break;
        case "MENÜ 2":h=2;break;
        case "MENÜ 3":h=3;break;
        case "Familienfest":h=3;b=3;break;
        case "8-12 Person":h=2;b=2;break;
        case "16-20 Person":h=3;b=3;break;
        case "24-26 Person":h=4;b=4;break;
        case "Unsere Favoriten":{
            singleOrderMenuProcess(menuType);
            return;
        }
        case "Vorspeisen":{
            singleOrderMenuProcess(menuType);
            return;
        }
        case "Getränke":{
            singleOrderMenuProcess(menuType);
            return;
        }
        case "A LA Carte":{
            singleOrderMenuProcess(menuType);
            return;
        }
        default:{
            var infos=orderInfo.orders[menuType];

            if(infos.name=="Unsere Favoriten"||infos.name=="Vorspeisen"||infos.name=="Getränke"||infos.name=="A LA Carte"){
                processMenu(infos.name);

                for(i in infos.info){
                    // console.log(infos.info);
                    if(infos.info[i].step=="addOn"){
                        var amount='Groß';
                        if(infos.info[i].amount=="Klein"){
                            amount='Klein';
                        }
                        recordAddOnOrder(amount,infos.info[i].name);
                        continue;
                    }
                    if(infos.info[i].name!="remove"){

                        recordSingleItemOrder(infos.info[i].name);
                    }

                }
                showAddOns();
                removeItemAt(menuType);
                return;
            }
            processMenu(infos.name);

            for(i in infos.info){
                if(infos.info[i].step=="addOn"){
                    var amount='Groß';
                    if(infos.info[i].amount=="Klein"){
                        amount='Klein';
                    }
                    recordAddOnOrder(amount,infos.info[i].name);
                    continue;
                }
                if(infos.info[i].name!="remove"){
                    amount='full';
                    if(infos.info[i].amount==1){
                        amount='half';
                    }
                    RecordOrder(amount,infos.info[i].name);
                }

            }
            showAddOns();
            removeItemAt(menuType);
            return;




        }
    }
    finishStep=h+b;
    menuPrice=8.9+h;
    var price=8.9+h;
    beilageNo=b;
    if(menuType=="Familienfest"){
        menuPrice=49;
        price=49;
        familyFest=true;
    }
    if(menuType=="12-16 Person"){
        menuPrice=102;
        price=102;
        familyFest=true;
    }
    if(menuType=="26-30 Person"){
        menuPrice=205;
        price=205;
        familyFest=true;
    }
    if(menuType=="18-22 Person"){
        menuPrice=143;
        price=143;
        familyFest=true;
    }


    price=price.toFixed(2);
    var $container=document.getElementById("menuPage");
    var head2=document.getElementById("menuName");
    head2.innerText=menuType;
    var head3=document.getElementById("menuPrice");
    head3.innerText="€"+price;
    var $discription=document.getElementById("menuDescribe");
    $discription.innerText="  Wälen Sie "+b+" Beilage & "+h+" HauptGericht.";
    var $stepinfo=document.getElementById("steps");
    head2.style.display="";
    head3.style.display="";
    $discription.style.display="";
    $stepinfo.style.display="";
    $("#steps").empty();
    for(var i=1;h+b>0;h--){

        var $beilage=document.createElement("div");
        $beilage.setAttribute("class","step");
        $beilage.setAttribute("data-step-index",i++);
        $beilage.setAttribute("onclick","ToSteps(this)");
        var $leftimg=document.createElement("div");
        $leftimg.setAttribute("class","leftImg makeUpImg");
        var img1=document.createElement("img");
        img1.setAttribute("class","makeUpImg");

        var $rightimg=document.createElement("div");
        $rightimg.setAttribute("class","rightImg makeUpImg");
        var img2=document.createElement("img");
        img2.setAttribute("class","makeUpImg");

        $leftimg.appendChild(img1);
        $rightimg.appendChild(img2);
        $beilage.appendChild($leftimg);
        $beilage.appendChild($rightimg);
        $stepinfo.appendChild($beilage);
        //  $beilage.appendChild(name);
        if(h+b>1){
            var $add=document.createElement("div");
            $add.setAttribute("class","add");
            $stepinfo.appendChild($add);
        }

    }
    beilageNo=b;
    menuProcess("beilag");

    nextStep();











}//初始化Order流程
var half=true;
function Order(amount,item,source){

    if(amount=='half'){
        if(half){
            console.log('hide');
            item.style.background="red";
            half=false;
            lastHalf="";
            /*$("[data-step-index="+stepIndex+"]")[0].children[1].children[0].style.display="none";
            $("[data-step-index="+stepIndex+"]")[0].children[0].children[0].style.display="none";*/
        }else{
            console.log('show');
            item.style.background="#d39e00";
            half=true;
            $("[data-step-index="+stepIndex+"]")[0].children[1].children[0].style.display="";
            $("[data-step-index="+stepIndex+"]")[0].children[0].children[0].style.display="";
        }

    }
    RecordOrder(amount,item.parentElement.parentElement.children[1].children[0].dataset.name);//todo replace with dataset
}
var lastHalf="";
function RecordOrder(amount,name) {


    if($("[data-step-index="+stepIndex+"]")[0]!=undefined){
        $("[data-step-index="+stepIndex+"]")[0].style.border="";
    }


    //console.log("Order Origin:"+"Amount:"+amount+"Name:"+name+"Step:"+stepIndex);
    var number=0;
    if(amount=='half'){
        number=1;
    }else {
        number=2;
    }

    if(totalAmount+number>2){
        console.log(orderMenu);
        console.log(name);
        removeSpecificStep(stepIndex);
        totalAmount = 0;
        RecordOrder('full', name);
        lastHalf = "";
        half=true;


        return;
    }
    orderItem.step=stepIndex;
    orderItem.type=findDataByName(name).type;
    orderItem.name=name;
    if(amount=='half'){
        lastHalf=name;
        orderItem.amount=1;
        showPic(name,totalAmount);
        totalAmount+=1;

    }
    if(amount=='full'){
        lastHalf="";
        orderItem.amount=2;
        showPic(name,totalAmount);
        showPic(name,totalAmount+1);
        totalAmount+=2;

    }
    if(findDataByName(name).addPrice!=undefined){
        menuPrice+=findDataByName(name).addPrice;
    }



    orderMenu.push(orderItem);

    //console.log(orderMenu);

    orderItem=new Object();


    if(totalAmount==2){
        if(returnTo!=0){
            stepIndex=returnTo-1;
            nextStep();
            returnTo=0;
        }

        totalAmount=0;
        nextStep();
    }

}//在菜单页点击full或half后触发，记录并管理订单内容。
function nextStep() {

    document.getElementById("resultPage").style.display="none";

    if($("[data-step-index]")!=undefined){
        for(i in  $("[data-step-index]")) {
            if( i<finishStep){
                $("[data-step-index]")[i].style.background='url(../yxj/menu/emptyforeground.png) center no-repeat';
            }
        }




    }
    stepIndex++;



    if($("[data-step-index="+stepIndex+"]")[0]!=undefined){

        $("[data-step-index="+stepIndex+"]")[0].style.background='url(../yxj/menu/backgroud.png)';
        $("[data-step-index="+stepIndex+"]")[0].style.backgroundSize='150px';
    }


    if(stepIndex>=finishStep+1){
        menuProcess("end");
        document.getElementById("currentType").style.display="none";
        document.getElementById("currentInfo").innerText="Clicken Sie die Img zu ändere Ihnen Bestellung.";
        var a=document.createElement("button");
        a.setAttribute("class","Jh-button");
        a.setAttribute("onclick","bestellung()");
        a.setAttribute("style","margin-top:30px;position:absolute;right:250px;background:#ef9832;width:160px;color:white;")
        a.innerText="Bestellen";
        document.getElementById("menuItems").appendChild(a);
        document.getElementById("resultPage").style.display="flex";

    }
    else if(stepIndex>beilageNo){

        document.getElementById("currentInfo").innerText=
            "Bitte wählen Sie eine full order zwei halbe.";

        document.getElementById("currentType").innerText="HauptGericht";

        menuProcess("hauptgericht");
    }else{
        document.getElementById("currentType").innerText="Beilage";
        document.getElementById("currentInfo").innerText=
            "Bitte wählen Sie eine full order zwei halbe.";
        familyFest = document.getElementById("menuName").innerText == "Familienfest";
        menuProcess("beilag");
        familyFest=false;
    }


}//Order流程，下一步
function menuProcess(Type) {
    var m;
    if(Type=="hauptgericht"||familyFest){
        m="full";
    }
    $("#menuItems").empty();
    if(Type!="end"){
        for(k in menuData){
            var item=menuData[k];
            if (item.type==Type){
                newItem(item.name,item.img,m,"menuItems",item);
            }
        }
    }
}
function newItem(itemName,itemImg,method,where,item){

    var _itemC=document.createElement("div");
    _itemC.setAttribute("class","itemContainer");
    var _itemI=document.createElement("div");
    _itemI.setAttribute("class","itemImg");
    var _sI=document.createElement("img");
    _sI.setAttribute("onclick","Order('full',this,1)");
    _sI.setAttribute("class","smallImg");
    _sI.setAttribute("src","../yxj"+itemImg);
    _itemI.appendChild(_sI);
    if(item.addPrice!=undefined){
        var _tag=document.createElement('div');


        _tag.setAttribute("class","smallTag");
        _tag.innerHTML=item.addPrice;
        _itemI.appendChild(_tag);
    };
    var _iD=document.createElement("div");
    _iD.setAttribute("class","itemDescribe");
    var title=document.createElement("span");
    title.setAttribute("class","title colorb");
    title.setAttribute("data-name",itemName);
    title.innerText=itemName;
    _iD.appendChild(title);
    var itemFunction=document.createElement("div");
    itemFunction.setAttribute("class","itemFunction");
    var littleButtons=document.createElement("button");
    littleButtons.setAttribute("class","littleButtons");
    littleButtons.setAttribute("onclick","Order('full',this,0)");
    littleButtons.innerText="VOLL";
    if(method!="full"){
        var littleButtons2=document.createElement("button");
        littleButtons2.setAttribute("onclick","Order('half',this,0)");
        littleButtons2.setAttribute("class","littleButtons");
        littleButtons2.innerText="HALB";
        itemFunction.appendChild(littleButtons2);
    }

    itemFunction.appendChild(littleButtons);

    _itemC.appendChild(_itemI);
    _itemC.appendChild(_iD);
    _itemC.appendChild(itemFunction);
    document.getElementById(where).appendChild(_itemC)
}//菜单页中生成并插入菜单栏物品

var returnTo=0;



function ToSteps(target) {
    var step=target.getAttribute("data-step-index");
    returnTo=stepIndex;
    stepIndex=step;
    showPic('none');
    totalAmount=0;
    stepIndex--;
    removeSpecificStep(step);
    nextStep();



}//在菜单页点击step中的内容后触发，跳转到指定位置。
function findStepIndex(step) {
    for(var i in orderMenu){
        if(orderMenu[i].step==step){
            return(i);
        }
    }
}
function removeSpecificStep(step) {
    console.log(step);
    while(findStepIndex(step)){
        var  del=findStepIndex(step);
        orderMenu.splice(del,1);
    }

    console.log(orderMenu);
}//配合ToSteps使用，删除指定step中的内容
function bestellung() {
    //  console.log(orderMenu);
    var tmp=new Object();
    tmp.amount=document.getElementById("menge").value;
    tmp.gastName=gastName.value;
    tmp.name=menuName;
    orderMenu.sort(function (a, b) {
        var step1=a.step;
        var step2=b.step;
        if(step1=="addOn"){
            return 1;
        }
        if(step2=="addOn"){
            return -1;
        }
        if(step1<step2) return -1;
        if(step1>step2) return 1;
        return 0;
    });
    // console.log(orderMenu);
    tmp.info=orderMenu;
    tmp.price=menuPrice;
    orderInfo.orders.push(tmp);
   // console.log(orderInfo);
    endOrder();
}//Order流程结束

function addExtraItem() {
    console.log("run");
}

function showPic(name,pos) {
    if(name=='none'){
        $("[data-step-index="+stepIndex+"]")[0].children[1].children[0].src="";
        $("[data-step-index="+stepIndex+"]")[0].children[0].children[0].src="";
        return;
    }
    //  console.log(name+"位置"+pos+"**在步骤"+stepIndex);
    var imgpath=findDataByName(name).img;
    $("[data-step-index="+stepIndex+"]")[0].children[pos].children[0].src="../yxj"+imgpath;
}//填充step中的图片


/************流程控制***************/

$( document ).ready(function () {
    initial();

});
//Page列表
/*
f1:Home
LoginPage
timePage
paymentPage
menuPage
BesteullungDetailPage

OrderDetailContainer
*/
function initial() {
    tick();
    getMenuData();
    $("form").validate();
    var childrens=document.getElementById("main").children;

    for(x in childrens){
        if(childrens[x].id!=null&&childrens[x].id!=""){
            if(childrens[x].id!="cart"){
                pages.push(childrens[x]);

            }


        }

    }
    $("#buttonH").click(function () {

        console.log(pageNames);
        if(pageNames=="f1"&&!logged){
            showRecip('none');
        }else if(pageNames=="LoginPage"){
            showRecip('none');
        }else if(pageNames=="over"){
            console.log(true);
            return;
        }else if(pageNames=="f1"&&logged){
            showRecip("");
            document.getElementById("kasseButton").setAttribute("onclick","kasse()");
        }
        if(pageNames=="timePage"){
            showRecip("");
        }

        //console.log("run");
        showPages(pageNames);

    });
    let d = new Date().getHours();
    let m= new Date().getMinutes();
   // console.log(d);

    $('input.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 15,
        minTime: '11:30',
        maxTime: '22:00',
        defaultTime: d,
        startTime: "11:30",
        dynamic: false,
        dropdown: true,
        scrollbar: false
    });
    //console.log(pages);
    //document.getElementById("buttonH").style.visibility="hidden";
    //document.getElementById("buttonF").innerText="Start Order";
    /*$("#buttonF").click(function (event) {
        startOrder();
    })*/
    $(".jhMenuItemContainer").click(function (event) {
        startOrder(event);
    });
    // processMenu('MENÜ 1');
    //showPages("menuPage")
    showPages("f1");
    //  showPages("addressPage");
    //showPages('timePage');
    //showRecip('');
    //showPages("BestellungDetailPage");
    //showPages("paymentPage");
    showPartyPack();
    /**/

}//起始流程
var pageNames="";
function showPartyPack() {
    $(".partypack").toggle();
}


function backIndex(pageName){
    pageNames=pageName
}

function startOrder(event) {
    document.getElementById("gastName").value="";

    if(logged){
        OrderType=event.target.children[0].children[0].children[0].dataset.name;
        //OrderType=event.target.children[0].children[0].children[0].innerText;
        BeginOrder(OrderType);
    //    console.log(OrderType);
    }else{
        document.getElementById('controls').style.display='flex';
        startLogin();
    }
}//准备开始订单，未登陆时打开登陆页。
function BeginOrder(OrderType) {
    $("[data-order-step=3]").addClass("on");
    processMenu(OrderType);
    showRecip("none");
    showPages("menuPage");
    backIndex("f1");
}
function endOrder() {
    showRecip("block");
    showItems("wagen");
    showPages("f1");
    $("[data-order-step=3]").addClass("done");
}//结束Order并返回首页

function startLogin() {
    $("[data-order-step=1]").addClass("on");
    showPages("LoginPage");
    backIndex("f1");
}//开始登陆和选择地址
function login() {

    logged=true;
    getUserAddress();
    showRecip("none");
    $("[data-order-step=1]").addClass("done");
    if(document.getElementById("welcomeWord")){
        document.getElementById("welcomeWord").remove();
    }

    document.getElementById("gastName").placeholder=username;
    document.getElementById("username").innerText=username;
    startTime();
}//登陆成功后打开时间页
function startTime() {
    backIndex("LoginPage");
    $("[data-order-step=2]").addClass("on");
    showPages("timePage");
    showRecip("");
}//开始时间页
function sendOrdertime() {

    ordertime.type=time.ready_time_type.value;

    if(ordertime.type!="SBWM"){

        ordertime.time="("+time.times.value+'Uhr am'+time.date.value+")";
        if(ordertime.time[2]=="h"){
            alert("Bitte Wählens Sie Eine Gültig Zeit");
            return false;
        }
    }
    else{
        ordertime.time=timeNow();
    }

    let hour=ordertime.time.split(":")[0].substring(1,3);
    let min=ordertime.time.split(":")[1].substring(0,2);
    console.log(hour,min);

    let target=new Date();
    target.setHours(hour);
    target.setMinutes(min);
   // console.log(ordertime);
    restaurantName=getQueryString("location")?getQueryString("location"):"lunen";
    console.log(restaurantName);
    if(restaurantName=="lunen"){
        let judge=new Date();
        judge.setHours(11);
        judge.setMinutes(30);
        let end=new Date();
        end.setHours(14);
        end.setMinutes(30);
        let night=new Date();
        night.setHours(17);
        night.setMinutes(0);
        let close=new Date();
        close.setHours(21);
        close.setMinutes(30);


        if((target>=judge&&target<=end)||(target>=night&&target<=close)){
            console.log("good");
            $("[data-order-step=2]").addClass("done");
            showPages("f1");
            orderInfo.time=ordertime;
            newRow("Lieferzeit","("+ordertime.type+")"+ordertime.time+" <a style='cursor: pointer;' onclick='showPages(\"timePage\")'>ändern</a>");
            backIndex("timePage");
            return false;

        }

    }else{

        let night=new Date();
        night.setHours(17);
        night.setMinutes(0);
        let close=new Date();
        close.setHours(21);
        close.setMinutes(30);


        if((target>=night&&target<=close)){
            console.log("good");
            $("[data-order-step=2]").addClass("done");
            showPages("f1");
            orderInfo.time=ordertime;
            newRow("Lieferzeit","("+ordertime.type+")"+ordertime.time+" <a style='cursor: pointer;' onclick='showPages(\"timePage\")'>ändern</a>");
            backIndex("timePage");
            return false;

        }
    }



    alert("Bitte Wählens Sie Eine Gültig Zeit");
    return false;

}//完成时间页并返回首页

/**/

function kasse() {

    var price=detialShowItems("wagens");
    if(price<15){
        // alert("Mindesten Total ist 15EUR");
        showItems("wagen");
        return;
    }

    showPages("BestellungDetailPage");
    var kasse= document.getElementById("kasseButton");
    kasse.innerText="Bestätigen";
    kasse.setAttribute("onclick","zukasse()");
    document.getElementById("totalNumber").innerText=orderInfo.orders.length;


    document.getElementById("betrag").innerText="‎€"+(price/1.19).toFixed(2);
    document.getElementById("sumPrice").innerText="‎€"+(price).toFixed(2);
    document.getElementById("steuer").innerText="‎€"+(price-price/1.19).toFixed(2);
    orderInfo.finalPrice=price.toFixed(2);
    backIndex("f1");
    finalPrice=price;
}//打开检视页

function zukasse() {
    //  document.getElementById("totalPrice").innerText="‎€"+(finalPrice).toFixed(2);
    showPages("addressPage");
    var kasse= document.getElementById("kasseButton")
    kasse.nodeName="input";

    kasse.innerText="Bestätigen";
    kasse.setAttribute("type","submit");
    kasse.setAttribute("onclick","sendOrder()");
    kasse.setAttribute("form","address");
    $("[data-order-step=4]").addClass("on");



}//
function compare(property){
    return function(obj1,obj2){
        var value1 = obj1[property];
        var value2 = obj2[property];
        return value1 > value2;     // 升序
    }
}
function timeChange() {
    console.log("run");
    console.log(document.getElementById("sbwm"));
    document.getElementById("sbwm").checked="false";
    document.getElementById("ready_time_type").checked="true";
}
function sendOrder(){
    orderInfo.drinkPrice=0;
    orderInfo.tag=address.annmerkungen.value;
    for(item of orderInfo.orders){
        for(t of item.info){
            if(t.type==="getranke"){
                if(t.amount==="Klein"){
                    orderInfo.drinkPrice+=1.5;
                }else{
                    orderInfo.drinkPrice+=2.5;
                }
            }
        }

    }
    console.log("run");
    let form=document.address;
    let children=form.getElementsByTagName("input");
    console.log(orderInfo);
    if(orderInfo.time.type=="SBWM"){
        orderInfo.time.time=timeNow();
    }else{
        orderInfo.time.time=["\\b",orderInfo.time.time,"\n"+timeNow()].join("");
    }

    for(let value of children ){
       if(value.required){

           if(!value.value){
               alert("Bitte füllen Sie die vollständigen Formular aus");
               return;
           }
       }
    }
    orderInfo.payment=document.getElementById("payment").value;
    orderInfo.orders=orderInfo.orders.sort(compare("name"));
    if(['44532','44534','44536','44536','44563','45881','45883','45884','45886','45888','45889','45879'].indexOf(address.Plz.value)<0){
        alert(" In dieser Bereich\n" +
            "        noch keine Lieferservice\n" +
            "        Bitte Verstehen");
        return false;
    }else{
        if(['44532','44534','44536','44536','44563'].indexOf(address.Plz.value)<0){
            orderInfo.goto="gelsenkirchen@asiagourment.de";
        }else{
            orderInfo.goto="haodong.ju@asiagourment.de";
        }
    }
    orderInfo.emailAddress=address.Email.value;
    console.log(orderInfo);
    jQuery.ajax({
        type: "POST",
        url: "https://asia-pearl-express.com/php/DataBaseJ.php?q=updateUser",
        data : {
            Etage:address.Etage.value,
            Name:address.Name.value,
            FamileName:address.famileName.value,
            Strasse:address.StrasseName.value,
            HausNr:address.HausNr.value,
            PLZ:address.Plz.value,
            Stadt:address.Stadt.value,
            MobiNr:address.MobiNr.value,
            UserID:UserID,
        },
        success: function(msg) {
            let a = JSON.parse(msg);
            console.log(a);
            if(a[0]=='good'){

                orderInfo.address="\\b"+address.Name.value +
                    "   \\b"+address.famileName.value
                    +"\n"+address.StrasseName.value
                    +address.HausNr.value+"\nEtage: "+
                    address.Etage.value+"\n"+
                    address.Plz.value+" \t"+
                    address.Stadt.value+"\n"+
                    address.MobiNr.value+"\n";
                $.ajax({
                    url:PHPROOT+"DataBaseJ.php?q=saveOrder",
                    method:"POST",
                    data:({ 
                        UserID:UserID,
                        Amount:orderInfo.finalPrice,
                        Address:orderInfo.address,
                        goto:orderInfo.goto,
                        drinkPrice:orderInfo.drinkPrice,
                        detail:JSON.stringify(orderInfo),

                    }),
                    success:function (res) {
                        console.log(res);
                        showRecip("none");
                        showPages("dankePage");
                        $("[data-order-step=4]").addClass("done");
                        backIndex("over");
                    }
                });

            }
        }
    });

    return false;


}

function showAddOn(Type){
    toggleFloat();
    document.getElementById('addonTitle').innerText=Type;
    $("#addon").empty();
    if(Type!="end"){
        for(k in menuData){
            var item=menuData[k];
            if (item.type==Type){


                newAddon(item,"addon");
            }
        }
    }
}

function editItem(event) {
    var index=event.target.attributes[0].nodeValue;
    // console.log(event.target.attributes[0].nodeValue);
    processMenu(index);
    showRecip("none");
    showPages("menuPage");
    backIndex("f1");
}
function ToStepsMenu(target) {
    console.log("TOSTEPSMENU*******************************************");
    //  bestellung();
    //console.log(orderInfo);
    //  var index=orderInfo.orders.length-1;
    //processMenu(index);
    //showRecip('none');

    document.getElementById("currentType").style.display="none";
    document.getElementById("resultPage").style.display="none";
    document.getElementById("addOns").style.display="none";
    finishStep=0;
    stepIndex=0;
    isCart=false;
    //console.log(orderMenu);
    for(var i in orderMenu){
        //  console.log(orderMenu[i]);
        if(orderMenu[i].step==0){
            orderMenu.splice(i,1);
        }
    }
    // console.log(orderMenu);
    var tmp=orderMenu;
    orderItem={};
    switch (menuName){
        case "Unsere Favoriten":{
            menuPrice=0;
            SinglemenuProcess('menu');
        }break;
        case "Vorspeisen":{
            menuPrice=0;
            SinglemenuProcess('vorspeisen');
        }break;
        case "Getränke":{
            menuPrice=0;
            SinglemenuProcess('getranke');
        }break;
        case "A LA Carte":{
            menuPrice=0;
            isCart=true;
            SinglemenuProcess('carte');
        }break;
    }
    var $container=document.getElementById("menuPage");
    var menun=document.getElementById("menuName");
    menun.innerText="";
    var head2=document.getElementById("currentType");
    head2.innerText=menuName;
    var head3=document.getElementById("menuPrice");
    head3.innerText="";
    var $discription=document.getElementById("menuDescribe");
    //  $discription.innerText="  Wälen Sie "+b+" Beilage & "+h+" HauptGericht.";
    var $stepinfo=document.getElementById("steps");
    head2.style.display="";
    //  head3.style.display="none";
    $discription.style.display="none";
    $stepinfo.style.display="";
    $("#steps").empty();
    for(var i=0;i<1;){
        var $beilage=document.createElement("div");
        $beilage.setAttribute("class","step");
        $beilage.setAttribute("data-step-index",i++);
        $beilage.setAttribute("onclick","ToStepsMenu(this)");
        var $leftimg=document.createElement("div");
        $leftimg.setAttribute("class","leftImg makeUpImg");
        var img1=document.createElement("img");
        img1.setAttribute("class","makeUpImg");
        var $rightimg=document.createElement("div");
        $rightimg.setAttribute("class","rightImg makeUpImg");
        var img2=document.createElement("img");
        img2.setAttribute("class","makeUpImg");
        $leftimg.appendChild(img1);
        $rightimg.appendChild(img2);
        $beilage.appendChild($leftimg);
        $beilage.appendChild($rightimg);
        $stepinfo.appendChild($beilage);
    }

    showRecip("none");
    showPages("menuPage");
    backIndex("f1");
    orderMenu=tmp;
    showAddOns();
    console.log("TOSTEPSMENU*******************************************");
}

/************Var*****/
/********UI*********/
/********OtherS****/