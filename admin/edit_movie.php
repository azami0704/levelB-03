<h3 class="wx ct">新增電影</h3>
<?php

$mv=$Movie->find($_GET['id']);
?>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>片名:</td>
            <td>
                <input type="text" name="name" value="<?=$mv['name']?>">
            </td>
        </tr>
        <tr>
            <td>分級:</td>
            <td>
                <select name="lv" id="">
                    <?php
                    $lvs=$Movie->lv;
                    foreach($lvs as $idx=>$lv){
                        $select=$mv['lv']==$idx?'selected':'';
                        echo "<option value='$idx' $select>$lv</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>片長:</td>
            <td>
                <input type="text" name="len" value="<?=$mv['len']?>">
            </td>
        </tr>
        <tr>
            <td>上映日期:</td>
            <td>
                <select name="Y" id="">
                    <option disabled selected>西元年</option>
                    <option value="2023" <?=date("Y",strtotime($mv['ondate']))=='2023'?'selected':'';?>>2023</option>
                    <option value="2024" <?=date("Y",strtotime($mv['ondate']))=='2024'?'selected':'';?>>2024</option>
                </select>年
                <select name="m" id="">
                <option disabled selected>月份</option>
                    <?php
                    for ($i=1; $i <=12 ; $i++) { 
                        $select=date("m",strtotime($mv['ondate']))==$i?'selected':'';
                        echo "<option value='$i' $select>$i</option>";
                    }
                    ?>
                </select>月
                <select name="d" id="">
                <option disabled selected>日期</option>
                    <?php
                    for ($i=1; $i <=31 ; $i++) { 
                        $select=date("d",strtotime($mv['ondate']))==$i?'selected':'';
                        echo "<option value='$i' $select>$i</option>";
                    }
                    ?>
                </select>日
            </td>
        </tr>
        <tr>
            <td>發行商:</td>
            <td>
                <input type="text" name="publish" id="" value="<?=$mv['publish']?>">
            </td>
        </tr>
        <tr>
            <td>導演:</td>
            <td>
                <input type="text" name="director" id="" value="<?=$mv['director']?>">
            </td>
        </tr>
        <tr>
            <td>預告影片:</td>
            <td>
                <input type="file" name="trailer">
            </td>
        </tr>
        <tr>
            <td>電影海報:</td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>
        <tr>
            <td>劇情簡介:</td>
            <td>
                <textarea type="text" name="intro" id=""><?=$mv['intro']?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?=$mv['id']?>">
                <input type="hidden" name="table" value="movie">
                <input type="submit" value="編輯">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>