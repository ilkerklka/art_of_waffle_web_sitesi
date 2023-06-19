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


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #E80F88;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
        <img src="e9752d83dbef45aaefd97044a6de6db7QiJPt5QhDLgJ6ylF-1.png" height="50" alt="MDB Logo" loading="lazy" />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item secenek">
          <a class="nav-link active" href="hakkimizda.php">Hakkımızda</a>
        </li>
        <?php $urunkategori = $baglan->prepare("SELECT  *  From kategoriler order by id asc");
        $urunkategori->execute();
        while ($urun = $urunkategori->fetch(PDO::FETCH_ASSOC)) {
          $urunkateg = $urun['Kategoriler'];
          $urunid = $urun['id'];
        ?>
          <li class="nav-item secenek">
            <a class="nav-link active" href="sayfaliste.php?id=<?php echo $urunid ?>"><?php echo $urunkateg ?></a>
          </li>
        <?php } ?>
        <li class="nav-item secenek">
          <a class="nav-link active" href="bizeulasin.php">Bize Ulaşın</a>
        </li>
        <li class="nav-item secenek">
          <a class="nav-link active" href="franchisinig.php">Franchising</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
    <?php if (isset($_SESSION['giris'])) {
      # code...
    ?>
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="logout.php">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
        <?php
        $urunkategorisecme2 = $baglan->query("SELECT count(*) from sepet ");
        $toplamurun = $urunkategorisecme2->fetchColumn();
        $toplanurun = $total_count + $toplamurun;
        ?>

        <!-- Notifications -->
        <div class="dropdown">
          <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="sepet.php">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge cart-count rounded-pill badge-notification bg-danger"><?php echo $toplanurun ?></span>
          </a>

        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow text-reset me-3" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="#"> <i class="fa-solid fa-user"></i> <?php echo $kullaniciadi . " " . $kullanicisoyadi ?></a>
            </li>
            <li>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal-10000" href="">Profil Ayarları</a>
            </li>
            <li>
              <a class="dropdown-item" href="siparislerim.php">Siparişlerim</a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Right elements -->
    <?php } else { ?>
      <!-- Right elements -->
      <div class="d-flex align-items-center">


        <!-- Notifications -->
        <div class="dropdown">
          <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" class="dropdown-toggle d-flex align-items-center hidden-arrow text-reset me-3" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-shopping-cart"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="giris.php">Giriş Yap/Kayıt Ol</a>
            </li>

          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow text-reset me-3" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="giris.php">Giriş Yap/Kayıt Ol</a>
            </li>

          </ul>
        </div>

      </div>
      <!-- Right elements -->
    <?php } ?>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->






<?php


if (isset($_POST["güvenlikayar"])) {



  $mail = @$_POST["mailgiris"];
  $eskisifre = @$_POST["sifregiriseski"];
  $yenisifre = @$_POST["sifregirisyeni"];
  $kullanicimid = @$_POST["kullaniciid2"];
  $eskisifrekontrol = @$_POST["eskisfirrr"];
  if ($eskisifre != $eskisifrekontrol) {
    echo '<div class="text-center alert alert-danger"> Eski şifre hatalı</div>';
    echo '<meta http-equiv="refresh" content="2;URL=index.php">';
  } else {
    $girisguncelle = $baglan->prepare("UPDATE kullanicilar 
                        set
                        mail =:mail,
                        sifre=:sifre
                        where
                        id=:id
                        ");
    $insert = $girisguncelle->execute(array(
      "mail" => $mail,
      "sifre" => $yenisifre,
      "id" => $kullanicimid
    ));
    if ($insert) {
      echo '<div class=" text-center alert alert-success"> Bilgiler Güncellendi</div>';
      echo '<meta http-equiv="refresh" content="2;URL=index.php">';
    } else {
    }
  }
}





?>
<?php
if (isset($_SESSION['giris'])) {
  // echo $_SESSION['giris'] ."<br>";

  $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adresler WHERE kullaniciid = '{$kullaniciid}' LIMIT 1");
  $kullanicininbilgiler->execute();
  $kullanicininbilgilersayisi = $kullanicininbilgiler->rowCount();
  $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);

  if ($kullanicininbilgilersayisi < 1) { ?>


    <div class="text-center alert alert-danger"> Lütfen teslimat adresi belirleyin Adres Belirlemek için <a data-bs-toggle="modal" data-bs-target="#exampleModal-150" class="text-danger" href=""> <strong> "Tıklayınız" </strong></a> </div>


<?php
  }
}


?>
<?php

if (isset($_POST["adresekle"])) {

  $adresad = @$_POST["isim"];
  $adressoyad = @$_POST["Soyisim"];
  $adrestelefonnumarasi = @$_POST["telefon"];
  $adresilce = @$_POST["ilce"];
  $adresmahalle = @$_POST["mahalle"];
  $adresacikadres = @$_POST["detay"];
  $adreskullaniciid = @$_POST["kullaniciid"];



  $adresekle = $baglan->prepare("INSERT into adresler 
    set
    kullaniciid =:kullaniciid,
    isim =:isim,
    soyisim =:soyisim,
    telefon =:telefon,
    ilce =:ilce,
    mahalle =:mahalle,
    detay =:tamadres
    ");

  $onsert = $adresekle->execute(array(
    "kullaniciid" => $adreskullaniciid,
    "isim" => $adresad,
    "soyisim" => $adressoyad,
    "telefon" => $adrestelefonnumarasi,
    "ilce" => $adresilce,
    "mahalle" => $adresmahalle,
    "tamadres" => $adresacikadres
  ));

  if ($onsert) {
    echo '<div class=" text-center alert alert-success">Adresiniz başarıyla belirlendi. Hesabınız güncelleniyor...</div>';
    echo '<meta http-equiv="refresh" content="2;URL=index.php">';
  } else {
    echo '<div class=" text-center alert alert-danger">Adres belirlenirken bir hata oluştu</div>';
  }
}

?>




<!--ADRESBELİRLE-->
<div class="modal fade" id="exampleModal-150" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adres Ekle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="profilduzen modal-body">
        <form method="POST" action="" class="indirimkodu" style="margin-bottom: 3px; padding: 5px;" action="">
          <div class="mb-4">
            <label class="form-label" for="isim">İsim</label><br>

            <input class="form-control" name="isim" type="text" placeholder="<?php echo "$kullaniciadi" ?>"> <br>

            <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciid ?>" id="">
            <input type="hidden" name="adresekle">
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Soyisim</label><br>
            <input class="form-control" name="Soyisim" type="text" placeholder="<?php echo "$kullanicisoyadi" ?>"><br>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Telefon Numarası</label><br>
            <input class="form-control" name="telefon" type="tel" placeholder=""><br>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">İlçe</label>
            <select type="text" name="ilce" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT DISTINCT ilce from adres_ayar order by id asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['ilce'] ?>"><?php echo $urun['ilce'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">Mahalle</label>
            <select type="text" name="mahalle" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT * from adres_ayar order by id asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['mahalle'] ?>"><?php echo $urun['ilce'] . " / " . $urun['mahalle'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Detay</label><br>
            <textarea name="detay" class="form-control" id="" cols="30" rows="10"></textarea><br>
          </div>
          <button style="background-color: #E80F88; color: white;" type="submit" class="btn btn-block ">Ekle </button>

        </form>
      </div>






      <button type="button" class="btn btn-danger btn-block " data-bs-dismiss="modal">Kapat</button>

    </div>
  </div>
</div>

<!--/ADRESBELİRLE-->


<!-- AYARLAR-->

<div class="modal fade" id="exampleModal-10000" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="profilduzen modal-body">
        <h4><strong> Detaylar</strong></h4>
        <p> <strong> isim soyisim : </strong><?php echo $kullaniciadi . " " . $kullanicisoyadi ?></p>
        <hr>
        <h4><strong>Aktif Adresim</strong></h4>
        <?php
        if (isset($_SESSION['giris'])) {
          // echo $_SESSION['giris'] ."<br>";

          $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adresler WHERE kullaniciid = '{$kullaniciid}' LIMIT 1");
          $kullanicininbilgiler->execute();
          $kullanicininbilgilersayisi = $kullanicininbilgiler->rowCount();
          $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);

          if ($kullanicininbilgilersayisi < 1) { ?>


            <div class="text-center alert alert-danger"> Lütfen teslimat adresi belirleyin Adres Belirlemek için <a data-bs-toggle="modal" data-bs-target="#exampleModal-150" class="text-danger" href=""> <strong> "Tıklayınız" </strong></a> </div>


          <?php
          } else {




          ?>

            <?php
            $adreslistele = $baglan->prepare("SELECT * from adresler  where kullaniciid = ? ");
            $adreslistele->execute([$kullaniciid]);

            while ($adresyazma = $adreslistele->fetch(PDO::FETCH_ASSOC)) {


            ?>
              <p><b><?php echo  "Adres Ad Soyad : </b> " . $adresyazma['isim'] . " "  . $adresyazma['soyisim'] . "<br>" . " <b> İlçe/Mahalle : </b> "  . $adresyazma['ilce'] . " , " . $adresyazma['mahalle']

                      . "<br><b>Detay : </b>"  . $adresyazma['detay'] . "<br> <b>Telefon : </b>"  . $adresyazma['telefon']
                    ?>

              </p>



            <?php
            }
            ?>

            <a style="color: #E80F88;" class="" data-bs-toggle="modal" data-bs-target="#exampleModal-20000 " href=""> <strong> Düzenle </strong></a>
        <?php
          }
        }


        ?>



        <hr>
        <h4><strong>Giriş Detayları</strong></h4>
        <p><strong>Kullanıcı Mail :</strong></p>
        <p><?php echo $kullanicimail ?></p>
        <p><strong>Kullanıcı Şifre :</strong></p>
        <p><?php echo $kullanicisifre ?></p>
        <a style="color: #E80F88;" class="" data-bs-toggle="modal" data-bs-target="#exampleModal-30000 " href=""> <strong> Düzenle </strong></a>
      </div>


      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>

    </div>
  </div>
</div>

<!-- /AYARLAR-->

</div>

<div class="modal fade" id="exampleModal-150" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adres Ekle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="profilduzen modal-body">
        <form method="POST" action="" class="indirimkodu" style="margin-bottom: 3px; padding: 5px;" action="">
          <div class="mb-4">
            <label class="form-label" for="isim">İsim</label><br>

            <input class="form-control" name="isim" type="text" placeholder="<?php echo "$kullaniciadi" ?>"> <br>

            <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciid ?>" id="">
            <input type="hidden" name="adresekle">
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Soyisim</label><br>
            <input class="form-control" name="Soyisim" type="text" placeholder="<?php echo "$kullanicisoyadi" ?>"><br>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Telefon Numarası</label><br>
            <input class="form-control" name="telefon" type="tel" placeholder=""><br>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">İlçe</label>
            <select type="text" name="ilce" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT DISTINCT ilce from adres_ayar order by id asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['ilce'] ?>"><?php echo $urun['ilce'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">Mahalle</label>
            <select type="text" name="mahalle" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT * from adres_ayar order by id asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['mahalle'] ?>"><?php echo $urun['ilce'] . " / " . $urun['mahalle'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Detay</label><br>
            <textarea name="detay" class="form-control" id="" cols="30" rows="10"></textarea><br>
          </div>
          <button style="background-color: #E80F88; color: white;" type="submit" class="btn btn-block ">Ekle </button>

        </form>
      </div>






      <button type="button" class="btn btn-danger btn-block " data-bs-dismiss="modal">Kapat</button>

    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal-20000" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Adres Güncelle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="profilduzen modal-body">
        <?php

        if (isset($_POST["adresekle2"])) {

          $adresad = @$_POST["isim"];
          $adressoyad = @$_POST["Soyisim"];
          $adrestelefonnumarasi = @$_POST["telefon"];
          $adresilce = @$_POST["ilce"];
          $adresmahalle = @$_POST["mahalle"];
          $adresacikadres = @$_POST["detay"];
          $adreskullaniciid = @$_POST["kullaniciid"];



          $adresekle = $baglan->prepare("UPDATE adresler 
    set
    
    isim =:isim,
    soyisim =:soyisim,
    telefon =:telefon,
    ilce =:ilce,
    mahalle =:mahalle,
    detay =:tamadres
    where 
    kullaniciid =:kullaniciid,
    ");

          $onsert = $adresekle->execute(array(
            "kullaniciid" => $adreskullaniciid,
            "isim" => $adresad,
            "soyisim" => $adressoyad,
            "telefon" => $adrestelefonnumarasi,
            "ilce" => $adresilce,
            "mahalle" => $adresmahalle,
            "tamadres" => $adresacikadres
          ));

          if ($onsert) {
            echo '<div class=" text-center alert alert-success">Adresiniz başarıyla güncellendi.</div>';
          } else {
            echo '<div class=" text-center alert alert-danger">Adres güncellenirken bir hata oluştu</div>';
          }
        }

        ?>
        <form method="POST" action="" class="indirimkodu" style="margin-bottom: 3px; padding: 5px;" action="">
          <div class="mb-4">
            <label class="form-label" for="isim">İsim</label><br>

            <input class="form-control" name="isim" type="text" required placeholder="<?php echo "$kullaniciadi" ?>"> <br>

            <input type="hidden" name="kullaniciid" value="<?php echo $kullaniciid ?>" id="">
            <input type="hidden" name="adresekle2">
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Soyisim</label><br>
            <input class="form-control" name="Soyisim" type="text" required placeholder="<?php echo "$kullanicisoyadi" ?>"><br>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Telefon Numarası</label><br>
            <input class="form-control" name="telefon" type="tel" required placeholder=""><br>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">İlçe</label>
            <select type="text" name="ilce" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT DISTINCT ilce from adres_ayar order by id asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['ilce'] ?>"><?php echo $urun['ilce'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputText2" class="form-label">Mahalle</label>
            <select type="text" name="mahalle" class="form-control" id="soyisim" required>
              <?php
              $urunkategorisecme = $baglan->prepare("SELECT * from adres_ayar order by ilce asc");
              $urunkategorisecme->execute();
              while ($urun = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {
                $kategorikontrol = $urun['ilce']
              ?>
                <option value="<?php echo $urun['mahalle'] ?>"><?php echo $urun['ilce'] . " / " . $urun['mahalle'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Detay</label><br>
            <textarea name="detay" class="form-control" required id="" cols="30" rows="10"></textarea><br>
          </div>
          <button style="background-color: #E80F88; color: white;" type="submit" class="btn btn-block ">Güncelle </button>

        </form>
      </div>






      <button type="button" class="btn btn-danger btn-block " data-bs-dismiss="modal">Kapat</button>

    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal-30000" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Giriş Detayları</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="profilduzen modal-body">

        <form method="POST" action="" class="indirimkodu" style="margin-bottom: 3px; padding: 5px;" action="">
          <div class=" mb-4">
            <label class="form-label" for="isim">Mail</label><br>

            <input class="form-control" name="mailgiris" type="mail" placeholder="<?php echo "$kullanicimail" ?>"> <br>


          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Eski Şifre</label><br>
            <input class="form-control" name="sifregiriseski" type="text" placeholder="" required><br>
          </div>
          <div class=" mb-4">
            <label class="form-label" for="Soyisim">Yeni Şifre</label><br>
            <input class="form-control" name="sifregirisyeni" type="text" placeholder="" required><br>
          </div>
          <input class="" name="kullaniciid2" value="<?php echo "$kullaniciid" ?>" type="hidden">
          <input class="" name="eskisfirrr" value="<?php echo "$kullanicisifre" ?>" type="hidden">
          <input class="" name="güvenlikayar" type="hidden">
          <button style="background-color: #E80F88; color: white;" type="submit" class="btn btn-block ">Güncelle </button>

        </form>
      </div>






      <button type="button" class="btn btn-danger btn-block " data-bs-dismiss="modal">Kapat</button>

    </div>
  </div>
</div>
<?php
$urungosterme = $baglan->prepare("SELECT * from bilgilendirme ");
$urungosterme->execute();
$urun = $urungosterme->fetch(PDO::FETCH_ASSOC);
$duejm  =  $urun["durum"];
if ($duejm == 1) {
  # code...


?>

  <div style="margin: 5px; padding: 15px; font-size: 20px;" class="alert-info text-center">
    <?php

    echo $urun["bilgi"];
    ?>
  </div>
<?php } ?>


