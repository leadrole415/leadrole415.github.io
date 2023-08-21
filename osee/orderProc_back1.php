<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";



?>

<?


    include "db_info.php";

    // $goodsId=   $_POST['goodsId'];
    // $goodsCnt = $_POST['goodsCnt'];
    // $memId =    $_POST['memId'];

    $query = "SELECT * FROM MEMBER";
    $result = mysql_query($query, $conn);
    $row = mysql_fetch_array($result);
    // 주문 생성 (주문 아이디 발생), 회원정보 필요하면 회원아이디로 select 먼저하고넣는다.
    $query = "INSERT INTO orders
              VALUES(null,'$row[0]','$row[1]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]',now())";
    $result = mysql_query($query, $conn);
    
    if(!$result){
        die("주문 인서트 실패: ".mysql_error());
    }
    
    $query = "SELECT LAST_INSERT_ID()";
    $rs = mysql_query($query, $conn);
    //방금 인서트한 주문번호 가져오기(주문 상세에 넣기 위해서)
    $row = mysql_fetch_array($rs);

    $orderId = $row[0];

    //주문상세(주문한 상품들 목록) 만들기
    $query = "INSERT INTO order_detail
              SELECT $orderId, g.goods_id, g.goods_nm, g.goods_price, c.goods_cnt, g.goods_img1,now() 
              FROM cart c, goods g
              WHERE c.goods_id = g.goods_id
                AND c.mem_id = '$memId' ";
    $result = mysql_query($query, $conn);         
    
    //카트비우기
    $query = "DELETE FROM CART
              WHERE mem_id = '$memId'";          
    $result2 = mysql_query($query, $conn);     

    echo "<script>location.href='order.php?orderId=$orderId';</script>";



    //배열로 가져온 상품 아이디를 IN 검색으로 상품 가져오기 위해
    //문자열로 변환한다.
    // $str = implode(".",
    //             array_map(function(&$item){
    //                 return "'" .mysql_real_escape_string(&$item)."'";
    //             }, $goodsId));
    
    // $query = "INSERT INTO order_detail
    //           SELECT $orderId,$goodsId,$goodsNm,$goodsPrice,$goodsCnt,$goodsImg1
    //           FROM GOODS
    //           WHERE GOODS_ID IN ($str)";
    // $result = mysql_query($query, $conn);

    // if(!result){
    //     die("주문상세 인서트 실패: ". mysql_error());
    // }

    // for($i=0; $i < count($goodsId), $i++){
    //     $query = "UPDATE order_detail
    //               SET goodsCnt = {$goodsCnt[$i]}
    //               WHERE order_id = $orderId AND goodsId = {$goodsId[$i]}";
    //     $result = mysql_query($query, $conn);
    //     if(!$result){
    //         echo $query;
    //         die("업데이트 에러: ". mysql_error());
    //     }         
    // }
                
?>