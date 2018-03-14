<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $id_eveniment = $obj->{'id_eveniment'};
    //sterge un eveniment dat prin id
    $mysql_qry = "DELETE FROM  eveniment 
      WHERE id_eveniment LIKE '$id_eveniment' ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "delete event succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>