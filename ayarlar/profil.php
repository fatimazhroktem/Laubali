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
	<div class="title">PROFİL BİLGİLERİMİ DÜZENLE</div>
	<div class="php">
	<?php
	if($_POST){
		$kullanici_adi = strip_tags($_POST["kullanici_adi"]);
		$email = strip_tags($_POST["email"]);
		$dogumgunu = intval($_POST["dogumgunu"]);
		$dogumayi = intval($_POST["dogumayi"]);
		$dogumyili = intval($_POST["dogumyili"]);
		if($kullanici_adi!="" and $email!="") {
			$sorgu =$baglanti->db->prepare("UPDATE kullanicilar SET kullanici_adi = ? , email = ? , dogumgunu = ? , dogumayi = ? , dogumyili = ?  WHERE id = ?");
			$calistir = $sorgu->execute(array($kullanici_adi,$email,$dogumgunu,$dogumayi,$dogumyili,$kBilgi["id"]));
			if($calistir){
				helper::yonlendir('?');
			}
			else {
				echo "Kullanıcı bilgileri düzenlenemedi";
			}
		}
		else{
			echo "Lütfen Bilgileri Kontrol Et.";
		}
	}
	?></div>
	<table>
	<form action="" method="post">
		<tr><div class="form">
			<td><span>Kullanıcı Adı:</span></td>
			<td><input type="text" name="kullanici_adi" value=<?php echo $kBilgi["kullanici_adi"]; ?>>
		</div></td></tr>
		<tr><div class="form">
			<td><span>Email:</span></td>
			<td><input type="text" name="email" value=<?php echo $kBilgi["email"]; ?>>
		</div></td></tr>
		<tr><div class="form">
			<td><span>Doğum Tarihi:</span></td>
			<td><select class="dogumgunu" name="dogumgunu" value=<?php echo $kBilgi["dogumgunu"];?>>
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
	  		<select class="dogumayi" name="dogumayi" value=<?php echo $kBilgi["dogumayi"];?>>
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
	  		<select class="dogumyili" name="dogumyili" value=<?php echo $kBilgi["dogumyili"];?>>
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
		</div></td></tr></table><br>
		<p class="uyarı">UYARI:"Email bölümünü düzenlerken beni hatırla dememiş olmanız lazım."</p>
	<div class="form">
		<input class="btn" type="submit" value="Gönder">
	</div>
	</form><br><br>
	<a class="alink" href="ayarlar.php">Ayarlara Geri Dön</a>
</body>
</html>