<?php
include("../connect.php");
$id = $_GET['kullaniciid'];


$MailSorgusu = $baglan->prepare("select * from siparisonay");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from siparisonay 
 where
kullaniciid =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    
    
));


if ($insert) {
 header("Location:../aktifsipar.php");
 

}
?>