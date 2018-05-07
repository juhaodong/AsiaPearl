function newAddon(item,where){
    var _itemC=document.createElement("div");
    _itemC.setAttribute("class","itemContainer");
    var _itemI=document.createElement("div");
    _itemI.setAttribute("class","itemImg");
    var _sI=document.createElement("img");
    _sI.setAttribute("onclick","addOnOrder('half',this,1)");
    _sI.setAttribute("class","smallImg");
    _sI.setAttribute("src","../yxj"+item.img);
    _itemI.appendChild(_sI);
    var _iD=document.createElement("div");
    _iD.setAttribute("class","itemDescribe");
    var title=document.createElement("span");
    title.setAttribute("class","title");
    title.innerText=item.name;
    _iD.appendChild(title);
    var itemFunction=document.createElement("div");
    itemFunction.setAttribute("class","itemFunction");
    if(item.bprice){
        var littleButtons=document.createElement("button");
        littleButtons.setAttribute("class","littleButtons");
        littleButtons.setAttribute("onclick","addOnOrder('full',this,0)");
        littleButtons.innerText="€"+item.bprice.toFixed(2);
        itemFunction.appendChild(littleButtons);
    }



    var littleButtons2=document.createElement("button");
    littleButtons2.setAttribute("onclick","addOnOrder('half',this,0)");
    littleButtons2.setAttribute("class","littleButtons");
    littleButtons2.innerText="€"+item.sprice.toFixed(2);
    itemFunction.appendChild(littleButtons2);




    _itemC.appendChild(_itemI);
    _itemC.appendChild(_iD);
    _itemC.appendChild(itemFunction);
    document.getElementById(where).appendChild(_itemC)
}//菜单页中生成并插入菜单栏物品
function addOnOrder(amount,item,source) {
    console.log('addOnItem');
    var name=item.parentElement.parentElement.children[1].children[0].innerHTML;
    recordAddOnOrder(amount,name);





}//在菜单页点击full或half后触发，记录并管理订单内容。

function recordAddOnOrder(amount,name) {
  //  var name=item.parentElement.parentElement.children[1].children[0].innerHTML;
    if($("[data-step-index="+stepIndex+"]")[0]!=undefined){
        $("[data-step-index="+stepIndex+"]")[0].style.border="";
    }
   // console.log(amount+name);
    orderItem.type=findDataByName(name).type;
    var number=0;
    if(amount=='half'){
        number=1;
        orderItem.amount='Klein';
        orderItem.price=findDataByName(name).sprice;
    }else {
        number=2;
        orderItem.amount='Groß';
        orderItem.price=findDataByName(name).bprice;
    }
    orderItem.step='addOn';
    orderItem.type=findDataByName(name).type;
    orderItem.name=name;
    // toggleFloat();
    console.log(orderMenu);
    console.log(orderItem);

    orderMenu.push(orderItem);
    orderItem=new Object();
}

function toggleFloat() {
    console.log("toggleFloat");
   $('#float').toggle();
   showAddOns('addOns');
}
function removeAddOn(item) {
    var i=0;
    var aim=item.innerHTML.split('|')[0].replace(/\s+/g,"");
    for(i in orderMenu){
        console.log(aim);
        if(orderMenu[i].name==aim){
            break;
        }
    }



    orderMenu.splice(i,1);
    console.log(orderMenu);
    showAddOns();
}
function showAddOns(father) {



    $('#addonVorspeise').empty();
    $('#addOngetranke').empty();
    $('#addonSauce').empty();
   // father.appendChild(generateNewRowContent('Add ons'));
    for(i in orderMenu){
        var tmp=orderMenu[i];

        if(tmp.step=="addOn"){
            
            var c=tmp.name+" | "+tmp.amount+" | "+tmp.price;
            switch (tmp.type){
                case "vorspeisen":father="addonVorspeise";break;
                case "getranke":father="addOngetranke";break;
                case "sauce":father="addonSauce";break;

            }

            father=document.getElementById(father);
            father.appendChild(generateNewRowContent(c));
        }
    }
}
function generateNewRowContent(content) {
    var r=document.createElement("div");
    r.setAttribute("class","rowContent");
    r.setAttribute("onclick","removeAddOn(this)");
    r.innerHTML=content;
    return r;
}
function showCartOnMobile() {
    //console.log("run");
    var cart=document.getElementById('cart');
    var display = cart.style.display;
    console.log(display);
    if(display=='none'){
        cart.style.display='flex';
    }
    else {
        cart.style.display='none';
    }
   
    //$("#cart").toggleDisplay();
}
function singleItemOrder(item,amount) {
    console.log(amount);
    //console.log(item.parentElement.parentElement.children[1].children[0].innerHTML);
    var tmp= findDataByName(item.parentElement.parentElement.children[1].children[0].innerHTML);
    recordSingleItemOrder(tmp.name,amount);
}
function recordSingleItemOrder(name,amount) {
    console.log(amount);
    if(name.indexOf("Groß")!=-1){
        name=name.slice(5);
    }
    if(name.indexOf("Mitte ")!=-1){
        name=name.slice(6);
    }
    if(name.indexOf("Klein ")!=-1){
        name=name.slice(6);
    }
   // console.log(name);
    var item=findDataByName(name,isCart);
  //  console.log(item);
   // console.log(item);
    orderItem=new Object();
    orderItem.amount=2;
    orderItem.step=0;
    orderItem.type=item.type;
    orderItem.name=item.name;
    menuPrice=item.sprice;

    if(amount=="s"){
        menuPrice=item.sprice;

        if(item.type!="menu"){
            orderItem.amount="Klein";
        }

    }

    if(amount=="m"){

        menuPrice=item.mprice;
        orderItem.amount="Mitte";
       // orderItem.name="Mitte "+item.name;
    }
    if(amount=="b"){
        menuPrice=item.bprice;
        orderItem.amount="Klein";
       // orderItem.name="Groß "+item.name;
    }
    orderMenu=new Array();
    orderMenu.push(orderItem);
    showPic(item.name,0);
    showPic(item.name,1);
    console.log(orderMenu);
    orderItem=new Object();
    nextStep();
}
var isCart=false;
function singleOrderMenuProcess(type) {
    showRecip('none');
    menuName=type;
    document.getElementById("currentType").style.display="none";
    document.getElementById("resultPage").style.display="none";
    document.getElementById("addOns").style.display="none";
    finishStep=0;
    stepIndex=0;
    isCart=false;
    orderMenu=new Array();
    orderItem=new Object();
    switch (type){
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
    var head2=document.getElementById("menuName");
    head2.innerText=type;
    var head3=document.getElementById("menuPrice");
    // head3.innerText=price+"0EUR";
    var $discription=document.getElementById("menuDescribe");
    //  $discription.innerText="  Wälen Sie "+b+" Beilage & "+h+" HauptGericht.";
    var $stepinfo=document.getElementById("steps");
    head2.style.display="none";
    head3.style.display="none";
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


}
function SinglemenuProcess(Type) {

    $("#menuItems").empty();
        console.log(Type);
        if(Type=="carte"){
            var f=document.getElementById("menuItems");
            var h=document.createElement("div");
            h.setAttribute("class","container2");
            h.setAttribute("style","justify-content: space-between");
            h.setAttribute("id","h");
            var ti=document.createElement("h1");
            ti.innerText="hauptgericht";
            ti.setAttribute("style","width:100%");
            h.appendChild(ti);
            f.appendChild(h);
            var b=document.createElement("div");
            b.setAttribute("class","container2");
            b.setAttribute("style","justify-content: space-between");
            b.setAttribute("id","b");
            var ti2=document.createElement("h1");
            ti2.innerText="Beilage";
            ti2.setAttribute("style","width:100%");
            b.appendChild(ti2);
            f.appendChild(b);
            var v=document.createElement("div");
            v.setAttribute("class","container2");
            v.setAttribute("style","justify-content: space-between");
            v.setAttribute("id","v");
            var ti3=document.createElement("h1");
            ti3.innerText="Vorspeisen";
            ti3.setAttribute("style","width:100%");
            v.appendChild(ti3);
            f.appendChild(v);
            var g=document.createElement("div");
            g.setAttribute("class","container2");
            g.setAttribute("style","justify-content: space-between");
            g.setAttribute("id","g");
            var ti4=document.createElement("h1");
            ti4.innerText="Getränk";
            ti4.setAttribute("style","width:100%");
            g.appendChild(ti4);
            f.appendChild(g);
            var s=document.createElement("div");
            s.setAttribute("class","container2");
            s.setAttribute("style","justify-content: space-between");
            s.setAttribute("id","s");
            var ti5=document.createElement("h1");
            ti5.innerText="Sauce";
            ti5.setAttribute("style","width:100%");
            s.appendChild(ti5);
            f.appendChild(s);
        }
        if(Type!="end"){
            for(k in menuData){
                var item=menuData[k];
                if (item.type==Type){
                    if(Type=="carte"){
                        alaCarteItem(item.name,item.img,item);
                        continue;
                    }
                    SingleOrderItem(item.name,item.img,"menuItems",item);
                }
            }
        }





}
function alaCarteItem(itemName,itemImg,item){
      //  console.log(item);

        var _itemC=document.createElement("div");
        _itemC.setAttribute("class","itemContainer");
        var _itemI=document.createElement("div");
        _itemI.setAttribute("class","itemImg");
        var _sI=document.createElement("img");
        _sI.setAttribute("onclick","singleItemOrder(this,'s')");
        _sI.setAttribute("class","smallImg");
        _sI.setAttribute("src","../yxj"+itemImg);
        _itemI.appendChild(_sI);
        if(item.addPrice!=undefined){
            var _tag=document.createElement('div');
            _tag.setAttribute("class","smallTag");
            _tag.innerHTML=item.addPrice;
            _itemI.appendChild(_tag);
        }
        var _iD=document.createElement("div");
        _iD.setAttribute("class","itemDescribe");
        var title=document.createElement("span");
        title.setAttribute("class","title colorb");
        title.innerText=itemName;
        _iD.appendChild(title);
        var itemFunction=document.createElement("div");
        itemFunction.setAttribute("class","itemFunction");




        var littleButtons2=document.createElement("button");
        littleButtons2.setAttribute("onclick","singleItemOrder(this,'s')");
        littleButtons2.setAttribute("class","littleButtons");
        littleButtons2.innerText="€"+item.sprice.toFixed(2);
        itemFunction.appendChild(littleButtons2);
        if(item.mprice){
            var littleButtons3=document.createElement("button");
            littleButtons3.setAttribute("class","littleButtons");
            littleButtons3.setAttribute("onclick","singleItemOrder(this,'m')");
            littleButtons3.innerText="€"+item.mprice.toFixed(2);
            itemFunction.appendChild(littleButtons3);
        }
        if(item.bprice){
            var littleButtons=document.createElement("button");
            littleButtons.setAttribute("class","littleButtons");
            littleButtons.setAttribute("onclick","singleItemOrder(this,'b')");
            littleButtons.innerText="€"+item.bprice.toFixed(2);
            itemFunction.appendChild(littleButtons);
        }
        _itemC.appendChild(_itemI);
        _itemC.appendChild(_iD);
        _itemC.appendChild(itemFunction);
        document.getElementById(item.subtype).appendChild(_itemC)

}
function SingleOrderItem(itemName,itemImg,where,item){

    var _itemC=document.createElement("div");
    _itemC.setAttribute("class","itemContainer");
    var _itemI=document.createElement("div");
    _itemI.setAttribute("class","itemImg");
    var _sI=document.createElement("img");
    _sI.setAttribute("onclick","singleItemOrder(this,'s')");
    _sI.setAttribute("class","smallImg");
    _sI.setAttribute("src","../yxj"+itemImg);
    _itemI.appendChild(_sI);
    if(item.addPrice!=undefined){
        var _tag=document.createElement('div');
        _tag.setAttribute("class","smallTag");
        _tag.innerHTML=item.addPrice;
        _itemI.appendChild(_tag);
    }
    var _iD=document.createElement("div");
    _iD.setAttribute("class","itemDescribe");
    var title=document.createElement("span");
    title.setAttribute("class","title colorb");
    title.innerText=itemName;
    _iD.appendChild(title);
    var itemFunction=document.createElement("div");
    itemFunction.setAttribute("class","itemFunction");




    var littleButtons2=document.createElement("button");
    littleButtons2.setAttribute("onclick","singleItemOrder(this,'s')");
    littleButtons2.setAttribute("class","littleButtons");
    littleButtons2.innerText="€"+item.sprice.toFixed(2);
    itemFunction.appendChild(littleButtons2);
    if(item.mprice){
        var littleButtons3=document.createElement("button");
        littleButtons3.setAttribute("class","littleButtons");
        littleButtons3.setAttribute("onclick","singleItemOrder(this,'m')");
        littleButtons3.innerText="€"+item.mprice.toFixed(2);
        itemFunction.appendChild(littleButtons3);
    }
    if(item.bprice){
        var littleButtons=document.createElement("button");
        littleButtons.setAttribute("class","littleButtons");
        littleButtons.setAttribute("onclick","singleItemOrder(this,'b')");
        littleButtons.innerText="€"+item.bprice.toFixed(2);
        itemFunction.appendChild(littleButtons);
    }
    _itemC.appendChild(_itemI);
    _itemC.appendChild(_iD);
    _itemC.appendChild(itemFunction);
    document.getElementById(where).appendChild(_itemC)
}//菜单