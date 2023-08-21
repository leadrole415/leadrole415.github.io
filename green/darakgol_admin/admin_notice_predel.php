<meta charset="UTF-8">

<?
include 'db_info.php';
$notice_id=$_GET['notice_id'];


//패스워드 체크 후 맞으면 실행//
$query="select * from notice where notice_id=$notice_id";
$rs=mysql_query($query,$conn);
$row=mysql_fetch_row($rs);
if($row[0]==0){
    die("삭제 실패".mysql_error());
}

$query= "delete from notice where notice_id=$notice_id";
$result=mysql_query($query,$conn);
if($result){
    echo "<meta http-equiv='Refresh' content='1; url=admin_notice.php'>";
}else{echo "삭제 실패";}

?>