<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?
include 'db_info.php';

$adminid = $_POST['adminid'];
$adminnm = $_POST['adminpw'];
// $aid = $_POST['adminid'];
// $apw = $_POST['adminpw'];

    //  $query = "select adminid, adminnm
    //            from admin
    //            where adminid='$aid'  and adminpw='$apw' ";
    //  $result = mysql_query($query, $conn);
    //  list($adminid, $adminnm) = mysql_fetch_array($result);
    ////  echo $adminid. " : ". $adminnm;

    if(!empty($adminid)){
        session_start();
        $_SESSION['adminid'] = $adminid;
        $_SESSION['adminnm'] = $adminnm;
        // 관리자 로그인 성공
?>
        <script>
            location.href="admin_reservation.php";
        </script>
<?

    }else{ // 관리자 로그인 실패
?>
        <script>
            alert ("아이디와 패스워드를 확인하세요");
            history.back(-1);
            // location.href="admin.html";
        </script>

<?       
    }
    mysql_close($conn);
?>

</body>
</html>
