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

        include("navbar.php"); ?>

        <a style="margin-top: 30px ; color: black;" href="anasayfa.php"> <i class="fa-solid fa-backward"></i> Geri Dön</a>


        <hr>

        <h1> İptal edilicek sipariş</h1>
        <?php
        $id = $_GET["kullaniciid"];

        ?>

        <div class="col-md-8" style="display: block; margin: auto;">
            <?php if (isset($_POST["iptal"])) {
                $idii =  $_GET["kullaniciid"];
                $siparis = $_POST["sebep"];
                $MailSorgusu = $baglan->prepare("select * from siparisonay");
                $MailSorgusu->execute();
                $save = $baglan->prepare("UPDATE siparisonay set 
iptal =:siparis
 where
kullaniciid =:id


");

                //  if ($save) {
                //      echo 'bu kısım sorunsuz';
                // }

                $insert =  $save->execute(array(
                    "id" => $idii,
                    "siparis" => $siparis

                ));

                if ($insert) {
                    echo '<div class=" alert alert-success text-center"> Sipariş iptal sebebi kullanıcıya gönderildi. siparişi silmek için siparişler sayfasına yönlnediriliyorusunuz... (tavsiyemiz 5 dakika sonra silme işlemini gerçekleştirmeniz)  </div>';
                    echo '<meta http-equiv="refresh" content="2;URL=aktifsipar.php">';
                }
            } ?>
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





                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            $idi = $_GET["kullaniciid"];
            $urunkategorisecme9 = $baglan->prepare("SELECT  * from adresler where kullaniciid = '$idi'  ");
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
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="exampleInputText2" class="form-label"> İptal Sebepi</label>
                                <select type="text" name="sebep" class="form-control" id="soyisim" required>
                                    <?php
                                    $urunkategorisecme = $baglan->prepare("SELECT * from iptalsebepleri order by id asc");
                                    $urunkategorisecme->execute();
                                    while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                        <option value="<?php echo $urun['id'] ?>"><?php echo $urun['sebep'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <input type="hidden" name="iptal">
                            <button style="border: black 1px solid;" type="submit" class="btn ">İptal Et</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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