<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta http-equiv="content-type" content="text/html;  charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../stil/stil.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<link rel="icon" type="image/png" href="../resimler/anaresimler/icon2.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
	<title>Üyeler-Laubali</title>
	<style type="text/css">
		body{
			background:url("../resimler/anaresimler/giris.jpg") no-repeat;
				background-size: cover;
				background-attachment: fixed;
		}
	</style>
</head>
<body>

<?php
require_once "../php/baglanti.php";
if(!$sessionManager->kontrol()){
	helper::yonlendir("../islemler/giris.php");
	die();
	}
$kBilgi = $sessionManager->kullaniciBilgi();	
$kullaniciLog->start($kBilgi["id"]);

	?>
	<div class="title">Mesajlarım</div>
	<div class="php mesaj">
	<?php
	$sorgu = $baglanti->db->prepare("SELECT * FROM mesajlar where gonderen_id = ? or alan_id = ?");
	$sorgu->execute(array($kBilgi["id"],$kBilgi["id"]));
	$sonuc = $sorgu->fetchAll();
	if(count($sonuc)!=0){
		foreach ($sonuc as $key => $value) {
			$user_id = $mesajClass->userBul([$kBilgi["id"],$value["gonderen_id"],$value["alan_id"]]);
			$cek = $kullaniciLog->kullaniciBilgi($user_id);
			echo '<div class="list"><i class="fas fa-location-arrow"></i><a class="arrow" href="chat.php?id='.$value["id"].'">'.$cek["kullanici_adi"].'</a></div>';
		}
	}
	else{
		echo "Mesaj kutunuz boş.";
	}
	?></div>

<div class="genel">
<a href="../genel/uyeler.php">Üyeler Bölümüne Geri Dön</a>
<a href="../sayfalar/blog.php">Panele Geri Dön</a>
</div>	
</body>
</html>