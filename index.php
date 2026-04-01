<?php
require_once "TransferBank.php";
require_once "Ewallet.php";
require_once "QRIS.php";

$transfer = new TransferBank(100000);
$ewallet = new Ewallet(50000);
$qris = new QRIS(75000);

echo $transfer->prosesPembayaran();
echo "<br>";
echo $transfer->cetakStruk();

echo "<br><br>";

echo $ewallet->prosesPembayaran();
echo "<br>";
echo $ewallet->cetakStruk();

echo "<br><br>";

echo $qris->prosesPembayaran();
echo "<br>";
echo $qris->cetakStruk();
?>