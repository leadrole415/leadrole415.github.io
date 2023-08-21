
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>


<?
include 'zdb_mysqli.php';
$conn = dbconn();
$book_id=$_GET['book_id'];

//패스워드 체크 후 맞으면 실행//
$query="select * from reservation where book_id=$book_id";
$rs=dbquery($conn,$query);
$row=dbfetch_row($rs);
if($row[0]==0){
    die("목록에서 찾을수 없습니다".mysqli_error($conn));
}

$book_datefrom = $row['book_datefrom'];
$book_dateto = $row['book_dateto'];
$query= "delete from reservation where book_id=$book_id";
$result=dbquery($conn,$query);
if($result){
    echo "<meta http-equiv='Refresh' content='1; url=admin_booklist.php'>";
}else{echo "삭제 실패";}

?>


</body>
</html>
