<?php
require_once "../php/baglanti.php";

?>

<!DOCTYPE html>
<html lang="tr-TR">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../resimler/icon2.png">
	<link rel="stylesheet" type="text/css" href="../stil/giris-kayıt.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<title>Kayıt-Laubali</title>
	<style type="text/css">
		body {
			background: url("../resimler/anaresimler/giris.jpg") no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
	<form action="" method="post">
		<div class="login-box">
			<h1>KAYIT</h1>
			<br><br><br><br><br>
			<?php

			if ($_POST) {
				$kullanici_adi = strip_tags($_POST["kullanici_adi"]);
				$email = strip_tags($_POST["email"]);
				$sifre = strip_tags($_POST["sifre"]);
				$tekrarsifre = strip_tags($_POST["tekrarsifre"]);
				$dogumgunu = intval($_POST["dogumgunu"]);
				$dogumayi = intval($_POST["dogumayi"]);
				$dogumyili = intval($_POST["dogumyili"]);
				if (
					$kullanici_adi != "" and $email != ""
					and $sifre != "" and $tekrarsifre != ""
				) {
					if ($sifre == $tekrarsifre) {
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$kayit_tarihi = date("d-m-Y");
							$control = $baglanti->db->prepare("SELECT * FROM kullanicilar WHERE :email = $email");
							$control->bindParam(":email", $email, PDO::PARAM_STR);
							$control->execute();
							$sayi = $control->rowCount();
							if ($sayi == 0) {
								$sorgu = $baglanti->db->prepare("INSERT INTO kullanicilar(kullanici_adi,email,sifre,tekrarsifre,dogumgunu,dogumayi,dogumyili,kayit_tarihi)values(?,?,?,?,?,?,?,?)");
								$ekle = $sorgu->execute(array($kullanici_adi, $email, md5($sifre), md5($tekrarsifre), $dogumgunu, $dogumayi, $dogumyili, $kayit_tarihi));
								if ($ekle) {
									$dizi = ["email" => $email, "sifre" => md5($sifre), "tekrarsifre" => md5($tekrarsifre)];
									sessionManager::sessionOlustur($dizi);
									helper::yonlendir("giris.php");
								} else {
									echo "Üzgünüm kayıt olamadın:(";
								}
							} else {
								echo "Bu Kullanıcı Veritabanında Mevcut.";
							}
						} else {
							echo "Email formatı hatalı!";
						}
					} else {
						echo "Şifreler uyuşmuyor!";
					}
				}
			}

			?>
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Kullanıcı Adı" name="kullanici_adi" required="required" autofocus="autofocus">
			</div>
			<div class="textbox">
				<i class="fas fa-envelope"></i>
				<input type="email" placeholder="E-Posta" name="email" required="required">
			</div>


			<div class="textbox field" id="cardBoy">
				<i id="kilit" class="fas fa-lock"></i>
				<input type="password" placeholder="Şifre" name="sifre" required="required">
				<div class="inBody"><i class="far fa-eye" onclick="showHide()"></i></div>
			</div>

			<div class="textbox fieldset" id="cardBoy">
				<i class="fas fa-lock"></i>
				<input type="password" placeholder="Tekrar Şifre" name="tekrarsifre" required="required">
				<div class="twoinBody"><i class="far fa-eye" id="fa-eye2" onclick="hideshow()"></i></div>
			</div>



			<div class="textbox">
				<i class="fas fa-birthday-cake"></i>
				<select class="dogumgunu" name="dogumgunu" required="required">
					<option></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select class="dogumayi" name="dogumayi" required="required">
					<option></option>
					<option value="1">Ocak</option>
					<option value="2">Şubat</option>
					<option value="3">Mart</option>
					<option value="4">Nisan</option>
					<option value="5">Mayıs</option>
					<option value="6">Haziran</option>
					<option value="7">Temmuz</option>
					<option value="8">Ağustos</option>
					<option value="9">Eylül</option>
					<option value="10">Ekim</option>
					<option value="11">Kasım</option>
					<option value="12">Aralık</option>
				</select>
				<select class="dogumyili" name="dogumyili" required="required">
					<option></option>
					<option value="1970">1970</option>
					<option value="1971">1971</option>
					<option value="1972">1972</option>
					<option value="1973">1973</option>
					<option value="1974">1974</option>
					<option value="1975">1975</option>
					<option value="1976">1976</option>
					<option value="1977">1977</option>
					<option value="1978">1978</option>
					<option value="1979">1979</option>
					<option value="1980">1980</option>
					<option value="1981">1981</option>
					<option value="1982">1982</option>
					<option value="1983">1983</option>
					<option value="1984">1984</option>
					<option value="1985">1985</option>
					<option value="1986">1986</option>
					<option value="1987">1987</option>
					<option value="1988">1988</option>
					<option value="1989">1989</option>
					<option value="1990">1990</option>
					<option value="1991">1991</option>
					<option value="1992">1992</option>
					<option value="1993">1993</option>
					<option value="1993">1994</option>
					<option value="1995">1995</option>
					<option value="1996">1996</option>
					<option value="1997">1997</option>
					<option value="1998">1998</option>
					<option value="1999">1999</option>
					<option value="2000">2000</option>
					<option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2006">2006</option>
					<option value="2007">2007</option>
				</select>
			</div>
			<label class="checkbox">
				<input class="btn1" type="checkbox" name="sozlesme" value="true" required="required">
				<a href="../sayfalar/kullanıcısozlesme.html">Kullanıcı Sözleşmesi</a> 'ni okudum ve kabul ediyorum.
			</label>
			<input class="btn" type="submit" value="Kaydol">
			<br>
	</form>
	<div class="kayit">
		<a href="giris.php">Kayıt olduysan...</a>
	</div>
	<script type="text/javascript" src="../js/showHide.js"></script>
</body>

</html>