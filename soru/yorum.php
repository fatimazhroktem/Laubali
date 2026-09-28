 <?php
error_reporting (E_ALL ^ E_NOTICE);
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("DB", "uyelik");
	$conn = mysqli_connect(HOST,USER,PASS,DB) or die("Bilgilerde hata var!");
	mysqli_set_charset($conn, "UTF8");

	


	$username = $_POST["username"];
	$comment = $_POST["comment"];
	$puan = $_POST["puan"];
	$post_id = 1;
	if( isset($username) && isset($comment) && isset($puan)  && isset($post_id)){
		
		$sql = "INSERT INTO yorumlar(username,comment,puan,post_id) values ('$username','$comment','$puan','$post_id')";
		$result = mysqli_query($conn,$sql);
		$res = ["request"=>"success"];
	}
	else if($_GET["type"] == "get"){
		$sql = "SELECT * from yorumlar where post_id=1";
		$result = mysqli_query($conn,$sql);
		$arr = [];
		while($row = mysqli_fetch_assoc($result)){
			array_push($arr, $row);	
		}
		echo json_encode($arr);
	}else{
		$res = ["request"=>"fail"];
		echo json_encode($res);
	}
	
	?>