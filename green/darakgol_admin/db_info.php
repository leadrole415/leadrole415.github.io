<?
//     $conn = mysql_connect("192.168.2.71", "root", "1111");
    // $conn=mysql_connect("localhost","greendb","greendb1111");
    // if(!$conn){
    //     die("연결실패:".mysqli_connect_error());
    // }
    //  mysql_query("set names utf8");
    //  mysql_select_db("greendb");
    $conn = mysql_connect("localhost", "root", "jade");
    if(!$conn){
       die("연결실패:".mysqli_connect_error());
   }
    mysql_query("set names utf8");
    mysql_select_db("greendb");
?>