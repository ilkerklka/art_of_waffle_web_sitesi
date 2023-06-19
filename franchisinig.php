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
        <meta name="Description" content="The Art Of Waffle’da uzun soluklu işbirliğine ve karşılıklı faydaya inanırız. 
        Franchise’larımıza iş ortaklarımız olarak bakar ve kalıcı başarı için destek veririz.">
        <title>The Art Of Waffle-Franchising</title>
        <meta name="robots" content="index,follow" />
        
        <!-- Font Awesome -->
        <link
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          rel="stylesheet"
        />
        <script
          src="https://kit.fontawesome.com/5f120640c7.js"
          crossorigin="anonymous"
        ></script>
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet"/>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
        
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" href="style.css" />
        
        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <!-- ICONFINDER -->
        <link rel="shortcut icon" href="favico.ico">
        
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+90 555 141 3388",
                    call_to_action: " WhatsApp destek hattı", 
                    position: "right"
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
          </script>
        </head>
<body>
<?php 
include("navbar.php")
?>

    <h1 id="Franchising" class="hak">Franchising...</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h3>Franchise başvuru detayları</h3>
              <p><?php
            if ($metinid = 3) {
              $urungosterme = $baglan->prepare("SELECT * from metinler where id = '3' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC);
              echo $urun['metin'];
            }
            ?>p>
                  <h3>Franchise'da verilecek destekler</h3>
                  <ul>
                    <li>Her konuda detaylı ve ilgili danışmanlık</li>
                    <li>İşin teknik boyutu ve genel her alanla alakalı eğitim</li>
                    <li>Hizmet standartıyla alakalı detaylı anlatım</li>
                  </ul>
            </div>
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <form action="https://formspree.io/f/xzbwebke" method="post">        
                <div class="mb-3">
                  <label for="exampleFormControlInput1" style="color: #AF0171;" class="form-label">Adınız:</label>
                  <input type="text" name="İsim"  class="form-control" id="exampleFormControlInput1" required >
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" style="color: #AF0171;" class="form-label">Soyadınız:</label>
                  <input type="text"  name="Soyisim" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" style="color: #AF0171;" class="form-label">Şu an faaliyet gösterdiğiniz sektör :</label>
                  <input type="text"  name="Sektör" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" style="color: #AF0171;" class="form-label">Daha önce herhangi bir markanın Franchising sistemine dahil oldunuz mu ? (evet/hayır)</label>
                  <input type="text"  name="Geçmiş Franchising" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1"  style="color:  #AF0171;"class="form-label">E-Mailiniz:</label>
                  <input type="email" name="Mail" class="form-control" id="exampleFormControlInput1" required placeholder="örnek@mail.com">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" style="color: #AF0171;" class="form-label">İşletmeyi açmak istediğiniz şehir ve yer :</label>
                  <input type="text"  name="Konum" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <input type="hidden" name="_next" value="https://site.io/thanks.html">
                <input class="btn text-white" style="background-color: #AF0171; "  type="submit" value="GÖNDER"> 
                <input class="btn text-white" style="background-color: #AF0171; " type="reset" value="İPTAL">  
        
                
                
              </form>
            </div>
        </div>
    </div>


    <?php include("footer.php")?>
    <img class="up" src="scrollup.png" alt="">

    <script src="custom.js"></script>
</body>
</html>