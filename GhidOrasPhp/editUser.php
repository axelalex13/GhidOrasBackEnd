<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);

    $id = $obj->{'id'};
$email = $obj->{'email'};
    $parola= $obj->{'parola'};
     $nume = $obj->{'nume'};
      $prenume = $obj->{'prenume'};
    $data_nasterii = $obj->{"data_nasterii"};
    $adresa = $obj->{"adresa"};
     $sex = $obj->{"sex"};
    
     //editeaza utilizator
    $mysql_qry = "UPDATE `utilizator` SET `nume` = '$nume', `prenume` = '$prenume', `email` =  '$email', `sex` = '$sex', `data_nasterii` = '$data_nasterii',`parola` = '$parola', `adresa` = '$adresa'
     WHERE utilizator.id_utilizator= '$id'";
    $result = mysqli_query($conn,$mysql_qry);
   
    
if ($result)  {
          echo "edit user succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok aici";
}
     

$conn->close();
?>