<?php
function sortCtype($a,$b){
    if($a->step>$b->step){
        return -1;
    }
    if($a->step<$b->step){
        return 1;
    }
    return 0;
}


function generateOrderInfo($method,$order){
    $s="";
    foreach ($order->orders as $value){
        $s.="======".$value->name;

        if($method==1){
            $s.=  "   ".$value->price."€";
        }
        $s.="============\n";

        if(!empty($value->gastName)){
            $s.= "Name:\t".$value->gastName."\n";
        }else{
            $s.="";
        }
        $s.= "\t".$value->amount."x "."\n";
        $tmp="";
        $first=true;
        uasort($value->info,'sortCtype');
        //  echo json_encode($value->info);
        foreach ($value->info as $w){
            //  echo "run";
            if(strcmp($w->step,"addOn")==0){
                //  echo "true";
                if($first){
                    $s.="----------zusätzlich--------------\n";
                    $first=false;

                }
                $s.=$w->amount." \t".$w->name."    +".$w->price."€\n";
            }else{

                $s.=$w->name."  \t";
                if($w->amount==1){
                    $s.="halbe "."\n";
                }else if ($w->amount==2){
                    $s.="\n";
                }else{
                    $s.=$w->amount."\n";
                }

            }
        }
    }
    $s.="=============================\n";
    return $s;

}
// echo 'order.';



$order=json_decode( $_POST['order']);

$email="haodong.ju@asiagourment.de";
$subject="print";
$message="\bAsia Pearl express\n";

$time="Zeit:".
    $order->time->time."\n";

$address=$order->address;
$s=generateOrderInfo(1,$order);
$payment="=============================\n"
    ."Netto Betrag = " .round($order->finalPrice*0.93,2)."€"."\n"
    ."mit 7% MWST = " .round($order->finalPrice*0.07,2)."€"."\n"
    ."\bBetrag:".$order->finalPrice."€\n";
$payment.="zahlung:".$order->payment."\n";
$message.=$time.$s.$address.$payment;
mail($email,$subject,$message);
mail($email,$subject,$message);
$message= "Zeit:".
    $order->time->time."\n";
$s=generateOrderInfo(0,$order);
$message.=$s."\b".explode("\n",$order->address)[0];
mail($email,$subject,$message);
$err=error_get_last();
echo $err['message'];

