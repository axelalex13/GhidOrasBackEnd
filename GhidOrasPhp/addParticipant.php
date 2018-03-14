<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $id_utilizator = $obj->{'id_utilizator'};
    $id_eveniment = $obj->{'id_eveniment'};
  
 
  
     //adauga participant
    $mysql_qry = "insert into utilizator_eveniment (id_utilizator,id_eveniment) 
    values ('$id_utilizator','$id_eveniment')  ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "add participant succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>