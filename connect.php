<?php

$first_name= filter_input(INPUT_POST, 'first_name');
$last_name= filter_input(INPUT_POST, 'last_name');
$email= filter_input(INPUT_POST, 'email');

$dbhost= 'localhost';
$dbusername= 'root';
$dbpassword= '';
$dbname= 'guestbook';
$conn = new mysqli ($dbhost, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "INSERT INTO guestbook (firstname, lastname, email)
    values ('$first_name','$last_name', '$email')";
    if ($conn->query($sql)){
        echo "New record is inserted sucessfully";
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
} 