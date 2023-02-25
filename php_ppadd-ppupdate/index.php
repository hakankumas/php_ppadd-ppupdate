<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Working</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="yukle_resim">
        <input type="submit" value="Yükle" name="resimyukle">
    </form>
</body>
</html>
<br>
<?php
include("islem.php");
$resimsor = $db->prepare("SELECT * FROM resim");
$resimsor -> execute(array());
$resimfet = $resimsor->fetchAll(PDO::FETCH_ASSOC);

foreach ($resimfet as $resimcek) {?>
    <img style="width:100px; height:100px; border-radius: 100px;" src="resim/<?php echo $resimcek["resim_ad"]; ?>">

<?php } ?>