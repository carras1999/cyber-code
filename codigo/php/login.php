<?php
$servername = "localhost";
$username = "root";
$password = "N0M30lv1d3s.";
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
// formulariotik bidalitako datuak irakurri
// leer desde el formulario
$user =  $_POST['user'];
$password = $_POST['password'];
//
$sql = "SELECT * FROM usuarios WHERE user = '$user';";
//echo $sql . "<br><br>";
//
$result = $conn->query($sql);
/*
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($user == $row["user"]){
        if (password_verify($password, $row["pass"])) {
            echo "OK";
        } else{
            echo "KO";
        }
    } else {
        echo "KO";
    }
} else {
    echo "KO";
}
*/
$row = $result->fetch_assoc();
if (($row) && ($user == $row["user"]) && (password_verify($password, $row["pass"]))) {
    //echo "OK";
    session_start();
    $_SESSION["user"]=$user;
    header("Location: secure-page.php");

} else{
    //echo "KO";
    header("Location: login.html");
}
$conn->close();
