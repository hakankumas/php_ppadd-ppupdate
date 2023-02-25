<?php
include("baglan.php");

if(isset($_POST["resimyukle"])){
    $yukleklasor = "resim/";
    $tmp_name = $_FILES["yukle_resim"]["tmp_name"];
    $name = $_FILES["yukle_resim"]["name"];
    $boyut = $_FILES["yukle_resim"]["size"];
    $tip = $_FILES["yukle_resim"]["type"];
    $uzanti = substr($name,-4,4);
    $rastgelesayi1 = rand(10000,50000);
    $rastgelesayi2 = rand(10000,50000);
    $resimad = $rastgelesayi1.$rastgelesayi2.$uzanti;

if(strlen($name) === 0){
    echo "Bir dosya seçiniz!";
}
if($boyut > (1024*1024*3)){
    echo "Dosya boyutu çok fazla!";
    exit();
}
if($tip != 'image/jpeg' && $tip != 'image/png' && $uzanti != '.jpg'){
    echo "Dosya türü uygun değildir.";
}

move_uploaded_file($tmp_name, "$yukleklasor/$resimad");

// for insert into
$resimsor = $db->prepare("INSERT INTO resim SET resim_ad=:ad");

// update
// $resimsor = $db->prepare("UPDATE resim SET resim_ad=:ad");
$resimyukle = $resimsor->execute(array("ad" =>$resimad));

}

?> 
