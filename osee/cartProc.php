<?
    include "db_info.php";
    
    $memId = $_POST['memberId'];
    $goodsId= $_POST['goodsId'];
    $goodsCnt = $_POST['goodsCnt'];


    
    $query= "SELECT GOODS_NM,GOODS_PRICE, GOODS_IMG1 FROM goods 
             WHERE goods_id='$goodsId'";
    $rs = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($rs);
    // echo $query;
    $query = "INSERT INTO cart (MEM_ID, GOODS_ID, GOODS_NM,GOODS_PRICE, GOODS_CNT, GOODS_IMG1)
                        VALUES ('$memId','$goodsId','$row[GOODS_NM]',$row[GOODS_PRICE], $goodsCnt,'$row[GOODS_IMG1]')";
    $result = mysqli_query($conn, $query); 
//    echo $query;
//    echo "<br>";
    echo json_encode($result);

   

?>