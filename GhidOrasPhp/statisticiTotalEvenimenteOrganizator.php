<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);
$id = $obj->{'id'};
//numarul de evenimente create de un organizator
$sql = "SELECT COUNT(*)
        FROM eveniment  WHERE `id_organizator` = '$id' ";
$rs = $conn->query($sql);
$result = mysqli_fetch_array($rs);


echo  $result[0];
$conn->close();

?>