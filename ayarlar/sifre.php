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
	<div class="title">ŞİFREMİ DEĞİŞTİR</div>
	<div class="php"><?php
	if($_POST){
		$sifre = strip_tags($_POST["sifre"]);
		$yenisifre = strip_tags($_POST["yenisifre"]);
		$yenisifretekrar = strip_tags($_POST["yenisifretekrar"]);
		if($sifre!="" and $yenisifre!="" and $yenisifretekrar!="");
			if($yenisifre == $yenisifretekrar){
				if($kBilgi["sifre"] == md5($sifre)){
					$sorgu = $baglanti->db->prepare("UPDATE kullanicilar set sifre = ? , tekrarsifre = ?WHERE id = ?");
					$calistir = $sorgu->execute(array(md5($yenisifre),md5($yenisifretekrar) ,$kBilgi["id"]));
					if($calistir){
						sessionManager::sessionOlustur(array("email"=>$kBilgi["email"],"sifre"=>md5($yenisifre),"tekrarsifre"=>md5($yenisifretekrar)));
						echo "Bilgiler başarılı bir şekilde değişti.";
					}
					else{
						echo "Bilgiler değiştirilemedi.";
					}
				}
				else{
					echo "Mevcut şifre hatalı!";
				}
			}
		else{
			echo "Şifreler uyuşmuyor!";
		}
	}
	else{
		echo "Lütfen tüm alanları kontrol et!";
	}
	?></div>
	<table>
	<form action="" method="post">
		<tr><div class="form">
			<td><span>Mevcut Şifre:</span></td>
			<td><input type="text" name="sifre">
		</div></td></tr>
		<tr><div class="form">
			<td><span>Yeni Şifre:</span></td>
			<td><input type="text" name="yenisifre">
		</div></td></tr>
		<tr><div class="form">
			<td><span>Yeni Şifre Tekrar:</span></td>
			<td><input type="text" name="yenisifretekrar">
		</div></td></tr>
</table>
	<div class="form">
		<input class="btn" type="submit" value="Gönder">
	</div>
	</form><br><br>

	<a class="alink" href="ayarlar.php">Ayarlara Geri Dön</a>;
</body>
</html>