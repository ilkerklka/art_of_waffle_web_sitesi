<!DOCTYPE html>
<html lang="tr">
<?php
session_start();
include("adminpanel/connect.php");

?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">

    <title>The Art Of Waffle-Sepet</title>
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



</head>

<body>
    <?php

    if (isset($_SESSION["shoppingCart"])) {
        $shoppingCart = $_SESSION["shoppingCart"];
        $total_count = $shoppingCart["summary"]["total_count"];
        $total_price = $shoppingCart["summary"]["total_price"];
        $shopping_products = $shoppingCart["products"];
    } else {
        $total_count = 0;
        $total_price = 0.0;
    }

    ?>
    <?php


    if (isset($_SESSION['giris'])) {










        $kullanicininbilgiler = $baglan->prepare("SELECT * FROM restoranaktiflik ");
        $kullanicininbilgiler->execute();

        $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
        $magza = $kullanici['aktiflik'];
        if ($magza  == 1) {

    ?>
            <div class="container">
                <?php
                if ($total_count > -9) {
                ?>



                    <form action="" method="post">
                        <hr>
                        <div style="margin: 20px;" class="">
                            <div style="display: block; margin: auto;" class="col-md-7 col-md-offset-1">
                                <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <th class="text-center">Ürün Resmi</th>
                                        <th class="text-center">Ürün Adı</th>
                                        <th class="text-center">Ürün Fiyatı</th>
                                        <th class="text-center">Ürün Adeti</th>
                                        <th class="text-center">Ürün Toplamı</th>

                                    </thead>
                                    <tbody>
                                        <?php foreach ($shopping_products as $product) { ?>

                                            <tr>
                                                <td class="text-center" width="120">
                                                    <img src="<?php echo $product->urunfoto; ?>" width="50" alt="">
                                                </td>
                                                <td class="text-center"><?php echo $product->urun; ?></td>
                                                <td class="text-center"><strong><?php echo $product->urunfiyat; ?> &#8378 </strong></td>

                                                <td class="text-center">

                                                    <input type="text" disabled class="item-count-input" value="<?php echo $product->count; ?>">


                                                </td>
                                                <td class="text-center"><?php echo $product->total_price; ?> &#8378 </td>

                                            </tr>

                                        <?php } ?>
                                        <?php

                                        $urunkategorisecme = $baglan->prepare("SELECT * from sepet where kullaniciid = '{$kullaniciid}'");
                                        $urunkategorisecme->execute();

                                        $tutar = 0;
                                        while ($row = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {

                                            $sepeturunid = $row['urunid'];


                                            $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$sepeturunid}' ");
                                            $urunbilgi->execute();
                                            if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                                                $urunid  = $urun['id'];
                                                $urunadi = $urun['urun'];

                                                $urunfoto = $urun['urunfoto'];
                                                $urunfiyat = $urun['urunfiyat'];
                                            }
                                            $tutar = $tutar + $urunfiyat;

                                            $urunkategorisecme2 = $baglan->query("SELECT count(*) from sepet ");
                                            $toplamurun = $urunkategorisecme2->fetchColumn();

                                        ?>

                                            <tr>
                                                <td class="text-center" width="120">
                                                    <img src="<?php echo $urun["urunfoto"]; ?>" width="50" alt="">
                                                </td>
                                                <td class="text-center"><?php echo $urun["urun"]; ?></td>
                                                <td class="text-center"><strong><?php echo $urun["urunfiyat"]; ?>&#8378 </strong></td>
                                                <td class="text-center">
                                                    Waffle alıyorsanız lütfen menüyü kullanınız

                                                </td>
                                                <td class="text-center"><?php echo $urun["urunfiyat"]; ?> &#8378 </td>

                                            </tr>
                                        <?php }


                                        $toplam = $tutar + $total_price;
                                        $toplanurun = $total_count + $toplamurun;


                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <th colspan="2" class="text-center">
                                            Toplam Ürün : <span class="color-danger"><?php echo $toplanurun; ?> adet</span>
                                        </th>
                                        <th colspan="2" class="text-center">
                                            <?php
                                            if ($tutar == 0) { ?>
                                                Toplam Tutar : <span class="color-danger"> <?php echo $total_price ?> &#8378 </span>
                                            <?php  } elseif ($tutar > 0) { ?>
                                                Toplam Tutar : <span class="color-danger"> <?php echo $toplam ?> &#8378 </span>
                                            <?php   } ?>


                                        </th>
                                        <th colspan="2" class="text-center">
                                            <?php

                                            $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adresler where kullaniciid = '$kullaniciid' ");
                                            $kullanicininbilgiler->execute();

                                            $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
                                            $adress = $kullanici['mahalle'];

                                            $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adres_ayar where mahalle = '$adress' ");
                                            $kullanicininbilgiler->execute();

                                            $kullaniciayar = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
                                            $kalanturar = $kullaniciayar["minucret"] - $toplam;

                                            ?>

                                        </th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr>
                        <h3>Ödeme Yöntemini Seçiniz</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Nakit" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Nakit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Kapıda Kredi Kartı" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Kapıda Kredi Kartı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Multinet" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Multinet
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Sodexo" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Sodexo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Ticket" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Ticket
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="Setcard" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            SetCard
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Yontem" value="MetropolCard" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            MetropolCard
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                                    <br>
                                    <h3>Adresiniz</h3>
                                    <?php
                                    $urungosterme = $baglan->prepare("SELECT * from adresler where kullaniciid = '{$kullaniciid} '");
                                    $urungosterme->execute();
                                    $row = $urungosterme->fetch(PDO::FETCH_ASSOC)
                                    ?>
                                    <?php echo "<b>İsim</b> "  . $row["isim"] . "<br> 
                        " . "<b>Soyisim</b>" . $row["soyisim"] . "<br> "
                                        . "<b>İlce/Mahalle</b>" . $row["ilce"] . "/"  . $row["mahalle"]  . "<br>" . "<b>Detaylar</b> "  . $row["detay"] . "<br> "
                                        . "<b>Telefon</b> " . $row["telefon"] . "<br>" ?> <br>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="adres" value="<?php echo  $row["isim"] . " " . $row["soyisim"] . " " . $row["ilce"] . " "  . $row["mahalle"]  . " "  . $row["detay"] . " "  . $row["telefon"] ?> ">
                        <button name="ekle" style="background-color: #0c1e35;" class="btn btn-primary" type="submit">Ekle</button>
                    </form>

                <?php

                } else { ?>

                    <div class="alert alert-info">
                        <strong>Sepetinizde herhangi bir ürün bulunmamaktadır</strong>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php } else {

        ?>


            <div class=" mt-3 text-center alert alert-danger">Mağzamız Şuan hizmet vermemektedir...</div>


        <?php
        }
        $onay = $_SESSION["shoppingCart"];

        if (isset($_POST["ekle"])) {
            # code...


            $onay = $_SESSION["shoppingCart"];

            foreach ($shopping_products as $urun) {
                $kllaniciid = $kullaniciid;
                $urun_id = $urun->id;
                $siparisdurum2 = 0;
                $urun_toplam =  $urun->count;
                $urun_fiyat =   $urun->total_price;
                $adres  = @$_POST["adres"];
                $yontem = @$_POST["Yontem"];

                $urunekle = $baglan->prepare("INSERT INTO siparisonay set
                kullaniciid       =:kid,
                urunid            =:urunid,
                urunadet          =:urunadet,
                toplamfiyat       =:tfiyat,
                adresid           =:adres,
                odeme_yontemi	  =:odeme,
                siparisdurumu     =:sip 

                 ");
                $insert = $urunekle->execute(array(

                    "kid"          => $kllaniciid,
                    "urunid"       => $urun_id,
                    "tfiyat"       => $urun_fiyat,
                    "urunadet"     => $urun_toplam,
                    "adres"        => $adres,
                    "odeme"        => $yontem,
                    "sip"          => $siparisdurum2
                ));
                if ($insert) {
                    echo '<meta http-equiv="refresh" content="0;URL=siparislerim.php">';
                    unset($_SESSION["shoppingCart"]);

                }
            }

            $urunkategorisecme = $baglan->prepare("SELECT * from sepet where kullaniciid = '{$kullaniciid}'");
            $urunkategorisecme->execute();
            while ($row = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {

                $sepeturunid = $row['urunid'];
                $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$sepeturunid}' ");
                $urunbilgi->execute();
                if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                    $urunid  = $urun['id'];
                    $urunadi = $urun['urun'];
                    $urunfoto = $urun['urunfoto'];
                    $urunfiyat = $urun['urunfiyat'];
                }

                $kallaniciid = $kullaniciid;
                $urunad = $urunid;
                $urun_fiyat = $urunfiyat;
                $cikolata = $row["cikolatalar"];
                $meyve    = $row["meyveler"];
                $sekerlemeler = $row["sekerlemeler"];
                $suslemeler   = $row["suslemeler"];
                $yemisler     = $row["yemisler"];
                $adet      = 1;
                $siparisdurum = 0;
                $soslar       = $row["soslar"];
                $adres  = @$_POST["adres"];
                $yontem = @$_POST["Yontem"];

                $urunekle = $baglan->prepare("INSERT INTO siparisonay set
                kullaniciid       =:kid,
                urunid            =:urunid,
                urunadet          =:urunadet,
                cikolatalar       =:cikolatalar,
                meyveler	      =:meyveler,
                sekerlemeler      =:sekerlemeler,
                suslemeler        =:suslemeler,
                yemisler          =:yemisler,
                soslar            =:soslar,
                toplamfiyat       =:tfiyat,
                adresid           =:adres,
                odeme_yontemi	  =:odeme,
                siparisdurumu     =:sip1

                 ");
                $insert = $urunekle->execute(array(

                    "kid"          => $kllaniciid,
                    "urunid"       => $urunad,
                    "tfiyat"       => $urun_fiyat,
                    "urunadet"     => $adet,
                    "cikolatalar"  => $cikolata,
                    "meyveler"     => $meyve,
                    "sekerlemeler" => $sekerlemeler,
                    "suslemeler"   => $suslemeler,
                    "yemisler"     => $yemisler,
                    "soslar"       => $soslar,
                    "adres"        => $adres,
                    "odeme"        => $yontem,
                    "sip1"         => $siparisdurum
                ));
                if ($insert) {
                    
                    $urunsil = $baglan->prepare("DELETE from sepet where
                    kullaniciid       =:kid
                

                 ");
                    $ansert = $urunsil->execute(array(

                        "kid"          => $kllaniciid

                    ));
                }
            }
        }


        ?>


    <?php } else { ?>


        <h1 style="text-align: center;">Lütfen Giriş Yapınız</h1>


    <?php
    }



    ?>
    <img class="up" src="scrollup.png" alt="">
    <script src="sepet.js"></script>
    <script src="custom.js"></script>
</body>

</html>