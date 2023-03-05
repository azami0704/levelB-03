<?php
include_once "./base.php";
$table=ucfirst($_POST['table']);
unset($_POST['table']);
$$table->del($_POST);
?>