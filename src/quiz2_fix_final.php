<?php

// 職場遇到問題，需要多少時間解決。
// 12 / 10，二。
// 1. 要知道題意，要求的項目，adapter pattern，地區有好幾個要換，要活用。
// 遇到需求要怎麼活用。
// 2. 刪除不必要的檔案。
// 3. 物件導向加強。
// 4. API維護，東西壞掉，要補救。
/*
interface
*/

/*
參考自Ben的編程、系統學習紀錄
Adapter模式(物件版)
目前選 Falcon 當例子，因為他同時具備大陸以及台灣地區，
台灣地區的 interface 建立好之後，可以只換貨運商。
反之，大陸地區或美國 interface 也是這樣建立。
*/
interface FalconInChina {
    public function request();
    public function requestTotal();
}

// Assume KG = 60
class ChinaFreight implements FalconInChina {
    private $element = 200;
    private $weight = 60;
    private $rate = 20;

    public function request() {
        return $this -> requestTotal();
    }

    public function requestTotal() {
        $this -> element += ($this -> rate) * 60;
        return $this -> element;
    }
}

interface FalconInTaiwan {
    public function request();
    public function requestTotal();
}

class TaiwanFreight implements FalconInTaiwan {
    private $element = 150;
    private $weight = 60;
    private $rate = 30;

    public function request() {
        return $this -> requestTotal();
    }

    public function requestTotal() {
        $this -> element += ($this -> rate) * ($this -> weight);
        return $this -> element;
    }
}

// 建立 Adapter，在當中要求必須傳入實現TaiwanFreight介面的物件。
class TaiwanAdapter implements FalconInTaiwan {
    private $element;
    public function __construct(FalconInTaiwan $elementObject) {
        $this -> element = $elementObject;
    }

    public function request() {
        return $this -> element -> request();
    }

    public function requestTotal() {
        // 空白是因為物件自己執行自己本身的方法requestTotal()，按照介面規定這是我們要實現的方法，但內容空白。
    }
}

class Client {
    private $c;
    private $tAdapter;

    public function __construct() {
        $this -> c = new ChinaFreight();
        $this -> t = new TaiwanFreight();
        $this -> tAdapter = new TaiwanAdapter($this -> t);

        echo "China: ".$this -> c -> request()."<br />";
        echo "Taiwan: ".$this -> tAdapter -> request();
    }
}

$work = new Client();
// class Controller {
//     public function process(Original $total) {
//         echo $total -> send($this -> $vendor, $this -> $region, $this -> $weight);
//         return $total -> send($this -> $vendor, $this -> $region, $this -> $weight);
//     }
// }

// class Original {
//     public function send($vendor, $region, $weight) {
//         $total = "100+60*10";
//         echo $vendor.$region.$weight.': '.$total;
//         return $total;
//     }
// }
// $t = new Original();
// $t -> send("Cat", "USA", "60");
// $u = new Controller();
// $u -> process();
?>