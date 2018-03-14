<?php
    require "conn.php";
 
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $user_email = $obj->{'email'};
    $user_pass = $obj->{'password'};
    
    $mysql_qry = "SELECT  utilizator.id_utilizator,utilizator.nume, utilizator.prenume,
         utilizator.email,utilizator.sex,utilizator.data_nasterii,organizator.id_organizator
    FROM utilizator LEFT JOIN organizator ON utilizator.id_utilizator = organizator.id_utilizator  
    WHERE email like '$user_email' and parola like '$user_pass';";
    $result = mysqli_query($conn,$mysql_qry);
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result))     
    {
        $json = array(
            
            'id_utilizator' =>$row['id_utilizator'],
            'nume' => $row["nume"],
            'prenume'=> $row["prenume"],
            'email' =>$row['email'],
            'sex' => $row["sex"],
            'id_organizator'=> $row["id_organizator"],
            'data_nasterii'=> $row["data_nasterii"],
            'status' => "ok"
        );
      
    }
       
    } else {
     $json = array( 'status' => "not ok");
      
}
$jsonstring = json_encode($json);
         echo $jsonstring;
$conn->close();
?>