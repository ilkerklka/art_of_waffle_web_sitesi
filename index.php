<?php
session_start();
include("adminpanel/connect.php");

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">
  <title>The Art Of Waffle</title>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //sayfa açıldığında otomatik açılması için
      $("#modalNesne").modal('show');
    });
  </script>

  <link rel="stylesheet" href="anasayfa/anasayfa.css">
</head>

<body>

<?php
    
    $admingiris = $baglan->prepare("SELECT * FROM popup ");
    $admingiris->execute(); 
    $admin = $admingiris->fetch(PDO::FETCH_ASSOC);
?>
  <div id="modalNesne" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <div class="col-md-12">
            <img src="popup/<?php echo $admin['popup']?>" style="width: 100%;" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("navbar.php")
  ?>

  <!-- 
  <div  class="card bg-dark text-white">
    <img src="anasayfa.jpeg" style="opacity: 80%;"    class="card-img" alt="...">
    <div class=" animate__animated animate__backInDown card-img-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0 ">
                    <p class="anayazi card-title " >Sen İste</p>
                    <p class="anayazi2 card-title  " >Biz Hazırlayalım</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                </div>
            </div>
        </div>
     
      
    </div>
  </div> -->

  <div class="splitview skewed">
    <div class="panel bottom">
      <div class="content">
        <div class="description">
          <h3>Biz Hemen Getirelim</h3>
          <p>En hızlı şekilde</p>
        </div>

        <img src="anasayfa.jpeg" alt="Original">
      </div>
    </div>

    <div class="panel top">
      <div class="content">
        <div class="description">
          <h3>Sen Waffle'ni Sipariş Et</h3>
          <p>Dilediğin seçenekleri seç</p>
        </div>

        <img src="anasayfa.jpeg" alt="Duotone">
      </div>
    </div>

    <div class="handle"></div>
  </div>



  <div class="card bg-dark text-white">
    <img src="altfoto.jpeg" class="card-img anafoto1" alt="...">
    <div class="card-img-overlay">

    </div>
  </div>
  <?php include("footer.php") ?>

  <img class="up" src="scrollup.png" alt="">
    <script src="anasayfa/anasayfa.js"></script>
  <script src="custom.js">
   
    
  </script>
</body>

</html>