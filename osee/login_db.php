<?

    include "db_info.php";

    
    $memId =  $_POST['memId'];
    $memNm =  $_POST['memNm'];
    $memPw =  $_POST['memPw'];

    $query = "SELECT count(*) 
              FROM member 
              WHERE mem_id = '$memId' && mem_pw = '$memPw'";
    $reslut = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($reslut);

    echo $reslut;
    if($row[0]==1){
        echo "안녕하세요 $_POST[memNm] 님";
    }else{
        echo "이 페이지는 사용자 인증이 필요합니다.";
    ?>
        <script>
            alert("이 페이지는 사용자 인증이 필요합니다.");
            // location.href="login.html";
        </script>
    <?    
        exit;
    }
    
    mysqli_close($conn);

?>