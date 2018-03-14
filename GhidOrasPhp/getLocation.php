<?php
// Create connection
require "conn.php";

$sql = "SELECT *  FROM locatie where 1";
$result = $conn->query($sql);
$json = array();
if($result === FALSE) { 
    die(mysqli_error());
}
if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            'id' =>$row['id_locatie'],
            'nume_locatie' => $row['nume_locatie'],
            'descriere_locatie'=> $row['descriere_locatie'],
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