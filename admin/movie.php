<h3 class="wx ct">電影管理</h3>
<button onclick="lof('?do=add_movie')">新增電影</button>
<div class="data-block">
    <?php
    $mvs = $Movie->all("ORDER BY `rank`");
    foreach ($mvs as $idx => $mv) {
        $prev=$idx==0?$mv['id']:$mvs[$idx-1]['id'];
        $next=$idx==count($mvs)-1?$mv['id']:$mvs[$idx+1]['id'];
    ?>
        <div class="row">
            <div>
                <img src="./upload/<?=$mv['img']?>" alt="" style="height:100px;">
            </div>
            <div>分級:<img src="./icon/<?= $mv['lv'] ?>.png"></div>
            <div>
                <div class="row">
                    <div>片名:<?= $mv['name'] ?></div>
                    <div>片長:<?= $mv['len'] ?></div>
                    <div>上映日期:<?= $mv['ondate'] ?></div>
                </div>
                <div>
                    <button type='button' onclick="sh('movie',<?= $mv['id'] ?>)"><?= $mv['sh'] == 1 ? '顯示' : '隱藏'; ?></button>
                    <button type='button' onclick="sw('movie',<?= $mv['id'] ?>,<?= $prev ?>)">排序往上</button>
                    <button type='button' onclick="sw('movie',<?= $mv['id'] ?>,<?= $next ?>)">排序往下</button>
                    <button type='button' onclick="lof('?do=edit_movie&id=<?= $mv['id'] ?>')">編輯電影</button>
                    <button type='button' onclick="del('movie',<?= $mv['id'] ?>)">刪除電影</button>
                </div>
                <div>
                    劇情簡介:<?= $mv['intro'] ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>