<?php 
class manusia{
    public $nama_saya;

    function beriNama($namaSaya){
        $this->nama_saya = $namaSaya;
    }
}

class teman extends manusia{
    public $nama_teman;

    function beriNamaTeman($namaTeman){
        $this->nama_teman = $namaTeman;
    }
}

$husni = new teman();
$husni->beriNama("M Husni Ramadhan");
$husni->beriNamaTeman("Ikhlash Mulyanurahman");

echo "Nama Saya : " . $husni->nama_saya . "<br>" . "Nama Teman : " . $husni->nama_teman;































?>