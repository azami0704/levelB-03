<?php
include_once "./base.php";

$table=ucfirst($_POST['table']);
$direct=$_POST['table'];
unset($_POST['table']);

foreach($_POST['id'] as $idx=>$id){
    if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
        $$table->del($id);
    }else{
        foreach($_POST as $col=>$val){
            if($col=='sh'){
                $data['sh']=in_array($id,$val)?1:0;
            }else if($col!='del'){
                $data[$col]=$val[$idx];
            }
        }
        $$table->save($data);
    }
}

to("../admin.php?do=$direct");
?>