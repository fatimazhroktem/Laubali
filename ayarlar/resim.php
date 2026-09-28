<?php
error_reporting(0);
require_once "../php/baglanti.php";
if(!$sessionManager->kontrol()){
	helper::yonlendir("../islemler/giris.php");
	die();
	}
$kBilgi = $sessionManager->kullaniciBilgi();
$kullaniciLog->start($kBilgi["id"]);
require_once "../php/class.upload.php";
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
	<div class="title">PROFİL FOTOĞRAFIMI DEĞİŞTİR</div>
	<div class="php"><?php
	if($_FILES){
		$image = $_FILES["image"];
		if($image["name"]!=""){
			$foo = new upload($image); 
			if ($foo->uploaded) {
				$foo->file_new_name_body = 'profil';
				$foo->allowed = array("image/*");
				$foo->file_max_size = "404800";
				$foo->Process('../upload/'.$kBilgi["id"]);
				 if ($foo->processed){
				 	$isim = $foo->file_dst_name;
				 	$sorgu = $baglanti->db->prepare("UPDATE kullanicilar SET resim = ? WHERE id = ?");
				 	$calistir = $sorgu->execute(array($isim,$kBilgi["id"]));
				 	if($calistir){
				 		echo "Profil resmi güncellendi. ";
				 	}
				 	else{
				 		echo "Profil resmi güncellenemedi! ";
				 	}
				 	echo "Dosya başarılı şekilde eklendi";
				 }
				 else{
				 	echo "Dosya eklenemedi.";
				 }
			}
		}
		else{
			echo "Lütfen resim seçiniz!";
		}
	}
	?></div>
	<table>
	<form action="" method="post" enctype="multipart/form-data">
		<tr><div class="form">
			<td><span>Resim:</span></td>
			<td><input type="file" name="image">
		</div></td></tr>
</table>
	<div class="form">
		<input class="btn" type="submit" value="Gönder">
	</div>
	</form><br><br>

	<a class="alink" href="ayarlar.php">Ayarlara Geri Dön</a>;
</body>
</html>