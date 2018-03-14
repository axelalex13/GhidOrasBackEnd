<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $descriere_organizator = $obj->{'descriere_organizator'};
    $ocupatie_organizator = $obj->{'ocupatie_organizator'};
     $id_utilizator = $obj->{'id_utilizator'};
 
  
     //adauga un organizator
    $mysql_qry = "insert into organizator (descriere_organizator,ocupatie_organizator,id_utilizator) 
    values ('$descriere_organizator',' $ocupatie_organizator','$id_utilizator')  ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "add organizator succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>