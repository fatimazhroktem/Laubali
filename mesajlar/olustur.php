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
<div class="php">
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
if($sonuc == 0 or $kBilgi["id"] == $id){
	helper::yonlendir(SITE_URL);
}
else{
	if($_POST){
		 $mesaj = strip_tags($_POST["mesaj"]);
		if($mesaj!=""){
			$control = $baglanti->db->prepare("SELECT * FROM mesajlar where (gonderen_id = ? and alan_id = ?) or (gonderen_id = ? and alan_id = ?)");
			$control->execute(array($kBilgi["id"],$id,$id,$kBilgi["id"]));
			 $sonuc = $control->rowCount();
			if($sonuc == 0){
				$sorgu = $baglanti->db->prepare("INSERT INTO mesajlar(gonderen_id,alan_id,tarih)values(?,?,?)");
				$ekleme = $sorgu->execute(array($kBilgi["id"],$id,date("Y-m-d")));
				if($ekleme){
					$last_id = $baglanti->db->lastInsertId();
					$sorgu2 = $baglanti->db->prepare("INSERT INTO mesajlar_ic(mesaj_id,gonderen_id,mesaj,tarih,time)values(?,?,?,?,?)");
					$sorgu2->execute(array($last_id,$kBilgi["id"],$mesaj,date("Y-m-d"),time()));
					helper::yonlendir("chat.php?id=".$last_id);
				}
				else{
					echo "Gönderilemedi!";
				}
			}
			else{
			$control = $baglanti->db->prepare("SELECT * FROM mesajlar where (gonderen_id = ? and alan_id = ?) or (gonderen_id = ? and alan_id = ?)");
			$control->execute(array($kBilgi["id"],$id,$id,$kBilgi["id"]));
			$sonuc = $control->fetch();
			$sorgu2 = $baglanti->db->prepare("INSERT INTO mesajlar_ic(mesaj_id,gonderen_id,mesaj,tarih,time)values(?,?,?,?,?)");
				$sorgu2->execute(array($sonuc["id"],$kBilgi["id"],$mesaj,date("Y-m-d"),time()));
					echo helper::yonlendir("chat.php?id=".$sonuc["id"]);
			}
		}
		else{
			echo "Lütfen mesajınızı girin.";
		}
	}
?></div>
<form action="" method="post">
	<div class="form">
		<span>Mesajınız:</span>
		<textarea name="mesaj" id="" cols="50" rows="3"></textarea>
	</div>
	<div class="form">
		<button>Gönder</button>
	</div>
</form>


<?php	
}
?>
</body>
</html>