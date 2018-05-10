<?php
if($_POST['q']==0){
    echo 'login';
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];

    $myfile = fopen("Users/".$Username."/".$Username.".txt", "r") or die( 'Invalid Username');
    $q=fgets($myfile);
    if($q==$Password){
        echo "ok";
        return;
    }
    else{
        echo 'Wrong Password';
        return;
    }
}
if($_POST['q']==1){
    echo'reg ';
    $Username=$_POST['MobiNr'];
    $Password=$_POST['Password'];

    if(file_exists("Users/".$Username)){
        echo 'Username Used';
        return;
    }
    else{
        mkdir("Users/".$Username);
    }
    $myfile = fopen("Users/".$Username."/".$Username.".txt", "w") or die( 'Invalid Username');





    fwrite($myfile,$Password);
    echo "ok";
    return;


}


?>



