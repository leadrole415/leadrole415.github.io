<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";

include "db_info.php";

$query = "DELETE FROM cart 
          WHERE mem_id = '$memId'";
$result = mysqli_query($conn ,$query);     

echo "<script>location.href='cart.php';</script>";

?>

