<?php

interface FalconInChina {
    public function request();
    public function requestTotal();
}

// Assume KG = 60
class ChinaFreight implements FalconInChina {
    private $element = 200;
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
    private $rate = 30;

    public function request() {
        return $this -> requestTotal();
    }

    public function requestTotal() {
        $this -> element += ($this -> rate) * 30;
        return $this -> element;
    }
}

class TaiwanAdapter implements FalconInTaiwan {
    private $element;
    public function __construct(FalconInTaiwan $elementObject) {
        $this -> element = $elementObject;
    }

    public function request() {
        return $this -> element -> request();
    }

    public function requestTotal() {

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