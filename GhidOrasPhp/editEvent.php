<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);

    $id_eveniment = $obj->{'id_eveniment'};
    $nume = $obj->{'nume'};
    $descriere = $obj->{'descriere'};
    $id_locatie= $obj->{'id_locatie'};
    $id_organizator = $obj->{"id_organizator"};
    $data_inceput = $obj->{"data_inceput"};
    $data_sfarsit = $obj->{"data_sfarsit"};
    $numar_persoane = $obj->{"numar_persoane"};
     //editeaza un eveniment
    $mysql_qry = "UPDATE `eveniment` SET `nume_eveniment` = '$nume', `numar_persoane` = '$numar_persoane', `descriere` =  '$descriere', `data_sfarsit` = '$data_sfarsit', `data_inceput` = '$data_inceput',`id_locatie` = '$id_locatie', `id_organizator` = '$id_organizator'
     WHERE eveniment.id_eveniment= '$id_eveniment'";
    $result = mysqli_query($conn,$mysql_qry);
   
    
if ($result)  {
          echo "edit event succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok aici";
}
     

$conn->close();
?>