<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dia_diem";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $method = $_GET['method'];
  $user_id = $_GET['user_id'];
  $id_dd = $_GET['id_dd'];

  if ($method == "Like") {
    mysqli_query($conn,"INSERT INTO favorite (user_id, id_dd) VALUES ('$user_id', '$id_dd')");
  }
  else {
    mysqli_query($conn,"DELETE FROM favorite WHERE user_id = '$user_id' AND id_dd = '$id_dd'");
  }
?>
