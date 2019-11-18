<?php

interface Goat {
    public function makeBleatSound();
    public function walk();
}
  
class WildGoat implements Goat {
    public function makeBleatSound() {
      echo "bleat!<br />";
    }
    public function walk() {
      echo "I'm walking!<br />";
    }
}

interface Dog {
    public function makeSound();
    public function run();
}
  
class Maltese implements Dog {
    public function makeSound() {
        echo "Woof!<br />";
    }
    public function run() {
        echo "I'm running!<br />";
    }
}

class DogAdapter implements Goat, Dog {
    public $Dog;
    public function dogAdapter ($dog) {
        return $this -> $Dog;
    }
    public function makeBleatSound() { // 這裡makeBleatSound是假的，實際做的是狗的makeSound()。
        return $Dog -> makeSound();
    }
    public function walk() {
        return $Dog -> run();
    }
}

// $ggg = new WildGoat();
// $ggg -> walk();
$dog = new Maltese();
// $ddd -> makeSound();
$aaa = new DogAdapter();
$aaa -> dogAdapter($dog);
?>