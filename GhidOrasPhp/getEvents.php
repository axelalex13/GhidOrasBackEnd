<?php
// Create connection
require "conn.php";

$sql = "SELECT *
        FROM eveniment AS E JOIN locatie AS L ON E.id_locatie = L.id_locatie 
        ORDER BY E.data_inceput ASC";
$result = $conn->query($sql);
$json = array();

if($result === FALSE) { 
    die(mysqli_error());
}

if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            'id' =>$row['id_eveniment'],
            'nume' => $row['nume_eveniment'],
            'descriere'=> $row['descriere'],
            'numar_persoane' =>$row['numar_persoane'],
            'data_sfarsit' => $row['data_sfarsit'],
            'data_inceput'=> $row['data_inceput'],
            'id_locatie' =>$row['id_locatie'],
            'id_organizator' =>$row['id_organizator'],
            'nume_locatie' =>$row['nume_locatie'],
            'descriere_locatie' =>$row['descriere_locatie'],
             'adresa' =>$row['adresa']
          );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}
$conn->close();
?>