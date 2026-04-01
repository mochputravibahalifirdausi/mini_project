<?php
require_once "Ewallet.php";

class QRIS extends Ewallet {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "QRIS (via E-Wallet) Rp " . $this->jumlah . " berhasil";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk QRIS: Rp " . $this->jumlah;
    }
}
?>