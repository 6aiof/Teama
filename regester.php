<?php
$username = $_POST['username'];
$email = $_POST['email'];
$firstpassword = $_POST['firstpassword'];
$conpassword = $_POST['conpassword'];

if (!empty($username) || !empty($email) || !empty($firstpassword) || !empty($conpassword)){
    $servername = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'T1478998741t';
    //create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, 'test');
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From 'signup' Where email = ? Limit 1";
     $INSERT = "INSERT Into 'signup' (username, email, firstpassword, conpassword) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $email, $firstpassword, $conpassword);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>