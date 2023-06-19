<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("adminpanel/connect.php");
$id = $_GET['id'];
$urunkategori = $baglan->prepare("SELECT  *  From kategoriler where id='{$id}'");
$urunkategori->execute();
$urun = $urunkategori->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">

    <title>The Art Of Waffle-<?php echo $urun['Kategoriler'] ?></title>
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

    <link rel="stylesheet" href="sayfalistee/sayfaliste.css">

</head>

<body>
    <?php include('navbar.php');
    if (isset($_SESSION['giris'])) {
    ?>

        <div class="cards">

            <?php $urungosterme = $baglan->prepare("SELECT * from urunler where urunkategori= '{$id} '");
            $urungosterme->execute();
            while ($urun = $urungosterme->fetch(PDO::FETCH_ASSOC)) {
                $sepettt = $urun["id"];
            ?>
                <div style="text-align: left;" class="modal fade " id="exampleModal-<?php echo $urun["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $urun["urun"] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="">
                                    <h5>Çİkolatalar <small style="color: red;">(maksimum 3 seçenek)</small> </h5>

                                    <input name="urunid" value="<?php echo $urun["id"] ?>" type="hidden">
                                    <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciid ?>">
                                    <input type="hidden" name="<?php echo $sepettt ?>">
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Sütlü Çikolata/Nutella" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Sütlü Çikolata/Nutella
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Beyaz Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Beyaz Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value=" Bitter Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Bitter Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Karamelli Çikolata" onclick="limitCheckboxes()" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Karamelli Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Frambuazlı Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Frambuazlı Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Damla Sakızlı Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Damla Sakızlı Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Muzlu Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Muzlu Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Fındıklı Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Fındıklı Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Antep Fıstıklı Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Antep Fıstıklı Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Portakallı Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Portakallı Çikolata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="cikolata[]" type="checkbox" value="Pudra Çikolata" onclick="limitCheckboxes()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Pudra Çikolata
                                        </label>
                                    </div>

                                    <hr>
                                    <h5>Meyveler <small style="color: red;">(maksimum 3 seçenek)</small></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" name="meyve[]" type="checkbox" value="Muz" onclick="limitCheckboxes2()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Muz
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="meyve[]" type="checkbox" value=" Çilek" onclick="limitCheckboxes2()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Çilek
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="meyve[]" type="checkbox" value="Kivi" onclick="limitCheckboxes2()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kivi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="meyve[]" type="checkbox" value="Ananas" onclick="limitCheckboxes2()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Ananas
                                        </label>
                                    </div>
                                    <hr>
                                    <h5>Şekerlemeler <small style="color: red;">(maksimum 3 seçenek)</small></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Kestane Kırığı" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kestane Kırığı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Tuttu Frutti" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Tuttu Frutti
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Deli Portakal" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Deli Portakal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Ye Yeşil İncir" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Ye Yeşil İncir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Vişne Bahçesi" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Vişne Bahçesi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Frambuazlı Saklı Bahçe" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Frambuazlı Saklı Bahçe
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Bitmeyen Geceler" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Bitmeyen Geceler
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Kiraz Şekeri Sarı" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kiraz Şekeri Sarı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value="Kiraz Şekeri Kırmızı" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kiraz Şekeri Kırmızı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="sekerlemeler[]" type="checkbox" value=" Kiraz Şekeri Yeşil" onclick="limitCheckboxes3()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Kiraz Şekeri Yeşil
                                        </label>
                                    </div>
                                    <hr>
                                    <h5>Süslemeler <small style="color: red;">(maksimum 4 seçenek)</small></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Sütlü Damla" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Sütlü Damla
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Bitter Damla" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Bitter Damla

                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value=" Beyaz Damla" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Beyaz Damla
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Frambuaz Damla" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Frambuaz Damla
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Çakıl Taşı" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Çakıl Taşı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value=" Cicibebe" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Cicibebe
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value=" Bonibon Jelibon" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Bonibon Jelibon
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Pirinç Patlak" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Pirinç Patlak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Pasta Şekeri" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Pasta Şekeri
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Rende Sütlü" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Rende Sütlü
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Rende Beyaz" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Rende Beyaz
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="suslemeler[]" type="checkbox" value="Rende Bitter" onclick="limitCheckboxes4()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Rende Bitter
                                        </label>
                                    </div>
                                    <hr>
                                    <h5>Kuru Yemişler <small style="color: red;">(maksimum 3 seçenek)</small></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" name="yemis[]" type="checkbox" value="Fındık" onclick="limitCheckboxes5()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Fındık
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="yemis[]" type="checkbox" value="Antep Fıstığı" onclick="limitCheckboxes5()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Antep Fıstığı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="yemis[]" type="checkbox" value=" Badem" onclick="limitCheckboxes5()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Badem
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="yemis[]" type="checkbox" value="Yer Fıstığı" onclick="limitCheckboxes5()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Yer Fıstığı
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="yemis[]" type="checkbox" value="Hindistan Cevizi" onclick="limitCheckboxes5()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Hindistan Cevizi
                                        </label>
                                    </div>
                                    <hr>
                                    <h5>Üstüne Soslar <small style="color: red;">(maksimum 2 seçenek)</small></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" name="soslar[]" type="checkbox" value="Sütlü" onclick="limitCheckboxes6()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Sütlü
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="soslar[]" type="checkbox" value="Beyaz" onclick="limitCheckboxes6()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Beyaz
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="soslar[]" type="checkbox" value="Frambuaz" onclick="limitCheckboxes6()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Frambuaz
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="soslar[]" type="checkbox" value="Muzlu  " onclick="limitCheckboxes6()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Muzlu </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="soslar[]" type="checkbox" value="Karamel" onclick="limitCheckboxes6()" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Karamel

                                        </label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                                <button type="submit" class="btn btn-success">Ekle</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>



                <?php

                if (isset($_POST["$sepettt"])) {
                    $kullid = @$_POST["kullaniciid"];
                    $urunid  = @$_POST["urunid"];
                    $cikolatalar = implode($_POST["cikolata"], ",");
                    $meyveler = implode($_POST["meyve"], ",");
                    $sekerlemeler = implode($_POST["sekerlemeler"], ",");
                    $suslemeler = implode($_POST["suslemeler"], ",");
                    $yemis = implode($_POST["yemis"], ",");
                    $soslar = implode($_POST["soslar"], ",");

                    $sepet = $baglan->prepare("INSERT INTO sepet set
        kullaniciid       =:kid,
        urunid       =:urunlerid,
        cikolatalar  =:cikolatalar,
        meyveler	 =:meyveler,
        sekerlemeler   =:sekerlemeler,
        suslemeler    =:suslemeler,
        yemisler     =:yemisler,
        soslar       =:soslar

         ");
                    $insert = $sepet->execute(array(

                        "kid"          => $kullid,
                        "urunlerid"          => $urunid,
                        "cikolatalar"              => $cikolatalar,
                        "meyveler"             => $meyveler,
                        "sekerlemeler"              => $sekerlemeler,
                        "suslemeler"          => $suslemeler,
                        "yemisler"          => $yemis,
                        "soslar"              => $soslar



                    ));


                    if ($insert) {
                        header("Location:sayfaliste.php?id=1");
                        echo '<meta http-equiv="refresh" content="0;URL=sayfaliste.php?id=1">';
                    }
                }


                ?>





                <div class="card">
                    <div class="card__image-holder">
                        <img class="card__image" src="<?php echo $urun['urunfoto'] ?>" />
                    </div>
                    <div class="card-title">
                        <?php
                        if ($urun["urunwaffle"] == 1) {  ?>
                            <a href="#" class="toggle-info btn  " data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $urun["id"] ?>">
                                <i style="margin-top: 7px;" class="fa-solid fa-plus"></i>
                            </a>




                        <?php
                        } else {
                        ?>
                            <a product-id=<?php echo $urun['id'] ?> href="#" class="toggle-info btn   addToCartBtn">
                                <i style="margin-top: 7px;" class="fa-solid fa-plus"></i>
                            </a>

                        <?php
                        }
                        ?>

                        <h2>
                            <?php echo $urun['urun'] ?>
                            <small><?php echo $urun['urunfiyat'] ?> &#8378</small>
                        </h2>
                    </div>

                </div>
            <?php } ?>

        </div>



    <?php } else { ?>


        <div class="cards">

            <?php $urungosterme = $baglan->prepare("SELECT * from urunler where urunkategori= '{$id} '");
            $urungosterme->execute();
            while ($urun = $urungosterme->fetch(PDO::FETCH_ASSOC)) {
                # code...

            ?>
                <div class="card">
                    <div class="card__image-holder">
                        <img class="card__image" src="<?php echo $urun['urunfoto'] ?>" />
                    </div>
                    <div class="card-title">
                        <a href="giris.php" class="toggle-info btn   ">
                            <i style="margin-top: 7px;" class="fa-solid fa-plus"></i>
                        </a>
                        <h2>
                            <?php echo $urun['urun'] ?>
                            <small><?php echo $urun['urunfiyat'] ?> &#8378</small>
                        </h2>
                    </div>

                </div>
            <?php } ?>

        </div>
    <?php
    }


    include('footer.php') ?>

    <script src="secenek.js"></script>
    <img class="up" src="scrollup.png" alt="">
    <script src="sepet.js"></script>
    <script src="sayfalistee/sayfalist.js"></script>
    <script src="custom.js"></script>
</body>

</html>