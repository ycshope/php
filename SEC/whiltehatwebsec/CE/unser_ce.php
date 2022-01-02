<?php
class example {
	var $var = '';
	function __destruct() {
		eval($this->var);
	}
}
$a=unserialize($_GET['saved_code']);
echo $a;
?>
