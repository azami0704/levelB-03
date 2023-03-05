<?php
include_once "./base.php";

$bookings = [];
$orders = $Order->all($_GET);
foreach ($orders as $order) {
    $seats = unserialize($order['seats']);
    $bookings = [...$bookings, ...$seats];
}
?>
<div class="stage">STAGE</div>
<div class="seat-map">
    <?php
    for ($i = 0; $i < 20; $i++) {
        if (in_array($i, $bookings)) {
    ?>
            <div>
                <span><?= floor($i / 5) + 1 ?>排<?= ($i % 5) + 1 ?>號</span>
                <img src="./icon/03D03.png" alt="">
            </div>
        <?php
        } else {
        ?>
            <div>
                <span><?= floor($i / 5) + 1 ?>排<?= ($i % 5) + 1 ?>號</span>
                <img src="./icon/03D02.png" alt="">
                <input type="checkbox" class="chk" value="<?= $i ?>">
            </div>
    <?php

        }
    }
    ?>
</div>
<footer>
    <div>電影:<span class="tk-name"></span></div>
    <div>日期場次:<span class="tk-session"></span></div>
    <div>已選擇:<span class="tk-qt">0</span>張，最多可購買四張</div>
    <div>
        <button type='button' onclick="ch()">上一步</button>
        <button type='button' onclick="checkOut()">確定</button>
    </div>
</footer>
<script>
    let seats = [];
    $('.chk').change(function() {
        if ($(this).prop('checked')) {
            if (seats.length >= 4) {
                alert("最多只能四張");
                $(this).prop('checked', false);
            } else {
                seats.push($(this).val());
            }
        } else {
            seats.splice(seats.indexOf($(this).val()), 1);
        }
        $('.tk-qt').text(seats.length);
    });

    function checkOut() {
        let data = {
            name: $('.tk-name').text(),
            date: $('#date').val(),
            session: $('#session').val(),
            qt: seats.length,
            seats
        }
        $.post("./api/order.php", data)
            .done(res => {
                $('#mm').html(res);
            })
    }
</script>