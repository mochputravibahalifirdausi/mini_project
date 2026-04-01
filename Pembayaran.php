<?php
abstract class Pembayaran {
    protected $jumlah;

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    abstract public function prosesPembayaran();

    public function validasi() {
        return $this->jumlah > 0;
    }

    public function hitungTotal() {
        $diskon = $this->jumlah * 0.10;
        $pajak = $this->jumlah * 0.11;
        $total_akhir = ($this->jumlah - $diskon) + $pajak;

        return [
            'harga_awal' => $this->jumlah,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total_akhir' => $total_akhir
        ];
    }
}
?>