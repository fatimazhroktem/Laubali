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
<title>Online Üyeler-Laubali</title>
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
	
	</style>
	<i class="far fa-user-circle fa-2x"></i>
<?php
$date1 = date("d-m-Y/H:i");
 		$date2 = date("dmYHi")-1;
 		$date3 = date("dmYHi")-2;
$sorgu = $baglanti->db->prepare("SELECT *FROM kullanicilar Where online IN(?,?,?)");
$sorgu->execute(array($date1,$date2,$date3));
$cek = $sorgu->fetchAll(PDO::FETCH_ASSOC);
if(count($cek) !=0){
	foreach ($cek as $key => $value) {
		echo '<div class="list">'.$value["id"].'-'.$value["kullanici_adi"].'</div>';
	}
}
?>
</div><br> 
<a id="dön" href="../sayfalar/blog.php">Panele Geri Dön</a>
</body>
</html>