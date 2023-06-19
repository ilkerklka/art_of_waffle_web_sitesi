<?php
include("../connect.php");
$id = $_GET['id'];

$MailSorgusu = $baglan->prepare("select * from admin ");
$MailSorgusu->execute();
$save = $baglan->prepare("DELETE from  admin where
id =:id


");

//  if ($save) {
//      echo 'bu kısım sorunsuz';
// }

$insert =  $save->execute(array(
    "id" => $id,
    
));


if ($insert) {
    header("Location:../adminler.php");
}
?>