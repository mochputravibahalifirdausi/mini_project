<?php
require_once 'Pembayaran.php';
require_once 'cetak.php';
require_once 'transferbank.php';
require_once 'Ewallet.php';
require_once 'qris.php';
require_once 'cod.php';
require_once 'virtualaccount.php';

if (isset($_POST['jumlah']) && isset($_POST['metode'])) {
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    if ($metode == "transfer") {
        $transaksi = new TransferBank($jumlah);
    } elseif ($metode == "ewallet") {
        $transaksi = new Ewallet($jumlah);
    } elseif ($metode == "qris") {
        $transaksi = new QRIS($jumlah);
    } elseif ($metode == "cod") {
        $transaksi = new COD($jumlah);
    } elseif ($metode == "va") {
        $transaksi = new VirtualAccount($jumlah);
    }

    if (isset($transaksi)) {
        echo $transaksi->prosesPembayaran();
        echo "<hr>";
        echo $transaksi->cetakStruk();
    }
}
?>