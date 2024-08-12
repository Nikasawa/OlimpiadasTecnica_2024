<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OlimpiadasTecnica_2024";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Se conecto a la base de datos";
}
$conn->close();
?>