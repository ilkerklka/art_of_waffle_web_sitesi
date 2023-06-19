<?php


try {
    //code...

$baglan = new PDO("mysql:host=localhost;dbname=theartof_theartofwaffle;charset=UTF8", "theartof_kadir", "kadir123456789*");
} 
catch (PDOException $e) {
    
    echo $e->getMessage();
}


if (isset($_SESSION['giris'])) {
    // echo $_SESSION['giris'] ."<br>";
    
    $kullanicininbilgiler = $baglan->prepare("SELECT * FROM kullanicilar WHERE mail = ? LIMIT 1"); 
    $kullanicininbilgiler->execute([$_SESSION['giris']]);
    $kullanicininbilgilersayisi = $kullanicininbilgiler->rowCount();
    $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
    
    if ($kullanicininbilgilersayisi > 0) {
        $kullaniciadi = $kullanici['ad'];
        $kullanicisoyadi = $kullanici['soyad'];
        $kullanicimail = $kullanici['mail'];
        $kullanicisifre = $kullanici['sifre'];
        $kullaniciid = $kullanici['id'];        
    }

  

}


if (isset($_SESSION['admin'])) {
    $adminbilgiler = $baglan->prepare("SELECT * from admin where adminuser = ? LIMIT 1");
    $adminbilgiler->execute([$_SESSION['admin']]);
    $adminbilgilersayisi = $adminbilgiler->rowCount();
    $admin = $adminbilgiler->fetch(PDO::FETCH_ASSOC);

    if ($adminbilgilersayisi > 0) {
        $adminid = $admin['id'];
        $adminisim = $admin['adminuser'];
        $adminsifre = $admin['sifre'];
        $adminlevel = $admin['seviye'];
    }
}



$urungosterme = $baglan->prepare("SELECT * from sosyalmedya ");
$urungosterme->execute();
while ($urun = $urungosterme->fetch(PDO::FETCH_ASSOC)){
    $detayid = $urun['id'];
}

$urungosterme = $baglan->prepare("SELECT * from metinler ");
$urungosterme->execute();
while ($urun = $urungosterme->fetch(PDO::FETCH_ASSOC)){
    $metinid = $urun['id'];
}



?>