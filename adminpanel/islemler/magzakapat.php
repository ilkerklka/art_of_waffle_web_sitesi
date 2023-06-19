<?php
include ("../connect.php");
$id =1;
$res = 0;
$MailSorgusu = $baglan->prepare("select * from restoranaktiflik ");
$MailSorgusu->execute();
$save = $baglan->prepare("update  restoranaktiflik set
aktiflik =:aktif
where
id =:id

");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    "aktif" => $res
));


if ($insert) {
    header("Location:../anasayfa.php");
}