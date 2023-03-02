<?php

class mahasiswa{

    public $nama;
    public $nim;
    public $jurusan;

    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    public function getMhs():string{
        return $this->nama . "<br>" . $this->nim . "<br>" . $this->jurusan;
    }
}

$mahasiswa1 = new mahasiswa("M Husni Ramadhan", "217200034", "Teknik Informatika");
echo $mahasiswa1->getMhs();
