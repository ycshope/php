<?php
class xctf{
    public $flag = '111';
    public function __wakeup(){
    exit('bad requests');
    }
}
    $b = serialize(new xctf());
    echo "serialize=" . $b . PHP_EOL;

?>