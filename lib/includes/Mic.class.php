<?php
class Mic{
    public $light;
    public $name;
    public function __call($method, $args){
        print("\nCalling: $method\n");
        print_r($args);
        print("\n");
        return "Hello-return";

    }
    public function setLight($d)
    {

        $this->light = $d;
        // echo "hello";
    }

    
}   
$conn = new Mic;
echo $conn->setLight("sgfsedf");
echo $conn->light;
