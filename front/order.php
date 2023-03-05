<div id="mm">
        <div class="select-session">
            <div class="wx ct">線上訂票</div>
            <table>
                <tr>
                    <td>電影:</td>
                    <td>
                        <select name="name" id="name">
                            <?php
                            $today = date("Y-m-d");
                            $ondate = date("Y-m-d", strtotime("-2 days"));
                            $mvs = $Movie->all(" WHERE `sh`='1' AND `ondate` BETWEEN '$ondate' AND '$today'");
                            foreach ($mvs as $mv) {
                                echo "<option value='{$mv['id']}'>{$mv['name']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>日期:</td>
                    <td>
                        <select name="date" id="date">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>場次:</td>
                    <td>
                        <select name="session" id="session">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type='button' onclick="ch()">確定</button>
                        <button type='button' onclick="lof('?')">重置</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="select-seat" style="display: none;">

        </div>
</div>
<script>
    getDay('<?=$mvs[0]['id']?>');
    $('#name').change(function() {
        getDay($(this).val());
    })
    $('#date').change(function() {
        getSession($('#name option:selected').text(), $(this).val());
    })

    function ch() {
        $('.select-session,.select-seat').toggle();
        getSeats();
    }

    function getDay(id) {
        $.get("./api/get_day.php", {
                id
            })
            .done(res => {
                $('#date').html(res);
                getSession($('#name option:selected').text(), $('#date').val());
            })
    }

    function getSession(name, date) {
        $.get("./api/get_session.php", {
                name,
                date
            })
            .done(res => {
                $('#session').html(res);
            })
    }

    function getSeats() {
        let data = {
            name: $('#name option:selected').text(),
            date: $('#date').val(),
            session: $('#session').val()
        }
        $.get("./api/get_seats.php", data)
            .done(res => {
                $('.select-seat').html(res);
                $('.tk-name').text(data.name);
                $('.tk-session').text(data.date + " " + data.session);
            })
    }
</script>