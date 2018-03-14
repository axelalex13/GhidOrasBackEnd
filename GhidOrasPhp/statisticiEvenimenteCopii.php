<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

//evenimente la care au participat copii
$sql = "SELECT DISTINCT E.nume_eveniment
        FROM eveniment AS E JOIN utilizator_eveniment AS U ON E.id_eveniment = U.id_eveniment
        WHERE U.id_utilizator IN (SELECT id_utilizator 
                                    FROM utilizator
                                    WHERE data_nasterii < '1999-01-01') ";
$result = $conn->query($sql);
//$result = mysqli_fetch_array($rs);

$json = array();


if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            $row['nume_eveniment']
            
          );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}


$conn->close();

?>