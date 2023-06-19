<?php
include("../connect.php");
$id = $_GET['id'];

$MailSorgusu = $baglan->prepare("select * from kategoriler ");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from  kategoriler where
id =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    
));


if ($insert) {
    header("Location:../kategoriler.php");
}
?>