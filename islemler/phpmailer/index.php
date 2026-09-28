<?php 

include 'class.phpmailer.php';


$smtpuser="mail adı";
$smtphost="host adı ";
$smtpport="587 bu alan değiştirebilir hosting firmanıza sorun!";
$smtppass="şifre";

if (isset($_POST["mail_gonder"])) {

 $adsoyad = htmlspecialchars($_POST["adsoyad"]);
  $eposta = htmlspecialchars($_POST["eposta"]);
  $konu = htmlspecialchars($_POST["konu"]);
  $mesaj = htmlspecialchars($_POST["mesaj"]);






	
	$epostal=$smtpuser;
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = $smtphost;
	$mail->Port = $smtpport;
	$mail->SMTPSecure = 'tls';
	$mail->Username = $smtpuser;
	$mail->Password = $smtppass;
	$mail->SetFrom($mail->Username, $adsoyad);
	$mail->AddAddress($smtpuser, $adsoyad);

	$mail->CharSet = 'UTF-8';
	$mail->Subject = "Konu Başlığı";
	$content = '
	<b>Websitenizden gelen iletişim maili</b><br>
	<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

		<tr>
			<td class="tg-031e">Ad Soyad: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$adsoyad.'</td>
		</tr>
		<tr>
			<td class="tg-031e">Eposta: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$eposta.'</td>
		</tr>
		<tr>
			<td class="tg-031e">Mesaj: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">'.$mesaj.'</td>
		</tr>
	</table>';





	$mail->MsgHTML($content);
	if($mail->Send()) {
            echo "mail gonderildi";
	
	} 
	else {
            echo "mail gonderilmedi";
	}

}



exit;

?>

