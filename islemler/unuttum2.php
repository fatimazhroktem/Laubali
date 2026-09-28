<?php
 	require_once "../php/baglanti.php";
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../resimler/icon2.png">
	<link rel="stylesheet" type="text/css" href="../stil/giris-kayıt.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<title>Giriş-Laubali</title>
	<style type="text/css">
		body{
			background:url("../resimler/anaresimler/giris.jpg") no-repeat;
				background-size: cover;
				background-attachment: fixed;
		}
	</style>
</head>
<body>
	<form action="" method="post">
	  <div class="login-box">
	  	<h1>ŞİFREMİ UNUTTUM 2. adım</h1>
	  	<br><br><br><br>
	  	<?php
	  	if($_POST){
	  		$email = strip_tags($_POST["email"]);
	  		$sifre = strip_tags($_POST["sifre"]);
	  		$tekrarsifre = strip_tags($_POST["tekrarsifre"]);
	  		$kod = strip_tags($_POST["kod"]);
	  		if($email!="" and $sifre!="" and $tekrarsifre!="" and $kod!=""){
	  			if($sifre == $tekrarsifre){
	  				$control = $baglanti->db->prepare("SELECT * FROM kullanicilar WHERE unuttum = ? and email = ?");
	  				$control->execute(array($kod,$email));
	  				$sonuc = $control->rowCount();
	  				if($sonuc!=0){
	  					$sorgu = $baglanti->db->prepare("UPDATE kullanicilar set sifre = ? , tekrarsifre = ? , unuttum = ? where email = ?");
	  					$calistir = $sorgu->execute(array(md5($sifre),md5($tekrarsifre), "",$email));
	  					if($calistir){
	  						echo "Şifreniz başarılı bir şekilde değişti.";
	  						header("Refresh: 1.5; url=giris.php");
	  					}
	  					else{
	  						echo "Şifre değiştirilemedi.";
	  					}
	  				}
	  				else{
	  					echo "Kodunuz veya mailiniz yanlış!";
	  				}
	  			}
	  			else{
	  				echo "Yeni şifreler uyuşmuyor!";
	  			}
	  		}
	  		else{
	  			echo "Lütfen tüm alanları doldur";
	  		}
	  	}
	  	?>
	  	<div class="textbox">
	  		<i class="fas fa-envelope"></i>
	  		<input type="email" placeholder="Email" name="email" required="required" autofocus="autofocus">
	  	</div>
	  	<div class="textbox">
	  		<i class="fas fa-code"></i>
	  		<input type="text" placeholder="Kod" name="kod" required="required" autofocus="autofocus"></div>
	  		<div class="textbox field" id="cardBoy">
	  		<i class="fas fa-lock"></i>
	  		<input type="password" placeholder="Yeni Şifre" name="sifre" required="required" autofocus="autofocus">
	  		<div class="inBody"><i class="far fa-eye" onclick="showHide()"></i></div>
	  	</div>
	  	<div class="textbox fieldset" id="cardBoy">
	  		<i class="fas fa-lock"></i>
	  		<input type="password" placeholder="Yeni Tekrar Şifre" name="tekrarsifre" required="required" autofocus="autofocus">
	  		<div class="inBody"><i class="far fa-eye" onclick="hideshow()"></i></div>
	  	</div>
	  	<input class="btn" type="submit" value="Gönder">
	  </div>
	</form>
	<script type="text/javascript" src="../js/showHide.js"></script>
</body>
</html>