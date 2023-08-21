<?
//     $conn = mysql_connect("192.168.2.71", "root", "1111");
    // $conn=mysql_connect("localhost","greendb","greendb1111");
    // if(!$conn){
    //     die("연결실패:".mysqli_connect_error());
    // }
    //  mysql_query("set names utf8");
    //  mysql_select_db("greendb");

$db_host = "localhost"; 
$db_user = "grace415"; 
$db_passwd = "kjy998083!!";
$db_name = "grace415"; 

// MySQL - DB 접속.
$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
if (mysqli_connect_errno()){
echo "MySQL 연결 오류: " . mysqli_connect_error();
exit;
} else {
echo "DB : \"$db_name\"에 접속 성공.<br/>";
}

// 문자셋 설정, utf8.
mysqli_set_charset($conn,"utf8"); 
?>