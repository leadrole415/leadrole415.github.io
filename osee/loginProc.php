<?
    include "db_info.php";
    $memId =  $_POST['memId'];
    $memPw =  $_POST['memPw'];

     $query = "SELECT mem_id, mem_nm, mem_pw
               FROM member
               WHERE mem_id = '$memId' && mem_pw = '$memPw'";
     $result = mysqli_query($conn, $query);
     list($memId ,$memNm, $memPw) = mysqli_fetch_array($result);

    // echo $result;
    if(!empty($memId)){
?>
        <script>
            // alert ("로그인 성공");
        </script>
                <?
        session_start();
        $_SESSION['mem_nm'] = $memNm;
        $_SESSION['mem_id'] = $memId;
    
      
        // 로그인 성공
?>
        <script>
            location.href="index.php";
        </script>
<?

    }else{ // 로그인 실패
?>
        <script>
            alert ("아이디와 패스워드를 확인하세요");
            // history.back(-1);
            location.href="login.php";
        </script>

<?       
    }
    mysqli_close($conn);
?>