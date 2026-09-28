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
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../stil/stil.css">
	<link rel="icon" type="../image/png" href="../resimler/icon2.png">
	<title>Ayarlar-Laubali</title>
	<style>
	body{
			background:url("../resimler/anaresimler/giris.jpg") no-repeat;
				background-size: cover;
				background-attachment: fixed;
		}
	</style>
</head>
<body>
	<div class="title">AYARLAR</div>
	<ul>
	<li><a class="link" href="profil.php"><li>Profil Bilgileri</a></li>
	<li><a class="link" href="sifre.php">Şifremi Değiştir</a></li>
	<li><a class="link" href="resim.php">Profil Fotoğrafımı Değiştir</a></li>
	<li><a class="link" href="../sayfalar/blog.php">Panele Geri Dön</a></li>
</ul>
</body>
</html>