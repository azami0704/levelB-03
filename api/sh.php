<?php
include_once "./base.php";

$table=ucfirst($_POST['table']);
unset($_POST['table']);

$sh=$$table->find($_POST);
$sh['sh']=($sh['sh']+1)%2;
$$table->save($sh);
?>