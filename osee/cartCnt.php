<?
$query = "SELECT count(*) FROM cart WHERE mem_id = '$memId' ";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_array($rs);
$cartCount = $row[0];
?>