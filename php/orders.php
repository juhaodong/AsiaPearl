<?php
header("Access-Control-Allow-Origin: *");
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
function bulidMail($method,$order){
    if($method==1){
        $message="\bAsia Pearl express\n";
        $time="Zeit:".
            $order->time->time."\n";

        $address=$order->address;
        $s=generateOrderInfo($method,$order);
        $payment="=============================\n"
            ."Netto Betrag = " .round($order->finalPrice*0.93,2)."€"."\n"
            ."mit 7% MWST = " .round($order->finalPrice*0.07,2)."€"."\n"
            ."\bBetrag:".$order->finalPrice."€\n";
        $payment.="zahlung:".$order->payment."\n";
        $message.=$time.$s.$address.$payment;
    }else{
        $message="Zeit:".
        $order->time->time."\n";
        $s=generateOrderInfo(0,$order);
        $message.=$s."\b".explode("\n",$order->address)[0];
    }

    return $message;

}
function sendMail(){
    $resend=$_POST['resend'];
    if($resend){
        $_POST['order']=str_replace(PHP_EOL,"",$_POST['order']);
        $_POST['order']=str_replace(PHP_EOL,"",$_POST['order']);
        $_POST['order']=str_replace("\t","",$_POST['order']);
        $_POST['order']=str_replace("\t","",$_POST['order']);
        $_POST['order']=str_replace("\\b","",$_POST['order']);
    }

    $order=json_decode($_POST['order']);


    $email="haodong.ju@asiagourment.de";
    $subject="print";
    $message=bulidMail(1,$order);

    if(!$resend){
        mail($order->emailAddress,"Bestellungen".$order->time->time,str_replace("\\b","",$message));//send to the user for confirm

    }

    mail($email,$subject,$message);//send twice for save
    mail($email,$subject,$message);


    mail("asia-gourmet@outlook.com","Bestellungen".$order->time->time,str_replace("\\b","",$message));


    $message= bulidMail(2,$order);
    mail($email,$subject,$message);//send to the kitchen for make
    $err=error_get_last();
    echo $err['message'];
}
sendMail();


