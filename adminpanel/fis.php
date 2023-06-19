<?php
include("connect.php");
$id = $_GET["kullaniciid"];
// Fiş çıktısı tasarımı
echo "<style>
        .fiş { 
            border: 1px solid #ddd; 
            padding: 10px; 
            margin-bottom: 10px; 
        }
      </style>";

echo "<div style='text-align:center;' class='fiş'>";
echo "<h3>Art Of Waffle</h3>";


$urunkategorisecme9 = $baglan->prepare("SELECT  * from adresler where kullaniciid = '$id'  ");
$urunkategorisecme9->execute();
$adres = $urunkategorisecme9->fetch(PDO::FETCH_ASSOC);

?>

<b>Adres : </b> <?php echo $adres["isim"] . " " . $adres["soyisim"] ?><br>
<b>İlce/Mahalle : </b> <?php echo $adres["ilce"] . "/" . $adres["mahalle"] ?><br>
<b> Detay : </b> <?php echo $adres["detay"] ?><br>
<b> Telefon : </b> <?php echo $adres["telefon"] ?>
<hr>


<?php

$urunkategorisecme4 = $baglan->prepare("SELECT  * from siparisonay where kullaniciid = '$id'  ");
$urunkategorisecme4->execute();
while ($row = $urunkategorisecme4->fetch(PDO::FETCH_ASSOC)) {

    $id = $row['urunid'];
    $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$id}' ");
    $urunbilgi->execute();
    if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
        $urunid  = $urun['id'];
        $urunadi = $urun['urun'];
        $waffle  = $urun["urunwaffle"];
        $urunfoto = $urun['urunfoto'];
        $urunfiyat = $urun['urunfiyat'];
    }

    echo "<p> <b>Ürün Adı : </b>" . $urunadi;
    echo " <br><b>Ürün Adeti : </b> " . $row['urunadet'];
    echo "<br><b>Ürün Fiyatı : </b>" . $row['toplamfiyat'] . "₺" . "</p>";
    if ($waffle == 1) { ?>


        <h4>Seçtiğiniz Seçenekler</h4>
        <p>
         <b> çikolatalar : </b>
        <?php echo $row["cikolatalar"] ?></p>
        <p>
        <b>Meyveler : </b> 
        <?php echo  $row["meyveler"] ?></p>
        <p>
        <b> Şekerlemeler : </b></h4>
        <?php echo  $row["sekerlemeler"] ?></p>
        <p>
        <b>Süslemeler : </b>
        <?php echo $row["suslemeler"] ?></p>
        <p>
        <b>Kuru Yemişler : </b>
        <?php echo  $row["yemisler"] ?></p>
        <p>
        <b>Soslar : </b>
        <?php echo $row["soslar"] ?></p>




<?php
    }
    echo "<hr>";
}
?>

<?php



echo "</div>";

?>




