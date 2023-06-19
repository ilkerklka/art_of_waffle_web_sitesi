<?php
include ("../connect.php");
$id =1;
$res = 1;
$MailSorgusu = $baglan->prepare("select * from bilgilendirme ");
$MailSorgusu->execute();
$save = $baglan->prepare("update  bilgilendirme set
durum =:aktif
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
    header("Location:../sayfametin.php");
}