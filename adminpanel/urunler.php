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



        <H3>Ürün Ekle</H3>
        <form action="" enctype="multipart/form-data" method="post">
            <?php

            if (isset($_POST["kateg"])) {
                if (isset($_FILES['urunfoto'])) {
                    $hata = $_FILES['urunfoto']['error']; //resim inputundan gönderilen hatayı aldık.
                    if ($hata != 0) { // hata kontrolü gerçekleştirdik.
                        echo '<div class=" alert alert-danger">Resim gönderilirken bir hata gerçekleşti. Sayfa yenileniyor...</div>';
                        echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                    } else  {
                        $resimBoyutu = $_FILES['urunfoto']['size']; // resim boyutunu öğrendik
                        if ($resimBoyutu > (1024 * 1024 * 4)) {
                            //buradaki işlem aslında bayt, kilobayt ve mb formülüdür.
                            //4 rakamını mb olarak görün ve kaç yaparsanız o mb anlamına gelir.
                            //Örn: (1024 * 1024 * 3) => 3MB / (1024 * 1024 * 2) => 2MB

                            echo '<div class=" alert alert-danger">Resim 4MB den büyük olamaz . Sayfa yenileniyor...</div>';
                            echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                        } else {
                            $tip = $_FILES['urunfoto']['type']; //resim tipini öğrendik.
                            $resimAdi = $_FILES['urunfoto']['name']; //resmin adını öğrendik.

                            $uzantisi = explode('.', $resimAdi); // uzantısını öğrenmek için . işaretinden parçaladık.
                            $uzantisi = $uzantisi[count($uzantisi) - 1]; // ve daha sonra 1 den fazla nokta olma ihtimaline karşı en son noktadan sonrasını al dedik.

                            $yeni_adi = "../urunfoto/" .$resimAdi; // resime yeni isim vereceğimiz için zamana göre yeni bir isim oluşturduk ve yüklemesi gerektiği yeride belirttik.
                            //yuklenecek_yer/resim_adi.uzantisi

                            if ($tip == 'image/jpeg' || $tip == 'image/png') { //uzantısnın kontrolünü sağladık. sadece .jpg ve .png yükleyebilmesi için.
                                if (move_uploaded_file($_FILES["urunfoto"]["tmp_name"], $yeni_adi)) {
                                    //tmp_name ile resmi bulduk ve $yeni_adi değişkeninin değerine göre yükleme işlemini gerçekleştirdik.
                                    echo '<div class=" alert alert-success">Resim başarıyla yüklendi. Sayfa yenileniyor...</div>';
                                    echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                                } else  echo '<div class=" alert alert-danger">Resim yüklenirken bir hata gerçekleşti. Sayfa yenileniyor...</div>';
                                echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                            } else {
                                echo '<div class=" alert alert-danger">Resim yalnızca PNG ve JPEG formatında olabilir.  Sayfa yenileniyor...</div>';
                                echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                            }
                        }
                    }
                }
                $urunadi        = @$_POST["kategori"];
                $waffle         = @$_POST["cinsiyet"];
                $kategori      = @$_POST["kategori1"];
                $urunfiyat  = @$_POST["fiyat"];
                $urunFoto1        = "urunfoto/" .@$_FILES["urunfoto"]["name"];
                $urunekle = $baglan->prepare("INSERT INTO urunler set
                urun       =:kategori,
                urunfoto       =:urunfoto,
                urunfiyat  =:fiya,
                urunkategori =:kateg,
                urunwaffle   =:waff
                 ");
                $insert = $urunekle->execute(array(

                    "kategori"          => $urunadi,
                    "urunfoto"          => $urunFoto1,
                    "fiya"              => $urunfiyat,
                    "kateg"             => $kategori,
                    "waff"              => $waffle


                ));
                if ($insert) {
                    echo '<div class="alert alert-success text-center">Ürün başarıyla Eklendi . Site yenileniyor...</div>';

                    echo '<meta http-equiv="refresh" content="2;URL=urunler.php">';
                    
                } else {
                    
                }
            }
            ?>





            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ürün Adı :</label>
                <input type="text" name="kategori" class="form-control" id="Sifre" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ürün Fiyat :</label>


                <input type="text" name="fiyat" class="form-control" id="Sifre" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ürün Fotoğrafı :</label>
                <input type="file" name="urunfoto" class="form-control" id="Sifre" >

            </div>
            <div class="mb-3">
                <label for="exampleInputText2" class="form-label"> Kategori</label>
                <select type="text" name="kategori1" class="form-control" id="soyisim" required>
                    <?php
                    $urunkategorisecme = $baglan->prepare("SELECT * from kategoriler order by id asc");
                    $urunkategorisecme->execute();
                    while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                        <option value="<?php echo $urun['id'] ?>"><?php echo $urun['Kategoriler'] ?></option>
                    <?php } ?>
                </select>

            </div>

            <div class="mb-3  ">
                <label for="exampleInputCinsiyet1" class="form-label">Ürün Waffle'mı</label> <br>
                <div class="container cinsiyet">
                    <input type="radio" name="cinsiyet" value="1" id="erkek">
                    <label for="erkek" class="form-label">Evet</label>
                    <input type="radio" name="cinsiyet" value="0" id="kadın">
                    <label for="kadın" class="form-label">Hayır</label>
                </div>


                <input type="hidden" name="kateg">
                <button style="border: black 1px solid;" type="submit" class="btn ">Ekle</button>
        </form>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sisteme Kayıtlı Ürünler</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ürün ID</th>
                                            <th>Ürün İsmi</th>
                                            <th>Ürün Fiyatı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $formSorgu = $baglan->prepare("SELECT * FROM urunler ORDER BY id ASC");
                                        $formSorgu->execute();

                                        while ($kullanici = $formSorgu->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $kullanici['id'] ?></td>
                                                <td>
                                                    <?php echo $kullanici['urun'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $kullanici['urunfiyat'] ?>
                                                </td>
                                                <td>
                                                    <a href="islemler/urunsil.php?id=<?php echo $kullanici['id'] ?>">
                                                        <div class="text-danger">sil</div>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Ürün ID</th>
                                            <th>Ürün İsmi</th>
                                            <th>Ürün Fiyatı</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>


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