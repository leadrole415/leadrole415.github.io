
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?
include 'db_info.php';
$notice_id=$_GET['notice_id'];

$notice_title=$_POST['notice_title'];
$notice_content=$_POST['notice_content'];


$query="update notice set notice_title='$notice_title', notice_content='$notice_content', notice_wdate=now() where notice_id='$notice_id'";
$result=mysql_query($query,$conn);



if($result){
echo "<meta http-equiv='Refresh' content='1; url=admin_notice.php?no=$notice_id'>";
}else{
    echo "저장 실패";
}

?>

</body>
</html>
