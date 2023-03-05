<h3 class="wx ct">訂單管理</h3>
<div>
    <input type="radio" name="del" id="del" value="date" checked>依日期
    <input type="text" name="date" id="date">
    <input type="radio" name="del" id="del" value="name">依片名
    <select name="name" id="name">
        <?php
        $mvs=$Order->all("GROUP BY `name`");
        foreach($mvs as $mv){
            echo "<option value='{$mv['name']}'>{$mv['name']}</option>";
        }
        ?>
    </select>
    <button type='button' onclick="qDel()">刪除</button>
</div>
<div class="data-block">
    <div class="wx ct trailer row">
        <div>訂單編號</div>
        <div>電影名稱</div>
        <div>日期</div>
        <div>場次時間</div>
        <div>訂單數量</div>
        <div>訂購位置</div>
        <div>操作</div>
    </div>
    <?php
    $orders = $Order->all();
    foreach ($orders as $idx => $order) {
    ?>
        <div class="trailer row">
            <div>
            <?=$order['no']?>
            </div>
            <div><?=$order['name']?></div>
            <div><?=$order['date']?></div>
            <div><?=$order['session']?></div>
            <div><?=$order['qt']?></div>
            <div>
                <?php
                $seats=unserialize($order['seats']);
                foreach($seats as $seat){
                    ?>
                    <div><?= floor($seat / 5) + 1 ?>排<?= ($seat % 5) + 1 ?>號</div>
                    <?php
                }
                ?>
            </div>
            <div>
            <button type='button' onclick="del('order',<?= $order['id'] ?>)">刪除電影</button>
            </div>
            </div>
    <?php
    }
    ?>
</div>
<script>
    function qDel(){
        let data={table:'order'};
        let type=$('#del:checked').val();
        data[type]=$(`[name="${type}"]`).val();
        $.post("./api/del.php",data)
        .done(res=>{
            re();
        })
    }
</script>