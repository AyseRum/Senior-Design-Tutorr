<?php

$username= filter_input(INPUT_POST, 'username');
$email= filter_input(INPUT_POST, 'email');
$password= filter_input(INPUT_POST, 'password');

$dbhost= 'localhost';
$dbusername= 'root';
$dbpassword= '';
$dbname= 'tutorr';
$conn = new mysqli ($dbhost, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "INSERT INTO signup (username, email, password)
    values ('$username','$email', '$password')";
    if ($conn->query($sql)){
        echo "Welcome to Tutorr family! Now, Login!";
        echo '<li class="sidebar-brand">
              <a class="js-scroll-trigger" href="login.html">Login</a>
              </li>';
        echo "your password is ".$password;
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
} 

?>