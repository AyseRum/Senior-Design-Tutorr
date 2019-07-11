<?php 

session_start();

define ("DB_HOST", "localhost"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS",""); // set database password
define ("DB_NAME","tutorr"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db($link, DB_NAME) or die("Couldn't select database");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
	 if ($username == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT username, password FROM signup WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($link,$sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }

        if (mysqli_num_rows($query) > 0) {
         $_SESSION['currentuser'] = $username ;
         header('Location: tutorr-dash.php');
            exit;
        }

        $msg = "Username and password do not match";
    }
}
?>
         