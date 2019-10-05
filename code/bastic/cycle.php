<?php
    $sum = 0;
    for ($i = 0;$i <= 100;$i++){
    $sum = $sum + $i;
    }
    echo $sum;
    echo '<hr>';
    $m = 1;
    $n = $m++;//先赋值后加减
    echo $m;//2
    echo $n;//1
    echo '<hr>';
    //随机从字符串中取一个数
    $char = 'fdsfdsf12344324234';
    $length = strlen($char)-1;//strlen放外面，效率高一点
    for ($i = 0;$i < 4;$i++){
        $random = substr($char,mt_rand(0,$length),1);
        echo $random;//直接循环输出了四个随机的字符
    }
    echo '<hr>';
    //在1到100中，输出同时被3和5整除的数
    for ($i = 1;$i <= 100;$i++){
        if ($i % 3 == 0&&$i % 5 == 0){
            echo $i,'<br>';
        }
    }
    echo '<hr>';
    //在1到100中，输出同时被3和5整除的数
    for ($i = 1;$i <= 100;$i++){
        if ($i % 3 == 0&&$i % 5 != 0){
            echo $i,'<br>';
        }
    }
    echo '<hr>';
    //输出一个三行四列的表格
    echo '<table width="100%" border="1" cellpadding="10" cellspacing="0">';
    for ($i = 0;$i < 3;$i++){
        echo '<tr>';
        for ($j=0;$j<4;$j++){
            echo '<td>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<hr>';
    //输出一个9乘9的乘法表
    for ($i=1;$i<=9;$i++){
        for($j=1;$j<=$i;$j++){
            echo '$i*$j=',$i*$j,' ';
        }
        echo '<br>';
    }
    echo '<hr>';
    //100~1000的水仙花数
    //水仙花：百分位数和十分位数和个位数的立方等于这个三位数的本身
    for ($n = 100;$n < 1000;$n++){
        $a = substr($n,0,1);
        $b = substr($n,1,1);
        $c = substr($n,2,1);
        $a = pow($a,3);//$a^3不是$a*$a*$a
        $b = pow($b,3);
        $c = pow($c,3);
        if (($a+$b+$c) == $n){
            echo $n,'<br>';
        }
    }
    echo '<hr>';
    for ($i = 1;$i <= 9;$i++){
        for ($j = 0;$j <= 9;$j++){
            for ($k = 0;$k <= 9;$k++){
                $sum = pow($i, 3) + pow($j, 3) + pow($k, 3);
                if ($sum == ($i.$j.$k)){
                    echo $sum,'<br>';
                }
            }
        }
    }
    echo '<hr>';
    //百钱买百鸡
    //鸡公五钱，鸡母三钱，鸡雏每钱三只

    echo '<hr>';
    //分别用while和do while实现从1到100的和
    //while{}
    //do{}while();
    $sum = 0;
    $i = 1;
    while($i<=100){
        $sum = $sum +$i;
        $i++;
    }
    echo $sum;
    echo '<hr>';
    $sum = 0;
    $i = 1;
    do{
        $sum = $sum +$i;
        $i++;
    }while($i<=100);
    echo $sum;
    //for，while属于前置循环且至少执行0次，do while属于后置循环且至少执行1次
