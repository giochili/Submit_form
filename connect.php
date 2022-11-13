<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $dataBase = "test";


  $con = new mysqli( $host,$user,$pass,$dataBase);

  if(!$con){
    echo "Connection problem";
  }else {
    echo "Connection Successfully !";
  }

  // getting data from the submittion form 

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $address = $_POST['address'];
  $birthYear = $_POST['birthYear'];
  $gender = $_POST['gender'];
  $note = $_POST['note'];

  $qey = "INSERT INTO `table1`(`firstName`, `lastName`, `address`, `birthYear`, `gender`, `Note`) VALUES ('$firstName','$lastName','$address','$birthYear','$gender','$note')";

  $insert = mysqli_query( $con, $qey);

  if(!$insert){
    echo "There are some problem";
  }else {
    echo "Data Inserted";
    echo '<a href="index.php"> back to form</a>';
  }
 
  
?>