<!DOCTYPE html>
<html lang="tr">
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

    <link rel="stylesheet" href="giris/giris.css">

</head>


<body>

    <div class="form-structor">
        <div class="signup">
            <h2 class="form-title" id="signup"><span>ya da</span>Kayıt Ol</h2>
            <div class="form-holder">
                <form action="" method="post">
                    <?php
                    if (isset($_POST['Kaitol'])) {
                        # code...

                        $Ad = @$_POST["Ad"];
                        $Soyad = @$_POST["Soyad"];
                        $Mail = @$_POST["Mail"];
                        $Sifre = @$_POST["Sifre"];

                        //  if ($Ad and $Soyad and $DogumTarih and $Mail and $cinsiyet and $Sifre) {
                        //      echo 'bu kısımda problem yok';
                        //  }


                        $MailSorgusu = $baglan->prepare("select * from kullanicilar where mail = ? LIMIT 1");
                        $MailSorgusu->execute([$Mail]);
                        $MailSorguSayisi = $MailSorgusu->rowCount();

                        if ($MailSorguSayisi > 0) {
                            echo '<div class="alert alert-danger" >Girmiş Olduğunuz E-mail Zaten mevcut</div>';
                        } else {

                            $save = $baglan->prepare("insert into kullanicilar set

ad =:Ad,
soyad =:Soyad,
mail =:Mail,
sifre =:sifre
");

                            //  if ($save) {
                            //      echo 'bu kısım sorunsuz';
                            // }

                            $insert =  $save->execute(array(
                                "Ad" => $Ad,
                                "Soyad" => $Soyad,
                                "Mail" => $Mail,
                                "sifre" => $Sifre
                            ));



                            if ($insert) {
                                echo '<div class= "alert alert-success">Kayıdınız Oluşturuldu , lütfen giriş yapınız.</div>';
                            } else {
                            }
                        }
                    }

                    ?>

                    <?php
                    if (isset($_POST['giris'])) {
                        $Mail = $_POST['mail'];
                        $sifre = $_POST['sifre'];


                        if ($Mail != ""  and $sifre != "") {
                            $KullaniciKontrol = $baglan->prepare("SELECT * FROM kullanicilar WHERE mail = ? and sifre = ?");
                            $KullaniciKontrol->execute([$Mail, $sifre]);
                            $KullaniciKontrolSayisi = $KullaniciKontrol->rowCount();

                            if ($KullaniciKontrolSayisi > 0) {

                                $_SESSION['giris'] = $Mail;
                                echo '<div class=" alert alert-success" >Giriş işlemi başarılı</div>';
                                header("refresh:2 ,url=index.php");
                            } else {
                                echo '<div class=" alert alert-danger" >Bu bilgilere sahip kullanıcı bulunmamakta</div>';
                            }
                        } else {
                            echo '<div class=" alert alert-danger" >Lütfen Boş geçmeyiniz</div>';
                        }
                    }
                    ?>
                    <input type="hidden" name="Kaitol">
                    <input type="text" class="input" name="Ad" placeholder="İsim" />
                    <input type="text" class="input" name="Soyad" placeholder="Soyisim" />
                    <input type="email" class="input" name="Mail" placeholder="E-Mail" />
                    <input type="password" class="input" name="Sifre" placeholder="Şifre" />

            </div>
            <button class="submit-btn">Kayıt Ol</button>
            </form>
        </div>
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>ya da</span>Giriş Yap</h2>
                <div class="form-holder">
                    <form action="" method="post">

                        <input type="hidden" name="giris">
                        <input type="email" name="mail" class="input" placeholder="E-Mail" />
                        <input type="password" name="sifre" class="input" placeholder="Şifre" />

                </div>
                <button class="submit-btn">Giriş Yap</button>
                <!-- <a style="color:  #E80F88;" href="sifremi.php">Şifremi Unuttum</a> -->
                </form>
            </div>
        </div>
    </div>
    <script src="giris/giris.js"></script>
</body>

</html>