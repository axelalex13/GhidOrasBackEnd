<?php

require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);
$id = $obj->{'id'};
//numele locatiilor unde un organizator a desfasurat evenimente
$sql = "SELECT L.nume_locatie
        FROM eveniment AS E JOIN locatie AS L ON E.id_locatie = L.id_locatie
        WHERE E.id_organizator = '$id' ";
$result = $conn->query($sql);


$json = array();

if($result === FALSE) { 
    die(mysqli_error());
}

if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            $row['nume_locatie']
            
          );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}


$conn->close();

?>