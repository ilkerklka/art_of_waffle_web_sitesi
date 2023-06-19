<?php
include("../connect.php");
$id = $_GET['id'];

$MailSorgusu = $baglan->prepare("select * from adres_ayar ");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from  adres_ayar where
id =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    
));


if ($insert) {
    header("Location:../adresler.php");
}
?>