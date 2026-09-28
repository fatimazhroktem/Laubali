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
<meta name="description" content="Laubali bir blog sitesidir. İçinde üyelik sistemide barındırır. Kişisel gelişim,seyahat,öneriler ve incelemeler gibi konuları vardır." >
<meta name="author" content="Fatima Zehra Öktem">
<meta name="keywords" content="tartışma,sohbet,yorum,blog,üye,üyelik,site,laubali">
<title>Laubali</title>
<link rel="icon" type="image/png" href="../resimler/anaresimler/icon2.png">
<link rel="stylesheet" type="text/css" href="../stil/darkmode.css">
<link rel="stylesheet" type="text/css" href="../stil/menu.css">
<link rel="stylesheet" type="text/css" href="../stil/stil.css">
<link rel="stylesheet" type="text/css" href="../css/all.css">
<link rel="stylesheet" type="text/css" href="../stil/LogOutButton.css">
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jura:wght@700&display=swap" rel="stylesheet">
<style type="text/css">
	#gor1{
		background-image: url("../resimler/anaresimler/laubali.jpg");
	}
</style>
</head>
<body>
	<header>
	<div class="gorsel" id="gor1">
			<input type="checkbox" id="chk">
			<label for="chk">
				<i class="fas fa-bars fa-2x"></i>
			</label>
			<nav class="menu">
		<ul>
<li><a href="kişiselgelisim.html">Kişisel Gelişim</a></li>
<li><a href="seyahatler.html">Seyahatler</a></li>
<li><a href="öneriler.html">Öneriler</a></li>
<li><a href="incelemeler.html">İncelemeler</a></li>
<li><a href="sözler.html">Özlü Sözler</a></li>
<li><a href="bizitanıyın.html">Bizi Tanıyın</a></li>
<li><a href="ulasmakicin.html">Ulaşmak İçin</a></li>
</ul>
</nav>
	<input type="checkbox" id="ana">
	<label class="ana" for="ana">
		<i class="fas fa-tasks fa-2x"></i>
	</label>
	<div class="settingsall">
<div class="settings">
	<!--AYARLAR-->
	<a class="ayar" href="../ayarlar/ayarlar.php">Ayarlar<i class="fas fa-sliders-h"></i></a>
	<!--ONLİNE ÜYELER-->
	<a class="onlineuyeler" href="../genel/onlineuyeler.php">Online Üyeler<i class="fas fa-signal"></i></a>
	<!--ÜYELER-->
	<a  href="../genel/uyeler.php">Üyeler<i class="far fa-user-circle"></i></a>	
	<!--MESAJLARIM-->
	<a href="../mesajlar/index.php">Mesajlarım<i class="fas fa-comments"></i></a>
</div>
</div>
</header>
	<div class="motto">
		
			</div><br>
			<div class="kullanicionline">
			<?php
			if($kullaniciLog->isOnline($kBilgi["id"])){
			echo "Kullanıcı Online";
			}
			else{
			echo "Kullanıcı Offline";
			}
			?></div>
			<div class="phptitle animationwriter">Hoşgeldin <?php echo $kBilgi["kullanici_adi"];?></div>
			<?php if($kBilgi["resim"]!=""){?>
			
			<div class="info"><img class="profil" width="75px" height="85px" src="../upload/<?=$kBilgi["id"];?>/<?php echo $kBilgi["resim"];?>" ></div><br><br><br><br>
		<?php }?>

	
			<div id="blogbackground" class="background background--light">
				<button class="logoutButton logoutButton--dark">
					<svg class="doorway" viewBox="0 0 100 100">
						<path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9
						1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z"/>
						<path class="bang" d="M40.5 43.7L26.6 31.4l-2.5 6.7zM41.9
						50.4l-19.5-4-1.4 6.3zM40 57.4l-17.7 3.9 3.9 5.7z"/>
					</svg>
					<svg class="figure" viewBox="0 0 100 100">
						<circle cx="52.1" cy="32.4" r="6.4"/>
						<path d="M50.7 62.8c-1.2 2.5-3.6 5-7.2 4-3.2-.9-4.9-3.5-4-7.8.7-3.4
						3.1-13.8 4.1-15.8 1.7-3.4 1.6-4.6 7-3.7 4.3.7 4.6 2.5 4.3 5.4-.4 3.7-2.8
						15.1-4.2 17.9z"/>
						<g class="arm1">
							<path d="M55.5 56.5l-6-9.5c-1-1.5-.6-3.5.9-4.4 1.5-1 3.7-1.1
							4.6.4l6.1 10c1 1.5.3 3.5-1.1 4.4-1.5.9-3.5.5-4.5-.9z"/>
							<path class="wrist1" d="M69.4 59.9L58.1 58c-1.7-.3-2.9-1.9-2.6-3.7.3-1.7
							1.9-2.9 3.7-2.6l11.4 1.9c1.7.3 2.9 1.9 2.6 3.7-.4 1.7-2 2.9-3.8 2.6z"/>
						</g>
						<g class="arm2">
							<path d="M34.2 43.6L45 40.3c1.7-.6 3.5.3 4 2 .6 1.7-.3 4-2 4.5l-10.8
							2.8c-1.7.6-3.5-.3-4-2-.6-1.6.3-3.4 2-4z"/>
							<path class="wrist2" d="M27.1 56.2L32 45.7c.7-1.6 2.6-2.3 4.2-1.6
						1.6.7 2.3 2.6 1.6 4.2L33 58.8c-.7 1.6-2.6 2.3-4.2 1.6-1.7-.7-2.4-2.6-1.7-4.2z"/>
						</g>
						<g class="leg1">
							<path d="M52.1 73.2s-7-5.7-7.9-6.5c-.9-.9-1.2-3.5-.1-4.9 1.1-1.4
							3.8-1.9 5.2-.9l7.9 7c1.4 1.1 1.7 3.5.7 4.9-1.1 1.4-4.4 1.5-5.8.4z"/>
							<path class="calf1" d="M52.6 84.4l-1-12.8c-.1-1.9 1.5-3.6 3.5-3.7
							2-.1 3.7 1.4 3.8 3.4l1 12.8c.1 1.9-1.5 3.6-3.5 3.7-2 0-3.7-1.5-3.8-3.4z"/>
						</g>
						<g class="leg2">
							<path d="M37.8 72.7s1.3-10.2 1.6-11.4 2.4-2.8 4.1-2.6c1.7.2 3.6
							2.3 3.4 4l-1.8 11.1c-.2 1.7-1.7 3.3-3.4 3.1-1.8-.2-4.1-2.4-3.9-4.2z"/>
							<path class="calf2" d="M29.5 82.3l9.6-10.9c1.3-1.4 3.6-1.5 5.1-.1
							1.5 1.4.4 4.9-.9 6.3l-8.5 9.6c-1.3 1.4-3.6 1.5-5.1.1-1.4-1.3-1.5-3.5-.2-5z"/>
						</g>
					</svg>
					<svg class="door" viewBox="0 0 100 100">
						<path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4
						3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z"/>
						<circle cx="66" cy="50" r="3.7"/>
					</svg>
					<span class="button-text"><a href="../islemler/cıkıs.php" id="go" title="Log Out" onclick="return ShowConfirm()">Çıkış Yap</a></span>
				</button>
			</div>
<br><br><br><br><br>
			<label class="mode-control">
	<input id="mode-btn" type="checkbox">
	<span>Koyu Mod</span>
	<span>Açık Mod</span>
</label><br><br>
<lottie-player src="https://assets4.lottiefiles.com/packages/lf20_q4h79bkv.json"  background="transparent"  speed="1"  style="width: 300px; height: 200px;"  loop  autoplay></lottie-player>
	<?php
	$query = $baglanti->db->prepare("SELECT * from sorular
		Inner join kullanicilar on kullanicilar.id = sorular.soru_ekleyen order by soru_id desc
		");
	$query->execute();
	$liste = $query->fetchAll(PDO::FETCH_ASSOC);
	$kontrol = $query->rowCount();
	if($kontrol){
		foreach ($liste as $row) {
			?>



			<div class="yorum">
		<table>
		<tr><td><span><?php echo $row["soru_baslik"];  ?></span></td>
			<td><a class="php" href="../soru/devam.php/?do=devam&link=<?php echo $row["soru_sef"];?>">Cevapların Tamamı &rarr;</a></td></tr>

			<tr><td><br><br>
				<div class="user">
					<div class="zaman">
				<i class="far fa-clock"></i>
			<?php 
			$zaman = explode(" ", $row["soru_tarih"]);
			echo $zaman[0]." Saat:".$zaman[1];
			 ?></div></td>
			 <td>	<br><br>
			 	<p><i class="far fa-user"></i>&nbsp;&nbsp;<?php echo $row["kullanici_adi"]; ?></p>
			 	<p><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;Görüntülenme: <?php echo $row["soru_hit"]; ?></p>
			 </div></td></tr>
	</table><br><hr><br>
	</div>
	<div class="classes">
		<a href="../ozel/eski.php">Eskiler</a>
		<a href="../ozel/ozel.php">Özel</a>
		<img id="bir" src="../resimler/start.jpg">
		<img id="iki" src="../resimler/now.jpg">
	</div>
			
			<?php
		}
	}
	else{
		echo "Henüz hiç konu eklenmemiş.";
	}
	?>
<?php 
	$do = @g("do");
		
		switch($do){
					
				case 'etiket':
				require_once("../soru/etiket.php");
				break;

				case "devam":
				if(g("link")){
			require_once("../../soru/devam.php");
		}
		else{
			echo "Sayfa Bulunamadı!";
		}
				break;  
				
				default: 

				break;
			}
			 ?>
		<br><mark title="Laubali gururla sunar...">Laubali &copy Tüm hakları saklıdır.</mark><br><br>
		<img class="logo" title="İki Yayın Kesişimi" src="../resimler/anaresimler/logom.jpg" height="150px" weight="100px">	
		<script src="../js/script.js"></script>
		<script src="../js/LogOutButton.js"></script>
		<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
</html>