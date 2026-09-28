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
	  	<h1>GİRİŞ</h1>
	  	<br><br><br><br>
	  	<?php
	  	if (isset($_COOKIE["giris"])){
	  		$json = json_decode($_COOKIE["giris"],true);
	  		sessionManager::sessionOlustur($json);
	  		helper::yonlendir(SITE_URL);
	  	}


	  	if($_POST){
	  		$hatirla = @intval($_POST["hatirla"]);
	  		$email = strip_tags($_POST["email"]);
	  		$sifre = strip_tags($_POST["sifre"]);
	  		if($email!="" and $sifre!=""){
	  			$sifre = md5($sifre);
	  			$sorgu = $baglanti->db->prepare("SELECT * FROM kullanicilar WHERE email = :email and sifre = :sifre");
	  			$sorgu->bindParam(":email",$email, PDO::PARAM_STR);
	  			$sorgu->bindParam(":sifre",$sifre, PDO::PARAM_STR);
	  			$sorgu->execute();
	  			$sayi = $sorgu->rowCount();
	  			if($sayi == 0){
	  				echo "Bu bilgilere göre kullanıcı yok!";
	  			}
	  			else{
	  				if($hatirla == 1){
	  					$cookieArray = array("email"=>$email,"sifre"=>$sifre);
	  					$cookieArray = json_encode($cookieArray);
	  					setcookie("giris", $cookieArray, time()+36000,"/");
	  				}

	  				sessionManager::sessionOlustur(array("email"=>$email,"sifre"=>$sifre));
	  					helper::yonlendir(SITE_URL);
	  			}
	  		}
	  		else{
	  			echo "Lütfen tüm alanları doldur!";
	  		}
	  	}

	  	?>
	  	<div class="textbox">
	  		<i class="fas fa-envelope"></i>
	  		<input type="email" placeholder="Email" name="email" required="required" autofocus="autofocus">
	  	</div>
	  	<div class="textbox field" id="cardBoy">
	  		<i class="fas fa-lock"></i>
	  		<input type="password" placeholder="Şifre" name="sifre" required="required">
	  			<div class="inBody"><i class="far fa-eye" onclick="showHide()"></i></div>
	  	</div>
	  	<label class="checkbox">
	  	<input class="btn1" type="checkbox" name="hatirla" value="1">
	  	<p>Beni Hatırla!</p>
	  	</label><br>
	  	<input class="btn" type="submit" value="Oturum Aç">
	  	<br><br>
	  	<div class="sifre">
		<a href="sifremiunuttum.php">Şifremi unuttum</a>
		</div>
		<div class="kayit">
			<a href="kayıt.php">Kayıt olmadıysan...</a>
		</div>
	  </div>
	</form>
	<script type="text/javascript" src="../js/showHide.js"></script>
</body>
</html>