<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $nume = $obj->{'nume'};
    $descriere = $obj->{'descriere'};
    $id_locatie= $obj->{'id_locatie'};
    $id_organizator = $obj->{"id_organizator"};
    $data_inceput = $obj->{"data_inceput"};
    $data_sfarsit = $obj->{"data_sfarsit"};
    $numar_persoane = $obj->{"numar_persoane"};
     //adauga eveniment 
    $mysql_qry = "insert into eveniment (nume_eveniment,numar_persoane,descriere,data_sfarsit,data_inceput,id_locatie,id_organizator) 
    values ('$nume',' $numar_persoane','$descriere','$data_sfarsit','$data_inceput','$id_locatie','$id_organizator')  ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "add event succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>