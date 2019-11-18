<?php

/*
放目標，也就是運費。
*/

// old interface
interface ShippingInterface {
    public function request($vendor, $region, $weight);
}
class Shipping implements ShippingInterface {
    public function request($vendor, $region, $weight): string {
        return "$49.75";
    }
}
// new interface
interface AdvancedShippingInterface {
    public function getVendorRegionWeight($vendor_name, $region_name, $weight_name);
}
class AdvancedShipping implements AdvancedShippingInterface {
    public function getVendorRegionWeight($vendor_name, $region_name, $weight_name): string {
        return $vendor_name.$region_name.$weight_name."<br />";
    }
    public function calculate() {
        return "39.5<br />";
    }
}
// adapter interface
function ShippingAdapter() {
    $shipping = new AdvancedShipping();
    $shipping -> getVendorRegionWeight();
    return ;
}
class Target
{
    public function request(): string
    {
        return "Target: The default target's behavior.";
    }
}

/**
 * The Adaptee contains some useful behavior, but its interface is incompatible
 * with the existing client code. The Adaptee needs some adaptation before the
 * client code can use it.
 */
class Adaptee
{
    public function specificRequest(): string
    {
        return ".eetpadA eht fo roivaheb laicepS";
    }
}

/**
 * The Adapter makes the Adaptee's interface compatible with the Target's
 * interface.
 */
class Adapter extends Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request(): string
    {
        return "Adapter: (TRANSLATED) " . strrev($this->adaptee->specificRequest());
    }
}

/**
 * The client code supports all classes that follow the Target interface.
 */
function clientCode(Target $target)
{
    echo $target->request();
}

$target = new Target;
clientCode($target);
echo "<br />";

$adaptee = new Adaptee;
echo "Adaptee: " . $adaptee->specificRequest();
echo "<br />";

$adapter = new Adapter($adaptee);
clientCode($adapter);
?>