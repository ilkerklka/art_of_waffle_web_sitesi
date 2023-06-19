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
        <H3>Admin Ekle</H3>
        <form action="" method="post">
            <?php
            if (isset($_POST["kateg"])) {
                $kategori        = @$_POST["kategori"];
                $kategori2       =@$_POST["kategori2"];
                $seviye          =2;   
                $urunekle = $baglan->prepare("INSERT INTO admin set
                adminuser       =:kategori,
                sifre           =:sifre,
                seviye          =:seviye     
                 ");
                $insert = $urunekle->execute(array(

                    "kategori"          => $kategori,
                    "sifre"             => $kategori2,
                    "seviye"            =>$seviye
                ));
                if ($insert) {
                    echo '<div class="alert alert-success text-center">Admin başarıyla Eklendi . Site yenileniyor...</div>';

                    echo '<meta http-equiv="refresh" content="2;URL=adminler.php">';
                }
            }
            ?>


        <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Admin Adı :</label>
                <input type="text" name="kategori" class="form-control" id="Sifre" required>
                <label for="exampleInputPassword1" class="form-label">Şifre :</label>
                <input type="password" name="kategori2" class="form-control" id="Sifre" required>

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
                                <h3 class="card-title">Sisteme Kayıtlı Adminler</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Admin ID</th>
                                            <th>Admin Adı</th>
                                            <th>Admin Şifre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $formSorgu = $baglan->prepare("SELECT * FROM admin ORDER BY id ASC");
                                        $formSorgu->execute();

                                        while ($kullanici = $formSorgu->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $kullanici['id'] ?></td>
                                                <td>
                                                    <?php echo $kullanici['adminuser'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $kullanici['sifre'] ?>
                                                </td>
                                                <td>
                                                   <a href="islemler/siladmin.php?id=<?php echo $kullanici['id']?>"> <div class="text-danger">sil</div></a>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Admin ID</th>
                                            <th>Admin Adı</th>
                                            <th>Admin Şifre</th>
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