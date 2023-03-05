<?php
include_once "./api/base.php";
$ondate=['2023-03-02','2023-03-03','2023-03-04','2023-03-05','2023-03-06'];
for ($i=1; $i <=9 ; $i++) { 
    $data=[];
    $data['name']="院線片$i";
    $data['lv']=rand(0,3);
    $data['len']=rand(90,120);
    $data['ondate']=$ondate[rand(0,4)];
    $data['publish']="發行商$i";
    $data['director']="導演$i";
    $data['intro']="簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介簡介";
    $data['img']="03B0$i.png";
    $data['trailer']="03B0".$i."v.mp4";
    $data['rank']=$Movie->max('id',1)+1;
    $Movie->save($data);

    $data=[];
    $data['name']="預告片$i";
    $data['img']="03A0$i.jpg";
    $data['rank']=$Trailer->max('id',1)+1;
    $data['ani']=rand(1,3);
    $Trailer->save($data);
}
?>