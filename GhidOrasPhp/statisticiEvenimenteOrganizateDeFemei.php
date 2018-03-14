<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

//numarul de evenimente organizate de femei
$sql = "SELECT COUNT(*)
        FROM eveniment  AS E JOIN organizator AS O ON E.id_organizator = O.id_organizator 
                                JOIN utilizator as U ON 
        O.id_utilizator = U.id_utilizator 
        WHERE O.id_utilizator IN (SELECT id_utilizator
                                    FROM utilizator
                                    WHERE sex LIKE 'Feminin')";
$rs = $conn->query($sql);
$result = mysqli_fetch_array($rs);


echo  $result[0];
$conn->close();

?>