<?php

header("Access-Control-Allow-Origin: *");
/**
 * Created by PhpStorm.
 * User: uranu
 * Date: 2018/5/13
 * Time: 0:12
 */
$db_host = 'sql152.main-hosting.eu';
//用户名
$db_user = 'u809451557_jhd';
//密码
$db_password = 'Jhd961213';
//数据库名
$db_name = 'u809451557_order';
//端口
$db_port = '3306';
//连接数据库
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);// or die('连接数据库失败！');
//echo json_encode($conn).'<br/>';
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

interface ISql
{
    public function get_sql();

    public function get_conn();

    public function execute_sql();
}

class SqlSelect implements ISql
{
    private $columns;
    private $table;
    private $predicates;
    private $conn;
    private $sql;

    public function __construct(mysqli $conn, array $columns, $table, array $predicates = null)
    {

        $this->conn = $conn;
        $this->columns = $columns;
        $this->table = $table;
        $this->predicates = $predicates;

        $this->sql =
            'SELECT ' . join(', ', $this->columns) .
            ' FROM ' . $this->table .
            ($this->predicates == null ? '' : ' WHERE (' . join(' AND ', $this->predicates) . ")") . ';';
    }

    /**
     * @return array
     */
    public function execute_sql()
    {
        // echo $this->sql;
        $query_result = $this->conn->query($this->sql);
        //echo $query_result->num_rows;
        $result = array();
        while ($row = $query_result->fetch_assoc()) {
            array_push($result, $row);
        }
        return $result;
    }

    public function get_sql()
    {
        return $this->sql;
    }

    public function get_conn()
    {
        return $this->conn;
    }
}

class SqlInsert implements ISql
{
    private $column_value_pairs;
    private $table;
    private $sql;
    private $conn;

    public function __construct(mysqli $conn, $table, array $column_value_pairs)
    {
        $this->conn = $conn;
        $this->column_value_pairs = $column_value_pairs;
        $this->table = $table;

        $this->sql =
            sprintf("INSERT INTO %s (%s) VALUES (%s)", $table,
                join(", ", array_keys($column_value_pairs)),
                join(", ", array_values($column_value_pairs)));


    }

    public function get_sql()
    {
        return $this->sql;
    }

    /**
     * @return bool|mysqli_result
     */
    public function execute_sql()
    {
        //echo $this->sql;
        $query_result = $this->conn->query($this->sql);
        return $query_result;
    }

    public function get_conn()
    {
        return $this->conn;
    }
}

class SqlUpdate implements ISql
{
    private $column_value_pairs;
    private $table;
    private $sql;
    private $conn;
    private $predicates;

    public function __construct(mysqli $conn, $table, array $column_value_pairs, array $predicates)
    {
        $this->conn = $conn;
        $this->column_value_pairs = $column_value_pairs;
        $this->table = $table;
        $this->predicates = $predicates;
        $sub_sentences = array();
        foreach ($column_value_pairs as $column => $value) {
            array_push($sub_sentences, ($column . "=" . $value));
        }

        $this->sql =
            "UPDATE " . $table .
            " SET " . join(", ", $sub_sentences) .
            " WHERE (" . join(" AND ", $predicates) . ");";
    }

    public function get_sql()
    {
        return $this->sql;
    }

    /**
     * @return bool|mysqli_result
     */
    public function execute_sql()
    {
        //echo $this->sql;
        $query_result = $this->conn->query($this->sql);
        return $query_result;
    }

    public function get_conn()
    {
        return $this->conn;
    }
}

class SqlDelete implements ISql
{
    private $table;
    private $sql;
    private $conn;
    private $predicates;

    public function __construct(mysqli $conn, $table, array $predicates)
    {
        $this->conn = $conn;
        $this->table = $table;
        $this->predicates = $predicates;

        $this->sql =
            "DELETE FROM " . $table .
            " WHERE (" . join(" AND ", $predicates) . ");";
    }

    public function get_sql()
    {
        return $this->sql;
    }

    /**
     * @return bool|mysqli_result
     */
    public function execute_sql()
    {
        //echo $this->sql;
        $query_result = $this->conn->query($this->sql);
        return $query_result;
    }

    public function get_conn()
    {
        return $this->conn;
    }
}

function common_execute_procedure(ISql $sql, $succeed = 'good', $failed = null)
{
    $result = $sql->execute_sql();
    if ($result!= null) {
        return $succeed;
    } elseif ($failed) {
        return $failed;
    } else {
        return "Error on: " . $sql->get_sql() . "<br>" . $sql->get_conn()->error . "<br>";
    }
}

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
function sendMail($param,$id,$to){
    $order=json_decode( $param);
    $email=$to??"haodong.ju@asiagourment.de";

    $subject=$id;
    $message=bulidMail(1,$order);
    $headers = 'From: Asia Pearl Express <asia-pearl@asiagourmet.de>';

    mail($order->emailAddress,"Danke für Bestellung",str_replace("\\b","",$message),$headers);//send to the user for confirm

    mail($email,$subject,$message,$headers);//send twice for save
    mail($email,$subject,$message,$headers);


    mail("asia-gourmet@outlook.com","Bestellungen".$order->time->time,$message,$headers);


    $message= bulidMail(2,$order);
    mail($email,$subject,$message);//send to the kitchen for make
    $err=error_get_last();
    echo $err['message']??"good";
}
function get_predicate_by_day_count($day_count, $end_date = null)
{
    return sprintf("TimeStamp%s",
        $day_count > 0
            ? sprintf(" BETWEEN DATE_SUB('%s', INTERVAL %d DAY) AND '%s'",
            ($end_date ?? date('Y-m-d')), $day_count, ($end_date ?? date('Y-m-d')))
            : sprintf("='%s'", ($end_date ?? date('Y-m-d'))));
}
function MessageHead($nr,$limit){
    echo date_sub(date_create(date('Y-m-d')),date_interval_create_from_date_string($limit." days"))->format("Y-m-d");
    return "\bAsia Pearl China Restaurant\nKurt-Schumacher-Str. 93\n44532 lünen\nTel: 02306/143 10\n
     "."====================================\n".
    "TAGESABSCHLUSS vom\n"
        .date_sub(date_create(date('Y-m-d')),date_interval_create_from_date_string($limit." days"))->format("Y-m-d")." \nErstellt am:\n".date('D d.m.Y h:i:s')."\n************************\nZBon Nr    :    ".$nr."\nUmsatzSt.-Nummer 31653392174\n";    ;
}
function getPrintInfo($conn,$limit){
    $select=new SqlSelect($conn,array("*"),"`u809451557_order`.Orders",array("DateDiff(now(),TimeStamp)=".$limit));

    $rs=$select->execute_sql();
    $mailTo="haodong.ju@asiagourment.de";
    $subject="print";
    $message="";
    $total=0;
    $drink=0;
    $bar=0;
    $karte=0;
    $Date_1=date_sub(date_create(date('Y-m-d')),date_interval_create_from_date_string($limit." days"))->format("Y-m-d");

    $Date_2="2018-05-01";

    $d1=strtotime($Date_1);
    $d2=strtotime($Date_2);
    $Days=round(($d1-$d2)/3600/24);
    //   var_dump($rs);
    foreach($rs as $v){

        $total+=$v["Amount"];
        $drink+=$v["drinkPrice"];
        $v["Payment"]!="EC"?$bar+=$v["Amount"]:$karte+=$v["Amount"];
    }
    $nr=(new SqlSelect($conn,array("max(id)"),"Datas"))->execute_sql()[0]["max(id)"];

    //   echo (new SqlSelect($conn,array("max(id)"),"Datas"))->get_sql();
    $insertParam=[];

    (new SqlInsert($conn,"Datas",$insertParam))->execute_sql();
    $message.=MessageHead(str_pad($Days,4,"0",STR_PAD_LEFT),$limit);
    $message.=str_repeat("=",24)."\nUmsaetze\n\\b Tagesumsatz        €".$total."\n".str_repeat("*",24)."\n"
        . "7% Umsaetzesatz netto \t     :    €".($total-$drink-($total-$drink)*0.07).
        "\nUmSt. 7% ist                      :    €".($total-$drink)*0.07.
        "\n19% Umsaetzesatz netto   :    €".$drink*0.81.
        "\nUmSt. 19% ist                    :    €".$drink*0.19."\n\nGetränke      ".round(($drink/$total)*100,2)."%      €".$drink.
        "\nKüche      ".round((1-$drink/$total)*100,2)."%      €".($total-$drink);
    $message.="\n\nUmsatz beinhaltet\n alle STORNO und RABATT summen!\n"."\n\n".
        "\\bBAR----------------".$bar.
        "\nEURO---------------0.00".
        "\nVISA---------------0.00".
        "\nAMEX---------------0.00".
        "\nGutschein----------0.00".
        "\nEC Karte-----------".$karte.
        "\nEssenmarken--------0.00".
        "\nUeberweisung-------0.00".
        "\nZechpreller--------0.00".
        "\nSonstiges----------0.00".
        "\nKredit Card--------0.00";

    mail($mailTo,$subject,$message);
}
$q_parameter = $_GET['q'];

switch ($q_parameter) {
    case 'finishOrder':
        $updParam=[];
        $ta=$_POST['OrderID'];;
        foreach($_POST as $k=>$v){
            $updParam[$k]="'".$v."'";
        }
        $sql_insert=new SqlUpdate($conn,'Orders',$updParam,array("OrderID="."'".$ta."'"));

        $sql_insert->execute_sql();
        echo "good";
        break;
    case 'updatePayment':
        $updParam=[];
        $ta=$_POST['OrderID'];;
        foreach($_POST as $k=>$v){
            $updParam[$k]="'".$v."'";
        }
        $sql_insert=new SqlUpdate($conn,'Orders',$updParam,array("OrderID="."'".$ta."'"));
        echo $sql_insert->get_sql();
        $sql_insert->execute_sql();
        echo "good";
        break;
    case 'getUserData':
        $result= new SqlSelect($conn,array("*"),"User",array("UserID='".$_GET['UserID']."'"));
        echo json_encode($result->execute_sql());
        break;
        case'getAllData':
        $result=new SqlSelect($conn,array("*"),$_GET['table']);

        //  echo $result->get_sql();
        $rs= $result->execute_sql();
        //var_dump($rs);
        echo json_encode($rs);
        break;
    case 'saveOrder':
        $insertParam=[];
        $sql_select=new SqlSelect($conn,array("max(OrderID)"),"`u809451557_order`.Orders");
        $rs=$sql_select->execute_sql();
        if($rs){

            $rs =((int)substr($rs[0]["max(OrderID)"],-4,4))+1;
            //   var_dump($rs);
            $rs=str_pad($rs,4,"0",STR_PAD_LEFT);

        }else{
            $rs="0001";
        }
        $insertParam["OrderID"]="'".date("Ymd").$rs."'";
        foreach($_POST as $k=>$v){

            $insertParam[$k]="'".$v."'";
        }

        $sql_insert=new SqlInsert($conn,'Orders',$insertParam);
        sendMail($_POST['detail'],date("Ymd").$rs,$_POST['to']);
        echo common_execute_procedure($sql_insert);

        break;
    case "printToday":
       /* for($i =0;$i<21;$i++){
            getPrintInfo($conn,$i);
        }*/
        getPrintInfo($conn,0);
        break;
    case "updateUser":
        $updParam=[];
        $ta=$_POST['UserID'];;
        foreach($_POST as $k=>$v){
            $updParam[$k]="'".$v."'";
        }
        $sql_insert=new SqlUpdate($conn,'User',$updParam,array("UserID="."'".$ta."'"));
      //  echo $sql_insert->get_sql();
        echo json_encode([common_execute_procedure($sql_insert),$ta]);
        break;

    case 'saveUser':
        $insertParam=[];

        $sql_select=new SqlSelect($conn,array("max(UserID)"),"`u809451557_order`.User");
        $rs=$sql_select->execute_sql();

        if($rs){

            $rs =((int)substr($rs[0]["max(UserID)"],-4,4))+1;
            //   var_dump($rs);
            $rs=str_pad($rs,4,"0",STR_PAD_LEFT);

        }else{
            $rs="0001";
        }
        $insertParam["UserID"]="'U".date("Ymd").$rs."'";
        foreach($_POST as $k=>$v){
            $insertParam[$k]="'".$v."'";
        }
        $sql_insert=new SqlInsert($conn,'User',$insertParam);
        echo json_encode([common_execute_procedure($sql_insert),"U".date("Ymd").$rs]);

        break;

    case 'getDetailUser':
        $result=new SqlSelect($conn,array("*"),"User",array(sprintf("UserID='%s'",$_POST['UserID'])));
        //echo $result->get_sql();
        $rs= $result->execute_sql();
        $res=(new SqlSelect($conn,array("*"),"Orders",array(sprintf("UserID='%s'",$_POST['UserID']))))->execute_sql();
        echo json_encode([$rs[0],$res]);
        break;
    case 'getUser':
        $result=new SqlSelect($conn,array("*"),"User",array(sprintf("EmailAddress='%s'",$_POST['Username'])));
        //echo $result->get_sql();
        $rs= $result->execute_sql();
        //var_dump($rs);
        echo json_encode($rs[0]);
        break;


    case 'getUserByID':
        $result=new SqlSelect($conn,array("*"),"User",array(sprintf("UserID='%s'",$_POST['UserID'])));
        //echo $result->get_sql();
        $rs= $result->execute_sql();
        //var_dump($rs);
        echo json_encode($rs[0]);
        break;
    //post
    /*case 'createEvent':
        $event_args_to_get = array_slice($EVENT_ARGS, 3);

        $creator_id = $event_args_to_get['CreaterID'];

        $event_args_to_use = array();
        foreach ($event_args_to_get as $event_arg) {
            $event_args_to_use[$event_arg] = $_POST[$event_arg];
        }
        $sql_insert = new SqlInsert($conn, 'Event', $event_args_to_use);
        echo common_execute_procedure($sql_insert);
        break;

    //post
    case 'joinEvent':
        $user_id = $_POST['UserID'];
        $event_id = $_POST['EventID'];
        $show_contact = $_POST['showcontact'];
        $message = $_POST['Message'];

        $user_event_relation = (new SqlSelect($conn, array('Type'), 'Relation',
            array(sprintf("EventID='%s'", $event_id),
                sprintf("UserID='%s'", $user_id))))->execute_sql()[0]['Type'];

        switch ($user_event_relation) {
            case $USER_EVENT_RELATION_MEMBER:
                echo '已经在活动中了，无需参加';
                break;
            case $USER_EVENT_RELATION_CHECKING:
                echo '正在审核中，无需重复提交审核';
                break;
            case $USER_EVENT_RELATION_CREATE:
                echo '不可参加自己创建的事件';
                break;
            default:
                $event_need_permission = (new SqlSelect($conn, array('NeedPermission'), 'Event',
                    array(sprintf("EventID='%s'", $event_id))))->execute_sql()[0]['NeedPermission'];
                $relation_type = $event_need_permission ? $USER_EVENT_RELATION_CHECKING : $USER_EVENT_RELATION_MEMBER;

                $sql_insert = new SqlInsert($conn, 'Relation',
                    array('EventID' => sprintf("'%s'", $event_id),
                        'UserID' => sprintf("'%s'", $user_id),
                        'Type' => sprintf("'%s'", $relation_type),
                        'Message' => sprintf("'%s'", $message),
                        'ShowContact' => (int)$show_contact));
                echo common_execute_procedure($sql_insert, '参加成功');
        }

        break;

    //get
    case 'getEventInfo':
        $event_id = $_GET['EventID'];

        $event_info = (new SqlSelect($conn, array('*'), 'Event',
            array(sprintf("EventID='%s'", $event_id))))->execute_sql()[0];

        $member_event_info = (new SqlSelect($conn, array('*'), 'Relation',
            array(sprintf("(EventID='%s')", $event_id),
                sprintf("(Type='%s' OR Type='%s')", $USER_EVENT_RELATION_MEMBER, $USER_EVENT_RELATION_CREATE)
            )))->execute_sql();

        $members = array();
        foreach ($member_event_info as $member) {
            $member_info = (new SqlSelect($conn, array('*'), 'User',
                array(sprintf("UserID='%s'", $member['UserID']))))->execute_sql()[0];

            $member_info['ShowContact'] = $member['ShowContact'];
            $member_info['Message'] = $member['Message'];
            array_push($members, $member_info);
        }

        $result = array('EventInfo' => $event_info, 'Members' => $members);
        echo json_encode($result);
        break;*/
    default:
        echo 'no such method';
}