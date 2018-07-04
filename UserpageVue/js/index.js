
UserID="";
UserInfo={};
isLogged=false;
$(document).ready(function () {
  randomColorBackground();

  M.AutoInit();
    $(".mdl-navigation__link").click(function (event) {
        if(!isLogged){
            return;
        }
        $(".mdl-layout__tab-panel").removeClass("is-active");

        $("#"+event.target.href.split("#")[1]).addClass("is-active");
    });




});

function login(event) {
    event.preventDefault();
    sendUserinfo();
}
function getDatas(){
    getUserInfo();
    $(".mdl-layout__tab-panel").removeClass("is-active");

    $("#home").addClass("is-active");

}
function getUserInfo() {
    jQuery.ajax({
        type: "POST",
        url: "http://asia-pearl-express.com/php/DataBaseJ.php?q=getDetailUser",
        data : {
            UserID:UserID},
        success: function(msg) {

            msg=JSON.parse(msg);

            UserInfo.Bestellungs=msg[1];
            UserInfo.BaseInfo=msg[0];
            console.log(msg);
            if( UserInfo.BaseInfo.Name){
                 UserInfo.address =  UserInfo.BaseInfo.Name + "   " + UserInfo.BaseInfo.FamileName + "<br>" + UserInfo.BaseInfo.Strasse + UserInfo.BaseInfo.HausNr +
                     "Etage: " +
                     UserInfo.BaseInfo.Etage + "<br>" + UserInfo.BaseInfo.Plz + " " + UserInfo.BaseInfo.Stadt + "<br>" + UserInfo.BaseInfo.MobiNr + "<br>";
                 document.getElementById("address").innerHTML=UserInfo.address;
            }
            for(let bes of UserInfo.Bestellungs){
                let card=generateCard(bes);
                if(card){
                    document.getElementById("orderC").appendChild(card);
                }

            }
        }
    });

    return false;
}
function update() {

    address=document.getElementsByName("address")[0];
    jQuery.ajax({
        type: "POST",
        url: "http://asia-pearl-express.com/php/DataBaseJ.php?q=updateUser",
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
            
        }
    });
    return false;
}
function sendUserinfo() {
    jQuery.ajax({
        type: "POST",
        url: "http://asia-pearl-express.com/php/DataBaseJ?q=getUser",
        data : {Username:logIn.Email.value},
        success: function(msg) {
            info=JSON.parse(msg);
            console.log(info);
            if(info.UserName=="Gast"){
                alert("bitte Email Eingabe.");
            }
            if(info){
                if(info.Password==logIn.password.value){

                    UserID=info.UserID;
                    isLogged=true;
                    logIn.style.display="none";
                   // login();
                }else{
                    alert("Falsch Passwort");
                }
            }else{
                alert("User Nicht Exist.");
            }

            getDatas();
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



function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}


function randomColorBackground() {
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
}
function randomColor() {
    let colors=[
        "white",
        "grey",
        "lightgrey",


    ];
    return colors[Math.floor(Math.random() * colors.length)];
}

function generateCard(Order) {

    let chips="";
    let Title="Bestellung";
    let Names=[];
    let pic="";
    if(Order.detail){
        //  console.log(Order.detail[623]+Order.detail[624]+Order.detail[625]);
        // console.log(excludeSpecial(Order.detail));
        let details=JSON.parse(excludeSpecial(Order.detail));
        console.log(details)
        for(let set of details.orders){
            Names.push(set.name);
            pic="img/yxj/menus/"+set.name+".jpg";
            for(let item of set.info){

                chips+=        "                                    <span class=\"mdl-chip\">\n" +
                    "                                         <span class=\"mdl-chip__text\">"+item.name+"</span>\n" +
                    "                                         <button type=\"button\" class=\"mdl-chip__action\">"+item.amount/2+"</button>\n" +
                    "                                    </span>\n"
            }
        }
        Title=Names.join(" & ");
    }else{
        return;
    }

    let card=document.createElement("div");
    card.setAttribute("class","mdl-cell mdl-cell--4-col");
    let show = Math.random() >= 0.7?"show":"hide";
    card.innerHTML=" <div class=\"demo-card-wide mdl-card mdl-shadow--2dp\">\n" +
        "                            <div  style='background-color: "+randomColor()+"' class=\"card-Detail  "+show+"  \" >\n" +
        "                                <div class=\"detailC\">\n" +
        "                                    <div class=\"detail-head\">\n" +
        "                                        <span>\n" +
        "                                            "+Title+"\n" +
        "                                        </span>\n" +
        "\n" +
        "                                        <button onclick=\"hideDetailCard(this)\" type=\"button\" class=\"mdl-chip__action\"><i class=\"material-icons\">cancel</i></button>\n" +
        "\n" +
        "                                    </div>\n" +
        "                                    <div class=\"detail-content\">\n" +

        chips+


        "                                    </div>\n" +
        "                                </div>\n" +
        "\n" +
        "                            </div>\n" +
        "                            <div class=\"mdl-card__title\" style='background-image: url(\""+pic+"\")'>\n" +
        "                                <h2 class=\"mdl-card__title-text\">"+Order.TimeStamp.substr(0,11)+"</h2>\n" +
        "                            </div>\n" +
        "                            <div class=\"mdl-card__supporting-text\">\n" +
        "                                "+Title+"<br>\n" +
        "                                EU"+Order.Amount+"\n" +
        "                            </div>\n" +
        "\n" +
        "                            <div class=\"mdl-card__actions mdl-card--border\">\n" +
        "                                <a onclick=\"showDetailCard(this)\" class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">\n" +
        "                                    Detail\n" +
        "                                </a>\n" +
        "                            </div>\n" +
        "                            <div class=\"mdl-card__menu\">\n" +
        "                                <button class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\">\n" +
        "                                    <i class=\"material-icons\">share</i>\n" +
        "                                </button>\n" +
        "                            </div>\n" +
        "                        </div>";
    return card;
}

function showDetailCard(card) {
    let cardDetail=card.parentElement.parentElement.children[0];
    console.log(cardDetail);
    cardDetail.setAttribute("class","card-Detail show")
}

function hideDetailCard(th) {

    th.parentElement.parentElement.parentElement.setAttribute("class","card-Detail hide");
}
let excludeSpecial = function (s) {
    // 去掉转义字符
    s = s.replace(/[\\\/\b\f\n\r\t]/g, '');
    // 去掉特殊字符
//    s = s.replace(/[\@\#\$\%\^\&\*\{\}\:\"\L\<\>\?]/);
    return s;
};