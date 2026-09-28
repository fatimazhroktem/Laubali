<?php
require_once "../php/baglanti.php";

if ($sessionManager->kontrol()) {
	sessionManager::sessionSil();
	setcookie("giris","", time()-36000,"/");
	helper::yonlendir("giris.php");
}
else{
	helper::yonlendir("giris.php");
}
?>