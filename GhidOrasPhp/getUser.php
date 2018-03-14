<?php
// Create connection
require "conn.php";
$user_id = $_POST["id"];
$sql = "SELECT id_utilizator, nume, prenume, email, sex,data_nasterii, adresa  FROM utilizator where id_utilizator like '$user_id'";
$result = $conn->query($sql);
$json = array();
if($result === FALSE) { 
    die(mysqli_error()); // TODO: better error handling
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result))     
    {
        $json[] = array(
            'id' =>$row['id_utilizator'],
            'nume' => $row["nume"],
            'prenume'=> $row["prenume"],
            'email' =>$row['email'],
            'sex' => $row["sex"],
            'data_nasterii'=> $row["data_nasterii"]
        );
      
    }
       $jsonstring = json_encode($json);
         echo $jsonstring;
    } else {
    echo "0 results";
}
$conn->close();
?>
