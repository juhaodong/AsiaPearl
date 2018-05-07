<?php
if($_POST['q']==0){
    echo'order ';
    $Username=$_POST['Username'];
    $time=$_POST['Time'];
    $order=$_POST['Order'];
    echo $Username;
    if($Username==""){
        echo "Error, No Username Exist";
    }
    mkdir("Users/".$Username."/order");
    if(file_exists("Users/".$Username )){
        echo "1";
        $t=date("Y-m-d G:i:s");
        echo "2";
        $newOrder=fopen("Users/".$Username."/order/".$t.".txt","w") or die (1);
        echo "3";
        //mail("juhaodong@gmail.com","order",$order);
        fwrite($newOrder,$order);
        echo "ok";
    }


    return;
}