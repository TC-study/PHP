<?php
namespace demo;

class Index
{
    public function getName()
    {
        echo '加油！';
    }
}

$index = new Index();
$index->getName();