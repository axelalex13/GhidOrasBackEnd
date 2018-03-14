<?php
// Create connection
require "conn.php";
$jsonn = file_get_contents('php://input');
$obj = json_decode($jsonn);

$id = $obj->{'id'};
$sql = "SELECT *
        FROM organizator AS O JOIN utilizator AS U ON O.id_utilizator = U.id_utilizator
        WHERE `id_organizator` = '$id' ";
$result = mysqli_query($conn,$sql);
$json = array();

if ($result->num_rows > 0) {
 
    while($row = mysqli_fetch_array($result))     
    {
      $json = array(
            'descriere_organizator' =>$row['descriere_organizator'],
            'ocupatie_organizator' => $row['ocupatie_organizator'],
            'nume' =>$row['nume'],
            'prenume' => $row['prenume'],
            'email'=> $row['email']
            
          );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}
$conn->close();
?>