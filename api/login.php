<?php
include_once "./base.php";

if($_POST['ac']=='admin'&&$_POST['pw']=='1234'){
    to("../admin.php");
}else{
    ?>
    <script>
        alert("帳號或密碼錯誤!");
        location.href="../index.php?do=login";
    </script>
    <?php
}
?>