<?php

class Test
{
    public function getName()
    {
        echo 'fdsfds';
    }
}

class Demo
{
    public function getname()
    {
        $test = new Test;
        return $test;
    }
}

$demo = new Demo;
$demo->getname();

// $arr = ["fdsfsd" => 'fdsfsd', 'fsdf' => "fdsf"];
// print_r($arr);//这也是可以的

// $sql = "INSERT INTO coding_user(`username`,`password`,`nick_name`,`user_photo`,`updated_at`,`created_at`)VALUES($user['username'],$user['password'],$user['nick_name'],$user['user_photo'],$user['updated_at'],$user['created_at'])'";
// $da = $arr['nick_name'];

$str = "fdsfdsf";
$str = str_replace('s', '', $str);
echo $str;

$arr = ['fdsf', 'fdddsf', '133'];
$a   = 'fdsf';
if ($arr == $a) {
    echo 'fldj';
} else {
    echo 'fdfdfdfd';
    echo "<script>alert('呦呦呦');</script>";

}
