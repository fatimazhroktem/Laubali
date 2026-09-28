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
$id = intval($_GET['id']);

$sorgu = $baglanti->db->prepare("SELECT * FROM kullanicilar WHERE id = :id");
$sorgu->bindParam(":id",$id,PDO::PARAM_INT);
$sorgu->execute();
$sonuc = $sorgu->rowCount();
if($sonuc == 0){
	helper::yonlendir("../islemler/giris.php");
}
else{
	$bilgiler = $kullaniciLog->kullaniciBilgi($id);
	?>
	<div class="title"><?=$bilgiler["kullanici_adi"];?></div>
	<div class="pp">
	<?php
	if($bilgiler["resim"]!=""){
		echo '<div class="uyeresim"><img class="profil" width="75px" height="75px" src="../upload/'.$bilgiler["id"].'/'.$bilgiler["resim"].'"></div>';
	}?></div>
	<div class="kayit_tarihi"><p>Kayıt Tarihi: <?=$bilgiler["kayit_tarihi"];?></p></div>;
	<div class="dogum_tarihi"><p>Doğum Tarihi: <?=$bilgiler["dogumgunu"]?>-<?=$bilgiler["dogumayi"]?>-<?=$bilgiler["dogumyili"];?></p></div>;
	<?php
}
?>
<div class="genel">
<a href="../genel/uyeler.php">Üyeler Bölümüne Geri Dön</a>
<a href="../sayfalar/blog.php">Panele Geri Dön</a>
<?php
if($bilgiler["id"] != $kBilgi["id"])
{
?>
<a href="../mesajlar/olustur.php?id=<?=$bilgiler["id"];?>">Mesaj Başlat</a>
</div>	
<?php
}
?>
</body>
</html>