<?php

abstract class Mahasiswa{

    public $idMhs;
    public $namaMhs;
    public $jurusan;

    abstract public function cekMahasiswa($id, $nama);

    public function cekJurusan($jurusan){
        $this->jurusan = $jurusan;

        return  "Nama    : " . $this->namaMhs . "<br>" .
                "NIM     : " . $this->idMhs   . "<br>" . 
                "Jurusan : " . $this->jurusan . "<br>" ;

    }

}

class MhsTeknik extends Mahasiswa{

    public function cekMahasiswa($id, $nama){
        $this->idMhs = $id;
        $this->namaMhs = $nama;
    }

}

class MhsEkonomi extends Mahasiswa{

    public function cekMahasiswa($id, $nama){
        $this->idMhs = $id;
        $this->namaMhs = $nama;
    }

}

$mhs1 = new MhsTeknik();
$mhs2 = new MhsEkonomi();

$mhs1->cekMahasiswa("217200034", "M Husni Ramadhan");
$mhs2->cekMahasiswa("216200080", "Ahmad Riyadi");

echo $mhs1->cekJurusan("Teknik Informatika");
echo "<br>";
echo $mhs2->cekJurusan("Manajemen Informatika");