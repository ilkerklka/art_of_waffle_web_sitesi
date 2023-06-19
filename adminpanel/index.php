
<!DOCTYPE html>
<html lang="tr">
<?php
session_start();
include("connect.php");

?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="">

    <title>The Art Of Waffle-Yönetim Paneli</title>
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
    <link rel="shortcut icon" href="../favico.ico">

   

</head>
<body>
<div style="position: absolute ;
   top: 50%; left: 50%;
    transform: translate(-50%,-50%);">
    <h3 style="color: #E80F88; text-align: center;">THE ART OF WAFFLE</h3>
    <h5 style="text-align: center;">Yönetici Paneline Hoşgediniz</h5>
<form action="" method="POST">

<?php

if (isset($_POST["admingiris"])) {
        $adminkullanici = @$_POST["kullanici"];
        $adminsifre = @$_POST["sifre"];

        if ($adminkullanici != ""  and $adminsifre != "") {
                $admingiris = $baglan->prepare("SELECT * FROM admin WHERE adminuser = ? and sifre = ?");
                $admingiris->execute([$adminkullanici, $adminsifre]);
                $adminsayisi = $admingiris->rowCount();

                if ($adminsayisi > 0) {

                        $_SESSION['admin'] = $adminkullanici;
                        echo '<div class=" alert alert-success">Giriş İşlemi Başarılı</div>';
                        header("refresh:1 ,url=anasayfa.php");
                } else {
                        echo '<div class=" alert alert-danger">Kullanıcı adı veya şifre yanlış</div>';
                        header("refresh:1 ,url=index.php");
                }
        } else {
                echo '<div class=" alert alert-danger">Lütfen boş geçmeyin</div>';
                header("refresh:1 ,url=index.php");
        }
}

?>
  <!-- Email input -->
  <div class=" mb-4">
    <label class="form-label" for="form1Example1">Kullanıcı Adı</label>
    <input name="kullanici" type="text" id="form1Example1" class="form-control" />
    
  </div>

  <!-- Password input -->
  <div class="mb-4">
    <label class="form-label" for="form1Example2">Şifre</label>
    <input name="sifre" type="password" id="form1Example2" class="form-control" />
    
  </div>

  <input name="admingiris"  type="hidden">

  <!-- Submit button -->
  <button type="submit" class="btn btn-dark btn-block">Giriş Yap</button>
</form>
</div>

</body>
</html>