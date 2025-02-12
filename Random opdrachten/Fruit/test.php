<?php

class Test {
    public $description;

    public function __construct()
    {
        var_dump('CALLED');
    }
}

$task = new Test();

var_dump($trask->description);
?>