<?php
require '../connection/db_connection.php';

    if(isset($_POST['home.php'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender= $_POST['gender']; 
        $gmail = $_POST['gmail'];
        $pnum = $_POST['pnum'];
        $pass = sha1($_POST['pass']);
        
        // For checking hash
        // echo $pass = sha1($_POST['pass']);
    }
    $data = array(
        "fname" => $fname,
        "lname" => $lname,
        "gender" => $gender,
        "gmail" => $gmail,
        "pnum" => $pnum,
        "pass" => $pass,
    );
$insert = $collect.insertOne($data);

if($insert){
  
}



?>
