<?php
abstract class OS {
    // Properties
    protected $os;

    // Constructor
    public function __construct($os) {
        $this->os = $os;
    }

    // Methods
    public function set_os($os) {
        $this->os = $os;
    }

    public function get_os() {
        return $this->os;
    }
}

class HP extends OS {
    // Properties
    private $nama;
    private $merk;
    private $harga;
    private $stok;

    // Constructor
    public function __construct($nama, $merk, $harga, $stok, $os) {
        $this->nama = $nama;
        $this->merk = $merk;
        $this->harga = $harga;
        $this->stok = $stok;
        $this->os = $os;
    }

    // Methods
    public function set_nama($nama) {
        $this->nama = $nama;
    }

    public function set_merk($merk) {
        $this->merk = $merk;
    }
    
    public function set_harga($harga) {
        $this->harga = $harga;
    }

    public function set_stok($stok) {
        $this->stok = $stok;
    }

    public function get_nama() {
        return $this->nama;
    }

    public function get_merk() {
        return $this->merk;
    }

    public function get_harga() {
        return $this->harga;
    }

    public function get_stok() {
        return $this->stok;
    }

    public function intro() {
        return "This is {$this->merk} {$this->nama} with {$this->os} operating system";
    }
}

class Inventaris {
    // Properties
    private $inventaris = [];

    // Methods
    // Tambah HP
    public function tambahHP(HP $hp) {
        $this->inventaris[]  = $hp;
    }

    // Hapus HP
    public function hapusHP(HP $hp) {
        foreach ($this->inventaris as $key => $item) {
            if ($item == $hp) {
                unset($this->inventaris[$key]);
                break;
            }
        }
    }

    // Ubah Nama
    public function gantiNama(HP $hp, $nama) {
        foreach ($this->inventaris as $item) {
            if ($item == $hp) {
                $hp->set_nama($nama);
                break;
            }
        }
    }

    // Ubah Merk
    public function gantiMerk(HP $hp, $merk) {
        foreach ($this->inventaris as $item) {
            if ($item == $hp) {
                $hp->set_merk($merk);
                break;
            }
        }
    }

    // Ubah Harga
    public function gantiHarga(HP $hp, $harga) {
        foreach ($this->inventaris as $item) {
            if ($item == $hp) {
                $hp->set_harga($harga);
                break;
            }
        }
    }

    // Ubah Stok
    public function gantiStok(HP $hp, $stok) {
        foreach ($this->inventaris as $item) {
            if ($item == $hp) {
                $hp->set_stok($stok);
                break;
            }
        }
    }

    // Ubah OS
    public function gantiOS(HP $hp, $os) {
        foreach ($this->inventaris as $item) {
            if ($item == $hp) {
                $hp->set_os($os);
                break;
            }
        }
    }

    // Print List HP
    public function printInventaris() {
        foreach ($this->inventaris as $hp) {
            echo "Nama  : {$hp->get_nama()}\n";
            echo "Merk  : {$hp->get_merk()}\n";
            echo "OS    : {$hp->get_os()}\n";
            echo "Harga : RP.{$hp->get_harga()}\n";
            echo "Stok  : {$hp->get_stok()}\n\n";
        }
    }
}

$hp1 = new HP("S70", "Samsung", 7000000, 100, "Android");
$hp2 = new HP("14 Pro Max", "Iphone", 20000000, 100, "IOS");
$hp3 = new HP("Pixel 2", "Google", 6000000, 100, "Android");

$inventaris = new Inventaris();
$inventaris->tambahHP($hp1);
$inventaris->tambahHP($hp2);
$inventaris->printInventaris();

// Hapus Objek
$inventaris->hapusHP($hp2);
echo "---\n";
$inventaris->printInventaris();

// Tambah Objek
$inventaris->tambahHP($hp3);
echo "---\n";
$inventaris->printInventaris();

// Update Data
$inventaris->gantiNama($hp1, "Redmi Note 9");
$inventaris->gantiMerk($hp1, "Xiaomi");
$inventaris->gantiHarga($hp1, 4000000);
$inventaris->gantiStok($hp1, 500);
$inventaris->gantiOS($hp1, "WKWK");
echo "---\n";
$inventaris->printInventaris();
?>