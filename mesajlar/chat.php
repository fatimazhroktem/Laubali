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
	<title>Mesajlarım-Laubali</title>
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
$id = intval($_GET['id']);
$sonuc = $mesajClass->kontrol($id);
if($sonuc == 0){
	helper::yonlendir(SITE_URL);
}
else{

	/*
		Kullanıcı Veri Gönderme
	*/
		if($_POST){
			$mesaj = strip_tags($_POST["mesaj"]);
			$gonder = $mesajClass->gonder($kBilgi["id"],$id,$mesaj);
			if($gonder){
				helper::yonlendir("?id=".$id);
			}
			else{
				echo "Mesaj gönderilemedi";
			}
		}


	$bilgi = $mesajClass->bilgi($id);
	$user_id = $mesajClass->userBul([$kBilgi["id"],$bilgi["gonderen_id"],$bilgi["alan_id"]]);
	$userBilgi = $kullaniciLog->kullaniciBilgi($user_id);
	echo '<div class="title">'.$userBilgi["kullanici_adi"].'</div>';
	$cek = $baglanti->db->prepare("SELECT * from mesajlar_ic where mesaj_id = :id");
	$cek->bindParam(":id",$id,PDO::PARAM_INT);
	$cek->execute();
	$veriler = $cek->fetchAll();
	foreach ($veriler as $key => $value) {
		$userBilgi2 = $kullaniciLog->kullaniciBilgi($value["gonderen_id"]);
		echo '<div class="list"><span>'.$userBilgi2["kullanici_adi"].'</span><br><br>'
		.$value["mesaj"].'</div>';
	}
}
?>

<form action="" method="post">
	<div class="form">
		<span>Mesajınız:</span>
		<textarea name="mesaj" id="" cols="50" rows="3"></textarea>
	</div>
	<div class="form">
		<button>Gönder</button>
	</div>
</form>
<div class="genel">
<a href="../genel/uyeler.php">Üyeler Bölümüne Geri Dön</a>
<a href="../sayfalar/blog.php">Panele Geri Dön</a>
</div>	
</body>
</html>