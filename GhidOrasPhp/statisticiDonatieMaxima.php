<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);
//numele evenimentului unde s-a iregistrat cea mai mare donatie, 
//impreuna cu datele despre cel care a donat 
$sql = "SELECT E.nume_eveniment,U.nume,U.prenume,S.donatie
        FROM eveniment AS E JOIN sponsor AS S ON E.id_sponsor = S.id_sponsor JOIN utilizator as U ON 
        S.id_utilizator = U.id_utilizator 
        WHERE S.donatie = (SELECT max(SS.donatie)
                                    FROM sponsor AS SS)";
$rs = $conn->query($sql);
$result = mysqli_fetch_array($rs);


echo  " La evenimentul  \"{$result[0]}\" utilizatorul {$result[1]} {$result[2]} a donat {$result[3]} lei";
$conn->close();

?>