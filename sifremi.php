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
    <div>
        <?php
        if (isset($_POST["sifir"])) {
            require_once 'mail/PHPMailer.php';
            $eposta = trim($_POST['eposta']);
            if (!$eposta) {
                echo '<div class="alert alert-danger">Boş Alan Bırakmayınız</div>';
            }else {
                if (!filter_var($eposta,FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="alert alert-danger">E-posta formatı yanlış girildi</div>';
                }else {
                    $varmi = $baglan->prepare("SELECT mail from kullanicilar where mail=:e");
                    $varmi->execute(['e'  => $eposta]);
                    if ($varmi->rowCount()) {
                        $row = $varmi->fetch(PDO::FETCH_ASSOC);
                        $mail = new PHPmailler ();
                        $mail->Host    = "smtp.yandex.com";
                        $mail->Port    = 587;
                        $mail->SMTPSecure = 'tls';
                        $mail->SMTPAuth   = true;
                        $mail->Username = "theartofwaffle.com@gmail.com";
                        $mail->Password  = "theartofwaffle*1";
                        $mail->IsSMTP();
                        $mail->AddAddress($eposta);
                        $mail->From         ="theartofwaffle.com@gmail.com";
                        $mail->FromName  ="Şifremi Unuttum";
                        $mail->Charset = "UTF-8";
                        $mail->Subject    =  "Şifremi Sıfırla";

                        $mailicerik = "<div style='font-size:20px;'>Sayın : " .$row['ad']  ."Sıfırlama linkiniz  : " .$sifirlamalinki ."</div>";
                        $mail->MsgHTML($mailicerik);
                        if ($mail->send()) {
                            echo '<div class="alert alert-success">Şifre sıfırlama linkiniz belirtmiş olduğunuz mail adresine gönderilmiştir.</div>';
                        }else {
                            echo '<div class="alert alert-danger">Hata Oluştu </div>';
                        }
                    }else {
                        echo '<div class="alert alert-danger">Girilen E-posta adresi sistemde mevcut değildir</div>';
                    }
                }
            }
        }
        ?>
       
        <form action="" method="post">
            <label style="color: white;" for="">Şifre Sıfırlama</label><br>
            <input  class="form-control" type="email" placeholder="E-posta" name="eposta" id=""><br><br>
            <button name="sifir" class="btn btn-light" type="submit">Şifremi Sıfırla</button>
        </form>
    </div>
</body>
</html>