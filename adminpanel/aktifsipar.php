<?php
session_start();
include("connect.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">
    <title>The Art Of Waffle - Yönetim Paneli </title>
    <meta name="robots" content="index,follow" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5f120640c7.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- ICONFINDER -->
    <link rel="shortcut icon" href="favico.ico">

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    <script type="text/javascript">
        var audio = new Audio('Girtab.mp3'); // ses dosyasının URL'si burada belirtilir

        //   setTimeout(function() {
        //     audio.play(); // sayfa yüklendiğinde ses dosyası otomatik olarak oynatılır
        //   }, 1000);

        setInterval(function() {
            // Veritabanını kontrol etmek için Ajax isteği gönder
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'veritabani_kontrol.php');
            xhr.setRequestHeader('Content-Type', 'text/plain');
            console.log(xhr.responseText);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Veritabanında yeni veri varsa, sayfayı yenile
                    if (xhr.responseText === '1') {
                        audio.play();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }

                }
            };
            xhr.send();
        }, 5000); // 5 saniyede bir kontrol yap
    </script>



</head>

<body>
    <?php

    if (isset($_SESSION["admin"])) {


        $urunkategorisecme4 = $baglan->prepare("SELECT  * from siparisonay   ");
        $urunkategorisecme4->execute();
        while ($rcw = $urunkategorisecme4->fetch(PDO::FETCH_ASSOC)) {

            $id = $rcw['urunid'];
            $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$id}' ");
            $urunbilgi->execute();
            if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                $urunid  = $urun['id'];
                $urunadi = $urun['urun'];
                $waffle  = $urun["urunwaffle"];
                $urunfoto = $urun['urunfoto'];
                $urunfiyat = $urun['urunfiyat'];
            }

    ?>




            <div class="modal fade" id="exampleModal<?php echo $rcw["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $urunadi ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Seçtiğiniz Seçenekler</h4>
                            <h5>çikolatalar</h5>
                            <p><?php echo $rcw["cikolatalar"] ?></p> <br>
                            <h4>Meyveler</h4>
                            <p><?php echo  $rcw["meyveler"] ?></p> <br>
                            <h4>Şekerlemeler</h4>
                            <p><?php echo  $rcw["sekerlemeler"] ?></p> <br>
                            <h4>Süslemeler</h4>
                            <p><?php echo $rcw["suslemeler"] ?></p> <br>
                            <h4>Kuru Yemişler</h4>
                            <p><?php echo  $rcw["yemisler"] ?></p> <br>
                            <h4>Soslar</h4>
                            <p><?php echo $rcw["soslar"] ?></p><br>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>

                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>


        <?php

        include("navbar.php"); ?>

        <a style="margin-top: 30px ; color: black;" href="anasayfa.php"> <i class="fa-solid fa-backward"></i> Geri Dön</a>


        <hr>

        <?php $urunkategorisecme = $baglan->prepare("SELECT DISTINCT kullaniciid from siparisonay ");
        $urunkategorisecme->execute();
        while ($row = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {


            $id = $row["kullaniciid"];
            $urunkategorisecme2 = $baglan->prepare("SELECT  * from siparisonay where kullaniciid = '$id'  ");
            $urunkategorisecme2->execute();
            $raw = $urunkategorisecme2->fetch(PDO::FETCH_ASSOC);




            $id = $row["kullaniciid"];
            $urunkategorisecme3 = $baglan->prepare("SELECT  * from kullanicilar where id = '$id'  ");
            $urunkategorisecme3->execute();
            $rew = $urunkategorisecme3->fetch(PDO::FETCH_ASSOC);


        ?>
            <div style="margin: 10px;" class="card">
                <div class="card-header">
                    Kullanıcı : <?php echo $rew["ad"] . " " . $rew["soyad"] ?>

                </div>
                <div class="card-body">

                    <div class="col-md-8" style="display: block; margin: auto;">
                        <table class="table  table-hover table-bordered table-striped">
                            <thead>
                                <th class="text-center"> <strong> Ürün Resmi </strong></th>
                                <th class="text-center"> <strong> Ürünü Adı </strong></th>
                                <th class="text-center"> <strong> Fiyatı </strong></th>
                                <th class="text-center"> <strong> Adet </strong></th>
                                <th class="text-center"> <strong> seçenekler </strong></th>
                            </thead>
                            <tbody>
                                <?php

                                $id = $row["kullaniciid"];
                                $urunkategorisecme4 = $baglan->prepare("SELECT  * from siparisonay where kullaniciid = '$id'  ");
                                $urunkategorisecme4->execute();
                                while ($rww = $urunkategorisecme4->fetch(PDO::FETCH_ASSOC)) {

                                    $id = $rww['urunid'];
                                    $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$id}' ");
                                    $urunbilgi->execute();
                                    if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                                        $urunid  = $urun['id'];
                                        $urunadi = $urun['urun'];
                                        $waffle  = $urun["urunwaffle"];
                                        $urunfoto = $urun['urunfoto'];
                                        $urunfiyat = $urun['urunfiyat'];
                                    }


                                ?>

                                    <tr>
                                        <td class="text-center" width="150">
                                            <img src="../<?php echo $urunfoto ?>" width="50" alt="">
                                        </td>
                                        <td class="text-center">
                                            <?php echo $urunadi ?> </td>
                                        <td class="text-center">
                                            <?php echo $rww["toplamfiyat"] ?>₺
                                        </td>
                                        <td class="text-center">
                                            <a href="" style="color: #db0000;"><?php echo $rww["urunadet"] ?></a>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($waffle == 1) { ?>
                                                <a class="silmeislemi" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $rww["id"] ?>" style="color: #db0000;" href=""> göster</a>




                                            <?php
                                            } else { ?>


                                            <?php
                                            }
                                            ?>


                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>

                                <?php


                                $id = $row["kullaniciid"];
                                $urunkategorisecme9 = $baglan->prepare("SELECT  * from adresler where kullaniciid = '$id'  ");
                                $urunkategorisecme9->execute();
                                $adres = $urunkategorisecme9->fetch(PDO::FETCH_ASSOC);

                                ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                                            <b>Adres : </b> <?php echo $adres["isim"] . " " . $adres["soyisim"] ?><br>
                                            <b>İlce/Mahalle : </b> <?php echo $adres["ilce"] . "/" . $adres["mahalle"] ?><br>
                                            <b> Detay : </b> <?php echo $adres["detay"] ?><br>
                                            <b> Telefon : </b> <?php echo $adres["telefon"] ?>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">

                                            <?php  ?>
                                        </div>
                                    </div>
                                </div>
                            </tfoot>
                        </table>
                    </div>
                    <?php

                    if ($adminlevel == 1) {  ?>
                        <a href="fis.php?kullaniciid=<?php echo $raw["kullaniciid"] ?>" target="_blank" style="background-color: #0c1e35;" class="btn btn-primary">Yazdır</a>
                        <?php
                        if ($raw["iptal"] == 0) { ?>
                            <a href="siparisiptali.php?kullaniciid=<?php echo $raw["kullaniciid"] ?>" style="background-color: #0c1e35;" class="btn btn-primary"> siparisi iptal et</a>
                        <?php
                        } else { ?>
                            <a href="#" style="background-color: #0c1e35;" class="btn btn-primary"> siparis iptal edildi</a>
                        <?php
                        }
                        ?>
                    <?php    } ?>



                    <?php
                    if ($raw["siparisdurumu"] == 0) { ?>
                        <a href="islemler/yolacikar.php?kullaniciid=<?php echo $raw["kullaniciid"] ?>" style="background-color: #0c1e35; float: right;" class="btn btn-primary">Yola Çıkar</a>
                    <?php
                    } elseif ($raw["siparisdurumu"] == 1) { ?>
                        <a href="islemler/teslimet.php?kullaniciid=<?php echo $raw["kullaniciid"] ?>" style="background-color: #0c1e35; float: right;" class="btn btn-primary">Teslim Et</a>
                    <?php  } elseif ($raw["siparisdurumu"] == 2) { ?>
                        <a href="islemler/siparissil.php?kullaniciid=<?php echo $raw["kullaniciid"] ?>" style="background-color: #0c1e35; float: right;" class="btn btn-primary">Siparişi Sil</a>
                    <?php
                    }
                    ?>






                </div>
            </div>
            <hr>
        <?php } ?>

        <footer class="footer">
            <small style="margin-bottom: 20px; display: inline-block">
                © 2023 made with
                <span style="color: red; font-size: 18px">&#10084;</span> by -
                <a target="_blank" href="https://ilkerkyilmaz.com"> İlker Kücükyılmaz</a>
            </small>
            <br />
            <div class="social-links">
                <a href="https://github.com/ilkerklka" target="_blank">
                    <i class="ri-github-fill ri-xl"></i>
                </a>
                <a href="https://www.linkedin.com/in/ilker-k%C3%BCc%C3%BCky%C4%B1lmaz-23923622b/" target="_blank">
                    <i class="ri-linkedin-box-fill ri-xl"></i>
                </a>
            </div>
        </footer>
        </main>

        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="navbar.js"></script>
    <?php } else { ?>
        <h1 class="text-center ">LÜTFEN GİRİŞ YAPINIZ</h1>
    <?php } ?>
</body>

</html>