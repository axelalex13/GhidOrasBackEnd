<?php
// Create connection
require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

$id = $obj->{'id'};
//lista de evenimente ale unui utlizator
$sql = "SELECT E.nume_eveniment, U.nume,U.prenume
        FROM eveniment AS E JOIN organizator AS O ON E.id_organizator = O.id_organizator 
        JOIN utilizator AS U on O.id_utilizator = U.id_utilizator
        WHERE O.id_organizator = '$id'
        ORDER BY E.data_inceput ASC";
$result = $conn->query($sql);
$json = array();

if($result === FALSE) { 
    die(mysqli_error());
}



//echo $result[0];
if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            'nume_eveniment' =>$row['nume_eveniment'],
            'nume' => $row['nume'],
            'prenume'=> $row['prenume']
            
          );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}
$conn->close();
?>