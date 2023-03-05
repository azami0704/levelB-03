<?php
include_once "./base.php";

$table=ucfirst($_POST['table']);
$direct=$_POST['table'];

if(isset($_POST['Y'])){
    $_POST['ondate']="{$_POST['Y']}-{$_POST['m']}-{$_POST['d']}";
}
unset($_POST['table'],$_POST['Y'],$_POST['m'],$_POST['d']);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/".$_FILES['trailer']['name']);
    $_POST['trailer']=$_FILES['trailer']['name'];
}

if(!isset($_POST['id'])){
    $_POST['rank']=$$table->max('id',1)+1;
}

$$table->save($_POST);
to("../admin.php?do=$direct");
?>