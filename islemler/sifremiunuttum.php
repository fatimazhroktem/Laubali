<?php
 	require_once "../php/baglanti.php";
 	$kBilgi = $sessionManager->kullaniciBilgi();	
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
	  	<h1>ŞİFREMİ UNUTTUM</h1>
	  	<br><br><br><br>
	  	<?php
	  require_once "phpmailer/class.phpmailer.php";
	  	if($_POST){
	  		$email = trim($_POST["email"]);
	  		if(!$email){
	  			echo "Boş alan bırakmayınız";
	  		}

	  		else{
	  			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	  				echo "E-posta formatı yanlış";
	  			}
	  			else{
	  				$varmi = $baglanti->db->prepare("SELECT kullanici_adi,email FROM kullanicilar WHERE email=:e");
	  				$varmi->execute([":e" => $email]);
	  				if($varmi->rowCount()){

	  					$row = $varmi->fetch(PDO::FETCH_ASSOC);

	  					$kod = rand(1,9000)."-".rand(1,9000);
	  					$kodekle = $baglanti->db->prepare("UPDATE kullanicilar SET unuttum = :k WHERE email = :e");
	  					$kodekle->execute([":k" => $kod, ":e" => $email]);

	  					$mail = new PHPMailer();
	  					$mail->Host = "smtp.gmail.com";
	  					$mail->Port = 587;
	  					$mail->SMTPSecure = "tls";
	  					$mail->SMTPAuth = true;
	  					$mail->Username = "laubali1405@gmail.com";
	  					$mail->Password = "1928laubali";
	  					$mail->SetFrom($mail->Username);
	  					$mail->isSMTP();
	  					$mail->addAddress($email);
	  					$mail->From = "laubali1405@gmail.com";
	  					$mail->FromName = "Şifremi Unuttum";
	  					$mail->CharSet = "UTF-8";
	  					$mail->Subject = "Şifremi Sıfırla";
	  					$mailicerik ="<div style='font-size:20px'>Merhaba " .$row["kullanici_adi"].  "<br>
	  					Şifremi Unuttum diyerek buralara kadar geldin, sen daha fazla yorulma diye kodunu şöyle bırakıyorum.<br><br>
	  					 ÖNEMLİ: Kodunuzu bu '-' işaret ile birlikte almalısın, yoksa sistem kabul etmez!!!<br><br>
	  					Sıfırlama Kodunuz: ".$kod. "</div>";
	  					$mail->MsgHTML($mailicerik);
	  					if($mail->Send()){
	  						echo "Sıfırlama linkiniz belirtmiş olduğunuz maile gönderildi.";
	  						 header("Refresh: 1.5; url=unuttum2.php");
	  					}
	  					else{
	  						echo "Hata oluştu!";
	  					}
	  				}
	  				else{
	  					echo "Böyle bir kullanıcı yok!";
	  				}
	  			}
	  		}
	  	}
?>
	  	<div class="textbox">
	  		<i class="fas fa-envelope"></i>
	  		<input type="email" placeholder="Email" name="email" required="required" autofocus="autofocus">
	  	</div>
	  	<input class="btn" type="submit" value="Kod Gönder">
	  </div>
	</form>
</body>
</html> 