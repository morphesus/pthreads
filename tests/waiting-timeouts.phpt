--TEST--
Test waiting timeouts
--DESCRIPTION--
This test verifies that reaching at timeout returns the correct value
--FILE--
<?php
class T extends Thread {
        public $data;
        public function run() {
            $this->wait(10000);
        }
}

$t = new T;
$t->start();
$t->synchronized(function($thread){
	var_dump($thread->wait(100));
}, $t);
?>
--EXPECT--
bool(false)
