<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $nume_locatie = $obj->{'nume_locatie'};
    $descriere_locatie = $obj->{'descriere_locatie'};
    $adresa= $obj->{'adresa'};
  
     //adauga locatie
    $mysql_qry = "insert into locatie (nume_locatie,descriere_locatie,adresa) 
    values ('$nume_locatie',' $descriere_locatie','$adresa') ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "add location succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>