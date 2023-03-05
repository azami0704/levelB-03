<?php
include_once "./base.php";

$hr=date("G");

if(date("Y-m-d")===$_GET['date']&&$hr>=14){
    $start=floor($hr/2)-6;
}else{
    $start=0;
}
for ($i=$start; $i <5 ; $i++) { 
    $session=$Movie->session[$i];
    $_GET['session']=$session;
    $seats=20-$Order->sum('qt',$_GET);
    echo "<option value='$session'>$session 剩餘座位 $seats</option>";
}
?>