<?php
include_once "./base.php";

$ondate=$Movie->find($_GET)['ondate'];

$duration=floor(3-(strtotime(date("Y-m-d"))-strtotime($ondate))/86400);

for ($i=0; $i <$duration ; $i++) { 
    $date=date("Y-m-d",strtotime("+$i days"));
    $str=date("m月d日 l",strtotime("+$i days"));
    echo "<option value='$date'>$str</option>";
}
?>
