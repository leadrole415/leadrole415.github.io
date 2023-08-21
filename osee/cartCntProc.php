<?
    include "db_info.php";
    
    $memId = $_POST['memberId'];
    $goodsId= $_POST['goodsId'];
    $goodsCnt = $_POST['goodsCnt'];

    $query = "UPDATE cart 
              SET   goods_cnt = $goodsCnt , 
                    total_price = goods_price * $goodsCnt
              WHERE mem_id = '$memId' AND goods_id = '$goodsId'";

    $result = mysqli_query($conn, $query);

    $query = "SELECT goods_cnt as goodsCnt, total_price as totalPrice
              FROM cart
              WHERE mem_id = '$memId' AND goods_id = '$goodsId'";
     $rs = mysqli_query($conn, $query);
     $row = mysqli_fetch_array($rs);
//    echo $query;
//    echo "<br>";
    echo json_encode($row);

   

?>