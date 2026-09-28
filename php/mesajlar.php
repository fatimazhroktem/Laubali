<?php
class mesajlar extends baglanti{
	public function userBul($array = []){
		if($array[1]==$array[0]){
			$user_id = $array[2];
		}
		else{
		$user_id = $array[1];
			}
			return $user_id;
	}
	public function kontrol($id){
		$kontrol = $this->db->prepare("SELECT * FROM mesajlar where id = :id");
		$kontrol->bindParam(":id",$id,PDO::PARAM_INT);
		$kontrol->execute();
		return $kontrol->rowCount();
	}
	public function bilgi($id){
		$kontrol = $this->db->prepare("SELECT * FROM mesajlar where id = :id");
		$kontrol->bindParam(":id",$id,PDO::PARAM_INT);
		$kontrol->execute();
		return $kontrol->fetch(PDO::FETCH_ASSOC);
	}
	public function gonder($gonderen_id,$mesaj_id,$mesaj){
		$gonder = $this->db->prepare("INSERT into mesajlar_ic(mesaj_id,gonderen_id,mesaj,tarih,time)values(?,?,?,?,?)");
		$sonuc = $gonder->execute(array($mesaj_id,$gonderen_id,$mesaj,date("Y-m-d"),time()));
		if($sonuc){
			return true;
		}
		else{
			return false;
		}
	}
}

?>