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


  


</head>

<body>
    <?php
    if (isset($_SESSION["admin"])) {
        # code...


        include("navbar.php");

        $kullanicininbilgiler = $baglan->prepare("SELECT * FROM restoranaktiflik ");
        $kullanicininbilgiler->execute();

        $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
        $magza = $kullanici['aktiflik'];
        if ($magza  == 1) {
    ?>

            <div class="card">
                <div class="card-header">
                    Siparişler
                    <span style="float: right;" class="menu-suffix">
                        <span class="badge secondary">Aktif</span>
                    </span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Aktif Siparişler</h5>
                    <p class="card-text">Takip etmek için tıklayınız.</p>
                    <a href="aktifsipar.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                    <?php

                    if ($adminlevel == 1) {


                    ?>
                        <a href="islemler/magzakapat.php" style="background-color: #0c1e35; float: right;" class="btn btn-primary">Magza kapat</a>
                    <?php }  ?>



                </div>
            </div>
            <?php } else {
            if ($adminlevel == 1) {
            ?>
                <div style="padding-top: 25px; padding-bottom: 25px; font-size: 20px;" class="alert-danger text-center">
                    Mağzanız Şuan Kapalıdır Lütfen Öncesinde Açınız . Açmak İçin <a href="islemler/magzaac.php">Tıklayınız</a>
                </div>
            <?php } else { ?>

                <div style="padding-top: 25px; padding-bottom: 25px; font-size: 20px;" class="alert-danger text-center">
                    Mağzanız Şuan Kapalıdır Lütfen Öncesinde Açınız .
                </div>
        <?php
            }
        } ?>


        <?php


        if ($adminlevel == 1) {
            # code...
        ?>
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Ürünler</h5>
                            <p class="card-text">Ürün ayarları için tıklayınız.</p>
                            <a href="urunler.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Kategoriler</h5>
                            <p class="card-text">Kategori ayarları için tıklayınız.</p>
                            <a href="kategoriler.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Adminler</h5>
                            <p class="card-text">Yönetim paneli yetkilerini düzenleyin.</p>
                            <a href="adminler.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Sayfa Metinleri</h5>
                            <p class="card-text">Sayfa metinilerini düzenlemek için tıklayınız</p>
                            <a href="sayfametin.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Açılış Pop-up'ı</h5>
                            <p class="card-text">Açılış popup ayarları için tıklayınız </p>
                            <a href="popup.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Sosyal Medya</h5>
                            <p class="card-text">Sosyal medya linkleri düzenlemek için tıklayınız. </p>
                            <a href="sosyalmedya.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Adres Ayarları</h5>
                            <p class="card-text">Adreslerin minimum üzretlerini ayarlamak için tıklayınız.</p>
                            <a href="adresler.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">İptal Sebepleri</h5>
                            <p class="card-text">Ürünlerin iptal sebeplerini belirlemek için tıklayınız.</p>
                            <a href="iptal.php" style="background-color: #0c1e35;" class="btn btn-primary">Git</a>
                        </div>
                    </div>
                </div>
            </div>

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