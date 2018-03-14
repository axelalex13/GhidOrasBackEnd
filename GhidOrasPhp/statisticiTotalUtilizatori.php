<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

//numarul de evenimente organizate de femei
$sql = "SELECT COUNT(*)
        FROM utilizator";
$rs = $conn->query($sql);
$result = mysqli_fetch_array($rs);


echo  $result[0];
$conn->close();

?>