<?php

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
    public function __construct() {
        $this -> c = new ChinaFreight();
        $this -> t = new TaiwanFreight();
        $this -> tAdapter = new TaiwanAdapter($this -> t);

        echo "China: ".$this -> c -> request()."<br />";
        echo "Taiwan: ".$this -> tAdapter -> request();
    }
}
?>