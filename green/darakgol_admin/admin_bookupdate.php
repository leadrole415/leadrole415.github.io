<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?
include 'zdb_mysqli.php';
$conn = dbconn();

$book_id=$_REQUEST['book_id'];
$book_account = (!empty($_REQUEST['book_account'])) ? $_REQUEST['book_account'] : "";
$book_status=$_REQUEST['book_status'];


$query="UPDATE reservation 
        SET book_account='$book_account', book_status='$book_status'
        WHERE  book_id='$book_id'";
// echo $query;
$result=dbquery($conn,$query);


if($result){
echo "<script>alert('성공적으로 수정하였습니다.');</script>";
echo "<meta http-equiv='Refresh' content='0; url=admin_bookread.php?book_id=$book_id'>";
}else{
    echo "저장실패";
    echo "<meta http-equiv='Refresh' content='1; url=admin_bookread.php?book_id=$book_id'>";
}

?>

</body>
</html>
