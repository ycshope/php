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
        echo "file=" . $this->file . PHP_EOL;
        //2.bypass cover
        // payload=":2:"  unavailable in PHP 7.0 
        if ($this->file != 'index.php') { 
            //the secret is in the flag.php
            $this->file = 'index.php'; 
        } 
    } 
}
if (isset($_GET['var'])) { 
    $var = base64_decode($_GET['var']); 
    //1.bypass reg
    // payload="O:+4" only available in PHP 5.0
    if (preg_match('/[oc]:\d+:/i', $var)) { 
        die('stop hacking!'); 
    } else {
        echo "unserialize:" . $var . PHP_EOL;
        @unserialize($var); 
    } 
} else { 
    highlight_file("index.php"); 
} 
?>