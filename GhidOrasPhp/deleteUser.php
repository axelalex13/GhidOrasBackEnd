<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
  
    $id_utilizator = $obj->{'id_utilizator'};
    //sterge un utilizator 
    $mysql_qry = "DELETE FROM  utilizator 
      WHERE id_utilizator LIKE '$id_utilizator' ";
    $result = mysqli_query($conn,$mysql_qry);
    
if($result) {
          echo "delete user succes";
    
} else {
        $json = array( 'status' => "not ok");
        echo "not ok";
}
     

$conn->close();
?>