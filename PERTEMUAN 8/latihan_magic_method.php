<?php

class Produk
{

    public $data = array();
    public string $name = "M Husni Ramadhan";
    // public string $name = "M Husni Ramadhan";

    // public function __construct($foo)
    // {
    //     $this->name = $foo;
    // }

    public function __toString()
    {
        return "toString berasal dari class Produk";
    }

    public function __invoke()
    {
        return "Invoke berasal dari class Produk";
    }
    public function __set($properti, $value)
    {
        $this->properti = $value;
    }

    public function __get($properti)
    {
        return $this->properti;
    }

    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Method $name(". implode(",", $arguments) .") tidak ada";
    }

    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Method static $name(". implode(",", $arguments).") tidak ada";
    }

    public function __clone()
    {
        $this->name .= "(copy)";
    }

    public function __isset($name)
    {
        echo "Apakah $name ada?" . PHP_EOL;
        return isset($this->data[$name]);
    }

    // public function __debugInfo()
    // {
    //     return [
    //         'ini sudah di-var_dump' => "Euyyyyyyy",
    //     ];
    // }


}


########################################################
####### memanggil __set dan __get ######################

$obj = new Produk();
$obj->propertiTidakAda = "properti tidak ada";
echo $obj->propertiTidakAda . PHP_EOL;

########################################################






########################################################
####### Memanggil __toString dan __invoke ##############

$obj1 = new Produk();

//akan memanggil magic funtion __toString()
echo $obj1 . PHP_EOL;

//akan memanggil magic funtion __invoke()
echo $obj1() . PHP_EOL;

########################################################




########################################################
####### Memanggil __call dan __callStatic  #############

$obj2 = new Produk();
// akan memanggil magic function __call()
echo $obj2->methodGakAda(10,21,134) . PHP_EOL;

// akan memanggil magic function __callStatic()
echo Produk::MethodStaticTidakAda(12,142,124) . PHP_EOL;

########################################################



########################################################
#######             Memanggil __clone          #########

$obj3 = new Produk();
var_dump($obj3);

// akan memanggil magic function __clone()
$obj4 = clone $obj3;
var_dump($obj4);

########################################################




########################################################
######   Memanggil __isset dan __debugInfo #############

$obj5 = new Produk();
var_dump(isset($obj5->terminator));

// __debugInfo akan dijalankan apabila di-var_dump
// var_dump($obj5);

########################################################

