<div id="mm">
    <div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
            <div id="abgne-block-20111227">
                <div class="lists">
                    <?php
                    $posts=$Trailer->all(" WHERE `sh`='1' ORDER BY `rank`");
                    foreach($posts as $post){
                        ?>
                        <div class="pos">
                            <img src="./upload/<?=$post['img']?>" alt="">
                            <div><?=$post['name']?></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="controls">
                    <a href="#" class="lt"></a>
                    <div class="btn-view">
                        <div class="btn-list">
                            <?php
                            foreach($posts as $post){
                                ?>
                                <div class="btn" data-ani="<?=$post['ani']?>">
                                    <img src="./upload/<?=$post['img']?>" alt="">
                                    <div><?=$post['name']?></div>
                                </div>
                                <?php
                            }
                            foreach($posts as $post){
                                ?>
                                <div class="btn" data-ani="<?=$post['ani']?>">
                                    <img src="./upload/<?=$post['img']?>" alt="">
                                    <div><?=$post['name']?></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a href="#" class="rt"></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let now=0,timer;
        const imgLen=$('.btn').length/2;
        $('.pos').hide();
        $('.pos').eq(now).show();
        autoPlay();

        $('.lt').click(function(){
            now--;
            if(now<0){
                now+=imgLen;
            }
            ani();
        })

        $('.rt').click(function(){
            now++;
            if(now>imgLen-1){
                now=0;
            }
            ani();
        })

        $('.btn').click(function(){
            now=$(this).index();
            if(now<0){
                now+=imgLen;
            }
            if(now<imgLen-1){
                now=0;
            }
            ani();
        })
        $('.controls').hover(function(){
            clearInterval(timer);
        },function(){
            autoPlay();
        })
        function autoPlay(){
            timer=setInterval(() => {
                now++;
                if(now>imgLen-1){
                    now=0;
                }
                ani();
            }, 2000);
        }

        function ani(){
            $('.pos').hide();
            $('.btn-list').animate({right:`${96*now}px`},1000);
            let type=$('.btn').eq(now).data('ani');
            switch(type){
                case 1:
                    $('.pos').eq(now).fadeIn(1000);
                break;
                case 2:
                    $('.pos').eq(now).slideDown(1000);
                break;
                case 3:
                    $('.pos').eq(now).show(1000);
                break;
            }
        }
    </script>
    <div class="half">
        <h1>院線片清單</h1>
        <div class="rb tab" style="width:95%;">
        <div class="m-list">
        <?php
        $today=date("Y-m-d");
        $ondate=date("Y-m-d",strtotime("-2 days"));
        $div=4;
        $all=ceil($Movie->count(" WHERE `sh`='1' AND `ondate` BETWEEN '$ondate' AND '$today' ")/$div);
        $act=$_GET['p']??1;
        $start=($act-1)*$div;
        $mvs=$Movie->all(" WHERE `sh`='1' AND `ondate` BETWEEN '$ondate' AND '$today' ORDER BY `rank` LIMIT $start,$div ");
        foreach($mvs as $mv){
            ?>
            <div>
                <div>片名:<?=$mv['name']?></div>
                <div class="row">
                    <a href="?do=intro&id=<?=$mv['id']?>">
                        <img src="./upload/<?=$mv['img']?>" alt="" style='width:70px;'>
                    </a>
                    <div>
                        <div>分級:
                        <img src="./icon/<?=$mv['lv']?>.png" alt="">
                        <div>上映日:<?=$mv['ondate']?></div>
                        <div>
                            <button type='button' onclick="lof('?do=intro&id=<?=$mv['id']?>')">劇情簡介</button>
                            <button type='button' onclick="lof('?do=order')">線上訂票</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php
        }
        ?>
        </div>
            <div class="ct">
                <?php
                for ($i=1; $i <=$all ; $i++) { 
                    $size=$act==$i?'24px':'18px';
                    echo "<a href='?p=$i' style='font-size:$size;'>$i</a>";
                }
                ?>
        </div>
        </div>
    </div>
</div>