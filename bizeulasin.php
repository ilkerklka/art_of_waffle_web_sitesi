<?php
session_start();
include("adminpanel/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="Description" content="The Art Of Waffle bütün ulaşım kanalları için.
        Franchise’larımıza iş ortaklarımız olarak bakar ve kalıcı başarı için destek veririz.">
  <title>The Art Of Waffle-Bize Ulaşın</title>
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

  <script type="text/javascript">
    (function() {
      var options = {
        whatsapp: "+90 555 141 3388",
        call_to_action: " WhatsApp destek hattı",
        position: "right"
      };
      var proto = document.location.protocol,
        host = "getbutton.io",
        url = proto + "//static." + host;
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url + '/widget-send-button/js/init.js';
      s.onload = function() {
        WhWidgetSendButton.init(host, proto, options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    })();
  </script>
</head>

<body>
  <?php
  include("navbar.php")
  ?>


  <h1 id="Bize_Ulasin" class="hak">Bize Ulaşın</h1>
  <div style="margin-bottom: 20px;" class="bizeulasin">

    <div class="container p-4">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h3>Sosyal Medya</h3>
          <ul>
            <?php
            if ($detayid = 1) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '1' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="<?php echo $urun['link']?>">facebook</a>
              </li>
            <?php } ?>
            <?php
            if ($detayid = 2) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '2' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="<?php echo $urun['link']?>">instagram</a>
              </li>
            <?php } ?>
            <?php
            if ($detayid = 4) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '4' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="tel :<?php echo $urun['link']?>">+90 0216 515 43 85</a>
              </li>
            <?php } ?>
            <br>

            <b>Konumumuz</b> <br><br>

            <img src="QRcode2.png" width="120px" height="120px" alt="">
          </ul>
          <br>
          <h3>Sipariş Vermek İçin</h3>
          <ul>
          <?php
            if ($detayid = 5) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '5' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="<?php echo $urun['link']?>">Yemeksepeti</a>
              </li>
            <?php } ?>
            <?php
            if ($detayid = 6) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '6' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="<?php echo $urun['link']?>">Trendyol</a>
              </li>
            <?php } ?>
            <?php
            if ($detayid = 7) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '7' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
              <li> <a href="<?php echo $urun['link']?>">Getir</a>
              </li>
            <?php } ?> </ul>
        </div>
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">

          <img style="background-color: #AF0171; border-style: none;" src="bizeulasin.png" class="card-img anafoto1" alt="...">



        </div>
      </div>
    </div>
  </div>


  <?php include("footer.php") ?>

  <img class="up" src="scrollup.png" alt="">

  <script src="custom.js"></script>
</body>

</html>