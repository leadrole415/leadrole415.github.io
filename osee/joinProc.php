<?
    include "db_info.php";


    $memId =    $_POST['memId'];
    $memNm =    $_POST['memNm'];
    $memPw =    $_POST['memPw'];
    $memEmail = $_POST['memEmail'];
    $memTel1 =  $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
    // $memTel2 =  $_POST['memTel2'];
    $memAdd1 =  $_POST['zip']. $_POST['addr1'] . $_POST['addr2'];
    // $memAdd2 =  $_POST['memAdd2'];
    // $memAdd31 = $_POST['memAdd3'];
    // $regDt =    $_POST['regDt'];
    

    $query = "SELECT count(*) FROM member WHERE mem_id= '$memId'";
    $result = mysqli_query($conn, $query);
    
    $row = mysqli_fetch_row($result);
    
    if($row[0]==1){
        echo "이미존재";
    ?>
        <script>
            alert("이미 존재하는 아이디 입니다.");
            location.href="join.html";
        </script>
    <?  
        exit;  
    }

    $sql = "INSERT INTO member(mem_id, mem_nm, mem_pw, mem_email, mem_tel1, mem_add1)
            VAlUES ('$memId', '$memNm', '$memPw', '$memEmail', '$memTel1', '$memAdd1')";
    $rs = mysqli_query($conn, $sql);
    
    if($rs){
        echo "가입성공";
    ?>
        <script>
            alert("가입성공");
            location.href="login.php";
        </script>
    <?    
    }else{
        echo "가입실패";
        exit;
    }
    mysqli_close($conn);

?>