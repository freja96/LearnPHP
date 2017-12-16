<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "SQL");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$firstname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$lastname = mysqli_real_escape_string($link, $_REQUEST['fistname']);

 
// attempt insert query execution
$sql = "INSERT INTO persons (lastname, fistname) VALUES ('$_POST[lastname]', '$_POST[fistname]')";
if(mysqli_query($link, $sql)){
   header('Location:insert.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>