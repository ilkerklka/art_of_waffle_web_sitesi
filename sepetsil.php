<?php
include("adminpanel/connect.php");
$id = $_GET['id'];

$MailSorgusu = $baglan->prepare("select * from sepet ");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from  sepet where
id =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id
));


 if ($insert) {
     header("Location:sepet.php");
 }
?>