<?php
include("../connect.php");
$id = $_GET['kullaniciid'];
$siparis = 2;

$MailSorgusu = $baglan->prepare("select * from siparisonay");
$MailSorgusu->execute();
$save = $baglan->prepare("UPDATE siparisonay set 
siparisdurumu =:siparis
 where
kullaniciid =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    "siparis" =>$siparis
    
));


if ($insert) {
 header("Location:../aktifsipar.php");
 

}
?>