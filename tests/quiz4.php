<?php

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
?>