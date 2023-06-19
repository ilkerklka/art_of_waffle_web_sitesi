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

        <H3>Franchising metnini düzenleyin</H3>

<div>
    <label class="form-label" for="fontSelect">Yazı Tipi:</label>
    <select class="form-control" id="fontSelect">
        <option value="Arial, sans-serif">Arial</option>
        <option value="Times New Roman, serif">Times New Roman</option>
        <option value="Verdana, sans-serif">Verdana</option>
    </select>
</div>

<div>
    <label class="form-label" for="sizeSelect">Yazı Boyutu:</label>
    <select class="form-control" id="sizeSelect">
        <option value="12px">12</option>
        <option value="14px">14</option>
        <option value="16px">16</option>
        <option value="18px">18</option>
        <option value="20px">20</option>
    </select>
</div>

<div>
    <label class="form-label" for="colorSelect">Yazı Rengi:</label>
    <select class="form-control" id="colorSelect">
        <option value="black">Siyah</option>
        <option value="red">Kırmızı</option>
        <option value="blue">Mavi</option>
        <option value="green">Yeşil</option>
    </select>
</div>

<div>
    <label class="form-label" for="boldCheck">Kalın:</label>
    <input type="checkbox" id="boldCheck">
</div>

<div>
    <label class="form-label" for="italicCheck">İtalik:</label>
    <input type="checkbox" id="italicCheck">
</div>

<div>
    <label class="form-label" for="underlineCheck">Altı Çizili:</label>
    <input type="checkbox" id="underlineCheck">
</div>
<div class="  btn-group">

    <button type="button" style="margin: 5px;" class="btn btn-dark " id="insertBoldButton">Kalın Ekle</button>
    <button type="button" style="margin: 5px;" class="btn btn-dark " id="insertItalicButton">İtalik Ekle</button>
    <button type="button" style="margin: 5px;" class="btn btn-dark " id="insertUnderlineButton">Altı Çizili Ekle</button>
    <button type="button" style="margin: 5px;" class="btn btn-dark " id="insertLinkButton">Link Ekle</button>
    <button type="button" style="margin: 5px;" class="btn btn-dark  " id="insertAltSatir">Alt Satıra Geç</button>

</div>
<form action="" method="post">
    <?php
    if (isset($_POST["franchise"])) {
        $id              = 3;
        $kategori        = @$_POST["metin"];
        $urunekle = $baglan->prepare("UPDATE  metinler set
        metin       =:kategori 
        where
        id =:id");
        $insert = $urunekle->execute(array(

            "kategori"          => $kategori,
            "id"                => $id
        ));
        if ($insert) {
            echo '<div class="alert alert-success text-center"> Franchising metni başarıyla güncellendi başarıyla güncellendi . Site yenileniyor...</div>';

            echo '<meta http-equiv="refresh" content="2;URL=sayfametin.php">';
        }
    }
    ?><br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Metininiz</label>
        <input type="hidden" name="franchise">
        <textarea style="height: 250px;" name="metin" class="form-control" id="myTextarea">
            <?php if ($metinid = 3) {
                    $urungosterme = $baglan->prepare("SELECT * from metinler where id = '3' ");
                    $urungosterme->execute();
                    $urun = $urungosterme->fetch(PDO::FETCH_ASSOC);
                    echo $urun['metin'];
            } ?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-dark">Ekle</button>
</form>


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
        <script src="metin.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="navbar.js"></script>
    <?php } else { ?>
        <h1 class="text-center ">LÜTFEN GİRİŞ YAPINIZ</h1>
    <?php } ?>
</body>

</html>