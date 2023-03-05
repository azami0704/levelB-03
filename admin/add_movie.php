<h3 class="wx ct">新增電影</h3>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>片名:</td>
            <td>
                <input type="text" name="name" id="">
            </td>
        </tr>
        <tr>
            <td>分級:</td>
            <td>
                <select name="lv" id="">
                    <?php
                    $lvs=$Movie->lv;
                    foreach($lvs as $idx=>$lv){
                        echo "<option value='$idx'>$lv</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>片長:</td>
            <td>
                <input type="text" name="len" id="">
            </td>
        </tr>
        <tr>
            <td>上映日期:</td>
            <td>
                <select name="Y" id="">
                    <option disabled selected>西元年</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>年
                <select name="m" id="">
                <option disabled selected>月份</option>
                    <?php
                    for ($i=1; $i <=12 ; $i++) { 
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>月
                <select name="d" id="">
                <option disabled selected>日期</option>
                    <?php
                    for ($i=1; $i <=31 ; $i++) { 
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>日
            </td>
        </tr>
        <tr>
            <td>發行商:</td>
            <td>
                <input type="text" name="publish" id="">
            </td>
        </tr>
        <tr>
            <td>導演:</td>
            <td>
                <input type="text" name="director" id="">
            </td>
        </tr>
        <tr>
            <td>預告影片:</td>
            <td>
                <input type="file" name="trailer" id="">
            </td>
        </tr>
        <tr>
            <td>電影海報:</td>
            <td>
                <input type="file" name="img" id="">
            </td>
        </tr>
        <tr>
            <td>劇情簡介:</td>
            <td>
                <textarea type="text" name="intro" id=""></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="table" value="movie">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>