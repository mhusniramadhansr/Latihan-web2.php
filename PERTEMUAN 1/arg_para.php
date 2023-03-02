<?php

    class anggotaOrmawa{
        public $nama;
        public $nim;
        public $jurusan;

        public function tampil($nama, $nim, $jurusan){
            $this->nama = $nama;
            $this->nim = $nim;
            $this->jurusan = $jurusan;
        }

    }

    $anggota1 = new anggotaOrmawa();
    $anggota1->tampil("M Husni Ramadhan", "217200034", "Teknik Informatika");

    $anggota2 = new anggotaOrmawa();
    $anggota2->tampil("Ikhlash Mulyanurahman", "217200012", "Teknik Informatika");

    print_r($anggota1);
    print_r($anggota2);

?> 