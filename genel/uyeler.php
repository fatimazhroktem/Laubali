<?php
require_once "../php/baglanti.php";
if(!$sessionManager->kontrol()){
	helper::yonlendir("../islemler/giris.php");
	die();
	}
$kBilgi = $sessionManager->kullaniciBilgi();	
$kullaniciLog->start($kBilgi["id"]);
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Üyeler-Laubali</title>
<link rel="icon" type="image/png" href="../resimler/anaresimler/icon2.png">
<link rel="stylesheet" type="text/css" href="../stil/stil.css">
<link rel="stylesheet" type="text/css" href="../stil/menu.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<style type="text/css">
		body{
			background:url("../resimler/anaresimler/giris.jpg") no-repeat;
				background-size: cover;
				background-attachment: fixed;
		}
		</style>
	</head>
	<body>
<div class="online">
	<i class="far fa-user-circle fa-2x"></i>
<?php

$sorgu = $baglanti->db->prepare("SELECT *FROM kullanicilar");
$sorgu->execute();
$cek = $sorgu->fetchAll(PDO::FETCH_ASSOC);
if(count($cek) !=0){
	foreach ($cek as $key => $value) {
		echo '<div class="list1"><a href="../profil/index.php?id='.$value["id"].'">'.$value["id"].'-'.$value["kullanici_adi"].'</a></div>';
	}
}
?>
</div><br> 
<a id="dön" href="../sayfalar/blog.php">Panele Geri Dön</a>
</body>
</html>