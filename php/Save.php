<?php
if($_POST['q']==1){
    echo'reg ';
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    if(file_exists("Users/".$Username)){
        echo 'Username Used';
        return;
    }
    else{
        mkdir("Users/".$Username);
    }
    $a=$_POST;
    $string="Name:".$a['a']."\r\n"."FamileName:".$a['b']."\r\n"."Straße:".$a['c']."\r\n"."HausNr:".$a['d']."\r\n"."Plz:".$a['e']."\r\n"."Stadt:".$a['f']."\r\n"."MobiNr.:".$a['g']."\r\n"."Email-Addresss:".$a['h']."\r\n";
    $file=fopen("Users/".$Username."/"."address.txt","w") or die(1);
    $myfile = fopen("Users/".$Username."/".$Username.".txt", "w") or die( 'Invalid Username');
    fwrite($myfile,$Password);
    fwrite($file,$string);
    echo "ok";
    return;
}




/**
 * Created by PhpStorm.
 * User: Juhaodong
 * Date: 2018/1/16
 * Time: 13:21
 */