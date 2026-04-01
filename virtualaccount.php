<?php
require_once 'Pembayaran.php';
require_once 'cetak.php';

class VirtualAccount extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Metode Virtual Account (VA) berhasil dipilih.";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $rincian = $this->hitungTotal();
        return "<b>[ STRUK VIRTUAL ACCOUNT ]</b><br>
                Harga Awal : Rp " . number_format($rincian['harga_awal'], 0, ',', '.') . "<br>
                Diskon 10% : - Rp " . number_format($rincian['diskon'], 0, ',', '.') . "<br>
                Pajak 11% : + Rp " . number_format($rincian['pajak'], 0, ',', '.') . "<br>
                <b>Total Bayar: Rp " . number_format($rincian['total_akhir'], 0, ',', '.') . "</b>";
    }
}
?>