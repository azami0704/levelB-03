<div class="data-block">
<h3 class="wx ct">預告片清單</h3>
<form action="./api/edit.php" method="post">
<div class="top-data">
    <div class="wx ct trailer row">
        <div>預告片海報</div>
        <div>預告片片名</div>
        <div>預告片排序</div>
        <div>操作</div>
    </div>
    <?php
    $mvs = $Trailer->all("ORDER BY `rank`");
    foreach ($mvs as $idx => $mv) {
        $prev=$idx==0?$mv['id']:$mvs[$idx-1]['id'];
        $next=$idx==count($mvs)-1?$mv['id']:$mvs[$idx+1]['id'];
    ?>
        <div class="trailer row">
            <div>
                <img src="./upload/<?=$mv['img']?>" alt="" style="height:100px;">
            </div>
            <div>
                <input type="text" name="name[]" value="<?= $mv['name'] ?>">
            </div>
            <div>
                <button type='button' onclick="sw('trailer',<?= $mv['id'] ?>,<?= $prev ?>)">排序往上</button>
                <button type='button' onclick="sw('trailer',<?= $mv['id'] ?>,<?= $next ?>)">排序往下</button>
            </div>
            <div>
                <input type="hidden" name="id[]" value="<?= $mv['id'] ?>">
                <input type="checkbox" name="sh[]" value="<?= $mv['id'] ?>" <?= $mv['sh'] == 1 ? 'checked' : ''; ?>>顯示
                <input type="checkbox" name="del[]" value="<?= $mv['id'] ?>">刪除
                <select name="ani[]" id="">
                    <option value="1" <?=$mv['ani']==1?'selected':'';?>>淡入</option>
                    <option value="2" <?=$mv['ani']==2?'selected':'';?>>滑入</option>
                    <option value="3" <?=$mv['ani']==3?'selected':'';?>>縮放</option>
                </select>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <input type="hidden" name="sh[]" value="0">
    <input type="hidden" name="table" value="trailer">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
    </form>
    <h3 class="wx ct">新增預告片海報</h3>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div>預告片海報:
            <input type="file" name="img">
        </div>
        <div>預告片片名:
            <input type="text" name="name">
        </div>
    </div>
    <div class="ct">
        <input type="hidden" name="table" value="trailer">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
    </form>
</div>