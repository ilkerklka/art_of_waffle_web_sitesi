<?php


try {
    include("connect.php");
    $bir = 1;
    $sifir = 0;
    // Veritabanındaki son siparişin zaman bilgisini al
    $stmt = $baglan->prepare("SELECT zaman FROM siparisonay ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $zaman = $stmt->fetchColumn();
    date_default_timezone_set('Europe/Istanbul');
    $baslangicTarihi = time();
    $bitistarihi     = strtotime($zaman);
    $sonuc =  $baslangicTarihi - strtotime($zaman);

    // Eğer son sipariş 5 dakikadan önce yapılmışsa yeni veri yoktur
    if ($sonuc > 8) {
        echo
        $sifir;
    } else {
        echo  $bir;
    }
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
