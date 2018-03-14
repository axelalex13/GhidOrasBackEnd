<?php
     require "conn.php";
    $jsonn = file_get_contents('php://input');
    $obj = json_decode($jsonn);
    $email = $obj->{'email'};
    $parola = $obj->{'parola'};
    $nume= $obj->{'nume'};
    $prenume = $obj->{"prenume"};
    $sex = $obj->{"sex"};
    $data_nasterii = $obj->{"data_nasterii"};
    $adresa = $obj->{"adresa"};
     
    $mysql_qry = "insert into utilizator (nume,prenume,email,parola,sex,data_nasterii,adresa) values ('$nume','$prenume','$email','$parola','$sex','$data_nasterii','$adresa')  ";
    $result = mysqli_query($conn,$mysql_qry);
    $json = array();
  
   
if($result) {
          //echo "register succes";
     $mysql_qry2 = "SELECT  id_utilizator, nume, prenume, email, sex,data_nasterii, adresa from utilizator where email like '$email' and parola like '$parola';";
        $result2 = mysqli_query($conn,$mysql_qry2) or die("Error: ".mysqli_error($conn));
        if ($result2) {
            // output data of each row
            while($row = mysqli_fetch_array($result2))     
            {
             $json = array(
            
            'id' =>$row['id_utilizator'],
            'nume' => $row["nume"],
            'prenume'=> $row["prenume"],
            'email' =>$row['email'],
            'sex' => $row["sex"],
            'data_nasterii'=> $row["data_nasterii"],
            'status' => "ok"
            );
      
            }
    
       } else {
        $json = array( 'status' => "not ok");
        echo "not ok";
      
       }
      }else{
          echo "register failed";
      }
      $jsonstring = json_encode($json);
         echo $jsonstring;

$conn->close();
?>