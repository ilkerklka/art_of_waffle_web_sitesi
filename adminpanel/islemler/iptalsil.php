<?php
include("../connect.php");
$id = $_GET['id'];

$MailSorgusu = $baglan->prepare("select * from iptalsebepleri ");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from  iptalsebepleri where
id =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    
));


if ($insert) {
    header("Location:../iptal.php");
}
?>