<!DOCTYPE html>
<html lang="tr">
<?php
session_start();
include("adminpanel/connect.php");
error_reporting(0);
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Description" content="The Art Of  Waffle , eşsiz donut , dondurma , waffle'ın tek adresi">

    <title>The Art Of Waffle-Sepet</title>
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



</head>

<body>
    <?php


    if (isset($_SESSION['giris'])) {




        include('navbar.php');


      
          
      
      

     
      



        $kullanicininbilgiler = $baglan->prepare("SELECT * FROM restoranaktiflik ");
        $kullanicininbilgiler->execute();

        $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
        $magza = $kullanici['aktiflik'];
        if ($magza  == 1) {

    ?>
            <div class="container">
                <?php
                if ($total_count > -9) {
                ?>




                    <hr>
                    <div style="margin: 20px;" class="">
                        <div style="display: block; margin: auto;" class="col-md-7 col-md-offset-1">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <th class="text-center">Ürün Resmi</th>
                                    <th class="text-center">Ürün Adı</th>
                                    <th class="text-center">Ürün Fiyatı</th>
                                    <th class="text-center">Ürün Adeti</th>
                                    <th class="text-center">Ürün Toplamı</th>
                                    <th class="text-center">Ürünü Sepetten Çıkar</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($shopping_products as $product) { ?>

                                        <tr>
                                            <td class="text-center" width="120">
                                                <img src="<?php echo $product->urunfoto; ?>" width="50" alt="">
                                            </td>
                                            <td class="text-center"><?php echo $product->urun; ?></td>
                                            <td class="text-center"><strong><?php echo $product->urunfiyat; ?> &#8378 </strong></td>
                                           
                                            <td class="text-center">
                                                <a href="adminpanel/sepetayar.php?p=incCount&product_id=<?php echo $product->id; ?>" class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                                <input type="text" disabled class="item-count-input" value="<?php echo $product->count; ?>">
                                                <a href="adminpanel/sepetayar.php?p=decCount&product_id=<?php echo $product->id; ?>" class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-minus"></i>
                                                </a>

                                            </td>
                                            <td class="text-center"><?php echo $product->total_price; ?> &#8378 </td>
                                            <td class="text-center">
                                                <a product-id=<?php echo $product->id; ?> class="btn btn-danger btn-sm    removeFromCartBtn   "><i class="fa-solid fa-xmark"></i> Sepetten Çıkar</a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    <?php

                                    $urunkategorisecme = $baglan->prepare("SELECT * from sepet where kullaniciid = '{$kullaniciid}'");
                                    $urunkategorisecme->execute();

                                    $tutar = 0;
                                    while ($row = $urunkategorisecme->fetch(PDO::FETCH_ASSOC)) {

                                        $sepeturunid = $row['urunid'];


                                        $urunbilgi = $baglan->prepare("SELECT * FROM urunler where id = '{$sepeturunid}' ");
                                        $urunbilgi->execute();
                                        if ($urun = $urunbilgi->fetch(PDO::FETCH_ASSOC)) {
                                            $urunid  = $urun['id'];
                                            $urunadi = $urun['urun'];

                                            $urunfoto = $urun['urunfoto'];
                                            $urunfiyat = $urun['urunfiyat'];
                                        }
                                        $tutar = $tutar + $urunfiyat;

                                        $urunkategorisecme2 = $baglan->query("SELECT count(*) from sepet ");
                                        $toplamurun = $urunkategorisecme2->fetchColumn();

                                    ?>

                                        <tr>
                                            <td class="text-center" width="120">
                                                <img src="<?php echo $urun["urunfoto"]; ?>" width="50" alt="">
                                            </td>
                                            <td class="text-center"><?php echo $urun["urun"]; ?></td>
                                            <td class="text-center"><strong><?php echo $urun["urunfiyat"]; ?>&#8378 </strong></td>
                                            <td class="text-center">
                                                Waffle alıyorsanız lütfen menüyü kullanınız

                                            </td>
                                            <td class="text-center"><?php echo $urun["urunfiyat"]; ?> &#8378 </td>
                                            <td class="text-center">
                                                <a href="sepetsil.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm       "><i class="fa-solid fa-xmark"></i> Sepetten Çıkar</a>
                                            </td>
                                        </tr>
                                    <?php }

                                    
                                    $toplam = $tutar + $total_price;
                                    $toplanurun = $total_count + $toplamurun;


                                    ?>

                                </tbody>
                                <tfoot>
                                    <th colspan="2" class="text-center">
                                        Toplam Ürün : <span class="color-danger"><?php echo $toplanurun; ?> adet</span>
                                    </th>
                                    <th colspan="2" class="text-center">
                                        <?php
                                        if ($tutar == 0) { ?>
                                            Toplam Tutar : <span class="color-danger"> <?php echo $total_price ?> &#8378 </span>
                                        <?php  } elseif ($tutar > 0) { ?>
                                            Toplam Tutar : <span class="color-danger"> <?php echo $toplam ?> &#8378 </span>
                                        <?php   } ?>


                                    </th>
                                    <th colspan="2" class="text-center">
                                        <?php

                                        $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adresler where kullaniciid = '$kullaniciid' ");
                                        $kullanicininbilgiler->execute();

                                        $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
                                        $adress = $kullanici['mahalle'];

                                        $kullanicininbilgiler = $baglan->prepare("SELECT * FROM adres_ayar where mahalle = '$adress' ");
                                        $kullanicininbilgiler->execute();

                                        $kullaniciayar = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
                                        $kalanturar = $kullaniciayar["minucret"] - $toplam;
                                        if ($toplam < $kullaniciayar["minucret"]) {
                                        ?>
                                            <p>lütfen minimum sipariş tutarını geçiniz <br>
                                                kalan tutar : <strong class="color-danger"> <?php echo $kalanturar ?> &#8378 </strong> </p>
                                        <?php } else { ?>

                                            <a class="btn btn-success btn-sm" href="onay.php"><i class="fa-solid fa-check"></i> Sepeti Onayla</a>

                                        <?php } ?>
                                    </th>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                <?php

                } else { ?>

                    <div class="alert alert-info">
                        <strong>Sepetinizde herhangi bir ürün bulunmamaktadır</strong>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php } else {

        ?>


            <div class=" text-center alert alert-danger">Mağzamız Şuan hizmet vermemektedir...</div>


        <?php
        } 
    


        ?>


    <?php } else { ?>


        <h1 style="text-align: center;">Lütfen Giriş Yapınız</h1>


    <?php
    }



    include('footer.php') ?>
    <img class="up" src="scrollup.png" alt="">
    <script src="sepet.js"></script>
    <script src="custom.js"></script>
</body>

</html>