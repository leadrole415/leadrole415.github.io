<meta charset="UTF-8">

<?
session_start();
if(!isset($_SESSION['adminnm'])){
echo "잘못된 경로입니다.";
?>
<meta http-equiv='refresh' content='2;url=admin_login.html'>
<?
exit;
}
?> 

<?
include 'db_info.php';

$notice_title=$_POST['notice_title'];
$notice_content=$_POST['notice_content'];


$query="insert into notice(notice_title, notice_content, notice_wdate) 
        values ('$notice_title', '$notice_content', now())";
$result=mysql_query($query,$conn);
if($result){
    echo "<meta http-equiv='Refresh' content='1; url=admin_notice.php'>";
}else{
    echo "저장 실패";
}


?>