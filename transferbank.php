<?php
require_once "Pembayaran.php";
require_once "cetak.php";

class TransferBank extends Pembayaran implements Cetak {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Transfer Bank Rp " . $this->jumlah;
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk Transfer Bank: Rp " . $this->jumlah;
    }
}
?>