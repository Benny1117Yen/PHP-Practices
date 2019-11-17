<?php

/*
範例是輸入一個，輸出多個。但題目是輸出一個，輸入多個。所以可能要對調一下。
*/
class SimpleFreight {
    private $freight;
    function __construct() {
        $this->freight;
    }
    function getFreight() {
        $input1 = "Dog";
        $input2 = "USA";
        $input3 = "60";
        switch ($input1.$input2.$input3) {
            case "DogUSA60":
                return $this -> freight;
            break;         
        }
    }
}

class FreightAdapter {
    private $vendor;
    private $region;
    private $kilogram;
    function __construct(SimpleFreight $vendor_in, SimpleFreight $region_in, SimpleFreight $kilogram_in) {
        $this -> vendor = $vendor_in;
        $this -> region  = $region_in;
        $this -> kilogram  = $kilogram_in;
    }
    function getVendorRegionAndKilogram() {
        return $this -> vendor -> getFreight();
    }
}

  // client

writeln('BEGIN TESTING ADAPTER PATTERN');
writeln('');

/*
這裡之後還會做個可以輸入的來源，目前手刻。
*/
$vendorname = new SimpleFreight();
$regionname = new SimpleFreight();
$weight = new SimpleFreight();
$freightAdapter = new FreightAdapter($vendorname, $regionname, $weight);
writeln('Vendor, Region and Kilogram: '.$freightAdapter->getVendorRegionAndKilogram());
writeln('');

writeln('END TESTING ADAPTER PATTERN');

function writeln($line_in) {
    echo $line_in."<br/>";
}  
?>