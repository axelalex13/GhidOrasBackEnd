<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

//numarul de utilizatori care nu au participat la un eveniment si nici nu au organizat unul
$sql = "SELECT COUNT(*)
        FROM utilizator  
        WHERE id_utilizator not in (SELECT distinct U.id_utilizator
                                        FROM utilizator_eveniment as U )
        and id_utilizator not in (SELECT distinct E.id_organizator
                                        FROM eveniment as E )";
$rs = $conn->query($sql);
$result = mysqli_fetch_array($rs);


echo  $result[0];
$conn->close();

?>