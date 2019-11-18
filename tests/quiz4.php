<?php

// demo可以跑
require('./src/quiz2_fix_final.php');
use PHPUnit\Framework\TestCase;

// ChinaFreight Unittest，可能沒什麼必要，因為測加減乘除，除非硬體問題，不然不會出錯。
class ChinaFreightTest extends TestCase {
    /* 來源
    private $element = 200;
    private $weight = 60;
    private $rate = 20;
    */

    // TestResult: 1200 does not match expected type "object".
    public function testRequest($element = 200, $weight = 50, $rate = 20) {
        // return $this -> requestTotal(); 來源
        $total = new ChinaFreight();
        $total -> request();
        // TestCase
        // $element = 200;
        // $weight = 50;
        // $rate = 20;
        $freight = $element + $weight * $rate;
        // Assert
        $this -> assertEquals($total, $freight);
    }

    // TestResult: 1200 does not match expected type "object".
    public function testRequestTotal($element = 200, $weight = 50, $rate = 20) {
        // return $this -> element; 來源
        $total = new ChinaFreight();
        $total -> requestTotal();
        // TestCase
        // $element = 200;
        // $weight = 50;
        // $rate = 20;
        $freight = $element + $weight * $rate;
        // Assert
        $this -> assertEquals($total, $freight);
    }
}

/*
再來會寫測試 client 的部分
*/
?>