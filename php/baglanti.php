<?php
session_start();
class baglanti{
	public $db;
	function  __construct(){
		$this->db = new PDO("mysql:host=localhost;dbname=uyelik;charset=utf8", "root", "");
	}
}
date_default_timezone_set("Europe/Istanbul");
define("SITE_URL","../sayfalar/blog.php");
require_once "sessionManager.php";
require_once "helper.php";
require_once "kullaniciLog.php";
require_once "mesajlar.php";
$baglanti = new baglanti();
$sessionManager = new sessionManager();
$kullaniciLog = new kullanicilog();
$kullaniciLog->onlineSet($sessionManager->kullaniciBilgi());
$mesajClass = new mesajlar();
function g($par) {
		return $_GET[$par];
	}	
?>