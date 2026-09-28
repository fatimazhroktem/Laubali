<?php
 class kullanicilog extends baglanti{
 	public function start($id = 0){
 		if($id !=0){
 		$requestUrl = $_SERVER["REQUEST_URI"];
 		$tarih = date("d-m-Y");
 		$time = time();
 		$sorgu = $this->db->prepare("INSERT into log(kullanici_id,nerede,tarih,time)values(?,?,?,?)");
 		$sorgu->execute(array($id,$requestUrl,$tarih,$time));
 		}
 	}
 	public function onlineSet($array){
 		if($array!=false){
 		$online = date("d-m-Y/H:i");
 		$sorgu = $this->db->prepare("UPDATE kullanicilar set online = ? where id = ?");
 		$sorgu->execute(array($online, $array["id"]));
 	}
 	}
 	public function isOnline($id){
 		$date1 = date("d-m-Y/H:i");
 		$date2 = date("dmYHi")-1;
 		$date3 = date("dmYHi")-2;
 		$dizi = [$date1,$date2,$date3];
 		$sorgu = $this->db->prepare("SELECT * from kullanicilar where id = :id");
 		$sorgu->bindParam(":id",$id,PDO::PARAM_INT);
 		$sorgu->execute();
 		$cek = $sorgu->fetch(PDO::FETCH_ASSOC);
 		if(in_array($cek["online"],$dizi)){
 			return true;
 		}
 		else{
 			return false;
 		}
 	}
 	public function kullaniciBilgi($id){
 		$sorgu = $this->db->prepare("SELECT * FROM kullanicilar where id = :id");
 		$sorgu->bindParam(":id",$id,PDO::PARAM_INT);
 		$sorgu->execute();
 		return $sorgu->fetch(PDO::FETCH_ASSOC);
 	}
 }
?>