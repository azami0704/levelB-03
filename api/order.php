<?php
include_once "./base.php";

$_POST['no']=date("Ymd").sprintf('%04d',$Order->max('id',1)+1);
$seats=$_POST['seats'];
$_POST['seats']=serialize($_POST['seats']);
$Order->save($_POST);
?>

<table>
    <tr>
        <td colspan="2">感謝您的訂購，訂單編號為:<?=$_POST['no']?></td>
    </tr>
    <tr>
        <td>電影:</td>
        <td><?=$_POST['name']?></td>
    </tr>
    <tr>
        <td>日期:</td>
        <td><?=$_POST['date']?></td>
    </tr>
    <tr>
        <td>場次時間:</td>
        <td><?=$_POST['session']?></td>
    </tr>
    <tr>
        <td colspan="2">座位:
            <?php
            foreach($seats as $seat){
                ?>
                <div><?= floor($seat / 5) + 1 ?>排<?= ($seat % 5) + 1 ?>號</div>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <button type='button' onclick="lof('index.php')">確認</button>
        </td>
    </tr>
</table>