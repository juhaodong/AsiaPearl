<?php


header('Content-type: application/json');
$msg="good";
$Username=$_POST['q'];
$orderPath="Users/".$Username."/order/";
$files=scandir($orderPath);
array_splice($files,0,2);
$orderDetial=array();
foreach($files as $value){
    $t=fopen($orderPath.$value,"r");
    $time=substr($value,0,-4);
    $c=   fgets($t).fgets($t);
    $order=array(
        'Time'=>$time,
        'Detail'=>$c
    );
    array_push($orderDetial,$order);
}


$msg=$msg."Users/".$Username."/order";
$myfile = fopen("Users/".$Username."/".$Username.".txt", "r") or die( 'Invalid Username');
$res=array();
$baseInfo=array($Username,fgets($myfile));
fclose($myfile);
$file=fopen("Users/".$Username."/address.txt", "r");
$address=array();
while(!feof($file)){
    array_push($address,fgets($file));
}
fclose($file);
$res["base"]=$baseInfo;
$res["address"]=$address;
$res["msg"]=$msg;

$res['orders']=$orderDetial;
echo json_encode($res,JSON_FORCE_OBJECT);

/**
 * Created by PhpStorm.
 * User: Juhaodong
 * Date: 2018/2/23
 * Time: 10:31
 */