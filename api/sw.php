<?php
include_once "./base.php";

$table=ucfirst($_POST['table']);
unset($_POST['table']);

$now=$$table->find($_POST['now']);
$target=$$table->find($_POST['target']);

$nowRank=$now['rank'];
$now['rank']=$target['rank'];
$target['rank']=$nowRank;

$$table->save($now);
$$table->save($target);
?>