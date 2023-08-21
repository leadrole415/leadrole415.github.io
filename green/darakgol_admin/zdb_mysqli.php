<?
//192.168.2.63 장미경씨(1111)
//192.168.2.69 박영주씨(1111)
//192.168.2.70 박선미씨(1111)
//192.168.2.71 김재연씨(1111)
//192.168.2.75 김주연씨(1111)
//192.168.2.76 나(1111)

date_default_timezone_set('Asia/Seoul');
	function dbconn(){
		$dbhost = "localhost";
		//$dbhost = "192.168.2.71";
		$dbuser = "root"; //'user'
		$dbpwd  = "jade";
		// $dbpwd  = "greendb1111";
		$dbname = "greendb";
		$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
		if (mysqli_connect_errno()) {
			die('Connect Error: '.mysqli_connect_error());
		}
		mysqli_set_charset($conn, "utf8");	
			
		return $conn;
	}
	function dbquery($conn,$sql){
	//	$res = mysqli_query($sql) or err_redir($sql.mysqli_error(),"");
		$res = mysqli_query($conn,$sql);
		return $res;
	}
	function dbfetch_array($res){
		$array= mysqli_fetch_array($res);
		return $array;
	}
	function dbfetch_row($res){
		$row = mysqli_fetch_array($res);
		return $row;
	}
	function dbqueryfetch($conn,$sql){ //select count와 같은 1행만 결과로 리턴할때
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		return $row;
	}
	function dbclose($conn){
		mysqli_close($conn);
		return;
	}
?>
